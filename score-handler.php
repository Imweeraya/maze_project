<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul id="main-list"></ul>
    <script>
        fetch('https://crudcrud.com/api/5d9aaf67d5e94fdc88f93375da4c1830/maze2')
      .then(function (response) {
        console.log(response)
        return response.json()
      })
      .then(function (maze) {
        var mainListElm = document.getElementById('main-list')
        mainListElm.innerHTML = ''
        
        for(var i=0; i < maze.length; i++) {
          var liElm = document.createElement('li')
          console.log(maze[i])
          liElm.innerText = maze[i].img
          mainListElm.append(liElm)
        }
      })
    </script>
</body>
</html>