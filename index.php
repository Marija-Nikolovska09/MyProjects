<?php
require_once __DIR__ . "/autoload.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Web</title>
        <meta charset="utf-8" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />

        <link rel="stylesheet" href="<?php PATH ?>assets/style.css">
       <!-- Latest compiled and minified Bootstrap 4.4.1 CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Latest Font-Awesome CDN -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>

    <body>

     <div class="container-fluid">
            <div class="row back align-items-center">
                <div class="col text-center shadow-lg p-3 mb-5 rounded">
                    <h1 >Create your very own web page</h1>
                    <h3 >All you need to do is fill up a form!</h3>
                    
                    <a  href="<?php PATH ?>page2.php" class="btn btn-outline-light py-3 px-5 font-weight-bold">Start</a>
                    
                </div>
            </div>
     </div>
    

    
  







         <!-- jQuery library -->
         <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.4.1 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        

        <script>
            $(function() {
                $("[data-toggle='tooltip']").tooltip();
                $("[data-toggle='popover']").popover();
            });
        </script>
    
    </body>

</html>