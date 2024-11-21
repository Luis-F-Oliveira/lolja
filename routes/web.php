<?php

$routes = [
    '/' => 'HomeController@index',

    '/produto/create' => 'ProdutoController@create',

    '/produto/edit/{id}' => 'ProdutoController@edit',

    '/produto/store' => [
        'POST' => 'ProdutoController@store',
    ],

    '/produto/update' => [
        'POST' => 'ProdutoController@update',
    ],

    '/produto/destroy' => [
        'POST' => 'ProdutoController@destroy',
    ],

];
