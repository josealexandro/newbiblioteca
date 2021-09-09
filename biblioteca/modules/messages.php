<?php
function printMessage($alert, $message) {
   echo '<div class="alert ' . $alert . ' alert-dismissible fade show" role="alert">
            ' . $message . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}

function printActionMessage() {
   $alert = createActionAlert();
   $message = createActionMessage();
   
   clearActionMessage();

   echo '<div class="alert ' . $alert . ' alert-dismissible fade show" role="alert">
            ' . $message . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}

function createActionAlert() {
   return ($_SESSION['alert']['status'] == 'success') ? 'alert-success' : 'alert-danger';
}

function createActionMessage() {
   $status = $_SESSION['alert']['status'];

   switch($_SESSION['alert']['action']) {
      case 'create':
         $action = $status == 'success' ? 'criado' : 'criar';
         break;
      case 'delete':
         $action = $status == 'success' ? 'removido' : 'remover';
         break;
      case 'update':
         $action =  $status == 'success' ? 'atualizado' : 'atualizar';
         break;
      default:
         $action = "";
         break;
   }
   $message = ($status == 'success') ? "Registro {$action} com sucesso!" : "Erro ao {$action} o registro: ";
   $message .= $_SESSION['alert']['message'] ?? '';

   return $message;
}

function clearActionMessage() {
   unset($_SESSION['alert']['status'],
         $_SESSION['alert']['action'],
         $_SESSION['alert']['message']);
}
?>