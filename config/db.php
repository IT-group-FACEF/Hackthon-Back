<<<<<<< HEAD
<?php
$servername = "localhost";
$username = "root";
$password = ""; // Defina a senha correta para o usuário root
$dbname = "viver+";
=======
<?php 
>>>>>>> b005b548225cff45d63ec8c33b00a665ada0184c

require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon/Hackthon-Back/config/config.php';

	class Conection {

		public static function connect() {
			try {
				$conn = new PDO(DRIVE . ":host=" . LOCAL_DO_BANCO . ";dbname=" . NOME_DO_BANCO . ";charset=" . CHARSET , USUARIO, SENHA);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			} catch (PDOException $e) {
				echo "Database Error: " . $e->getMessage();
			}
		}
	};

<<<<<<< HEAD
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

return $conn;
=======
>>>>>>> b005b548225cff45d63ec8c33b00a665ada0184c
