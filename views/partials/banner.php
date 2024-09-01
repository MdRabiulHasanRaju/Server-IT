<style>
    .home {
        background: url(public/images/serveritstudio-main-slider-min.jpg) no-repeat center center;
        color: #000;
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

    @media (max-width:768px) {
        .home {
            background: url(public/images/Serveritstudio-mobile-banner.jpg) no-repeat center center;
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

                            <!-- <h1 class="wow bounceInUp" data-wow-duration="2s">Bringing Your Digital Future to Life With Server IT Studio</h1> -->
                            <h1 class="wow bounceInUp" data-wow-duration="2s">We've amazing Skills for <span style="color:#ffe200;text-decoration: underline;">
                                    Teaching
                                </span></h1>
                            <p style="box-shadow: 1px 1px 21px -3px white;padding: 5px;border-radius: 10px;background: rgb(0, 0, 0, 0.5);" class="wow bounceInDown" data-wow-duration="2s">
                                <!-- Server IT Studio is a computer training facility and IT solution for your business. We provide IT training as well as technological services such as website creation, digital marketing, and graphic design to help your company develop to the next level. -->
                                
                                সার্ভার আইটি স্টুডিও একটি কম্পিউটার প্রশিক্ষণ কেন্দ্র এবং আপনার ব্যবসার জন্য আইটি সমাধান। আমরা আইটি প্রশিক্ষণের পাশাপাশি ওয়েবসাইট তৈরি, ডিজিটাল মার্কেটিং এবং গ্রাফিক ডিজাইন এর মতো প্রযুক্তিগত পরিষেবা প্রদান করে থাকি।

                            </p>
                            <a href="<?= LINK; ?>courses" class="btn btn-success slide-btn rounded banner-browse-btn wow slideInLeft" data-wow-duration="2s"><i class="fa-solid fa-folder-tree"></i> <!--ব্রাউজ-->দেখুন আমাদের কোর্সগুলো</a>
                            <a style="color:white;background:black;" href="<?= LINK; ?>certificate-verification" class="btn btn-success slide-btn rounded banner-browse-btn wow slideInRight"><i class="fa-solid fa-folder-tree"></i> সার্টিফিকেট যাচাই করুন </a>
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
            </div>
        </div>
    </div>
</header>