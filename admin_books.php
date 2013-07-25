<?php include_once('include/header.php'); ?>


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


<form name="books" action="admin_books.php" method ="post" onsubmit="return formvalidator(this)">
<div>
</div>

<table>
 
     <tr><td></td>
     <td id = "message"><?php echo $message ?></td></tr>

     <tr>
      <td><label for="ISBN"> ISBN:</label> </td>
      <td><input type="text" name="ISBN" /></td><td id="isbn_error"></td>
      <td><label for="ISBN_new"> New Value:</label> </td>
      <td><input type="text" name="ISBN_new" /></td><td id="isbn_new_error"></td>

      <tr>
      <td><label for="title"> Title: </label></td>
      <td><input type="text" name="title" /></td><td id="title_error"></td>
      <td><label for="title_new"> New Value: </label></td>
      <td><input type="text" name="title_new" /></td><td id="title__new_error"></td>

      <tr>
      <td><label for="author"> Author:</label> </td>
      <td><input type="text" name="author" /></td><td id="author_error"></td>
      <td><label for="author_new">New Value:</label> </td>
      <td><input type="text" name="author_new" /></td><td id="author_new_error"></td>
    
      
      <tr>
      <td></td>
      <td id = "all_field"></td>
      <td></td>
      <td></td>
      <td id = "new_field"></td>

      </tr>

      <tr><td><label for="operation"> Operaton: </label><td>
          <select name="operation">
        <option value="0" selected>(select operation)</option>
        <option value="1">insert</option>
        <option value="2">delete</option>
        <option value="3">update</option>
    </select>      </td> <td></td><td></td><td  id="operation_error"></td>
      </tr>
      <tr><td></td>
      <td><p class="submit"><input type="submit" value="submit" /> </p>
      </td></tr>
</form>

<script> 
    function formvalidator(form)
    { 
        var return_value = true;
        document.getElementById('operation_error').innerHTML = '';
        document.getElementById('isbn_error').innerHTML = '';
        document.getElementById('title_error').innerHTML = '';
        document.getElementById('author_error').innerHTML = '';
        document.getElementById('all_field').innerHTML = '';
        document.getElementById('new_field').innerHTML = '';

        if(form['operation'].value == 0)
        {
            var e = document.getElementById('operation_error');
            e.innerHTML = 'Operation required';
            return_value = false;
        }

        if(form['operation'].value == 1)
        {
            if(form['ISBN'].value =='')
            {
                var e = document.getElementById('isbn_error');
                e.innerHTML = 'ISBN required';
                return_value = false;
            }
            if(form['title'].value =='')
            {
                var e = document.getElementById('title_error');
                e.innerHTML = 'TItle required';
                return_value = false;
            }
            if(form['author'].value =='')
            {
                var e = document.getElementById('author_error');
                e.innerHTML = 'Author required';
                return_value = false;
            }
        }// end operation ==1
        

        if(form['operation'].value == 2)
        {
            if((form['ISBN'].value =='')&& (form['title'].value =='')&&(form['author'].value ==''))
            {
                var e = document.getElementById('all_field');
                e.innerHTML = 'All field empty!';
                return_value = false;
            }
        }

        if(form['operation'].value == 3)
        {
            if((form['ISBN'].value =='')&& (form['title'].value =='')&&(form['author'].value ==''))
            {
                var e = document.getElementById('all_field');
                e.innerHTML = 'All field empty!';
                return_value = false;
            }

            if((form['ISBN_new'].value =='')&& (form['title_new'].value =='')&&(form['author_new'].value ==''))
            {
                var e = document.getElementById('new_field');
                e.innerHTML = 'Please specify new value!';
                return_value = false;
            }
        }

     return return_value; 
    }//end of function

    </script>

<?php $operation= $_POST["operation"];
	 $ISBN = $_POST["ISBN"];
	 $title= $_POST["title"];
	 $author= $_POST["author"];

	 $ISBN_new = $_POST["ISBN_new"];
	 $title_new = $_POST["title_new"];
	 $author_new = $_POST["author_new"];

    
    $message = '';
    
    if($operation == 1)
    {
        $sql="INSERT INTO Books VALUES
            ('$ISBN','$title','$author')";

	$result = $db->query($sql);
        if($result)
            $message = mysql_affected_rows()." row affected";
    }
    if($operation == 2)
    {
        $fields = array();
        
        if($ISBN != '') $fields['isbn'] = $ISBN;
        if($title != '') $fields['title'] = $title;
        if($author != '') $fields['author'] = $author;

        while(list($key, $value) = each($fields))
        {
            $where = $where . $key . "='". $value. "'" . " and ";
        }
        $where = substr($where,0,-4); 

        $sql="Delete from Books where ". $where; 
        

	$result = $db->query($sql) or die ("Error in query:$sql.".mysql_error());
        if($result)
            $message = mysql_affected_rows()." row affected";
    }

    if($operation == 3)
    {
        $fields = array();
        $new_fields = array();
        
        if($ISBN != '') $fields['isbn'] = $ISBN;
        if($title != '') $fields['title'] = $title;
        if($author != '') $fields['author'] = $author;

        while(list($key, $value) = each($fields))
        {
            $where = $where . $key . "='". $value. "'" . " and ";
        }
        $where = substr($where,0,-4); 


        if($ISBN_new != '') $new_fields['isbn'] = $ISBN_new;
        if($title_new != '') $new_fields['title'] = $title_new;
        if($author_new != '') $new_fields['author'] = $author_new;

        while(list($key, $value) = each($new_fields))
        {
            $set = $set . $key . "='". $value. "'" . " , ";
        }
        $set = substr($set,0,-2);

        $sql="update Books set ".$set." where ". $where; 

        $result = $db->query($sql) or die ("Error in query:$sql.".mysql_error());
        if($result)
            $message = mysql_affected_rows()." row affected";
    }
    
    mysql_close($con);

if($result)
{
	echo "<table border='1'>
	     <tr>    
	       <th>Message</th>
	       <th>Query</th>
	     </tr>";
 
}
    
        echo "<tr>";
        echo "<td>" . $message. "</td>";
        echo "<td>" . $sql. "</td>";
        echo "</tr>";
    echo "</table>";
    ?>
</div>



<?php include("include/footer.php"); ?>

