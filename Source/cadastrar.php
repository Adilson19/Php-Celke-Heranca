<?php
    session_start();
    ob_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Celke</title>
</head>
<body>
    <h1>Cadastrar contas a pagar</h1><br><br>
    <a class="titulo" href="index.php">Listar</a><br><br><br>
    <?php
        //  Incluindo o arquivo de conexao
        require './Conn.php';
        //  Incluindo o arquivo da classe ContasPagar
        require './ContasPagar.php';
        //  Recebendo os dados do formulário
        $formDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        // var_dump($formDados);
        // Verificando se o usuário clicou no botão
        if(!empty($formDados['SendCadContaPg'] ?? null)){
            //  Instanciando a classe de conexão - Nesse contexto nao pode ser instanciada. So pode ser instanciada por quem a herda
            //$conn = new Conn();
            //  Instanciando a classe ContasPagar
            $cadContaPg = new ContasPagar();
            //  Enviando os dados do formulário para o atributo da classe
            $cadContaPg->formDados = $formDados;
            //  Chamando o método cadastrar
            $valor = $cadContaPg->cadastrar();
            if($valor){
                $_SESSION['msg'] = "<p style='color: #00ff00;'>Conta a pagar Cadastrada com sucesso!</p>";
                header("Location: index.php");
            }else{
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: conta a pagar não Cadastrada</p>";    
                header("Location: index.php");
            }
        }
    ?>
    <form class="formulario" name="CadContaPg" action="" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Nome da Conta a pagar" required><br><br>

        <label>Valor:</label>
        <input type="text" name="valor" placeholder="Valor da Conta a pagar"><br><br>

        <label>Vencimento:</label>
        <input type="date" name="vencimento" placeholder="Data de Vencimento"><br><br>

        <label>Observação:</label>
        <textarea name="obs" placeholder="Observação da Conta a pagar"></textarea><br><br>

        <input class="submit" type="submit" value="Cadastrar" name="SendCadContaPg">
    </form>
</body>
</html>