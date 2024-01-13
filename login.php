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
                    <form action="loginForm.php" method="post" id="signinform" onkeydown="if(event.keyCode === 13) { return false;}">
                        <header>Giriş Yap</header>
                        <?php
                            if(isset($_GET['success'])){ ?>
                                <div class="success-msg"><?php echo $_GET['success'];?></div>
                        <?php  } ?>
                        <?php
                            if(isset($_GET['error'])){ ?>
                                <div class="error-msg"><?php echo $_GET['error'];?></div>
                        <?php  } ?>
                        <div class="input-field">
                            <input type="text" class="input" id="email" name="email" required="">
                            <label for="email">E-Posta</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="password" name="password" required="">
                            <label for="pass">Şifre</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Giriş Yap">
                        </div>
                        <div class="signintext">
                            <span>Hesabın yok mu? <button class="signupbutton" type="button">Hesap oluştur</button></span><br><br>
                            <a href="index.php"class="anonymbutton">Anonim giriş yap</a>
                        </div>
                    </form>
                </div>

            </div>
            <div class="box signup">

                <div class="input-box">
                    <form action="signupForm.php" method="post" id="signupform" onkeydown="if(event.keyCode === 13) { return false;}">

                        <header>Hesap Oluştur</header>
                        
                        <?php
                            if(isset($_GET['errorsu'])){ ?>
                                <div class="error-msg"><?php echo $_GET['errorsu'];?></div>
                        <?php  } ?>
                        <div class="input-field">
                            <input type="text" class="input" id="emailu" name="email" required="">
                            <label for="email">E-Posta</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="nameu" name="name" required="" autocomplete="off">
                            <label for="pass">Ad Soyad</label>
                        </div>

                        <div class="input-field">
                            <input type="password" class="input" id="passu" name="password" required="" autocomplete="off">
                            <label for="pass">Şifre</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="passcu" name="cpassword" required="" autocomplete="off">
                            <label for="pass">Şifreyi tekrar yaz</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Hesap Oluştur">
                        </div>
                        <div class="signintext">
                            <span>Hesabın var mı? <button class="signinbutton" type="button">Giriş yap</button></span><br><br>
                            <a href="index.php"class="anonymbutton">Anonim giriş yap</a>
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

        const queryString = window.location.search;
        
        const urlParams = new URLSearchParams(queryString);

        if(urlParams.has('errorsu')){
            bar.classList.add('active');
            signin.classList.add('active');
            signup.classList.add('active');
        }

        signupbtn.onclick = function() {
            bar.classList.add('active');
            signin.classList.add('active');
            signup.classList.add('active');
            document.getElementById("email").value = '';
            document.getElementById("password").value = '';


        }
        signinbtn.onclick = function() {
            bar.classList.remove('active');
            signin.classList.remove('active');
            signup.classList.remove('active');
            document.getElementById("emailu").value = '';
            document.getElementById("passu").value = '';
            document.getElementById("nameu").value = '';
            document.getElementById("passcu").value = '';

        }
    </script>
</body>

</html>