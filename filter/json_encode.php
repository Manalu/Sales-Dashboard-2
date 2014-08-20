<!--__Author__="Antariksh"-->
<?php
include('connection.php');
session_start();
$gid= $_SESSION['id'];
$vertical = $_GET['files'];
$cat = $_GET['speed'];
$subcat = $_GET['number'];

$query_select_mtd="SELECT METRIC as label,per_MTD as y from analytics_fashion.dashboard_final_summary where Group_id=".$gid." ";
$query_select_live="SELECT METRIC as label,per_LIVE as y from analytics_fashion.dashboard_final_summary where Group_id=".$gid." ";
$query_select_prev="SELECT METRIC as label,Last_Month as y from analytics_fashion.dashboard_final_summary where Group_id=".$gid." ";
$query_select_cur="SELECT METRIC as label,Today as y from analytics_fashion.dashboard_final_summary where Group_id=".$gid." ";
$query_select_target="SELECT METRIC as label,Target as y from analytics_fashion.dashboard_final_summary where Group_id=".$gid." ";

$query_cat = " And category_id=? ";
$query_subcat = " And subcategory_id=? ";
$query_vertical = " And vertical_id=? ";

$cat_NULL=" AND category_id is NULL ";
$vertical_NULL=" AND vertical_id is NULL ";
$subcat_NULL=" AND subcategory_id is NULL ";

$query="";
$row="";
$json1= array();
$json2= array();
$json3 = array();
$json4 = array();
$json5 = array();
try{

//DEFAULT View 
if(empty($subcat) and empty($cat) and empty($vertical))
	
	{
	
	//mtd data
	$query = $query_select_mtd.$cat_NULL.$vertical_NULL.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json1= json_encode($row,JSON_NUMERIC_CHECK);
		
	//live data
	$query = $query_select_live.$cat_NULL.$vertical_NULL.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->execute();
	$row= $statement->fetchAll(PDO::FETCH_OBJ);
	$json2=json_encode($row,JSON_NUMERIC_CHECK);
	
	//prev month value
	$query = $query_select_prev.$cat_NULL.$vertical_NULL.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->execute();
	$row= $statement->fetchAll(PDO::FETCH_OBJ);
	$json3=json_encode($row,JSON_NUMERIC_CHECK);
	
	//current month value
	$query = $query_select_cur.$cat_NULL.$vertical_NULL.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->execute();
	$row= $statement->fetchAll(PDO::FETCH_OBJ);
	$json4=json_encode($row,JSON_NUMERIC_CHECK);
	
	//target
	$query = $query_select_target.$cat_NULL.$vertical_NULL.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->execute();
	$row= $statement->fetchAll(PDO::FETCH_OBJ);
	$json5=json_encode($row,JSON_NUMERIC_CHECK);
		
	}
	
	
	
	//empty subcat and vertical
	if(empty($subcat) and !empty($cat) and empty($vertical))
	{
	//mtd data
	$query = $query_select_mtd.$query_cat.$vertical_NULL.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json1= json_encode($row,JSON_NUMERIC_CHECK);
	//live data
	$query = $query_select_live.$query_cat.$vertical_NULL.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json2= json_encode($row,JSON_NUMERIC_CHECK);
	//prev month
	$query = $query_select_prev.$query_cat.$vertical_NULL.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json3= json_encode($row,JSON_NUMERIC_CHECK);
	//current month
	$query = $query_select_cur.$query_cat.$vertical_NULL.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json4= json_encode($row,JSON_NUMERIC_CHECK);
		//target
	$query = $query_select_target.$query_cat.$vertical_NULL.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json5= json_encode($row,JSON_NUMERIC_CHECK);
		
	}
	
	
	
	//empty subcat 
	if(empty($subcat) and !empty($cat) and !empty($vertical))
	{
	//mtd data
	$query = $query_select_mtd.$query_cat.$query_vertical.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$vertical);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json1= json_encode($row,JSON_NUMERIC_CHECK);
	
	//live data
	$query = $query_select_live.$query_cat.$query_vertical.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$vertical);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json2= json_encode($row,JSON_NUMERIC_CHECK);
	//prev month
	$query = $query_select_prev.$query_cat.$query_vertical.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$vertical);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json3= json_encode($row,JSON_NUMERIC_CHECK);
	//current month
	$query = $query_select_cur.$query_cat.$query_vertical.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$vertical);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json4= json_encode($row,JSON_NUMERIC_CHECK);
		//target
	$query = $query_select_target.$query_cat.$query_vertical.$subcat_NULL;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$vertical);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json5= json_encode($row,JSON_NUMERIC_CHECK);
	}
	
	
	//empty vertical
	if(empty($vertical) and !empty($cat) and !empty($subcat))
	{
	//month till date.
	$query = $query_select_mtd.$query_cat.$vertical_NULL.$query_subcat;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$subcat);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json1= json_encode($row,JSON_NUMERIC_CHECK);
	
	//live 
	$query = $query_select_live.$query_cat.$vertical_NULL.$query_subcat;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$subcat);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json2= json_encode($row,JSON_NUMERIC_CHECK);
	
	//previous month
	$query =$query_select_prev.$query_cat.$vertical_NULL.$query_subcat;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$subcat);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json3= json_encode($row,JSON_NUMERIC_CHECK);
	//current
	$query = $query = $query_select_cur.$query_cat.$vertical_NULL.$query_subcat;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$subcat);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json4 = json_encode($row,JSON_NUMERIC_CHECK);
	//target
	$query = $query_select_target.$query_cat.$vertical_NULL.$query_subcat;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$subcat);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json5 = json_encode($row,JSON_NUMERIC_CHECK);
	}
	//all variables set
	if(!empty($vertical) and !empty($cat) and !empty($subcat)){
	//mtd
	
	$query = $query_select_mtd.$query_cat.$query_subcat.$query_vertical;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$subcat);
	$statement->bindValue(3,$vertical);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json1 = json_encode($row,JSON_NUMERIC_CHECK);
	//live
	$query = $query_select_live.$query_cat.$query_subcat.$query_vertical;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$subcat);
	$statement->bindValue(3,$vertical);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json2 = json_encode($row,JSON_NUMERIC_CHECK);
	//previous month
	$query = $query_select_prev.$query_cat.$query_subcat.$query_vertical;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$subcat);
	$statement->bindValue(3,$vertical);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json3 = json_encode($row,JSON_NUMERIC_CHECK);
	
	//current month
	$query = $query_select_cur.$query_cat.$query_subcat.$query_vertical;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$subcat);
	$statement->bindValue(3,$vertical);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json4 = json_encode($row,JSON_NUMERIC_CHECK);
	 
	//target
	$query = $query_select_target.$query_cat.$query_subcat.$query_vertical;
	$statement = $pdo->prepare($query);
	$statement->bindValue(1,$cat);
	$statement->bindValue(2,$subcat);
	$statement->bindValue(3,$vertical);
	$statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_OBJ);
	$json5 = json_encode($row,JSON_NUMERIC_CHECK);
	}
}
catch(Exception $e){
echo "<h1>"."Wrong Selection. Please check the selection."."<br/>"."If the problem exists for longer period of time please report the error to the Fashion Analytics Team"."</h1>";
}
	?>