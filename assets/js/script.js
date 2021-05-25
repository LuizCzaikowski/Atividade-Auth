function lettersOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
        ((evt.which) ? evt.which : 0));
    if (charCode > 32 && (charCode < 65 || charCode > 90) &&
        (charCode < 97 || charCode > 122)) {
        document.getElementById("box-login").style.height = '755px';
        document.getElementById("nameError").style.display = 'block';
        document.getElementById("nameError").innerHTML = "Apenas letras no campo nome!";
        document.getElementById("nameError").style.backgroundColor = "red";
        document.getElementById("nameError").style.color = "#fff";
        return false;
    }
    return true;
}

document.addEventListener("DOMContentLoaded", function () {
    
    document.forms[0].onsubmit = function (e) {
        return val(e);
    }

    senha.oninput = function (e) {
        val(e);
    }

    function val(e) {
        var passo, passo1, passo2,
            v = senha.value,
            cor = "#fff",
            e = e.type == "submit";

        // verifica se tem 6 caracteres ou mais
        if (v.match(/.{6,}/)) {
            barra.style.backgroundColor = "#00FF7F";
            passo = true;
        } else {
            barra.style.backgroundColor = "red";
            passo = false;
        }

        // verifica se tem ao menos uma letra maiúscula
        if (v.match(/[A-Z]{1,}/)) {
            barra_1.style.backgroundColor = "#00FF7F";
            passo1 = true;
        } else {
            barra_1.style.backgroundColor = "red";
            passo1 = false;
        }

        // verifica de tem ao menus um número
        if (v.match(/[0-9]{1,}/)) {
            barra_2.style.backgroundColor = "#00FF7F";
            passo2 = true;
        } else {
            barra_2.style.backgroundColor = "red";
            passo2 = false;
        }

        // o formulário só será enviado pelo evento submit
        // e todos os passos devem ser verdadeiros para validar
        if (passo && passo1 && passo2 && v == confirma_senha.value && e) {
            alert("Senha ok!");
            return true;
        }
    }
});

var btn = document.querySelector("#senha");
btn.addEventListener("click", function() {
    barra.style.textAlign = "center";
    barra.style.backgroundColor = "red";
    barra_1.style.textAlign = "center";
    barra_1.style.backgroundColor = "red";
    barra_2.style.textAlign = "center";
    barra_2.style.backgroundColor = "red";
    document.getElementById("box-login").style.height = '755px';
    document.querySelector("#barra").style.display = "block";
    document.querySelector("#barra_1").style.display = "block";
    document.querySelector("#barra_2").style.display = "block";
    
});