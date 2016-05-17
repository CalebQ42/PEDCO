<!DOCTYPE HTML>

<html>
	<head>
    <script type="text/javascript" src="menu.js"></script>
	<?php
	$pageTitle = strtolower($_REQUEST['title']);
	$pageTitle = str_replace('_', ' ', $pageTitle);
	
	include "sqllogin.php";
	if ($pageTitle == "") {
		foreach($conn->query('SELECT * FROM pages WHERE id=1') as $r) {
			$in = $r['html'];
			$title = $r['title'];
		}
	}else {
		foreach($conn->query('SELECT * FROM pages') as $r) {
			if (strtolower($r['title']) == $pageTitle) {
				$in = $r['html'];
				$title = $r['title'];
				break;
			}
		}
		}
	echo '<title>Portage E.D.C. - '. $title . '</title>';
	?>
		<script>

				if(/Android|webOS|iPhone|iPod|BlackBerry|IEMobile/i.test(navigator.userAgent))
				if(document.URL !="file:///G:/2%20Web%20Design/PEDCO/mobile.html")
				{
						window.location ="mobile.html";
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
echo '<ul class="nav-ul" id="menu">';
echo '<li class="nav-li"><a class="nav-a"href="index.php">Home</a></li>';
foreach($conn->query('SELECT * FROM categories') as $m) {

   echo '<li class="nav-li"><a class="nav-a" href="#" onmouseover="mopen(\'divi' . $c . '\')" onmouseout="mclosetime()">' . $m[name] . '</a>';
    echo '<div id="divi' . $c . '" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">';
    $c++;
foreach($conn->query('SELECT * FROM pages WHERE category=' . $m[id] ) as $r) {
    $newString = $new = str_replace(' ', '%20', $r[title]);
    echo '<a class="nav-a" href=' . $newString . '>' . $r[title] . '</a>'; 
}
echo '</div></li>';  

}
echo '</ul>';
?>
                      
                        
                        
							<!--
							<li class="nav-li">
							<a class="nav-a2" href="index.html">
								<img src="img/homeicon.png" class="littleicon2" />
								&nbsp;
							</a>
							</li>
							
							
							<li class="nav-li">
							<a class="nav-a" href="work.html">Home</a>
							</li>
							
							<li class="nav-li">
							<a class="nav-a-picture" href="projects.html">
								<img src="img/littleicon.png" class="littleicon" />
								About Portage
							</a>
							</li>
							
							<li class="nav-li">
							<a class="nav-a" href="work.html">Annual Meetings</a>
							</li>
							
							<li class="nav-li">
							<a class="nav-a" href="projects.html">Members</a>
							</li>
							
							<li class="nav-li">
							<a class="nav-a" href="contact.html">Contact Us</a>
							</li>
                          
						</ul>
                      -->    
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
	</body>
</html>