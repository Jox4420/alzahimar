<?php
include '/xampp/htdocs/alz2/config.php';
include '/xampp/htdocs/alz2/functions.php';
include '/xampp/htdocs/alz2/head.php';
include  '/xampp/htdocs/alz2/script.php';

if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $select = "SELECT * FROM `patient` where id =  $id ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}


// auth();
?>

<body style="background-image: url(../css/img/img-bg.png);">

<div >

<div>
<img src="/pathiont/ $row['image'] ?>"  alt="">
    <div >
        Name : <?= $row['name'] ?>
        <hr>
        age : <?= $row['age'] ?>
        <hr>
        <!-- department : <?= $row['depName'] ?> -->
        <hr>
        <a class="btn btn-info" href="/alz/pathiont/edit.php $row['id'] ?> "></a>
        <a onclick="return confirm('are You Sure ?')" class="btn btn-danger" href="/alz/pathiont/edit.php
        ?= $row['id'] ?> "></a>
    </div>
</div>
</div>
</body>



