<?php include("include/header.php"); ?>

<?php  

?>

<!-- Start left navigation -->
<div id="leftmenu">
  <div id="leftmenu_top"></div>
  <div id="leftmenu_main">
    <h3>Department Tools</h3>
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

    <form action="dept_student.php" method ="get">
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
         $sql= "SELECT Students.student_id, name, course_id, time,room FROM ((HaveClass natural join Courses) join Students on HaveClass.student_id = Students.student_id) WHERE Students.dept_name = '".$id."'order by student_id asc" ;

    $result = $db->query($sql);
    if($result)
      {
	// get results array
	echo "<table border='1'>
	     <tr>    
	       <th>StudentID</th>
	       <th>Name</th>
	       <th>Course</th>
	       <th>CourseTime</th>
	       <th>CourseRoom</th>
	     </tr>";
	while($row = mysql_fetch_array($result))
	  {
	    echo "<tr>";
	    echo "<td>" . $row['student_id'] . "</td>";
	    echo "<td>" . $row['name'] . "</td>";
	    echo "<td>" . $row['course_id'] . "</td>";
	    echo "<td>" . $row['time'] . "</td>";
	    echo "<td>" . $row['room'] . "</td>";
	    echo "</tr>";
	  }

	echo "</table>";
      }
  }// if $id

?>

    </div> <!-- End of content_main -->
    <?php include("include/footer.php"); ?>




