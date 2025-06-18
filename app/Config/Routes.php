<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/index', 'Home::index');
$routes->get('/blank', 'PagesController::blank');
$routes->get('/bootstrap-alert', 'PagesController::bootstrapAlert');
$routes->get('/bootstrap-badge', 'PagesController::bootstrapBadge');
$routes->get('/advanced-form', 'PagesController::advancedForm');
$routes->get('/editor-form', 'PagesController::editorForm');
$routes->get('/validation-form', 'PagesController::validationForm');
$routes->get('/multiple-upload', 'PagesController::multipleUpload');
$routes->get('/bootstrap-form', 'PagesController::bootstrapForm');


$routes->get('/preview/lihat', 'PreviewController::lihat');
$routes->get('/input/upload', 'DokumenController::upload');
$routes->post('/upload-dokumen', 'DokumenController::uploadDokumen');
$routes->get('/find-dokumen', 'DokumenController::findDokumen');
