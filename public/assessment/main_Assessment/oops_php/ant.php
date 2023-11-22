<?php
ob_start();
session_start();
include("config.php");
$msg = $err = '';

$word= $_SESSION['words'];
$empy_arr = [];

if(isset($_SESSION['name'])){
    $name = $_SESSION['name'];

}else{
    header("location:./index.php");
    ob_end_flush();
}

if (isset($_POST['submit'])) {
    $word_id = $_GET['word_id'];
    $ant = $_POST['ant'];
    array_push($empy_arr, $ant);

    $storing = json_encode($empy_arr);

    $sql2 = "SELECT * FROM `dict_words_data`  WHERE  word_id=$word_id";

    $result1 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($result1);
    $val = $row['antonyms'];

    if ($val == NULL) {
        $sql = " UPDATE  `dict_words_data` SET antonyms='$storing' WHERE word_id=$word_id";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            $msg .= "word add successfully";
        } else {
            $err .= "word not added";
        }
    } else {

        $ff = json_decode($val, true);
        foreach ($empy_arr as $ass) {
            array_push($ff, $ass);
        }
        $enc = json_encode($ff);

        $sql = " UPDATE  `dict_words_data` SET antonyms='$enc' WHERE word_id=$word_id";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            $msg .= "word add successfully";
        } else {
            $err .= "word not added";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        body {
            background-image: url("./images/view.png");
            height: 100vh; 
            width: auto;
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="container mt-5 text-center">
        <form action="" method="post" enctype="multipart/form-data">

            <div>
                <h5 class="text-warning">Add antonyms Here</h5>
            </div>
            <div> <input type="text" name="ant" class="w-25 p-2" required></div>
            <input type="submit" value="Add" name="submit" class="btn btn-secondary mt-2 px-3">
        </form><br><br>
        <span class="text-danger fs-4 mt-5"> <?php echo $err; ?> </span>
        <span class="text-success fs-4 mt-5"> <?php echo $msg; ?> </span>
        <div>
            <a href="./<?php echo  $word; ?>"  class="btn btn-danger">back</a>
        </div>
    </div>
</body>

</html>