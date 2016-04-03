<?php
   require_once("dbtools.inc.php");
   $link = create_connection();
	$subjectID = $_POST['subjectID'];
	$ItemValue = $_POST['ItemValue'];
   $sql = 'UPDATE voteItem SET score = score + 1 WHERE subjectID = '.$subjectID.' AND '.'ItemValue = '.$ItemValue.'';
   $result = execute_sql($link,"TKUVoting",$sql);
   header("location:voteItem.php?subjectID=".$subjectID);


?>
