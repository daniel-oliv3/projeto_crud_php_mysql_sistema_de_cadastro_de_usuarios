<?php
	session_start();
	include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>CRUD - Listar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<a href="cad_usuario.php">Cadastrar</a><br>
	<!--<a href="index.php">Listar</a><br>-->
	<h1>Listar Usuário</h1>
	<?php
		if(isset($_SESSION['msg'])){//se existir
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}

		//Paginação - recebe o numero da pagina
		$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);	
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 3;

		//Calcular o inicio da visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;


		//Imprimindo na tela
		$result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
		$resultado_usuarios = mysqli_query($conn, $result_usuarios);	
		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
			echo "ID: " . $row_usuario['id'] . "<br>";
			echo "Nome: " . $row_usuario['nome'] . "<br>";
			echo "E-mail: " . $row_usuario['email'] . "<br>";
			echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
			echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";

		}

		//Paginação soma a quantidade de uasuarios
		$result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);  //para ler o resultado dentro da variavel que veio do banco de dados

		//conta a quantidade de linhas no banco de dados
		//echo $row_pg['num_result'];

		//Quantidade de paginas
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

		//Limitar a quantidade de links(antes e depois)
		$max_links = 2;
		echo"<a href='index.php?pagina=1'>  Primeira  </a>";
		
		// <-- n
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina -1; $pag_ant++){
			if($pag_ant >= 1){  //teste 
				echo"<a href='index.php?pagina=$pag_ant'>  $pag_ant  </a>";
			}
		}

		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			
		}
		echo" $pagina ";

		// n -->
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){  //teste 
				echo"<a href='index.php?pagina=$pag_dep'>  $pag_dep  </a>";
			}
		}

		echo"<a href='index.php?pagina=$quantidade_pg'> Ultima  </a>";


	?>
</body>
</html>

<!-- 
Autor: Daniel Oliveira de Souza
Email: danielsapup3@gmail.com
-->