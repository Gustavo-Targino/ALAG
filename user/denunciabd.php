<?php


include('validaLogin.php');


include('./inc/config.inc.php');


$numeroDeFotos = 0;

if(isset($_POST['cep'])){
   
    date_default_timezone_set('America/Sao_Paulo');

    $data_e_hora = date('d/m/Y H:i:s', time());

    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $localidade = $_POST['localidade'];
    $uf = $_POST['uf'];
    $complemento = $_POST['complemento'];

    $local = $logradouro . ', ' . $bairro . ', ' . $localidade . ', ' . $uf . ', ' . $complemento;

    $intensidade = $_POST['intensidade'];
    $classificacao = $_POST['classificacao'];

    $mensagem = $_POST['mensagem'];

    $naoExisteImagem = empty($_FILES['fotos']['name'][0]);
    
    $naoExisteMensagem = empty($mensagem);


    $novosNomes = [];
    $paths = [];


    //Imagem sim, mensagem sim
    if($naoExisteImagem==false && $naoExisteMensagem==false) {
        

        $sucesso = salvarImagem();

        if($sucesso) {
            
            if($numeroDeFotos==1) {
                $sql = "INSERT INTO ocorrencias (nome, cpf, data_envio, nome_img_1, path_1, nome_img_2, path_2, endereco, intensidade, classificacao, mensagem) VALUES ('$nomeDaSessao', '$cpfDaSessao', '$data_e_hora','$novosNomes[0]','$paths[0]', 'null' , 'null',  '$local', '$intensidade', '$classificacao', '$mensagem')";
                //===== FEITO FEITO FEITO FEITO FEITO
                $insert = mysqli_query($conn, $sql);
                formularioEnviado();
            }

            if($numeroDeFotos==2) {
                $nomeFotoUm = $novosNomes[0];
                $pathFotoUm = $paths[0];

               $nomeFotoDois = $novosNomes[1];
               $pathFotoDois = $paths[1];

               $sql = "INSERT INTO ocorrencias (nome, cpf, data_envio, nome_img_1, path_1, nome_img_2, path_2, endereco, intensidade, classificacao, mensagem) VALUES ('$nomeDaSessao', '$cpfDaSessao', '$data_e_hora','$nomeFotoUm','$pathFotoUm', '$nomeFotoDois' , '$pathFotoDois',  '$local', '$intensidade', '$classificacao', '$mensagem')";
               
               $insert = mysqli_query($conn, $sql);
               formularioEnviado();

            }
            
           
        } else {
            formularioNaoEnviado();
            exit;
        }

    }

    //Imagem sim, mensagem não
    if($naoExisteImagem==false && $naoExisteMensagem) {
        $sucesso = salvarImagem();

        if($sucesso) {
            if($numeroDeFotos==1) {
                $sql = "INSERT INTO ocorrencias (nome, cpf, data_envio, nome_img_1, path_1, nome_img_2, path_2, endereco, intensidade, classificacao, mensagem) VALUES ('$nomeDaSessao', '$cpfDaSessao' , '$data_e_hora','$novosNomes[0]','$paths[0]', 'null' , 'null',  '$local', '$intensidade', '$classificacao', 'null')";
                
                $insert = mysqli_query($conn, $sql);
                formularioEnviado();
            }

            if($numeroDeFotos==2) {
                $nomeFotoUm = $novosNomes[0];
                $pathFotoUm = $paths[0];

               $nomeFotoDois = $novosNomes[1];
               $pathFotoDois = $paths[1];

               $sql = "INSERT INTO ocorrencias (nome, cpf, data_envio, nome_img_1, path_1, nome_img_2, path_2, endereco, intensidade, classificacao, mensagem) VALUES ('$nomeDaSessao', '$cpfDaSessao' ,'$data_e_hora','$nomeFotoUm','$pathFotoUm', '$nomeFotoDois' , '$pathFotoDois',  '$local', '$intensidade', '$classificacao', 'null')";
               
               $insert = mysqli_query($conn, $sql);
               formularioEnviado();

            }
           
        } else {
            formularioNaoEnviado();
            exit;
        }

    } 
    
    //Imagem não, mensagem sim
    if($naoExisteImagem && $naoExisteMensagem==false) {
        $sql = "INSERT INTO ocorrencias (nome, cpf, data_envio, nome_img_1, path_1, nome_img_2, path_2, endereco, intensidade, classificacao, mensagem) VALUES ('$nomeDaSessao', '$cpfDaSessao' , '$data_e_hora','null','null', 'null' , 'null',  '$local', '$intensidade', '$classificacao', '$mensagem')";
               
        $insert = mysqli_query($conn, $sql);
        formularioEnviado();
    }

    //Imagem não, mensagem não
    if($naoExisteImagem && $naoExisteMensagem) {
        $sql = "INSERT INTO ocorrencias (nome, cpf, data_envio, nome_img_1, path_1, nome_img_2, path_2, endereco, intensidade, classificacao, mensagem) VALUES ('$nomeDaSessao', '$cpfDaSessao' ,'$data_e_hora','null','null', 'null' , 'null',  '$local', '$intensidade', '$classificacao', 'null')";
               
        $insert = mysqli_query($conn, $sql);
        formularioEnviado();
    }

} 

function formularioEnviado() {

    echo "<div class='card mb-3' style='max-width: 70rem;'>
    <div class='row g-0'>
  
      <div class='col-md-4'>
        <img src='./assets/pessoa_mensagem.png' class='img-fluid rounded-start' alt='Sucesso'>
      </div>
  
      <div class='col-md-8 p-3'>
        
        <h3 class='card-title my-5'>Formulário enviado com sucesso!</h3>
        <p class='alert alert-success card-text mt-3' role='alert'> Sua denúncia foi salva. </p>
        <a href='?pg=home' class='btn'>Página Inicial</a>
        <a href='?pg=denuncia' class='btn'>Fazer outra denúncia</a>
      </div>
  
      </div>
  </div>

";
}

function formularioNaoEnviado() {
    die("<div class='card mb-3' style='max-width: 70rem;'>
    <div class='row g-0'>
  
      <div class='col-md-4'>
        <img src='./assets/pessoa_mensagem.png' class='img-fluid rounded-start' alt='Erro'>
      </div>
  
      <div class='col-md-8 p-3'>
        
        <h3 class='card-title my-5'>Formulário não enviado.</h3>
        <p class='alert alert-danger card-text mt-3' role='alert'> Houve um erro no cadastro da sua denúncia. </p> <br><br>
        <a href='?pg=denuncia' class='btn-danger'>Tente novamente</a>
      </div>
  
      </div>
  </div>");
}

function salvarImagem() {
    $arquivo = $_FILES['fotos'];

    $nomes = $arquivo['name'];

    $tempname = $arquivo['tmp_name'];

    $pasta = './user_photos/';
    
    foreach($nomes as $index => $name) {
        $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            if($extensao != 'jpg' && $extensao != 'png' && $extensao!='jpeg') {
                die("<p class='alert alert-danger mr-5'> Tipo de arquivo não aceito! Selecione imagens do tipo jpg,png ou jpeg.  <a href='?pg=denuncia' class='btn-danger'>Tentar novamente</a> </p>");
            } else {

                global $numeroDeFotos, $novosNomes, $paths;

                $numeroDeFotos = $numeroDeFotos + 1;

                $novoNome = uniqid() . '.' . $extensao;

                $path = $pasta . $novoNome;

                array_push($novosNomes, $novoNome);
                array_push($paths, $path);

                $envio = move_uploaded_file($tempname[$index], $path);
            }
    }
            if($envio) {
                return true;
            } else {
                return false;
            }
       
}

?>