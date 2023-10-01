<?php ob_start();
session_start();

$meta_title = "Privacy Policy - Server IT Studio";
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
        text-decoration: bold;
        font-weight: 800;
    }

    .about-text {
        text-align: left;
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
                <h3 class="mb-3 title-h3" style="font-size: 30px;">Privacy Policy-</h3>
            </div>
            <div class="about-text wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
                <h3>Privacy Policy</h3>
                <p>
                    Server IT Studio built the Server IT Studio app as a Free app. This SERVICE is provided by Server IT
                    Studio at no cost and is intended for use as is.

                    This page is used to inform visitors regarding our policies with the collection, use, and disclosure
                    of Personal Information if anyone decided to use our Service.

                    If you choose to use our Service, then you agree to the collection and use of information in
                    relation to this policy. The Personal Information that we collect is used for providing and
                    improving the Service. We will not use or share your information with anyone except as described in
                    this Privacy Policy.

                    The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which
                    are accessible at Server IT Studio unless otherwise defined in this Privacy Policy.
                </p>
            </div>
            <div class="about-text wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
                <h3>Information Collection and Use</h3>
                <p>
                    For a better experience, while using our Service, we may require you to provide us with certain
                    personally identifiable information, including but not limited to Network STATE, INTERNET. The
                    information that we request will be retained by us and used as described in this privacy policy.

                    The app does use third-party services that may collect information used to identify you.
                </p>
            </div>
            <div class="about-text wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
                <h3>Changes to This Privacy Policy</h3>
                <p>

                    We may update our Privacy Policy from time to time. Thus, you are advised to review this page
                    periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on
                    this page.

                    This policy is effective as of 2022-10-18
                </p>

            </div>
            <div class="about-text wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
                <h3>Contact Us</h3>
                <p>

                    If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us at
                    info@serveritstudio.com.
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