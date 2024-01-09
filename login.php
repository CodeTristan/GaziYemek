<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">

                    <img src="images/Gazi_Üniversitesi_logo.png">

                </div>
                <div class="col-md-6 signin">
                    <div class="input-box">
                        <form action="loginForm.php" method="post">
                            <header>Sign in</header>
                            <div class="input-field">
                                <input type="text" class="input" id="email" name="email" required="">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id="pass" name="password" required="">
                                <label for="pass">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Sign In">
                            </div>
                            <div class="signin">
                                <span>Already have an account? <a href="#">Log in here</a></span>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-md-6 signup">

                    <div class="input-box">
                        <form action="signupForm.php" method="post">

                            <header>Sign up</header>
                            <div class="input-field">
                                <input type="text" class="input" id="email" name="email" required="">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="name" name="name" required="" autocomplete="off">
                                <label for="pass">Name Surname</label>
                            </div>

                            <div class="input-field">
                                <input type="password" class="input" id="pass" name="password" required="" autocomplete="off">
                                <label for="pass">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id="pass" name="confirmPassword" required="" autocomplete="off">
                                <label for="pass">Confirm Password</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Sign Up">
                            </div>
                            <div class="signin">
                                <span>Already have an account? <a href="#">Log in here</a></span>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>