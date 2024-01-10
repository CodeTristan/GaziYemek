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

    <div class="main">
        <div class="row">
            <div class="side-image">

                <img src="images/Gazi_Üniversitesi_logo.png">

            </div>
            <div class="box signin">
                <div class="input-box">
                    <form action="" method="post" id="signinform" onkeydown="if(event.keyCode === 13) { return false;}">
                        <header>Sign in</header>
                        <div class="input-field">
                            <input type="text" class="input" id="email" name="email" required="">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="password" name="password" required="">
                            <label for="pass">Password</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" name="signin" id="signinbtn" value="Sign In">
                        </div>
                        <div class="signintext">
                            <span>Already have an account? <button class="signupbutton" type="button">Sign up here</button></span>
                        </div>
                    </form>
                </div>

            </div>
            <div class="box signup">

                <div class="input-box">
                    <form action="" method="post" id="signupform" onkeydown="if(event.keyCode === 13) { return false;}">

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
                            <input type="password" class="input" id="password" name="password" required="" autocomplete="off">
                            <label for="pass">Password</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="cpassword" name="cpassword" required="" autocomplete="off">
                            <label for="pass">Confirm Password</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" name="signup" id="signupbtn" value="Sign Up">
                        </div>
                        <div class="signintext">
                            <span>Already have an account? <button class="signinbutton" type="button">Sign in here</button></span>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const signinbtn = document.querySelector('.signinbutton');
        const signupbtn = document.querySelector('.signupbutton');

        const signin = document.querySelector('.signin');
        const signup = document.querySelector('.signup');

        const bar = document.querySelector('.side-image');

        signupbtn.onclick = function() {
            bar.classList.add('active');
            signin.classList.add('active');
            signup.classList.add('active');
        }
        signinbtn.onclick = function() {
            bar.classList.remove('active');
            signin.classList.remove('active');
            signup.classList.remove('active');
        }

    </script>

</body>

</html>

