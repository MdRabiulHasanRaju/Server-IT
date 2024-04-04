<?php ob_start();
session_start();

$meta_title = "Documents - Server IT Studio";
$meta_description = "Established in 2023, the Leading IT Training Institute in Chittagong offers a diverse selection of courses and quality training programs. Grow your business or start your career Call 880 1945 4668 21";
$meta_keywords = "Server IT Studio, server it,server,server studio";
$header_active = "";
include("../../partials/header.php");
?>
<style>
    section.about-us {
        margin-top: 60px;
    }

    .about-text>h3 {
        padding: 20px 0;
        text-decoration: bold;
        font-weight: 800;
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
                <h3 class="mb-3 title-h3" style="font-size: 30px;">Important Files-</h3>
            </div>
            <div class="about-text wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
                <h3>Bangla Typing Sheet (Bijoy) - </h3>
                <p>
                    <a href="<?= LINK; ?>public/documents/Bijoy-Sheet-Server IT Studio.pdf" class="btn btn-success slide-btn" Download>Download</a>
                </p>
            </div>
            
            <div class="about-text wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
                <h3>Excel Sheet - </h3>
                <p>
                    <a href="<?= LINK; ?>public/documents/excel.pdf" class="btn btn-success slide-btn" Download>Download</a>
                </p>
            </div>
            <div class="about-text wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
                <h3>Excel Raw File - </h3>
                <p>
                    <a href="<?= LINK; ?>public/documents/excelOriginal.xlsx" class="btn btn-success slide-btn" Download>Download</a>
                </p>
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