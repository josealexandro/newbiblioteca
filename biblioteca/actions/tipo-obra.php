<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tipo-obra.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/messages.php');

function buscarTipoAction($cod_tipo) {
   return buscarTipoDb($cod_tipo);
}

function obterTiposAction() {
   return obterTiposDb();
}

function criarTipoAction($descricao) {
   $descricao = trim($descricao);
   
   $criarTipoDb = criarTipoDb($descricao);
   
   $_SESSION['alert'] = [
      'status' => $criarTipoDb == true ? 'success' : 'error',
      'action' => 'create'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function alterarTipoAction($cod_tipo, $descricao) {
   $descricao = trim($descricao);
   
   $alterarTipoDb = alterarTipoDb($cod_tipo, $descricao);
   
   $_SESSION['alert'] = [
      'status' => $alterarTipoDb == true ? 'success' : 'error',
      'action' => 'update'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function deletarTipoAction($cod_tipo) {
   $deletarTipoDb = deletarTipoDb($cod_tipo);
   
   $_SESSION['alert'] = [
      'status' => $deletarTipoDb == true ? 'success' : 'error',
      'action' => 'delete'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}
?>