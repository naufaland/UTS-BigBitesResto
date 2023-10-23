<?php
require 'config.php';
$characters_on_image = 6;
$possible_letters = '23456789bcdfghjkmnpqrstvwxyz';
$code = '';
$i = 0;
while ($i < $characters_on_image) { 
    $code .= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1),     1);
    $i++;
    }
    $_SESSION['6_letters_code'] = $code;

if (isset($_GET['refresh'])) {
    while ($i < $characters_on_image) { 
        $code .= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1),     1);
        $i++;
        }
        $_SESSION['6_letters_code'] = $code;
  }

if (isset($_POST['submit'])) {
    $usernameEmail = $_POST['usernameEmail'];
    $password = $_POST['password'];


    if (empty($_POST['generate_6_letters_code']) ||
    strcasecmp($_POST['generate_6_letters_code'], $_POST['6_letters_code']) != 0) {
        echo "<script> alert('Please complete the CAPTCHA.'); </script>";
    } else {
        $query = "SELECT id, username, email, password FROM master_user WHERE username = ? OR email = ?";
        $stmt = mysqli_prepare($con, $query);

        if (!$stmt) {
            die('Error in preparing the query: ' . mysqli_error($con));
        }

        mysqli_stmt_bind_param($stmt, "ss", $usernameEmail, $usernameEmail);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['id'] = $row['id'];
                    header("Location: index.php");
                    exit;
                } else {
                    echo "<script> alert('Wrong Password'); </script>";
                }
            } else {
                echo "<script> alert('User Not Registered'); </script>";
            }

            mysqli_stmt_close($stmt);
        } else {
            die('Error in executing the query: ' . mysqli_error($con));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
    <nav class="navbar bg-body-tertiary">
  <div style="display: flex;flex-direction: row;justify-content: space-between;width: 100%; align-items:center;">
    <a href="index.php"><div style="display:flex;align-items: center; margin-left: 40px;"><img src="../image/logo3.png" alt="ImageDescription" class="logo" style="height: 60px; width: 180px;"></div></a>

  </div>
</nav>
    <section class="vh-100 d-flex justify-content-center align-items-center" style="background-color: #FFEFBA;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3" style="background: #FFFFF0;">
                        <div class="row">
                            <div class="col-sm-12 text-black">
                                <div class="px-5 ms-xl-4">
                                    <i class="bx bx-restaurant fa-2x me-3 pt-5 mt-xl-4"></i>
                                    <span class="h2 fw-bold mb-0">BIG BITES: RESTO</span>
                                </div>
                            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-3 pt-5 pt-xl-0 mt-xl-n5">
                                <form action="login.php" method="post" style="width: 23rem;">
                                    <h3 style="letter-spacing: 1px;">LOG IN</h3>
                                    <div class="mb-4">
                                        <input type="text" id="usernameEmail" name="usernameEmail" class="form-control form-control-lg" placeholder="Username/Email" required />
                                    </div>
                                    <div class="mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" required/>
                                    </div>
                                    <div style="display:flex;align-items: center;">
                                        <div style="padding: 5px; border: 1px solid black;width:120px;display:flex; justify-content: center; align-items:center;font-size: 20px;margin-right: 10px;"><b><?php echo $code; ?></b></div>
                                        <a href="login.php?refresh=true"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                        </svg></a>
                                        <input type="text" id="generate_6_letters_code" name="generate_6_letters_code" class="form-control form-control-lg" style="display:none" value="<?php echo $_SESSION['6_letters_code']; ?>"/>
                                    </div>
                                    <label for="message">Enter the code above here :</label>
                                    <input id="6_letters_code" name="6_letters_code" type="text">
                                    <br/>
                                    <div class="pt-1 mb-2">
                                        <button class="btn btn-success btn-lg mb-1" type="submit" name="submit">Login</button>
                                    </div>
                                    <p>Don't have an account? Please <a href="register.php" class="link-info">Sign Up here</a></p>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>