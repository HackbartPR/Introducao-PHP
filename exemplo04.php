<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
        $primeiroValor = 16353;
        echo "<p>Valor original da variável [primeiroValor] = $primeiroValor </p>";
        $segundoValor = ++$primeiroValor;
        echo "<p>Valor novo da variável [primeiroValor] = $primeiroValor </p>";
        echo "<p>Valor da variável [segundoValor] = $segundoValor </p>";
    ?>
</body>

</html>