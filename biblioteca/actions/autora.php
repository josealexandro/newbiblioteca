<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/autora.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/messages.php');

function buscarAutoraAction($cod_autora) {
   return buscarAutoraDb($cod_autora);
}

function obterAutorasAction() {
   return obterAutorasDb();
}

function criarAutoraAction($nome, $biografia, $foto, $data_nasc, $data_morte, $instagram, $facebook, $twitter, $site_autora) {
   $nome = trim($nome);
   $biografia = trim($biografia);
   $foto = !empty($foto) ? file_get_contents($foto) : NULL;
   $instagram = trim($instagram);
   $facebook = trim($facebook);
   $twitter = trim($twitter);
   $site_autora = trim($site_autora);
   
   $criarAutoraDb = criarAutoraDb($nome, $biografia, $foto, $data_nasc, $data_morte, $instagram, $facebook, $twitter, $site_autora);
   
   $_SESSION['alert'] = [
      'status' => $criarAutoraDb == true ? 'success' : 'error',
      'action' => 'create'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function alterarAutoraAction($cod_autora, $nome, $biografia, $foto, $data_nasc, $data_morte, $instagram, $facebook, $twitter, $site_autora) {
   $nome = trim($nome);
   $biografia = trim($biografia);
   $foto = !empty($foto) ? file_get_contents($foto) : NULL;
   $instagram = trim($instagram);
   $facebook = trim($facebook);
   $twitter = trim($twitter);
   $site_autora = trim($site_autora);
   
   $alterarAutoraDb = alterarAutoraDb($cod_autora, $nome, $biografia, $foto, $data_nasc, $data_morte, $instagram, $facebook, $twitter, $site_autora);
   
   $_SESSION['alert'] = [
      'status' => $alterarAutoraDb == true ? 'success' : 'error',
      'action' => 'update'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}

function deletarAutoraAction($cod_autora) {
   $deletarAutoraDb = deletarAutoraDb($cod_autora);
   
   $_SESSION['alert'] = [
      'status' => $deletarAutoraDb == true ? 'success' : 'error',
      'action' => 'delete'
   ];

	return header("Location: " . $_SERVER["PHP_SELF"]);
}
?>