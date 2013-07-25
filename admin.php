<?php include("include/header.php"); ?>

<!-- Start left navigation -->
<div id="leftmenu">
  <div id="leftmenu_top"></div>
  <div id="leftmenu_main">
    <h3>My Tools</h3>
    <ul>
      <li><a href="admin_books.php">Books</a></li>
      <li><a href="admin_courses.php">Courses</a></li>
      <li><a href="admin_departments.php">Departments</a></li>
      <li><a href="admin_givenby">GivenBy</a></li>
      <li><a href="admin_haveclass">HaveClass</a></li>
      <li><a href="admin_students">Students</a></li>
      <li><a href="admin_teachers">Teachers</a></li>
      <li><a href="admin_textbookof">TextBookOf</a></li>
    </ul>
  </div>
  <div id="leftmenu_bottom"></div>
</div>

<!-- Start left content -->
<div id="content">
  <div id="content_top"></div>
  <div id="content_main">
<?php

?>
        <form action="stu_mybook.php" method ="get">
       <table><tr><td>
        <p class="form">
          <label for="sid">User Name: </label> </td>
            <td><input type="text" name="sid" /></td>
        </p>
        <tr><td>
        <p class="form">
          <label for="pwd">Password: </label> </td>
            <td><input type="password" name="pwd"sid /></td>
        </p>
        </tr>
         <td></td>
         <td>	
        <p class="submit">
          <input type="submit" value="Login"/>  
          <input type="reset" value="Cancel"/>  
        </p>
        </td></table>
        </form>                
  </div>

  <?php include("include/footer.php"); ?>


