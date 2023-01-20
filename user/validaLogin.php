<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['cpf'])) {
   errorMessage();
}

function errorMessage() {
    die("<div class='card mb-3' style='max-width: 70rem;'>
    <div class='row g-0'>
  
      <div class='col-md-4'>
        <img src='./assets/pessoa_mensagem.png' class='img-fluid rounded-start' alt='Erro'>
      </div>
  
      <div class='col-md-8 p-3'>
        
        <h3 class='card-title my-5'>Usuário não logado</h3>
        <p class='alert alert-danger card-text mt-3' role='alert'> Ops! Você precisa entrar na sua conta para acessar esse conteúdo.  <br><br> <a href='?pg=entrar' class='btn-danger'>Entre para continuar</a></p>
      </div>
  
      </div>
  </div>");
}

?>
