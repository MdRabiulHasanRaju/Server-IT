<?php ob_start();
session_start();

$meta_title = "About Us - Server IT Studio";
$meta_description = "Established in 2023, the Leading IT Training Institute in Chittagong offers a diverse selection of courses and quality training programs. Grow your business or start your career Call 880 1945 4668 21";
$meta_keywords = "Server IT Studio, server it,server,server studio";
$header_active = "About";
include("../../partials/header.php");
?>
<style>
    section.about-us {
        margin-top: 60px;
    }

    .about-text>h3 {
        padding: 20px 0;
    }

    .about-text {
        text-align: center;
        padding-top: 30px;
    }

    .about-text>h1 {
        font-size: 40px;
        font-weight: 700;
        letter-spacing: 4px;
    }

    .about-text>p {
        font-size: 16px;
        text-align: justify;
        color: gray;
        letter-spacing: 1px;
        line-height: .7cm;
    }

    .sis-images>img {
        width: 70%;
        border-radius: 8px;
    }

    .sis-images {
        text-align: center;
        margin: 40px 0 100px;
    }

    .team {
        text-align: center;
    }

    .team-member>img {
        width: 40%;
        border-radius: 50%;
        border: 3px solid #efefef;
    }

    .team>h1 {
        padding: 34px 0 53px;
    }

    .team-member {
        padding: 20px 0 30px;
    }

    .team-member>p {
        font-size: 13px;
    }

    .team-member:after {
        content: "";
        width: 30px;
        display: block;
        border-bottom: 2px solid red;
        position: relative;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .team-member>h4 {
        padding: 8px 0;
    }
</style>
<section class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3 title-h3" style="font-size: 30px;">About Us-</h3>
            </div>
            <div class="about-text wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
                <h1>Hi. We're Server IT Studio.</h1>
                <h3>We are a team of impassioned Developers, Creative Graphic Desingers, and Office Application Specialists</h3>
                <p>
                    Server IT. Studio is committed to educating students in the ever-changing field of computer technology. Our mission is to provide students with a comprehensive education that provides them with the knowledge and skills they need to succeed in the competitive world of computing. Our knowledgeable instructors use cutting-edge teaching techniques and cutting-edge technology to provide students with a practical, hands-on education in a variety of computer-related domains such as programming, web development, database management, graphics design and more. Join us today to learn about the exciting opportunities available in the world of computer technology.
                </p>
            </div>
            <div class="sis-images wow bounceInDown" data-wow-duration="2s">
                <img src="/serverit/public/images/serveritstudio_campus-min.jpg" alt="campus - server it studio">
            </div>
            <div class="col-12">
                <h3 class="title-h3" style="font-size: 30px;">SERVER IT STUDIO TEAM</h3>
            </div>
            <div class="team">
                <h1>Meet the team</h1>
                <?php
                $instructorsSql = "SELECT * FROM `instructors`";
                $instructorsStmt = fetch_data($connection, $instructorsSql);
                if ($instructorsStmt) {
                    mysqli_stmt_bind_result($instructorsStmt, $id, $name, $expertise, $about, $image);
                    while (mysqli_stmt_fetch($instructorsStmt)) { ?>

                        <div class="col-md-3">
                            <div class="team-member">
                                <img src="<?= IMAGEPATH, $image; ?>" alt="<?= $name; ?> - server it studio">
                                <h4><?= $name; ?></h4>
                                <p><?= $about; ?></p>
                            </div>
                        </div>
                <?php }
                } ?>

            </div>
        </div>
    </div>
</section>

<?php include("../../partials/footer.php");
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
<script src="<?= LINK; ?>main.js"></script>
</body>

</html>