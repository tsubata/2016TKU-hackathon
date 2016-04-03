<html>
<head>
    <title>TKUvoting</title>
    <link rel="shortcut icon" href="images/cena.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-2.2.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <meta charset=utf-8>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
            <li><a href="addVoteSubject.php">創建投票</a></li>
            <li><a href="manageSubject.php">管理投票</a></li>
            <li><a href="personal.php">個人資訊</a></li>
            <li><a href="aboutUs.php">關於我們</a></li>
          </ul>
        </li>
      </ul>
    <form class="navbar-form navbar-left" role="search" id="searchForm" action="index.php" method="post">
        
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search for..." name="searchTbx">
        </div>
        <button class="btn btn-default" type="button" id="searchBtn" ><img alt="Brand" src="images/search.png" style="height:18px;margin: 0,0,0,0"></button>
      </form>
                <ul class="nav navbar-nav navbar-right">
                    <li>
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
    <div style=" text-align:center"> <img src="images/ocean.jpg" style="max-width: 100%;opacity:0.7"></div>
    <ul class="nav nav-tabs nav-justified">
  <li role="presentation" id="schoolAreaLi" class="active"><a href="#" id="schoolAreaBtn" style="font-size:large"><img src="images/schoolIcon.png">  校務</a></li>
  <li role="presentation"  id="groupAreaLi"><a href="#" id="groupAreaBtn" style="font-size:large"><img src="images/groupIcon.png">  社團</a></li>
  <li role="presentation" id="otherAreaLi"><a href="#" id="otherAreaBtn" style="font-size:large"><img src="images/otherIcon.png">  娛樂</a></li>
</ul>
<div class="row">
<?php 
  require_once("dbtools.inc.php");

  //取得登入者帳號及名稱
      if (isset($_COOKIE["login_user"]))
      {
        $login_user = $_COOKIE["login_user"];
        $login_name = $_COOKIE["login_name"];
      }
      
  $link = create_connection();
  $sql;
  if(isset($_POST["searchTbx"])){
    $sql = "SELECT * FROM voteSubject WHERE title LIKE '%".$_POST["searchTbx"]."%'";
  }else{
    $sql = "SELECT * FROM voteSubject ";
  }
  
  $result = execute_sql($link,"TKUVoting",$sql);
  $result_num=mysqli_num_rows($result);

 // $get_user_group_sql = 'SELECT group_name.name FROM groupMember,group_name WHERE '.$login_user.' = groupMember.memberID AND groupMember.groupID = group_name.groupID';

      //$get_user_group_result = execute_sql($link,"TKUVoting",$get_user_group_sql);
      //$get_user_group_row = mysqli_fetch_assoc($get_user_group_result);
      //echo $get_user_group_row;
    
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
      //$get_user_group = $get_user_group_row["group_name"];
    
    
    if ($subjectClass == 2) {
  
            echo '<div class="schoolArea" >';
              echo '<div class="col-sm-6 col-md-4" style="padding:30px 30px 30px 30px;">';
                echo '<div class="thumbnail" style="background-color: #e0e0d1;">';
                  echo '<img src="images/test.jpg" alt="..." style="border-radius:50%">';
                  echo '<div class="caption" style="text-align: center;">';
                    echo'<h1>'.$title.'</h1>';
                    echo'<h3>'.$createUser.'</h3>';
                    echo'<p>開始時間：'.$createDate.'</p>';
                    echo'<p>結束時間：'.$endDate.'</p>';
                    //echo'<form action="voteItem.php?subjectID=2" method="GET">';
                    //echo'<input hidden="true" name="subjectID" value="'.$subjectID.'"></input>';
                    echo'<a href="voteItem.php?subjectID='.$subjectID.'"><button type="submit" class="btn btn-primary">投票</button></a>';
                    //echo'</form>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
              echo '</div>';
  }else if($subjectClass==1){
    echo '<div class="groupArea" hidden="true">';
              echo '<div class="col-sm-6 col-md-4" style="padding:30px 30px 30px 30px;">';
                echo '<div class="thumbnail" style="background-color: #e0e0d1;">';
                  echo '<img src="images/test.jpg" alt="..." style="border-radius:50%">';
                  echo '<div class="caption" style="text-align: center;">';
                    echo'<h1>'.$title.'</h1>';
                    echo'<h3>'.$createUser."：".'</h3>';
                    echo'<p>開始時間：'.$createDate.'</p>';
                    echo'<p>結束時間：'.$endDate.'</p>';
                    //echo'<form action="voteItem.php"  method="post">';
                    //echo'<input hidden="true" name="subjectID" value="'.$subjectID.'"></input>';
                    //echo'<button type="submit" class="btn btn-primary">投票</submit>';
                    echo'<a href="voteItem.php?subjectID='.$subjectID.'"><button type="submit" class="btn btn-primary">投票</button></a>';
                    //echo'</form>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
              echo '</div>';
  }else{
    echo '<div class="otherArea" hidden="true">';
              echo '<div class="col-sm-6 col-md-4" style="padding:30px 30px 30px 30px;">';
                echo '<div class="thumbnail" style="background-color: #e0e0d1;">';
                  echo '<img src="images/test.jpg" alt="..." style="border-radius:50%">';
                  echo '<div class="caption" style="text-align: center;">';
                    echo'<h1>'.$title.'</h1>';
                    echo'<h3>'.$createUser."：".'</h3>';
                    echo'<p>開始時間：'.$createDate.'</p>';
                    echo'<p>結束時間：'.$endDate.'</p>';
                    //echo'<form action="voteItem.php" method="post">';
                    //echo'<input hidden="true" name="subjectID" value="'.$subjectID.'"></input>';
                    //echo'<button type="submit" class="btn btn-primary">投票</submit>';
                    //echo'</form>';
                    echo'<a href="voteItem.php?subjectID='.$subjectID.'"><button type="submit" class="btn btn-primary">投票</button></a>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';  
              echo '</div>';
  }
}
?>
</div>
<footer class="footer" style="background-color: black;">
      <div class="container">
        <p class="text-muted"></p>
        <p class="text-muted" style="font-weight: bold;">此網站不作為商業用途，<b>若有任何問題，歡迎與我們聯絡!!</p>
        <p class="text-muted"> <img src="images/phone.png" style="max-width: 100%;height: 20px">  連絡電話:0912-345-645</p>
        <p class="text-muted"><img src="images/mail.png" style="max-width: 100%;height: 30px">  電子信箱:peterYDP@gmail.com</p>
      </div>
    </footer>
    <script type="text/javascript">

        $('#logoutHref').css( "display", "none");

        $('#searchBtn').click(function () {
            $('#searchForm').submit();
        });
        $('#reloadBtn').click(function(){
            $('#searchTbx').val('');
            //$('#searchForm').submit();
        });

        $("#schoolAreaBtn").click(function(){
            $("#schoolAreaLi").attr("class","active");
            $("#groupAreaLi").removeAttr("class");
            $("#otherAreaLi").removeAttr("class");
            $('.schoolArea').show();
            $('.groupArea').hide();
            $('.otherArea').hide();
        });
        $("#groupAreaBtn").click(function(){
            $("#groupAreaLi").attr("class","active");
            $("#schoolAreaLi").removeAttr("class");
            $("#otherAreaLi").removeAttr("class");
            $('.schoolArea').hide();
            $('.groupArea').show();
            $('.otherArea').hide();
        });
        $("#otherAreaBtn").click(function(){
            $("#otherAreaLi").attr("class","active");
            $("#schoolAreaLi").removeAttr("class");
            $("#groupAreaLi").removeAttr("class");
            $('.schoolArea').hide();
            $('.groupArea').hide();
            $('.otherArea').show();
        });

        
    </script>
</body>
</html>