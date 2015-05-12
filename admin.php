<!DOCTYPE>
<html>
	<head></head>
	<body>
		<?php
			$link = mysql_connect("localhost", "root", "root1234");
			if($link){
				//print "OK<br>";
			}
			else
				print "failed<br>";
			$db_selected = mysql_select_db("user_data", $link);
			if(!$db_selected){
				die("Can't access<br>".mysql_error($link));
			}


			$sql = "SELECT * FROM data_ch1 ";
			$result = mysql_query($sql, $link);
			$count = 0;
			print <<<TABLE
			chapter1
			<table width="1000" border="1" style="border-collapse:collapse;" borderColor=black align="center">
			<tr align="center">
				<th>ID</th>
				<th width="50px">次數-背景</th>
				<th width="50px">次數-背景(英)</th>
				<th width="50px">次數-翻譯</th>
				<th width="50px">次數-翻譯(英)</th>
				<th width="50px">次數-單字</th>
				<th width="50px">次數-單字(英)</th>
				<th width="200px">順序</th>
				<th width="200px">順序(英)</th>
			</tr>
TABLE;
			while($data = mysql_fetch_row($result)){
				print <<<contents
				<tr align="center">
contents;
				for($i=0;$i<count($data);$i++){
						if($i==0){
							print <<<content
							<td>{$data[$i]}</td>
content;
						}
						else if($i==1){
							print <<<content
							<td>{$data[$i]}</td>
content;
						}
						else if($i==2){
							print <<<content
							<td>{$data[$i]}</td>
content;
						}
						else if($i==3){
							print <<<content
							<td>{$data[$i]}</td>
content;
						}
						else if($i==4){
							print <<<content
							<td>{$data[$i]}</td>
content;
						}
						else if($i==5){
							print <<<content
							<td>{$data[$i]}</td>
content;
						}
						else if($i==6){
							print <<<content
							<td>{$data[$i]}</td>
content;
						}
						else if($i==7){
							$order = '';
							for($k=0;$k<strlen($data[$i]);$k++){
								if($data[$i][$k]=='1')
									$order = $order."背景簡介-";
								else if($data[$i][$k]=='2')
									$order = $order."正文-";
								else if($data[$i][$k]=='3')
									$order = $order."測驗-";
								else
									$order = $order.' ';
		
							}
							$order[strlen($order)-1]=" ";
							print <<<content
							<td>{$order}</td>
content;
						}
						else{
							$orderE = '';
							for($k=0;$k<strlen($data[$i]);$k++){
								if($data[$i][$k]=='1')
									$orderE = $orderE."Intro.-";
								else if($data[$i][$k]=='2')
									$orderE = $orderE."Text-";
								else if($data[$i][$k]=='3')
									$orderE = $orderE."Monitor.-";
								else
									$orderE = $orderE.' ';
		
							}
							$orderE[strlen($orderE)-1]=" ";
							print <<<content
							<td>{$orderE}</td>
content;
						}
				}
				//print $freqB[0];
				print "<br>";
			}
			//print "Accessed.<br>";

		?>
	</body>
</html>