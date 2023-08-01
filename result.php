<?php
include("taskbase.php");
$db=$conn;
// fetch query
function fetch_data(){
 global $db;
  $query="SELECT * from container";
  $exec=mysqli_query($db, $query);
  if(mysqli_num_rows($exec)>0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}

$fetchData= fetch_data();

show_data($fetchData);


function show_data($fetchData){
 echo '<table border="1">
        <tr>
            <th>ID</th>
            <th>Currency </th>
            <th>Income</th>
            <th>Expense</th>
            <th>Difference </th>
            <th>Comment </th>
        </tr>';
 if(count($fetchData)>0){
      foreach($fetchData as $data){ 
  echo "<tr>
          <td>".$data['id']."</td>
          <td>".$data['type']."</td>
          <td>".$data['income'] ." " .$data['type']."</td>
          <td>".$data['expense'] ." ".$data['type']."</td>
          <td>".$data['difference'] ." ".$data['type']."</td>
          <td>".$data['comment']."</td>
   </tr>";
       
     }
}else{
     
  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}
?>
<a href="/website/index.php">
        <h1> Home </h1>
    </a>