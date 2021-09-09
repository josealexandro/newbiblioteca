<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/usuario.php');

function loginAction($email, $senha): ?bool {
   $email = stripcslashes(strip_tags($email));
   $senha = htmlspecialchars($senha);

   $row = buscarUsuarioEmailDb($email);

   if (is_array($row)) {
      if (password_verify($senha, $row['senha'])) {
         $_SESSION['current_session'] = [
            'status' => 1,
            'name' => $row['nome'],
            'email' => $row['email'],
            'date_time' => date('Y-m-d H:i:s'),
         ];
         //header("Location: ./index.php");
         return true;
      }
   }
   return false;
}

function logoutAction() {
   //session_start();
   unset($_SESSION["current_session"]);
   //header("Location: ./index.php");
   //exit();
}
?>