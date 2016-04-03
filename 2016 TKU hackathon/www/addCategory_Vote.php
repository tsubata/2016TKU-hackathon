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
                <a href="#" class="k-button" id="save">創建/修改</a>
                <input type="text" name="title" value="">
                <input type="submit" >
            </div>
            <script src="./js/ItemTable.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function () {
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
                                }
                        }   }
                      
                    });
         $("#grid").kendoGrid({
                        toolbar: ["create"],
                        excel: {
                                    fileName: "Kendo UI Grid Export.xlsx",
                                    proxyURL: "//demos.telerik.com/kendo-ui/service/export",
                                    filterable: true
                        },
                        pageable: true,
                        height: 400,
                        width:100,
                        selectable: "multiple",
                        resizable :true,
                        columns: [
                            { width: 50,field: "SubjectID",title: "主題ID"},
                            { width: 50,field: "ItemID",title: "項目ID"},
                            { width: 100,field: "ItemName", title: "項目名稱" },                          
                        ],
                        editable: true
                    });
          $("#grid2").kendoGrid({
                        toolbar: ["create"],
                        excel: {
                                    fileName: "Kendo UI Grid Export.xlsx",
                                    proxyURL: "//demos.telerik.com/kendo-ui/service/export",
                                    filterable: true
                        }, 

                        pageable: true,
                        height: 400,
                        width:100,
                        selectable: "multiple",
                        resizable :true,
                        columns: [
                            { width: 50,field: "SubjectID",title: "主題ID"},
                            { width: 50,field: "ItemID",title: "項目ID"},
                           { width: 100,field: "ItemName", title: "項目名稱" },
                           
                        ],
                        editable: true
                    });
           $("#grid3").kendoGrid({
                        toolbar: ["create"],
                        excel: {
                                    fileName: "Kendo UI Grid Export.xlsx",
                                    proxyURL: "//demos.telerik.com/kendo-ui/service/export",
                                    filterable: true
                        },
                        pageable: true,
                        height: 400,
                        width:100,
                        selectable: "multiple",
                        resizable :true,
                        columns: [
                            { width: 50,field: "SubjectID",title: "主題ID"},
                            { width: 50,field: "ItemID",title: "項目ID"},
                          { width: 100,field: "ItemName", title: "項目名稱" },
                           
                        ],
                        editable: true
                    });
           });
    </script>     

</body>
<form action="voteItemMulti.php?subjectID=" method="post">

     <input hidden="true" name="stepIndex" value="">    

</form>
<script type="text/javascript">
                    $("#save").click(function (e) {
                        $("#grid tr td").each(function(){
                            console.log($(this).text());
                        });
                        $("#grid2 tr td").each(function(){
                            console.log($(this).text());
                        });
                        $("#grid3 tr td").each(function(){
                            console.log($(this).text());
                        });
                       
                    });

</script>>
</html>
