<?php

/**
 * Landing page
 */
$app->get('/', function () use ($app) {
  $app->view->count = 0;
	echo $app->render('index/index');
});

/**
 * Generate a new set of fields to use
 */
$app->post('/get_form', function () use ($app) {
  $template = $app->render('partials/form', array(
    'count' => (int)$app->request->getPost('count')
    ));
  $app->response->setContentType('application/json', 'UTF-8');
  $app->response->setJsonContent(array(
    "status" => "OK",
    'message' => $template
    ));
  $app->response->send();
});

/**
 * Form Submission
 */
$app->post('/submit', function () use ($app) {
  $builder = new BuildController();
  $zip = $builder->makeTemplate($app->request->getPost());
  $app->response->redirect('complete/'.$zip)->sendHeaders();
});

/**
 * Error building the module
 */
$app->get('/error', function () use ($app) {
  echo $app->render('errors/error');
});

/**
 * Module has been built
 */
$app->get('/complete/{zipfile}', function ($zipfile) use ($app) {
	echo $app->render('index/complete', array(
    'zipfile' => $zipfile
    ));
});

/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
	$app->response->setStatusCode(404, "Not Found")->sendHeaders();
	echo $app->render('errors/404');
});