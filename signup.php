<html>
	<head></head>
		<body>
			<?php
				if(isset($_POST['ID'])){
					if(isset($_POST['PWD1'])&&isset($_POST['PWD2'])){
						if($_POST['PWD1']!=$_POST['PWD2']){
							print <<<PAGE
							密碼不相符<br>
                  			<form method="POST" action="$_SERVER[PHP_SELF]">
                  			帳號(最長15個字元): <input type="text" name="ID" placeholder="帳號"></input><br>
          		  			密碼(最長20個字元): <input type="password" name="PWD1" placeholder="密碼"></input><br>
          		  			再次輸入密碼: <input type="password" name="PWD2" placeholder="密碼"></input><br>
          		  			<input type="submit" value="Login"></input>
                  			</form>
PAGE;
						}
						else{
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
							//print "Accessed.<br>";
							$sql = "INSERT INTO data (ID, PWD) VALUES('{$_POST['ID']}', '{$_POST['PWD1']}')";
							$sql2 = "INSERT INTO data_ch1 (ID, freqB, freqBE, freqT, freqTE, freqV, freqVE, vieworder, vieworderE) VALUES('{$_POST['ID']}', 0, 0, 0, 0, 0, 0, ' ', ' ')";
							if(mysql_query($sql, $link))
								;
							else{
								print <<<PAGE
								帳號已存在
                  				<form method="POST" action="$_SERVER[PHP_SELF]">
                  				帳號(最長15個字元): <input type="text" name="ID" placeholder="帳號"></input><br>
          		  				密碼(最長20個字元): <input type="password" name="PWD1" placeholder="密碼"></input><br>
          		  				再次輸入密碼: <input type="password" name="PWD2" placeholder="密碼"></input><br>
          		  				<input type="submit" value="Login"></input>
                  				</form>
PAGE;
							}
							if(mysql_query($sql2, $link))
								print "成功加入";
					
							else{
								print "error";
							}
						}
					}
				}
				else{
					print <<<PAGE
                  	<form method="POST" action="$_SERVER[PHP_SELF]">
                  	帳號(最長15個字元): <input type="text" name="ID" placeholder="帳號"></input><br>
          		  	密碼(最長20個字元): <input type="password" name="PWD1" placeholder="密碼"></input><br>
          		  	再次輸入密碼: <input type="password" name="PWD2" placeholder="密碼"></input><br>
          		  	<input type="submit" value="Login"></input>
                  	</form>
PAGE;
				}
			?>
		</body>
</html>