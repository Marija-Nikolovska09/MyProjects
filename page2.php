<?php

require_once __DIR__ . "/autoload.php";
require_once __DIR__ . "/database/connection.php";

$sql = "SELECT offers.*, company.offer_id AS company_offer 
        FROM offers JOIN company ON offers.id = company.offer_id
        WHERE 1=1 ";

if(isset($_POST['company_offer']) && $_POST['company_offer'] != 0) {
    $sql .= "AND offers.id = :offer_id ";
}

try {
    $stmt = $pdo->prepare($sql);
    if(isset($_POST['company_offer']) && $_POST['company_offer'] != 0) {
        $stmt->bindValue('offer_id', $_POST['comapny_offer']);
    }

    $stmt->execute();
} catch(PDOException $e) {
    // redirect(PATH."404.php");
    echo $e;
}


$sqlAllOffers = "SELECT * FROM `offers` WHERE 1";
$stmtAllOffers = $pdo->query($sqlAllOffers);

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

    <body class="back">

    <h2 class="text-center ">You are one step away from your webpage</h2>
    <div class="container ">
        

            <form class="row" action="./actions/create.php" method="POST">
                
           
                <div class="col-4">
                    <div class="mr-1 bg-light px-3 py-3">
                        

                            <label for="cover" class="mt-3">Cover Image URL</label>
                            <input type="url" id="cover" name="cover_image" class="form-control" value="<?= old("cover_image") ?>">
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('cover_image', $_SESSION['errors']) ? $_SESSION['errors']['cover_image'] : '' ; ?></small>
                                    <small class="form-text text-danger"><?= errorMessage('invalid_cover_image') ?></small>
                            <label for="mainTitle" class="mt-3">Main Title of Page</label>
                            <input type="text" id="mainTitle" name="main_title"  class="form-control " value="<?= old("main_title") ?>">
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('main_title', $_SESSION['errors']) ? $_SESSION['errors']['main_title'] : '' ; ?></small>
                            <label for="subtitle" class="mt-3">Subtitle of Page</label>
                            <input type="text" id="subtitle" name="subtitle" class="form-control" value="<?= old("subtitle") ?>" >
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('subtitle', $_SESSION['errors']) ? $_SESSION['errors']['subtitle'] : '' ; ?></small>
                            <label for="aboutYou" class="mt-3">Something about you</label>
                            <textarea id="aboutYou" name="about" rows="2" cols="40" class="form-control" <?= old("about") ?>></textarea>
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('about', $_SESSION['errors']) ? $_SESSION['errors']['about'] : '' ; ?></small>
                            <label for="num" class="mt-3">Your telephone number</label>
                            <input type="text" id="num" name="telephone_number" class="form-control "  value="<?= old("telephone_number") ?>" pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('telephone_number', $_SESSION['errors']) ? $_SESSION['errors']['telephone_number'] : '' ; ?></small><br>
                                    <small class="form-text text-danger"><?= errorMessage('invalid_telephone_number') ?></small>
                            <label for="location" class="mt-3">Location</label>
                            <input type="text" id="location" name="location" class="form-control"  value="<?= old("location") ?>">
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('location', $_SESSION['errors']) ? $_SESSION['errors']['location'] : '' ; ?></small>


                        
                    
                    </div>

                
            
                </div>
                <div class="col-4 ">
                    <div class="mr-1 bg-light px-3 py-3">
                        
                            <label >Provide url for an image and description of your service/product</label>

                            <label for="imgURL">Image URL</label>
                            <input type="url" id="imgURL" name="image_one" class="form-control" value="<?= old("image_one") ?>">
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('image_one', $_SESSION['errors']) ? $_SESSION['errors']['image_one'] : '' ; ?></small>
                                    <small class="form-text text-danger"><?= errorMessage('invalid_image_one') ?></small>
                            <label for="description">Description of service/product</label>
                            <textarea id="description" name="description_one" rows="3" cols="40" class="form-control" <?= old("description_one") ?>></textarea>
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('description_one', $_SESSION['errors']) ? $_SESSION['errors']['description_one'] : '' ; ?></small>
                            <label for="imgURL2">Image URL</label>
                            <input type="url" id="imgURL2" name="image_two" class="form-control" value="<?= old("image_two") ?>">
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('image_two', $_SESSION['errors']) ? $_SESSION['errors']['image_two'] : '' ; ?></small>
                                    <small class="form-text text-danger"><?= errorMessage('invalid_image_two') ?></small>
                            <label for="description2">Description of service/product</label>
                            <textarea id="description2" name="description_two" rows="3" cols="40" class="form-control" <?= old("description_two") ?>></textarea>
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('description_two', $_SESSION['errors']) ? $_SESSION['errors']['description_two'] : '' ; ?></small>
                            <label for="imgURL3">Image URL</label>
                            <input type="url" id="imgURL3" name="image_three" class="form-control" value="<?= old("image_three") ?>">
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('image_three', $_SESSION['errors']) ? $_SESSION['errors']['image_three'] : '' ; ?></small>
                                    <small class="form-text text-danger"><?= errorMessage('invalid_image_three') ?></small>
                            <label for="description3">Description of service/product</label>
                            <textarea id="description3" name="description_three" rows="3" cols="40" class="form-control" <?= old("description_three") ?>></textarea>
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('description_three', $_SESSION['errors']) ? $_SESSION['errors']['description_three'] : '' ; ?></small>

                            
                            
                        
                    </div>
            
                </div>
                <div class="col-4 ">
                    <div class="mr-1 bg-light px-3 py-3">
                        

                            <label for="contactdesc" >Provide a description of your company, <br>something people should be aware of before<br> they contact you:</label><br>
                            <textarea id="contactdesc" name="company_description" rows="2" cols="40" class="form-control" <?= old("company_description") ?>></textarea><br>
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('company_description', $_SESSION['errors']) ? $_SESSION['errors']['company_description'] : '' ; ?></small>
                            <label for="linkedin">Linkedin</label>
                            <input type="url" id="linkedin" name="linkedin" class="form-control" value="<?= old("linkedin") ?>">
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('linkedin', $_SESSION['errors']) ? $_SESSION['errors']['linkedin'] : '' ; ?></small>
                                    <small class="form-text text-danger"><?= errorMessage('invalid_linkedin_url') ?></small>
                            <label for="facebook">Facebook</label>
                            <input type="url" id="facebook" name="facebook" class="form-control" value="<?= old("facebook") ?>">
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('facebook', $_SESSION['errors']) ? $_SESSION['errors']['facebook'] : '' ; ?></small>
                                    <small class="form-text text-danger"><?= errorMessage('invalid_facebook_url') ?></small>
                            <label for="twitter">Twitter</label>
                            <input type="url" id="twitter" name="twitter" class="form-control" value="<?= old("twitter") ?>">
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('twitter', $_SESSION['errors']) ? $_SESSION['errors']['twitter'] : '' ; ?></small>
                                    <small class="form-text text-danger"><?= errorMessage('invalid_twitter_url') ?></small>
                            <label for="insta">Instagram</label>
                            <input type="url" id="insta" name="instagram" class="form-control" value="<?= old("instagram") ?>">
                            <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('instagram', $_SESSION['errors']) ? $_SESSION['errors']['instagram'] : '' ; ?></small>
                                    <small class="form-text text-danger"><?= errorMessage('invalid_instagram_url') ?></small>
                    </div>
                        
                            
                        
                </div>
                
            

            
                <div class="col-4 bla my-1">
                    <div class="mr-1 bg-light px-3 py-3">
                        <?php

                        $sql= "SELECT page_type.id, webpage.pagetype_id FROM webpage JOIN page_type ON page_type.id=webpage.pagetype_id";
                        


                        ?>
                    
                            <label for="choose">Do you provide services or products?</label>
                            <select class="form-select form-control" name="offer_id" id="choose">
                                <option selected disabled>Open this select menu</option>
                                <?php 
                                    while($offer = $stmtAllOffers->fetch()) {
                                        $selected = (isset($_POST['company_offer']) && $offer['company_offer'] == $offer['id']) ? 'selected' : '';
                                        echo "<option value='{$offer['id']}' {$selected}>{$offer['services_products']}</option>";
                                    }
                                ?>
                                
                            </select>

                    
            
                

                    </div>

                </div>

             <button type="submit" class="btn btn-secondary btn-block mb-3 ">Submit</button>


        </form>

        

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

    <?php $_SESSION = []; ?>