<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="style-mazestart.css">
    <title>Maze Game</title>

</head>
<body>
    
    <section class="parallax">
        <div id="buttonmusic" class="music" onclick="music()"></div>

        <img src="img/floor.png" id="floor-left">
        <img src="img/cat1.png" id="cat-left">
        <img src="img/paw-right-lower.png" id="paw-lower-right">
        <img src="img/paw-right-middle.png" id="paw-right-middle">
        <img src="img/paw-right-mid.png" id="paw-right-mid">
        <img src="img/paw-right-upper.png" id="paw-right-upper">
        <img src="img/fish.png" id="fish-upper-left">


        <h1 id="text"> Kitten Maze</h1>

        <div class="container" id="container-botton">
            <div class="button-maze" onclick="redirectToPage('Cha.php')">Start</div>
        </div>

        <h2 id ="text-lower" onclick="click()">how to paly<br>▼</h2>

    </section>

    <section class="sec">
        <h2>How to play kitten maze</h2>
        <div class="texthighlight">♡</div><p> Use the </p><div class="texthighlight">"Arrow keys"</div><p> or </p><div class="texthighlight">"W","A","S","D"</div><p> to move the kitten through the maze.</p><br>
        <div class="texthighlight">♡</div><p> Find the </p><div class="texthighlight">key</div><p> to unlock the exit.</p><br>
        <div class="texthighlight">♡</div><p> Avoid the </p><div class="texthighlight">BOMB</div><p> and reach the end to win!</p><br>
        <div class="texthighlight">♡</div><div class="texthighlight"> Cupcake</div><p> is special gift</p>

    </section>
    

    <script>

        var count_music = 0;
        var audioBoom = new Audio("sound/StartPage.mp3");
        var buttonmusic = document.getElementById("buttonmusic");
        audioBoom.loop = true;

        function music(){
            if(count_music %2==0){
                audioBoom.play();
                audioBoom.volume = 0.5;
                buttonmusic.classList.add("sound");
            }
            else{
                audioBoom.play();
                audioBoom.volume = 0.0;
                buttonmusic.classList.remove("sound");
            }
            count_music++;
        }

        let text = document.getElementById('text'); 
        let fishupperleft= document.getElementById('fish-upper-left'); 
        let pawrightupper = document.getElementById('paw-right-upper');
        
        let catleft = document.getElementById('cat-left'); 
        let floorleft = document.getElementById('floor-left'); 
        let pawrightmiddle = document.getElementById('paw-right-middle');
        let pawrightmid = document.getElementById('paw-right-mid');  
        let pawrightlower = document.getElementById('paw-lower-right'); 

        let textlower = document.getElementById('text-lower'); 

        let containerbotton = document.getElementById('container-botton'); 


        window.addEventListener('scroll', () => {
            let value = window.scrollY; 
            text.style.marginTop = value * 2.5+ 'px'; 
            fishupperleft.style.left = value * -1.5 + 'px';
            pawrightupper.style.top = value* 0.2 +'px';
            pawrightmid.style.top = value * 0.3 + 'px';

            catleft.style.left = value *  0.4+ 'px';
            catleft.style.top = value *  -1.1 + 'px';
            
            floorleft.style.left = value *  0.53+ 'px';
            floorleft.style.top = value *  -1.2 + 'px';
            pawrightmiddle.style.top = value * 0.3 + 'px';
            pawrightlower.style.left = value * 0.5 + 'px';

            textlower.style.marginBottom = value * -1+ 'px'; 
           
            containerbotton.style.marginBottom = value * -1+ 'px'; 
            containerbotton.style.marginRight = value * -1+ 'px'; 
         });
         function redirectToPage(url) {
        window.location.href = url;
    }
        function click(){
            console.log(55) 
        }
        
    </script>
</body>
</html>