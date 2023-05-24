<?php
$img = $_GET['img'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maze</title>
    <link rel="stylesheet" href="style-maze.css">
</head>


<body onload="createMaze()" style="font-family: Open Sans, -apple-system, BlinkMacSystemFont,Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell,Helvetica Neue, Helvetica, Arial, sans-serif;">

    <div id="buttonmusic" class="music" onclick="music()"></div>
    <h1>
        <img class="headernamecat" src="img/headerName.png">
    </h1>

    <div id="timer" class="timer"></div>


    <div class="score-board">
        <div class="board-cupcakescore">
            <img src="https://static.vecteezy.com/system/resources/previews/019/606/495/non_2x/cupcake-graphic-clipart-design-free-png.png" id="cupcake" alt="house" width="30px" height="30px">
            <div class="cupcake-title">
                CUPCAKE
            </div>
            <div class="cupcake-score">
                <p id="cakescore">0</p>
            </div>
        </div>

        <div class="board-keyscore">
            <img src="https://www.pngmart.com/files/8/Key-PNG-Free-Image-1.png" id="key" alt="house" width="30px" height="30px">

            <div class="key-title">
                KEY
            </div>
            <div class="key-score">
                <p id="keyscore">0</p>
            </div>
        </div>
    </div>

    <div id="maze-container">
        <div id="character"><img src="<?php echo $img; ?>" id="kitten" alt="kitten" width="30px" height="30px">
            <img src="https://cdn-icons-png.flaticon.com/512/3048/3048222.png" id="house" alt="house" width="30px" height="30px">
        </div>
        <div id="maze"></div>
    </div>

    <div class="button-contrainer">
        <button class="prev-button" onclick="redirectToPage('MazeStart.php')"> Back </button>
        <button class="Restart-button" onclick="restart()"> Restart </button>
    </div>
    <button onclick="storage()">abc</button>
    <button onclick="callStorage()">ssss</button>

    <?php // Local
    ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
    var bombsound = new Audio("bomb.mp3");
    var count_music = 0;
    var audioBoom = new Audio("sound/maze.mp3");
    var buttonmusic = document.getElementById("buttonmusic");

    function music() {
        if (count_music % 2 == 0) {
            audioBoom.play();
            audioBoom.volume = 0.7;
            buttonmusic.classList.add("sound");
        } else {
            audioBoom.play();
            audioBoom.volume = 0.0;
            buttonmusic.classList.remove("sound");
        }
        count_music++;
    }


    function redirectToPage(url) {
        window.location.href = url;
    }


    let maze = document.getElementById("maze");
    let maze_con = document.getElementById("maze-container");
    let character = document.getElementById("character");
    let kitten = document.getElementById("kitten");
    let house = document.getElementById("house");

    // ------------------------------ Time ------------------------------------

    var seconds = 60;

    function NubwiNatee() {

        var mimnutes = Math.round((seconds - 30) / 60);
        var Nubwi = seconds % 60;

        if (Nubwi < 10) {
            Nubwi = "0" + Nubwi;
        }

        document.getElementById("timer").innerHTML = mimnutes + " : " + Nubwi;

        if (seconds == 0) {
            document.getElementById("timer").style.color = "#FFEBEB ";
            seconds = null;
            Swal.fire({
                imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/23-2.thumb128.png',
                imageHeight: 150,
                title: 'OHH TIME OUT...MEOWWWW!!',
                text: 'Click button to try again Meow!',
                imageAlt: 'A tall image',
                confirmButtonText: 'MEOW'
            }).then((result) => {
                if (result.isConfirmed) {
                    ready = 1;
                    count = 1;
                    createMaze();
                    return;
                } else {
                    ready = 1;
                    count = 1;
                    createMaze();
                    return;
                }
            })
        } else {
            seconds--;
        }

    }
    var countdownTimer = setInterval('NubwiNatee()', 1000)


    /*-----------------------------------------------------------------------------------------*/

    function setKittenPosition(x, y) {
        kitten.style.bottom = x + "px";
        kitten.style.left = y + "px";
    }

    function setHousenPosition(x, y) {
        house.style.top = x + "px";
        house.style.right = y + "px";
    }

    function setBombPosition(x, y) {
        kitten.style.bottom = x + "px";
        kitten.style.left = y + "px";
    }




    var map = [ //position(add class)1 0=wall , 1=space , 2=kitten  , 3=cupcake , 5=bomb  position(active)2  0=nothing , 1=boom bomb , 2=collect cupcake
        // cupcake [3,2]  , bomb [5,1] , kitten [2,0] , wall [0,0] , space [1,0]
        [
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [4, 3],
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [3, 2],
            [5, 1],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [5, 1],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [5, 1],
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [5, 1],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [1, 0],
            [3, 2],
            [5, 1],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [3, 2],
            [0, 0]
        ],
        [
            [0, 0],
            [3, 2],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [5, 1],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [1, 0],
            [0, 0],
            [3, 2],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [5, 1],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [3, 2],
            [1, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [5, 1],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [5, 1],
            [0, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [1, 0],
            [1, 0],
            [5, 1],
            [3, 2],
            [0, 0],
            [3, 2],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [3, 2],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [1, 0],
            [0, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [1, 0],
            [0, 0],
            [0, 0],
            [3, 2],
            [1, 0],
            [1, 0],
            [1, 0],
            [5, 1],
            [1, 0],
            [0, 0]
        ],
        [
            [0, 0],
            [2, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0],
            [0, 0]
        ]
    ]


    var count = 0
    var count_Cupcake = 0
    var key = 0;
    var ready = 1;

    function createMaze() {

        document.getElementById("timer").style.color = "#FFEBEB";

        if (count_Cupcake > 0 || key > 0) {
            document.getElementById("timer").style.color = "black";
        }



        if (ready == 1) {
            document.getElementById("timer").style.color = "#FFEBEB";
            Swal.fire({
                imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/39-2.thumb128.png',
                imageHeight: 150,
                title: 'ARE YOU READY MEOW ?',
                text: 'Click button to start!',
                imageAlt: 'A tall image',
                confirmButtonText: 'MEOW'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("timer").style.color = "black";
                    seconds = 60;
                    ready = 0;
                    NubwiNatee();
                    return;
                } else {
                    document.getElementById("timer").style.color = "black";
                    seconds = 60;
                    NubwiNatee();
                    ready = 0;
                    return;
                }
            })
        }



        if (count == 1) {

            seconds = 59;
            count = 0
            count_Cupcake = 0
            key = 0


            character.innerHTML = `<img src="<?php echo $img; ?>" id="kitten" alt="kitten" width="30px" height="30px">
        <img src="https://cdn-icons-png.flaticon.com/512/3048/3048222.png" id="house" alt="house" width="30px" height="30px"> `




            map = [ //position(add class)1 0=wall , 1=space , 2=kitten  , 3=cupcake , 5=bomb  position(active)2  0=nothing , 1=boom bomb , 2=collect cupcake
                // cupcake [3,2]  , bomb [5,1] , kitten [2,0] , wall [0,0] , space [1,0]
                [
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [4, 3],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [3, 2],
                    [5, 1],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [5, 1],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [5, 1],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [5, 1],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [3, 2],
                    [5, 1],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [3, 2],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [3, 2],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [5, 1],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [3, 2],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [5, 1],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [3, 2],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [5, 1],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [5, 1],
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [5, 1],
                    [3, 2],
                    [0, 0],
                    [3, 2],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [3, 2],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [1, 0],
                    [0, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [0, 0],
                    [0, 0],
                    [3, 2],
                    [1, 0],
                    [1, 0],
                    [1, 0],
                    [5, 1],
                    [1, 0],
                    [0, 0]
                ],
                [
                    [0, 0],
                    [2, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0],
                    [0, 0]
                ]
            ]
        }

        maze.innerHTML = ``

        document.getElementById("cakescore").innerHTML = count_Cupcake + " / 10";
        document.getElementById("keyscore").innerHTML = key + " / 1";




        /* maze.innerHTML=`<img src="https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/37-2.thumb128.png" id="kitten" alt="kitten" width="30px" height="30px">
         <img src="https://cdn-icons-png.flaticon.com/512/3048/3048222.png" id="house" alt="house" width="30px" height="30px">`;
         let po = getKittenPosition();
         kitten.style.bottom = (po[0]*30) + "px";
         kitten.style.left = (po[1]*30) + "px";*/






        for (let i = 0; i < map.length; i++) {
            let row = document.createElement("div"); //สร้าง div แต่ละ row (0-3): <div></div>
            row.classList.add("row"); //ใส่ชื่อ class row  : <div class="row"></div>

            for (let j = 0; j < map[i].length; j++) {
                let cell = document.createElement("div");
                cell.classList.add("cell");

                /*
                    <div class="row">

                        <div class="wall cell" ></div>
                        <div class="cell" ></div>
                        <div class="cell" ></div>
                        <div class="cell" ></div>
                    
                    </div>
                
                */

                if (map[i][j][0] == 0) {
                    cell.classList.add("wall");
                }

                if (map[i][j][0] == 5) {
                    cell.classList.add("bomb");
                }

                if (map[i][j][0] == 3) {
                    cell.classList.add("cupcake");
                }

                if (map[i][j][0] == 4) {
                    cell.classList.add("key");
                }



                if (i == 0 && j == 0) {
                    map[i][j][0] = 2; //กำหนดตำแหน่งแมวเป็น 2 คือจุด 0 0
                }
                row.appendChild(cell); //ให้ div cell อยู่ใน div row

            }
            maze.appendChild(row); //ให้ div row อยู่ใน div maze
        }


        //setKittenPosition(0,30);
        /*setHousePosition(0,30);*/

    }


    function getKittenPosition() {
        let position = [-1, -1]; //กำหนดไว้ชั่วคราว
        for (let i = 0; i < map.length; i++) {
            for (let j = 0; j < map[i].length; j++) {
                if (map[i][j][0] == 2) {
                    position[0] = i;
                    position[1] = j;
                }
            }
        }

        console.log(position);
        return position;
    }

    /*var kitleft = 0;
    var kittop = 0;*/

    document.addEventListener("keydown",
        function(e) {
            kitten = document.getElementById("kitten");
            house = document.getElementById("house");

            let kittenLeft = kitten.offsetLeft;
            let kittenTop = kitten.offsetTop;

            let houseLeft = house.offsetLeft;
            let houseTop = house.offsetTop;

            let kittenPosition = getKittenPosition();

            if ((e.key == "ArrowRight" || e.key == "d") && kittenLeft < (map.length - 1) * 30 && map[kittenPosition[0]][kittenPosition[1] + 1][0] != 0) {
                kittenLeft += 30;

                if (map[kittenPosition[0]][kittenPosition[1] + 1][1] == 1) {
                    document.getElementById("timer").style.color = "#FFEBEB ";
                    seconds = null;
                    Swal.fire({
                        imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/19-2.thumb128.png',
                        imageHeight: 150,
                        title: 'OH THIS IS BOOM MEOWWWW!!',
                        text: 'Click button to try again Meow!',
                        imageAlt: 'A tall image',
                        confirmButtonText: 'MEOW'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        } else {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                }

                if (map[kittenPosition[0]][kittenPosition[1] + 1][1] == 2) {
                    map[0][0][0] = 0;
                    count_Cupcake = count_Cupcake + 1
                    kitten.style.left = kittenLeft + "px";
                    map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                    map[kittenPosition[0]][kittenPosition[1] + 1][0] = 2;
                    map[kittenPosition[0]][kittenPosition[1] + 1][1] = 0;
                    console.log("cupcake" + count_Cupcake)
                    createMaze();
                    return;
                }

                kitten.style.left = kittenLeft + "px";
                map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                map[kittenPosition[0]][kittenPosition[1] + 1][0] = 2;



            }

            if ((e.key == "ArrowLeft" || e.key == "a") && kittenLeft > 0 && map[kittenPosition[0]][kittenPosition[1] - 1][0] != 0) {
                kittenLeft -= 30;

                if (map[kittenPosition[0]][kittenPosition[1] - 1][1] == 1) {
                    document.getElementById("timer").style.color = "#FFEBEB ";
                    seconds = null;
                    Swal.fire({
                        imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/19-2.thumb128.png',
                        imageHeight: 150,
                        title: 'OH THIS IS BOOM MEOWWWW!!',
                        text: 'Click button to try again Meow!',
                        imageAlt: 'A tall image',
                        confirmButtonText: 'MEOW'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        } else {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                }

                if (map[kittenPosition[0]][kittenPosition[1] - 1][1] == 2) {
                    map[0][0][0] = 0;
                    count_Cupcake = count_Cupcake + 1
                    kitten.style.left = kittenLeft + "px";
                    map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                    map[kittenPosition[0]][kittenPosition[1] - 1][0] = 2;
                    map[kittenPosition[0]][kittenPosition[1] - 1][1] = 0;
                    console.log("cupcake" + count_Cupcake)
                    createMaze();
                    return;
                }
                kitten.style.left = kittenLeft + "px";
                map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                map[kittenPosition[0]][kittenPosition[1] - 1][0] = 2;


            }



            if ((e.key == "ArrowUp" || e.key == "w") && kittenTop > 0 && map[kittenPosition[0] - 1][kittenPosition[1]][0] != 0) {
                kittenTop -= 30;

                if (map[kittenPosition[0] - 1][kittenPosition[1]][1] == 1) {
                    document.getElementById("timer").style.color = "#FFEBEB ";
                    seconds = null;
                    Swal.fire({
                        imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/19-2.thumb128.png',
                        imageHeight: 150,
                        title: 'OH THIS IS BOOM MEOWWWW!!',
                        text: 'Click button to try again Meow!',
                        imageAlt: 'A tall image',
                        confirmButtonText: 'MEOW'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        } else {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                }

                if (map[kittenPosition[0] - 1][kittenPosition[1]][1] == 2) {
                    map[0][0][0] = 0;
                    console.log(map);
                    count_Cupcake = count_Cupcake + 1
                    kitten.style.top = kittenTop + "px";
                    map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                    map[kittenPosition[0] - 1][kittenPosition[1]][0] = 2;
                    map[kittenPosition[0] - 1][kittenPosition[1]][1] = 0;
                    console.log("cupcake" + count_Cupcake)
                    createMaze();
                    return;
                }

                if (map[kittenPosition[0] - 1][kittenPosition[1]][1] == 3) {
                    map[0][0][0] = 0;
                    key = 1
                    kitten.style.top = kittenTop + "px";
                    map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                    map[kittenPosition[0] - 1][kittenPosition[1]][0] = 2;
                    map[kittenPosition[0] - 1][kittenPosition[1]][1] = 0;
                    console.log("Key" + key)
                    createMaze();
                    return;
                }
                kitten.style.top = kittenTop + "px";
                map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                map[kittenPosition[0] - 1][kittenPosition[1]][0] = 2;


            }

            if ((e.key == "ArrowDown" || e.key == "s") && kittenTop < (map.length - 1) * 30 && map[kittenPosition[0] + 1][kittenPosition[1]][0] != 0) {
                kittenTop += 30;

                if (map[kittenPosition[0] + 1][kittenPosition[1]][1] == 1) {
                    document.getElementById("timer").style.color = "#FFEBEB ";
                    seconds = null;
                    Swal.fire({
                        imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/19-2.thumb128.png',
                        imageHeight: 150,
                        title: 'OH THIS IS BOOM MEOWWWW!!',
                        text: 'Click button to try again Meow!',
                        imageAlt: 'A tall image',
                        confirmButtonText: 'MEOW'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        } else {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                }

                if (map[kittenPosition[0] + 1][kittenPosition[1]][1] == 2) {
                    map[0][0][0] = 0;
                    count_Cupcake = count_Cupcake + 1
                    kitten.style.top = kittenTop + "px";
                    map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                    map[kittenPosition[0] + 1][kittenPosition[1]][0] = 2;
                    map[kittenPosition[0] + 1][kittenPosition[1]][1] = 0;
                    console.log("cupcake" + count_Cupcake)
                    createMaze();
                    return;
                }

                kitten.style.top = kittenTop + "px";
                map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                map[kittenPosition[0] + 1][kittenPosition[1]][0] = 2;


            }

            if (kittenLeft == houseLeft && kittenTop == houseTop && key == 1) {
                document.getElementById("timer").style.color = "#FFEBEB ";
                seconds = null;

                if (count_Cupcake == 10) {
                    Swal.fire({
                        imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/1-2.thumb128.png',
                        imageHeight: 150,
                        title: 'PURRRRR PERFECTT!! MEOW MEOW! Cupcake : ' + count_Cupcake + ' / 10',
                        text: 'Click button Meow!',
                        imageAlt: 'A tall image',
                        confirmButtonText: 'MEOW Again?'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        } else {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                } else if (count_Cupcake >= 8) {
                    Swal.fire({
                        imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/2-2.thumb128.png',
                        imageHeight: 150,
                        title: 'AMAZING MEOW MEOW! Cupcake : ' + count_Cupcake + ' / 10',
                        text: 'Click button Meow!',
                        imageAlt: 'A tall image',
                        confirmButtonText: 'MEOW Again?'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        } else {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                } else if (count_Cupcake >= 6) {
                    Swal.fire({
                        imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/15-2.thumb128.png',
                        imageHeight: 150,
                        title: 'GOOD JOB MEOW MEOW! Cupcake : ' + count_Cupcake + ' / 10',
                        text: 'Click button Meow!',
                        imageAlt: 'A tall image',
                        confirmButtonText: 'MEOW Again?'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        } else {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                } else if (count_Cupcake >= 4) {
                    Swal.fire({
                        imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/8-2.thumb128.png',
                        imageHeight: 150,
                        title: 'WELL DONE...MEOW MEOW! Cupcake : ' + count_Cupcake + ' / 10',
                        text: 'Click button Meow!',
                        imageAlt: 'A tall image',
                        confirmButtonText: 'MEOW Again?'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        } else {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                } else {
                    Swal.fire({
                        imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/20-2.thumb128.png',
                        imageHeight: 150,
                        title: 'I...WANT...MORE...CUPCAKE!!! MEOW! Cupcake : ' + count_Cupcake + ' / 10',
                        text: 'Click button Meow!',
                        imageAlt: 'A tall image',
                        confirmButtonText: 'MEOW Again?'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        } else {
                            ready = 1;
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                }


                //createMaze();

                /*Swal.fire(
                    'AMAZING MEOW MEOW!',
                    'Click button Meow!',
                    'success Meow!!'
                )*/
            } else if (kittenLeft == houseLeft && kittenTop == houseTop) {
                Swal.fire({
                    imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/17-2.thumb128.png',
                    imageHeight: 150,
                    title: 'I can not go inside Meowww!!',
                    text: 'Please collect the Key MEOWWW!',
                    text: 'Click button Meow!',
                    imageAlt: 'A tall image'

                })
            }


        }
    )

    function restart() {
        ready = 1;
        count = 1;
        createMaze();
    }


    //window.localStorage.setItem('game-state',JSON)


    // Api
    var url = 'https://crudcrud.com/api/07d04803500d458e8bf042940e819b2a/maze'; // Replace with your API endpoint URL

    var data = {
        // Replace with the data you want to send in the POST request
        img: '<?php echo $img; ?>',
        time: '0.5',
        cake: 'cake',
    };

    /*    var requestOptions = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        };

        fetch(url, requestOptions)
            .then(response => response.json())
            .then(result => {
                // Handle the API response
                console.log(result);
            })
            .catch(error => {
                // Handle any errors
                console.log('Error:', error);
            });*/

    // Local storage
    function storage() {
        var obj = {
            position: count_Cupcake,
            time: "5"
        };
        localStorage.setItem('user', JSON.stringify(obj));
        var storeObj = JSON.parse(localStorage.getItem('user'));
        console.log(storeObj);
    }
    function callStorage(){
        var callobj = JSON.parse(localStorage.getItem('user'))
        console.log(callobj)
    }
    //ASD
</script>

</html>