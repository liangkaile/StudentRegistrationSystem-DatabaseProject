<?php include("include/header.php"); ?>

<?php  

?>

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

    <form action="dept_teacher.php" method ="get">
   <table><tr><td>
	<p class="form">
	  <label for="tid">Department Name: </label> </td>
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
      /*
        $sql = "select course_id,section, time,office_hours,room,teachers.name from (givenby natural join courses) join teachers on employee_id where courses.dept_name='".$id."'";
       */
         $sql= "SELECT office, phone_no, course_id, time,office_hours,room, name FROM ((GivenBy natural join Courses) join Teachers on GivenBy.employee_id = Teachers.employee_id) WHERE Teachers.dept_name = '".$id."'order by name asc" ;


        /*
    $sql = "SELECT course_id,section, time,room,dept_name 
	       FROM HaveClass natural join Courses WHERE student_id ='".$id."'";
         */
    $result = $db->query($sql);
    if($result)
      {
	// get results array
	echo "<table border='1'>
	     <tr>    
	       <th>Teacher</th>
	       <th>Office</th>
	       <th>PhoneNum</th>
	       <th>CourseID</th>
	       <th>Time</th>
	       <th>OfficeHour</th>
	       <th>Room</th>
	     </tr>";
	while($row = mysql_fetch_array($result))
	  {
	    echo "<tr>";
	    echo "<td>" . $row['name'] . "</td>";
	    echo "<td>" . $row['office'] . "</td>";
	    echo "<td>" . $row['phone_no'] . "</td>";
	    echo "<td>" . $row['course_id'] . "</td>";
	    echo "<td>" . $row['time'] . "</td>";
	    echo "<td>" . $row['office_hours'] . "</td>";
	    echo "<td>" . $row['room'] . "</td>";
	    echo "</tr>";
	  }

	echo "</table>";
      }
  }// if $id

?>

    </div> <!-- End of content_main -->
    <?php include("include/footer.php"); ?>




