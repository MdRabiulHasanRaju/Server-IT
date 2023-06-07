<?php
if (!isset($_SESSION['loggedin']) && isset($_SESSION['loggedin']) != true) {
    if (!isset($_COOKIE['authNotice'])) {
        setcookie("authNotice", rand(500, 5000), time() + 86400, "/");
?>
        <style>
            .authNotice-logo {
                width: 200px;
            }

            .authNotice-title {
                text-align: center;
                margin: auto;
            }

            .authNotice-title>p {
                margin-top: 14px;
                font-size: 24px;
            }

            .authNotice-input>label {
                font-size: 14px;
            }

            .authNotice-input>input {
                font-size: 13px;
            }

            #adclose {
                position: relative;
                bottom: 44px;
                margin: 0;
            }
        </style>
        <section class="auth-notice">
            <div class="container">
                <div class="row">
                    <div class="modal fade" id="authNoticeModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title authNotice-title">
                                        <img class="authNotice-logo" src="<?= LINK; ?>/public/images/logo.png" alt="Server IT Studio - Logo">
                                        <p>Login to your account</p>
                                    </div>
                                    <button id="adclose" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formId" action="<?= LINK; ?>controllers/loginController.php" class="modal-login-form" method="POST">
                                        <div class="form-group authNotice-input">
                                            <label for="username">Email</label>
                                            <input type="email" class="form-control" id="username" name="username" placeholder="Email Address" required>
                                        </div>
                                        <div class="form-group authNotice-input">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <button id="submit" name="submit" class="btn btn-lg btn-primary btn-block slide-btn" type="submit">Login with email</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <a href="auth/2">
                                        <h3 class="text-center">Don’t have an account? Create Your Account!</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php }
} ?>