<?php include("include/header.php"); ?>

<?php  

?>

<!-- Start left navigation -->
<div id="leftmenu">
  <div id="leftmenu_top"></div>
  <div id="leftmenu_main">
    <h3>My Tools</h3>
    <ul>
      <li><a href="stu_myclass.php">My Classes</a></li>
      <li><a href="stu_myteacher.php">My Teachers</a></li>
      <li><a href="stu_mybook.php">My Books </a></li>
    </ul>
  </div>
  <div id="leftmenu_bottom"></div>
</div>

<!-- Start content -->
<div id="content">
  <div id="content_top"></div>
  <div id="content_main">

    <table>
    <tr>
    <td><h1> Check all my teachers</h1> </td>
    </tr> </table>

    <form action="stu_myteacher.php" method ="get">
   <table><tr><td>
	<p class="form">
	  <label for="sid">Student ID: </label> </td>
<td>	    <input type="text" name="sid" /></td>
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
   $id = $_GET["sid"];
if($id)
  {
      /*
    $sql = "SELECT course_id,section, time,room,dept_name 
	       FROM HaveClass natural join Courses WHERE student_id ='".$id."'";
       */
        $sql = "SELECT name,course_id, office, office_hours,phone_no,dept_name FROM (HaveClass Natural join GivenBy) natural join Teachers WHERE student_id ='".$id."'"; 
    $result = $db->query($sql);
    if($result)
      {
	// get results array
	echo "<table border='1'>
	     <tr>    
	       <th>Name</th>
	       <th>CourseID</th>
	       <th>Office</th>
	       <th>OfficeHour</th>
	       <th>Phone</th>
	       <th>Dept</th>
	     </tr>";
	while($row = mysql_fetch_array($result))
	  {
	    echo "<tr>";
	    echo "<td>" . $row['name'] . "</td>";
	    echo "<td>" . $row['course_id'] . "</td>";
	    echo "<td>" . $row['office'] . "</td>";
	    echo "<td>" . $row['office_hours'] . "</td>";
	    echo "<td>" . $row['phone_no'] . "</td>";
	    echo "<td>" . $row['dept_name'] . "</td>";
	    echo "</tr>";
	  }

	echo "</table>";
      }
  }// if $id

?>

    </div> <!-- End of content_main -->
    <?php include("include/footer.php"); ?>




