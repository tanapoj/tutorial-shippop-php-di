<?php

include "autoload.php";

$uri = explode("?", $_SERVER["REQUEST_URI"])[0];
$classes = array_filter(explode("/", $uri));
//example: uri=post/view
//convert to: [controller]/post/view

$query_string = $_GET;

//no handler class --> add index
if (count($classes) == 0) {
    $classes[] = "index";
}
//no handler method --> add index
if (count($classes) == 1) {
    $classes[] = "index";
}

//add default handler to [controller]
// array_unshift($classes, "controllers");

//lastest is method name
$method = array_pop($classes);

//make Class name
$class = implode("\\", $classes);

echo "Router call $class::$method<hr/>";

//create handler object
$controller = new $class();
$controller->$method();