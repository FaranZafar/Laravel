<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Php prectice questions</h2>
    <?php
    $a=100;
    $b=99.99;
    $c="Faran";
    $d=true;
    echo "$a <br> $b <br> $c <br> $d";
     
    echo ("<h2>Data types </h2> <br>");
    var_dump($a);
    echo("<br>");
    var_dump($b);
    echo("<br>");
    var_dump($c);
    echo("<br>");
    var_dump($d);
    echo("<br>");
    
    echo("<h2>Type casting</h2>");
    $str="100";
    $str=(int)$str;
    var_dump($str);
    echo("<br>");

    $num=50;
    $num1=(string)$num;
    echo ("$num <br>");
    echo("$num1<br>");

    $inti=50;
    $flo=12.5;
    
     $sum=$inti+$flo;
    echo("$sum <br>");

    $str="Faran Zafar";
    echo(strlen($str)."<br>");

    $var=true;
    var_dump($var);
    
    $fruit="25 apples";
    $fruit=(int)$fruit;
    echo("<br>$fruit");
    ?>
</body>
</html>