<?php
include 'header.php';
 include 'connect.php';
 

 $product = mysqli_query($conn,"SELECT * FROM product  ");
 $total = $product->num_rows;
 $limit = 8;
 $pagee = ceil($total/$limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link href="./sourcecss.css" rel="stylesheet">
    <link rel="stylesheet" href="./danhsachsanphamuser.css">
    <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>    
    <title>Document</title>
</head>
<body>


<div id="content" class="row"></div>
<header>
    
        
       <ul class="pagination phantrang ">
          
 <?php for( $i = 1 ; $i<= $pagee; $i++){ ?>
  <div class="" ><span class="page-link" > <?php echo $i ?></span></div>
  <?php } ?>
  
  
</ul>
  
</div>
</header>
</body>
</html>
<script>
  $("header").on("click","span",function(){
    var hrf = $(this).attr("href")
    var lin = hrf.substring(1, hrf.length);
  })
  phantrang(1)
  $(".phantrang").on("click","span",function(){
  var page = $(this).text()      
                 
   phantrang(page);
  })
  function phantrang(page){
    $.get("danhsachsanphamuser_ajax.php",{
        page : page
     },
     function(data){
        $("#content").html(data);
     })
  }
  
  
</script>



</ul>
