<?php

function dd($ex) {
    echo '<pre>' . print_r($ex, true) . '</pre>';
    die;
}