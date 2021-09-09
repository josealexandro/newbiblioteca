<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/usuario.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/messages.php');

function buscarUsuarioAction($cod_editora) {
   return buscarUsuarioDb($cod_editora);
}

function obterUsuariosAction() {
   return obterUsuariosDb();
}

function criarUsuarioAction($nome, $email, $senha, $perfil_usuario) {
   $nome = trim($nome);
   $email = trim($email);
   $senha = trim($senha);
   $perfil_usuario = trim($perfil_usuario);
   
   $criarUsuarioDb = criarUsuarioDb($nome, $email, $senha, $perfil_usuario);
   
   $_SESSION['alert'] = [
      'status' => $criarUsuarioDb == true ? 'success' : 'error',
      'action' => 'create'
   ];

   if (!emailDisponivel($email)) $_SESSION['alert']['message'] = 'Já existe um cadastro com o email informado.';

	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function alterarUsuarioAction($cod_usuario, $nome, $email, $senha, $perfil_usuario) {
   $nome = trim($nome);
   $email = trim($email);
   $senha = trim($senha);
   $perfil_usuario = trim($perfil_usuario);
   
   $alterarUsuarioDb = alterarUsuarioDb($cod_usuario, $nome, $email, $senha, $perfil_usuario);
   
   $_SESSION['alert'] = [
      'status' => $alterarUsuarioDb == true ? 'success' : 'error',
      'action' => 'update'
   ];

   if (!emailDisponivel($email)) $_SESSION['alert']['message'] = 'Já existe um cadastro com o email informado.';
   
	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function deletarUsuarioAction($cod_usuario) {
   $deletarUsuarioDb = deletarUsuarioDb($cod_usuario);
   
   $_SESSION['alert'] = [
      'status' => $deletarUsuarioDb == true ? 'success' : 'error',
      'action' => 'delete'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function emailDisponivel($email) {
   return !buscarUsuarioEmailDb($email);
}
?>