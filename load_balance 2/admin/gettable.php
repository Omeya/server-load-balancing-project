<div style="border:1px solid black;">
<form id="">
	<table width="100%" cellspacing="0px" cellpadding="5px" id="contenttable">
		<tr class="tablehead">
			<td>
				<font color="white"><b>Sr.no.</b></font></td>
			<td>
				<font color="white"><b>Filename</b></font></td>
			<td>
				<font color="white"><b>Delete</b></font></td>
		</tr>
		<?php
			require "../INCLUDE/database.php";
			$id = $_GET['id'];
			if( $id == '1')
			{
				$sql = "select * from tbl_video";
				$result = mysql_query($sql);
				if(!$result)
				{
					die('Error - '.mysql_error());
				}
				else
				{
					$i=1;
					while($row = mysql_fetch_array($result))
					{
						echo("
								<tr style=\"text-align:center\"><td><b>".$i."</b></td>
								<td><b>".$row['video']."</b></td>
								<td>
								<a href=\"\" style=\"text-decoration:none; 	color:Red\"><b>Delete</b></a></td></tr>
						");
						$i++;
					}
				}
			}
			else if($id == '2')
			{
				$sql1 = "select * from tbl_audio";
				$result1 = mysql_query($sql1);
				if(!$result1)
				{
					die('Error - '.mysql_error());
				}
				else
				{
					$i=1;
					while($row1 = mysql_fetch_array($result1))
					{
						echo("
								<tr style=\"text-align:center\"><td><b>".$i."</b></td>
								<td><b>".$row1['audios']."</b></td>
								<td>
								<a href=\"\" style=\"text-decoration:none; 	color:Red\"><b>Delete</b></a></td></tr>
						");
						$i++;
					}
				}
			}
			else if($id == '3')
			{
				$sql2 = "select * from tbl_files";
				$result2 = mysql_query($sql2);
				if(!$result2)
				{
					die('Error - '.mysql_error());
				}
				else
				{
					$i=1;
					while($row2 = mysql_fetch_array($result2))
					{
						echo("
								<tr style=\"text-align:center\"><td><b>".$i."</b></td>
								<td><b>".$row2['file']."</b></td>
								<td>
								<a href=\"\" style=\"text-decoration:none; 	color:Red\"><b>Delete</b></a></td></tr>
						");
						$i++;
					}
				}
			}
		?>
	</table>
</form>
</div>