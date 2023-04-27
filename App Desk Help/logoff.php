<?php 
/*
    Vamos remover indices da variavel de sessão com a função unset()
    a função unset não remove apenas variaveis de sessão, ela é tambem é capaz de remover indices de $_GET e $_POST
    o unset tem a inteligencia para remover um indice apenas se ele existe.
*/

/*
    para destruir uma sessão por completo existe uma função especifica para isso.
    a função session_destroy() remove todos os indices contidos na session.

    Em session_destroy() a session será destruida, mas somente apos uma nova requisição.
    portanto é comum sempre que encerramos uma session, força o redirecionamento para outra pagina, forçando uma nova requisição
*/
session_start();
session_destroy();
header('Location: index.php');


?>