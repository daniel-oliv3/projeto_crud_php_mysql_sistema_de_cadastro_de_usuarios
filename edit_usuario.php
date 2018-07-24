<?php
	session_start();
	include_once("conexao.php");
	$id = filter_input(INPUT_GET, FILTER_SANITIZE_NUMBER_INT);
	$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>CRUD - Editar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<!--<a href="index.php">Cadastrar</a><br>-->
	<a href="listar.php">Listar</a><br>
	<h1>Editar Usuário</h1>
	<?php
		if(isset($_SESSION['msg'])){ //se existir
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);  //destroi a variavel global
		}	

	?>
	<form method="POST" action="proc_edit_usuario.php">
		<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>"><br><br>

		<label>Nome: </label>
		<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>

		<label>E-mail: </label>
		<input type="email" name="email" placeholder="Digite o seu e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>
		<input type="submit" value="Editar">
	</form>
</body>
</html>