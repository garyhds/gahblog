<?php
/*-- filename: gahblog/commentaddentry.php
      - Sun 18 Aug 2013 11:30:11 PDT reorganized with modifications
      - old filename: include/lab10_o1-blogentry.php
     Intro PHP/SQL lesson 11 Project Address/Phone Book - Part 3
      - Modified lab10_o1-blogentry.html and lab10_o1-blogentry.php
      - Fri Aug 16 15:43:14 PDT 2013 
      - Renamed to lab10_o1-blogentry.html
     section 1 functions area
     section 2 user variables section
     section 3 main program body 
 */
#--------------------------#
#   Functions              #
#--------------------------#
function check_input ($form_array) {
// echo "<br> check_input form_array contents <br>";
// print_r($form_array);
// echo "<br> check_input continue form_array contents <br>";
   if ($form_array['blogid'] && $form_array['author_name'] && 
       $form_array['author_email'] && $form_array['comment_entry'])
   {
      return 1;
   }
   else return 0;
}

#--------------------------#
#   User variables         #
#--------------------------#
$host = "sql.useractive.com";  // the server where the database resides
$user = "ghornbec";            // sandbox user login
$pw = "1001san";               // sandbox password
$database = "ghornbec";        // my database, same userid as sandbox login
# $table_name = "addressbook";   // my addressbook table
# $table_name = "blogs";         // my blogs table, associated table blog_comments
$table_name = "blog_comments"; // my blog_comments table, associated table blogs

#--------------------------#
#   Main body              #
#--------------------------#
if (check_input($_POST)) {
// echo "<br> main body return 1 form_array contents <br>";
// print_r($form_array);
// echo "<br> main body return 1 with form_array contents <br>";
   $db = mysql_connect($host,$user,$pw)
         or die("Cannot connect to MySQL on $host");
   mysql_select_db($database, $db)
         or die("Cannot connect to database: $database");
         
   /* set timestamp based fields - blogid and date_post */
   #$blogid = time();  // unix system time int(10) seconds from 01-01-1970 midnight
   #$date_post = date("Y-m-d G:i:s", $blogid); // formated to 2013-08-03 12:15:30
   $date_post = date("Y-m-d G:i:s"); // default to now() formated to 2013-08-03 12:15:30
   /* set timestamp date_post using MySQL now() */
   
   $command = "insert into $table_name values 
                ('','".addslashes($_POST['blogid'])."',
                    '".addslashes($_POST['author_name'])."',
                    '".addslashes($_POST['author_email'])."',
                    '".$date_post."',
                    '".addslashes($_POST['comment_entry'])."');";
// echo "<br> $command <br>";
    $result = mysql_query($command);
    
    print "Record successfully inserted into $table_name. <br>";
    mysql_close($db);
}

else { 

echo "<br> main body return 0 form_array contents <br>";
print_r($form_array);
echo "<br> main body return 0 with form_array contents <br>";

    print "Record NOT inserted due to errors. <br>";
}

?>
<p>
   <!-- return to the blog index table -->
   <a href="blogindex.php">View my Blog Entry Titles</a>
</p>


