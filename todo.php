<?php
$servername="localhost";
$username = "root";
$password = "";
$database = "notes";

//create a connection
$con = mysqli_connect($servername,$username,$password,$database);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $title = $_POST['text'];
  $desc = $_POST['desc'];


   //connect with data base


$sql = "INSERT INTO `todo` ( `notes title`, `notes dec`) VALUES ( '$title', '$desc')";
$result = mysqli_query($con,$sql);

  if ($result) {
  echo `<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>`;
  }
  else {
  echo "the record was not insert" .  mysqli_error($con);
    }
  }


 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">

    </script>

    <script>
    $(document).ready( function () {
  $('#myTable').DataTable();
} );
    </script>
    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">notes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">contect</a>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled">about us</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

  <div class="container my-4">
    <h2>Add some Notes</h2>
    <form action="/php_tut/project1/" method="post">
      <div class="mb-3">
        <label for="text">Note title</label>
        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" id='text' name='text'>

      </div>
      <div class="mb-3">
        <label for="desc">Note message</label>

        <textarea class="form-control" name="desc" id="desc" rows="5"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Add note</button>
    </form>
  </div>
  <br>
  <br>
    <div class="container">
      <table  class="table table-dark table-striped" id="myTable"
      >
  <thead>
    <tr>
      <th scope="col">SNO</th>
      <th scope="col">TITLE</th>
      <th scope="col">DISCRIPTION</th>
      <th scope="col">ACTTION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `todo`";
      $result = mysqli_query($con,$sql);

      $no =1;

        while($row = mysqli_fetch_assoc($result)){
          echo "<tr>
            <td scope='row'>" . $no ."</td>
            <td >" . $row['notes title'] ."</td>
            <td>" . $row['notes dec'] ."</td>
            <th ><button type='submit' class='btn btn-primary'>Edit</button> <button type='submit' class='delete btn btn-primary' id='delete'>delete</button></th>

          </tr>";
          $no = $no + 1;
      }

    ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
