/* 
 Este arquivo java script destina-se a validaçao de um produto
 */
function valida_pass(){
    if(document.form.pass1 == document.form.pass2){
        alert("As password nao coincidem");
        document.form.pass1.focus();
        return false;
    }
    if(document.form.Login.value == ""){
        alert("Tem de fazer login");
        return false;
    }
    
    
    
}

function validacao() {

   
    if (document.form.quantidade.value < 0) {
        alert("A quantiadade tem de ser positiva");
        document.form.quantidade.focus();
        return false;
    }
    if (isNaN(document.form.quantidade.value)) {
        alert("A variavel 'Quantidade' tem de ser  numérica");
        document.form.quantidade.focus();
        return false;
    }
    if (document.form.preco.value < 0) {
        alert("Por favor , insira um preço maior que 0 .")
        document.form.preco.focus();
        return false;
    }
   
    if (isNaN(document.form.preco.value)) {
        alert("A variavel 'Preço' tem de ser  numérica");
        document.form.preco.focus();
        return false;
    }
}

function eliminar() {
    var agree = confirm("Deseja Eliminar o produto?Se desejar , prima 'OK'");
    if (agree)
        return true;
    else
        return false;

}
function eliminar_funcionario() {
    var agree = confirm("Deseja Eliminar o Funcionario?Se desejar , prima 'OK'");
    if (agree)
        return true;
    else
        return false;

}


function editar() {
    var agree = confirm("Deseja Editar o produto?Se desejar , prima 'OK'");
    if (agree)
        return true;
    else
        return false;

}
function editar_funcionario() {
    var agree = confirm("Deseja Editar o Funcionario?Se desejar , prima 'OK'");
    if (agree)
        return true;
    else
        return false;

}


function valida_edita() {
    
   

    if ((document.form.preco.value < 0)) {
        alert("Por favor , insira um preço positivo");
        document.form.preco.focus();
        return false;
    }
    if (isNaN(document.form.preco.value)) {
        alert("Por favor insira um caracter numerico");
        document.form.preco.focus();
        return false;
    }

}


function valida_edita_produto() {
    if ((document.form.nome.value == "")) {
        alert("Por favor ,selecione um produto na tabela a baixo");
        document.form.nome.focus();
        return false;
    }
    if (!(document.form.nome.value == "")) {
        alert("Por favor ,selecione um produto na tabela a baixo");
        document.form.nome.focus();
        return false;
    }
    if ((document.form.preco.value == "")) {
        alert("Por favor , selecione um produto na tabela a baixo");
        document.form.preco.focus();
        return false;
    }
    if (!(document.form.preco.value == "")) {
        alert("Por favor , selecione um produto na tabela a baixo");
        document.form.preco.focus();
        return false;
    }
    if (!(document.form.fotografia.value == "")) {
        alert("Por favor , selecione um produto na tabela a baixo");
        document.form.fotografia.focus();
        return false;
    }
    if ((document.form.fotografia.value == "")) {
        alert("Por favor , selecione um produto na tabela a baixo");
        document.form.fotografia.focus();
        return false;
    }

}

function quantidade_stock(){
    
    if(document.form.quantidade.value < 0){
        alert("Colocar uma quantidade positiva");
        document.form.quantidade.focus();
        return false;
    }
    }


function quantidade_stock_possivel($quantidade_existente){
    if(document.form.quantidade.value > $quantidade_existente){
        alert("Nao existe stock disponivel, introduza uma quantidade valida");
        document.form.quantidade.focus();
        return false;
    }
}




function valida_edita_funcionario(){
 if ((document.form.nome.value == "")) {
        alert("Por favor ,selecione um funcionario na tabela a baixo");
        document.form.nome.focus();
        return false;
    }
    if (!(document.form.nome.value == "")) {
        alert("Por favor ,selecione um Funcionario na tabela a baixo");
        document.form.nome.focus();
        return false;
    }
    if ((document.form.login.value == "")) {
        alert("Por favor , selecione um Funcionario na tabela a baixo");
        document.form.login.focus();
        return false;
    }
    if (!(document.form.login.value == "")) {
        alert("Por favor , selecione um Funcionario na tabela a baixo");
        document.form.login.focus();
        return false;
    }
    if (!(document.form.email.value == "")) {
        alert("Por favor , selecione um Funcionario na tabela a baixo");
        document.form.email.focus();
        return false;
    }
    if ((document.form.email.value == "")) {
        alert("Por favor , selecione um Funcionario na tabela a baixo");
        document.form.email.focus();
        return false;
    }
}


function mudar_google(){
    var google =document.getElementById("google_java");
    google.src="https://www.google.com/maps/embed?pb=!1m0!3m2!1spt-PT!2spt!4v1447812469055!6m8!1m7!1sfwpdlXQ_4aeNOgWmn81xYw!2m2!1d41.55365685900686!2d-8.424595386459465!3f326.06053218596736!4f0!5f0.7820865974627469";
    
}
function mudar_google1(){
    var google =document.getElementById("google_java");
    google.src="https://www.google.com/maps/embed?pb=!1m0!3m2!1spt-PT!2spt!4v1447811354906!6m8!1m7!1s99SLXFBKpJly20ymWYvYcA!2m2!1d41.5513233!2d-8.4287833!3f90.0957251735838!4f-9.02778980233613!5f0.7820865974627469";
    
}