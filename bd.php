<?php 
include 'config.php';

//verifica se o forms foi enviado

if ($_SERVER ["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $pais = $_POST['country'];

    //Preparar e executar a consulta
    $sql = "INSERT INTO usuarios (nome, email, pais) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $pais);

    if($stmt->execute()) {
        echo "Dados inseridos com sucesso!";
    }else {
        echo "Erro: " . $stmt->error;
    }
}
?>
