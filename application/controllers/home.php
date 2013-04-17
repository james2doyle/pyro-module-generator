<?php

class Home_Controller extends Base_Controller {

	public function action_index()
	{
		return View::make('home.index');
	}

	public function action_template($id)
	{
		// return the template for making fields and forms
		return View::make('home.template')->with('index', $id);
	}

	public function action_makeTemplate()
	{
		$input = Input::get();
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
			array_push($filearray, 'controllers/sample.php');
			array_push($filearray, 'views/index.php');
		}
		File::cpdir('./application/generator/module_full','./application/generator/generated/'.$info['{module_name_l}']);
		$moduleurl = './application/generator/generated/'.$info['{module_name_l}'];
		for ($i = 0; $i <count($filearray); $i++) {
			$filedestination = $moduleurl.'/'.$filearray[$i];
			// load the template = module_full/targetfile
			$current = File::get($filedestination);
			// replace the template tags
			$current = $this->str_replace_assoc($info, $current);
			// put the contents in the new file
			File::put($filedestination, $current);
		}
		// rename the specific files that are name sensitive
		rename($moduleurl.'/language/english/sample_lang.php', $moduleurl.'/language/english/'.$info['{module_name_l}'].'_lang.php');
		rename($moduleurl.'/models/sample_m.php', $moduleurl.'/models/'.$info['{module_name_l}'].'_m.php');
		if ($input['frontend'] == 'true') {
			// rename the extra front end stuff if applicable
			rename($moduleurl.'/controllers/sample.php', $moduleurl.'/controllers/'.$info['{module_name_l}'].'.php');
			rename($moduleurl.'/css/sample.css', $moduleurl.'/css/'.$info['{module_name_l}'].'.css');
		}
		// return to the homepage
		return Redirect::to_action('home@index');
	}

	private function clean($nametoclean) {
		$fixes = array(' ','-');
		return strtolower(str_replace($fixes, '_',$nametoclean));
	}

	private function str_replace_assoc(array $replace, $subject) {
		return str_replace(array_keys($replace), array_values($replace), $subject);
	}

	private function makeValidation($fields)
	{
		$validation_fields = '';
		foreach ($fields as $field) {
			if (isset($field['validation'])) {
				$reqs = implode('|', $field['validation']);
			} else {
				$reqs = '';
			}
			$validation_fields .= "array(
				\t'field' => '$field[text]',
				\t'label' => '".ucfirst($field['text'])."',
				\t'rules' => '$reqs',
				),\n";
}
return $validation_fields;
}

private function makeDetails($fields)
{
	$details_fields = '';
	foreach ($fields as $field) {
		$details_fields .= "'$field[text]' => array(
			\t'type' => '$field[dbtype]',";
			if ($field['constraint'] !== '') {
				$details_fields .= "\n\t'constraint' => '$field[constraint]',";
			}
			if ($field['default'] !== '') {
				$details_fields .= "\n\t'default' => '$field[default]',";
			}
			if ($field['null'] !== 'false') {
				$details_fields .= "\n\t'null' => true,";
			}
			$details_fields .= "\n),\n";
}
return $details_fields;
}

private function makeModel($fields)
{
	$model_fields = '';
	foreach ($fields as $field) {
		$model_fields .= "'$field[text]' => \$input['$field[text]'],\n";
	}
	return $model_fields;
}

private function makeAdminForms($fields)
{
	$admin_fields = '';
	foreach ($fields as $field) {
		$admin_fields .= '<li>
		<label for="'.$field['text'].'">'.ucfirst($field['text']).'</label>
		<div class="input">
		<?php echo form_'.$field['type'].'("'.$field['text'].'", set_value("'.$field['text'].'", $'.$field['text'].')); ?>
		</div>
		</li>';
	}
	return $admin_fields;
}

}





