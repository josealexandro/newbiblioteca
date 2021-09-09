<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/obra.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/messages.php');

function buscarObraAction($cod_obra) {
   return buscarObraDb($cod_obra);
}

function obterObrasAction() {
   return obterObrasDb();
}

function obterObrasAutoraAction($cod_autora) {
   return obterObrasAutoraDb($cod_autora);
}

function criarObraAction($titulo, $resumo, $ano, $capa, $url, $autora_obra, $tipo_obra, $editora_obra) {
   $titulo = trim($titulo);
   $resumo = trim($resumo);
   $ano = trim($ano);
   $capa = !empty($capa) ? file_get_contents($capa) : NULL;
   $url = trim($url);
   $autora_obra = trim($autora_obra);
   $tipo_obra = trim($tipo_obra);
   $editora_obra = trim($editora_obra);
   
   $criarObraDb = criarObraDb($titulo, $resumo, $ano, $capa, $url, $autora_obra, $tipo_obra, $editora_obra);
   
   $_SESSION['alert'] = [
      'status' => $criarObraDb == true ? 'success' : 'error',
      'action' => 'create'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function alterarObraAction($cod_obra, $titulo, $resumo, $ano, $capa, $url, $autora_obra, $tipo_obra, $editora_obra) {
   $titulo = trim($titulo);
   $resumo = trim($resumo);
   $ano = trim($ano);
   $capa = !empty($capa) ? file_get_contents($capa) : NULL;
   $url = trim($url);
   $autora_obra = trim($autora_obra);
   $tipo_obra = trim($tipo_obra);
   $editora_obra = trim($editora_obra);
   
   $alterarObraDb = alterarObraDb($cod_obra, $titulo, $resumo, $ano, $capa, $url, $autora_obra, $tipo_obra, $editora_obra);
   
   $_SESSION['alert'] = [
      'status' => $alterarObraDb == true ? 'success' : 'error',
      'action' => 'update'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function deletarObraAction($cod_obra) {
   $deletarObraDb = deletarObraDb($cod_obra);
   
   $_SESSION['alert'] = [
      'status' => $deletarObraDb == true ? 'success' : 'error',
      'action' => 'delete'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}
?>