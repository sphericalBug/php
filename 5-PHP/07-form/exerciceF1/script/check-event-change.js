var form = document.querySelector('form');
form.addEventListener('submit', function(e){
    var stars = document.querySelectorAll('div.container-check-star input[type="checkbox"]');
                    var span3 = document.createElement('span');
                    var container3 = document.querySelectorAll('form > div')[2];
                    var count = 0;
                    var checked_input; 
stars.forEach(star => {
    if(star.checked){
        count++;
    }else{
        e.preventDefault();
        span3.setAttribute('class', 'error');
        span3.innerHTML = "Veuillez cocher une case";
        container3.appendChild(span3);
        container3.style.position = "relative";
        span3.style.position = "absolute";
        span3.style.top = "4px";
        span3.style.left = "80px";
        span3.style.color = "#c0392b";
        span3.style.fontSize = "12px";
        if(container3.childNodes.length == 15){
            container3.removeChild(container3.lastChild);
        }
    }
    // Evite le message d'erreur en cas de case coché dès le départ :
    if(count === 1){
        span3.style.display = "none";
    }
    // Retire le message d'erreur si une case est cochée :
    star.addEventListener('change', function(){
        if(star.checked && container3.childNodes.length == 14){
            container3.removeChild(container3.lastChild);
        }
    })
    
});

for(let star of stars){
    star.addEventListener('change', function(){
        if(star.checked){
            count = 1;
        }else{
            count = 0;
        }
        span3.setAttribute('class', 'error');
        span3.innerHTML = "Veuillez cocher une case";
        container3.appendChild(span3);
        container3.style.position = "relative";
        span3.style.position = "absolute";
        span3.style.top = "4px";
        span3.style.left = "80px";
        span3.style.color = "#c0392b";
        span3.style.fontSize = "12px";

        switch(count){
            case 0 : span3.style.display = "block";
                break;
            case 1 : span3.style.display = "none";
                break;
        }
        if(container3.childNodes.length == 15){
            container3.removeChild(container3.lastChild);
        }
        if(star.checked && container3.childNodes.length == 14){
            container3.removeChild(container3.lastChild);
        }
    })
}
})