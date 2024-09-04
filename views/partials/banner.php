<style>
.home {
    background: url(public/images/banner-2.png) no-repeat center center;
    color: #000;
    background-position: center;
    background-attachment: fixed;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
}

    .banner-browse-btn {
        font-size: 14px;
        padding: 14px 23px;
    }
    .home-wrapper{
        display: flex;
        gap: 20px;
    }
    .banner-left{
        width: 68%;
    }
    .banner-right{
        width: 30%;
    }
    @media (max-width:768px) {
        .home {
            background: url(public/images/Serveritstudio-mobile-banner.jpg) no-repeat center center;
            background-size: cover;
        }

        .banner-browse-btn {
            margin-top: 5px;
        }
        .home-wrapper{
        flex-direction: column-reverse;
    }
    .banner-left{
        width: 100%;
    }
    .banner-right{
        width: 100%;
    }
    }
</style>
<header id="home" class="home">
    <div class="overlay-fluid-block">
        <div class="container text-center">
            <div class="row">
                <div class="home-wrapper">


                    <div class="banner-left">
                    <div class="col-md-10">
                        <div class="home-content">
                            <!-- <h1 class="wow bounceInUp" data-wow-duration="2s">Bringing Your Digital Future to Life With Server IT Studio</h1> -->
                            <h1 class="wow bounceInUp" data-wow-duration="2s">Premium Course with Affordable <span style="color:#ffe200;text-decoration: underline;">
                                    Price
                            </span></h1>
                            <p style="padding: 5px" class="wow bounceInDown" data-wow-duration="2s">
                                <!-- Server IT Studio is a computer training facility and IT solution for your business. We provide IT training as well as technological services such as website creation, digital marketing, and graphic design to help your company develop to the next level. -->
                                
                                সার্ভার আইটি স্টুডিও একটি কম্পিউটার প্রশিক্ষণ কেন্দ্র এবং আমরা আইটি প্রশিক্ষণের পাশাপাশি ওয়েবসাইট তৈরি, ডিজিটাল মার্কেটিং এবং গ্রাফিক ডিজাইন এর মতো প্রযুক্তিগত সেবা প্রদান করে থাকি।

                            </p>
                            <a href="<?= LINK; ?>courses" class="btn btn-success slide-btn rounded banner-browse-btn wow slideInLeft" data-wow-duration="2s"><i class="fa-solid fa-folder-tree"></i> <!--ব্রাউজ-->দেখুন আমাদের কোর্সগুলো</a>
                            <a style="color:white;background:#30b930;" href="<?= LINK; ?>certificate-verification" class="btn btn-success slide-btn rounded banner-browse-btn wow slideInRight"><i class="fa-solid fa-folder-tree"></i> সার্টিফিকেট যাচাই করুন </a>
                            <!-- <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                                    <div class="home-contact">
                                        <div class="input-group wow slideInRight" data-wow-duration="2s">
                                            <form action="/search" method="GET">
                                                <input type="text" class="form-control" name="searchValue" placeholder="What do you want to learn?">
                                                <input name="submit" type="submit" class="form-control" value="Search">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                    </div>

                    </div>
                    <div class="banner-right">
                        <iframe style="border-radius:20px;height:350px" width="100%" height="" src="https://www.youtube-nocookie.com/embed/6Kh5oRhGEp4?autoplay=1&amp;si=W1FHj9ufehV8p6jW&amp;controls=0" title="YouTube video player" frameborder="0" allow="autoplay ; accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>






















                </div>
            </div>
        </div>
    </div>
</header>