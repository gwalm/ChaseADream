<?php
header("Content-Type:text/html;charset=UTF-8");
session_start();
 require('./connect.php');
	if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"]===1){
		echo "<div id=j>";
		echo "<p>当前用户为:".$_SESSION["account"]. "&nbsp;";
		echo "<a href=logout.php>退出</a>&nbsp;&nbsp;";
		echo"</div>";
	}else{
			header("Location:./login.php");
			exit;
		}
header("Content-Type:text/html;charset=UTF-8");
include "conn.inc.php";                              	
	$sql = "select id,name,telephone,email,comment,flag from shop ";
$result = mysql_query($sql);
if($result && mysql_num_rows($result) > 0 ) {
		echo '<table style="width:400px">';
		echo'<tr align="left" bgcolor="#cccccc">';
		echo '<th>';
		echo '序号';
		echo '</th>';
		echo '<th>';
		echo '公司名称';
		echo '</th>';
		echo '<th>';
		echo '联系方式';
		echo '</th>';
		echo '<th>';
		echo '邮箱';
		echo '</th>';
		echo '<th>';
		echo '详情';
		echo '</th>';
		echo '<th>';
			$i = 0;
			/* 循环数据，将数据表每行数据对应的列转为变量 */
			while(list($id, $name, $telephone, $email,) = mysql_fetch_row($result)) {
				if($i++%2==0)
					echo '<tr bgcolor="#eeeeee">';
				else 
					echo '<tr>';
				echo '<td>'.$id.'</td>';
				echo '<td>'.$name.'</td>';
				echo '<td>'.$telephone.'</td>';
				echo '<td>'.$email.'</td>';
				echo '<td><a href = "shopdisplay1.php?action=mod&id='.$id.'">查看详情</a></td>';
			}
			echo '</table>';
}else {
			echo '<tr><td colspan="6" align="center">没有人!!</td></tr>';
		}
		mysql_free_result($result);                  
		mysql_close($link); 


?>