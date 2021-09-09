<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/perfil.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/messages.php');

function buscarPerfilAction($cod_perfil) {
   return buscarPerfilDb($cod_perfil);
}

function obterPerfisAction() {
   return obterPerfisDb();
}

function criarPerfilAction($descricao) {
   $descricao = trim($descricao);
   
   $criarPerfilDb = criarPerfilDb($descricao);
   
   $_SESSION['alert'] = [
      'status' => $criarPerfilDb == true ? 'success' : 'error',
      'action' => 'create'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function alterarPerfilAction($cod_perfil, $descricao) {
   $descricao = trim($descricao);
   
   $alterarPerfilDb = alterarPerfilDb($cod_perfil, $descricao);
   
   $_SESSION['alert'] = [
      'status' => $alterarPerfilDb == true ? 'success' : 'error',
      'action' => 'update'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function deletarPerfilAction($cod_perfil) {
   $deletarPerfilDb = deletarPerfilDb($cod_perfil);
   
   $_SESSION['alert'] = [
      'status' => $deletarPerfilDb == true ? 'success' : 'error',
      'action' => 'delete'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}
?>