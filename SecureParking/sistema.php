<?php
session_start();
include_once('conexao.php');
//print_r($_SESSION);
if ((!isset($_SESSION['cpf']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['cpf']);
  // unset($_SESSION['nome']);
  unset($_SESSION['senha']);
  header('Location: index.php');
}
//$logado = $_SESSION['nome'];
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  //var_dump($data);
  //die;
  $sql = "SELECT * FROM clientes WHERE id LIKE '%$data%' OR nome LIKE '%$data%' OR email LIKE '%$data%'";
} 

else if (!empty($_GET['data'])) {
  $data = $_GET['data'];
  //var_dump($data);
  //die;
  $sql = "SELECT * FROM clientes WHERE data_registro LIKE '%$data%'";
}
else {
  $sql = "SELECT * FROM clientes WHERE deletado = 0 ORDER BY id DESC";
}

$result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Sistema</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    .bg {
            background-image: url("./imagens/verde.jpg");
            filter: blur(px); 
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
            background-position:bottom; 
        }

    body {
      background-color: white;
      color: white;
      text-align: center;
    }

    .table-bg {
      background-color: black;
      color: black;
      margin-left: auto;
      margin-right: auto;
    }

    .box-search {
      display: flex;
      justify-content: center;
      gap: .1;
    }
    .estilizar{
      direction:row;
    }
    .pesquisar{
      float: left;
      width: 200px;
      height: 35px;
    }
    .lupa{
      height: 35px;
      padding-top: 0;
      margin: 0 10px 0 0;
    }
    .data-search{
      height: 35px;
    }
  </style>
</head>
<body class="bg"></body>
<body>
  <nav class="navbar bg-body-tertiary navbar-">
    <div class="container">
      <a class="navbar-brand" href="http://localhost/cursoPHP/ex000/SecureParking/sistema.php#">
        Secure Parking
      </a>
      <div class="d-flex">
        <a href="lista_veiculos.php" class="btn btn-light me-5">Lista de Veículos</a>
        <a href="sair.php" class="btn btn-danger   me-5">Sair</a>
      </div>
    </div>
  </nav>
  <br><br>
  <?php
  echo "<h1>Bem vindo</h1>";
  ?>
  <br><br>
  <div class="box-search">
    <div class="estilizar">
    <label></label><br>  
    <input type="search" class="form-control pesquisar" placeholder="Pesquisar" id="pesquisar">
    <button onclick="searchData()" class="btn btn-success lupa">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
      </svg>
    </button></div> 
    <div>
      <label>buscar por data:</label><br>
    <input type="date" class="data-search" id="data">
    </div>
  </div><br>  
    <div class="m-0">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">nome</th>
            <th scope="col">cpf</th>
            <th scope="col">email</th>
            <th scope="col">telefone</th>
            <th scope="col">...</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($user_data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td >" . $user_data['id'] . "</td>";

            $deletado = "";
            if ($user_data['deletado'] == 1) {
              $deletado = "<span class='badge bg-danger'>Deletado</span>";
            }


            echo "<td>" . $user_data['nome'] . " " . $deletado . "</td>";
            echo "<td>" . $user_data['cpf'] . "</td>";
            echo "<td>" . $user_data['email'] . "</td>";
            echo "<td>" . $user_data['telefone'] . "</td>";
            //echo "<td>".$user_data['genero']."</td>";
            //echo "<td>".$user_data['data_nasc']."</td>";
            //echo "<td>".$user_data['endereco']."</td>";
            //echo "<td>".$user_data['cep']."</td>";
            // echo "<td>".$user_data['numero_complemento']."</td>";
            //echo "<td>".$user_data['modelo_veiculo']."</td>"; 
            //echo "<td>".$user_data['placa_veiculo']."</td>";
            //echo "<td>".$user_data['ano_veiculo']."</td>";
            echo "<td>
            <a class= 'btn btn-sm btn-primary' href='editar.php?id=$user_data[id]'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
  <svg>
  </a>
  <a>
  <a class= 'btn btn-sm btn-danger' onclick='deleteUser($user_data[id])'>
  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
  <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
</svg>
</a>
            </td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>


</body>
<script>
  function deleteUser(id) {
    if (confirm("Você tem certeza que deseja apagar este usuario?")) {
      window.location = 'delete.php?id=' + id
    }

  }

  var search = document.getElementById('pesquisar');
  var data= document.getElementById('data');

  function searchByData() {
    //console.log(search.value)
    window.location = 'sistema.php?data=' + data.value;
  }

  search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      searchData();
    }
  });
  data.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      searchByData();
    }
  });


  function searchData() {
    //console.log(search.value)
    window.location = 'sistema.php?search=' + search.value;
  }
</script>

</html>