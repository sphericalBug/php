(function(){
    var test = {
        init: function(){
            window.addEventListener('load', function(){
                var checkboxes = document.querySelectorAll('form div.wrap_checkbox:nth-child(3) input[type="checkbox"]');
                var container = document.getElementsByClassName('container-check-star');
                checkboxes.forEach(check =>  {
                    check.addEventListener('click', function(e){
                        if(e.target.getAttribute('class') === 'active'){
                            e.target.removeAttribute('class');
                            for(i=0;i<checkboxes.length;i++){
                                    checkboxes[i].disabled = false;
                                    container[i].style.color = "black";
                            }
                        }else{
                            e.target.setAttribute('class', 'active');
                            for(i=0;i<checkboxes.length;i++){
                                if(!checkboxes[i].getAttribute('class')){
                                    checkboxes[i].disabled = true;
                                    container[i].style.color = 'lightgrey';
                                };
                            }
                        }
                    });
                });
            });
        },
        validate: function(){
            window.addEventListener('load', function(){
                var form = document.getElementById('form');
                form.addEventListener('submit', function(e){
                    // vérification du champ nom :
                    var nom = form.nom.value;
                    var span1 = document.createElement('span');
                    var container1 = document.querySelectorAll('form > div')[0];
                    if(!nom){
                        e.preventDefault();
                        span1.setAttribute('class', 'error');
                        span1.innerHTML = "Veuillez indiquer votre nom";
                        container1.appendChild(span1);
                        container1.style.position = "relative";
                        span1.style.position = "absolute";
                        span1.style.bottom = "-20px";
                        span1.style.left = 0;
                        span1.style.color = "#e1b12c";
                        span1.style.fontSize = "12px";
                        if(container1.childNodes.length == 7){
                            container1.removeChild(container1.lastChild);
                        }
                    }
                    if(nom && container1.childNodes.length == 6){
                        container1.removeChild(container1.lastChild);
                    }
                    if(nom){
                        console.log(nom);
                    }
                    // vérification du champ mail :
                    var mail = form.mail.value;
                    var reg = new RegExp(/^([a-zA-Z0-9]\.*)+@[a-zA-Z0-9_-]+\.[a-z]{2,6}$/);
                    var span2 = document.createElement('span');
                    var container2 = document.querySelectorAll('form > div')[1];
                    if(!reg.test(mail)){
                        e.preventDefault();
                        span2.setAttribute('class', 'error');
                        span2.innerHTML = "Veuillez indiquer un email valide";
                        container2.appendChild(span2);
                        container2.style.position = "relative";
                        span2.style.position = "absolute";
                        span2.style.bottom = "-20px";
                        span2.style.left = 0;
                        span2.style.color = "#e1b12c";
                        span2.style.fontSize = "12px";
                        if(container2.childNodes.length == 7){
                            container2.removeChild(container2.lastChild);
                        }
                    }
                    if(reg.test(mail) && container2.childNodes.length == 6){
                        container2.removeChild(container2.lastChild);
                    }
                    if(reg.test(mail)){
                        console.log(mail);
                    }
                    // vérification du checkbox star :
                    var stars = document.querySelectorAll('div.container-check-star input[type="checkbox"]');
                    var span3 = document.createElement('span');
                    var container3 = document.querySelectorAll('form > div')[2];
                    var count = 0;
                    var checked_star; 
                    for(star of stars){
                        if(star.checked){
                            checked_star = star.value + "\n\r";
                            count++;
                            // console.log(checked_star);
                        }
                    }
                    if(count == 0){
                        e.preventDefault();
                        span3.setAttribute('class', 'error');
                        span3.innerHTML = "Veuillez cocher une case";
                        container3.appendChild(span3);
                        container3.style.position = "relative";
                        span3.style.position = "absolute";
                        span3.style.top = "4px";
                        span3.style.left = "80px";
                        span3.style.color = "#e1b12c";
                        span3.style.fontSize = "12px";
                        if(container3.childNodes.length == 15){
                            container3.removeChild(container3.lastChild);
                        }
                    }else if(count == 1 && container3.childNodes.length == 14){
                        container3.removeChild(container3.lastChild);

                    }
                    if(checked_star){
                        console.log(checked_star);
                    }
                    // vérification du checkbox sport :
                    var sports = document.querySelectorAll('div.container-check-sport input[type="checkbox');
                    var span4 = document.createElement('span');
                    var container4 = document.querySelectorAll('form > div')[3];
                    var count = 0;
                    var checked_sports = "";
                    
                    for(sport of sports){
                        if(sport.checked){
                            checked_sports += sport.value + ",";
                            count++;
                        }
                    }
                    if(count == 0){
                        e.preventDefault();
                        span4.setAttribute('class', 'error');
                        span4.innerHTML = "Veuillez saisir au minimum 1 sport !!";
                        container4.appendChild(span4);
                        container4.style.position = "relative";
                        span4.style.position = "absolute";
                        span4.style.top = "3px";
                        span4.style.left = "48px";
                        span4.style.color = "#e1b12c";
                        span4.style.fontSize = "12px";
                        if(container4.childNodes.length == 15){
                            container4.removeChild(container4.lastChild);
                        }
                    }else if(count != 0 && container4.childNodes.length == 14){
                        container4.removeChild(container4.lastChild);
                    }
                    if(checked_sports){
                        
                        checked_sports = checked_sports.substr(0, checked_sports.length - 1);
                        console.log(checked_sports);
                    }
                    // vérification du champ genre :
                    var genres = document.querySelectorAll('div.wrap_radio input[type="radio"]');
                    var span5 = document.createElement('span');
                    var container5 = document.querySelectorAll('form > div')[4];
                    var count = 0;
                    var checked_genre;
                    for(genre of genres){
                        if(genre.checked){
                            checked_genre = genre.value;
                            count++;
                        }
                    }
                    if(count == 0){
                        e.preventDefault();
                        span5.setAttribute('class', 'error');
                        span5.innerHTML = "Veuillez indiquer votre genre";
                        container5.appendChild(span5);
                        container5.style.position = 'relative';
                        span5.style.position = "absolute";
                        span5.style.top = "18px";
                        span5.style.left = "0px";
                        span5.style.color = "#e1b12c";
                        span5.style.fontSize = "12px";
                        if(container5.childNodes.length == 5){
                            container5.removeChild(container5.lastChild);
                        }
                    }else if(count == 1 && container5.childNodes.length == 4){
                        container5.removeChild(container5.lastChild);
                    }
                    if(checked_genre){
                        console.log(checked_genre);
                    }
                    // URL rewriting...
                });
            });
        }
    };
    test.init();
    test.validate();
})();