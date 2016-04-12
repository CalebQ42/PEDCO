<?php
//following function taken from http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}
$files = scandir("projects");
$num = 0;
foreach ($files as $v){
    $num ++;
    if ($num>2){
        if (endsWith($v,".html") && !is_dir("projects/"+$v)){
            echo "<a class='button' href='projects/",$v, "'>" ,rtrim($v,".html"), "</a>  ";
        }else if (endsWith($v,".php") && !is_dir("projects/"+$v)){
            echo "<a class='button' href='projects/", $v , "'>" , rtrim($v,".php") , "</a>  ";
        }else{
            echo "<a class='button' href='projects/" , $v , "'>", $v , "</a>  ";
        }
    }
}
?>