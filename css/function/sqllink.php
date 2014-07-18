<?php
function sqllink()
{
$dbname = 'SEproject';

$host = "127.0.0.1";

$user = "ddpse";

$pwd = "zjuddpse2014";

$link = @mysql_connect($host,$user,$pwd,true);
if(!$link) {
    return NULL;
}
mysql_query("set names utf8");
if(!mysql_select_db($dbname,$link)) return NULL;
return $link;
}

?>
