<?php ob_start();
session_start();
$header_active = "Account";
$profile_active = "changePassword";
include("../../partials/header.php"); ?>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if (!isset($_SESSION['name'])) {
        header("location: " . LINK . "create-profile");
        die();
    }

    $oldPassword_err = $newPassword_err = $confirmNewPassword_err = $success = "";
    if (isset($_SESSION["oldPassword_err"])) {
        $oldPassword_err = $_SESSION["oldPassword_err"];
    } elseif (isset($_SESSION["newPassword_err"])) {
        $newPassword_err = $_SESSION["newPassword_err"];
    } elseif (isset($_SESSION["confirmNewPassword_err"])) {
        $confirmNewPassword_err = $_SESSION["confirmNewPassword_err"];
    } elseif (isset($_SESSION["success"])) {
        $success = $_SESSION["success"];
    }
?>
    <style>
        .inside-profile-sidebar-1 {
            background-image: url('<?= IMAGEPATH; ?>serveritlogo.png');
            background-size: contain;
        }

        .card-body {
            top: 0%;
            position: unset;
            text-align: left;
        }

        .card {
            box-sizing: unset;
            box-shadow: none;
            border-radius: 5px;
            background: #F4F8FB;
        }

        label {
            font-size: 13px;
        }

        .form-group>input::placeholder {
            font-size: 12px;
        }

        .form-group>input:focus {
            font-size: 13px;
        }

        .form-group>input {
            font-size: 13px !important;
        }

        .create-profile {
            border-radius: 5px;
            background: #F4F8FB;
        }

        .profile-page-link {
            border-bottom: 1px solid #e3e3e3;
        }

        @media only screen and (max-width: 768px) {
            .card {
                color: black
            }
        }
    </style>
    <section class="profile-box">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="profile-sidebar">
                        <div class="inside-profile-sidebar-1"></div>
                        <div class="inside-profile-sidebar-2">
                            <img class="profile-sidebar-img align-self-start img-thumbnail img-fluid rounded-circle" src="<?= UPLOADIMAGEPATH, $_SESSION['image']; ?>" alt="profile image" />
                        </div>
                        <div class="inside-profile-sidebar-3 text-center">
                            <h4><?= $_SESSION['name']; ?></h4>
                            <p><?= $_SESSION['title']; ?></p>
                        </div>
                        <div class="profile-sidebar-recent">
                            <p class="mt-2"><i class="fa-sharp fa-solid fa-location-dot"></i> <?= $_SESSION['address']; ?></p>
                            <p class="mt-2"><i class="fa-solid fa-phone"></i> <?= $_SESSION['mobile']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 create-profile">
                    <div class="profile-page-link">
                        <ul>
                            <a class="<?php if ($profile_active == 'dashboard') echo 'profile_active'; ?>" href="<?= LINK; ?>profile">
                                <i class="fa-solid fa-table"></i>
                                <li>Dashboard</li>
                            </a>
                            <a class="<?php if ($profile_active == 'editProfile') echo 'profile_active'; ?>" href="<?= LINK; ?>edit-profile">
                                <i class="fa-sharp fa-solid fa-user-pen"></i>
                                <li>Edit Your Profile Info</li>
                            </a>
                            <a class="<?php if ($profile_active == 'changePassword') echo 'profile_active'; ?>" href="<?= LINK; ?>change-password">
                                <i class="fa-solid fa-lock"></i>
                                <li>Change Your Password</li>
                            </a>
                            <a href="<?= LINK; ?>controllers/logoutController.php">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <li>Logout</li>
                            </a>
                        </ul>
                    </div>
                    <div class="col-md-6 offset-md-3 profile-page-content">
                        <div class="card card-body create-profile-data">
                            <h2 class="insert-title">Change Your Password</h2>
                            <?php if ($success != "") { ?>
                                <div class="alert alert-success alert-dismissible show" role="alert">
                                    <?php echo $success;
                                    unset($_SESSION['success']); ?>
                                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>
                            <form action="<?= LINK; ?>controllers/changePasswordController.php" method="post">
                                <div class="form-group">
                                    <label for="oldPass">Old Password <span style="color:red;">*</span></label>
                                    <input id="oldPass" name="oldPassword" class="form-control" type="password" placeholder="Enter Your Old Password" required>
                                    <span style="color:red"><?php echo $oldPassword_err;
                                                            unset($_SESSION['oldPassword_err']); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="newPass">New Password <span style="color:red;">*</span></label>
                                    <input id="newPass" name="newPass" class="form-control" type="password" placeholder="Enter New Password" required>
                                    <span style="color:red"><?php echo $newPassword_err;
                                                            unset($_SESSION['newPassword_err']); ?></span>
                                </div>
                                <span id="StrengthDisp" class="strength">Weak password</span>
                                <div class="form-group">
                                    <label for="confirmNewPass">Confirm New Password <span style="color:red;">*</span></label>
                                    <input id="confirmNewPass" name="confirmNewPass" class="form-control" type="password" placeholder="Enter Confirm New Password" required>
                                    <span style="color:red"><?php echo $confirmNewPassword_err;
                                                            unset($_SESSION['confirmNewPassword_err']); ?></span>
                                </div>
                                <input type="submit" name="submit" class="btn btn-success slide-btn" value="Change Password">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include("../../partials/footer.php");
} else {
    header("location: " . LINK . "auth?p=1");
    die();
}
ob_end_flush(); ?>

<script>
    let password = document.getElementById("newPass");
    let strengthBadge = document.getElementById("StrengthDisp");

    let strongPassword = new RegExp(
        "(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})"
    );
    let mediumPassword = new RegExp(
        "((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))"
    );

    function StrengthChecker(PasswordParameter) {
        if (strongPassword.test(PasswordParameter)) {
            strengthBadge.style.color = "#25e825";
            strengthBadge.textContent = "Strong password";
        } else if (mediumPassword.test(PasswordParameter)) {
            strengthBadge.style.color = "#0c9db5";
            strengthBadge.textContent = "Medium password";
        } else {
            strengthBadge.style.color = "#ff6363";
            strengthBadge.textContent = "Weak password";
        }
    }

    password.addEventListener("input", () => {
        strengthBadge.style.display = "block";

        StrengthChecker(password.value);

        if (password.value.length == 0) {
            strengthBadge.style.display = "none";
        }
    });
</script>

<script src="<?= LINK; ?>public/jquery/jquery.js"></script>
<script src="<?= LINK; ?>public/owl/owl.carousel.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/bootstrap.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= LINK; ?>public/WOW-master/dist/wow.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/popper.min.js"></script>
<script>
    new WOW().init();
</script>
<script src="<?= LINK; ?>main.js"></script>
</body>

</html>