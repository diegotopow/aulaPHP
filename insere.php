<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="">
    <title>Pagina de envio</title>
</head>

<body>
    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "turma_ads4";

    // Conexão com o DB
    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn) {
        exit();
        header('Location: formulario1.html');
        exit();
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $sql = "INSERT INTO usuarios ($nome, $telefone, $email, $senha) VALUES ('$nome', '$telefone', '$email', '$senha')";

            if (mysqli_query($conn, $sql)) {
                echo "Registro inserido com sucesso!";
            } else {
                echo "Erro ao inserir registro: " . mysqli_error($conn);
            }
        }
    }

    ?>
</body>

</html>