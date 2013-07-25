<?php include_once("include/header.php"); ?>

<!-- Start left navigation -->
<div id="leftmenu">
  <div id="leftmenu_top"></div>
  <div id="leftmenu_main">
    <h3>My Tools</h3>
    <ul>
      <li><a href="dept_class.php">Courses</a></li>
      <li><a href="dept_teacher.php">Facluty</a></li>
      <li><a href="dept_student.php">Student</a></li>
    </ul>
  </div>
  <div id="leftmenu_bottom"></div>
</div>


<!-- Start content -->
<div id="content">
  <div id="content_top"></div>
  <div id="content_main">
<?php
        $sql = "SELECT * from Departments"; 
    $result = $db->query($sql);
    if($result)
      {
	// get results array
	echo "<table border='1'>
	     <tr>    
	       <th>Departments</th>
	       <th>Chair</th>
	     </tr>";
	while($row = mysql_fetch_array($result))
	  {
	    echo "<tr>";
	    echo "<td>" . $row['dept_name'] . "</td>";
	    echo "<td>" . $row['chair'] . "</td>";
	    echo "</tr>";
	  }

	echo "</table>";
      }
?>
  </div>

<!-- Start footer -->
<?php include("include/footer.php"); ?>
