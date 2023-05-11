<?php ob_start();
session_start();
include("../../partials/header.php"); ?>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if (isset($_SESSION['name'])) {
        header("location: " . LINK . "views/pages/profile/profile.php");
        die();
    }

    $name_err = $title_err = $address_err = $phone_err = "";
    if (isset($_SESSION["name_err"])) {
        $name_err = $_SESSION["name_err"];
    } elseif (isset($_SESSION["title_err"])) {
        $title_err = $_SESSION["title_err"];
    } elseif (isset($_SESSION["address_err"])) {
        $address_err = $_SESSION["address_err"];
    } elseif (isset($_SESSION["phone_err"])) {
        $phone_err = $_SESSION["phone_err"];
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

        input::placeholder {
            font-size: 12px;
        }

        input:focus {
            font-size: 13px;
        }

        input {
            font-size: 13px !important;
        }

        .profile-page-link>h1 {
            text-align: center;
            border-bottom: 1px solid #e3e3e3;
            padding: 20px 0px;
        }

        .create-profile {
            border-radius: 5px;
            background: #F4F8FB;
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
                            <img class="profile-sidebar-img align-self-start img-thumbnail img-fluid rounded-circle" src="<?= IMAGEPATH; ?>default.png" alt="profile image" />
                        </div>
                        <div class="inside-profile-sidebar-3 text-center">
                            <h4>Your Name</h4>
                            <p>Your Title</p>
                        </div>
                        <div class="profile-sidebar-recent">
                            <p class="mt-2"><i class="fa-sharp fa-solid fa-location-dot"></i> Your Address</p>
                            <p class="mt-2"><i class="fa-solid fa-phone"></i> Your Phone Number</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 create-profile">
                    <div class="profile-page-link">
                        <h1>Create Your Profile</h1>
                    </div>
                    <div class="col-md-6 offset-md-3 profile-page-content">
                        <div class="card card-body create-profile-data">
                            <h2 class="insert-title">General Information</h2>
                            <form action="<?= LINK; ?>controllers/createProfileController.php" method="post">
                                <div class="form-group">
                                    <label for="name">Full Name <span style="color:red;">*</span></label>
                                    <input id="name" name="name" class="form-control" type="text" placeholder="Enter Your Full Name">
                                    <span style="color:red"><?php echo $name_err;
                                                            unset($_SESSION['name_err']); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title <span style="color:red;">*</span></label>
                                    <input id="title" name="title" class="form-control" type="text" placeholder="Enter a Title">
                                    <span style="color:red"><?php echo $title_err;
                                                            unset($_SESSION['title_err']); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address <span style="color:red;">*</span></label>
                                    <input id="address" name="address" class="form-control" type="text" placeholder="Enter Your Address">
                                    <span style="color:red"><?php echo $address_err;
                                                            unset($_SESSION['address_err']); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Phone Number <span style="color:red;">*</span></label>
                                    <input id="mobile" name="mobile" class="form-control" type="text" placeholder="Enter Your Phone Number">
                                    <span style="color:red"><?php echo $phone_err;
                                                            unset($_SESSION['phone_err']); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="image">Profile Picture</label>
                                    <input id="image" name="image" class="form-control" type="file">
                                </div>
                                <input type="submit" name="submit" class="btn btn-success slide-btn" value="Save">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include("../../partials/footer.php");
} else {
    header("location: " . LINK . "views/pages/auth/auth.php?p=1");
    die();
}
ob_end_flush(); ?>


<script src="<?= LINK; ?>public/jquery/jquery.js"></script>
<script src="<?= LINK; ?>public/owl/owl.carousel.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/bootstrap.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= LINK; ?>public/WOW-master/dist/wow.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/popper.min.js"></script>
<script>
    new WOW().init();
</script>
</body>

</html>