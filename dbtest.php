<?php
	$link = mysql_connect("localhost", "root", "root1234");
	if($link){
		print "OK<br>";
	}
	else
		print "failed<br>";
	$db_selected = mysql_select_db("user_data", $link);
	if(!$db_selected){
		die("Can't access<br>".mysql_error($link));
	}
	print "Accessed.<br>";

	//$sql = "CREATE TABLE data(ID char(10),PWD char(10))";
	for($i=1;$i<8;$i++){
		$sql = "CREATE TABLE data_ch".$i."(ID char(10),FreqB int, FreqBE int, FreqT int, FreqTE int,
			FreqV int, FreqVE int, vieworder char(255), vieworderE char(255))";
		if(mysql_query($sql, $link))
			;
		else
			print "error";
	}
?>