<?php ob_start();
session_start();
$meta_title = "Create Your Profie - Server IT Studio";
$meta_description = "Develop your professional skills through Server IT Studio We provide Graphic Design, Web Design, web Development, Microsoft Office etc Call 880 1945 4668 21";
$meta_keywords = "Server IT Studio, server it,server,server studio, Web design, web development, graphics design, microsoft office, html, css, javascipt,php";
$header_active = "Account";
include("../../partials/header.php"); ?>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if (isset($_SESSION['name'])) {
        header("location: " . LINK . "profile");
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


    $sql = "select image from users_info where user_id = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "i", $param_id);
    $param_id = $_SESSION['id'];
    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_store_result($stmt)) {
            mysqli_stmt_bind_result($stmt, $image);
            if (mysqli_stmt_fetch($stmt)) {
                $_SESSION["image"] = $image;
            } else {
                unset($_SESSION["image"]);
            }
        }
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
                            <img id="image-output"
                                class="profile-sidebar-img align-self-start img-thumbnail img-fluid rounded-circle" src="<?php if (!isset($_SESSION['image'])) {
                                    echo IMAGEPATH; ?>default.png<?php } else
                                    echo UPLOADIMAGEPATH, $_SESSION['image']; ?>" alt="profile image" />
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
                                                <button type="button" id="uploadPic" class="btn btn-primary">
                                                    Upload
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="<?= LINK; ?>controllers/createProfileController.php" enctype="multipart/form-data"
                                method="post">
                                <?php if (!isset($_SESSION['image'])) { ?>
                                    <div class="form-group" id="image-form">
                                        <label for="profilePicsFile">Profile Picture <span style="color:red;">*</span></label>
                                        <input id="profilePicsFile" name="image" class="form-control item-img file center-block"
                                            type="file" accept="image/*" required>
                                        <span style="color:red">
                                            <?php echo $image_err;
                                            unset($_SESSION['image_err']); ?>
                                        </span>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="name">Full Name <span style="color:red;">*</span></label>
                                    <input id="name" name="name" class="form-control" type="text"
                                        placeholder="Enter Your Full Name" required>
                                    <span style="color:red">
                                        <?php echo $name_err;
                                        unset($_SESSION['name_err']); ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title <span style="color:red;">*</span></label>
                                    <input id="title" name="title" class="form-control" type="text"
                                        placeholder="Enter a Title" required>
                                    <span style="color:red">
                                        <?php echo $title_err;
                                        unset($_SESSION['title_err']); ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address <span style="color:red;">*</span></label>
                                    <input id="address" name="address" class="form-control" type="text"
                                        placeholder="Enter Your Address" required>
                                    <span style="color:red">
                                        <?php echo $address_err;
                                        unset($_SESSION['address_err']); ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Phone Number <span style="color:red;">*</span></label>
                                    <input id="mobile" name="mobile" class="form-control" type="text"
                                        placeholder="Enter Your Phone Number" required>
                                    <span style="color:red">
                                        <?php echo $phone_err;
                                        unset($_SESSION['phone_err']); ?>
                                    </span>
                                </div>
                                <input type="submit" name="submit" class="btn btn-success slide-btn" value="Save">
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