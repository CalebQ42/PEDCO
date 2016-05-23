<!DOCTYPE HTML>

<html>
	<head>
    <script type="text/javascript" src="menu.js"></script>
	
    <?php
	$pageID = $_GET['pageID'];
	$pageTitle = str_replace(' ', '%20', $_REQUEST['title']);



	$pageTitle = strtolower($pageTitle);
	include "sqllogin.php";
	if ($pageID == null) {
		foreach($conn->query('SELECT * FROM pages WHERE id=1') as $r) {
			$in = $r['html'];
			$title = $r['title'];
		}
	}else {
		foreach($conn->query('SELECT * FROM pages') as $r) {
		   
			if ($pageID == $r['id']){
            
            $in = $r['html'];
				$title = $r['title'];
				break;
			}
		}
		}
	echo '<title>Portage E.D.C. - '. $title . '</title>';
	?>
		<script>
            
       
				if(/Android|webOS|iPhone|iPod|BlackBerry|IEMobile/i.test(navigator.userAgent)){
				if(document.URL !="file:///G:/2%20Web%20Design/PEDCO/mobile.html")
				{
    		 
          
                
                    window.location = "mobile.php?pageID=1";
				}
				}

		</script>
	
		
			<!-- Add Favicon -->
				<link rel="shortcut icon" href="img/Favicon Files/favicon.png" type="image/x-icon" />
				
			<!--CSS3 MediaQuery - seperate css stylesheets for responsive design -->
				<link rel="stylesheet" type="text/css" media="only screen and (min-width:1156px)" href="css/screen_layout_max.css" />
				<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:1155px)" href="css/screen_layout_medium.css" />

			<!-- Chrome, Firefox, Opera -->
				<meta name="theme-color" content="#E33232">
			<!-- Windows Phone -->
				<meta name="msapplication-navbutton-color" content="#E33232">
			<!-- Safari -->
				<meta name="apple-mobile-web-app-status-bar-style" content="#E33232">
			
			<!--[if lt IE 9]-->
				<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"> </script>
			<!--[endif]-->
<link href="slideshow.css" rel="stylesheet" type"text/css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>
    $(function() {

    		$("#slideshow > div:gt(0)").hide();

			setInterval(function() {
			  $('#slideshow > div:first')
			    .fadeOut(1000)
			    .next()
			    .fadeIn(1000)
			    .end()
			    .appendTo('#slideshow');
			},  3000);

		});

</script>


	</head>
	<body>
		
		<div class="div2">
		
<div class="navend"></div>
				
				<div id="wrapper">			
					<img src="img/picture5.jpg" width="100%" class="div1-header" />		
				</div>
			
			<fieldset class="fieldset2">
			
				<nav id="nav-nav">
						           
<?php
$c = 0;
echo '<ul id="menu">';
echo '<li><a href="index.php">Home</a></li>';
foreach($conn->query('SELECT * FROM categories') as $m) {

   echo '<li><a href="#" onmouseover="mopen(\'divi' . $c . '\')" onmouseout="mclosetime()">' . $m[name] . '</a>';
    echo '<div id="divi' . $c . '" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">';
    $c++;
foreach($conn->query('SELECT * FROM pages WHERE category=' . $m[id] ) as $r) {
    //$newString = str_replace(' ', '%20', $r[title]);

    echo '<a href="index.php?pageID=' . $r[id] . '">' . $r[title] . '</a>'; 
}
echo '</div></li>';  

}
echo '</ul>';
?>
                      
   
				</nav>
			<!--	<div class="navcurl"></div> !-->
            
		
					<div class="backgroundimageoverlaydiv">
					
						<div class="div1-1-1">
							<h1 class="div1-1-1header">City of Portage</p>
							<p class="div1-1-1text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						</div>
						
						<div class="div1-1-2">
							<img class="div1-1-2img" src="img/logo.png" />
							<img class="div1-1-2imgtext" src="img/logotext.png" />
						</div>

					</div>
					
				</div>

			</fieldset>
		</div>
		
		<div class="div3">
			<fieldset class="fieldset3" id="bod">
            <center>
		
				<?php
					$split = explode("\n",$in);
					$count = count($split);
					for ($i = 0;$i<$count;$i++){
						$split[$i] = escapeshellarg($split[$i]);
					}
					$toOut = implode($split," ");
					echo shell_exec("./Convert -p ".$toOut);
				?>
				</center>
			</fieldset>
		</div>
        <div id="slideshow">
   <div>
   <center>Gold Members</center>
 <img id="goldy" src="Pictures/Centier.jpg"/>  <img id="gold" src="Pictures/St Mary for web.jpg"/>   

   </div>
   <div>
   <center>Gold Members</center>
    <img id="gold" src="Pictures/Horizon Bank Logo.jpg"/>  <img id="gold" src="Pictures/logo.gif"/>  
    </div>
    
    <div>
    <center>Silver Members</center>
        
   <p><img id="silv" src="Pictures/The Ross Group.jpg"/>  <img id="silv" src="Pictures/MonoSol, LLC.jpg"/> <img id="silv" src="Pictures/Meridian Title.jpg"/> </p>

   </div>
   <div>
    <center>Silver Members</center>
   <p><img id="silv" src="Pictures/IN AM Water.jpg"/>  <img id="silv" src="Pictures/Main Source.jpg"/> <img id="silv" src="Pictures/NLMK Indiana.jpg"/> </p>

   </div>
   <div>
    <center>Silver Members</center>
   <p><img id="silv" src="Pictures/IN AM Water.jpg"/>  <img id="silv" src="Pictures/Main Source.jpg"/> <img id="silv" src="Pictures/NLMK Indiana.jpg"/> </p>

   </div>

</div>
        
        
	</body>
</html>