<?php
require_once __DIR__ . '/../models/AuthModel.php'; // Certifique-se de incluir o modelo

class AuthController {
    private $authModel;

    public function __construct($conn) {
        $this->authModel = new AuthModel($conn); // Inicializa o AuthModel com a conexão
    }

    public function login() {
        header('Content-Type: application/json');

        $input = file_get_contents("php://input");
        $data = json_decode($input);

        $username = $data->username;
        $password = $data->password;

        // Usa o AuthModel para validar as credenciais
        $user = $this->authModel->validateUser($username, $password);

        if ($user !== false) {
            http_response_code(200);
            echo json_encode([
                'message' => 'success',
                'user' => $username // Retorna o nome de usuário para o front-end
            ]);
        } else {
            http_response_code(401);
            echo json_encode([
                'status' => 'failed',
                'message' => 'Credenciais inválidas'
            ]);
        }        
    }
}
