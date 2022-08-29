<?php

$router->get('/', function () {
    return redirect()->to('/customers');
});

$router->get('/customers', 'CustomerController@index');
$router->get('/customers/{customerId}', 'CustomerController@show');
