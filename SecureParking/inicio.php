<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;  
            padding: 0;
        
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            border: green;
            color: white;   
            
        
        }
        .bg {
            background-image: url("logo.png");
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
            background-position:bottom; 
            
        }
        .box {
            position: absolute;
            border: 1px solid green;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color:black;
            padding: 30px;
            border-radius: 15px;
        }
        a{
            text-decoration: none;
            color: white;
            background-color: green;
            border-radius: 15px;
            padding: 12px;
        }
        a:hover{
            background-color: black;
            transition: 0.7s;
        }
    </style>

</head>
<body>
    <div class=box>
    <h1>SECURE PARKING🅿️</h1>
    <br><br>
    <h2>Bem-vindo ao Secure Parking, o melhor estacionamento da região!!</h2>
    <br>
        <a href="index.php">login</a>
        <br><br>
        <p>Não possue cadastro? clique no botão cadastrar:<a href="Cadastro.php">Cadastre-se</a>
    </div>
</body>
<body class="bg">

</body>
</html>