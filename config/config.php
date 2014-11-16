<?php

return new \Phalcon\Config(array(
	'application' => array(
    'controllersDir'       => __DIR__ . '/../controllers/',
		'viewsDir'       => __DIR__ . '/../views/',
		'baseUri'        => '/pyro-module-generator/',
		'compiledPath'   => __DIR__ . '/../cache/volt/',
		'compileAlways'  => false
		)
	));

