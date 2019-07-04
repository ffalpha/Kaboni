<?php 
include "./db.php";

session_start(); ?>

<!DOCTYPE html>
<html class=no-js lang=en>

<head>
<meta charset=UTF-8>
<meta content="IE=edge" http-equiv=X-UA-Compatible>
<meta content="width=device-width,initial-scale=1" name=viewport>
<title>KABONI</title>

<style>
    img{
	min-width: 100%;
}
.sr-only{
	position: absolute;
	left: -9999999px;
}
.img-responsive,
.thumbnail > img,
.thumbnail a > img,
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  display: block;
  max-width: 100%;
  height: auto;
}
//carousel start
.carousel {
  position: relative;
}
.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
}
.carousel-inner > .item {
  position: relative;
  display: none;
  -webkit-transition: .6s ease-in-out left;
       -o-transition: .6s ease-in-out left;
          transition: .6s ease-in-out left;
}
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  line-height: 1;
}
@media all and (transform-3d), (-webkit-transform-3d) {
  .carousel-inner > .item {
    -webkit-transition: -webkit-transform .6s ease-in-out;
         -o-transition:      -o-transform .6s ease-in-out;
            transition:         transform .6s ease-in-out;

    -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
    -webkit-perspective: 1000px;
            perspective: 1000px;
  }
  .carousel-inner > .item.next,
  .carousel-inner > .item.active.right {
    left: 0;
    -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
  }
  .carousel-inner > .item.prev,
  .carousel-inner > .item.active.left {
    left: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
  }
  .carousel-inner > .item.next.left,
  .carousel-inner > .item.prev.right,
  .carousel-inner > .item.active {
    left: 0;
    -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
  }
}
.carousel-inner > .active,
.carousel-inner > .next,
.carousel-inner > .prev {
  display: block;
}
.carousel-inner > .active {
  left: 0;
}
.carousel-inner > .next,
.carousel-inner > .prev {
  position: absolute;
  top: 0;
  width: 100%;
}
.carousel-inner > .next {
  left: 100%;
}
.carousel-inner > .prev {
  left: -100%;
}
.carousel-inner > .next.left,
.carousel-inner > .prev.right {
  left: 0;
}
.carousel-inner > .active.left {
  left: -100%;
}
.carousel-inner > .active.right {
  left: 100%;
}
.carousel-control {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 15%;
  font-size: 20px;
  color: #fff;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
  filter: alpha(opacity=50);
  opacity: .5;
}
.carousel-control.left {
  background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
  background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, .0001)));
  background-image:         linear-gradient(to right, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
  background-repeat: repeat-x;
}
.carousel-control.right {
  right: 0;
  left: auto;
  background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
  background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .0001)), to(rgba(0, 0, 0, .5)));
  background-image:         linear-gradient(to right, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
  background-repeat: repeat-x;
}
.carousel-control:hover,
.carousel-control:focus {
  color: #fff;
  text-decoration: none;
  filter: alpha(opacity=90);
  outline: 0;
  opacity: .9;
}
.carousel-control .icon-prev,
.carousel-control .icon-next,
.carousel-control .glyphicon-chevron-left,
.carousel-control .glyphicon-chevron-right {
  position: absolute;
  top: 50%;
  z-index: 5;
  display: inline-block;
  margin-top: -10px;
}
.carousel-control .icon-prev,
.carousel-control .glyphicon-chevron-left {
  left: 50%;
  margin-left: -10px;
}
.carousel-control .icon-next,
.carousel-control .glyphicon-chevron-right {
  right: 50%;
  margin-right: -10px;
}
.carousel-control .icon-prev,
.carousel-control .icon-next {
  width: 20px;
  height: 20px;
  font-family: serif;
  line-height: 1;
}
.carousel-control .icon-prev:before {
  content: '\2039';
}
.carousel-control .icon-next:before {
  content: '\203a';
}
.carousel-indicators {
  position: absolute;
  bottom: 10px;
  left: 50%;
  z-index: 15;
  width: 60%;
  padding-left: 0;
  margin-left: -30%;
  text-align: center;
  list-style: none;
}
.carousel-indicators li {
  display: inline-block;
  width: 10px;
  height: 10px;
  margin: 1px;
  text-indent: -999px;
  cursor: pointer;
  background-color: #000 \9;
  background-color: rgba(0, 0, 0, 0);
  border: 1px solid #fff;
  border-radius: 10px;
}
.carousel-indicators .active {
  width: 12px;
  height: 12px;
  margin: 0;
  background-color: #fff;
}
.carousel-caption {
  position: absolute;
  right: 15%;
  bottom: 20px;
  left: 15%;
  z-index: 10;
  padding-top: 20px;
  padding-bottom: 20px;
  color: #fff;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
}
.carousel-caption .btn {
  text-shadow: none;
}
@media screen and (min-width: 768px) {
  .carousel-control .glyphicon-chevron-left,
  .carousel-control .glyphicon-chevron-right,
  .carousel-control .icon-prev,
  .carousel-control .icon-next {
    width: 30px;
    height: 30px;
    margin-top: -15px;
    font-size: 30px;
  }
  .carousel-control .glyphicon-chevron-left,
  .carousel-control .icon-prev {
    margin-left: -15px;
  }
  .carousel-control .glyphicon-chevron-right,
  .carousel-control .icon-next {
    margin-right: -15px;
  }
  .carousel-caption {
    right: 20%;
    left: 20%;
    padding-bottom: 30px;
  }
  .carousel-indicators {
    bottom: 20px;
  }
}
//carousel-end</style>
</head>
<link href=assets/css/bootstrap.min.css rel=stylesheet>
<link href=assets/css/font-awesome.min.css rel=stylesheet>
<link href=assets/css/ionicons.min.css rel=stylesheet>
<link href=assets/css/magnific-popup.css rel=stylesheet>
<link href=assets/css/owl.carousel.css rel=stylesheet>
<link href=assets/css/owl.theme.css rel=stylesheet>
<link href=assets/css/style.css rel=stylesheet>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<styles>
    
</styles>

<!--[if lt IE 9]><script src=https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js></script><script src=https://oss.maxcdn.com/respond/1.4.2/respond.min.js></script><![endif]-->
<!--[if IE]><style>.flip-container.hover .back,.flip-container:hover .back{backface-visibility:visible!important}</style><![endif]-->
  <body>
<div id=preloader>
    <div class=loader><span></span> <span></span> <span></span> <span></span></div>
</div>
<div class=home-page>
    <div class="image_logo_intro introduction" style="background-image:url(assets/img/asd.jpg);"  >
      
  
    
        <div class=intro-content  >
           <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <ol class="carousel-indicators">
        <?php
        $query="SELECT * FROM mainslider";
        $result=mysqli_query($connect,$query);
        $i=0;
        while($row=mysqli_fetch_assoc($result))
        {  
        ?>
      <li data-target="#myCarousel" data-slide-to="<?php echo $i ?>" ></li>
       <?php $i=$i+1;} ?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      
      <div class="item active">
        <img src="assets/img/slider/Logo.jpg" alt="picture" style="width:100%;">
      </div>
        <?php
        $query="SELECT * FROM mainslider";
        $result=mysqli_query($connect,$query);
        while($row=mysqli_fetch_assoc($result))
        {
        ?>
    <?php if ($row['image']== "Logo.jpg" ) continue; ?>
      <div class="item ">
        <img src="assets/img/slider/<?php echo $row['image']?>" alt="picture" style="width:100%;">
      </div>
    <?php } ?>
    </div>

              
  </div>

  <p><font face="Georgia"  size="6" color="white" style="text-align:center;"> &emsp; &emsp; &emsp; &emsp; &emsp; Tell Your Dreams</font><br> <font face="Georgia"  size="6" color="red" style="text-align:center;">&emsp; &emsp; &emsp; &emsp; We Change Your World !</font></p><br><br><br><br>
   &emsp;  &emsp; <button type="button" class="btn btn-primary" onclick="window.location='./Blog/login/index.php';" >Customer Area</button>   &emsp;  &emsp;  &emsp;  &emsp; 
<!--           <img src="assets/img/Logo.jpg"alt="" class="img-responsive center-block ">-->
        <button type="button" class="btn btn-warning" onclick="window.location='./Blog/index.php';" >Our Blog</button> 
         
        </div>
    </div>
    <div class="menu six_nav_item">
        <div class="menu_button profile-btn" data-url_target=about_us>
            <div class=mask style=background-image:url(assets/img/navigation/about.jpg)></div>
            <div class=heading><i class="hidden-xs ion-ios-people-outline"></i>
                <h2>About Us</h2></div>
        </div>
        <div class="menu_button service-btn" data-url_target=service>
            <div class=mask style=background-image:url(assets/img/navigation/service.jpg)></div>
            <div class=heading><i class="hidden-xs ion-ios-lightbulb-outline"></i>
                <h2>Services</h2></div>
        </div>
        <div class="menu_button portfolio-btn" data-url_target=portfolio>
            <div class=mask style=background-image:url(assets/img/navigation/portfolio.jpg)></div>
            <div class=heading><i class="hidden-xs ion-ios-briefcase-outline"></i>
                <h2>Portfolio</h2></div>
        </div>
        <div class="menu_button gallery-btn" data-url_target=gallery>
            <div class=mask style=background-image:url(assets/img/navigation/gallery.jpg)></div>
            <div class=heading><i class="hidden-xs ion-ios-camera-outline"></i>
                <h2>Gallery</h2></div>
        </div>
         <div class="menu_button faq-btn" >
            <div class=mask style=background-image:url(assets/img/navigation/faq.jpg)></div>
            <div class=heading><i class="hidden-xs ion-ios-chatboxes-outline"></i>
               <a href="./Blog/index.php" style="color: #000000"> <h2>Blog</h2></div></a>
           </div>
        <div class="menu_button contact-btn" data-url_target=contact>
            <div class=mask style=background-image:url(assets/img/navigation/contact.jpg)></div>
            <div class=heading><i class="hidden-xs ion-ios-email-outline"></i>
                <h2>Contact</h2></div>
        </div>
    </div>
</div>
<div class=close-btn></div>
<div class="container-fluid page profile-page" id=about_us>
    <div class=row>
        <div class="hidden-xs col-md-3 hidden-sm image-container">
            <div class=mask></div>
            <div class=main-heading>
                <h1>About us</h1></div>
        </div>
        <div class="col-md-9 col-sm-12 content-container">
            <div class=clearfix>
                <h2 class=small-heading>LEARN ABOUT US</h2>
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=row>
                        <div class="col-md-6 col-sm-12">
                            <div class="embed-responsive embed-responsive-4by3 video">
                                <iframe allowfullscreen class=embed-responsive-item src=https://www.youtube.com/embed/aVsuu9tgyHA/></iframe>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class=about-us-desc>
                                <p>QKABONI.LK is a production company, focused on innovative concepts with a fresh approach. The combined experience of the in-house team covers video productions, logo , 3D designing, motion animations, product promotion, company profiles and commercials.
                                    <p>Kaboni you've done an amazing job. Thank you Shehan and RA, for your enormous effort... Special thanks should goes to Manthila malli & Malan malli for their contribution and for the patience they had...I would recommend them highly coz they will make your remarkable moments into reality which you will never forget....</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=clearfix>
                <h2 class=small-heading>OUR FUN FACTS</h2>
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=row>
                        <div class="col-xs-12 col-md-4 services">
                            <div class=facts>
                                <div class=facts-overlay><i class="fa fa-3x fa-calendar"></i>
                                    <p class=count>74
                                        <p class=text-capitalize>Events</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 services">
                            <div class=facts>
                                <div class=facts-overlay><i class="fa fa-3x fa-user"></i>
                                    <p class=count>321
                                        <p class=text-capitalize>Happy Customers</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 services">
                            <div class=facts>
                                <div class=facts-overlay><i class="fa fa-3x fa-cubes"></i>
                                    <p class=count>35
                                        <p class=text-capitalize>More than sprojects delivered</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix full-height">
                <h2 class=small-heading>MEET THE TEAM</h2>
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=row>
                        <div class="col-xs-12 col-md-4">
                            <div class="center-block team-member-box text-center"><img src=assets/img/team_member1.jpg class=img-responsive>
                                <h4 class=text-capitalize>Dilshan A Ranasinghe</h4>
                                <p class=text-uppercase>Founder and ceo</div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="center-block team-member-box text-center"><img src=assets/img/team_member2.jpg class=img-responsive>
                                <h4 class=text-capitalize>Shehan Nimantha</h4>
                                <p class=text-uppercase>Co Founder and Photographer</div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="center-block team-member-box text-center"><img src=assets/img/team_member3.jpg class=img-responsive>
                                <h4 class=text-capitalize>
Udith Sachintha</h4>
                                <p class=text-uppercase>PHOTOGRAPHER</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix footer">
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=row>
                        <div class="col-xs-12 col-md-6 col-sm-12">
                            <p class=copyright>Copyright © <?php echo date("Y");?> <a href=#> KABONI.lk</a></div>
                        <div class="col-xs-12 col-md-6 col-sm-12">
                            <p class=author>Created By <a href=https://themewagon.com/ target=_blank>Team 16</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid page service-page" id=service>
    <div class=row>
        <div class="hidden-xs col-md-3 hidden-sm image-container">
            <div class=mask></div>
            <div class=main-heading>
                <h1>Service</h1></div>
        </div>
        <div class="col-md-9 col-sm-12 content-container">
            <div class=clearfix>
                <h2 class=small-heading>WHAT WE DO BEST</h2>
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=row>
                        <div class="col-md-4 col-sm-12">
                            <div class=faq-desc-item>
                                <div class="text-center flip-container">
                                    <div class="flipper front"><i class="fa fa-mobile"></i>
                                        <h5>Applications</h5></div>
                                    <div class="flipper back">
                                        <h5>Applications</h5>
                                        <p>Mozilla Web Developer, MooTools & jQuery Consultant, MooTools Core Developer, Javascript Fanatic, CSS Tinkerer, PHP Hacker, and web lover.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class=faq-desc-item>
                                <div class="text-center flip-container">
                                    <div class="flipper front"><i class="fa fa-lightbulb-o"></i>
                                        <h5>Productions</h5></div>
                                    <div class="flipper back">
                                        <h5>Productions</h5>
                                        <p>Mozilla Web Developer, MooTools & jQuery Consultant, MooTools Core Developer, Javascript Fanatic, CSS Tinkerer, PHP Hacker, and web lover.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class=faq-desc-item>
                                <div class="text-center flip-container" ontouchstart='this.classList.toggle("hover")'>
                                    <div class="flipper front"><i class="fa fa-paint-brush"></i>
                                        <h5>Web Designing</h5></div>
                                    <div class="flipper back">
                                        <h5>Web Designing</h5>
                                        <p>Mozilla Web Developer, MooTools & jQuery Consultant, MooTools Core Developer, Javascript Fanatic, CSS Tinkerer, PHP Hacker, and web lover.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=clearfix>
                <h2 class=small-heading>CHOSSE YOUR PLAN</h2>
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=row>
                       
                       
                            <?php  
            $query="SELECT * FROM packages";
            $result=mysqli_query($connect,$query);
            while($row=mysqli_fetch_assoc($result)){

            ?>
                        <div class="col-xs-12 col-md-6 col-sm-6 price-catagory">
                            <div class=price-box>
                                <p class=pricing-catagory-name><?php echo  $row['pac_name']; ?>
                                    <p><span class=price>Rs.<?php echo  $row['price']; ?></span>/Month
                                            <ul>
                            <?php 
                $myString = $row['description'];
                $myArray = explode(',', $myString);
                foreach($myArray as $my_Array){
                    echo "<li>".$my_Array. "</li>";
                }?>

                        </ul><a href=# class=btn>Order Now</a></div>
                        </div> <?php } ?>
      
            
            
               
                    </div>
                </div>
            </div>
            <div class="clearfix full-height">
                <h2 class=small-heading>OUR VALUABLE CLIENTS</h2>
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="owl-carousel owl-theme" id=sponsor-list>
                        <div class=item><img src=assets/img/sponsor1.png alt=sponsor1 class=center-block style=width:165px;height:127px></div>
                        <div class=item><img src=assets/img/sponsor2.png alt=sponsor2 class=center-block style=width:165px;height:127px></div>
                        <div class=item><img src=assets/img/sponsor3.png alt=sponsor3 class=center-block style=width:165px;height:127px></div>
                        <div class=item><img src=assets/img/sponsor4.png alt=sponsor4 class=center-block style=width:165px;height:127px></div>
                        <div class=item><img src=assets/img/sponsor5.png alt=sponsor5 class=center-block style=width:165px;height:127px></div>
                        <div class=item><img src=assets/img/sponsor6.png alt=sponsor6 class=center-block style=width:165px;height:127px></div>
                    </div>
                </div>
            </div>
            <div class="clearfix footer">
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=row>
                        <div class="col-xs-12 col-md-6 col-sm-12">
                            <p class=copyright>Copyright © 2015 <a href=#> KABONI.lk</a></div>
                        <div class="col-xs-12 col-md-6 col-sm-12">
                            <p class=author>Created By <a href=https://themewagon.com/ target=_blank>Team 16</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid page portfolio-page" id=portfolio>
    <div class=row>
        <div class="hidden-xs col-md-3 hidden-sm image-container">
            <div class=mask></div>
            <div class=main-heading>
                <h1>Portfolio</h1></div>
        </div>
        <div class="col-md-9 col-sm-12 content-container">
            <div class="clearfix full-height portfolio">
                <h2 class=small-heading>PORTFOLIO</h2>
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=project-container>
                        <div class=row>
                            <div class=project-controls>
                                <button class=filter data-filter=all>All</button>
                                <button class=filter data-filter=.graphic-design>Graphic Design</button>
                                <button class=filter data-filter=.web-design>Web Designs</button>
                                <button class=filter data-filter=.app-development>App Development</button>
                            </div>
                            <div class="clearfix projet-items" id=projects>
                                <div class="col-md-6 col-lg-4 col-sm-4 col-xs-6 mix graphic-design">
                                    <div class=project>
                                        <a href=#portfolio-1 class=open-popup-link><img src=assets/img/portfolio/thumbs/image_1.jpg alt="">
                                            <div class=ovrly></div>
                                            <div class=img-hover>
                                                <div class=c-table>
                                                    <div class=ct-cell><i class="fa fa-search-plus" aria-hidden=true></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class=mfp-hide id=portfolio-1>
                                    <div class=container>
                                        <div class=row>
                                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                <div class=popup-content><img src=assets/img/portfolio/image_1.jpg alt="" class=img-responsive>
                                                    <h3>PROJECT NAME</h3>
                                                    <p>Quisque in tempor sapien, et cursus neque. Nunc pulvinar diam ac dapibus mollis. Etiam id iaculis lorem. Donec bibendum volutpat ante, eu consequat nisi suscipit at. Etiam interdum augue dolor, id auctor felis volutpat sed. Phasellus id ex ultrices, tempus leo eget, volutpat diam. In sit amet magna faucibus, molestie nisi in, hendrerit libero. Morbi auctor velit sagittis, elementum lorem eget, imperdiet nisl.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-sm-4 col-xs-6 mix web-design">
                                    <div class=project>
                                        <a href=#portfolio-2 class=open-popup-link><img src=assets/img/portfolio/thumbs/image_2.jpg alt="">
                                            <div class=ovrly></div>
                                            <div class=img-hover>
                                                <div class=c-table>
                                                    <div class=ct-cell><i class="fa fa-search-plus" aria-hidden=true></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class=mfp-hide id=portfolio-2>
                                    <div class=container>
                                        <div class=row>
                                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                <div class=popup-content><img src=assets/img/portfolio/image_2.jpg alt="" class=img-responsive>
                                                    <h3>PROJECT NAME</h3>
                                                    <p>Quisque in tempor sapien, et cursus neque. Nunc pulvinar diam ac dapibus mollis. Etiam id iaculis lorem. Donec bibendum volutpat ante, eu consequat nisi suscipit at. Etiam interdum augue dolor, id auctor felis volutpat sed. Phasellus id ex ultrices, tempus leo eget, volutpat diam. In sit amet magna faucibus, molestie nisi in, hendrerit libero. Morbi auctor velit sagittis, elementum lorem eget, imperdiet nisl.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-sm-4 col-xs-6 mix app-development">
                                    <div class=project>
                                        <a href=#portfolio-3 class=open-popup-link><img src=assets/img/portfolio/thumbs/image_3.jpg alt="">
                                            <div class=ovrly></div>
                                            <div class=img-hover>
                                                <div class=c-table>
                                                    <div class=ct-cell><i class="fa fa-search-plus" aria-hidden=true></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class=mfp-hide id=portfolio-3>
                                    <div class=container>
                                        <div class=row>
                                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                <div class=popup-content><img src=assets/img/portfolio/image_3.jpg alt="" class=img-responsive>
                                                    <h3>PROJECT NAME</h3>
                                                    <p>Quisque in tempor sapien, et cursus neque. Nunc pulvinar diam ac dapibus mollis. Etiam id iaculis lorem. Donec bibendum volutpat ante, eu consequat nisi suscipit at. Etiam interdum augue dolor, id auctor felis volutpat sed. Phasellus id ex ultrices, tempus leo eget, volutpat diam. In sit amet magna faucibus, molestie nisi in, hendrerit libero. Morbi auctor velit sagittis, elementum lorem eget, imperdiet nisl.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-sm-4 col-xs-6 mix graphic-design">
                                    <div class=project>
                                        <a href=#portfolio-4 class=open-popup-link><img src=assets/img/portfolio/thumbs/image_4.jpg alt="">
                                            <div class=ovrly></div>
                                            <div class=img-hover>
                                                <div class=c-table>
                                                    <div class=ct-cell><i class="fa fa-search-plus" aria-hidden=true></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class=mfp-hide id=portfolio-4>
                                    <div class=container>
                                        <div class=row>
                                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                <div class=popup-content><img src=assets/img/portfolio/image_4.jpg alt="" class=img-responsive>
                                                    <h3>PROJECT NAME</h3>
                                                    <p>Quisque in tempor sapien, et cursus neque. Nunc pulvinar diam ac dapibus mollis. Etiam id iaculis lorem. Donec bibendum volutpat ante, eu consequat nisi suscipit at. Etiam interdum augue dolor, id auctor felis volutpat sed. Phasellus id ex ultrices, tempus leo eget, volutpat diam. In sit amet magna faucibus, molestie nisi in, hendrerit libero. Morbi auctor velit sagittis, elementum lorem eget, imperdiet nisl.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-sm-4 col-xs-6 mix web-design">
                                    <div class=project>
                                        <a href=#portfolio-5 class=open-popup-link><img src=assets/img/portfolio/thumbs/image_5.jpg alt="">
                                            <div class=ovrly></div>
                                            <div class=img-hover>
                                                <div class=c-table>
                                                    <div class=ct-cell><i class="fa fa-search-plus" aria-hidden=true></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class=mfp-hide id=portfolio-5>
                                    <div class=container>
                                        <div class=row>
                                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                <div class=popup-content><img src=assets/img/portfolio/image_5.jpg alt="" class=img-responsive>
                                                    <h3>PROJECT NAME</h3>
                                                    <p>Quisque in tempor sapien, et cursus neque. Nunc pulvinar diam ac dapibus mollis. Etiam id iaculis lorem. Donec bibendum volutpat ante, eu consequat nisi suscipit at. Etiam interdum augue dolor, id auctor felis volutpat sed. Phasellus id ex ultrices, tempus leo eget, volutpat diam. In sit amet magna faucibus, molestie nisi in, hendrerit libero. Morbi auctor velit sagittis, elementum lorem eget, imperdiet nisl.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-sm-4 col-xs-6 mix app-development">
                                    <div class=project>
                                        <a href=#portfolio-6 class=open-popup-link><img src=assets/img/portfolio/thumbs/image_6.jpg alt="">
                                            <div class=ovrly></div>
                                            <div class=img-hover>
                                                <div class=c-table>
                                                    <div class=ct-cell><i class="fa fa-search-plus" aria-hidden=true></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class=mfp-hide id=portfolio-6>
                                    <div class=container>
                                        <div class=row>
                                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                <div class=popup-content><img src=assets/img/portfolio/image_6.jpg alt="" class=img-responsive>
                                                    <h3>PROJECT NAME</h3>
                                                    <p>Quisque in tempor sapien, et cursus neque. Nunc pulvinar diam ac dapibus mollis. Etiam id iaculis lorem. Donec bibendum volutpat ante, eu consequat nisi suscipit at. Etiam interdum augue dolor, id auctor felis volutpat sed. Phasellus id ex ultrices, tempus leo eget, volutpat diam. In sit amet magna faucibus, molestie nisi in, hendrerit libero. Morbi auctor velit sagittis, elementum lorem eget, imperdiet nisl.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-sm-4 col-xs-6 mix web-design">
                                    <div class=project>
                                        <a href=#portfolio-7 class=open-popup-link><img src=assets/img/portfolio/thumbs/image_7.jpg alt="">
                                            <div class=ovrly></div>
                                            <div class=img-hover>
                                                <div class=c-table>
                                                    <div class=ct-cell><i class="fa fa-search-plus" aria-hidden=true></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class=mfp-hide id=portfolio-7>
                                    <div class=container>
                                        <div class=row>
                                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                <div class=popup-content><img src=assets/img/portfolio/image_7.jpg alt="" class=img-responsive>
                                                    <h3>PROJECT NAME</h3>
                                                    <p>Quisque in tempor sapien, et cursus neque. Nunc pulvinar diam ac dapibus mollis. Etiam id iaculis lorem. Donec bibendum volutpat ante, eu consequat nisi suscipit at. Etiam interdum augue dolor, id auctor felis volutpat sed. Phasellus id ex ultrices, tempus leo eget, volutpat diam. In sit amet magna faucibus, molestie nisi in, hendrerit libero. Morbi auctor velit sagittis, elementum lorem eget, imperdiet nisl.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-sm-4 col-xs-6 mix graphic-design">
                                    <div class=project>
                                        <a href=#portfolio-8 class=open-popup-link><img src=assets/img/portfolio/thumbs/image_8.jpg alt="">
                                            <div class=ovrly></div>
                                            <div class=img-hover>
                                                <div class=c-table>
                                                    <div class=ct-cell><i class="fa fa-search-plus" aria-hidden=true></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class=mfp-hide id=portfolio-8>
                                    <div class=container>
                                        <div class=row>
                                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                <div class=popup-content><img src=assets/img/portfolio/image_8.jpg alt="" class=img-responsive>
                                                    <h3>PROJECT NAME</h3>
                                                    <p>Quisque in tempor sapien, et cursus neque. Nunc pulvinar diam ac dapibus mollis. Etiam id iaculis lorem. Donec bibendum volutpat ante, eu consequat nisi suscipit at. Etiam interdum augue dolor, id auctor felis volutpat sed. Phasellus id ex ultrices, tempus leo eget, volutpat diam. In sit amet magna faucibus, molestie nisi in, hendrerit libero. Morbi auctor velit sagittis, elementum lorem eget, imperdiet nisl.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-sm-4 col-xs-6 mix app-development">
                                    <div class=project>
                                        <a href=#portfolio-9 class=open-popup-link><img src=assets/img/portfolio/thumbs/image_9.jpg alt="">
                                            <div class=ovrly></div>
                                            <div class=img-hover>
                                                <div class=c-table>
                                                    <div class=ct-cell><i class="fa fa-search-plus" aria-hidden=true></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class=mfp-hide id=portfolio-9>
                                    <div class=container>
                                        <div class=row>
                                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                <div class=popup-content><img src=assets/img/portfolio/image_9.jpg alt="" class=img-responsive>
                                                    <h3>PROJECT NAME</h3>
                                                    <p>Quisque in tempor sapien, et cursus neque. Nunc pulvinar diam ac dapibus mollis. Etiam id iaculis lorem. Donec bibendum volutpat ante, eu consequat nisi suscipit at. Etiam interdum augue dolor, id auctor felis volutpat sed. Phasellus id ex ultrices, tempus leo eget, volutpat diam. In sit amet magna faucibus, molestie nisi in, hendrerit libero. Morbi auctor velit sagittis, elementum lorem eget, imperdiet nisl.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-sm-4 col-xs-6 mix web-design">
                                    <div class=project>
                                        <a href=#portfolio-10 class=open-popup-link><img src=assets/img/portfolio/thumbs/image_10.jpg alt="">
                                            <div class=ovrly></div>
                                            <div class=img-hover>
                                                <div class=c-table>
                                                    <div class=ct-cell><i class="fa fa-search-plus" aria-hidden=true></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class=mfp-hide id=portfolio-10>
                                    <div class=container>
                                        <div class=row>
                                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                <div class=popup-content><img src=assets/img/portfolio/image_10.jpg alt="" class=img-responsive>
                                                    <h3>PROJECT NAME</h3>
                                                    <p>Quisque in tempor sapien, et cursus neque. Nunc pulvinar diam ac dapibus mollis. Etiam id iaculis lorem. Donec bibendum volutpat ante, eu consequat nisi suscipit at. Etiam interdum augue dolor, id auctor felis volutpat sed. Phasellus id ex ultrices, tempus leo eget, volutpat diam. In sit amet magna faucibus, molestie nisi in, hendrerit libero. Morbi auctor velit sagittis, elementum lorem eget, imperdiet nisl.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix footer">
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=row>
                        <div class="col-xs-12 col-md-6 col-sm-12">
                            <p class=copyright>Copyright ©  <?php echo date("Y");?> <a href=#> KABONI.lk</a></div>
                        <div class="col-xs-12 col-md-6 col-sm-12">
                            <p class=author>Created By <a href=https://themewagon.com/ target=_blank>Team 16</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid page gallery-page" id=gallery>
    <div class=row>
        <div class="hidden-xs col-md-3 hidden-sm image-container">
            <div class=mask></div>
            <div class=main-heading>
                <h1>Gallery</h1></div>
        </div>
        <div class="col-md-9 col-sm-12 content-container">
            <div class=clearfix>
                <h2 class=small-heading>WE IN IMAGES</h2>
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=row>
                        <div class=pop-up-gallery>
                                   <?php
            $query="Select * from gallery";
            $result=mysqli_query($connect,$query); 
             while($row=mysqli_fetch_assoc($result)){
                 $pimage=$row['Image'];
                
                ?>
                            <div class="col-xs-12 col-md-4">
                                <a href=assets/img/gallery/<?php echo $pimage ?> class=popup_gallery><img src=assets/img/gallery/thumb/<?php echo $pimage ?> alt="Image 1" class="img-responsive center-block"></a>
                            </div>  <?php }?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix footer">
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=row>
                        <div class="col-xs-12 col-md-6 col-sm-12">
                            <p class=copyright>Copyright ©  <?php echo date("Y");?> <a href=#> KABONI.lk</a></div>
                        <div class="col-xs-12 col-md-6 col-sm-12">
                            <p class=author>Created By <a href=https://themewagon.com/ target=_blank>Team 16</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid page faq-page" id=faq>
 <?php if(id=='faq'){ ?>
  <script type="text/javascript">location.href = './Blog';</script>  <?php } ?>
</div>
<div class="container-fluid page contact-page" id=contact>
    <div class=row>
        <div class="hidden-xs col-md-3 hidden-sm image-container">
            <div class=mask></div>
            <div class=main-heading>
                <h1>contact</h1></div>
        </div>
        <div class="col-md-9 col-sm-12 content-container">
            <div class="clearfix full-height">
                <h2 class=small-heading>COME IN TOUCH</h2>

                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=contact-info>
                        <div class=row>
                            <div class=col-md-6>
                                <div class=data><i class="fa fa-map-marker"></i> <span>Waththegedra
<br>Maharagama, Sri Lanka<br></span></div>
                                <div class=data><i class="fa fa-envelope"></i> <span>m.me/kaboniproduction</span></div>
                                <div class=data><i class="fa fa-phone"></i> <span>071 282 2820</span></div>
                            </div>
                            <div class=col-md-6>
                                <div id=map-canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class=contact-form>
                        <div class=row>
                            <form action="./contact.php" method="POST" id="form1">

                                <div class="col-md-6 col-sm-6">
                                    <div class=form-group>
                                        <input class=form-control id=name name=name placeholder="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class=form-group>
                                        <input class=form-control id=email name=email placeholder="email" required type=email>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class=form-group>
                                        <textarea class=form-control id=message name=message placeholder="message" required rows=5 type=text></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                   <button class="btn btn-danger" type=submit name='contact'>Contact us</button>
                                   </div>
                                <div class="col-xs-12 col-md-8" id=contactFormResponse></div>
                              

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix footer">
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class=row>
                        <div class="col-xs-12 col-md-6 col-sm-12">
                            <p class=copyright>Copyright ©  <?php echo date("Y");?> <a href=index.php>KABONI.lk</a></div>
                        <div class="col-xs-12 col-md-6 col-sm-12">
                            <p class=author>Created By <a href=index.php target=_blank>Team 16</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src=assets/js/jquery-2.1.3.min.js></script>
<script src=assets/js/bootstrap.min.js></script>
<script src=assets/js/modernizr.js></script>
<script src=assets/js/jquery.easing.min.js></script>
<script src=assets/js/jquery.mixitup.min.js></script>
<script src=assets/js/jquery.magnific-popup.min.js></script>
<script src=assets/js/owl.carousel.min.js></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyDHROeb_V3gSyiBa4Yh8SSTKtx14kQ5wIA&callback=initMap" async defer></script>
<script src=assets/js/script.js></script>
<script>
    function initMap() {
        var e = {
                lat: 6.851124,
                lng:79.921305
            },
            o = new google.maps.Map(document.getElementById("map-canvas"), {
                zoom: 14,
                center: e,
                scrollwheel: !1,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
        new google.maps.Marker({
            position: e,
            map: o,
            title: "Kaboni.lk"
        })
    }
</script>
    </body>

</html>

