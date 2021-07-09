<?php
               include "conexao.php";

               $nome = $_POST['nome'];
               $telefone = $_POST['telefone'];
               $email = $_POST['email'];

               $sql = "INSERT INTO clientes ( `nome`, `telefone`, `email`) VALUES ('$nome','$telefone','$email')";
            
              if (mysqli_query($conn, $sql)) {
                    echo "<script>window.location='index.php';alert('Cliente cadastrado com sucesso!');</script>";
                    
                } 
                else {
                    echo "<script>window.location='index.php';alert('ERRO! Não foi possível cadastrar o cliente.');</script>";

                    
                    }
                mysqli_close($conn);
?>