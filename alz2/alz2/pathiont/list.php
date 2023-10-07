<?php
include '/xampp/htdocs/alz2/config.php';
include '/xampp/htdocs/alz2/functions.php';
include'/xampp/htdocs/alz2/script.php';
include'/xampp/htdocs/alz2/head.php';



$select = "SELECT * FROM `patient` ";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $selectImage = "SELECT `image` FROM `patient` WHERE id = $id ";
    $RunSelect = mysqli_query($conn, $selectImage);
    $row = mysqli_fetch_assoc($RunSelect);
    $image = $row['image'];
    echo $image;
    unlink("./upload/$image");
    $delete = " where id = $id";
    mysqli_query($conn, $delete);
    path("pathiont/list.php");
}


// auth();

?>
<body style="background-image: url(../css/img/img-bg.png);">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/hom.css">
<!-- <link rel="stylesheet" href="../css/about.css"> -->

<section class=""> 
          <header class="main" >
            <nav class="navbar navbar-expand-lg navbar-light bg">
                <a class="" href="home.php"><i class="fa-solid fa-brain" style="color: white; padding-left: 18px;"></i></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr">
                    <li class="nav-item active">
                      <a class="nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../about.php">About <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../contact.php">Contact <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="../pathiont/list.php">History<span class="sr-only">(current)</span></a>
                  </li>
    
                  </ul>
                 
                </div>                    
                      <a href="loginn.PHP" class="btn btn-light" style=" border-radius: 15px;">Sign out</a>
                      <a class="" href="profile.html"  style="padding-left: 10px;"> <i class="fa-regular fa-user" style="color: rgb(140 128 128); display :inline; " ></i></a>
              </nav>
</header>
<h1 class="text-center text-info  mt-2 pt-2"> list pathions </h1>
<div class="container col-md-8">
<form action="./search.php" method="get">
        <div >
            <div class="col-mt-20" style="padding-left: 20px;">
                <div class="form-group">
                    <input type="text" id="myInput" name="nameValue" style="border-radius: 20px;" placeholder="Search">
                </div>
            </div>
            <div class="col-md-2" style="padding-left: 20px;">
                <div class="d-grid">
                    <button name="search" class="btn btn-info"> Search </button>
                </div>
            </div>
        </div>
    </form>
        <div class="card-body" >
            <table id="myTable" class="table table-dark">
                <tr>
                    <th> ID </th>
                    <th>Name</th>

                    <th colspan="2">Action</th>
                </tr>
                <?php
                foreach ($s as $data) :  ?>
                    <tr>
                        <td> <?= $data['id'] ?> </td>
                        <td> <?= $data['name'] ?> </td>
                        <td>
                            <li><a style="color:aliceblue"   href="/alz2/pathiont/profile.php?show=<?= $data['id'] ?> "><i class="fa-solid fa-eye"></i></a></li>
                                <!-- <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button> -->
                                <!-- <ul class="dropdown-menu" style="min-width: 10px !important;">
                                    <li><a class="dropdown-item"  href="/alz2/pathiont/edit.php?= $data['id'] ?> "><i class="text-info fa-solid fa-pen-to-square"></i></a></li>
                                    <li><a class="dropdown-item"  class="text-danger"  href="/alz2/pathiont/list.php<?= $data['id'] ?> "><i class="text-danger  fa-solid fa-trash"></i></a></li>
                                    <li><a class="dropdown-item"  class="text-danger"  href="/alz2/pathiont/profile.php?show=<?= $data['id'] ?> "><i class="fa-solid fa-eye"></i></a></li>

                                </ul>
                            </div> -->
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </table>
        </div>
    </div>
</div>
</body>
