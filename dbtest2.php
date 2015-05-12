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

	$sql = "UPDATE data_ch1 SET FreqB=FreqB + 1 WHERE ID='A0995540'";
	//$sql = "SELECT PWD FROM data_ch1 WHERE ID='A0995540'";

	if(mysql_query($sql, $link))
		;
	else
		print "error";
	$string = '1';

	$sql = "SELECT vieworder FROM data_ch1 WHERE ID='A0995540'";

	$result = mysql_query($sql, $link);

	$data = mysql_fetch_row($result);
	$str = $data[0];
	if($str[strlen($str)-1]=='1')
		;
	else
		$str = $str.'1';

	$sql = "UPDATE data_ch1 SET vieworder = {$str} WHERE ID='A0995540'";

	if(mysql_query($sql, $link))
		;
	else
		print "error";

	$sql = "SELECT vieworder FROM data_ch1 WHERE ID='A0995540'";

	$result = mysql_query($sql, $link);
	
	print "freq:".mysql_num_rows($result)."筆";
	print ",包含".mysql_num_fields($result)."個欄位";
	
	$data = mysql_fetch_row($result);
	print "order: ".$data[0]."\n";
	$str = $data[0];
	print $str;

	for($i=0;$i<strlen($str);$i++){
		if ($str[$i] == '1')
			print "back!!";
	}
/*
	foreach ((array)$str as $st){
		print $st."0";
		if($st=="1")
			print "back"." ";
	}*/
	mysql_free_result($result);
	mysql_close($link);
?>