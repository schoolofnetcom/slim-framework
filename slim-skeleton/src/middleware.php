<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

$auth = function ($request, $response, $next) {
  if (isset($_SESSION['user']) and is_array($_SESSION['user'])) {
    $response = $next($request, $response);
  } else {
    $response = $response->withStatus(401)->write('Page protected');
  }

  return $response;
};

//$app->add($auth);
