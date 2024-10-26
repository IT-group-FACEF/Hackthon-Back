<?php
class AuthModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function validateUser($username, $password) {
        // Prepara a consulta ao banco de dados para verificar as credenciais
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE username = ? AND password = ?");
        
        if (!$stmt) {
            // Se a preparação falhar, retorna falso
            return false;
        }
        
        // Usa bind_param para associar os valores de forma segura
        $stmt->bind_param("ss", $username, $password); // "ss" indica dois parâmetros string
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    
        // Verifica se encontrou um usuário correspondente
        if ($user) {
            return $user; // Retorna os dados do usuário se o login for bem-sucedido
        } else {
            return false; // Retorna false se o usuário não for encontrado
        }
    }
    
}
