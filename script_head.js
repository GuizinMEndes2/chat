function ajaxcmd(cmd, val){
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST","chat.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var resposta = null;
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4{
     if (this.status == 200) {
      resposta = this.responseText;
     }else{
         resposta = 'erro';
     }
   }
};
xhttp.send("cmd="+escappe(cmd)+"&val="+escappe(val));
}

function enviar(){
    let msg_campo = document.getElementById('msg_enviar').value;
    let msg = msg_campo.value;
    msg_campo.value = '';
    resposta = ajaxcmd('comando', 'valor')
     return false;
}