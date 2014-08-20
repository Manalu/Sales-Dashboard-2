<?php
$cat_id=$_GET['id'];
$vertical_id =$_GET['vertical_id'];
include('connection.php');
$query = $pdo->prepare("SELECT DISTINCT(Subcategory),Subcategory_id FROM dashboard_subcategory_gid_mapping WHERE category_id=? AND Vertical_id=?");	
			 $query->bindValue(1,$cat_id);
			 $query->bindValue(2,$vertical_id);
			 $query->execute();
			 
		//  while($row = $query->fetch(PDO::FETCH_ASSOC)){echo '<option value=".'implode(" ",$row)'.">'.implode(" ",$row).'</option>';}	  
		 echo '<option value="">ALL Subcategory</option>';
		 while($row = $query->fetch(PDO::FETCH_ASSOC))
		  {
		  echo "<option value=\"".$row['Subcategory_id']."\">".$row['Subcategory'].'</option>';
		  }
		 /* $json_verticals = json_encode($row);
		  $output='';
		  foreach($row as $rows)
		  		  $output .= '<option>'.$rows.'</option>';}
		  echo $output;*/
?>