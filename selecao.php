<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$nome = $telefone = $email = $senha = "";

		$host = "localhost";
    	$user = "root";
    	$pass = "";
    	$db = "turma_ads4";

	try {

    		$pdo = new PDO("mysql:host=$host, dbname=$db", $user, $pass);

    		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPRION);

            //echo "Banco conectado com sucesso!";

    	} catch (PDOException $e) {
    		die("Falha na conexão: " . $e->getMessage());
    	}

    	$id = $_POST['id'];

    	$sql = "SELECT * FROM usuarios WHERE id = :id";
    	$stmt = $pdo->prepare($sql);
    	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
    	$stmt->execute();

    	$row = $stmt->fetch(PDO::FETCH_ASSOC);

    	if ($row) {
    		$nome = $row["nome"];
    		$telefone = $row["telefone"];
    		$email = $row["email"];
    		$senha = $row["senha"];
    	} else {
    		echo "Registro não encontrado!";
    	}
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Atualizar Cadastro</title>
 </head>
 <body>
 	<h2>Atualizar Cadastro</h2>
 	<form method="post" action="<?php echo "$_SERVER['PHP_SELF']"; ?>">
 		ID: <input type="text" name="id">
 		<input type="submit" name="Pesquisar">
 	</form>

 	<?php if (!empty($nome)) { ?>

 	<h3>Registro Encontrado:</h3>
 	<form method="post" action="atualizar.php">
 		<input type="hidden" name="id" value="<?php echo $id; ?>"><br>
 		Nome: <br> 
 		<input type="text" name="nome" <?php echo $nome; ?>><br>
 		Telefone: <br> 
 		<input type="number" name="telefone" <?php echo $telefone; ?>><br>
 		Email: <br> 
 		<input type="email" name="text" <?php echo $email; ?>><br>
 		Senha: <br> 
 		<input type="password" name="senha" <?php echo $senha; ?>><br>
 		<input type="submit" value="Atualizar cadastro"><br>
 	</form>
 	<?php } ?>
 </body>
 </html>