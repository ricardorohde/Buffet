function apagarUsu(id) {
    var confirmacao = confirm('deseja realmente apagar esse usuario?');
    if (confirmacao == true) {
        window.location.href = "?excluir=" + id;
    }
}
function desbloquearUsu(id) {
    var confirmacao = confirm('deseja realmente desbloquear esse usuario?');
    if (confirmacao == true) {
        window.location.href = "?desbloquear=" + id;
    }
}
function bloquearUsu(id) {
    var confirmacao = confirm('deseja realmente bloquear esse usuario?');
    if (confirmacao == true) {
        window.location.href = "?bloquear=" + id;
    }
}
function excluirCidade(id) {
    var confirmacao = confirm('deseja mesmo apagar essa cidade?');
    if (confirmacao == true) {
        window.location.href = "?excluirCid=" + id;
    }
}
function excluirIngrediente(id) {
    var confirmacao = confirm('deseja mesmo apagar esse ingrediente?');
    if (confirmacao == true) {
        window.location.href = "?excluiring=" + id;
    }
}
function excluirprato(id) {
    var confirmacao = confirm('deseja mesmo apagar esse prato?');
    if (confirmacao == true) {
        window.location.href = "?excluirCardapioPronto=" + id;

    }
}

 var b = 0;
function verificaIng(id) {

    var check = document.getElementById(id); 

    if(check.checked == true){
        b++;
         
        
    }else{
        
        b--;
        
    }
    if(b>-1){
        document.getElementById("botcadP").type = "submit";
    }else{
        document.getElementById("botcadP").type = "button";
    }

    
    
 
    
}
var c = 0;
function verificaIng2(id,cont) {
    var check = document.getElementById(id); 
    
    if(check.checked == false){
        c--;
         
        
    }else{
        c++;
        
        
    }
    if(c>0){
        document.getElementById("botcadP2").type = "submit";
      
        
    }else{
        document.getElementById("botcadP2").type = "button";
         
    }

    
    
 
    
}

