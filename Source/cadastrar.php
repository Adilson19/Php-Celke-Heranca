<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Celke</title>
</head>
<body>
    <h1>Cadastrar contas a pagar</h1>
    <a href="index.php">Listar</a>
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
                echo "Conta a pagar cadastrada com sucesso!";
            }else{
                echo "Erro: conta a agar não cadastrada com sucesso!";
            }
        }
    ?>
    <form name="CadContaPg" action="" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Nome da Conta a pagar" required><br><br>

        <label>Valor:</label>
        <input type="text" name="valor" placeholder="Valor da Conta a pagar"><br><br>

        <label>Vencimento:</label>
        <input type="date" name="vencimento" placeholder="Data de Vencimento"><br><br>

        <label>Observação:</label>
        <textarea name="obs" placeholder="Observação da Conta a pagar"></textarea><br><br>

        <input type="submit" value="Cadastrar" name="SendCadContaPg">
    </form>
</body>
</html>