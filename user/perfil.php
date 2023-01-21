<?php

   include('validaLogin.php');
   include('./inc/config.inc.php');

?>


<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">

<h1 style="text-align: justify;">Olá, <?=$_SESSION['nome'];?>!</h1>

<div class="card mb-3" style="max-width: 50rem;">
  <div class="row g-0">
    <div class="col-md-8">
    <div class="card-body">
        <h5 class="card-title">Seu Perfil</h5>
        <p class="card-text">Visualize abaixo as ações que sua conta pode fazer e suas denúncias.</p>
        <a href="?pg=denuncia" class="btn">Denunciar Alagamento</a>
        <a href="?pg=sair" class="btn">Sair da conta</a>
      </div>
    </div>
    <div class="col-md-4">
      <img src="./assets/profile_person.png" class="img-fluid rounded-start" alt="Capa perfil">
    </div>
  </div>
</div>



<?php

$sql = "SELECT * FROM ocorrencias WHERE cpf = '$cpfDaSessao' ";

$todos = mysqli_query($conn, $sql);

?>

  <section class="intro">
  <div>
    <div class="mask d-flex align-items-center">
      
      <div class="container">
        
        <div class="row justify-content-center">
          <div class="col-20">
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered border-light caption-top mb-0">
              <caption style="text-align: center;"> <strong>Suas denúncias</strong></caption>
        
                <thead class="table-primary">
                  <tr>
                    <th scope="col">Local</th>
                    <th scope="col">Intensidade</th>
                    <th scope="col">Classificação</th>
                    <th scope="col">Data e hora</th>
                  </tr>
                </thead>
                <tbody>

                <?php while ($dados=mysqli_fetch_array($todos)) {?>
                  <tr>
                    <td scope="row"><?=$dados['endereco'];?></td>
                    <td><?=ucfirst( $dados['intensidade']);?></td>
                    <td><?= ucfirst( $dados['classificacao']);?></td>
                    <td><?=$dados['data_envio'];?></td>
                  </tr>
          
                  <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</div>
  
  



