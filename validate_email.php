<?php
$email = $_POST['email'];

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    
    exit("invalid format");
    
}
$api_key="9277e691ae744caa8a8b02f8de4280c6";

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1?api_key=$api_key&email=$email",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true
]);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

if ($data['deliverability'] === "UNDELIVERABLE") {
    header('Location:Registration.php');
    exit("Undeliverable");
    
}

if ($data["is_disposable_email"]["value"] === true) {
    
    exit("Disposable");
    
}
echo "Email address is valid";
?>
