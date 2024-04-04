<style>
    .home{
    background:url(public/images/serveritstudio-main-slider-min.jpg) no-repeat center center;
    color:#000;
	background-size:cover;
	-webkit-background-size:cover;
	-moz-background-size:cover;
	-o-background-size:cover;
	-ms-background-size:cover;
}
.banner-browse-btn {
    font-size: 14px;
    padding: 14px 23px;
}
@media (max-width:768px){
    .home{
    background:url(public/images/Serveritstudio-mobile-banner.jpg) no-repeat center center;
    background-size: cover;
}
.banner-browse-btn {
   margin-top: 5px;
}
}
</style>
<header id="home" class="home">
    <div class="overlay-fluid-block">
        <div class="container text-center">
            <div class="row">
                <div class="home-wrapper">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="home-content">

                            <h1 class="wow bounceInUp" data-wow-duration="2s">Bringing Your Digital Future to Life With Server IT Studio</h1>
                            <p class="wow bounceInDown" data-wow-duration="2s">Server IT. Studio is committed to educating students in the ever-changing field of computer technology. </p>
                            <a href="<?= LINK; ?>courses" class="btn btn-success slide-btn rounded banner-browse-btn wow slideInLeft" data-wow-duration="2s"><i class="fa-solid fa-folder-tree"></i> ব্রাউজ কোর্স</a>
                            <a style="color:white;background:black;" href="<?= LINK; ?>certificate-verification" class="btn btn-success slide-btn rounded banner-browse-btn wow slideInRight"><i class="fa-solid fa-folder-tree"></i> সার্টিফিকেট যাচাই করুন </a>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                                    <div class="home-contact">
                                        <div class="input-group wow slideInRight" data-wow-duration="2s">
                                            <form action="/search" method="GET">
                                            <input type="text" class="form-control" name="searchValue" placeholder="What do you want to learn?">
                                            <input name="submit" type="submit" class="form-control" value="Search">
                                            </form>
                                        </div><!-- /input-group -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>			
    </div>
</header>