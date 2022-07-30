<?php

function dd($ex) {
    die('<pre>' . print_r($ex, true) . '</pre>');
}