<?php
<<<<<<< HEAD
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
=======
require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon/Hackthon-Back/controllers/UserAddController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon/Hackthon-Back/controllers/AuthController.php'; 

$AuthController = new AuthController(); // Instancia a controller
$userAddController = new userAddController();

// Definir uma rota GET para /user
$router->get('/user/{id}', function($id) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon/Hackthon-Back/controllers/UserGetController.php';
});


// Definir uma rota POST para /login
$router->post('/login', function() use ($AuthController) {
    // Agora a variável $AuthController está acessível dentro da closure
    return $AuthController->login(); // Chama o método da controller
});

$router->get('/login', function() {
    
    return "teste login";
});

$router->post('/register', function() use ($userAddController) {
   
    return $userAddController->addUser(); // Chama o método do controlador para adicionar usuário
});



$router->post('/edit', function() {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon-Back/controllers/UserEditController.php'; 
});


>>>>>>> b005b548225cff45d63ec8c33b00a665ada0184c
