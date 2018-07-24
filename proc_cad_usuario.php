<?php
session_start(); //sempre no inicio da pagina
include_once("conexao.php");

//receber os dados do formulario
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); //limpar o dados que vem do formulario
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

//inserindo os dados do formulario na tabela do banco de dados
$result_usuario = "INSERT INTO usuarios (nome, email, created) VALUES ('$nome', '$email', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);


//verificando se os dados foram salvo
if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:blue;'>Usuário cadastrado com sucesso!</p>";
	header("Location:index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado!</p>";
	header("Location:cad_usuario.php");
}

?>