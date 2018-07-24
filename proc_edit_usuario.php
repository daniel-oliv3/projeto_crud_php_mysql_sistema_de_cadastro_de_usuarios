<?php
session_start(); //sempre no inicio da pagina
include_once("conexao.php");

//receber os dados do formulario
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT); 
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); //limpar o dados que vem do formulario
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


//inserindo os dados do formulario na tabela do banco de dados
$result_usuario = "UPDATE usuarios SET nome='$nome', email='$email', modifield=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);


//verificando se os dados foram salvo
if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:blue;'>Usuário editado com sucesso!</p>";
	header("Location:index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado!</p>";
	header("Location:editar.php?id=$id");
}

?>