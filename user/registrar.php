<?php

  include('./inc/config.inc.php');

if(isset($_POST['nome']) || isset($_POST['cpf']) || isset($_POST['senha'])) {

  if(strlen($_POST['nome']) == 0 ) {
    echo "<p class='alert alert-danger mt-3' role='alert'> Preencha seu nome.</p> "; 
  } else if(strlen($_POST['cpf']) == 0 ) {
    echo "<p class='alert alert-danger mt-3' role='alert'> Preencha seu CPF.</p> "; 
  } else if(strlen($_POST['senha'])==0) {
    echo "<p class='alert alert-danger mt-3' role='alert'> Preencha com uma senha.</p> "; 
  } else {
      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $senha = $_POST['senha'];

    $verificaCPF = "SELECT * FROM usuarios WHERE cpf = '$cpf' ";
    $retornoVerificacao = mysqli_query($conn, $verificaCPF);
    
  
    if(mysqli_num_rows($retornoVerificacao)!==0) {
    
        echo "<p class='alert alert-danger mt-3' role='alert'> Falha ao registrar. Já existe um usuário com este CPF. </p> ";
    } else {
        $sql = "INSERT INTO usuarios (nome, cpf, senha)  VALUES ('$nome', '$cpf','$senha')";
        $insert = mysqli_query($conn, $sql);
        header('Location: ?pg=usuario_registrado');
    }

       
           
  }

}

?>



<div id="error">

            </div>   

<div class="row">
        
        <div class="col-md-6 offset-md-3">
              
          <div class="mb-3">
      
          <div id="card-body-login" class="card-body cardbody-s p-lg-3">
              <a href="?pg=home"><i class="fas fa-solid fa-arrow-left" id="back"></i></a> 
  
          <form id="registerForm" method="POST" >
  
              <div class="text-center">
                <img src="./assets/logo.png" id="logo" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" alt="ALAG Logo">
                <p>Registrar</p>
              </div>
  
              <div class="form-floating mb-3">
              <input type="text" class="form-control" id="nome" placeholder="Usuário" name="nome" required>
              <label for="floatingInput">Nome <i class="fa-solid fa-asterisk"></i></label>
              </div>
  
              <div class="form-floating mb-3">
              <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="11" maxlength="11" required>
              <label for="floatingInput">CPF <i class="fa-solid fa-asterisk"></i></label>
              </div>
  
              <div class="form-floating">
              <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" required>
              <label for="floatingPassword">Senha <i class="fa-solid fa-asterisk"></i></label>
              </div>
  
              <div class="buttonControl"><button type="submit" class="btn mt-3" id="sub-btn">Registrar</button></div> 
            </form>
            <p class="m-0 p-0">Já possui conta? <a class="btn m-0" href="?pg=entrar">Entrar</a></div> </p>
          </div>
            
          </div>
  
        </div>
      </div>
    
  <script defer>

  const divMsg = document.querySelector('#error')
  const cpfInput = document.querySelector('#cpf')


  const registerForm = document.querySelector('#registerForm')

  cpfInput.addEventListener('paste', ()=> {
    cpfInput.value = ''
    divMsg.innerHTML = "<p class='alert alert-danger mt-3' role='alert' style='text-align: center;' ><small>Não copie e cole.</small></p>"
    window.scrollTo({ top: 0, behavior: 'smooth' })
  })
  

registerForm.addEventListener('submit', (e)=> {
  if(cpfInput.value.length!==11) {
    registerForm.reset()
    divMsg.innerHTML = "<p class='alert alert-danger mt-3' role='alert' style='text-align: center;' ><small>O CPF deve ter 11 números.</small></p>"
    window.scrollTo({ top: 0, behavior: 'smooth' })
    e.preventDefault()
   }
})

  </script>
      
    </body>
  </html>