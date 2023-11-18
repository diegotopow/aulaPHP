<?php 

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$host = "localhost";
    	$user = "root";
    	$pass = "";
    	$db = "turma_ads4";

		try {

    		$pdo = new PDO("mysql:host=$host, dbname=$db", $user, $pass);

    		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPRION);

    	} catch (PDOException $e) {
    		die("Falha na conexão: " . $e->getMessage());
    	}

    	$id = $_POST['id'];

    	$sql = "DELETE FROM usuarios WHERE id = :id";
    	$stmt = $pdo->prepare($sql);
    	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
    	if ($stmt->execute()) {
    		echo "Usuário dxcluído com sucesso!";
    	} else {
    		echo "Erro na exclusão do cadastro!";
    	}

    } else {
    	echo "Conexão não estabelecida!"
    }
?>