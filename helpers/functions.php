<?php


function redirect($route) {
    header("Location: {$route}");
    die();
}


function checkRequest() {
    if($_SERVER['REQUEST_METHOD'] != "POST") {
        redirect(PATH."404.php");
    }
}


function emptyFields($data)
{
    $errors = [];

    foreach ($data as $key => $value) {
        if (isset($value)) {
            if (empty($value)) {
                $errors[$key] = "This field is required!";
            } 
        }
    }
    $_SESSION['errors'] = $errors;
}



function isValidURL(string $url)
{
    $url = filter_var($url, FILTER_SANITIZE_URL);
    return filter_var($url, FILTER_VALIDATE_URL);
}



function isValidTelephoneNumber(string $number)
{
    if (is_numeric($number) && strlen($number) == 9) {
        return true;
    }
    return false;
}


function old($key) {
    return $_SESSION['old'][$key] ?? '';
}


function errorMessage($key) {
    return $_SESSION['errors'][$key] ?? '' ;
}

function printOffer($company) {
    return $company['offer_id'] == 1 ? "Services" : "Products";
}


function encrypt($text) 
{
    return openssl_encrypt($text, "AES-128-ECB", ENC_PASSWORD);
}


function decrypt($text) 
{
    return openssl_decrypt($text, "AES-128-ECB", ENC_PASSWORD);
}