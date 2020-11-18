<?php
$doc = new DOMDocument();
$doc->load('db/entreprises.xml');

$selector = new DOMXPath($doc);
$result = $selector->query("//Entreprise");
if (isset($_POST['save'])) {

    $entreprises = simplexml_load_file('db/entreprises.xml');
    $entreprise = $entreprises->addChild('Entreprise');
    $entreprise->addChild('raisonSociale', $_POST['raisonSociale']);
    $entreprise->addChild('adresseEmail', $_POST['adresseEmail']);
    $entreprise->addChild('tel', $_POST['tel']);
    $entreprise->addChild('adresse', $_POST['adresse']);
    file_put_contents('db/entreprises.xml', $entreprises->asXML());

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
                                                    <a href="index.php" title="">Acceuill</a>
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
                                <div class="col-lg-9">
                                    <section>
                                        <div class="gap gray-bg">
                                            <div class="container-fluid">
                                                <div class="row" id="page-contents">
                                                    <div class="offset-lg-1 col-lg-10">
                                                        <div class="career-page">
                                                            <div class="post-filter-sec">
                                                                <form method="post" class="filter-form">
                                                                    <input type="post" placeholder="Search post" />
                                                                    <button><i class="ti-search"></i></button>
                                                                </form>
                                                                <div class="purify">
                                                                    <span>filter by city</span>

                                                                    <select>
                                                                        <option>City</option>
                                                                        <option>Marrakech</option>
                                                                        <option>Casablanca</option>
                                                                        <option>Safi</option>
                                                                    </select>
                                                                    <a href="#" title="">Filter</a>
                                                                    <a href="#" title="" data-toggle="modal"
                                                                        data-target="#exampleModal">ADD
                                                                    </a>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <?php

foreach ($result as $el) {
    $raisonSociale = $selector->query("raisonSociale", $el);
    $adresseEmail = $selector->query("adresseEmail", $el);
    $tel = $selector->query("tel", $el);
    $adresse = $selector->query("adresse", $el);

    $raison = $raisonSociale->item(0)->nodeValue;
    $Email = $adresseEmail->item(0)->nodeValue;
    $adress = $adresse->item(0)->nodeValue;
    $num = $tel->item(0)->nodeValue;

    ?>

                                                                <div class="col-lg-4 col-sm-6">
                                                                    <div class="open-position">
                                                                        <h4>
                                                                            <a href="#"
                                                                                title=""><?php echo $raison; ?></a>
                                                                        </h4>

                                                                        <a href="#" title=""><i
                                                                                class="fa fa-phone"></i><?php echo $num; ?></a>
                                                                        <br>
                                                                        <a href="#" title=""><i
                                                                                class="fa fa-envelope"></i><?php echo $Email; ?></a>
                                                                        <br>
                                                                        <a href="#" title=""><i
                                                                                class="fa fa-map-marker"></i><?php echo $adress; ?></a>
                                                                    </div>
                                                                </div>
                                                                <?php

}

?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </section>

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
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Raison Sociale</label>
                            <input type="text" class="form-control" style="border: 1px solid black;  box-shadow: 0 0 0 1px #4dd0e1;
" name="raisonSociale">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" style="border: 1px solid #4dd0e1;  box-shadow: 0 0 0 1px #4dd0e1;
" name="adresseEmail">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">tel</label>
                            <input type="text" class="form-control" style="border: 1px solid #4dd0e1;  box-shadow: 0 0 0 1px #4dd0e1;
" name="tel">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">adresse</label>
                            <input type="text" class="form-control" style="border: 1px solid #4dd0e1;  box-shadow: 0 0 0 1px #4dd0e1;
" name="adresse">
                        </div>
                        <button type="submit" class="btn btn-primary" name="save">Submit</button>
                    </form>
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