<?php
    session_start();
    require "../database.php";

    $sqlfechStatus = "SELECT * FROM `status` LEFT JOIN user ON status.user_id = user.id ORDER BY status.created_at DESC;";
    $sqlresultStatus = $mysqli->query($sqlfechStatus);

    // var_dump($sqlresultStatus->fetch_assoc());
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/pricing/">

    

    <!-- Bootstrap core CSS -->
    <link href="../css/chatasset/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/chatasset/css/pricing.css" rel="stylesheet">
  </head>



  <body>

  <header class="container py-3">
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-4">Alumni TE</span>
      </a>

      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="../index.php">Kerta</a>
        
      </nav>
    </div>

    
  </header>


    <!-- Collom chat -->
    <div class="container py-3"> 
      <main class="container">
      <div class="mb-3 me-3 ms-3">

        <form class="" action="proses/proseschat.php" method="POST">
            <label  for="mindarea" class="form-label">What's your mind?</label>
            <textarea name="content" placeholder="New status...." class="form-control mb-2 container py-3" id="mindarea" rows="3"></textarea>
            <button type="submit" class="float-end btn btn-primary">Posting</button>
          
        </form>
      </div>
        
        
        <div class="mt-3 me-3 ms-5">
          <div class="row mt-5">
            <div class="col-lg-19">
              
            
            <?php
              if ($sqlresultStatus->num_rows > 0) {
                // ada data
                // Perulangan
                while($row = $sqlresultStatus->fetch_assoc()) {
                 echo " <h5>$row[username]</h5>
                <p class='mb-0'>$row[content]</p>
                <a href='#'>Like</a> <a href='comment.php'>Comment</a> <a>chat</a>
               <hr>";
                }
              } else {
                // Tidak ada data
                echo "<center>Tidak ada status sayang</center>";
              }
            ?>
              
            </div>

          </div>
        </div>
          


      </main>
    </div>


 


    
  </body>
</html>
