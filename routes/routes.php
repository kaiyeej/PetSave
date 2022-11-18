<?php

$request = $_SERVER['REQUEST_URI'];

/** SET ROUTES HERE */
// insert routes alphabetically
$routes = array(
    "homepage" => array(
        'class_name' => '',
        'has_detail' => 0
    ),
    "about-us" => array(
        'class_name' => '',
        'has_detail' => 0
    ),
    "adopt" => array(
        'class_name' => '',
        'has_detail' => 0
    ),
    "shelters" => array(
        'class_name' => '',
        'has_detail' => 0
    ),
    "lost-found" => array(
        'class_name' => '',
        'has_detail' => 0
    ),
    "shelter-details" => array(
        'class_name' => 'Shelters',
        'has_detail' => 0
    ),
);
/** END SET ROUTES */

$base_folder = "pages/";
//$page = str_replace("/petsave/", "", $request);
$page = str_replace("/", "", $request);

// chec if has parameters
if (substr_count($page, "?") > 0) {
    $url_params = explode("?", $page);
    $dir = $base_folder . $url_params[0] . '/index.php';
    //$param = $url_params[1];
    $page = $url_params[0];
} else {

    if ($page == "" || $page == null) {
        $page = "homepage";
    }
    $dir = $base_folder . $page . '/index.php';
}

if (array_key_exists($page, $routes)) {
    require_once $dir;
    $route_settings = json_encode($routes[$page]);
} else {
    require_once "index.php";//'error-404.html';
    $route_settings = json_encode([]);
}
