<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/editora.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/messages.php');

function buscarEditoraAction($cod_editora) {
   return buscarEditoraDb($cod_editora);
}

function obterEditorasAction() {
   return obterEditorasDb();
}

function criarEditoraAction($nome, $estado, $cidade, $site_editora) {
   $nome = trim($nome);
   $estado = trim($estado);
   $cidade = trim($cidade);
   $site_editora = trim($site_editora);
   
   $criarEditoraDb = criarEditoraDb($nome, $estado, $cidade, $site_editora);
   
   $_SESSION['alert'] = [
      'status' => $criarEditoraDb == true ? 'success' : 'error',
      'action' => 'create'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function alterarEditoraAction($cod_editora, $nome, $estado, $cidade, $site_editora) {
   $nome = trim($nome);
   $estado = trim($estado);
   $cidade = trim($cidade);
   $site_editora = trim($site_editora);
   
   $alterarEditoraDb = alterarEditoraDb($cod_editora, $nome, $estado, $cidade, $site_editora);
   
   $_SESSION['alert'] = [
      'status' => $alterarEditoraDb == true ? 'success' : 'error',
      'action' => 'update'
   ];
   
	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function deletarEditoraAction($cod_editora) {
   $deletarEditoraDb = deletarEditoraDb($cod_editora);
   
   $_SESSION['alert'] = [
      'status' => $deletarEditoraDb == true ? 'success' : 'error',
      'action' => 'delete'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}
?>