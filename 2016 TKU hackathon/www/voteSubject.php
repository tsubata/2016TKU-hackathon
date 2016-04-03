

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>TKUvoting</title>
    <!-- Bootstrap 4 alpha CSS -->
<!-- IMPORTANT: Don't use this .css file in production. Use Bootstrap 3 until Bootstrap 4.0.0 is released. -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

<style type="text/css">
body {
padding-top: 1em;
}	
</style>
 </head>
 <body>
 <?php
 		require_once("dbtools.inc.php");

	$link = create_connection();
	$sql = "SELECT * FROM voteSubject";
	$result = execute_sql($link,"TKUVoting",$sql);

/*	$get_group_sql = "SELECT name FROM group_name";
	$get_group_result = execute_sql($link,"TKUVoting",$get_group_sql);
	while($group_row = mysqli_fetch_assoc($get_group_result))
	{
		$group_name = $group_row["name"];
	}
	*/
	while($row = mysqli_fetch_assoc($result))
	{
		$subjectID = $row["subjectID"];
		$title = $row["title"];
		$createUser = $row["createUser"];
		$voteClass = $row["voteClass"];
		$subjectClass = $row["subjectClass"];
		$group_name = $row["group_name"];
		$createDate = $row["createDate"];
		$endDate = $row["endDate"];
		$voterDisplay = $row["voterDisplay"];
	
	

 	echo "<div class='container-fluid'>";
   
 	echo "<div class='card' style='max-width: 350px;' >";

          //<!-- Heading -->
     echo "<div class='card-block'>";
          echo "<h4 class='card-title'>主題 : ".$title."</h4>";
          echo "<h6 class='card-subtitle text-muted'>創建者：".$createUser.'('.$group_name.')'.'</h6></div>';
          
          
          //<!-- Image -->
          echo "<a href='#'><img src='./images/0.png' alt='Not Found' width='150' height='100'></a>";
          
          //<!-- Text Content -->
          echo "<div class='card-block'>";
          echo "<p class='card-text'>開始時間 ：".$createDate."</p>";
          echo "<p class='card-text'>結束時間 ：".$endDate."</p>";

          echo "</div>";

          
      echo "</div>";
     }
     mysqli_free_result($result);


	
//	mysqli_free_result($get_group_result);
	?>
  </div>
 </body>
 </html>