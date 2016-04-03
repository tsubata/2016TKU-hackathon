<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>創建投票</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="images/cena.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-2.2.0.min.js"></script>
    <script src="js/bootstrap.js"></script>

   

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
            <li><a href="voteItem.php">創建投票</a></li>
            <li><a href="manageSubject.php">管理投票</a></li>
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
                    <li id="loginHref" ><a href="login.php">登入</a></li>
                    <li id="logoutHref" ><a href="index.php">登出</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div style=" text-align:center"> <img src="images/ocean.jpg" style="max-width: 100%;opacity:0.7"></div>



  <form class="form-horizontal" action="addVoteSubject.php" method="POST">
      <fieldset>
      
      <!-- Form Name -->
      <legend>創建投票</legend>
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">主題</label>  
        <div class="col-md-4">
        <input id="textinput" name="subject" type="text" class="form-control input-md" value="">
          
        </div>
      </div>
     
      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="subjectClass">類型：</label>
        <div class="col-md-4">
          <select id="subjectClass" name="subjectClass" class="form-control">
            <option value="1">社團</option>
            <option value="2">校務</option>
            <option value="3">娛樂</option>
          </select>
        </div>
      </div>
      
      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="VoteClass">進階投票</label>
        <div class="col-md-4">
          <select id="VoteClass" name="VoteClass" class="form-control">
            <option value="1">一般投票</option>
            <option value="2">多重投票</option>
            <option value="3">權重投票</option>
          </select>
        </div>
      </div>

 <!-- basic_1 -->
    <div id="voteClass_1">
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">項目</label>
        <div class="col-md-2">
        <input id="textinput" name="VoteClass_1[]" type="text" class="form-control input-md">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">項目</label>
        <div class="col-md-2">
        <input id="textinput" name="VoteClass_1[]" type="text" class="form-control input-md">
        </div>
      </div>
    </div>

      <div class="form-group" id="createItem_1_area">
        <label class="col-md-4 control-label" for="createDate"></label>
        <div class="col-md-2">
          <button id="createItem_1" name="createItem_1" class="btn btn-primary">新增項目</button>
        </div>
      </div> 

  <!--multi-2 -->
  <div id="voteClass_2" hidden="true">
    <div class="form-group">
        <label class="col-md-3 control-label" for="textinput"></label>
        <label class="col-md-2 control-label" for="textinput">第一組投票</label>
        <div class="col-md-3">
        </div>
      </div>

    <div id="voteClass_2_sub1">
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">項目</label>
        <div class="col-md-2">
        <input id="textinput" name="VoteClass_2_sub1" type="text" class="form-control input-md">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">項目</label>
        <div class="col-md-2">
        <input id="textinput" name="VoteClass_2_sub1" type="text" class="form-control input-md">
        </div>
      </div>
    </div>

    <div class="form-group" id="createItem_2_area">
        <label class="col-md-4 control-label" for="createDate"></label>
        <div class="col-md-2">
          <button id="createItem_2_sub1" name="createItem_2" class="btn btn-primary">多重項目</button>
        </div>
      </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="textinput"></label>
        <label class="col-md-2 control-label" for="textinput">第二組投票</label>
        <div class="col-md-3">
        </div>
      </div>

    <div id="voteClass_2_sub2">
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">項目</label>
        <div class="col-md-2">
        <input id="textinput" name="VoteClass_2_sub2" type="text" class="form-control input-md">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">項目</label>
        <div class="col-md-2">
        <input id="textinput" name="VoteClass_2_sub2" type="text" class="form-control input-md">
        </div>
      </div>
    </div>

    <div class="form-group" id="createItem_2_area">
        <label class="col-md-4 control-label" for="createDate"></label>
        <div class="col-md-2">
          <button id="createItem_2_sub2" name="createItem_2" class="btn btn-primary">多重項目</button>
        </div>
      </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="textinput"></label>
        <label class="col-md-2 control-label" for="textinput">第三組投票</label>
        <div class="col-md-3">
        </div>
      </div>

    <div id="voteClass_2_sub3">
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">項目</label>
        <div class="col-md-2">
        <input id="textinput" name="VoteClass_2_sub3" type="text" class="form-control input-md">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">項目</label>
        <div class="col-md-2">
        <input id="textinput" name="VoteClass_2_sub3" type="text" class="form-control input-md">
        </div>
      </div>
    </div>

      <div class="form-group" id="createItem_2_area">
        <label class="col-md-4 control-label" for="createDate"></label>
        <div class="col-md-2">
          <button id="createItem_2_sub3" name="createItem_2" class="btn btn-primary">多重項目</button>
        </div>
      </div>
</div>
 <!-- weight_3 -->
    <div id="voteClass_3" hidden="true">
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">項目</label>
        <div class="col-md-2">
        <input id="textinput" name="VoteClass_3" type="text" class="form-control input-md">
        </div>
        <div class="col-md-1">
        <input id="textinput" name="VoteClass_3_weight" type="number" class="form-control input-md">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">項目</label>
        <div class="col-md-2">
        <input id="textinput" name="VoteClass_3" type="text" class="form-control input-md">
        </div>
        <div class="col-md-1">
        <input id="textinput" name="VoteClass_3_weight" type="number" class="form-control input-md">
        </div>
      </div>
    </div>

      <div class="form-group" id="createItem_3_area" hidden="true">
        <label class="col-md-4 control-label" for="createDate"></label>
        <div class="col-md-2">
          <button id="createItem_3" name="createItem_3" class="btn btn-primary">權重項目</button>
        </div>
      </div>

      <hr size="10">
      <div class="form-group">
        <label class="col-md-4 control-label" for="createDate">起始日期</label>
        <div class="col-md-4">
          <input id="n9" type="date" placeholder="" name="createDate" style="width: 90%;"></input>
        </div>
      </div>
      
      
      
      <div class="form-group">
        <label class="col-md-4 control-label" for="endDate">結束日期</label>
        <div class="col-md-4">
          <input id="n9" type="date" placeholder="" name="endDate" style="width: 90%;"></input>
        </div>
      </div>
      
    
      
      <!-- Multiple Radios (inline) -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="voterDisplay">是否開放匿名</label>
        <div class="col-md-4"> 
          <label class="radio-inline" for="voterDisplay-0">
            <input type="radio" name="voterDisplay" id="voterDisplay-0" value="1" checked="checked">
            是
          </label> 
          <label class="radio-inline" for="voterDisplay-1">
            <input type="radio" name="voterDisplay" id="voterDisplay-1" value="0">
            否
          </label>
        </div>
      </div>
      

      <div class="form-group">
      <label class="col-md-4 control-label" for="voterDisplay"></label>
        <div class="col-md-4">
          <button id="submit" name="submit" class="btn btn-info" type="submit">提交</button>
        </div>
      </div>

      </fieldset>

</form>
<footer class="footer" style="background-color: black;">
      <div class="container">
        <p class="text-muted"></p>
        <p class="text-muted" style="font-weight: bold;">此網站不作為商業用途，<b>若有任何問題，歡迎與我們聯絡!!</p>
        <p class="text-muted"> <img src="images/phone.png" style="max-width: 100%;height: 20px">  連絡電話:0912-345-645</p>
        <p class="text-muted"><img src="images/mail.png" style="max-width: 100%;height: 30px">  電子信箱:peterYDP@gmail.com</p>
      </div>
</footer>
<script>
$('#VoteClass').on("change", function (e) {
  var s = $('#VoteClass :selected').val();
  if(s=="1"){
    $("#voteClass_1").show();
    $("#createItem_1_area").show();
    $("#voteClass_2").hide();
    //$("#createItem_2_area").hide();
    $("#voteClass_3").hide();
    $("#createItem_3_area").hide();
  }else if(s=="2"){
    $("#voteClass_1").hide();
    $("#createItem_1_area").hide();
    $("#voteClass_2").show();
    //$("#createItem_2_area").show();
    $("#voteClass_3").hide();
    $("#createItem_3_area").hide();
  }else{

    $("#voteClass_1").hide();
    $("#createItem_1_area").hide();
    $("#voteClass_2").hide();
    //$("#createItem_2_area").hide();
    $("#voteClass_3").show();
    $("#createItem_3_area").show();
  }
});

//一般
  $('#createItem_1').click(function(event) {
    $("#voteClass_1").append('<div class="form-group">'+
        '<label class="col-md-4 control-label" for="textinput">項目</label>'+
        '<div class="col-md-2">'+
        '<input id="textinput" name="voteClass_1" type="text" class="form-control input-md" required="">'+
        '</div></div>');
  });
//多重
  $('#createItem_2_sub1').click(function(event) {
    $("#voteClass_2_sub1").append('<div class="form-group">'+
        '<label class="col-md-4 control-label" for="textinput">項目</label>'+
        '<div class="col-md-2">'+
        '<input id="textinput" name="voteClass_2_sub1" type="text" class="form-control input-md" required="">'+
        '</div></div>');
  });
  $('#createItem_2_sub2').click(function(event) {
    $("#voteClass_2_sub2").append('<div class="form-group">'+
        '<label class="col-md-4 control-label" for="textinput">項目</label>'+
        '<div class="col-md-2">'+
        '<input id="textinput" name="voteClass_2_sub2" type="text" class="form-control input-md" required="">'+
        '</div></div>');
  });
  $('#createItem_2_sub3').click(function(event) {
    $("#voteClass_2_sub3").append('<div class="form-group">'+
        '<label class="col-md-4 control-label" for="textinput">項目</label>'+
        '<div class="col-md-2">'+
        '<input id="textinput" name="voteClass_2_sub3" type="text" class="form-control input-md" required="">'+
        '</div></div>');
  });
  //權重
  $('#createItem_3').click(function(event) {
    $("#voteClass_3").append('<div class="form-group">'+
        '<label class="col-md-4 control-label" for="textinput">項目</label>'+
        '<div class="col-md-2">'+
        '<input id="textinput" name="voteClass_3" type="text" class="form-control input-md" required="">'+
        '</div>'+
        '<div class="col-md-1">'+
        '<input id="textinput" name="VoteClass_3_weight" type="number" class="form-control input-md">'+
        '</div>'+
        '</div>');
  });
</script>

<?php 
  require_once("dbtools.inc.php");

    if(isset($_POST["subject"])){
      $title = $_POST['subject'];
      $subjectClass = $_POST['subjectClass'];
      $voteClass =$_POST['VoteClass'];
      $createDate = $_POST['createDate'];
      $endDate = $_POST['endDate'];
     

      $options;
      $options_2b;
      $options_2c;
      $weight;
      if($voteClass=="1"){
        $options = $_POST['VoteClass_1'];  
      }else if($voteClass=="2"){
        $options = $POST['VoteClass_2_sub1'];
        $options_2b = $POST['VoteClass_2_sub2'];
        $options_2c = $POST['VoteClass_2_sub3'];
      }else{
        $options = $_POST['VoteClass_3'];
        $weight = $_POST['VoteClass_3_weight'];
      }
      

    


      //取得登入者帳號及名稱
      if (isset($_COOKIE["login_user"]))
      {
        $login_user = $_COOKIE["login_user"];
        $login_name = $_COOKIE["login_name"];
      }
      
      $link = create_connection();


      $get_user_group_sql = 'SELECT group_name.name FROM groupMember,group_name,user WHERE '.$login_user.' = groupMember.memberID AND groupMember.groupID = group_name.groupID';

      $get_user_group_result = execute_sql($link,"TKUVoting",$get_user_group_sql);
      $get_user_group = mysqli_fetch_object($get_user_group_result)->name;



      $sql = "INSERT INTO voteSubject(title,createUser,voteClass,subjectClass,group_name,createDate,endDate) VALUES('$title','$login_user','$voteClass','$subjectClass','$get_user_group','$createDate','$endDate');";
      $result = execute_sql($link,"TKUVoting",$sql);
      //mysqli_free_result($result);

      
      $get_subjectID_sql = "SELECT subjectID FROM voteSubject WHERE title='".$title."'";
      $get_subjectID_1 = execute_sql($link,"TKUVoting",$get_subjectID_sql);
      $get_subjectID = mysqli_fetch_object($get_subjectID_1)->subjectID;
      echo $get_subjectID;
      //mysqli_free_result($get_subjectID);

      if($voteClass=="1"){
          for($i=1;$i<=count($options);$i++){
            $item_sql = "INSERT INTO voteItem(subjectID,itemValue,name,score) VALUES('$get_subjectID','".$i."','".$options[$i-1]."',0);";
            execute_sql($link,"TKUVoting",$item_sql);
          };
      }else if($voteClass=="2"){
        for($i=0;$i<count($options);$i++){
            $item_sql = "INSERT INTO voteItem_multi(subjectID,stepIndex,name,score) VALUES('$get_subjectID',1,'".$options[$i]."',0);";
            execute_sql($link,"TKUVoting",$item_sql);
        };
        for($i=0;$i<count($options_2b);$i++){
            $item_sql = "INSERT INTO voteItem(subjectID,itemValue,name,score) VALUES('$get_subjectID',2,'".$options_2b[$i]."',0);";
            execute_sql($link,"TKUVoting",$item_sql);
          };
        for($i=0;$i<count($options_2c);$i++){
            $item_sql = "INSERT INTO voteItem(subjectID,itemValue,name,score) VALUES('$get_subjectID',3,'".$options_2c[$i]."',0);";
            execute_sql($link,"TKUVoting",$item_sql);
          };
      }else{
        for($i=0;$i<count($options);$i++){
            $item_sql = "INSERT INTO voteItem_weight(subjectID,weight,name,score) VALUES('$get_subjectID',".$weight[$i].",'".$options[$i]."',0);";
            execute_sql($link,"TKUVoting",$item_sql);
        };
      }


      //$get_subject_sql = "SELECT * FROM voteSubject";
      //$get_subjectID = execute_sql($link,$get_subject_sql);
      //$subjectID 

      mysqli_close($link);

  };



?>
</body>
</html>
