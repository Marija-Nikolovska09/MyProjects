<?php



// session_start();
require_once __DIR__ .'/../autoload.php';
require_once __DIR__ . "/../database/connection.php";

checkRequest();

$data = $_POST;

emptyFields($data);

if (!isValidURL($data["cover_image"])) {
    $_SESSION['errors']['invalid_cover_image'] = "Invalid cover image URL";
}

if (!isvalidTelephoneNumber($data["telephone_number"])) {
    $_SESSION['errors']['invalid_telephone_number'] = "Invalid telephone number format!";
}

if (!isValidURL($data["image_one"])) {
    $_SESSION['errors']['invalid_image_one'] = "Invalid image URL";
}

if (!isValidURL($data["image_two"])) {
    $_SESSION['errors']['invalid_image_two'] = "Invalid image URL";
}

if (!isValidURL($data["image_three"])) {
    $_SESSION['errors']['invalid_image_three'] = "Invalid image URL";
}

if (!isValidURL($data["linkedin"])) {
    $_SESSION['errors']['invalid_linkedin_url'] = "Invalid URL";
}

if (!isValidURL($data["facebook"])) {
    $_SESSION['errors']['invalid_facebook_url'] = "Invalid URL";
}

if (!isValidURL($data["twitter"])) {
    $_SESSION['errors']['invalid_twitter_url'] = "Invalid URL";
}

if (!isValidURL($data["instagram"])) {
    $_SESSION['errors']['invalid_instagram_url'] = "Invalid URL";
}

if (!isset($_POST['offer_id'])) {
    $_SESSION['errors']["offer_id"] = "This field is required! Please select type.";
}

if (count($_SESSION['errors']) > 0) {
    $_SESSION['old'] = $data;
    redirect(PATH."page2.php");
}

$data = $_POST;

$sql = "INSERT INTO `company` (cover_image, main_title, subtitle, about, telephone_number, location, offer_id, company_description)
VALUES (:cover_image, :main_title, :subtitle, :about, :telephone_number, :location, :offer_id, :company_description)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue('cover_image', $_POST['cover_image']);
$stmt->bindValue('main_title', $_POST['main_title']);
$stmt->bindValue('subtitle', $_POST['subtitle']);
$stmt->bindValue('about', $_POST['about']);
$stmt->bindValue('telephone_number', $_POST['telephone_number']);
$stmt->bindValue('location', $_POST['location']);
$stmt->bindValue('offer_id', $_POST['offer_id']);
$stmt->bindValue('company_description', $_POST['company_description']);

try {
    if($stmt->execute()) {
        $lastInsertedID = $pdo->lastInsertId();
        $sql = "INSERT INTO `cards` (company_id, image_one, description_one, image_two, description_two, image_three, description_three) 
        VALUES (:company_id, :image_one, :description_one, :image_two, :description_two, :image_three, :description_three)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('company_id', $lastInsertedID);
        $stmt->bindValue('image_one', $_POST['image_one']);
        $stmt->bindValue('description_one', $_POST['description_one']);
        $stmt->bindValue('image_two', $_POST['image_two']);
        $stmt->bindValue('description_two', $_POST['description_two']);
        $stmt->bindValue('image_three', $_POST['image_three']);
        $stmt->bindValue('description_three', $_POST['description_three']);

        if($stmt->execute()) {
            $sql = "INSERT INTO `links` (company_id, linkedin, facebook, twitter, instagram) 
            VALUE (:company_id, :linkedin, :facebook, :twitter, :instagram)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue('company_id', $lastInsertedID);
            $stmt->bindValue('linkedin', $_POST['linkedin']);
            $stmt->bindValue('facebook', $_POST['facebook']);
            $stmt->bindValue('twitter', $_POST['twitter']);
            $stmt->bindValue('instagram', $_POST['instagram']);
            if($stmt->execute()) {
                $id = encrypt($lastInsertedID);
                $id = urlencode($id);
                redirect(PATH."page3.php?id={$id}");
            }
        }
    }
} catch (PDOException $e) {
    // redirect(PATH."404.php");
    echo $e;
}

?>