<!doctype html>
<html lang="en">
<head>
    <title>Sign In | Hairy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href=
    "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
    <link href="css/sign-in-up.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico">
</head>
<body class="text-center">
<main class="form-signin">
    <form action="sign-in.php" method="POST">
        <img class="mb-4" src="logo.svg" alt="Hairy Logo" width="70" height="70">
        <h1 class="h3 mb-3 fw-normal">Welcome Back</h1>

        <?php
        error_reporting(0);
        @session_start();

        $error_icon = "<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> ";
        $success_icon = "<i class=\"fa fa-check\" aria-hidden=\"true\"></i> ";

        if (isset($_POST['login'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "registration_form";

            try {
                $email = strtolower($_POST['email']);

                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT Email, Password, Creation FROM registration_form.user WHERE Email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $row_set = $stmt->fetch(0);

                if (isset($_POST['login'])) {
                    $date = md5($row_set['Creation']);
                    $pw = md5($date . $_POST['password']);

                    if (strtolower($row_set['Email']) == strtolower($_POST['email'])) {
                        if ($row_set['Password'] == $pw) {
                            echo "<div class=\"alert alert-success\" role=\"alert\">" . $success_icon . "Login data correct!" . "</div>";
                            // header('Location: index.php');
                        } else {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error_icon . "Your password is incorrect!" . "</div>";
                        }
                    } else {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error_icon . "There is no account connected to this E-Mail!" . "</div>";
                    }
                }
            } catch (Exception $e) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error_icon . "Something went wrong. Please try again later or contact us via <a href=\"mailto:support@e-mail.com?subject=Login Form - Something went wrong!\">support@e-mail.com</a>" . "</div>";
            }
            $conn = null;
        }
        ?>

        <div class="form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail address" required>
            <label for="email">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>

        <!-- TODO Add "remember me"-functionality
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        -->
        <button class="w-100 btn btn-lg btn-hairy" type="submit" name="login">Sign in</button>
        <a class="a-hairy" href="sign-up.php">I'm not a member.</a>
        <p class="mt-5 mb-3 text-muted">&copy; Hairy 2021–2022</p>
    </form>
</main>
</body>
</html>
