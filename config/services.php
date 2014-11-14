<?php

use Phalcon\Mvc\View,
	Phalcon\Mvc\Url as UrlResolver,
	Phalcon\DI\FactoryDefault,
	Phalcon\Mvc\View\Engine\Volt;

$di = new FactoryDefault();

/**
 * Sets the view component
 */
$di['view'] = function() use ($config) {
	$view = new View();
	$view->setViewsDir($config->application->viewsDir);
	$view->registerEngines(array(
		'.volt' => function($view, $di) use ($config) {
			$volt = new Volt($view, $di);
			$volt->setOptions(
				array(
					'compiledPath'      => $config->application->compiledPath,
					'compiledExtension' => '.php',
					'compiledSeparator' => '_',
					'compileAlways'     => $config->application->compileAlways
				)
			);
			return $volt;
		}
	));
	return $view;
};

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di['url'] = function() use ($config) {
	$url = new UrlResolver();
	$url->setBaseUri($config->application->baseUri);
	return $url;
};