<?php 
//從資料庫取得圖片
    require_once("dbtool.inc.php");
    $link = create_connection();     

    $sql="select * from photo where id=1";
    $result=execute_sql($link,"TKUVoting",$sql);

      //顯示圖片
if($row=mysql_fetch_assoc($result)){
      header("Content-type: image/jpeg");     
      print $row['image'];
?>