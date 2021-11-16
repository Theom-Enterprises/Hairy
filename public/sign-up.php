<!doctype html>
<html lang="en">
<head>
    <title>Sign Up | Hairy</title>
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
    <form action="sign-up.php" method="POST">
        <img class="mb-4" src="logo.svg" alt="Hairy Logo" width="70" height="70">
        <h1 class="h3 mb-3 fw-normal">Create Account</h1>

        <?php
        error_reporting(0);
        @session_start();

        $error_icon = "<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> ";
        $success_icon = "<i class=\"fa fa-check\" aria-hidden=\"true\"></i> ";

        if (isset($_POST['register'])) {

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "registration_form";

            try {

                $email = strtolower($_POST['email']);

                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT email, password, creation FROM registration_form.user WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $row_set = $stmt->fetch(0);

                if (isset($_POST['register'])) {

                    if ($row_set['email'] == $_POST['email']) {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error_icon . "There is already an account with this E-Mail!" . "</div>";
                    } else {
                        $date = date("Y-m-d H:i:s");
                        $enc_date = md5($date);
                        $pw = md5($enc_date . $_POST['password']);

                        $stmt = $conn->prepare("INSERT INTO registration_form.user (firstname, lastname, email, password, creation)
  VALUES (:firstname, :lastname, :email, :password, :date)");
                        $stmt->bindParam(':firstname', $_POST['firstname']);
                        $stmt->bindParam(':lastname', $_POST['lastname']);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':password', $pw);
                        $stmt->bindParam(':date', $date);
                        $stmt->execute();

                        echo "<div class=\"alert alert-success\" role=\"alert\">" . $success_icon . "Account created!" . "</div>";
                        // header('Location: index.php');
                    }
                }
            } catch (Exception $e) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error_icon . "Something went wrong. Please try again later or contact us via <a href=\"mailto:support@e-mail.com?subject=Login Form - Something went wrong!\">support@e-mail.com</a>" . "</div>";
            }
            $conn = null;

        }
        ?>

        <div class="container">
            <div class="row">
                <div class="form-floating col no-left-right-padding">
                    <input class="form-control no-bottom-border" style="border-top-right-radius: 0;"
                           id="firstName" name="firstname" placeholder="First name" required>
                    <label for="firstName">First name</label>
                </div>
                <div class="form-floating col no-left-right-padding">
                    <input class="form-control no-bottom-border" style="border-top-left-radius: 0; border-left: none;"
                           id="lastName" name="lastname" placeholder="Last name" required>
                    <label for="lastName">Last name</label>
                </div>
            </div>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control no-border" id="email" name="email"
                   placeholder="E-Mail address" required>
            <label for="email">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                   required>
            <label for="password">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" id="agb" name="agb" value="agb" required> I accept the terms & conditions.
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-hairy" type="submit" name="register">Sign up</button>
        <a class="a-hairy" href="sign-in.php">I'm already a member.</a>
        <p class="mt-5 mb-3 text-muted">&copy; Hairy 2021–2022</p>
    </form>
</main>
</body>
</html>
