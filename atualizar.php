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
    	$nome = $_POST['nome'];
    	$telefone = $_POST['telefone'];
    	$email = $_POST['email'];
    	$senha = $_POST['senha'];

    	$sql = "UPDATE usuarios SET nome = :nome, telefone = :telefone, email = :email, senha = :senha WHERE id = :id";
    	$stmt = $pdo->prepare($sql);
    	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
    	$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    	$stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
    	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
    	$stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
    	if ($stmt->execute()) {
    		echo "Cadastro atualizado com sucesso!";
    	} else {
    		echo "Erro na atualização do cadastro!";
    	}

    } else {
    	echo "Conexão não estabelecida!"
    }
?>