<?php 
    // Registrando chamados com um arquivo de txt

    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-',$_POST['descricao']);

    // Montando o texto
    $texto = $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;


    /*
        A função fopen abre um arquivo e cria automaticamente uma estrutura tipo FILE na memória,
        descrevendo as características do arquivo.
        fopen('nome do arquivo', 'a');
    */

    // Criando o um arquivo.txt
    $arquivo = fopen('arquivo.txt', 'a');

    // fwrite(nome do arquivo, texto que vamos escrever); Escrevendo o texto dentro do arquivo que criamos.
    fwrite($arquivo, $texto);

    //Fechando o arquivo
    fclose($arquivo);

    header('Location: abrir_chamado.php')
?>