function myFunction() {
    if(document.getElementById("troca1").disabled == true)
    {
        document.getElementById("fotoUsu").disabled = false;
        document.getElementById("troca1").disabled = false;
        document.getElementById("troca2").disabled = false;
        document.getElementById("troca3").disabled = false;
        document.getElementById("troca4").disabled = false;
        document.getElementById("troca5").disabled = false;
        document.getElementById("troca6").disabled = false;
        document.getElementById("BotSub").type = "button";
        document.getElementById("BotSub").innerHTML = "Salvar";
        i++;
    }
    else
    {
        document.getElementById("BotSub").type = "submit";
        i = 0;
    }
}