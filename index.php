<?php
    session_start();
    if(!isset($_SESSION['logado'])) {
        $_SESSION['logado'] = false;
        $_SESSION['tema'] = 'comum';
        $_SESSION['usuario'] = '';
        $_SESSION['nome'] = '';
        $_SESSION['cor_nome_texto'] = '#000';
        $_SESSION['cor_nome_fundo'] = '#fff';
    }
    if (isset($_POST['acao'])){
        switch ($_POST['acao']) {
            case "logar" :
                $_SESSION['logado'] = true;
                $_SESSION['usuario'] = $_POST['usuario'];
                $_SESSION['nome'] = 'Guilherme';
                break;
            case "deslogar" :
                    $_SESSION['logado'] = false;
                    $_SESSION['usuario'] = '';
                    $_SESSION['nome'] = '';
                    break;    
        }
        Header('Location: .');
    }

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="tema_<?=$_SESSION['tema']?>.css">       
    <script src="script_head.js"></script>
    <script src="script_body.js"></script>

    <title>CHAT</title>
</head>
<body>
    <div class="tela_login">
        <?php
            if($_SESSION['logado']){
            ?>
                <span class="informacao">
                    <span class="nome">Logado como:</span>
                    <span class="valor"><?=$_SESSION['usuario']?></span>
                </span> 
                <span class="informacao">
                    Seja bem-vindo<span class="valor"><?=$_SESSION['nome']?></span>
                </span>
                <form METHOD="POST">
                    <input type="hidden" name="acao" value="deslogar">
                    <input type="submit" value="Deslogar">

                </form>
                <?php
            } else {
                  ?>
                <span class="informacao">
                   Você não está logado. Entre com suas informações abaixo. 
                </span> 
                
                </span>
                <form method="POST">
                    <input type="hidden" name="acao" value="logar">
                    <span class="informacao">
                       <span class="nome">nome de usuário</span>
                       <input class="valor"  name="usuario">
                    </span> 
                    <span class="informacao">
                       <span class="nome">senha</span>
                       <input class="valor" type="password" name="senha">
                    </span>
                    <input type="submit" value="Logar">

                </form>
                  
                  <?php  
            }
        ?>    
    </div>
    <div class="tela_mensagem">
        <?php if($_SESSION['logado']) { ?>
            <div id="msg_enviar" class ="informação">Digite abaixo sua mensagem</div>
        <form onsubmit=" return enviar();">
            <input class="mensagem">
            <input type="submit" value="enviar">
        </form>
        <?php } else { ?>
        
        <?php } ?>

    </div>
    <div class="tela_usuarios">
    </div>
    <div class="tela_chat">
    </div>



</body>
</html>