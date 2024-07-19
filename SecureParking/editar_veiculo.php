<?php
if(!empty($_GET['id']))
{
    

        include_once("conexao.php");

        $id = $_GET['id'];

        $sqlselect= "SELECT * FROM veiculos WHERE id = $id";

        $result= $mysqli->query($sqlselect);

        if($result-> num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
            //$nome = mysqli_real_escape_string($mysqli, $user_data['nome']);
           // $cpf = mysqli_real_escape_string($mysqli, $user_data['cpf']);
          //  $email = mysqli_real_escape_string($mysqli, $user_data['email']);
          //  $senha = mysqli_real_escape_string($mysqli,$user_data['senha']);
            //$csenha = mysqli_real_escape_string($mysqli,$user_data['csenha']);
           // $telefone =mysqli_real_escape_string($mysqli, $user_data['telefone']);
           // $genero =mysqli_real_escape_string($mysqli, $user_data['genero']);
           // $data_nasc =mysqli_real_escape_string($mysqli, $user_data['data_nasc']);
           // $endereco =mysqli_real_escape_string($mysqli, $user_data['endereco']);
           // $cep =mysqli_real_escape_string($mysqli, $user_data['cep']);
            //$numero_complemento = mysqli_real_escape_string($mysqli,$user_data['numero_complemento']);
            $modelo_veiculo =mysqli_real_escape_string($mysqli, $user_data['modelo']);
            $placa_veiculo =mysqli_real_escape_string($mysqli, $user_data['placa']);
            $ano_veiculo = mysqli_real_escape_string($mysqli,$user_data['ano']);
            }
            
        }
        else
        {
            header('Location: lista_veiculo.php');
        }

}
else
{
    header('Location: lista_veiculo.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar veiculo</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;  
            padding: 0;
        
        }
        .bg {
            background-image: url("./imagens/verde.jpg");   
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
            background-position:bottom; 
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
        
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
        }
        fieldset{
            border: 1px solid green;
            border-radius: 15px;
        }
        legend{
            border: 1px solid green   ;
            padding: 10px;
            text-align: center;
            background-color: black;
            border-radius: 15px;
        }
        .inputbox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid green;
            color: white;
            font-size: 15px;
            width: 50%;
        }
        #update{
            background-color: green;
            width: 100%;
            border-radius: 13px;
            border: none;
            padding: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }
        #update:hover{
background-color: black;
transition: 0.5s;
        }
        .button{
            text-decoration: none;
            background-color: green;
            border: none;
            padding: 5px;
            width: 50%;
            border-radius: 25px;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }
        .button:hover{
            background-color: black;
            transition: 0.5s;
        }
        
    </style>
</head>
<body>
    <div class="box">
        <form action="veiculos_editados.php" method="POST">
            <fieldset>
                <a class= "button" href="lista_veiculos.php">↩</a>
                <br>
                <legend><b>Editar veiculo</b></legend>
                <br>
                <!-- <div class="inputBox">
                    <label for="nome" class="labelInput"><b>Nome completo:</b></label>
                    <input type="text" name="nome"
                    id="nome"
                    class="inputUser" value="<?php echo $nome ?>" required>
                </div> -->
                <!-- <br>
                <div class="inputBox">
                    <label for="cpf" class="labelInput"><b>CPF:</b></label>
                    <input type="text" name="cpf" id="cpf" class="inputUser" value="<?php echo $cpf ?>" required>
                </div>
                <br> -->
                <!-- <div class="inputBox">
                    <label for="email" class="labelInput"><B>Email:</B></label>
                    <input type="email" name="email"
                    id="email"
                    class="inputUser" value="<?php echo $email ?>" required>
                </div>
                <br> -->
                <!-- <div class="inputBox">
                    <label for="senha" class="labelInput"><b>Senha:</b></label>
                    <input type="text" name="senha" id="senha" class="inputUser" value="" required>
                </div>
                <br> -->
                <!-- <div class="inputBox">
                    <label for="csenha" class="labelInput"><b>Confirmar Senha:</b></label>
                    <input type="text" name="csenha" id="csenha" class="inputUser" value=">" required>
                </div> -->
                
                <!-- <div class="inputBox">
                    <label for="telefone" class="labelInput"><b>Telefone:</b></label>
                    <input type="tel" name="telefone"
                    id="telefone"
                    class="inputUser" value="<?php echo $telefone ?>"required>
                </div>
                <p>sexo:</p>
                <input type="radio" id="masculino" name="genero" value="masculino"<?php echo$genero == 'masculino' ? 'checked' : ''?> required>
                <label for="genero">masculino</label>
                <input type="radio" id="feminino" name="genero" value="feminino" <?php echo$genero == 'feminino' ? 'checked' : ''?>required>
                <label for="genero">Feminino</label>
                <input type="radio" id="outros" name="genero" value="outros"<?php echo$genero == 'outros' ? 'checked' : ''?> required>
                <label for="genero">Outros</label>
                <br><br>
                <div class="inputBox">
                    <label for="data_nascimento"><b>Data de nascimento:</b></label>
                    <input type="date" name="data_nascimento" id="data_nascimento" class="inputUser" value="<?php echo $data_nasc ?>" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="endereco" class="labelInput"><b>Endereço:</b></label>
                    <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>"required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="cep" class="labelInput"><b>CEP:</b></label>
                    <input type="text" name="cep" id="cep" class="inputUser" value="<?php echo $cep ?>" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="numero_complemento" class="labelInput"><b>Numero/complemento:</b></label>
                    <input type="text" name="numero_complemento" id="numero_complemento" class="inputUser" value="<?php echo $numero_complemento ?>"required>
                </div>
                <br> -->
                <div class="inputBox">
                    <label for="modelo" class="labelInput"><b>Modelo do Veículo:</b></label>
                    <input type="text" name="modelo" id="modelo" class="inputUser" value="<?php echo $modelo_veiculo ?>" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="placa"><b>Placa do Veículo:</b></label>
                    <input type="text" name="placa" id="placa" class="inputUser" value="<?php echo $placa_veiculo ?>"required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="ano"><b>Ano do Veículo:</b></label>
                    <input type="text" name="ano" id="ano" class="inputUser" value="<?php echo $ano_veiculo ?>" required>
                </div>
                <br>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
    </div>
    
</body>
<body class="bg"></body>
</html>