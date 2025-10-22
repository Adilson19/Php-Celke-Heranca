<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Celke</title>
</head>
<body>
    <?php

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