<?php
    session_start();

    ob_start();
    //  Receber o ID da URL
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    //  Verificando se o id possui valor
    if(!empty($id)){    
        //  Incluir os arquivos
        require './Conn.php';
        require './ContasPagar.php';

        //  Instanciando a classe e criar Objeto
        $apagarContaPg = new ContasPagar();

        //  Enviar o ID para o atributo da classe ContasPagar
        $apagarContaPg->id = $id;
        //  Instanciar o metodo apagar()
        $valor = $apagarContaPg->apagar();

        if($valor){
           $_SESSION['msg'] = "<p style='color: #00ff00;'>Conta a pagar apagada com sucesso!</p>";
           header("Location: index.php");
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: conta a pagar não apagada</p>";    
            header("Location: index.php");
        }

    }else{
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: conta a pagar não encontrada</p>";
        header("Location: index.php");
    }
?>