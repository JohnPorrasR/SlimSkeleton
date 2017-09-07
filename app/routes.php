<?php

$app->get('/', 'HomeController:index');

$app->get('/avistamientos', 'HomeController:avistamientos');

$app->get('/avistamientos/detalles', 'HomeController:avistamientosDetalles');

$app->post('/avistamientos/nuevo', 'HomeController:addAvistamiento');