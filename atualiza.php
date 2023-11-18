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
        header("Location: consulta.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "UPDATE usuarios SET nome='$nome', telefone='$telefone', email='$email', senha='$senha' WHERE id='$id'";

        if (mysqli_query($$conn, $sql)) {
            echo "Registro atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar registro: " . mysqli_error($conn);
        }
    }

    ?>

</body>