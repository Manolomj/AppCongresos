(function(){
    var messages = document.querySelectorAll('.mensajes');


    setTimeout(function(){
        for (var i = 0; i < messages.length; i++) {
            messages[i].classList.add('transicionarMensaje');
        }
    },5000);


    setTimeout(function(){
        for (var i = 0; i < messages.length; i++) {
            messages[i].remove();
        }
    },5300);
    

})();