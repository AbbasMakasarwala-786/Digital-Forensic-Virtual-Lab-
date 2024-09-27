<?php
$host = 'localhost';
$db   = 'login';
$user = 'root';
$pass = 'Abbas@786';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["user"];
        $password = password_hash($_POST["pass"], PASSWORD_DEFAULT); // hashing password for security

        $stmt = $pdo->prepare("INSERT INTO users (name, password) VALUES (?, ?)");
        $stmt->execute([$name, $password]);
        
        echo "User registered successfully!";
    }

} catch (PDOException $e) {
    echo "not working";
}
?>
