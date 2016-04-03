<head>
    <title>聯絡我們</title>
    <link rel="shortcut icon" href="images/cena.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-2.2.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <meta charset=utf-8>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
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
                    <?php 
                          if(!isset($_COOKIE["login_user"])){
                            echo "<a href='login.php'>登入</a>";
                          }
                          else
                          {

                            echo "<a href='logout.php'>登出【 ".$_COOKIE["login_name"]." 】</a>";
                          }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div style=" text-align:center"> <img src="images/grassland.jpg" style="max-width: 100%;opacity:0.8"></div>
    <div style="margin: 100px 0px 100px 0px;">一時之間不知道要取甚麼的作品   develope in 2016/04/02-03</div>
    <footer class="footer" style="background-color: black;">
      <div class="container">
        <p class="text-muted"></p>
        <p class="text-muted" style="font-weight: bold;">此網站不作為商業用途，<b>若有任何問題，歡迎與我們聯絡!!</p>
        <p class="text-muted"> <img src="images/phone.png" style="max-width: 100%;height: 20px">  連絡電話:0912-345-645</p>
        <p class="text-muted"><img src="images/mail.png" style="max-width: 100%;height: 30px">  電子信箱:peterYDP@gmail.com</p>
      </div>
    </footer>
<script>
    $('#searchBtn').click(function () {
            $('#searchForm').submit();
        });
        $('#reloadBtn').click(function(){
            $('#searchTbx').val('');
            //$('#searchForm').submit();
        });
    </script>
</body>