<?php
$status_id=$_GET['id'];
include('connection.php');
$query = $pdo->prepare("SELECT DISTINCT(Verticals),Vertical_id FROM dashboard_vertical_gid_mapping WHERE category_id=?");	
			 $query->bindValue(1,$status_id);
			 $query->execute();

		//  while($row = $query->fetch(PDO::FETCH_ASSOC)){echo '<option value=".'implode(" ",$row)'.">'.implode(" ",$row).'</option>';}	  
		 echo '<option value="">ALL Vertical</option>';
		 while($row = $query->fetch(PDO::FETCH_ASSOC))
		  {
		  echo "<option value=\"".$row['Vertical_id']."\">".$row['Verticals'].'</option>';
		  }
		 /* $json_verticals = json_encode($row);
		  $output='';
		  foreach($row as $rows)
		  		  $output .= '<option>'.$rows.'</option>';}
		  echo $output;*/
?>