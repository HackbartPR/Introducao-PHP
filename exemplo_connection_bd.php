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
        echo "<h1>Acesso a banco de dados MySQL</h1>";
        //REALIZA A CONEXÃO COM O SERVIDO MYSQL
        $connection_bd = mysqli_connect("127.0.0.1:3306", "root", "root","db_hotel");
        if(!$connection_bd){
            echo "<p>Não foi possível conectar-se ao banco de dados</p>";
            echo mysqli_error();
        } else {
            echo "<p>Conexão efetuada com sucesso!</p>";
            
            //INSERE UMA QUERY
            /* $resp = mysqli_query($connection_bd,"INSERT INTO usuarios (nome, senha) VALUES ('Carlos','Mudar@2766') ");
            if(!$resp) echo "<h2>Não foi possível cadastrar um novo usário</h2>";
            else echo "<h2>Usuário cadastrado com sucesso!</h2>"; */

            //RECUPERA DADOS DO BANCO DE DADOS
            $resp = mysqli_query($connection_bd, "SELECT nome, senha FROM usuarios");
            if(!$resp) echo "<h2>Não foi possível realizar a operação</h2>";
            else{
                //VERIFICA QUANTAS LINHAS DE VALORES FOREM RETORNADOS
                if(mysqli_num_rows($resp) > 0){
                    echo "<table>\n";
                    while($registros = mysqli_fetch_assoc($resp)){
                        echo "<tr>";
                        foreach($registros as $valor){
                            echo "<td>$valor</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
            
            mysqli_close($connection_bd);
        }   
    ?>
</body>

</html>