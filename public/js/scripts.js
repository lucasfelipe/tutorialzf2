/**
 * efeito alert
 */
$(function (){
   // pegar elemento com corpo da mensagem
   var corpo_alert = $("#alert-message");
   
   // verificar se o elemento esta presente na pagina
   if (corpo_alert.length)
       // gerar efeito para o elemento encontrado na pagina
       corpo_alert.fadeOut().fadeIn().fadeOut().fadeIn();
});