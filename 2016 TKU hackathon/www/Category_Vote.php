<?php 
    require_once("dbtools.inc.php");
    $link = create_connection();

    $sql = "SELECT * FROM voteItem_multiv WHERE stepIndex=1";

    $result = execute_sql($link,'TKUVoting',$sql);
    $total_record = mysqli_num_rows($result);

    $vote_array = array();
    $chart_array = array();
    for($i=0 ;$i<$total_record;$i++){

        $row = mysqli_fetch_assoc($result);
        $ItemID = $row["itemValue"];
        $ItemName = $row["name"];
        $vote_array[$i] = array('ItemID' => $ItemID, 'ItemName' => $ItemName);
        //$chart_array[$i] = array('category'=> $ItemName , 'value' => $VotingNum);
    };
    mysqli_free_result($result);
    $vote_json = json_encode($vote_array);
    //$chart_json = json_encode($chart_array);


    $sql = "SELECT * FROM voteItem_multiv WHERE stepIndex=2";

    $result = execute_sql($link,'TKUVoting',$sql);
    $total_record = mysqli_num_rows($result);

    $vote_array = array();
    $chart_array = array();
    for($i=0 ;$i<$total_record;$i++){

        $row = mysqli_fetch_assoc($result);
        $ItemID = $row["itemValue"];
        $ItemName = $row["name"];
        $vote_array[$i] = array('ItemID' => $ItemID, 'ItemName' => $ItemName);
        //$chart_array[$i] = array('category'=> $ItemName , 'value' => $VotingNum);
    };
    mysqli_free_result($result);
    $vote_json2 = json_encode($vote_array);
    //$chart_json = json_encode($chart_array);

    $sql = "SELECT * FROM voteItem_multiv WHERE stepIndex=3";

    $result = execute_sql($link,'TKUVoting',$sql);
    $total_record = mysqli_num_rows($result);

    $vote_array = array();
    $chart_array = array();
    for($i=0 ;$i<$total_record;$i++){

        $row = mysqli_fetch_assoc($result);
        $ItemID = $row["itemValue"];
        $ItemName = $row["name"];
        $vote_array[$i] = array('ItemID' => $ItemID, 'ItemName' => $ItemName);
        //$chart_array[$i] = array('category'=> $ItemName , 'value' => $VotingNum);
    };
    mysqli_free_result($result);
    $vote_json3 = json_encode($vote_array);
    //$chart_json = json_encode($chart_array);
    
    

 ?>
 <!DOCTYPE html>
<html>
<head>
    <title></title>
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
    <div>
        <div id="grid" style="width: 300px ;float: left;"></div>
        <div id="grid2" style="width: 300px ; float: left;"></div>
        <div id="grid3"style="width: 300px ; float: left;"></div>
    </div>
     <div class="box wide">
                <a href="#" class="k-button" id="save">voitng</a>
                <br></br>
                <div>
                    <label for="search">固定第一層</label>
                    <input type=number id="first_search" value="" />
                </div>
                <div>
                    <label for="search">固定第二層</label>
                    <input type=number id="second_search" value="" />
                </div>
                <div>
                    <label for="search">固定第三層</label>
                    <input type=number id="third_search" value="" />
                </div>
                <div>
                    <button>查看圖表</button>
                </div>
                <div id="chart"></div>  

     </div>
            <!--<script src="C:/Users/user/Desktop/ItemTable.js" type="text/javascript"></script>
            <script src="C:/Users/user/Desktop/productschart.js" type="text/javascript"></script>-->
    <script type="text/javascript">
    $(document).ready(function () {

                    
        var dataSource = new kendo.data.DataSource({
                        pageSize: 6,
                        data: <?php echo $vote_json;?>,
                        autoSync: true,
                        schema: {
                            model: {
                                id: "ID",
                                fields: {      
                                                                
                                    ItemName: { editable: false,validation: { required: true} },
                                    ItemID: { editable: false,type: "number"},
                                }
                        }   }
                      
                    });

        var dataSource2 = new kendo.data.DataSource({
                        pageSize: 6,
                        data: <?php echo $vote_json2;?>,
                        autoSync: true,
                        schema: {
                            model: {
                                id: "ID",
                                fields: {      
                                                                
                                    ItemName: { editable: false,validation: { required: true} },
                                    ItemID: { editable: false,type: "number"},
                                }
                        }   }
                      
                    });

        var dataSource3 = new kendo.data.DataSource({
                        pageSize: 6,
                        data: <?php echo $vote_json3;?>,
                        autoSync: true,
                        schema: {
                            model: {
                                id: "ID",
                                fields: {      
                                                                
                                    ItemName: { editable: false,validation: { required: true} },
                                    ItemID: { editable: false,type: "number"},
                                }
                        }   }
                      
                    });
         $("#grid").kendoGrid({
                        excel: {
                                    fileName: "Kendo UI Grid Export.xlsx",
                                    proxyURL: "//demos.telerik.com/kendo-ui/service/export",
                                    filterable: true
                        },
                        dataSource: dataSource,
                        pageable: true,
                        height: 400,
                        width:100,
                        selectable: "multiple",
                        resizable :true,
                        columns: [
                            { width: 50,field: "ItemID",title: "項目ID"},
                            { width: 100,field: "ItemName", title: "項目名稱" },                          
                        ],
                        editable: true
                    });
          $("#grid2").kendoGrid({
                        excel: {
                                    fileName: "Kendo UI Grid Export.xlsx",
                                    proxyURL: "//demos.telerik.com/kendo-ui/service/export",
                                    filterable: true
                        }, 
                        dataSource: dataSource2, 
                        pageable: true,
                        height: 400,
                        width:100,
                        selectable: "multiple",
                        resizable :true,
                        columns: [

                            { width: 50,field: "ItemID",title: "項目ID"},
                           { width: 100,field: "ItemName", title: "項目名稱" },
                           
                        ],
                        editable: true
                    });
           $("#grid3").kendoGrid({
                        excel: {
                                    fileName: "Kendo UI Grid Export.xlsx",
                                    proxyURL: "//demos.telerik.com/kendo-ui/service/export",
                                    filterable: true
                        },
                        dataSource: dataSource3,
                        pageable: true,
                        height: 400,
                        width:100,
                        selectable: "multiple",
                        resizable :true,
                        columns: [
                            { width: 50,field: "ItemID",title: "項目ID"},
                          { width: 100,field: "ItemName", title: "項目名稱" },
                           
                        ],
                        editable: true
                    });
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
    </script>     

</body>

<script type="text/javascript">
                    $("#save").click(function (e) {
                        $("#grid tr[class*='k-state-selected'] td:first").each(function(){
                            console.log($(this).text());
                        });
                        $("#grid2 tr[class*='k-state-selected'] td:first").each(function(){
                            console.log($(this).text());
                        });
                        $("#grid3 tr[class*='k-state-selected'] td:first").each(function(){
                            console.log($(this).text());
                        });
                       
                    });

</script>>
</html>
