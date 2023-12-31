var mensagens = [];
var usuarios = [];

function ajaxcmd(cmd, val, callback, tentativa = 1){
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST","chat.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4){
     if (this.status != 200) {
        if (tentativa <= 3){
            ajaxcmd(cmd, val, callback, tentativa+1);
        }    
     } else {
        if(callback) {
            callback(this.responseText, cmd, val);
        }
    } 
   }
};
xhttp.send("cmd=" + encodeURIComponent(cmd) + (val ? "&val=" + encodeURIComponent(val) : ""));

}

function enviar(){
    let msg_campo = document.getElementById('msg_enviar').value;
    let msg = msg_campo.value;
    msg_campo.value = '';
    ajaxcmd('envia' , msg);
     return false;
}

var atualiza = setInterval ( function() {
    ajaxcmd('verifica', 's', function(resposta) {
        resposta = JSON.parse(resposta);
        switch (resposta.status) {
            case "dc":
                document.location.reload(true);
                break;
                case "ok":
                    if (resposta.mensagens.length > 0) {
                        mensagens.concat(resposta.mensagens);
                    }
                    if(resposta.mensagens.length > 0) {
                        resposta.usuarios.map(ur => {
                        if(!(usuarios.find(u => u.login == ur.login))) {
                            usuarios.push(ur);
                            var novo = '<div class ="usuario" id="usuario_'+ur.login+'">';
                            novo += '<div class="nome">'+ur.nome+'</div>';
                            novo +='<div class="login">'+ur.login+'</div>';
                            novo += '<div class="online"></div>';
                            novo += '</div>';
                            document.getElementById('tela_usuarios').innerHTML += novo;
                            novo = '';
                        }
                    });
                    usuarios.forEach(function(user, index){
                        let u = resposta.usuarios.find(u => u.login == user.login);
                        if(u){
                            u.online = true;
                            usuarios[index] = u;
                            document.getElementById('usuario_'+user.login).online = 'true';
                            document.getElementById('usuario_'+user.login)
                                .getElementsByClassName('nome').innerHTML = u.nome;
                        } else {
                            document.getElementById('usuario_'+user.login).online = 'false';
                        }
                    });

                    }
                    
                    break;

        }

    });
}, 1000);