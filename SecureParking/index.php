<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estacionamento</title>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
 
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
    <style>
        
        *{
            box-sizing: border-box;
            margin: 0;  
            padding: 0;
        
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, blue, white);
        }
        .bg {
            background-image: url("./imagens/logo.png");
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
            background-position:bottom; 
        }
        div {
            background-color: black;
            position: absolute;
            border: 1px solid green;
            top: 64%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding:90px;
            border-radius: 20px;
            color: white;
        }
        input{
            padding: 15px;
            font-size: 15px;
            border: none;
            border-bottom: 1px solid white;
            border: none;
            outline: none;
        }
        button{
            background-color: black;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }
        button:hover{
            background-color: black;
            transition: 0.7s;
        }
        .inputSubmit{
            background-color: green;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }
        .inputSubmit:hover{
            background-color: black;
            transition: 0.7s;
        }
        a{
            background-color: green;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 30px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
        }
        a:hover{
            background-color: black;
            transition: 0.7s;
        }
        
        .toast {
    position: fixed;
    bottom: 10px;
    right: 10px;
    padding: 10px;
    background-color: #ffc107;
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 999;
    animation: slideInRight 0.5s, slideOutRight 0.5s 2.5s forwards;
}

.toast.warning {
    background-color: #ffc107;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
    }
    to {
        transform: translateX(0);
    }
}

@keyframes slideOutRight {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(100%);
    }
}
    </style>
</head>
<body>
    
    <div>
    <a class= "button" href="inicio.php">↩</a>
    <h1>SecureParking🅿️ </h1>
    <form id="loginForm" method="POST">
        <input type = "text" id="cpf" name= "cpf" placeholder="CPF">
        <br><br>
        <input type = "password" id="senha" name= "senha" placeholder="Senha">
        <br><br>
        <input class="inputSubmit" type="submit" name="submit" value="Entrar">
        <br><br>
    <p>O melhor estacionamento da região</p>
    </form> 
    </div>
    

</body>
<body>
</body>
</body>
<body class="bg">

</body>

<script type="text/javascript">
$('#loginForm').on('submit', function( event ) {
   // prevent the default submit
   event.preventDefault();
   var form = $(this);
   console.log(form)
   var cpfform=$("#cpf").val()
   console.log(cpfform)
   var senhaform=$("#senha").val()
   $.ajax({
        url: "testlogin.php", 
        type: "POST",
        // use the forms data
        data:{"cpf": cpfform, "senha": senhaform},

        beforeSend: function() {
            console.log( "Processing..." );
        },
        success: function( response ){
            console.log(response)
            // do sth with the response
            if(response == "OK") {
                window.location="http://localhost/cursoPHP/ex000/SecureParking/sistema.php"
               // credentials verified
               // redirect
            }else{
                alert ("cpf ou senha invalido")
               // credentials incorrect
               // append errormessage to modal
               $('#dialog').dialog('open');
            }
        },
        error: function( response ) {
           console.log(response);
        }

});
});
function abrirModal(){
    $('#dialog').dialog('open');
}
    $(document).ready(function() {
    $('#dialog').dialog({
      autoOpen: false   
    });
    
    $('#openDialog').click(function() {
      
    });
    
  });
</script>
</html>