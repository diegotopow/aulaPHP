<?php 

$host = "localhost";
    $user = "root";
    $pass = "";
    $db = "turma_ads4";

    // Conexão com o DB
    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn) {
        // exit();
        // header("Location: deleta.html");
        die("Falha na conexão: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$id = $_POST["id"];
    	$sql = "DELETE FROM usuarios WHERE id='$id'";

    	if (mysqli_query($conn, $sql)) {
    		echo "Registro deletado com sucesso!";
    	} else {
    		echo "Erro ao deletar registro: " . mysqli_error($conn);
    		}
    	}

?>