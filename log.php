<?php
    session_start();
    define('DB_SERVER','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','123');
    define('DB_NAME','electronacer');

    
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
    die("Error: " . mysqli_connect_error());
}

// Check if the connection variable is defined and not null
if ($link) {
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"]; 
        $password = $_POST["pass"];

        // Perform the query
        $sql = "SELECT * FROM user WHERE identifiant = '$username' AND pass = '$password'";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $row['identifiant'];

            // Redirect to the home page
            header("Location: home.php");
        } else {
            echo "Please register! ";
        }
    }
}
?>