<?php 
	require_once("dbtools.inc.php");
      $login_user;
	   //取得登入者帳號及名稱
      if (isset($_COOKIE["login_user"]))
      {
        $login_user = $_COOKIE["login_user"];
      }

	  $link = create_connection();

	  $sql = "SELECT * FROM user WHERE StudentID = ".$login_user;

	  $result = execute_sql($link , "TKUVoting" , $sql);
    $row = mysqli_fetch_assoc($result);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>個人資訊</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="images/cena.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-2.2.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <style>
      .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="reloadBtn" href="index.php" style="padding:0px 0px 0px 0px;"><img src="images/icon.png" style="height:50px;"></a>
            </div>

            <div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img alt="Brand" src="images/list.png" style="height:18px;margin: 0,0,0,0"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addVote.php">創建/管理投票</a></li>
            <li><a href="trackSubject.php">追蹤投票</a></li>
            <li><a href="personal.php">個人資訊</a></li>
            <li><a href="aboutUs.php">關於我們</a></li>
          </ul>
        </li>
      </ul>
    <form class="navbar-form navbar-left" role="search" id="searchForm" action="index.php" method="post">
        
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search for..." id="searchTbx">
        </div>
        <button class="btn btn-default" type="button" id="searchBtn" ><img alt="Brand" src="images/search.png" style="height:18px;margin: 0,0,0,0"></button>
      </form>
                <ul class="nav navbar-nav navbar-right">
                    <li id="loginHref" >
                    <?php 
                          if(!isset($_COOKIE["login_user"])){
                            echo "<a href='login.php'>登入</a>";
                          }
                          else
                          {

                            echo "<a href='logout.php'>登出【 ".$_COOKIE["login_name"]." 】</a>";
                          }
                    ?>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

  <div style=" text-align:center"> <img src="images/star.jpg" style="max-width: 100%;opacity:0.7"></div>
	
  <div class="container" style="margin-top:30px;">
   			 <div class="row">
   			  <div class="col-md-4" style="text-align: center;">
   			   <div class="panel panel-primary">
   			    <div class="panel-heading">個人資訊 :</div>
   			     <div class="panel-body">
   				  <div align="right"></div>
   				  <img src="personal.jpg" height="200" width="200"/>
            <Form Action="update_pic.php" Method="POST" Enctype="multipart/form-data">
                <span class="btn btn-default btn-file">
                  選擇圖片 <input type="file" name="image">
                </span>
                <Input Type="Submit" class="btn btn-primary" value=" 開始上傳 ">
            <hr>
   				  <br>
   				  <label>暱稱：<?php echo $row["nickName"]?></label>
   				  <hr>
   			      <label>學號：<?php echo $row["StudentID"]?></label>
   			      <hr>
   				 <!-- <label>屆: <input type='text' class='form-control'  value='<?php echo $row["grade"]?>'  disabled></label>-->
   				  <label>每日發主題次數(上限2次）: <?php echo $row["dailySubjectCreate"]?></label>
   				  <hr>
   				  <label>創建主題總次數：<?php echo $row["totalSubjectCreate"]?></label>
   				  <hr> 
   			      <label>總投票次數 : <?php echo $row["totalVote"]?></label> 
   			      <hr>
              </Form>
   			    </div>
   			   </div>
   			  </div>
   			 </div>
   	 </div>
  <footer class="footer" style="background-color: black;">
      <div class="container">
        <p class="text-muted"></p>
        <p class="text-muted" style="font-weight: bold;">此網站不作為商業用途，<b>若有任何問題，歡迎與我們聯絡!!</p>
        <p class="text-muted"> <img src="images/phone.png" style="max-width: 100%;height: 20px">  連絡電話:0912-345-645</p>
        <p class="text-muted"><img src="images/mail.png" style="max-width: 100%;height: 30px">  電子信箱:peterYDP@gmail.com</p>
      </div>
  </footer>
</body>
</html>