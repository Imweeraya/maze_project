<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-character.css">
    <title>character</title>
</head>

<body>
    <div id="buttonmusic" class="music" onclick="music()"></div>

        <div id="formList">

            <div id="list">
                <div class="item">
                    <img src="https://storage.googleapis.com/sticker-prod/h3fYKAtBc7bJHvjP2MDW/22.thumb128.png" class="avatar">
                    <div class="content">
                        <table width="100%" cellspacing="0">
                            <tr>
                                <td class="NameofCha">Panguin</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="nameGroup">♥ ♥ ♥ ♥ ♥</td>
                            </tr>
                        </table>
                        <div class="submit" onclick="img1()">Start</div>
                    </div>
                </div>
                <div class="item">
                    <img src="https://storage.googleapis.com/sticker-prod/liGbkkeb2daR2aGjEjVM/14-2.thumb128.png" class="avatar">
                    <div class="content">
                        <table width="100%" cellspacing="0">
                            <tr>
                                <td class="NameofCha">Doreamon</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="nameGroup">♥ ♥ ♥ ♥ ♥</td>
                            </tr>
                        </table>
                        <div class="submit" onclick="img2()">Start</div>
                    </div>
                </div>
                <div class="item">
                    <img src="https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/37-2.thumb128.png" class="avatar">
                    <div class="content">
                        <table width="100%" cellspacing="0">
                            <tr>
                                <td class="NameofCha">Rabbit</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="nameGroup">♥ ♥ ♥ ♥ ♥</td>
                            </tr>
                        </table>
                        <div class="submit" onclick="img3()">Start</div>
                    </div>
                </div>
                <div class="item">
                    <img src="https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/36-2.thumb128.png" class="avatar">
                    <div class="content">
                        <table width="100%" cellspacing="0">
                            <tr>
                                <td class="NameofCha">Kitten</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="nameGroup">♥ ♥ ♥ ♥ ♥</td>
                            </tr>
                        </table>
                        <div class="submit" onclick="img4()">Start</div>
                    </div>
                </div>
                <div class="item">
                    <img src="https://storage.googleapis.com/sticker-prod/Y6HmEbLim68pXhi6K8P1/14.thumb128.png" class="avatar">
                    <div class="content">
                        <table width="100%" cellspacing="0">
                            <tr>
                                <td class="NameofCha">Run!!</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="nameGroup">♥ ♥ ♥ ♥ ♥</td>
                            </tr>
                        </table>
                        <div class="submit" onclick="img5()">Start</div>
                    </div>
                </div>
                <div class="item">
                    <img src="https://storage.googleapis.com/sticker-prod/XvNkRGoJzmoS2C12Tc4q/18-1.thumb128.webp" class="avatar">
                    <div class="content">
                        <table width="100%" cellspacing="0">
                            <tr>
                                <td class="NameofCha">Cat</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="nameGroup">♥ ♥ ♥ ♥ ♥</td>
                            </tr>
                        </table>
                        <div class="submit" onclick="img6()">Start</div>
                    </div>
                </div>
                <div class="item">
                    <img src="https://storage.googleapis.com/sticker-prod/tSgft396GlxTD9p7dnJ6/0.thumb128.png"  class="avatar">
                    <div class="content">
                        <table width="100%" cellspacing="0">
                            <tr>
                                <td class="NameofCha">Cat but loading</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="nameGroup">♥ ♥ ♥ ♥ ♥</td>
                            </tr>
                        </table>
                        <div class="submit" onclick="img7()">Start</div>
                    </div>
                </div>
                <div class="item">
                    <img src="https://storage.googleapis.com/sticker-prod/E8nMrPPN3Ifr0NH4370g/7-1.thumb128.png"  class="avatar">
                    <div class="content">
                        <table width="100%" cellspacing="0">
                            <tr>
                                <td class="NameofCha">doge bonk</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="nameGroup">♥ ♥ ♥ ♥ ♥</td>
                            </tr>
                        </table>
                        <div class="submit" onclick="img8()">Start</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="prev">
            <button id="back" onclick="redirectToPage('MazeStart.php')"> Back </button>
        </div>

    </body>
    <script>
        

        var count_music = 0;
        var audioBoom = new Audio("sound/selectCharacter.mp3");
        var buttonmusic = document.getElementById("buttonmusic");
        audioBoom.loop = true;


        function music(){
            if(count_music %2==0){
                audioBoom.play();
                audioBoom.volume = 0.3;
                buttonmusic.classList.add("sound");
            }
            else{
                audioBoom.play();
                audioBoom.volume = 0.0;
                buttonmusic.classList.remove("sound");
            }
            count_music++;
        }


        function img1(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/h3fYKAtBc7bJHvjP2MDW/22.thumb128.png" // Panguin
        }
        function img2(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/liGbkkeb2daR2aGjEjVM/14-2.thumb128.png" // Doreamon
        }
        function img3(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/37-2.thumb128.png" // Rabbit
        }
        function img4(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/36-2.thumb128.png" // Kitten
        }
        function img5(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/Y6HmEbLim68pXhi6K8P1/14.thumb128.png" // Run!!
        }
        function img6(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/XvNkRGoJzmoS2C12Tc4q/18-1.thumb128.webp" // Cat
        }
        function img7(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/tSgft396GlxTD9p7dnJ6/0.thumb128.png" // Cat but loading
        }
        function img8(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/E8nMrPPN3Ifr0NH4370g/7-1.thumb128.png" // doge bonk
        }

        function redirectToPage(url) {
        window.location.href = url;
        
    }

        function redirectToPage(url) {
        window.location.href = url;
    }
    </script>
</html>