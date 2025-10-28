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
    <h1>Editar Conta a Pagar</h1><br><br>
    <a class="titulo" href="index.php">Listar</a><br><br><br>
    <?php   
        //  Receber o ID da URL
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        //  Verificando se o id possui o valor
        if(!empty($id)){
            //  Incluindo os arquivos
            require './Conn.php';
            require './ContasPagar.php';

            //  Instanciando a classe
            $visContaPg = new ContasPagar();

            //  Recebendo os dados do formulario
            $formDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            //var_dump($formDados);

            //  verificar se o usuario clicou no botao e a posicao SendEditContaPg possui valor
            if(!empty($formDados['SendEditContaPg'])){
                $editContaPg = new ContasPagar();
                //  Enviar os dados para o atributo form dados da classe contas a pagar
                $editContaPg->formDados = $formDados;

                //  Instanciando o metodo editar
                $valor = $editContaPg->editar();
                if($valor){
                    $_SESSION['msg'] = "<p style='color: #00ff00;'>Conta a pagar Editada com sucesso!</p>";
                    header("Location: index.php");
                }else{
                    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Conta a pagar não Editada</p>";
                    header("Location: index.php");
                }
            }
            // SendEditContaPg

            //  Enviar o ID para o atributo da classe ContasPagar();
            $visContaPg->id = $id;

            // Instanciar o metodo visualizar
            $result_vis_conta_pg = $visContaPg->visualizar();
            //var_dump($result_vis_conta_pg);
            extract($result_vis_conta_pg);
        ?>
        <!--Inicio de Formulario-->
            <form name="EditContaPg" action="" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>"><br><br>
                <label for="">Nome: </label>
                <input type="text" name="nome" value="<?php echo $nome ?>" placeholder="Nome da Conta a Pagar" required><br><br>
                <label for="">Valor: </label>
                <input type="text" name="valor" value="<?php echo $valor ?>" placeholder="Valor da Conta a Pagar" required><br><br>
                <label for="">Vencimento: </label>
                <input type="date" name="vencimento" value="<?php echo $vencimento ?>" required><br><br>
                <label for="">Obs: </label>
                <textarea type="text" name="nome" placeholder="Nome da Conta a Pagar" cols="40" rows="5" required><?php echo $obs ?></textarea><br><br>
                <input type="submit" value="Salvar" name="SendEditContaPg">
            </form>
        <!--Fim de Formulario-->

        <?php
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: conta a pagar não encontrada</p>";    
            header("Location: index.php");
        }
    ?>
    
</body>
</html>