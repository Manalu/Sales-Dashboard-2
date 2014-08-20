<?php
include('connection.php');
$gid= $_SESSION['id'];
$vertical = $_GET['files'];
$cat = $_GET['speed'];
$subcat = $_GET['number'];
//Metric,Till_now,Today_Trending,Five_day_avg,D_minus_Two,Yesterday,highest,lowest,STLW,target,Run_Rate
$select = "SELECT * FROM analytics_fashion.dashboard_keymetrics_master WHERE group_id=".$gid." ";
$catQ = "And category_id=? ";
$subcatQ = "And subcat_id=? ";
$verticalQ = "And vertical_id=? ";
$cat_NULL="AND catergory_id is NULL ";
$vertical_NULL=" AND vertical_id is NULL ";
$subcat_NULL=" AND subcat_id is NULL ";
$query = "";
try
{
//all empty
	if(empty($subcat) and empty($cat) and empty($vertical)){
		$query = "SELECT * FROM analytics_fashion.dashboard_keymetrics_master WHERE group_id=? AND category_id IS NULL AND subcat_id IS NULL AND vertical_id IS NULL ";
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$gid);
	$statement->execute();
	
	}
	//empty subcat and vertical
	if(empty($subcat) and !empty($cat) and empty($vertical)){
	$query = $select.$catQ.$vertical_NULL.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->execute();
	
	}
	//empty subcat 
	if(empty($subcat) and !empty($cat) and !empty($vertical)){
	$query = $select.$catQ.$verticalQ.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$vertical);
	$statement->execute();
	
	}
	//empty vertical
	if(empty($vertical) and !empty($cat) and !empty($subcat)){
	$query = $select.$catQ.$subcatQ.$vertical_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$subcat);
	$statement->execute();
	
	}
	//all variables set
	if(!empty($vertical) and !empty($cat) and !empty($subcat)){
	$query = $select.$catQ.$subcatQ.$verticalQ;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$subcat);
	$statement->bindValue(3,$vertical);
	$statement->execute();
	
	}
}
catch(Exception $e){
echo "<h1>"."Wrong Selection. Please check the selection."."<br/>"."If the problem exists for longer period of time please report the error to the Fashion Analytics Team"."</h1>";
}
	?>	