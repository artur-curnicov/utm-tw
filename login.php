<?php
session_start();
 
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["email"]))){
        $username_err = "Please enter email.";
    } else {
        $username = trim($_POST["email"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if (empty($username_err) && empty($password_err)) {

        $sql = "SELECT id, email, first_name, last_name, password FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $first_name, $last_name, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)){
                        if (password_verify($password, $hashed_password)) {
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $username;
                            $_SESSION["first_name"] = $first_name;                            
                            $_SESSION["last_name"] = $last_name;                            

                            header("location: index.php");
                        } else {
                            $password_err = "The password you entered was not valid.";
                            echo $password_err;
                        }
                    }
                } else {
                    $username_err = "No account found with that username.";
                    echo $username_err;
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/reset.css">
    <link rel="stylesheet" href="./style/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@100;300;400;500;700&family=Yellowtail&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>

<body>
    <section class="login-section">
        <div class="login-wrapper">
            <div class="login-data">
                <h2 class="login-title">Log in</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="login-form" class="login-form">
                    <input type="text" name="email" class="login-input" placeholder="Email">
                    <input type="password" name="password" class="login-input" placeholder="Password">
                    <a href="#" id="login-btn" class="btn btn-blue">Log in</a>
                </form>
                <p class="login-text">Don't have an account ? Sign up <a href="signup.php" class="active-link">here</a>.</p>
            </div>
            <div class="login-img bg-image overlay overlay-dark"></div>
        </div>
    </section>

    <script src="./js/app.js"></script>
</body>

</html>