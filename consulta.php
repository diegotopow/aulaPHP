<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "turma_ads4";

// Conexão com o DB
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Recupera o ID do registro a ser consultado
    $id = $_POST["id"];

    //Consulta o registro com base no ID
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nome = $row["nome"];
        $telefone = $row["telefone"];
        $email = $row["email"];
        $senha = $row["senha"];
    } else {
        echo "Registro não encontrado.";
    }
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
< head>
    <meta charset="utf-8">
    <title>Consulta e Atualização</title>
    </head>

    <body>
        <h2>Consultar e atualizar Registro</h2>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            ID doRegistro: <input type="text" name="id">
            <br>
            <br>
            <input type="submit" value="Consultar">
        </form>

        <?php if (isset($nome)) { ?>
            <h3>Registro Encontrado:</h3>
            <form method="post" action="atualiza.php">
                <input type="hiden" name="id" value="<?php echo $id; ?>">
                Nome:<br><input type="text" name="nome" value="<?php echo $nome; ?>"><br><br>
                Telefone:<br><input type="text" name="telefone" value="<?php echo $telefone; ?>"><br><br>
                Email:<br><input type="email" name="email" value="<?php echo $email; ?>"><br><br>
                Senha:<br><input type="password" name="senha" value="<?php echo $senha; ?>"><br><br>
                <input type="submit" value="Atualizar registro">
            </form>
        <?php } ?>
    </body>

</html>