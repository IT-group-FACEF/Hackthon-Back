<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../router.php';

// Cria a conexão com o banco de dados a partir do config/db.php
$conn = require __DIR__ . '/../config/db.php';

// Instancia o AuthController, passando a conexão como argumento
$authController = new AuthController($conn);

$router = new Router();

// Define a rota POST para /login
$router->post('/login', function() use ($authController) {
    return $authController->login();
});

// Resolve a rota com base no método HTTP e URI
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
echo $router->resolve($method, $uri);
