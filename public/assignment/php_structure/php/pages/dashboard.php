

<div class="container text-center">
<?php
'<div class="row">
<div class="col">'.include ('top_navbar.php');'</div>
<div class="col">'.include ('side_navbar.php');'</div>


</div>';

?>

<div class="col">
<small>hello its Dashboard</small>
<a href="#">back to!</a>
<div>
  Welcome:  {{mm}} 
</div>
</div>


<?php

echo readfile("order.php");
?>

</div>

