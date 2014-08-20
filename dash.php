<?php 
//error_reporting(0);	 
session_start();
$username= $_SESSION['username'];
$id = $_SESSION['id'];
$status = $_SESSION['logged_in'];

include('connection.php');


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="author" content="Antariksh">
    <link rel="icon" href="../../favicon.ico">

    <title>FA DASHBOARD</title>
<!--DATATABLES-->
	
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.0/css/jquery.dataTables.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
 
 <!--DATATABLES-->
 
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

   
	<!--Updated-->
	 
    <!-- Bootstrap Core CSS -->
    <link href="/dash/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS TEMPLATE-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts SELECT-->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.3.5/bootstrap-select.min.js" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.3.5/bootstrap-select.min.css" type="text/css">
	
	<!--Jquery-->
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
	<!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	 
	<!--end-->
	

	 <script type="text/javascript">
$(document).ready(function(){
	$("#speed").change(function(){
	//var ajaxloader = "<img src="" />";
		var optId = $("#speed").val();
		$.ajax({
			type: "GET",
			url:"data.php?id="+optId,
			success: function(response){
			$("#files").html(response);
			}
		});
	});
});


</script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#loading')
            .hide()
            .ajaxStart(function() {
                $(this).fadeIn();
            })
            .ajaxStop(function() {
                $(this).fadeOut();
            });
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#speed").change(function(){
	//var ajaxloader = "<img src="/dash/loader.gif" />";
		var optId = $("#speed").val();
		var optId2=$("#number").val();
		$.ajax({
			type: "GET",
			url:"data_subcat.php?id="+optId,
			//+"&vertical_id="+optId2
			
			success: function(response){
			$("#number").html(response);
			}
		});
	});
});

$(document).ready(function(){
	$("#files").change(function(){
	//var ajaxloader = "<img src="" />";
		var optId = $("#speed").val();
		var optId2=$("#files").val();
		$.ajax({
			type: "GET",
			url:"data_subcat_vertical.php?id="+optId+"&vertical_id="+optId2,
			
			success: function(response){
			$("#number").html(response);
			}
		});
	});
});

</script>

<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">-->
</head>

  <body>
  
		<div id="wrapper">
			<!-- Navigation Top Bar-->
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<!--<a class="navbar-brand" href="/result/testsummary.php" > FA DASHBOARD</a>-->
					<a href="/dash/bar.php"><img src="/dash/icon.jpg" /></a>
				</div>
				<!-- Log out button -->
				<ul class="nav navbar-right top-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Welcome, <?php echo $_SESSION['username']; ?> !<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href="/dash/logout.php"><i class="fa fa-fw fa-user icon-large icon-user"></i> Log Out</a>
							</li>
							</ul>
					</li>
				</ul>
			<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav side-nav">
						<div class="nav">
						<li>
							<a href="/dash/bar.php"><i class="fa fa-fw fa-bar-chart-o"></i> Summary</a>
						</li>
						<li>
							<a href="/dash/key.php"><i class="fa fa-fw fa-key"></i> Key Metrics</a>
						</li>
						<li>
							<a href="/dash/key.php"><i class="fa fa-fw fa-yahoo"></i>How it works?</a>
						</li>
						</div>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</nav>
			<div id="page-wrapper">

				<div class="container-fluid">
					
					<!--Alert BOX-->
					<div class="row" style="padding-top:5px;">
						<div class="col-lg-12">
							<div class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-info-circle"></i>  <strong>Like FA Dashboard?</strong> Send us your reviews at antariksh.01@snapdeal.com !
								</div>
						</div>
					</div>
					<!-- /.row -->

					 <form class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET" >
		<div class="control-group">
		<div class="controls row" >
		
			<select name="speed" id="speed" class="filter form-control" style="width:25%;display:inline">
			<option value=''>ALL</option>
			<?php

			try{
			 $query = $pdo->prepare("SELECT DISTINCT(category), category_id FROM analytics_fashion.dashboard_cat_subcat_gid_mapping where group_id =?");	
			 $query->bindValue(1,$id);
			 $query->execute();
			 
			while($row = $query->fetch(PDO::FETCH_ASSOC))
		  {
		  echo "<option value=\"".$row['category_id']."\">".$row['category'].'</option>';
		  }
			 }
			catch(Exception $e){}
			?>
			
			</select>
			<select name="files" id="files" class="filter form-control" style="width:25%;display:inline">
			<option value="">Vertical</option>
			</select>
			<select name="number" id="number" class="filter form-control" style="width:25%;display:inline">
			<option value=''>Sub Category</option>
			</select>
			<input type="submit" value="Filter" class="btn btn-primary btn-small" id="FilterButton" style="width:23%;display:inline"/>
		</div>
		</div>
	</form>
			<!--LOADER-->
					<div class="row">
						<div class="col-lg-12" id="loading" style="display:table-cell; vertical-align:middle; text-align:center">
							<img src="/dash/Preloader_1.gif">
						</div>
					</div>		
					
					
	

	  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->

<?php //die(); ?>
