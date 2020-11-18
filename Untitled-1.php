<?php

try {

	$db="Stages_db";
	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	
	$query = new MongoDB\Driver\Query(array('ID' =>5)); 

	
$res=$mng->executeQuery("Stages_db.utilisateurs", $query);
$utilisateur=iterator_to_array($res);

//var_dump($utilisateur);
//echo '<pre>' , var_dump($utilisateur) , '</pre>';
$stages=array($utilisateur[0]->stage);

$stages_var=$stages[0];
//echo '<pre>' , var_dump($stages_var) , '</pre>';
$count_s=0;
if(is_array($stages_var)){
$count_s=sizeof($stages_var);
echo "couuuuuuuunt".$count_s;

}
else{
	$count_s=1;
	echo "couuuuuuuunt".$count_s;
}
$s1=array($stages_var);
 
$s=json_encode(json_encode($stages_var),true);
//var_dump($s);
echo '<pre>' , var_dump($stages_var) , '</pre>';

/*
$stages=$stages_var[0];
$array = json_decode(json_encode($stages),true);*/

//echo '<pre>' , var_dump($array) , '</pre>';

$professions=array($utilisateur[0]->profession);

$professions_var=$professions[0];
echo '<pre>' , var_dump($professions_var) , '</pre>';

//$s1=$stages_var;
//$s1=array(json_encode($stages_var,true));//khdama pour size=1


$s1=array(json_encode($stages_var));

if(is_array($s1))
echo sizeof($s1);
//$s1=json_encode((json_encode($stages_var[0],true)));
echo "yeeees its an array";
$stage=json_decode(json_encode($stages_var[0],true));

echo '<pre>' , var_dump($stage), '</pre>';
echo '<pre>' , var_dump($stage->titre) , '</pre>';


} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);
    
    echo "The $filename script has experienced an error.\n"; 
    echo "It failed with the following exception:\n";
    
    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";       
}





















/*



//extration des données
$données=simplexml_load_file('db/file1.xml');
$utilisateur=$données->xpath("//utilisateur[@ID='1']");
$stages = $données->xpath("//utilisateur[@ID='1']/stage");
$professions = $données->xpath("//utilisateur[@ID='1']/profession");



//suppression de profession par ID

function removeprofession($id_exp) { 
	echo $id_exp.'heeeeeeey';

	$dom = new DOMDocument();
	$dom->formatOutput = true;
	$dom->preserveWhiteSpace = false;
	$dom->load("db/file1.xml");
	$xpath = new DOMXPath($dom);
	$query = "//utilisateur[@ID='1']/profession[@ID='".$id_exp."']";

	$nodes = $xpath->query($query);
	$node = $nodes[0];
	$node->parentNode->removeChild($node);
	$dom->save("db/file1.xml", LIBXML_NOEMPTYTAG);
	
    header("Refresh: '1';url='profil.php'");
}
//suppression de stage par ID
function removestage($id_exp) { 
	//echo $id_exp;

	$dom = new DOMDocument();
	$dom->formatOutput = true;
	$dom->preserveWhiteSpace = false;
	$dom->load("db/file1.xml");
	$xpath = new DOMXPath($dom);
	$query = "//utilisateur[@ID='1']/stage[@ID='".$id_exp."']";
	$nodes = $xpath->query($query);
	$node = $nodes[0];
	$node->parentNode->removeChild($node);
	$dom->save("db/file1.xml", LIBXML_NOEMPTYTAG);
	
    header("Refresh: '1';url='profil.php'");
}

if (isset($_GET['removep'])) { 
	
	return removeprofession($_GET['removep']);
}
	
	if (isset($_GET['removes'])) { 
	
		return removestage($_GET['removes']);
		
	}

	//enregistrer l'image choisie dans le repertoire
	
	if (isset($_FILES['imageprofil'])) { 
	
		$uploaddir = 'images/users/users_';
	$uploadfile = $uploaddir . basename($_FILES['imageprofil']['name']);
	$dom = new DOMDocument();
	$dom->formatOutput = true;
	$dom->preserveWhiteSpace = false;
	$dom->load("db/file1.xml");
	$xpath = new DOMXPath($dom);
	$query = "//utilisateur[@ID='1']/photo";
	$nodes = $xpath->query($query);
	for($i = 0; $i < $nodes->length; $i++) {
		
				$nodes->item($i)->nodeValue = $uploaddir . basename($_FILES['imageprofil']['name']);;
			
	}
	$dom->save("db/file1.xml", LIBXML_NOEMPTYTAG);
		if (move_uploaded_file($_FILES['imageprofil']['tmp_name'], $uploadfile)) {
	 // echo "File is valid, and was successfully uploaded.\n";
	} else {
	   echo "Upload failed";
	}

		
	}
	

	//modifier le chemin de la photo 
	
	

*/
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Winku Social Network Toolkit</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<script>
  async function removeprofession(e,id_exp) {
    e.preventDefault(); 
	document.body.innerHTML+= '<br>'+ await(await fetch('?removep='+id_exp)).text();
	
  
  }
  async function removestage(e,id_exp) {
    e.preventDefault(); 
    document.body.innerHTML+= '<br>'+ await(await fetch('?removes='+id_exp)).text();
  }
  </script>
<div class="theme-layout">
	
	<div class="responsive-header">
		<div class="mh-head first Sticky">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
			<span class="mh-text">
				<a href="newsfeed.html" title="">IRSISI-STAGES</a>
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
		<nav id="menu" class="res-menu">
			<ul>
				<li><span><a href="index.php" title="">Acceuil</a> </span></li>
				<li><span><a href="index.php" title="">Entreprises</a> </span></li>
				<li><span><a href="index.php" title="">Stages</a> </span></li>
				</li>
				
				
			
			

				<li><span>Portfolio</span>
					<ul>
						<li><a href="portfolio-2colm.html" title="">Portfolio 2col</a></li>
						<li><a href="portfolio-3colm.html" title="">Portfolio 3col</a></li>
						<li><a href="portfolio-4colm.html" title="">Portfolio 4col</a></li>
					</ul>
				</li>
				<li><span>Support & Help</span>
					<ul>
						<li><a href="support-and-help.html" title="">Support & Help</a></li>
						<li><a href="support-and-help-detail.html" title="">Support & Help Detail</a></li>
						<li><a href="support-and-help-search-result.html" title="">Support & Help Search Result</a></li>
					</ul>
				</li>
				<li><span>More pages</span>
					<ul>
						<li><a href="careers.html" title="">Careers</a></li>
						<li><a href="career-detail.html" title="">Career Detail</a></li>
						<li><a href="404.html" title="">404 error page</a></li>
						<li><a href="404-2.html" title="">404 Style2</a></li>
						<li><a href="faq.html" title="">faq's page</a></li>
						<li><a href="insights.html" title="">insights</a></li>
						<li><a href="knowledge-base.html" title="">knowledge base</a></li>
					</ul>
				</li>
				<li><a href="about.html" title="">about</a></li>
				<li><a href="about-company.html" title="">About Us2</a></li>
				<li><a href="contact.html" title="">contact</a></li>
				<li><a href="contact-branches.html" title="">Contact Us2</a></li>
				<li><a href="widgets.html" title="">Widgts</a></li>
			</ul>
		</nav>
		<nav id="shoppingbag">
			<div>
				<div class="">
					<form method="post">
						<div class="setting-row">
							<span>use night mode</span>
							<input type="checkbox" id="nightmode"/> 
							<label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Notifications</span>
							<input type="checkbox" id="switch2"/> 
							<label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Notification sound</span>
							<input type="checkbox" id="switch3"/> 
							<label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>My profile</span>
							<input type="checkbox" id="switch4"/> 
							<label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Show profile</span>
							<input type="checkbox" id="switch5"/> 
							<label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
						</div>
					</form>
					<h4 class="panel-title">Account Setting</h4>
					<form method="post">
						<div class="setting-row">
							<span>Sub users</span>
							<input type="checkbox" id="switch6" /> 
							<label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>personal account</span>
							<input type="checkbox" id="switch7" /> 
							<label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Business account</span>
							<input type="checkbox" id="switch8" /> 
							<label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Show me online</span>
							<input type="checkbox" id="switch9" /> 
							<label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Delete history</span>
							<input type="checkbox" id="switch10" /> 
							<label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Expose author name</span>
							<input type="checkbox" id="switch11" /> 
							<label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
						</div>
					</form>
				</div>
			</div>
		</nav>
	</div><!-- responsive header -->
	
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
					<a href="#" title="">Profil</a>
				
				</li>
				
			</ul>
				
			
				
			
			<span class="ti-menu main-menu" data-ripple=""></span>
		</div>
	</div><!-- topbar -->
	
	<section>
			<div class="feature-photo">
				<figure><img src="images/resources/couverture.jpg"  style="height: 350px;" alt=""></figure>
				<div class="add-btn" style="margin-right: 17%;">
					
					<a href="ajout-profession.html" title="" data-ripple="" style="background-color: white;color: #088dcd;">Ajouter une nouvelle profession </a>
				</div>
				<div class="add-btn" >
					
					<a href="ajout-stage.html" title="" data-ripple="">Ajouter un nouveau stage </a>
				</div>
				
				
				<div class="container-fluid">
					<div class="row merged">
						<div class="col-lg-2 col-sm-3">
							<div class="user-avatar">
								<figure>
									<img src="<?php foreach($utilisateur as $u) {
										// echo $u->photo ;
									} ?>" alt="">
									<form class="edit-phto" action="" method="post" enctype="multipart/form-data">
										<i class="fa fa-camera-retro"></i>
										<label class="fileContainer">
                                        Choisissez une autre 
										<input type="file" name='imageprofil' />
										</label>
										<input type="submit" value="Valider"/>

									</form>
								</figure>
							</div>
						</div>
						<div class="col-lg-10 col-sm-9" style="padding-top:1%">
							<div class="timeline-info" style="padding-left:0%">
								<ul>
									<li class="admin-name" >
									 
									<?php foreach($utilisateur as $u) { ?>
												<a title="" href="#"></a>
									<h5><?php echo $u->prenom  ?>  <?php echo $u->nom ?></h5>	
									<?php } ?>
									 
									</li>
									<li class="admin-name" style="margin-left:30%;">
									
									<?php foreach($utilisateur as $u) { ?>
												<a title="" href="#"></a>
									<h5><?php echo $u->titre  ?> </h5> <?php } ?>
									  </li>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- top area -->

	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">
									<!-- recent photos-->
									<div class="widget stick-widget">
										<h4 class="widget-title">Informations</h4>
										<ul class="naves" style="padding:3%">
											<li>
												<i class="ti-email"></i>
												<?php foreach($utilisateur as $u) { ?>
												<a title="" href="#"><?php echo $u->adresseEmail ?></a>
												
												<?php } ?>
											</li>

											<li>
											   <i class="ti-mobile"></i>
												<?php foreach($utilisateur as $u) { ?>
												<a title="" href="#"><?php echo $u->tel ?></a>
												
												<?php } ?>
											</li>
											
											<li>
											   <i class="ti-map-alt"></i>
												<?php foreach($utilisateur as $u) { ?>
												<a title="" href="#"><?php echo $u->adresse ?></a>
												
												<?php } ?>
											</li>

											
											
											
										</ul>
									</div>										
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-8">
								<div class="central-meta">
									<div class="editing-interest">
										<h5 class="f-title"><i class="ti-files"></i>Experiences Professionnelles </h5>
										<div class="notification-box">
											<ul>

											<?php 

											for ($i = 0; $i < 2; $i++) {
												
												$stage=json_decode(json_encode($stages_var[$i],true));


												?>
												<li>	
													 <figure><img src="images/resources/internship.png" style="width:40px" alt=""></figure>
													 <div class="notifi-meta">
														 <p><?php echo $stage->titre ?></p>
														 <span><?php echo $stage->dateDebut ?> jusqu'à <?php  echo $stage->dateFin?></span>
														 <p><?php echo $stage->sujet ?></p>
														 <p><?php echo $stage->description?></p>
													 </div>
													 <a href="" onclick="removestage(event,<?php echo $stages[0]['ID'] ?>)" class="deletebtn"><i class="del fa fa-close " id="deleteitems"></i></a>
												 </li>
											 <?php }
										
										 
										 ?>

										<?php 

										for ($i = 0; $i < 2; $i++) {
											
											$profession=json_decode(json_encode($professions_var[$i],true));


											?>
										   <li>	
													<figure><img src="images/resources/job.png" style="width:40px" alt=""></figure>
													<div class="notifi-meta">
														<p><?php echo $profession->titre?> </p>
														<span><?php echo $profession->dateDebut ?> jusqu'à <?php echo $profession->dateFin?></span>

													</div>
													<a href="" onclick="removeprofession(event,<?php echo $professions[0]['ID'] ?>)" class="deletebtn"><i class="del fa fa-close " id="deleteitems"></i></a>

													
												</li>
										<?php }


										?>


											

									
														
											</ul>
										</div>
									</div>
								</div>	
							</div><!-- centerl meta -->
						
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>

	<footer style="padding: 3%;">
		<div class="container" style="margin-left: -5%;">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="widget">
						
						
					</div>
				</div>
				<div class="col-lg-2 col-md-4">
					<div class="widget">
						<ul class="list-style">
							<li><i class="fa fa-facebook-square"></i> <a href="https://web.facebook.com/shopcircut/" title="">facebook</a></li>
						
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4">
					<div class="widget">
						<ul class="list-style">
							<li><i class="fa fa-twitter-square"></i><a href="https://twitter.com/login?lang=en" title="">twitter</a></li>

						
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4">
					<div class="widget">
						<ul class="list-style">
							<li><i class="fa fa-instagram"></i><a href="https://www.instagram.com/?hl=en" title="">instagram</a></li>

						
						</ul>
					</div>
				</div>
			
			
			</div>
		</div>
	</footer><!-- footer -->
	
</div>
	<div class="side-panel">
			<h4 class="panel-title">General Setting</h4>
			<form method="post">
				<div class="setting-row">
					<span>use night mode</span>
					<input type="checkbox" id="nightmode1"/> 
					<label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Notifications</span>
					<input type="checkbox" id="switch22" /> 
					<label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Notification sound</span>
					<input type="checkbox" id="switch33" /> 
					<label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>My profile</span>
					<input type="checkbox" id="switch44" /> 
					<label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Show profile</span>
					<input type="checkbox" id="switch55" /> 
					<label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
				</div>
			</form>
			<h4 class="panel-title">Account Setting</h4>
			<form method="post">
				<div class="setting-row">
					<span>Sub users</span>
					<input type="checkbox" id="switch66" /> 
					<label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>personal account</span>
					<input type="checkbox" id="switch77" /> 
					<label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Business account</span>
					<input type="checkbox" id="switch88" /> 
					<label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Show me online</span>
					<input type="checkbox" id="switch99" /> 
					<label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Delete history</span>
					<input type="checkbox" id="switch101" /> 
					<label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Expose author name</span>
					<input type="checkbox" id="switch111" /> 
					<label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
				</div>
			</form>
		</div><!-- side panel -->	
	
	<script src="js/main.min.js"></script>
	<script src="js/script.js"></script>
	

</body>	

</html>