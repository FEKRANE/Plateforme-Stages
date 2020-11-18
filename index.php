<?php
$doc = new DOMDocument();
$doc->load('db/offres.xml');

$selector = new DOMXPath($doc);
$result = $selector->query("//offre");
if (isset($_POST['save'])) {

    $offres = simplexml_load_file('db/offres.xml');
    $offre = $offres->addChild('offre');
    $offre->addChild('description', $_POST['offreDescription']);
    $offre->addChild('date', '12-11-2020');
    $user = $offre->addChild('utilisateur');
    $user->addChild('nom', 'nom4');

// Check if image file is a actual image or fake image

    file_put_contents('db/offres.xml', $offres->asXML());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Winku Social Network Toolkit</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16" />

    <link rel="stylesheet" href="css/main.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/color.css" />
    <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">
        <div class="responsive-header">
            <div class="mh-head first Sticky">
                <span class="mh-btns-left">
                    <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
                </span>
                <span class="mh-text">
                    <a href="newsfeed.html" title=""><img src="images/logo2.png" alt="" /></a>
                </span>
                <span class="mh-btns-right">
                    <a class="fa fa-sliders" href="#shoppingbag"></a>
                </span>
            </div>
            <div class="mh-head second">
                <form class="mh-form">
                    <input placeholder="search" />
                    <a href="#/" class="fa fa-search"></a>
                </form>
            </div>
        </div>
        <!-- responsive header -->

        <div class="topbar stick" style="paddin-left:0%;">
		<div class="logo" >
			<H5  style="font-weight:600px"><a title="" href="newsfeed.html">IRISI-STAGE</a><H5>
		</div>
		
		<div class="top-area">
			<ul class="main-menu">
				<li>
					<a href="index.php" title="">Acceuil</a>
				
				</li>
				<li>
					<a href="entreprises.php" title="">Entreprises</a>
					
				</li>
				<li>
					<a href="profil.php" title="">Profil</a>
				
				</li>
				
			</ul>
				
			
				
			
			<span class="ti-menu main-menu" data-ripple=""></span>
		</div>
	</div><!-- topbar -->

        <section>
            <div class="gap gray-bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row" id="page-contents">
                                <div class="col-lg-3">
                                    <aside class="sidebar static">
                                        <div class="widget stick-widget">
                                            <h4 class="widget-title">Shortcuts</h4>
                                            <ul class="naves">
                                               

                                                <li>
                                                    <i class="ti-comments-smiley"></i>
                                                    <a href="entreprises.php" title="">Entreprise</a>
                                                </li>
                                                <li>
                                                    <i class="ti-bell"></i>
                                                    <a href="profil.php" title="">Mon Profil</a>
                                                </li>

                                               
                                                <li>
                                                    <i class="ti-power-off"></i>
                                                    <a href="landing.html" title="">Logout</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Shortcuts -->
                                    </aside>
                                </div>
                                <!-- sidebar -->
                                <div class="col-lg-6">
                                    <div class="central-meta">
                                        <div class="new-postbox">
                                            <figure>
                                                <img src="images/resources/admin2.jpg" alt="" />
                                            </figure>
                                            <div class="newpst-input">
                                                <form method="post">
                                                    <textarea rows="2" placeholder="write something"
                                                        name="offreDescription"></textarea>
                                                    <div class="attachments">
                                                        <ul>
                                                            <li>
                                                                <i class="fa fa-music"></i>
                                                                <label class="fileContainer">
                                                                    <input type="file" />
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-image"></i>
                                                                <label class="fileContainer">
                                                                    <input type="file" />
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-video-camera"></i>
                                                                <label class="fileContainer">
                                                                    <input type="file" />
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-camera"></i>
                                                                <label class="fileContainer">
                                                                    <input type="file" />
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <button type="submit" name="save">Post</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- add post new box -->
                                    <div class="loadMore">
                                        <?php

foreach ($result as $el) {
    $img = null;
    $description = null;

    $desc = $selector->query("description", $el);
    $date = $selector->query("date", $el)->item(0)->nodeValue;

    $image = $selector->query("image", $el);
    if (is_object($image->item(0))) {
        $img = $image->item(0)->nodeValue;

    }
    if (is_object($desc->item(0))) {
        $description = $desc->item(0)->nodeValue;

    }
    $n = $selector->query("utilisateur/nom", $el);

    $nom = $n->item(0)->nodeValue;

    ?>
                                        <div class="central-meta item">
                                            <div class="user-post">
                                                <div class="friend-info">
                                                    <figure>
                                                        <img src="images/resources/friend-avatar10.jpg" alt="" />
                                                    </figure>
                                                    <div class="friend-name">
                                                        <ins><a href="time-line.html"
                                                                title=""><?php echo $nom; ?></a></ins>
                                                        <span>published: <?php echo $date; ?></span>
                                                    </div>
                                                    <div class="post-meta">
                                                        <?php
echo '<img src="' . $img . '" alt="" />';

    echo '<div class="description">
                                                            <p>' . $description . '</p>
                                                        </div>';

    ?>
                                                        <div class="we-video-info">
                                                            <ul>
                                                                <li>
                                                                    <span class="views" data-toggle="tooltip"
                                                                        title="views">
                                                                        <i class="fa fa-eye"></i>
                                                                        <ins>1.2k</ins>
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    <span class="comment" data-toggle="tooltip"
                                                                        title="Comments">
                                                                        <i class="fa fa-comments-o"></i>
                                                                        <ins>52</ins>
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    <span class="like" data-toggle="tooltip"
                                                                        title="like">
                                                                        <i class="ti-heart"></i>
                                                                        <ins>2.2k</ins>
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    <span class="dislike" data-toggle="tooltip"
                                                                        title="dislike">
                                                                        <i class="ti-heart-broken"></i>
                                                                        <ins>200</ins>
                                                                    </span>
                                                                </li>
                                                                <li class="social-media">
                                                                    <div class="menu">
                                                                        <div class="btn trigger">
                                                                            <i class="fa fa-share-alt"></i>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon">
                                                                                <a href="#" title=""><i
                                                                                        class="fa fa-html5"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon">
                                                                                <a href="#" title=""><i
                                                                                        class="fa fa-facebook"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon">
                                                                                <a href="#" title=""><i
                                                                                        class="fa fa-google-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon">
                                                                                <a href="#" title=""><i
                                                                                        class="fa fa-twitter"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon">
                                                                                <a href="#" title=""><i
                                                                                        class="fa fa-css3"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon">
                                                                                <a href="#" title=""><i
                                                                                        class="fa fa-instagram"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon">
                                                                                <a href="#" title=""><i
                                                                                        class="fa fa-dribbble"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon">
                                                                                <a href="#" title=""><i
                                                                                        class="fa fa-pinterest"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> <?php

}

?>
                                    </div>
                                </div>
                                <!-- centerl meta -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="widget">
                            <div class="foot-logo">
                                <div class="logo">
                                    <a href="index-2.html" title=""><img src="images/logo.png" alt="" /></a>
                                </div>
                                <p>
                                    The trio took this simple idea and built it into the world’s
                                    leading carpooling platform.
                                </p>
                            </div>
                            <ul class="location">
                                <li>
                                    <i class="ti-map-alt"></i>
                                    <p>33 new montgomery st.750 san francisco, CA USA 94105.</p>
                                </li>
                                <li>
                                    <i class="ti-mobile"></i>
                                    <p>+1-56-346 345</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>follow</h4>
                            </div>
                            <ul class="list-style">
                                <li>
                                    <i class="fa fa-facebook-square"></i>
                                    <a href="https://web.facebook.com/shopcircut/" title="">facebook</a>
                                </li>
                                <li>
                                    <i class="fa fa-twitter-square"></i><a href="https://twitter.com/login?lang=en"
                                        title="">twitter</a>
                                </li>
                                <li>
                                    <i class="fa fa-instagram"></i><a href="https://www.instagram.com/?hl=en"
                                        title="">instagram</a>
                                </li>
                                <li>
                                    <i class="fa fa-google-plus-square"></i>
                                    <a href="https://plus.google.com/discover" title="">Google+</a>
                                </li>
                                <li>
                                    <i class="fa fa-pinterest-square"></i>
                                    <a href="https://www.pinterest.com/" title="">Pintrest</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Navigate</h4>
                            </div>
                            <ul class="list-style">
                                <li><a href="about.html" title="">about us</a></li>
                                <li><a href="contact.html" title="">contact us</a></li>
                                <li><a href="terms.html" title="">terms & Conditions</a></li>
                                <li><a href="#" title="">RSS syndication</a></li>
                                <li><a href="sitemap.html" title="">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>useful links</h4>
                            </div>
                            <ul class="list-style">
                                <li><a href="#" title="">leasing</a></li>
                                <li><a href="#" title="">submit route</a></li>
                                <li><a href="#" title="">how does it work?</a></li>
                                <li><a href="#" title="">agent listings</a></li>
                                <li><a href="#" title="">view All</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>download apps</h4>
                            </div>
                            <ul class="colla-apps">
                                <li>
                                    <a href="https://play.google.com/store?hl=en" title=""><i
                                            class="fa fa-android"></i>android</a>
                                </li>
                                <li>
                                    <a href="https://www.apple.com/lae/ios/app-store/" title=""><i
                                            class="ti-apple"></i>iPhone</a>
                                </li>
                                <li>
                                    <a href="https://www.microsoft.com/store/apps" title=""><i
                                            class="fa fa-windows"></i>Windows</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer -->
        <div class="bottombar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span class="copyright"><a target="_blank" href="https://www.templateshub.net">Templates
                                Hub</a></span>
                        <i><img src="images/credit-cards.png" alt="" /></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/map-init.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>
</body>

</html>