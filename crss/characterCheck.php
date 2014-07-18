<?php
function sqlin()
{
	foreach ($_GET as $key=>$value)
	{
		if(preg_match("/[\'.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$_GET[$key])){  
			exit(1);
		}
	}
	foreach ($_POST as $key=>$value)
	{
		if(preg_match("/[\'.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$_POST[$key])){  
		}
		exit(1);
	}
}
sqlin();
?>
