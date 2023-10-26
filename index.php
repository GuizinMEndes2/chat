<?php
session_start();
if (isset($_SESSION['logado'])){
    $_SESSION['logado']         = false;
    $_SESSION['tema']           = 'comum';
    $_SESSION['usuario']        = '';
    $_SESSION['nome']           = '';
    $_SESSION['cor_nome_texto'] = '#000';
    $_SESSION['cor_nome_fundo'] = '#fff';

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="tema_<?$_SESSION['tema']?>.css"
    <script src="script_body.js"></script>

    <title>Document</title>
</head>
<body>

    <div class="tela_login">
        <?php
        if($_SESSION['logado']){
            ?>
        <div class="logado">    
        <span class="informacao">
            <span class="nome">Logado como:</span>
            <span class="valor"> <? $_SESSION['usuario']?></span>
        <span class="informacao">
            Seja bem-vindo <span class="valor"> <?$_SESSION['nome'] ?>  </span>
        </span>        
            
        <form METHOD= "POST">
            <input type="hidden" name="acao" value="deslogar">
            <input type="submit" value="deslogar">
        </form>
        </div>
        <?php
        }else{
            ?>
            <div class="deslogado">    
            <span class="informacao">
                Você não esta logado. Entre com suas infomações abaixo
            </span>        
            <form METHOD= "POST">
                <input type="hidden" name="acao" value="logar">
                <span class="informacao">
                    <span class="nome">Nome de Usuário</span>
                    <input name="usuario">
                </span>
                <span class="informacao">
                    <span class="nome">Senha</span>
                    <input name="usuario" type="password">
                </span>       
                <input type="submit" value="logar">
            </form>
            </div>

            <?php
        }
        ?>
        
    </div>
    <div class="tela_mensagem">
    </div>
    <div class="tela_usuarios">
    </div>
    <div class="tela_chat">        
    </div>



</body>
</html>