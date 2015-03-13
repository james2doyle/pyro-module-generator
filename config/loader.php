<?php

/**
 * Registering an autoloader
 */
$loader = new \Phalcon\Loader();

$loader->registerDirs(array(
	$config->application->controllersDir
	)
);

$loader->registerNamespaces(
	array(
		'App\Controllers' => $config->application->controllersDir
		)
	);

$loader->register();