<?php 
    /*
        Sessão é basicamente você persistir uma variável na sua aplicação, podendo utilizá-la em qualquer um dos arquivos do seu projeto. 
        A sessão é representada como um array, onde você define um índice para ele e neste índice o valor que você quer persistir.
    */
    session_start();
    
    
    // Variavel que vai verificar se o usuario esta autenticado
    $usuarios_autenticado = false;

    /*
        Arrays associativos são estruturas onde cada elemento é identificado por uma chave única.
    */
    $usuarios_app = array(
        array('E-mail' => "adm@teste.com.br", 'senha' => '123456'),
        array('E-mail' => "adm@teste.com.br", 'senha' => 'qwerty'),
        array('E-mail' => "adm@teste.com.br", 'senha' => 'abcdef'),
    );

    
    // Percorrendo os dados do Array $usuarios_app
    foreach($usuarios_app as $user){
        
        //Verificando se os dados vindo do formulario são compativeis com algum do array usuarios_app
        if($user['E-mail'] == $_POST['E-mail'] && $user['senha'] == $_POST['senha']){
            $usuarios_autenticado = true;
        }
    };

    if($usuarios_autenticado){

        $_SESSION['autenticado'] = 'SIM';
        header('Location: home.php');

    }else{
        /*
            redirecionando a pagina header(), a direita da interrogação estamos definindo um parametro e estamos atribuindo um valor a ele.
            a parti disso na index.php podemos recuperar esse parametro que foi encaminhado na url e atraves do $_GET podemos
            pegar esse parametro e por exemplo usa-lo para criar uma mensagem de erro caso o usuario seja invalido.
        */
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }
?>