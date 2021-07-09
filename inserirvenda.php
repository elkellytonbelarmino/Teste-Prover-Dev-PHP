<?php
               include "conexao.php";

               $cliente = $_POST['cliente'];
               $produto = $_POST['produto'];
               $valor = $_POST['valor'];

               $sql = "INSERT INTO vendas ( `cliente`, `produto`, `valor`) VALUES ('$cliente','$produto','$valor')";
            
              if (mysqli_query($conn, $sql)) {
                    echo "<script>window.location='index.php';alert('Venda cadastrada com sucesso!');</script>";
                    
                } 
                else {
                    echo "<script>window.location='index.php';alert('ERRO! Não foi possível cadastrar a venda.');</script>";

                    
                    }
                mysqli_close($conn);
?>