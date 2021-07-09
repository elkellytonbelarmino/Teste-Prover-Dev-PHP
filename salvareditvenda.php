<?php 
include "conexao.php";

$id= $_POST["id"];
$cliente = $_POST["cliente"];
$produto = $_POST["produto"];
$valor = $_POST["valor"];

$conn = mysqli_connect($server, $user, $pass, $bd);
mysqli_select_db($conn,$bd);
if (!empty($cliente) && !empty($produto) && !empty($valor) ) {
    $sql = "UPDATE vendas SET cliente='$cliente', produto='$produto', valor='$valor' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Edição feita com sucesso!'); window.location = 'index.php';</script>";
    } else {
        echo "Deu erro: " . $sql . "<br>" . mysqli_error($conexao);
    }
} else {
    echo "<script> alert('Erro ao efetuar a atualização !'); window.location = 'editarvenda.php?id=$id';</script>";
}
mysqli_close($conexao);
?>