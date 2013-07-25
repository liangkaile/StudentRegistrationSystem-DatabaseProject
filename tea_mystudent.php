<?php include("include/header.php"); ?>

<?php  

?>

<!-- Start left navigation -->
<div id="leftmenu">
  <div id="leftmenu_top"></div>
  <div id="leftmenu_main">
    <h3>My Tools</h3>
    <ul>
      <li><a href="tea_myclass.php">My Classes</a></li>
      <li><a href="tea_mystudent.php">My Students</a></li>
      <li><a href="tea_mybook.php">My Books </a></li>
    </ul>
  </div>
  <div id="leftmenu_bottom"></div>
</div>

<!-- Start content -->
<div id="content">
  <div id="content_top"></div>
  <div id="content_main">

    <form action="tea_mystudent.php" method ="get">
   <table><tr><td>
	<p class="form">
	  <label for="tid">Employee ID: </label> </td>
<td>	    <input type="text" name="tid" /></td>
	</p>
	</tr>
     <td></td>
     <td>	
	<p class="submit">
	  <input type="submit" value="Submit"/>  
	  <input type="reset" value="Cancel"/>  
	</p>
	</td></table>
    </form>                
    
   <?php  
   $id = $_GET["tid"];
if($id)
  {
        $sql = "SELECT course_id,section,student_id,name,dept_name FROM (GivenBy Natural join HaveClass) natural join Students WHERE employee_id ='".$id."' order by course_id asc"; 
        /*
        $sql = "SELECT course_id,section, time,office_hours,room,dept_name FROM GivenBy natural join Courses WHERE employee_id ='".$id."'";
         */
    $result = $db->query($sql);
    if($result)
      {
	// get results array
	echo "<table border='1'>
	     <tr>    
	       <th>CourseID</th>
	       <th>Section</th>
	       <th>StudentID</th>
	       <th>Name</th>
	       <th>StudentDept</th>
	     </tr>";
	while($row = mysql_fetch_array($result))
	  {
	    echo "<tr>";
	    echo "<td>" . $row['course_id'] . "</td>";
	    echo "<td>" . $row['section'] . "</td>";
	    echo "<td>" . $row['student_id'] . "</td>";
	    echo "<td>" . $row['name'] . "</td>";
	    echo "<td>" . $row['dept_name'] . "</td>";
	    echo "</tr>";
	  }

	echo "</table>";
      }
  }// if $id

?>

    </div> <!-- End of content_main -->
    <?php include("include/footer.php"); ?>




