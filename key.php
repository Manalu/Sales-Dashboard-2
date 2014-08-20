<?php
session_start();
error_reporting(0);
if(isset($_SESSION['logged_in']) )
{
include 'filter.php';
include 'dash.php';



?>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').dataTable();
	
} );
</script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('#loading')
            .hide()
            .ajaxStart(function() {
                $(this).show();
            })
            .ajaxStop(function() {
                $(this).hide();
            });
    });
</script>

<div style="padding: 20px;">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>   	
		
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.0/css/jquery.dataTables.css">
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
 
 <!--DATATABLES-->
	
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
 <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>Metrics</th>
				<th>Till Now</th>
                <th>Today Trending</th>
                <th>5 Day Average</th>
				<th>Yesterday</th>
				<th>Highest</th>
				<th>Lowest</th>
				<th>STLW</th>
				<th>Target</th>
				<th>Run Rate</th>
            </tr>
        </thead>
		<tfoot>
            <tr>
				<th>Metrics</th>
				<th>Till Now</th>
                <th>Today Trending</th>
                <th>5 Day Average</th>
				<th>Yesterday</th>
				<th>Highest</th>
				<th>Lowest</th>
				<th>STLW</th>
				<th>Target</th>
				<th>Run Rate</th>
            </tr>
        </tfoot>
 
        <tbody>
<?php

while($row = $statement->fetch(PDO::FETCH_ASSOC)){
echo '<tr>';
echo '<td>'.'<strong>'.$row['metric'].'</strong>'.'</td>';

//Till Now

if($row['metric']=='AOV' || $row['metric']=='ASV' || $row['metric']=='GSV' ||$row['metric']=='Orders' || $row['metric']=='Units'||$row['metric']=='Visits' ){
							echo '<td>'.number_format($row['Till_Now']).'</td>';}
else {						echo '<td>'.number_format($row['Till_Now'], 2, '.', '').'</td>';		}

//Trending
if($row['metric']=='AOV' || $row['metric']=='ASV' || $row['metric']=='GSV' ||$row['metric']=='Orders' || $row['metric']=='Units'||$row['metric']=='Visits' ){
							echo '<td>'.number_format($row['Trending']).'</td>';}
else{						echo '<td>'.number_format($row['Trending'], 2, '.', '').'</td>'; }

//5_days_avg
if($row['metric']=='AOV' || $row['metric']=='ASV' || $row['metric']=='GSV' ||$row['metric']=='Orders' || $row['metric']=='Units'||$row['metric']=='Visits' ){
							echo '<td>'.number_format($row['5_days_avg']).'</td>';						}
else{						echo '<td>'.number_format($row['5_days_avg'],2,'.','').'</td>';				}

//Yesterday
if($row['metric']=='AOV' || $row['metric']=='ASV' || $row['metric']=='GSV' ||$row['metric']=='Orders' || $row['metric']=='Units'||$row['metric']=='Visits' ){					
							echo '<td>'.number_format($row['Yesterday']).'</td>'; }
else 					{	echo '<td>'.number_format($row['Yesterday'],2,'.','').'</td>'; }							
//Highest

if($row['metric']=='AOV' || $row['metric']=='ASV' || $row['metric']=='GSV' ||$row['metric']=='Orders' || $row['metric']=='Units'||$row['metric']=='Visits' ){					
							echo '<td>'.number_format($row['Highest']).'</td>';	}
else 					{   echo '<td>'.number_format($row['Highest'],2,'.','').'</td>';	}
//Lowest
if($row['metric']=='AOV' || $row['metric']=='ASV' || $row['metric']=='GSV' ||$row['metric']=='Orders' || $row['metric']=='Units'||$row['metric']=='Visits' ){
							echo '<td>'.number_format($row['Lowest']).'</td>';     }
else					{	echo '<td>'.number_format($row['Lowest'],2,'.','').'</td>';		}
//STLW
if($row['metric']=='AOV' || $row['metric']=='ASV' || $row['metric']=='GSV' ||$row['metric']=='Orders' || $row['metric']=='Units'||$row['metric']=='Visits' ){
							echo '<td>'.number_format($row['stlw']).'</td>';	}
else 					{	echo '<td>'.number_format($row['stlw'],2,'.','').'</td>';	}

//Target
if($row['metric']=='AOV' || $row['metric']=='ASV' || $row['metric']=='GSV' ||$row['metric']=='Orders' || $row['metric']=='Units'||$row['metric']=='Visits' ){							
							echo '<td>'.number_format($row['Target']).'</td>';			}
else{						echo '<td>'.number_format($row['Target'],2,'.','').'</td>';	}

//Run Rate
if($row['metric']=='AOV' || $row['metric']=='ASV' || $row['metric']=='GSV' ||$row['metric']=='Orders' || $row['metric']=='Units'||$row['metric']=='Visits' ){
							echo '<td>'.number_format($row['RR']).'</td>';				}
else{						echo '<td>'.number_format($row['RR'], 1, '.', '').'</td>';	}
echo '</tr>';
}
 ?>


        </tbody>
    </table>
	</div>
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
