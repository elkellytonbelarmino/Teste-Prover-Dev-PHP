<?php 
include "conexao.php";

$id= $_POST["id"];
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];

$conn = mysqli_connect($server, $user, $pass, $bd);
mysqli_select_db($conn,$bd);
if (!empty($nome) && !empty($telefone) && !empty($email) ) {
    $sql = "UPDATE clientes SET nome='$nome', telefone='$telefone', email='$email' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Edição feita com sucesso!'); window.location = 'index.php';</script>";
    } else {
        echo "Deu erro: " . $sql . "<br>" . mysqli_error($conexao);
    }
} else {
    echo "<script> alert('Erro ao efetuar a atualização !'); window.location = 'editarcliente.php?id=$id';</script>";
}
mysqli_close($conexao);
?>