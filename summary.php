<?php 
    $sql = "SELECT COUNT(Id) as total, name FROM users GROUP BY Name";
    $result = filterTable($sql);

	function filterTable($sql)
	{
		include_once("config.php");
		$filter_Result = mysqli_query($mysqli, $sql);
		return $filter_Result;
	}

?>
 
<body>
           <table width='80%' border=1 class="css-serial">
					   <tr>
							 <th>Name</th>
							 <th>Ids</th>
							
					   </tr>
	
					<?php 
					while($res = mysqli_fetch_array($result)) {         
						echo "<tr>";
						echo "<td>".$res['name']."</td>";
						echo "<td>".$res['total']."</td>";
						echo "</tr>";      
					}
					?>
           </table>
	
</body>
</html>





