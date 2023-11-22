<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary " data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand text-warning" ><h4>ADMIN PANEL</h4></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link fs-5 mx-5" aria-current="page" href="./addword.php">Add word</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 mx-5" href="./syn_ant.php">Add synonyms/antonyms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 mx-5" href="./wordtable.php">Words Table</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 mx-5" href="./comment.php">Comments Table</a>
        </li>
      </ul>
      <span class="navbar-text">
        <a href="./logout.php" class="btn btn-danger text-light">logout</a>
      </span>
    </div>
  </div>
</nav>



</body>
</html>