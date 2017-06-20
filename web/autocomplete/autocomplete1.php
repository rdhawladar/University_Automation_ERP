<?php
	$q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);
	$mysqli=mysqli_connect('localhost','root','','pundro_demo1') or die("Database Error");
	$sql="SELECT * FROM applicants_details WHERE EmailNotify='3' AND ClassRollNo='0' AND PresentMobile LIKE '%$my_data%' ORDER BY id DESC";
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			//echo $row['id'].")\n";
			//echo $row['PresentMobile']." (".$row['CandidateName']."&nbsp; - &nbsp;".$row['Email'].")\n";
			echo $row['PresentMobile']." - ".$row['TotalGPA']." - ".$row['NameofApplicant']."\n";
		}
	}
?>