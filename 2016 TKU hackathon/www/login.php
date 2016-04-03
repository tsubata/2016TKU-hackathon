<?php session_start();?>
<?php
	if(isset($_POST["account"])) {
		require_once('dbtools.inc.php');

		//取得登入資料
		$login_user = $_POST["account"];
		$login_password = $_POST["password"];

		//建立資料連接
    	$link = create_connection();
							
    	//檢查帳號密碼是否正確
    	$sql = "SELECT * FROM user Where StudentID = '$login_user'
    	        AND password = '$login_password'";
    	$result = execute_sql($link, "TKUVoting", $sql);
		
    	//若沒找到資料，表示帳號密碼錯誤
    	if (mysqli_num_rows($result) == 0)
    	{
    	  //釋放 $result 佔用的記憶體
    	  mysqli_free_result($result);
			
    	  //關閉資料連接	
    	  mysqli_close($link);
				
    	  //顯示訊息要求使用者輸入正確的帳號密碼
    	  echo "<script type='text/javascript'>alert('帳號密碼錯誤，請查明後再登入')</script>";
    	}
		else
		{

			$row = mysqli_fetch_object($result);
      $StudentID = $row->StudentID;
      $nickName = $row->nickName;
      setcookie("login_user",$StudentID);
			setcookie("login_name",$nickName);

			// 釋放 $result 佔用的記憶體
			mysqli_free_result($result);
			mysqli_close($link);

			header("location:index.php");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="images/cena.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-2.2.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <style>
     @import "bourbon";
           		
           body {
           	background: #eee !important;	
           }
           
           .wrapper {	
           	margin-top: 80px;
             margin-bottom: 80px;
           }
           
           .form-signin {
             max-width: 380px;
             padding: 15px 35px 45px;
             margin: 0 auto;
             background-color: #fff;
             border: 1px solid rgba(0,0,0,0.1);  
           
             .form-signin-heading,
           	.checkbox {
           	  margin-bottom: 30px;
           	}
           
           	.checkbox {
           	  font-weight: normal;
           	}
           
           	.form-control {
           	  position: relative;
           	  font-size: 16px;
           	  height: auto;
           	  padding: 10px;
           		@include box-sizing(border-box);
           
           		&:focus {
           		  z-index: 2;
           		}
           	}
           
           	input[type="text"] {
           	  margin-bottom: -1px;
           	  border-bottom-left-radius: 0;
           	  border-bottom-right-radius: 0;
           	}
           
           	input[type="password"] {
           	  margin-bottom: 20px;
           	  border-top-left-radius: 0;
           	  border-top-right-radius: 0;
           	}
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
                <a class="navbar-brand" id="reloadBtn" href="index.php">TKUvoting</a>
            </div>

            <div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img alt="Brand" src="images/list.png" style="height:18px;margin: 0,0,0,0"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="manageSubject.php">創建/管理投票</a></li>
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
                    <li>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>  
   
    <div style=" text-align:center"> <img src="images/ocean.jpg" style="max-width: 100%;opacity:0.7"></div>
  <div class="wrapper">
  ?>
    <form class="form-signin" method="POST" action="login.php">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="account" value=" "  required="" autofocus="" />
      <input type="password" class="form-control" name="password" value=""  required=""/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
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


