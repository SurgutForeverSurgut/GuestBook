<?php

Router::add('/', 'MainController@index');
Router::add('/book', 'BookController@index');
Router::add('/book/add/', 'BookController@add');
