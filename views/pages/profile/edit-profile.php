<?php ob_start();
session_start();
$meta_title = "Edit Your Profile - Server IT Studio";
$meta_description = "Develop your professional skills through Server IT Studio We provide Graphic Design, Web Design, web Development, Microsoft Office etc Call 880 1945 4668 21";
$meta_keywords = "Server IT Studio, server it,server,server studio, Web design, web development, graphics design, microsoft office, html, css, javascipt,php";
$header_active = "Account";
$profile_active = "editProfile";
include("../../partials/header.php"); ?>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if (!isset($_SESSION['name'])) {
        header("location: " . LINK . "create-profile");
        die();
    }

    $name_err = $title_err = $address_err = $phone_err = $image_err = "";
    if (isset($_SESSION["name_err"])) {
        $name_err = $_SESSION["name_err"];
    } elseif (isset($_SESSION["title_err"])) {
        $title_err = $_SESSION["title_err"];
    } elseif (isset($_SESSION["address_err"])) {
        $address_err = $_SESSION["address_err"];
    } elseif (isset($_SESSION["phone_err"])) {
        $phone_err = $_SESSION["phone_err"];
    } elseif (isset($_SESSION["image_err"])) {
        $image_err = $_SESSION["image_err"];
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
                            <img id="image-output" class="profile-sidebar-img align-self-start img-thumbnail img-fluid rounded-circle"
                                src="<?= UPLOADIMAGEPATH, $_SESSION['image']; ?>" alt="profile image" />
                        </div>
                        <div class="inside-profile-sidebar-3 text-center">
                            <h4>
                                <?= $_SESSION['name']; ?>
                            </h4>
                            <p>
                                <?= $_SESSION['title']; ?>
                            </p>
                        </div>
                        <div class="profile-sidebar-recent">
                            <p class="mt-2"><i class="fa-sharp fa-solid fa-location-dot"></i>
                                <?= $_SESSION['address']; ?>
                            </p>
                            <p class="mt-2"><i class="fa-solid fa-phone"></i>
                                <?= $_SESSION['mobile']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 create-profile">
                    <div class="profile-page-link">
                        <ul>
                            <a class="<?php if ($profile_active == 'dashboard')
                                echo 'profile_active'; ?>"
                                href="<?= LINK; ?>profile">
                                <i class="fa-solid fa-table"></i>
                                <li>Dashboard</li>
                            </a>
                            <a class="<?php if ($profile_active == 'editProfile')
                                echo 'profile_active'; ?>"
                                href="<?= LINK; ?>edit-profile">
                                <i class="fa-sharp fa-solid fa-user-pen"></i>
                                <li>Edit Your Profile Info</li>
                            </a>
                            <a class="<?php if ($profile_active == 'changePassword')
                                echo 'profile_active'; ?>"
                                href="<?= LINK; ?>change-password">
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
                            <h2 class="insert-title">Change General Information</h2>
                            <div class="profile-pics">
                                <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">RESIZE YOUR IMAGE</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span id="topclose" aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="upload-demo" class="center-block"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="cancel-cropping" type="button" class="btn btn-default"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" id="changePic" class="btn btn-primary">
                                                    Change Picture
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="<?= LINK; ?>controllers/editProfileController.php" enctype="multipart/form-data"
                                method="post">
                                <div class="form-group">
                                <label for="profilePicsFile">Profile Picture</label>
                                        <input id="profilePicsFile" name="image" class="form-control item-img file center-block"
                                            type="file" accept="image/*">
                                    <span style="color:red">
                                        <?php echo $image_err;
                                        unset($_SESSION['image_err']); ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Full Name <span style="color:red;">*</span></label>
                                    <input id="name" name="name" value="<?= $_SESSION['name']; ?>" class="form-control"
                                        type="text" placeholder="Enter Your Full Name" required>
                                    <span style="color:red">
                                        <?php echo $name_err;
                                        unset($_SESSION['name_err']); ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title <span style="color:red;">*</span></label>
                                    <input id="title" name="title" value="<?= $_SESSION['title']; ?>" class="form-control"
                                        type="text" placeholder="Enter a Title" required>
                                    <span style="color:red">
                                        <?php echo $title_err;
                                        unset($_SESSION['title_err']); ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address <span style="color:red;">*</span></label>
                                    <input id="address" name="address" value="<?= $_SESSION['address']; ?>"
                                        class="form-control" type="text" placeholder="Enter Your Address" required>
                                    <span style="color:red">
                                        <?php echo $address_err;
                                        unset($_SESSION['address_err']); ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Phone Number <span style="color:red;">*</span></label>
                                    <input id="mobile" name="mobile" value="<?= $_SESSION['mobile']; ?>"
                                        class="form-control" type="text" placeholder="Enter Your Phone Number" required>
                                    <span style="color:red">
                                        <?php echo $phone_err;
                                        unset($_SESSION['phone_err']); ?>
                                    </span>
                                </div>
                                <input type="submit" name="submit" class="btn btn-success slide-btn" value="Save Changes">
                            </form>
                        </div>
                        <script>
                            let modal = document.getElementById("cropImagePop");
                            window.onclick = function (event) {
                                if (event.target == modal) {
                                    document.getElementById("profilePicsFile").value = "";
                                }
                            }
                        </script>
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


<script src="<?= LINK; ?>public/jquery/jquery.js"></script>
<script src="<?= LINK; ?>public/owl/owl.carousel.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/bootstrap.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= LINK; ?>public/WOW-master/dist/wow.min.js"></script>
<script src="<?= LINK; ?>public/bootstrap/popper.min.js"></script>
<script src="<?= LINK; ?>public/croppie/croppie.js"></script>
<script src="<?= LINK; ?>views/pages/profile/profile.js"></script>
<script>
    new WOW().init();
</script>
<script src="<?= LINK; ?>main.js"></script>
</body>

</html>