<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
    <h1>Visualizar conta a pagar</h1><br>
    <a href="listar.php">Listar</a><br><br>

    <?php
        require './Conn.php';
        require './ContasPagar.php';
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

        //  Verificar se o ID possui valor
        if(!empty($id)){
            //  
            require './Conn.php';
            require './ContasPagar.php';

            //  Instanciar a classe e criar o objeto
            $visContaPg =  new ContasPagar();
            //  Enviar o ID para o atributo da classe contas a pagar
            $visContaPg->id = $id; // segundo ID eh o que vem da URL

            //  Instanciar o metodo visualizar
            //$visContaPg->visualizar();
            //  Enviar o ID para o atributo da classe ContasPagar
            //$visContaPg->id = $id;
            //  Instanciar o metodo visualizar
            $result_vis_conta_pg = $visContaPg->visualizar();

            var_dump($result_vis_conta_pg);
        }else{
            echo "<p style='color: #ff0000'>Erro: conta a pagar não encontrada</p>";
        }

    ?>    
</body>
</html>