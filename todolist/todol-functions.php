<?php

function todol_template_part($tmp_name)
{
	include_once(dirname(__FILE__)."/templates/".$tmp_name.".php");
}

?>