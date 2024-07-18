<?php
if (isset($_POST['submit'])) {
    //  print_r('Nome: ' . $_POST['nome']);
    //  print_r('<br>');
    //  print_r('CPF: ' .$_POST['cpf']);
    //  print_r('<br>');
    //  print_r('Email: ' .$_POST['email']);
    //  print_r('<br>');
    //  print_r('Ano do veículo: ' .$_POST['ano']);
    //  print_r('<br>');
    //  print_r('Telefone: ' .$_POST['telefone']);
    //  print_r('<br>');
    //  print_r('Sexo: ' .$_POST['genero']);
    //  print_r('<br>');
    //  print_r('Data de nascimento: ' .$_POST['data_nascimento']);
    //  print_r('<br>');
    //  print_r('Endereço: ' .$_POST['endereco']);
    //  print_r('<br>');
    //  print_r('CEP: ' .$_POST['cep']);
    //  print_r('<br>');
    //  print_r('Numero e complemento: ' .$_POST['numero_complemento']);
    //  print_r('<br>');
    //  print_r('Modelo do Veículo: ' .$_POST['modelo']);
    //  print_r('<br>');
    //  print_r('Placa do veículo: ' .$_POST['placa']);
    //  print_r('<br>');
    //  print_r('Ano do veículo: ' .$_POST['ano']);

    include_once("conexao.php");
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
    $csenha = mysqli_real_escape_string($mysqli, $_POST['csenha']);
    $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
    $genero = mysqli_real_escape_string($mysqli, $_POST['genero']);
    $data_nasc = mysqli_real_escape_string($mysqli, $_POST['data_nascimento']);
    $endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);
    $cep = mysqli_real_escape_string($mysqli, $_POST['cep']);
    $numero_complemento = mysqli_real_escape_string($mysqli, $_POST['numero_complemento']);
    $modelo_veiculo = mysqli_real_escape_string($mysqli, $_POST['modelo']);
    $placa_veiculo = mysqli_real_escape_string($mysqli, $_POST['placa']);
    $ano_veiculo = mysqli_real_escape_string($mysqli, $_POST['ano']);

    $date = date('Y-m-d H:i:s');

    $sql = mysqli_query($mysqli, "INSERT INTO clientes(nome,cpf,email,senha,telefone,genero,data_nasc,endereco,cep,numero_complemento,data_registro, deletado) VALUES('$nome','$cpf','$email','$senha','$telefone','$genero','$data_nasc','$endereco','$cep','$numero_complemento','$date',0) ");
    
    // $senha = $_POST['senha']; 
    // $csenha = $_POST['csenha']; 
    
    // if ($senha === $csenha) {
    //     echo "As senhas conferem!";
        
       
    // } else {
    //     echo "As senhas não conferem. Por favor, tente novamente.";
    // }

    if($sql === FALSE) { 
        die(mysqli_error($mysqli));
     }
    $result = mysqli_query($mysqli, "SELECT * FROM clientes WHERE cpf LIKE '%".$cpf."%'");
    if($result === FALSE) { 
        die(mysqli_error($mysqli));
     }
    if ($result->num_rows > 0) {
        var_dump($result);
        while ($user_data = mysqli_fetch_assoc($result)) {
            $id = $user_data['id'];
            $veiculos = mysqli_query($mysqli, "INSERT INTO veiculos (modelo,placa,ano,clienteid) VALUES('$modelo_veiculo','$placa_veiculo','$ano_veiculo','$id')");
            if($veiculos === FALSE) { 
                die(mysqli_error($mysqli));
             }
        }
    }

    header('Location: index.php');
}


// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST['senha']; // A senha digitada pelo usuário
    $confirmacaoSenha = $_POST['confirmacao_senha']; // A confirmação da senha digitada pelo usuário

    // Inicializa a variável de mensagem de erro
    $erroSenha = '';

    // Verifica se a senha e a confirmação são iguais
    if ($senha !== $confirmacaoSenha) {
        // As senhas são diferentes, define a mensagem de erro
        $erroSenha = "Senha ou confirmação de senha não se conferem. Por favor, tente novamente.";
    } else {
        // As senhas são iguais, você pode prosseguir com o salvamento da senha
        // Aqui você pode inserir o código para salvar a senha no banco de dados, por exemplo
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>confirmar senha</title>
</head>
<body>

<!-- Exibe a mensagem de erro, se houver -->
<?php if (!empty($erroSenha)): ?>
    <div class="erro">
        <?php echo $erroSenha; ?>
    </div>
<?php endif; ?>

<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST['senha']; // A senha digitada pelo usuário
    $csenha = $_POST['cenha']; // A confirmação da senha digitada pelo usuário

    // Inicializa a variável de mensagem de erro
    $erroSenha = '';

    // Verifica se a senha e a confirmação são iguais
    if ($senha !== $csenha) {
        // As senhas são diferentes, define a mensagem de erro
        $erroSenha = "Senha ou confirmação de senha não se conferem. Por favor, tente novamente.";
    } else {
        // As senhas são iguais, você pode prosseguir com o salvamento da senha
        // Aqui você pode inserir o código para salvar a senha no banco de dados, por exemplo
    }
}
?>
<!-- Exibe a mensagem de erro, se houver -->
<?php if (!empty($erroSenha)): ?>
    <div class="erro">
        <?php echo $erroSenha; ?>
    </div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>confirmção de senha</title>
    <style>
        .erro {
            color: red;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 0.5em;
            margin-bottom: 1em;
            border-radius: 0.25em;
        }
    </style>
</head>
<body>

<script>
    //validação de cpf:
function validarCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
  if (strCPF == "00000000000") return false;

  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
}

// Função para validar o formulário
function validarFormulario() {
    var cpf = document.getElementById('cpf').value;
    var senha = document.getElementById('senha').value;
    var csenha = document.getElementById('csenha').value;
    if (senha !== csenha) {
        event.preventDefault()
        alert('Senha e confirmação de senha não conferem. Por favor, tente novamente.');
        return false;
    }
    if(validarCPF(cpf) == false) {
        
        event.preventDefault()
        alert('Este CPF não existe!');
        return false;

    }

    return true;

}

</script>

</body>
<body class="bg">

</body> 
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>confirmacao de senha</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;  
            padding: 0;
        
        }
        .bg {
            background-image: url("verde.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
            background-position:bottom; 
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
    
        }

        .box {
            color: white;   
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: black;
            padding: 15px;
            border-radius: 15px;
        }

        fieldset {
            border: 1px solid green;
            border-radius: 15px;
        }

        legend {
            border: 1px solid green;
            padding: 10px;
            text-align: center;
            background-color: black;
            border-radius: 15px;
        }

        .inputbox {
            position: relative;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid green  ;
            color: white;
            font-size: 15px;
            width: 50%;
        }

        #submit {
            background-color: green;
            width: 100%;
            border: none;
            border-radius: 15px;
            padding: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }

        #submit:hover {
            background-color: black;
            transition: 0.5s;
        }

        .button {
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

        .button:hover {
            background-color: black;
            transition: 0.5s;
        }
    </style>
</head>

<body>
    <div class="box">
        <form action="Cadastro.php" method="POST">
            <fieldset>
                <a class="button" href="inicio.php">↩</a>
                <br>
                <legend><b>Cadastro de clientes</b></legend>
                <br>
                <div class="inputBox">
                    <label for="nome" class="labelInput"><b>Nome completo:</b></label>
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="cpf" class="labelInput"><b>CPF:</b></label>
                    <input type="text" name="cpf" id="cpf" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="email" class="labelInput"><B>Email:</B></label>
                    <input type="email" name="email" id="email" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="senha" class="labelInput"><b>Senha:</b></label>
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="csenha" class="labelInput"><b>Confirmar Senha:</b></label>
                    <input type="password" name="csenha" id="csenha" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="telefone" class="labelInput"><b>Telefone:</b></label>
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                </div>
                <p>sexo:</p>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="genero">masculino</label>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="genero">Feminino</label>
                <input type="radio" id="outros" name="genero" value="outros" required>
                <label for="genero">Outros</label>
                <br><br>
                <div class="inputBox">
                    <label for="data_nascimento"><b>Data de nascimento:</b></label>
                    <input type="date" name="data_nascimento" id="data_nascimento" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="endereco" class="labelInput"><b>Endereço:</b></label>
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="cep" class="labelInput"><b>CEP:</b></label>
                    <input type="text" name="cep" id="cep" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="numero_complemento" class="labelInput"><b>Numero/complemento:</b></label>
                    <input type="text" name="numero_complemento" id="numero_complemento" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="modelo" class="labelInput"><b>Modelo do Veículo:</b></label>
                    <input type="text" name="modelo" id="modelo" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="placa"><b>Placa do Veículo:</b></label>
                    <input type="text" name="placa" id="placa" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="ano"><b>Ano do Veículo:</b></label>
                    <input type="text" name="ano" id="ano" class="inputUser" required>
                </div>
                <br>
                <input type="submit" onclick="validarFormulario()" name="submit" id="submit">
            </fieldset>
        </form>
    </div>

</body>

</html>