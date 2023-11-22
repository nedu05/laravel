<?php
include ("connection.php");

// $red="SELECT * FROM employees LIMIT 10" ;


$join  = "SELECT employees.emp_no, employees.first_name,employees.last_name ,
departments.dept_name,dept_manager.from_date,dept_manager.to_date
FROM (((employees INNER JOIN dept_emp ON employees.emp_no = dept_emp.emp_no )
inner JOIN departments ON dept_emp.dept_no = departments.dept_no
AND  departments.dept_name ='\CustomerService\' )
LEFT  JOIN dept_manager ON employees.emp_no = dept_manager.emp_no)
ORDER BY dept_manager.from_date  AND dept_manager.to_date DESC limit 15";
$result = mysqli_query($conn,$join);
?>


<table>
<?php
if($result){
    while( $row=mysqli_fetch_assoc($result)){

        echo "<pre>";
        print_r($row);

        // $id=$row['emp_no'];
        // $f_name=$row['first_name'];
        // $l_name=$row['last_name'];
        // $gender =$row['gender'];
        

        // echo '<tr>
        // <th >'.$id.'</th>
        // <td>'.$f_name.'</td>
        // <td>'.$l_name.'</td>
        // <td>'.$gender.'</td>
        // </tr>';

    }
 
 }
?>
</table>
