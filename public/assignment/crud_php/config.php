<?php
//  $conn=mysqli_connect("localhost",'root','','students');
 $conn=new mysqli("localhost",'root','','students');

 if($conn){
    // echo "connected";

//     $dd="SELECT *FROM studentsinfo";

//     $rew=mysqli_query($conn,$dd);
  

//     $row=mysqli_fetch_all($rew);

// print_r($row) ;

 }else{
echo "not connected";
 }

?>