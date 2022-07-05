function confirmar(){ 
  return confirm('Confirmar ação ?');
}

function retornar_tamanho_tela() {
  var w = window.innerWidth
  || document.documentElement.clientWidth
  || document.body.clientWidth;
  
  var h = window.innerHeight
  || document.documentElement.clientHeight
  || document.body.clientHeight;
  
  var x = document.getElementById("demo");
  x.innerHTML = "Browser inner window width: " + w + ", height: " + h + ".";  
}
function telefone(v){
  v=v.replace(/\D/g,"");             // Remove tudo o que não é dígito
  v=v.replace(/(\d{2})(\d{5})(\d{4})$/,"$1-$2-$3");    // Coloca hífen
  return v;
}
function data(v){
  v=v.replace(/\D/g,"");             // Remove tudo o que não é dígito
  v=v.replace(/(\d{2})(\d{2})(\d{4})$/,"$1-$2-$3");    // Coloca hífen
  return v;
}
function ano(v){
  v=v.replace(/\D/g,"");             // Remove tudo o que não é dígito
  v=v.replace(/(\d{4})$/,"$1");    // Coloca hífen
  return v;
}
function mascara(o,f){
  v_obj=o
  v_fun=f
  executar_mascara();
}
function executar_mascara(){
  v_obj.value=v_fun(v_obj.value)
}
function retornar_elemento_id( el ){
  return document.getElementById( el );
}
function mascaraMutuario(o,f){
  v_obj=o
  v_fun=f
  setTimeout('execmascara()',1)
}

function execmascara(){
  v_obj.value=v_fun(v_obj.value)
}

function cpfCnpj(v){

  //Remove tudo o que não é dígito
  v=v.replace(/\D/g,"")

  if (v.length <= 14) { //CPF

      //Coloca um ponto entre o terceiro e o quarto dígitos
      v=v.replace(/(\d{3})(\d)/,"$1.$2")

      //Coloca um ponto entre o terceiro e o quarto dígitos
      //de novo (para o segundo bloco de números)
      v=v.replace(/(\d{3})(\d)/,"$1.$2")

      //Coloca um hífen entre o terceiro e o quarto dígitos
      v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")

  } else { //CNPJ

      //Coloca ponto entre o segundo e o terceiro dígitos
      v=v.replace(/^(\d{2})(\d)/,"$1.$2")

      //Coloca ponto entre o quinto e o sexto dígitos
      v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")

      //Coloca uma barra entre o oitavo e o nono dígitos
      v=v.replace(/\.(\d{3})(\d)/,".$1/$2")

      //Coloca um hífen depois do bloco de quatro dígitos
      v=v.replace(/(\d{4})(\d)/,"$1-$2")

  }

  return v

}