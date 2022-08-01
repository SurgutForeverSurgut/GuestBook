<?php

use core\Router;

Router::add('/', 'BookController@index');
Router::add('/book', 'BookController@add');
Router::add('/table', 'BookController@getTable');
