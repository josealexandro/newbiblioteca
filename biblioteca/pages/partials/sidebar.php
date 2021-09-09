<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <title>Dashboard</title>
      <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
      <!-- Bootstrap core CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
         .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
         }

         @media (min-width: 768px) {
            .bd-placeholder-img-lg {
               font-size: 3.5rem;
            }
         }
      </style>
      <!-- Custom styles for this template -->
      <link href="/assets/css/sidebars.css" rel="stylesheet">
      <link href="/assets/css/admin.css" rel="stylesheet">
   </head>
   <main>
      <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
         <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">Biblioteca</span>
         </a>
         <hr>
         <ul class="nav nav-pills flex-column mb-auto">
            <li>
               <a href="/pages/admin/index.php" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                  Dashboard
               </a>
            </li>
            <li>
               <a href="/pages/admin/autora/index.php" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                  Autoras
               </a>
            </li>
            <li>
               <a href="/pages/admin/editora/index.php" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                  Editoras
               </a>
            </li>
            <li>
               <a href="/pages/admin/obra/index.php" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                  Obras
               </a>
            </li>
            <li>
               <a href="/pages/admin/perfil/index.php" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                  Perfis de Usuário
               </a>
            </li>
            <li>
               <a href="/pages/admin/tipo-obra/index.php" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                  Tipos de Obra
               </a>
            </li>
            <li>
               <a href="/pages/admin/usuario/index.php" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                  Usuários
               </a>
            </li>
         </ul>
         <hr>
         <div class="dropdown">
            <form action="/pages/admin/login.php" method="POST" >
               <button type="submit" class="btn btn-outline-light" name="logout">Sair</button>
            </form>
         </div>
      </div>
   <div class="b-example-divider"></div>