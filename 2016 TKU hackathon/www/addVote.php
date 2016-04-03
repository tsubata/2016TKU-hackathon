<?php 
    require_once("dbtools.inc.php");

if(isset($_COOKIE["login_user"])){
    $login_user = $_COOKIE["login_user"];

    $link = create_connection();
    $sql = "SELECT * FROM voteSubject where createUser = ".$login_user ;
    $result = execute_sql($link,'TKUVoting',$sql);
    $total_record = mysqli_num_rows($result);

    $vote_array = array();
    $chart_array = array();
    for($i=0 ;$i<$total_record;$i++){

        $row = mysqli_fetch_assoc($result);
        $subjectID = $row["subjectID"];
        $ItemName = $row["name"];
        $VotingNum = $row["score"];
        $vote_array[$i] = array('ItemID' => $ItemID, 'ItemName' => $ItemName , 'VoingNum' => $VotingNum);
        $chart_array[$i] = array('category'=> $ItemName , 'value' => $VotingNum);
      
    };
    mysqli_free_result($result);
    $vote_json = json_encode($vote_array);
    $chart_json = json_encode($chart_array); 
}else{
    header("location:login.php");
}




?>
<!DOCTYPE html>
<html>
<head>
    <title>add/manageSubject</title>
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
            <li><a href="addVote.php">創建/管理投票</a></li>
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

    <div style=" text-align:center"> <img src="images/dusk.jpg" style="max-width: 100%;opacity:0.7"></div>
     <div id="ChartAlert" style="margin:10px 10px 10px 10px">
        <a class="offline-button" href="addVote.php" >Back</a>
    </div>
     <div id="ChartAlert"></div>
            <script src="./js/ItemTable.js" type="text/javascript"></script>
            <script src="./js/productschart.js" type="text/javascript"></script>
        <div id="example">
            <div id="grid"></div>
            <div id="details"></div>  
            <div id="chart"></div>  
        </div>
            <script>
               var wnd;
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
                        data: ItemTable,
                        autoSync: true,
                        schema: {
                            model: {
                                id: "ID",
                                fields: {
                                    SubjectID: { editable: false ,validation:{ required: true} ,type: "number"},
                                    ItemName: { editable: true,validation: { required: true} },
                                    ItemID: { editable: false,type: "number"},
                                    TotalVoteNum: { editable: false,type: "number" },
                                    
                                }
                        }   }
                      
                    });
                    

                    $("#grid").kendoGrid({
                        toolbar: ["create","excel"],
                        excel: {
                                    fileName: "Kendo UI Grid Export.xlsx",
                                    proxyURL: "//demos.telerik.com/kendo-ui/service/export",
                                    filterable: true
                        },
                        dataSource: dataSource,
                        filterable: true,
                        groupable: true,
                        pageable: true,
                        height: 400,
                        selectable: "multiple",
                        resizable :true,
                        columns: [
                            { width: 50,field: "SubjectID",title: "主題ID"},
                            { width: 50,field: "ItemID",title: "項目ID"},
                            { width: 300,field: "ItemName", title: "項目名稱" },
                            { width: 50,field: "TotalVoteNum", title: "投票數" },
                            { width: 50,command:{ text: "儲存", click: save }, title: " ", width: "150px"},
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
                                data: chartproducts 
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
                });

            </script>
               
        </div>
        

    
</body>

<script type="text/javascript">
        function save(e) {
                    e.preventDefault();

                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    wnd.content("儲存"+dataItem.ItemName+"成功");
                    alert("我要傳到PHP幫你加票數哦!");
                    wnd.center().open();
        }
        function edit(e) {
                 alert("跳轉到增加項目頁!")   
        }
        
</script>>
</html>
