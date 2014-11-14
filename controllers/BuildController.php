<?php

class BuildController {

  public function makeTemplate($input) {
    // the assoc array to replace
    $info = array(
      '{generator_name}' => $input['generator_name'],
      '{module_name_l}' => $this->clean($input['generator_name']),
      '{description}' => $input['description'],
      '{author}' => $input['author'],
      '{website}' => $input['website'],
      '{package}' => $input['package'],
      '{subpackage}' => $input['subpackage'],
      '{copyright}' => $input['copyright'],
      '{frontend}' => $input['frontend'],
      '{backend}' => $input['backend'],
      );
    $info['{validation_fields}'] = $this->makeValidation($input['fields']);
    $info['{details_fields}'] = $this->makeDetails($input['fields']);
    $info['{model_fields}'] = $this->makeModel($input['fields']);
    $info['{adminform_fields}'] = $this->makeAdminForms($input['fields']);
    // array of files to replace
    $filearray = array(
      'config/routes.php',
      'controllers/admin.php',
      'details.php',
      'events.php',
      'language/english/sample_lang.php',
      'models/sample_m.php',
      'plugin.php',
      'views/admin/form.php',
      'views/admin/index.php'
      );
    // conditional front end controller stuff
    if ($input['frontend'] == 'true') {
      $filearray[] = 'controllers/sample.php';
      $filearray[] = 'views/index.php';
    }
    $url = __DIR__ . '/../public/generated/';
    $this->cpdir(__DIR__ . '/../generator/module_full', __DIR__ . '/../public/generated/'.$info['{module_name_l}']);
    // where is the module generated
    $moduleurl = $url.$info['{module_name_l}'];
    for ($i = 0; $i < count($filearray); $i++) {
      $filedestination = $moduleurl.'/'.$filearray[$i];
      // load the template = module_full/targetfile
      $current = file_get_contents($filedestination);
      // replace the template tags
      $current = $this->str_replace_assoc($info, $current);
      // put the contents in the new file
      file_put_contents($filedestination, $current);
    }
    // rename the specific files that are name sensitive
    rename($moduleurl.'/language/english/sample_lang.php', $moduleurl.'/language/english/'.$info['{module_name_l}'].'_lang.php');
    rename($moduleurl.'/models/sample_m.php', $moduleurl.'/models/'.$info['{module_name_l}'].'_m.php');
    if ($input['frontend'] == 'true') {
      // rename the extra front end stuff if applicable
      rename($moduleurl.'/controllers/sample.php', $moduleurl.'/controllers/'.$info['{module_name_l}'].'.php');
      rename($moduleurl.'/css/sample.css', $moduleurl.'/css/'.$info['{module_name_l}'].'.css');
    }
    // comment out to disable zip compression
    $this->Zip($url.$info['{module_name_l}'], $url.$info['{module_name_l}'].'.zip');
    return $info['{module_name_l}'].'.zip';
  }

  public function finished($module)
  {
    return View::make('home.finished')->with(array('module'=> $module, 'url' => URL::base(), 'zip' => false));
  }

  private function clean($nametoclean) {
    $fixes = array(' ','-');
    return strtolower(str_replace($fixes, '_',$nametoclean));
  }

  private function str_replace_assoc(array $replace, $subject) {
    return str_replace(array_keys($replace), array_values($replace), $subject);
  }

  private function makeValidation($fields) {
    $validation_fields = '';
    foreach ($fields as $field) {
      if (isset($field['text'])) {
        $reqs = (isset($field['validation'])) ? implode('|', $field['validation']) : '';
        $validation_fields .= sprintf("\tarray(\n\t'field' => '%s',\n\t'label' => '%s',\n\t'rules' => '%s',),\n", $this->clean($field['text']), ucfirst($field['text']), $reqs);
      }
    }
    return $validation_fields;
  }

  private function makeDetails($fields) {
    $details_fields = '';
    foreach ($fields as $field) {
      $details_fields .= sprintf("'%s' => array(\n\t'type' => '%s',", $this->clean($field['text']), $field['dbtype']);
        if (!empty($field['constraint'])) {
          $details_fields .= sprintf("\n\t'constraint' => '%s',", $field['constraint']);
        }
        if (!empty($field['default'])) {
          $details_fields .= sprintf("\n\t'default' => '%s',", $field['default']);
        }
        if ($field['null'] !== 'false') {
          $details_fields .= "\n\t'null' => true,";
        }
        $details_fields .= "\n),\n";
}
return $details_fields;
}

private function makeModel($fields) {
  $model_fields = '';
  foreach ($fields as $field) {
    $text = $this->clean($field['text']);
    $model_fields .= sprintf("'%s' => \$input['%s'],\n\t", $text, $text);
  }
  return $model_fields;
}

private function cpdir($source, $dest) {
  mkdir($dest, 0755);
  foreach (
   $iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST) as $item
   ) {
    if ($item->isDir()) {
      mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
    } else {
      copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
    }
  }
}

private function makeAdminForms($fields) {
  $admin_fields = '';
  foreach ($fields as $field) {
    $text = $this->clean($field['text']);
    $admin_fields .= sprintf("<li>\n\t<label for=\"%s\">%s</label>\n<div class=\"input\">\n\t<?php echo form_%s(\"%s\", set_value(\"%s\", $%s)); ?>\n</div>\n</li>", $text, ucfirst($field['text']), $field['type'], $text, $text, $text);
  }
  return $admin_fields;
}

// copy pasta http://goo.gl/CMQ0xP
function Zip($source, $destination) {
  if (!extension_loaded('zip') || !file_exists($source)) {
    return false;
  }
  $zip = new ZipArchive();
  if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
    return false;
  }
  $source = str_replace('\\', DIRECTORY_SEPARATOR, realpath($source));
  if (is_dir($source)) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
    foreach ($files as $file) {
      $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
      // Ignore "." and ".." folders
      if( in_array(substr($file, strrpos($file, DIRECTORY_SEPARATOR) + 1), array('.', '..')) ){
        continue;
      }
      $file = realpath($file);
      if (is_dir($file)) {
        $zip->addEmptyDir(str_replace($source . DIRECTORY_SEPARATOR, '', $file . DIRECTORY_SEPARATOR));
      } else if (is_file($file)) {
        $zip->addFromString(str_replace($source . DIRECTORY_SEPARATOR, '', $file), file_get_contents($file));
      }
    }
  } else if (is_file($source)) {
    $zip->addFromString(basename($source), file_get_contents($source));
  }
  return $zip->close();
}

}
