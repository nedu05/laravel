
<?php
include("head.php");
include("data.php");
$sql = "SELECT * FROM students_info";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("connection:" . $conn->error);
} else {


?>
    <!-- <table class="table text-center">

        <tr>
            <th>student_id</th>
            <th>student_name</th>
            <th>perform</th>
        </tr> -->
    <?php
    // while ($row = mysqli_fetch_assoc($result)) {
    //     $id = $row['student_id'];
    //     $name = $row['student_name'];
    //     echo '<tr>
    //     <td>' . $id . '</td>
    //     <td>' . $name . '</td>
    //     <td><button  class="btn btn-danger w-25">add</button></td>
    //     </tr>';
    // }
}

    ?>
    </table>

<?php
$ff="SHOW INDEX FROM students_info";

$rs=mysqli_query($conn,$ff);

if($rs){
    $r = mysqli_fetch_assoc($rs);
echo' <pre>';
 print_r( $r);
}

?>
