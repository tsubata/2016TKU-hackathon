<?php 
	require_once("dbtools.inc.php");

	$subjectID = $_GET['subjectID'];
	$link = create_connection();
	$sql = "SELECT * FROM voteItem where subjectID = ".$subjectID;
	$result = execute_sql($link,'TKUVoting',$sql);
    $total_record = mysqli_num_rows($result);

    $vote_array = array();
    $chart_array = array();
	for($i=0 ;$i<$total_record;$i++){

		$row = mysqli_fetch_assoc($result);
		$ItemID = $row["itemValue"];
		$ItemName = $row["name"];
		$VotingNum = $row["score"];
		$vote_array[$i] = array('ItemID' => $ItemID, 'ItemName' => $ItemName , 'VoingNum' => $VotingNum);
		$chart_array[$i] = array('category'=> $ItemName , 'value' => $VotingNum);
	};
	mysqli_free_result($result);
	$vote_json = json_encode($vote_array);
	$chart_json = json_encode($chart_array);
	


?>
<!DOCTYPE html>
<html>
<head>
    <title>voteItem</title>
    <meta charset="utf-8">
    <link href="./telerik.kendoui.professional.2016.1.226.trial/examples/content/shared/styles/examples-offline.css" rel="stylesheet">
    <link href="./telerik.kendoui.professional.2016.1.226.trial/styles/kendo.common.min.css" rel="stylesheet">
    <link href="./telerik.kendoui.professional.2016.1.226.trial/styles/kendo.rtl.min.css" rel="stylesheet">
    <link href="./telerik.kendoui.professional.2016.1.226.trial/styles/kendo.default.min.css" rel="stylesheet">
    <link href="./telerik.kendoui.professional.2016.1.226.trial/styles/kendo.dataviz.min.css" rel="stylesheet">
    <link href="./telerik.kendoui.professional.2016.1.226.trial/styles/kendo.dataviz.default.min.css" rel="stylesheet">
    <script src="./telerik.kendoui.professional.2016.1.226.trial/js/jquery.min.js"></script>
    <script src="./telerik.kendoui.professional.2016.1.226.trial/js/jszip.min.js"></script>
    <script src="./telerik.kendoui.professional.2016.1.226.trial/js/angular.min.js"></script>
    <script src="./telerik.kendoui.professional.2016.1.226.trial/js/kendo.all.min.js"></script>
    <script src="./telerik.kendoui.professional.2016.1.226.trial/examples/content/shared/js/console.js"></script>
    <link rel="shortcut icon" href="images/cena.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
            <li><a href="addVote.php">創建投票</a></li>
            <li><a href="manageSubject.php">管理投票</a></li>
            <li><a href="trackSubject.php">追蹤投票</a></li>
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
     <div id="ChartAlert" style="margin:10px 10px 10px 10px">
        <a class="offline-button" href="index.php" >Back</a>
    </div>
        <div id="example">
            <div id="grid"></div>
            <div id="details"></div>
            <div id="chart"></div>
            
        </div>
            <script>
               var wnd;
               var SearchWindow;
                $(document).ready(function () {
                    
                    wnd = $("#details")
                        .kendoWindow({
                            title: "感謝您的參與",
                            modal: true,
                            visible: false,
                            resizable: false,
                            width: 300
                        }).data("kendoWindow");

                    var dataSource = new kendo.data.DataSource({
                        pageSize: 6,
                        data: <?php echo $vote_json;?>,
                        autoSync: true,
                        schema: {
                            model: {
                                id: "ItemID",
                                fields: {
                                    ItemID: { editable: false, nullable: true },
                                    ItemName: { editable: false,validation: { required: true} },
                                    VoingNum: { editable: false,type: "number", validation: { required: true, min: 1}  },
                                }
                        }   }
                      
                    });
                    

                    $("#grid").kendoGrid({
                        toolbar: ["excel"],
                        excel: {
                                    fileName: <?php echo'"subjectID_'.$subjectID.'.xlsx"' ?>,
                                    proxyURL: "//demos.telerik.com/kendo-ui/service/export",
                                    filterable: true
                        },
                        dataSource: dataSource,
                        filterable: true,
                        groupable: true,
                        pageable: true,
                        height: 400,
                        selectable: "multiple",
                        columns: [
                            { width: 300,field: "ItemID", title: "投票ID" },
                            { width: 300,field: "ItemName",title: "投票項目"},
                            { width: 300,field: "VoingNum", title: "投票數" },
                            { width: 300,command:{ text: "vote", click: vote }, title: " ", width: "150px"}
                        ],
                        editable: true
                    });
                    
                    function createChart() {
                        $("#chart").kendoChart({
                            title: {
                            text: "統計圓餅圖"
                            },
                            legend: {
                                position: "bottom"
                            },
                            seriesDefaults: {
                               labels: {
                                    template: "#= category # - #= kendo.format('{0:P}', percentage)#",
                                    position: "outsideEnd",
                                    visible: true,
                                    background: "transparent"
                                }
                            },
                            series: [{
                                type: "pie",
                                data: <?php echo $chart_json; ?>
                            }],
                            tooltip: {
                                visible: true,
                                template: "#= category # - #= kendo.format('{0:P}', percentage) #"
                            }
                        });
                    }
                    $(document).ready(createChart);
                    $(document).bind("kendo:skinChange", createChart);
                    $(".k-grouping-header").text("將標題至此即可排序");
                    $('html,body').animate({scrollTop:$('#grid').offset().top}, 800);
                });

            </script>
               
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
    </script>

    <form id='addScoreForm'action="addscore.php" method="post">
    	<input hidden="true" id = "subjectID" name="subjectID" value=""></input>
    	<input hidden="true" id = "ItemValue" name="ItemValue" value=""></input>
   	</form> 
</body>

<script type="text/javascript">
        function vote(e) {
                    e.preventDefault();
					var dataItem = this.dataItem($(e.currentTarget).closest("tr"));

                    $('#subjectID').val(<?php echo $subjectID;?>);
                    $('#ItemValue').val(dataItem.ItemID);
                    
                     //console.log(('#FsubjectID').val());
                     //console.log(('#FItemValue').val());
                    
                    //wnd.content("您投了"+dataItem.ItemID+"2票");
                    alert("您投了  "+dataItem.ItemName+"1票");

                    wnd.center().open();
                                 $('#addScoreForm').submit();

        }
        function refresh() {
            var chart = $("#chart").data("kendoChart"),
                pieSeries = chart.options.series[0],
                labels = $("#labels").prop("checked"),
                alignInputs = $("input[name='alignType']"),
                alignLabels = alignInputs.filter(":checked").val();

            chart.options.transitions = false;
            pieSeries.labels.visible = labels;
            pieSeries.labels.align = alignLabels;

            alignInputs.attr("disabled", !labels);

            chart.refresh();
        }
</script>>
</html>
