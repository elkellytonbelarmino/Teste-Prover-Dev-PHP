<?php

require 'conexao.php';

$query0 = mysqli_query($conn, "SELECT * FROM clientes");
$query = mysqli_query($conn, "SELECT * FROM clientes");
$query1 = mysqli_query($conn, "SELECT * FROM produtos");
$query2 = mysqli_query($conn, "SELECT * FROM vendas");
?>

<!doctype html>
<html lang="pt-BR">
  <meta charset="utf-8">
  <head>
  	<title>Exercício Prover Tecnologia</title>
  	<link rel="icon" href="img/ico.png" type="image/x-icon"/>
	<link rel="shortcut icon" href="img/ico.png" type="image/x-icon"/>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  </head>
  <body>

  	<!-- Titulo e botões do menu -->

	<p>
		<h4 class="text-center">Gestão de Clientes/Vendas</h4>
        <br>
  			<div class="container text-center">
                <a href="index.php"><button type="button" class="btn btn-info">Inicio</button></a> 
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#RegistroVenda">Registrar Venda</button>
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CadastroCliente">Cadastrar Cliente</button>
                   <a href="listagemvendas.php"> <button type="button" class="btn btn-warning" >Listagem Vendas</button></a>
                   <a href="listagemclientes.php"><button type="button" class="btn btn-warning">Listagem Clientes</button></a> 
            </div>
	</p>

	<!-- Fim do titulo e botões do menu -->

<!-- Inicio da Tabela de Vendas -->

<div class="container-fluid" style="margin-top: 30px;">
    <div class="container col-md-12" align="center">
    	<hr>
    	<h3>Listagem de Vendas</h3>
        <table class="table table-bordered text-center" style="max-width:1250px;">
        	
        <thead class="thead-dark">
            <tr>
                <th class="align-middle">ID</td>
                <th class="align-middle">Cliente</td>
                <th class="align-middle">Produto</td>
                <th class="align-middle">Valor</td>
                <th class="align-middle">Editar</td>
                <th class="align-middle">Excluir</td>
            </tr>
            <thead class="thead-dark">
            <?php while($linhas = mysqli_fetch_array($query2)){ ?>
            <tr>
                <td><?php echo $linhas["id"]; ?></td>
                <td><?php echo $linhas["cliente"]; ?></td>
                <td><?php echo $linhas["produto"]; ?></td>
                <td><?php echo $linhas["valor"]; ?></td>
                <td><a href="editarvenda.php?id=<?php echo $linhas['id'] ?>" class="btn btn-warning">Editar</a></td>
                <td><form method="post">
                	<button class="btn btn-danger" type="submit"><input type="hidden" name="excluir" value="<?= $linhas["id"] ?>">Excluir</button>
                     </form></td>
            </tr> 
            <?php } ?>       
        </table>
        </div>
        </div>

        <!-- Fim da Tabela de Vendas -->

	  <!-- Inicio Modal para Registro de venda -->

  <div class="modal fade" id="RegistroVenda">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Titulo do Modal -->
        <div class="modal-header">
          <h5 class="modal-title">Registro de Venda</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Corpo do Modal -->
        <div class="modal-body">

        	
          <form action="inserirvenda.php" method="POST">
        <div class="container" style="max-width:370px;">
        <div class="form-group" style="">
            <label for="cliente">Cliente</label>
            <select class="form-control" name="cliente">
        <option>Selecionar Cliente...</option>
        <?php while($cliente = mysqli_fetch_array($query)) { ?>
        <option value="<?php echo $cliente['nome'] ?>"><?php echo $cliente['nome'] ?></option>
        <?php } ?>
        </select>
        </div>

         <div class="form-group">
            <label>Produto</label>        
            <select class="form-control" name="produto">
        <option>Selecionar produto...</option>
        <?php while($produto = mysqli_fetch_array($query1)) { ?>
        <option value="<?php echo $produto['nome'] ?>"><?php echo $produto['nome'] ?></option>
        <?php } ?>
        </select>
        </div>

        <div class="form-group">
            <label for="telefone">Valor em R$</label>
            <input type="text" class="form-control money" id="input" aria-describedby="valor" placeholder="Informe o valor em Reais" name="valor" required>
        </div>
        </div>
        <!-- Rodapé do Modal -->

        <div style="margin-top: 20px;" class="modal-footer">
        	<button type="submit" class="btn btn-success">Registrar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
  </div>
</div>
<!-- Fim do Modal -->

  <!-- Inicio Modal para Registro de Clientes -->

  <div class="modal fade" id="CadastroCliente">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Titulo do Modal -->
        <div class="modal-header">
          <h5 class="modal-title">Cadastro de Cliente</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Corpo do Modal -->
        <div class="modal-body">
          <form action="inserircliente.php" method="POST">
        <div class="container" style="max-width:370px;">
        <div class="form-group" style="">
            <strong label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" aria-describedby="nome" placeholder="Digite o nome do cliente" name="nome" required>
        </div>
        
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" maxlength="15" class="form-control" id="telefone" aria-describedby="telefone" placeholder="(00) 00000-0000" name="telefone" onkeypress="mask(this, telmask);" onblur="mask(this, telmask);" required> 
        </div>

        <div class="form-group">
            <label for="e-mail">Endereço de e-mail</label>
            <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Digite seu e-mail" name="email" required>
        </div>
        </div>
        <!-- Rodapé do Modal -->

        <div style="margin-top: 20px;" class="modal-footer">
        	<button type="submit" class="btn btn-success">Cadastrar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
  </div>
</div>
<!-- Fim do Modal -->

<!-- Script de Exclusão de -->

 <?php

if(isset($_POST['excluir']) && filter_input(INPUT_POST, 'excluir', FILTER_VALIDATE_INT) !== false){

    $id = mysqli_real_escape_string($conn, $_POST['excluir']);

    $sql2     = "delete from vendas where id='$id'";
    $qry2     = mysqli_query($conn,$sql2);

    if (mysqli_query($conn, $sql2)) {
                    echo "<script>window.location='listagemvendas.php';alert('Venda excluída com sucesso!');</script>";
                    
                } 
                else {
                    echo "<script>window.location='listagemvendas.php';alert('ERRO! Não foi possível excluir a venda.');</script>";                    
   }

}
   mysqli_close($conn);
?>

<!-- Fim do Script de Exclusão-->


<!-- Script de Máscaras (input) -->

     <script type="text/javascript">
    function mask(o, f) {
  setTimeout(function() {
    var v = telmask(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}

function telmask(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, "");
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
}

$(document).ready(function(){
   $('.money').mask('000.000.000.000.000,00', {reverse: true});
  
  $(".money").change(function(){
    $("#value").html($(this).val().replace(/\D/g,''))
  })
  
});
    </script>  

<!-- Fim do Script de Máscaras (input) -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
  </body>
</html>