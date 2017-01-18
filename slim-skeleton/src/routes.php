<?php
// Routes

$app->get('/hello/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/users', function ($request, $response, $args) {

    $table = $this->db->table('users');
    $users = $table->get();

    // Render index view
    return $this->renderer->render($response, 'users/index.phtml', ['users'=>$users]);
})->add($auth);

$app->post('/users', function ($request, $response, $args) {
    $data = [
      'name'=>filter_input(INPUT_POST, 'name'),
      'email'=>filter_input(INPUT_POST, 'email'),
      'password'=>filter_input(INPUT_POST, 'password')
    ];

    $table = $this->db->table('users');
    $users = $table->insert($data);

    return $response->withStatus(302)->withHeader('Location', '/users');
})->add($auth);

$app->get('/users/{id}', function ($request, $response, $args) {
    $id = $args['id'];

    $table = $this->db->table('users');
    $users = $table->where('id', $id)->delete();

    return $response->withStatus(302)->withHeader('Location', '/users');
})->add($auth);

$app->map(['GET', 'POST'] ,'/login', function($request, $response) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = filter_input(INPUT_POST, 'email');
      $password = filter_input(INPUT_POST, 'password');

      $table = $this->db->table('users');
      $users = $table->where([
        'email' => $email,
        'password' => $password
      ])->get();

      if ($users->count()) {
        $_SESSION['user'] = (array)$users->first();
        return $response->withStatus(302)->withHeader('Location', '/users');
      }
    }

    $this->renderer->render($response, 'login.phtml');
});
