function apagarNot(id) {
    var confirmacao = confirm('deseja apagar essa notificação');
    if (confirmacao == true) {
        window.location.href = '?apagarNot=' + id;

    }
}

function previewImage() {
    var imagem = document.querySelector('input[name=Filedata]').files[0];
    var preview = document.querySelector('#AjustarFotoUsuario');
    var reader = new FileReader();
    reader.onloadend = function() {
        preview.src = reader.result;
    }
    if (imagem) {
        reader.readAsDataURL(imagem);
    } else {
        preview.src = "";
    }
}

function formatar(mascara, documento) {
    var i = documento.value.length;
    var saida = mascara.substring(0, 1);
    var texto = mascara.substring(i);
    if (texto.substring(0, 1) != saida) {
        documento.value += texto.substring(0, 1);
    }
}