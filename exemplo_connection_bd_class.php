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
        echo "<h2> Acesso a banco de dados MySQL com a classe mysqli</h2>";
        //CRIANDO CONEXÃO COM O BANDO DE DADOS
        $connection = new mysqli("127.0.0.1:3306", "root", "root", "db_hotel");
        
        //VERIFICA SE HOUOVE ERRO NA CONEXÃO
        if(mysqli_connect_errno() != 0){
            echo "<p>Não foi possível conectar-se ao banco de dados</p>";
            echo "Erro Econtrado: " . mysqli_connect_errno() . "=>" . mysqli_connection_error();
        } 
        //CONEXÃO ESTABELECIDA
        else {
            echo "<p>Conexão efetuada com sucesso!</p>";

            //INSERIR UM NOVO USUARIO
            $cadResp = $connection->query("INSERT INTO usuarios(nome, senha) VALUES ('master','master123')");
            //VERIFICAR SUCESSO DA RESPOSTA
            if(!$cadResp) echo "<p>Erro ao cadastrar um novo usuário</p>";
            else echo "<p>Novo usuário cadastrado com sucesso!</p>";

            //SELECIONAR TODOS OS USUARIOS CADASTRADOS
            $selectResp = $connection->query("SELECT nome, senha FROM usuarios ");
            //VERIFICAR RETORNO DA QUERY
            if(!$selectResp) echo "<p>Erro ao consultar usuários</p>";
            else {
                //VERIFICAR SE POSSUI ALGUM USUARIO CADASTRADO
                if($selectResp->num_rows > 0){
                    echo "<table>";
                    //RECEBE TODOS OS ITENS SALVOS NA RESPOSTA
                    while($data = $selectResp->fetch_assoc()){
                        echo "<tr>";
                        //PERCORRE ITEM A ITEM
                        foreach($data as $user){
                            echo "<td>$user</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }  
            }

        }

        //EM CLASSES A CHAMADA DOS MÉTODOS É FEITA PELA SETA ->
        $connection->close();

        
    ?>
</body>

</html>