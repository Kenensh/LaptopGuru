<?php
session_start();

if(isset($_SESSION["user"])){
    header("location: dashboard.php");
    exit;
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Sign in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php
    include("css.php");
    ?>
    <style>
        body {
            background: url("/images/bg.jpg") center center/cover;
        }

        .sign-in-panel {
            width: 280px;
        }

        .logo {
            height: 64px;
        }

        .input-area {
            .form-floating:first-child {
                .form-control {
                    border-bottom-left-radius: 0;
                    border-bottom-right-radius: 0;
                }
            }

            .form-floating:last-child {
                .form-control {
                    border-top-left-radius: 0;
                    border-top-right-radius: 0;
                    position: relative;
                    top: -1px;
                }
            }

            .form-control:focus {
                position: relative;
                z-index: 1;
            }
        }
    </style>
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="sign-in-panel">
            <img class="logo mb-3" src="/assets/images/site-logo.png" alt="">
            <?php if ( isset($_SESSION["error"]["times"]) && $_SESSION["error"]["times"] > 5) : ?>
                輸入錯誤次數太多, 請稍後再嘗試登入
            <?php else : ?>
                <h1 class="h2">Please sign in</h1>
                <form action="doLogin.php" method="post">
                    <div class="input-area">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="account" required>
                            <label for="floatingInput">Account</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                    </div>
                    <?php if (isset($_SESSION["error"]["message"])) : ?>
                        <div class="text-danger">
                            <?= $_SESSION["error"]["message"] ?>
                        </div>
                    <?php
                        unset($_SESSION["error"]["message"]);
                    endif; ?>
                    <div class="form-check my-3">
                        <input class="form-check-input" type="checkbox" value="" id="remember">
                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Sign in</button>
                    </div>
                </form>
            <?php endif; ?>
            <div class="mt-4 text-muted">
                © 2017–2024
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>