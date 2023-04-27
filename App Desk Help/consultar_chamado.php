<?php 
  require_once 'validador_acesso.php' 
?>

<?php 

  // Criando um array para armazenar os chamados
  $chamados = array();

  // Abrindo o arquivo para ler o arquivo.txt
  $arquivo = fopen('arquivo.txt', 'r');


  /*
    A função feof() verificar se o ponteiro do arquivo atingiu o final do arquivo. o ponteiro é o arquivo proprimente dito que foi criado.
    Enquanto o ponteiro do arquivo não chegar ao final, leia as linhas com a função fgets().
  */

  while(!feof($arquivo)){
    
    // obtendo os dados que tem no arquivo com fgets, ela ler uma linha de texto de um arquivo.
    $registro = fgets($arquivo);
    $chamados[] = $registro;
  }

  fclose($arquivo);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="logoff.php" class="nav-link">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
            <?php foreach($chamados as $chamado){?>

                <?php 
                  
                  $chamados_dados = explode('#', $chamado);
                  
                  if(count($chamados_dados) < 3){
                    continue;
                  }
                  
                ?>

                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"> <?=$chamados_dados[0]?> </h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$chamados_dados[1]?></h6>
                    <p class="card-text"><?=$chamados_dados[2]?></p>
                    
                  </div>
              </div>
            <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>