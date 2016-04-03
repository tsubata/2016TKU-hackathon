<html>
<head>
	 <script src="js/jquery-2.2.0.min.js"></script>
</head>
<body>
<?php 
	$subjectID = $_GET["$subjectID"];
	$voteClass=$_GET["voteClass"];
	if($voteClass=="1"){
		echo '<form action="voteItem.php" method="GET" id="tmpForm">';
	}else if($voteClass=="2"){
		echo '<form action="Category_Vote.php" method="GET" id="tmpForm">';
	}else{
		echo '<form action="voteItem_weight.php" method="GET" id="tmpForm">';
	}
?>
	<input type="text" value=<?php echo $subjectID;?> name="subjectID">
<?php echo '</form>'?>
	<script type="text/javascript">
		$('#tmpForm').submit();
	</script> 
</body>	
</html>
