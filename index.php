<?php
if(isset($_POST['search']))
{
    $search_value= $_POST['search_value'];
	$sql = "select name,age,email,id from users where name like '%$search_value%'||age='$search_value'||id='$search_value'||email like '%$search_value%' ORDER BY id DESC;";
    $result = filterTable($sql);   
}
 else {
    $sql = "SELECT name,age,email,id  FROM users ORDER BY id DESC";
    $result = filterTable($sql);
}
function filterTable($sql)
{
    include_once("config.php");
    $filter_Result = mysqli_query($mysqli, $sql);
    return $filter_Result;
}
?>
<html>
<head>    
</head>
<body>
        <form action="index.php" method="post">
           <!-- filter box start-->
            <input type="text"  name="search_value" placeholder="Value To Search">     
            <input type="submit" name="search" value="Filter">
		   <!-- filter box stop -->	
		 <button><a href="add.html">Add New Data</a></button>
		 <button><a href="summary.php">Summary</a></button>
            </div>
           <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Name</td>
            <td>Age</td>
            <td>Email</td>
            <td>Update</td>
        </tr>
	
       <?php 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['age']."</td>";
            echo "<td>".$res['email']."</td>";    
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
        </form>
		
	</body>
</html>