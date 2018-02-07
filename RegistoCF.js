function showCustomer(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("textHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("textHint").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "headerAnon.php?q="+str, true);
  xhttp.send();
}
function pwigual(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("pwigual").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("pwigual").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "obrigapw.php?pwi="+str, true);
  xhttp.send();
}

function showHint(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("nombre").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("nombre").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "RegistoCliente.php?q="+str, true);
  xhttp.send();   
}

function showEmail(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("emaile").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("emaile").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "RegistoCliente.php?e="+str, true);
  xhttp.send();   
}

function shownif(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("nife").innerHTML = "";
    return;
  }
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("nife").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "RegistoCliente.php?n="+str, true);
  xhttp.send();   
}
function showpw(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("pww").innerHTML = "";
    return;
  }
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("pww").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "obrigapw.php?pw="+str, true);
  xhttp.send();   
}

function validacao_cliente() {

    if (isNaN(document.form.nif.value)) {
        alert("Por favor, preencha o campo 'NIF' apenas com números!");
        document.form.nif.focus();
        return false;
    }
    if (document.form.nif.value < 0) {
        alert("Por favor, preencha o campo 'NIF' apenas com valores positivos!");
        document.form.nif.focus();
        return false;
    }

    if (isNaN(document.form.telefone.value)) {
        alert("Por favor, preencha o campo 'Telefone' apenas com números!");
        document.form.telefone.focus();
        return false;
    }
    if (document.form.telefone.value < 0) {
        alert("Por favor, preencha o campo 'Telefone' apenas com valores positivos!");
        document.form.telefone.focus();
        return false;
    }

    if (document.form.password.value != document.form.password1.value) {
        alert("As senhas introduzidas nao coincidem, por favor preencha os campos 'Senha' com senhas iguais!");
        document.form.password.focus();
        return false;
    }

}

function validacao_funcionario() {

    if (document.form.password2.value != document.form.password3.value) {
        alert("As senhas introduzidas nao coincidem, por favor preencha os campos 'Senha' com senhas iguais!");
        document.form.password2.focus();
        return false;
    }

}
function aumenta(obj){
    obj.height=obj.height*1.25;
	obj.width=obj.width*1.25;
}
function diminui(obj){
	obj.height=obj.height/1.25;
	obj.width=obj.width/1.25;
}

function editar_cliente() {
    var agree = confirm("Deseja Editar o Cliente? Se desejar , prima 'OK'!");
    if (agree)
        return true;
    else
        return false;

}

function eliminar_cliente() {
    var agree = confirm("Deseja Eliminar o Cliente? Se desejar , prima 'OK'!");
    if (agree)
        return true;
    else
        return false;

}

function validacao_edita_cliente1() {

    if (isNaN(document.form.telefone.value)) {
        alert("Por favor, preencha o campo 'Telefone' apenas com números!");
        document.form.telefone.focus();
        return false;
    }
    if (document.form.telefone.value < 0) {
        alert("Por favor, preencha o campo 'Telefone' apenas com valores positivos!");
        document.form.telefone.focus();
        return false;
    }

}


function validacao_eidta_cliente() {

    if ((document.form.nome.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.nome.focus();
        return false;
    }
    if (!(document.form.nome.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.nome.focus();
        return false;
    }

    if ((document.form.login.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.login.focus();
        return false;
    }
    if (!(document.form.login.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.login.focus();
        return false;
    }

    if ((document.form.nif.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.nif.focus();
        return false;
    }
    if (!(document.form.nif.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.nif.focus();
        return false;
    }

    if ((document.form.email.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.email.focus();
        return false;
    }
    if (!(document.form.email.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.email.focus();
        return false;
    }

    if ((document.form.telefone.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.telefone.focus();
        return false;
    }
    if (!(document.form.telefone.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.telefone.focus();
        return false;
    }

    if ((document.form.morada.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.morada.focus();
        return false;
    }
    if (!(document.form.morada.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.morada.focus();
        return false;
    }

    if ((document.form.password1.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.password1.focus();
        return false;
    }
    if (!(document.form.password1.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.password1.focus();
        return false;
    }

    if ((document.form.password.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.password.focus();
        return false;
    }
    if (!(document.form.password.value == "")) {
        alert("Por favor ,selecione um cliente na tabela a baixo!");
        document.form.password.focus();
        return false;
    }

}

function pesquisa_cliente() {
    if ((document.form.pnome.value) && (document.form.ptelefone.value)) {
        alert("Por favor ,escolha apenas uma forma de pesquisa!");
        document.form.ptelefone.focus();
        return false;
    }

    if ((document.form.pnome.value == "") && (document.form.ptelefone.value == "")) {
        alert("Por favor ,escolha  uma forma de pesquisa!");
        document.form.ptelefone.focus();
        return false;
    }

    if (isNaN(document.form.ptelefone.value)) {
        alert("Por favor, preencha o campo 'Telefone' apenas com números!");
        document.form.ptelefone.focus();
        return false;
    }
    if (document.form.ptelefone.value < 0) {
        alert("Por favor, preencha o campo 'Telefone' apenas com valores positivos!");
        document.form.ptelefone.focus();
        return false;
    }

}

function editar_cliente2() {

    var agree = confirm("Deseja Editar os seus dados? Se desejar , prima 'OK'!");
    if (agree)
        return true;
    else
        return false;

}

function eliminar_compra() {
    var agree = confirm("Deseja Eliminar a Compra? Se desejar, prima 'OK'!");
    if (agree)
        return true;
    else
        return false;

}