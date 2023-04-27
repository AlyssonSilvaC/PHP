<?php

$lista = array(
    array("Email" => "Alyssoncassimiro316@gmail.com", "Pass" => "alysson@1317"),
    array("Email" => "bernadocassimiro316@gmail.com", "Pass" => "cassimiro"),
    array("Email" => "Cr7cassimiro316@gmail.com", "Pass" => "123789088")
);

#print_r($lista[0]["Email"]);
$identificador = false;

foreach($lista as $i){

    if( $i["Email"] == "Alyssoncassimiro316@gmail.com"){
        $identificador = true;
    }
}

$list = array();
$i = 0;

while($i < 10 && $identificador){
    $list[] = $i + 1;
    
    $i++;
}

#echo"<pre>";
#print_r($list);
#print_r($lista);
#echo"</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h3{
            color: red;
        }

        div{
            border: 30px solid blue;
            margin: 10px;
        }
    </style>
</head>
<body>
    
        <?php foreach($lista as $list){?>

            <div>  
                <h3><?= $list['Email'] ?></h3>
                <h4><?= $list['Pass'] ?></h4>
            </div>

        <?php } ?>

</body>
</html>