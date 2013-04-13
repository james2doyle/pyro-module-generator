<?php
// use compression mode
ob_start ("ob_gzhandler");
ob_start("compress");
header("Content-type: text/css; charset: UTF-8");
/* cache control to process */
header("Cache-Control: must-revalidate");
/* duration of cached content (1 hour) */
$offset = 60 * 60 ;
/* expiration header format */
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s",time() + $offset) . " GMT";
/* send cache expiration header to broswer */
header($ExpStr);

function compress($buffer) {
  /* remove comments */
  $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
  /* remove tabs, spaces, newlines, etc. */
  $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
  $buffer = str_replace('{ ', '{', $buffer);
  $buffer = str_replace(' }', '}', $buffer);
  $buffer = str_replace('; ', ';', $buffer);
  $buffer = str_replace(', ', ',', $buffer);
  $buffer = str_replace(' {', '{', $buffer);
  $buffer = str_replace('} ', '}', $buffer);
  $buffer = str_replace(': ', ':', $buffer);
  $buffer = str_replace(' ,', ',', $buffer);
  $buffer = str_replace(' ;', ';', $buffer);
  $buffer = str_replace(';}', '}', $buffer);
  $buffer = str_replace('@', ' @', $buffer);
  return $buffer;
}

/* css files for compression */
include('plugins.css');
include('workless.css');
include('typography.css');
include('font.css');
include('forms.css');
include('tables.css');
include('buttons.css');
include('alerts.css');
include('tabs.css');
include('pagination.css');
include('breadcrumbs.css');
include('helpers.css');
include('scaffolding.css');
include('print.css');
include('application.css');
include('styles.css');
// usage : <link href="css/minified.css.php" rel="stylesheet">
ob_end_flush();
?>