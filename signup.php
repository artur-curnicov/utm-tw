<?php
require_once "config.php";

$username = $password = $first_name = $last_name = "";
$username_err = $password_err = $fist_name_err = $last_name_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["email"]))) {
        $username_err = "Please enter the email";
    } else {
        $sql = "SELECT id FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["email"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) >= 1) {
                    $username_err = "This email is already taken.";
                } else {
                    $username = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    if (empty(trim($_POST["first_name"]))) {
        $fist_name_err = "Please enter the first name.";
    } elseif (strlen(trim($_POST["first_name"])) < 6) {
        $fist_name_err = "First name must have atleast 6 characters.";
    } else {
        $first_name = trim($_POST["first_name"]);
    }

    if (empty(trim($_POST["last_name"]))) {
        $last_name_err = "Please enter the last name.";
    } elseif (strlen(trim($_POST["last_name"])) < 6) {
        $last_name_err = "Last name must have atleast 6 characters.";
    } else {
        $last_name = trim($_POST["last_name"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($username_err) && empty($password_err)) {
        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $param_first_name, $param_last_name, $param_username, $param_password);

            $param_username = $username;
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if (mysqli_stmt_execute($stmt)) {
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@100;300;400;500;700&family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>

<body>
    <section class="login-section">
        <div class="login-wrapper">
            <div class="login-data">
                <h2 class="login-title">Sign up</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="signup-form" class="login-form">
                    <input type="text" name="first_name" class="login-input" placeholder="First name">
                    <input type="text" name="last_name" class="login-input" placeholder="Last name">
                    <input type="text" name="email" class="login-input" placeholder="Email">
                    <input type="password" name="password" class="login-input" placeholder="Password">
                    <a id="signup-btn" href="#" class="btn btn-blue">Sign up</a>
                </form>
                <p class="login-text">Already have an account ? Log in <a href="login.php" class="active-link">here</a>.</p>
            </div>
            <div class="login-img bg-image overlay overlay-dark"></div>
        </div>
    </section>

    <script src="./js/app.js"></script>
</body>

</html>