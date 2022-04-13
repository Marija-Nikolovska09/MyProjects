<?php 

require_once __DIR__ . "/autoload.php";
require_once __DIR__ . "/database/connection.php";

$id = $_GET['id'];
$id = urlencode($id);
$id = urldecode($id);
$id = decrypt($id);


$sql = "SELECT company.*,
cards.image_one, cards.description_one, cards.image_two, cards.description_two, cards.image_three, cards.description_three,
links.linkedin, links.facebook, links.twitter, links.instagram FROM company
JOIN cards ON cards.company_id = company.id 
JOIN links ON links.company_id = company.id WHERE company.id = :company_id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue('company_id', $id);
$stmt->execute();

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

        <link rel="stylesheet" href="./assets/style.css">

       <!-- Latest compiled and minified Bootstrap 4.4.1 CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Latest Font-Awesome CDN -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>

    <body>

    <?php while($company = $stmt->fetch()) { ?>

    <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Webster</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutUs">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services"><?= printOffer($company) ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                
            </div>
        </nav>

        <!-- Header -->

        <div class="container-fluid">
            <div class="row bg ">
                
                <div class="col  align-items-start">
                    <h2 class="text-black text-center "><?= $company['main_title'] ?></h2>
                    <div class="row ">
                        <div class="col margina">
                            <p class="text-black text-center font-weight-bold"><?= $company['subtitle'] ?></p>
                        </div>
                    </div>
                </div>
               
                

               

            </div>

            <!-- About us -->


            <div class="row" id="aboutUs">
                <div class="col-6 offset-3 text-center py-3">
                    <h2>About Us</h2>
                    <p><?= $company['about'] ?></p>
                    <hr>
                    <p>Tel: <?= $company['telephone_number'] ?></p>
                    <p>Location: <?= $company['location'] ?></p>
                </div>
            </div>

            <!-- Cards -->

            <h3 class="ml-5"><?= printOffer($company) ?></h3>
            <div class="row mx-5" id="services">

            
        
                    <div class="col-12 col-md-4 my-3 ">
                      <div class="card bg-secondary">
                          <img class="card-img-top " src="<?= $company["image_one"] ?>"  alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title mb-0"><?= printOffer($company) ?> Description</h5>
                            
                            <p class="card-text"><?= $company['description_one']?></p>
                            
                          </div>
                      </div>
                    </div>
  
                    <div class="col-12 col-md-4 my-3">
                      <div class="card bg-secondary" >
                          <img class="card-img-top " src="<?= $company["image_two"] ?>"  alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title mb-0"><?= printOffer($company) ?> Description</h5>
                            <p class="card-text pb-2"><?= $company['description_two']?> </p>
                            <p>Last updated 3 mins ago</p>
                            
                          </div>
                      </div>
                  </div>
  
                  <div class="col-12 col-md-4 my-3">
                      <div class="card bg-secondary" >
                          <img class="card-img-top " src="<?= $company["image_three"] ?>" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title mb-0"><?= printOffer($company) ?> Description</h5>
            
                            <p class="card-text pb-2"><?= $company['description_three']?></p>

                            <p>Last updated 3 mins ago</p>
                            
                          </div>
                      </div> 
                  </div>
                 
            </div>

            <hr>

            <!-- Contact -->


            <div class="row mx-5" id="contact">
                
                    

                <div class="col-12 col-md-5 text-dark my-3  mr-5 ">
                        <h4>Contact</h4>
                        <p><?= $company["company_description"] ?></p>
                </div>
                        

                <div class="col-12 col-md-5 text-dark my-3 ">
                        
                        <form>
                        <label for="name" class="mt-3">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                        <label for="email" class="mt-3">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                        <label for="message" class="mt-3">Something about you</label>
                        <textarea id="message" name="message" rows="5" cols="40" class="form-control"></textarea>


                            <button type="submit" class="btn btn-primary btn-block my-3 ">Submit</button>
                            

                            
                        </form>
                </div>

                       
                 
                
            </div>

            <footer>
                <div class="row bg-dark">
                    <div class="col text-center text-white">
                        <p>Copyright by Stefan @Brainster</p>
                        <a href="<?= $company["linkedin"] ?>">LinkedIn</a>
                        <a href="<?= $company["facebook"] ?>">Facebook</a>
                        <a href="<?= $company["twitter"] ?>">Twitter</a>
                        <a href="<?= $company["instagram"] ?>">Instagram</a>
                    </div>
                </div>
            </footer>
                
            

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

<?php } ?>
    </body>

</html>