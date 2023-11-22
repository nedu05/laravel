<?php

// function insert($name,$pwd){

//     $name=$_POST['usname'];
//     $pwd=$_POST['pwd'];

//     echo $name;
//     echo $pwd;
// }



$file_Error=array(
            UPLOAD_ERR_OK => 'There is no error, the file uploaded with success.',
            UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
            UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
            UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded.',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder.',
            UPLOAD_ERR_CANT_WRITE => 'Cannot write to target directory. Please fix CHMOD.',
            UPLOAD_ERR_EXTENSION =>'A PHP extension stopped the file upload.',
        );

        $temp_path=$data['temp_name'];
        $file_name=$file['name'];
        $directory=['images'];





// print_r($arr);

$arr= array();
if(isset($_POST['submit'])){
    global $arr;

    $name=$_POST['usname'];
    $pwd=$_POST['pwd'];

$arr2=array($name,$pwd);
array_push($arr,$arr2);


print_r($arr);


}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="" method="post">

<input type="text" name="usname" placeholder="Username"><br><br>
<input type="text" name="pwd" placeholder="password"><br><br>
<input type="submit" name="submit" value="save">
</form>

</body>
</html>