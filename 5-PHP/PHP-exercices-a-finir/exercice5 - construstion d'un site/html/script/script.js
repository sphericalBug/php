(function(){
    window.addEventListener('load', function(){
        var form = document.getElementsByTagName('form')[0];
        form.addEventListener('submit', function(e){
            var bool = true;
            var name1 = form.name.value;
            var email1 = form.email.value;
            var message = form.message.value;
            var form_control0 = document.getElementsByClassName('form__control')[0];
            var form_control1 = document.getElementsByClassName('form__control')[1];
            var form_control2 = document.getElementsByClassName('form__control')[2];
            var reg = new RegExp(/^([a-zA-Z0-9_-]\.*)+@[a-zA-Z0-9_-]+\.[a-z]{2,6}$/);
                if(!name1){
                    e.preventDefault();
                    span0 = document.createElement('span');
                    span0.setAttribute('class', 'error');
                    span0.innerHTML = "Veuillez indiquer votre nom";
                    form_control0.appendChild(span0);
                    bool = false;
                    if(form_control0.childNodes.length == 7){
                        form_control0.removeChild(form_control0.lastChild);
                    }
                }
                if(name1 && form_control0.childNodes.length == 6){
                    form_control0.removeChild(form_control0.lastChild);
                    bool = true;
                }
    
                if(!reg.test(email1)){
                    e.preventDefault();
                    span1 = document.createElement('span');
                    span1.setAttribute('class', 'error');
                    span1.innerHTML = "Veuillez indiquer un email valide";
                    form_control1.appendChild(span1);
                    bool = false;
                    if(form_control1.childNodes.length == 7){
                        form_control1.removeChild(form_control1.lastChild);
                    }
                }
                if(reg.test(email1) && form_control1.childNodes.length == 6){
                    form_control1.removeChild(form_control1.lastChild);
                    bool = true;
                }
                if(!message){
                    e.preventDefault();
                    span2 = document.createElement('span');
                    span2.setAttribute('class', 'error');
                    span2.innerHTML = "Veuillez indiquer votre message";
                    form_control2.appendChild(span2);
                    bool = false;
                    if(form_control2.childNodes.length == 7){
                        form_control2.removeChild(form_control2.lastChild);
                    }
                }
                if(message && form_control2.childNodes.length == 6){
                    form_control2.removeChild(form_control2.lastChild);
                    bool = true;
                }
                if(bool){
                    console.log('message envoyé');
                }else{
                    console.log(bool);
                }
        });
    });
})();
// menu :
var menu = document.getElementById('menu');
var btn = document.getElementById('hamburger');
btn.addEventListener('click', function(){
    btn.classList.toggle('active');
    menu.classList.toggle('active');
});