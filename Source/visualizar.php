<?php
    session_start();
    ob_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Celke</title>
</head>
<body>
    <h1>Visualizar Conta a Pagar</h1><br><br>
    <a class="titulo" href="index.php">Listar</a><br><br><br>

    <?php
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT); 

        //  Verificar se o ID possui valor 
        if(!empty($id)){
            //  Buscando os outros ficheiros distribuidos pelo projeto 
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

            //var_dump($result_vis_conta_pg);
            //  Imprimir os registro do BD
            //  Comando Extract serve para extrair um array        
            extract($result_vis_conta_pg);
            echo "ID: " . $id .  "<br>";
            echo "Nome: " . $nome .  "<br>";
            echo "Valor: " . number_format($valor, 2, ",", ".") . "<br>";
            echo "Vencimento: " . date('d/m/Y', strtotime($vencimento)) .  "<br>";
            echo "Observação: " . $obs .  "<br>";

        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: conta a pagar não encontrada</p>";    
            header("Location: index.php");
        }

    ?>    
</body>
</html>