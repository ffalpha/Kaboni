<?php include "include/db.php"?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>KABONI Blog</title>
  

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
       <style type="text/css">

    </style>

</head>

<body id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header header">
     
        <div class="header__logo ">
             
            <a class="logo" href="index.php">
               <a  href="#"><img src="images/other/logo.png"  alt="Homepage"></a>
            </a>
        </div> <!-- end header__logo -->

        <a class="header__search-trigger" href="#0"></a>
        <div class="header__search">

            <form role="search" method="POST" class="header__search-form" action="search.php">
                 <label>
                    <span class="hide-content">Search for:</span>
                    <input type="search" class="search-field" placeholder="Type Keywords" value="" name="search" title="Search for:" autocomplete="off">
                </label>
                <input type="submit" class="search-submit" name="submit">
            </form>

            <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

        </div>  <!-- end header__search -->

        <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
        <nav class="header__nav-wrap ">

            <h2 class="header__nav-heading h6" >Navigate to</h2>

            <ul class="header__nav" >
                <li class="current"><a href="index.php" title="">Home</a></li>
            
                 <?php
                    $query = "SELECT * From category";
                    $result=mysqli_query($connect,$query);
                    
                    while($row=mysqli_fetch_assoc($result)){
                        $type=$row['catname'];
                        $id=$row['catid'];
                        echo "<li class='current'> <a href='category.php?cat=$id'>{$type}</a></li>";
                    }
                        
                    ?>
               <!-- <li><a href="style-guide.html" title="">Styles</a></li>
                <li><a href="page-about.html" title="">About</a></li> -->
                <li><a href="./login/index.php" title="">Login</a></li>
            </ul> <!-- end header__nav -->

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

        </nav> <!-- end header__nav-wrap -->

    </header> <!-- s-header -->

    
          
    <!-- featured 
    ================================================== -->
    <section class="s-featured">
        <div class="row">
            <div class="col-full">

                <div class="featured-slider featured" data-aos="zoom-in">
            <?php
            $query="Select * from slider";
            $result=mysqli_query($connect,$query); 
             while($row=mysqli_fetch_assoc($result)){
                 $p_title=$row['imgcaption'];
                 $p_image=$row['img'];
                
                ?>
                    <div class="featured__slide">
                        <div class="entry">

                            <div class="entry__background" style="background-image:url('images/slider/<?php echo $p_image ?>');"></div>
                            
                            <div class="entry__content">

                                <h1><a href="index.php" title=""><?php echo $p_title ?></a></h1>
                               
                            </div> <!-- end entry__content -->
                            
                        </div> <!-- end entry -->
                    </div> <!-- end featured__slide -->

<?php }?>
                    
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div>
    </section> <!-- end s-featured -->