<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
    <style>
        h1{
            text-align: center;
        }
        form{
            display: flex;
            flex-wrap: wrap;
            min-width: 300px;
            width: 50%;
            margin: 0 auto;
            background: rgba(52, 152, 219,.3);
            gap: 1em;
            padding: 1em;
        }
        form > div{
            flex: 1 0 100%;
        }
        .wrap_input > label{
            display: block;
            margin-bottom: 3px;
            font-size: 14px;
        }
        .wrap_input > input{
            width: 100%;
            padding: 5px 15px;
            border: 1px inset #2980b9;
            border-radius: 5px;
            box-shadow: 1px 1px 4px rgba(0,0,0,.3);
            box-sizing: border-box;
        }
        .wrap_input input[type="submit"]{
            background: #2980b9;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Form</h1>
    <form action="<?= $_SERVER['PHP_SELF']?>">
        <div class="wrap_input">
            <label for="nom">Name:</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div class="wrap_input">
            <label for="mail">Email:</label>
            <input type="text" name="mail" id="mail">
        </div>
        <div class="wrap_checkbox">
            <label for="check">start rating:</label>
            <div class="container-check-star"><input type="checkbox" name="check" id="star" value="5">5 Star</div>
            <div class="container-check-star"><input type="checkbox" name="check" id="star" value="4">4 Star</div>
            <div class="container-check-star"><input type="checkbox" name="check" id="star" value="3">3 Star</div>
            <div class="container-check-star"><input type="checkbox" name="check" id="star" value="2">2 Star</div>
            <div class="container-check-star"><input type="checkbox" name="check" id="star" value="1">1 Star</div>
        </div>
        <div class="wrap_checkbox">
            <label for="star">sports:</label>
            <div class="container-check"><input type="checkbox" name="star" id="star" value="5">tennis</div>
            <div class="container-check"><input type="checkbox" name="star" id="star" value="4">football</div>
            <div class="container-check"><input type="checkbox" name="star" id="star" value="3">badminton</div>
            <div class="container-check"><input type="checkbox" name="star" id="star" value="2">hockey</div>
            <div class="container-check"><input type="checkbox" name="star" id="star" value="1">cricket</div>
        </div>
        <div class="wrap_radio">
            <label for="genre">Gender: 
                <input type="radio" name="genre" id="genre" value="0"><span>Female</span>
                <input type="radio" name="genre" id="genre" value="1"><span>Male</span>
            </label>
        </div>
        <div class="wrap_input">
            <input type="submit" value="Insert" name="submit-form">
        </div>
    </form>
    <script>
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
    </script>
</body>
</html>