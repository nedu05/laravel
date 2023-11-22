
<?php 
// $emailTo="red#red.com";
// $subject="testing mail";
// $body="the mail is newly created";
// $header="from:hdst#rdr.vcim.io ";

// if(mail($emailTo ,$subject ,$body ,$header)){
//     echo 'the mail send successfully';

// }else{
//     echo "mail could not send";
// }


// if($_POST){



$abc=array("red","green","blue");
// $alpha=false;

foreach($abc as $key => $value){
    echo $value;
    
}

// foreach($abc as $nn){
//     if($nn == $_POST['name']){
//        $alpha=true;
//     }
// }

// if($alpha){
//     echo "hello ".$_POST['email'];
// }else{
//         echo "i don't know who u r?";
//     }
// }

print_r($_POST);
$error ='';  $success='';
if($_POST){
    if(!$_POST['email']){
    $error .="email address is required";
   
}
if(!$_POST['subject']){
    $error .="subject is required";

}
if(!$_POST['content']){
    $error .="content is required";

}

if ($_POST['email'] && filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL) === false) {


    $error .="the email is invalid";
}

if( $error !=''){

    $error ='<div class="alert alert-warning" role="alert"><h5 class="text-center">' .$error.' </div>';
}
else{
    $emailTo="abc@sss.hhh";
$subject=$_POST['subject'];
$content=$_POST['content'];
$header="from:".$_POST['email'];

if(mail($emailTo ,$subject ,$content ,$header)){
    $success ='<div class="alert alert-success" role="alert"><h5 class="text-center">Message sent successfully </div>';
}else{
    $error ="mail could not send";
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
    <script src="./assets/javascript/code.jquery.com_jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

</head>
<body>
  <div class="container tet-center" >
  <form method="post">    
        <div id="error"> <?php echo $error.$success; ?> </div>
        
        <!-- <input type="text" placeholder="enter your name" name="name"><br><br> -->
        <!-- <input type="number" placeholder="enter your age" name="number"><br><br> -->
        <input type="email" placeholder="enter your email" name="email" id='email'><br><br>
        <input type="text" name="subject" id="subject"><br><br>
        <input type="text" name="content" id="content"><br><br>
       <input type="submit" id="submit">
    </form>
  </div>
    
<script src="./assets/javascript/script.js"></script>
<script src=""></script>

</body>
</html>






<?php 
include("include.php");
echo file_get_contents("https://www.ecowebhosting.co.uk");
?>