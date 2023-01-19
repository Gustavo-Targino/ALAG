<?php
include('./inc/config.inc.php');


$numeroDeFotos = 0;

if(isset($_POST['nome'])){
   
    date_default_timezone_set('America/Sao_Paulo');

    $data_e_hora = date('d/m/Y H:i:s', time());


    $nome = $_POST['nome'];

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


    // if(empty($_POST['logradouro'])) {
    //     echo("<p class='alert alert-danger mt-3' role='alert'> Houve um erro.<a href='?pg=registrar' class='btn-danger'>Tentar novamente</a> </p> "); 
    //     exit;
    // } 

    //Imagem sim, mensagem sim
    if($naoExisteImagem==false && $naoExisteMensagem==false) {
        //Script que salva os campos, inclusive imagem e mensagem

        $sucesso = salvarImagem();

        if($sucesso) {
            
            if($numeroDeFotos==1) {
                $sql = "INSERT INTO ocorrencias (nome, data_envio, nome_img_1, path_1, nome_img_2, path_2, endereco, intensidade, classificacao, mensagem) VALUES ('$nome', '$data_e_hora','$novosNomes[0]','$paths[0]', 'null' , 'null',  '$local', '$intensidade', '$classificacao', '$mensagem')";
                //===== FEITO FEITO FEITO FEITO FEITO
                $insert = mysqli_query($conn, $sql);
                formularioEnviado();
            }

            if($numeroDeFotos==2) {
                $nomeFotoUm = $novosNomes[0];
                $pathFotoUm = $paths[0];

               $nomeFotoDois = $novosNomes[1];
               $pathFotoDois = $paths[1];

               $sql = "INSERT INTO ocorrencias (nome, data_envio, nome_img_1, path_1, nome_img_2, path_2, endereco, intensidade, classificacao, mensagem) VALUES ('$nome', '$data_e_hora','$nomeFotoUm','$pathFotoUm', '$nomeFotoDois' , '$pathFotoDois',  '$local', '$intensidade', '$classificacao', '$mensagem')";
               
               $insert = mysqli_query($conn, $sql);
               formularioEnviado();

            }
            
            // if($numeroDeFotos>2) {
            //     echo("<p class='alert alert-danger mt-3' role='alert'> Envie apenas 2 imagens.<a href='?pg=registrar' class='btn-danger'>Tentar novamente</a> </p> "); 
            //     exit;
            // }
           
        } else {
            formularioEnviado();
            exit;
        }

    }

    //Imagem sim, mensagem não
    if($naoExisteImagem==false && $naoExisteMensagem) {
        $sucesso = salvarImagem();
        if($sucesso) {
            //Script que salva os campos, inclusive caminho das imagens
            if($numeroDeFotos==1) {
                
               $sql = "INSERT INTO ocorrencias (nome, data_envio, nome_img_1, path_1, nome_img_2, path_2, endereco, intensidade, classificacao, mensagem) 
            VALUES ('$nome', '$data_e_hora','null','null','$local', '$intensidade', '$classificacao', '$mensagem')";
        
            $insert = mysqli_query($conn, $sql);
            }
            formularioEnviado();
            
           
        } else {
            formularioNaoEnviado();
            exit;
        }

    } 
    
    //Imagem não, mensagem sim
    if($naoExisteImagem && $naoExisteMensagem==false) {
        //Script que salva os campos junto com a mensagem MAS SEM IMAGENS
        // $sql = "INSERT INTO ocorrencias (nome, data_envio, nome_img, path, endereco, intensidade, classificacao, mensagem) 
        // VALUES ('$nome', '$data_e_hora','null','null',
        // '$endereco','$mensagem')";
    
        // $insert = mysqli_query($conn, $sql);
    }

    //Imagem não, mensagem não
    if($naoExisteImagem && $naoExisteMensagem) {
        //Script que salva os campos sem mensagem e sem imagem
    }

} 

function formularioEnviado() {

    echo "<p class='alert alert-success' role='alert'> Formulário enviado com sucesso! <br>
    <a href='?pg=home' class='btn mt-3'>Página inicial</a>
    <a href='?pg=registrar' class='btn mt-3'>Registrar novamente</a>
    </p>";
}

function formularioNaoEnviado() {
    echo("<p class='alert alert-danger mt-3' role='alert'> Houve um erro.<a href='?pg=registrar' class='btn-danger'>Tentar novamente</a> </p> "); 
    exit;
}

function salvarImagem() {
    $arquivo = $_FILES['fotos'];

    $nomes = $arquivo['name'];

    $tempname = $arquivo['tmp_name'];

    $pasta = './user_photos/';
    
    foreach($nomes as $index => $name) {
        $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            if($extensao != 'jpg' && $extensao != 'png' && $extensao!='jpeg') {
                die("<p class='alert alert-danger mr-5'> Tipo de arquivo não aceito! Selecione imagens do tipo jpg,png ou jpeg.  <a href='?pg=registrar' class='btn-danger'>Tentar novamente</a> </p>");
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