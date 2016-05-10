<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<?php
	echo '<title>Portage E.D.C. - '. $_REQUEST['title'] . '</title>'
	?>
	<link href="favicon.png" rel="shortcut icon" type="image/x-icon" />
	<link href="main.css" rel="stylesheet" type="text/css" />
	<style type="text/css">.auto-style1 {
    margin-bottom: 0px;
}
	</style>
</head>
<body>
<div id="blu">
<hr id="top" />
<div id="topbar"><img id="icon" src="pedco.png" /></div>

<div id="navigation"><a href="LINK">NAME</a> <a href="LINK">NAME</a> <a href="LINK">NAME</a> <a href="LINK">NAME</a> <a href="LINK">NAME</a> <a href="LINK">NAME</a></div>

<hr id="bot" /></div>
<img id="phr" src="phr.png" />
<img id="nipsco" src="NIPSCO-300x93.png" />

<div id="bod">
<p id="titlename">Portage Economic Development Corporation</p>
<p id="quote">"A Beacon of Economic Opprotunity On Lake Michigan's Southern Shore"</p></p>
<center><img src="logo.png" usemap="#logo"/>

<!--<map name="logo">
<area shape="rect" coords="60,55,225,150" title="Site Selection

Portage continues to be a “Beacon of Opportunity” on the Southern Shores of Lake Michigan and is home to major Steel Suppliers and other Heavy Manufacturing Industries at the most successful Port on the Great Lakes. Choice sites are available with existing buildings, build-to-suit, or acreage in one of our mixed-use developments. Explore our competitive incentive packages…Learn more…"/>
<area shape="rect" coords="230,55,310,150" title="Quality of Life

It’s all happening in Portage! Come enjoy the many recreational opportunities at one of our ward winning National Lakeshore beaches, explore the Dunes or launch your boat at one of our marinas. Boundless cultural activities and national sporting events are within minutes of downtown Portage…Learn more…"/>
<area shape="rect" coords="60,155,214,212" title="Transportation/Infrastructure

Portage is strategically located on the southern shores of Lake Michigan, just minutes southeast of Chicago, where the crossroads of America meet. Home to the Port of Indiana, I-80 and I-94 corridors, I-65, Indiana Toll Road, and the South Shore Rail Line…Learn more…"/>
<area shape="rect" coords="230,55,310,250" title="Wokrkforce Development

Portage Indiana is located in the heart of the Nation’s Steel Capital and offers a highly skilled workforce. Educational opportunities are limitless, from our nationally recognized Portage Township School System, including Porter County Career and Technical Education, to the numerous nearby regional college campuses…Learn more…"/>

</map>
</center>-->
<?php
$pageTitle = strtolower($_REQUEST['title']);
$pageTitle = str_replace('_', ' ', $pageTitle);
include "sqllogin.php";
if ($pageTitle == "") {
	foreach($conn->query('SELECT * FROM pages WHERE id=1') as $r) {
		$in = $r['html'];
		$split = explode("\n",$in);
		$count = count($split);
		for ($i = 0;$i<$count;$i++){
			$split[$i] = escapeshellarg($split[$i]);
		}
		$toOut = implode($split," ");
		echo shell_exec("./Convert -p ".$toOut);
	}
}else {
	foreach($conn->query('SELECT * FROM pages') as $r) {
		if (strtolower($r['title']) == $pageTitle) {
			$in = $r['html'];
			$split = explode("\n",$in);
			$count = count($split);
			for ($i = 0;$i<$count;$i++){
				$split[$i] = escapeshellarg($split[$i]);
			}
			$toOut = implode($split," ");
			echo shell_exec("./Convert -p ".$toOut);
			//echo $r['html'];
			break;
		}
	}
}
?>
</div>

<div align="left" class="w3-content w3-section" style="max-width:500px; max-height:500px; height: 500px;">
<img class="mySlides" src="../ghg/Advanced Waste.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg//Centier.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/city_of_new.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/Community Health St. Mary's.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/Holladay Properties.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/IN AM Water.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/Main Source.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/McColly Bennett.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/Meridian Title.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/MonoSol, LLC.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/NIPSCO.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/NLMK Indiana.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/Ozinga.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/Pangere.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/Porter Bank.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/Porter Health.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/Pro-Chem-Co.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/Pyro Industrial Services.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/RDC.jpg" style="width:200px" /> 
<img class="mySlides" src="../ghg/The Ross Group.jpg" style="width:200px" /></div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script></body>
</html>