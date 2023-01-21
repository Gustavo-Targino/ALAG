<?php

   include('validaLogin.php');
   include('./inc/config.inc.php');

?>

<h1>Olá, <?=$_SESSION['nome'];?>!</h1>

<p>

    <a href="?pg=home" class="btn">Home</a>
    <a href="?pg=denuncia" class="btn">Denunciar alagamento</a>
    <a href="?pg=sair" class="btn">Sair</a>

</p>



<?php

$sql = "SELECT * FROM ocorrencias WHERE cpf = '$cpfDaSessao' ";

$todos = mysqli_query($conn, $sql);

?>

<section class="intro">
  <div>
    <div class="mask d-flex align-items-center">
      
      <div class="container">
        
        <div class="row justify-content-center">
          <p id="successP" style="text-align: center;"></p>
          <div class="col-20">
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered border-dark caption-top mb-0">
              <caption style="text-align: center;"> <strong>Suas denúncias</strong></caption>
        
                <thead class="table-dark">
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
                    <td><?=$dados['intensidade'];?></td>
                    <td><?=$dados['classificacao'];?></td>
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