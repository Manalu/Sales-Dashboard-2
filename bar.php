<!--__Author__="Antariksh"-->
<?php
session_start();
//echo $json;
error_reporting(0);
if(isset($_SESSION['logged_in']) ) 
{
include 'json_encode.php';
include 'dash.php';
?>
 <script type="text/javascript" src="canvasjs.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>   	
	
<script type="text/javascript">
//********************************************************************************************************************************************
  
  function chartUP(dps,x,str1){
  
   var chart1 = new CanvasJS.Chart(x, {
			  colorSet: "greenShades",
			  theme: "theme1",
			 
			   title:{
				fontSize: 15,
                 text:str1,
				  fontFamily: "Verdana",
                fontColor: "Peru"         
             },
			 axisX: {				
				labelFontSize: 12,
				valueFormatString: " ",
				labelFontColor: "red",
				
				},
			 axisY: {				
				suffix: " %",
				labelFontSize: 15,
				labelFontColor: "red",
				stripLines:[{
							value:100,
							thickness:3,
							labelBackgroundColor:"white",
							labelFontSize:18,
							color:"red",
							label : "Target",
							labelFontColor: "red",
							labelFontFamily: "Georgia"
							}]
				},
              data: [              
              {
                  type: "column",
				 bevelEnabled: true,
				indexLabel: "{y} %",
				indexLabelFontFamily:"Verdana",
				indexLabelPlacement:"outside",
				indexLabelOrientation: "horizontal",
				indexLabelFontSize:"13",
				indexLabelFontColor:"red",
				dataPoints: dps
				}
              ]
          });

return chart1;
  
  }
  
  
  //*******************************************************************************************************************************************************
      window.onload = function () {
	    CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#1A0000",			
                "#330000",
                "#4C0000",
                "#660000",
                "#800000",
				"#990000",
				"#B20000",
                "#CC0000",
                "#E60000",
				"#FF0000",
				"#FF1919",
                "#FF3333",
                "#FF4D4D",
				"#FF6666",
                "#FF8080",
				"#FF9999",
				"#FFB2B2",
				"#FFCCCC",
				"#FFE6E6",
				
					
                ]);
//*************************************************************************************************************************************************			
 function chart_lower(x) {
    var chart_low = new CanvasJS.Chart(x,
    {
	 title:{
        text: ""
      },
	  			 axisX: {				
				labelFontSize: 12,
				labelFontColor: "red",
				},
							 axisY: {				
				labelFontSize: 12,
				labelFontColor: "red",
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)"
									},
      legend: {
        cursor:"pointer",
        itemclick : function(e) {
          if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              e.dataSeries.visible = false;
          }
          else {
              e.dataSeries.visible = true;
          }
          chart_low.render();
        }
      },
        toolTip: {
        shared: true,  
        content: function(e){
          var str = '';
          var total = 0 ;
          var str3;
          var str2 ;
          for (var i = 0; i < e.entries.length; i++){
            var  str1 = "<span style= 'color:"+e.entries[i].dataSeries.color + "'> " + e.entries[i].dataSeries.name + "</span>: <strong>"+  e.entries[i].dataPoint.y + "</strong> <br/>" ; 
            total = e.entries[i].dataPoint.y + total;
            str = str.concat(str1);
          }
          str2 = "<span style = 'color:DodgerBlue; '><strong>"+e.entries[0].dataPoint.label + "</strong></span><br/>";
          str3 = "<span style = 'color:Tomato '>Total: </span><strong>" + total + "</strong><br/>";
          
          return (str2.concat(str));
        }

      },
      data: [
      {        
        type: "column",
        name: "M-1",
		color: "#0074D9 ",
       	indexLabelFontFamily:"Verdana",
		indexLabelPlacement:"outside",
		indexLabelOrientation: "horizontal",
		indexLabelFontSize:"13",
		indexLabelFontColor:"red",
				
        dataPoints: [
        { y: 198, label: "GSV"},
        { y: 201, label: "Units"},
        { y: 202, label: "Order"},        
        { y: 236, label: "PCB"},        
        { y: 395, label: "CM"},        
        { y: 957, label: "GM"}
        ]
      },
      {        
        type: "column",
        name: "M",
		color: "#4192D9 ",
        dataPoints: [
		{ y: 198, label: "GSV"},
        { y: 201, label: "Units"},
        { y: 202, label: "Order"},        
        { y: 236, label: "PCB"},        
        { y: 395, label: "CM"},        
        { y: 957, label: "GM"}
		


        ]
      },
      {        
        type: "column",
        name: "Target",
		color: "#7ABAF2 ",
        dataPoints: [
         { y: 198, label: "GSV"},
        { y: 201, label: "Units"},
        { y: 202, label: "Order"},        
        { y: 236, label: "PCB"},        
        { y: 395, label: "CM"},        
        { y: 957, label: "GM"}
					]
      }

      ]
    });
return chart_low;
}
	var o = "MTD";
	var i = "Till Now"
	
	var dps = [{"label":"GSV","y":123},{"label":"GM","y":-4},{"label":"CM","y":10},{"label":"Orders","y":20},{"label":"Units","y":30},{"label":"PCB","y":40}];			
  var chart1 = chartUP(dps,"chart1Container",o);
  chart1.render();
  chart1 = chartUP(dps,"chart2Container",i);
  chart1.render();
  
  chart1 = chart_lower("chart3Container");
  chart1.render();
  
  
				}
				
//**************************************************************************************************************************************************8
  </script>

  <div id="chart1Container" style=" height: 240px;padding-right:10px;padding-left:10px; width: 50%;design: inline-align;float:left;padding-top:20px"><h2>Loading...</h2></div>
 
 

 <div id="chart2Container" style="height: 240px; width: 50%;padding-right:30px;padding-left:15px;design: inline-align;float:left;padding-top:20px"><h2>Loading...</h2></div>
   
  
  
   
   <div id="chart3Container" style="height: 300px; width: 100%;design: inline-align;float:left;"><h2>Loading...</h2></div>
  
   

  
  </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper test.php -->

    </div>
    <!-- /#wrapper test.php -->

   

   
</body>

</html>

<?php } 
else{

header("location:login.php");

} ?>
