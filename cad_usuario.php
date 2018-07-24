<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>CRUD - Cadastrar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<!--<a href="cad_usuario.php">Cadastrar</a><br>-->
	<a href="index.php">Listar</a><br>
	<h1>Cadastrar Usuário</h1>
	<?php
		if(isset($_SESSION['msg'])){ //se existir
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);  //destroi a variavel global
		}	

	?>
	<form method="POST" action="proc_cad_usuario.php">
		<label>Nome: </label>
		<input type="text" name="nome" placeholder="Digite o nome completo"><br><br>

		<label>E-mail: </label>
		<input type="email" name="email" placeholder="Digite o seu e-mail"><br><br>
		<input type="submit" value="Cadastrar">
	</form>
</body>
</html>