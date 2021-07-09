<?php 
	include "conexao.php";


	$id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM vendas WHERE id=$id");
    $data = mysqli_fetch_assoc($query);

?>

<html>
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta nome="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Editar Venda - Prover</title>
    <link rel="shortcut icon" href="img/ico.png">
    </head>
    <body>
    <div class="container col-md-12" style="max-width:400px;margin-top:100px;" align="center">
    <h2>Editar Venda</h2>
		<hr>
		<form method="post" action="salvareditvenda.php" id="formEditvenda">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

			<div class="form-group">
				<label class="form-label">Cliente: </label>
				<input type="text" class="form-control" id="cliente" name="cliente" value="<?php echo $data['cliente']; ?>" required>
			</div>

			<div class="form-group">
				<label class="form-label">Produto: </label>
				<input type="text" class="form-control" id="produto" name="produto" value="<?php echo $data['produto']; ?>" required>
			</div>

			<div class="form-group">
				<label class="form-label">Valor: </label>
				<input type="text" class="form-control" id="valor" name="valor" value="<?php echo $data['valor']; ?>" required>
			</div>
			<hr>
			<a href="">
				<button type="submit" class="btn btn-success form-contro">Atualizar</button>
                <a href="listagemvendas.php" class="btn btn-primary">Voltar</a>
			</a>
		</form>
	</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>     