<?php
$loc = "../Pictures";
$pics = scandir($loc);
foreach ($pics as $v){
  if (strlen($v) >= 4){
    if (substr($v,strlen($v)-4,strlen($v)-1)==".jpg" || substr($v,strlen($v)-4,strlen($v)-1)==".png" || substr($v,strlen($v)-5,strlen($v)-1)==".jpeg"){
      echo '<option value="'.$loc.'/'.$v.'">'.$v.'</option>';
    }
  }
}
?>
