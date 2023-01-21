<?php

  include('./inc/config.inc.php');


if(isset($_POST['nome']) || isset($_POST['cpf']) || isset($_POST['senha'])) {

  if(strlen($_POST['nome']) == 0 ) {
    echo "<p class='alert alert-danger mt-3' role='alert'> Preencha seu nome.<a href='?pg=entrar' class='btn-danger'>Tentar novamente</a></p> "; 
  } else if(strlen($_POST['cpf']) == 0 ) {
    echo "<p class='alert alert-danger mt-3' role='alert'> Preencha seu CPF.<a href='?pg=entrar' class='btn-danger'>Tentar novamente</a></p> "; 
  } else if(strlen($_POST['senha'])==0) {
    echo "<p class='alert alert-danger mt-3' role='alert'> Preencha com uma senha.<a href='?pg=entrar' class='btn-danger'>Tentar novamente</a></p> "; 
  } else {
      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $senha = $_POST['senha'];

      $sql = "SELECT * FROM usuarios WHERE nome = '$nome' and cpf = '$cpf' and senha='$senha' ";
      
      $insert = mysqli_query($conn, $sql);


    $quantidade = $insert->num_rows;

    if($quantidade==1) {
        $usuario = $insert->fetch_assoc();

        if(!isset($_SESSION)) {
          session_start();
        }

        $_SESSION['nome'] = $usuario['nome']; 
        $_SESSION['cpf'] = $usuario['cpf']; 

        header("Location: ?pg=perfil");

    } else {
      echo "<p class='alert alert-danger text-center' role='alert'> Falha ao logar. Usuário, CPF ou senha incorretos.</p> "; 
    }

  }

}

?>
      

<div id="error">

</div>   


      <div class="row">
        
      <div class="col-md-6 offset-md-3">
            
        <div class="mb-3">
    
        <div  id="card-body-login" class="card-body cardbody-s p-lg-3">
            <a href="?pg=home"><i class="fas fa-solid fa-arrow-left" id="back"></i></a> 

        <form id="loginForm" method="POST">

            <div class="text-center">
              <img src="./assets/logo.png" id="logo" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" alt="ALAG Logo">
              <p>Login</p>
            </div>

            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nomeUsuario" placeholder="Usuário" name="nome" required>
            <label for="floatingInput">Nome <i class="fa-solid fa-asterisk"></i></label>
            </div>

            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf" minlength="11" maxlength="11"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
            <label for="floatingInput">CPF <i class="fa-solid fa-asterisk"></i></label>
            </div>

            <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Senha" name="senha" required>
            <label for="floatingPassword">Senha <i class="fa-solid fa-asterisk"></i></label>
            </div>

            <div class="buttonControl"><button type="submit" class="btn mt-3" id="sub-btn">Entrar</button></div> 
          </form>
          <p class="m-0 p-0">Não possui conta? <a class="btn m-0" href="?pg=registrar">Registrar</a></div> </p>
        </div>
          
        </div>

      </div>
    </div>
  

    <script defer>

  const divMsg = document.querySelector('#error')
  const cpfInput = document.querySelector('#cpf')
  const name = document.querySelector("#nomeUsuario")

  const loginForm = document.querySelector('#loginForm')

  cpfInput.addEventListener('paste', ()=> {
    cpfInput.value = ''
    divMsg.innerHTML = ''
    divMsg.innerHTML = "<p class='alert alert-danger mt-3' role='alert' style='text-align: center;' ><small>Não copie e cole.</small></p>"
    window.scrollTo({ top: 0, behavior: 'smooth' })
  })
  

loginForm.addEventListener('submit', (e)=> {
  if(cpfInput.value.length!==11) {
    loginForm.reset()
    divMsg.innerHTML = "<p class='alert alert-danger mt-3' role='alert' style='text-align: center;' ><small>O CPF deve ter 11 números.</small></p>"
    window.scrollTo({ top: 0, behavior: 'smooth' })
    e.preventDefault()
   }
   
})

  </script>

    
  </body>
</html>