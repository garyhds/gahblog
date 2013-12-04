<?php
/*-- filename: gahblog/blogaddentry.php
     GitHub Repository deviation from course
      - Wed 04 Dec 2013 14:09:59 PST set 2x gahblog coding branches 
      - implement ost_library/webdataconnect.inc.php OST mysql-server 
     Regular class project cleanup file structure
      - Sun 18 Aug 2013 11:30:11 PDT reorganized with modifications
      - old filename: include/lab10_o1-blogentry.php
     Intro PHP/SQL lesson 10 Project Addressbook - Part 2
      - Modified lab10_o1-addentry.php and reorganized for blogs table
      - Fri 02 Aug 2013 02:25:21 PM PDT 
      - Renamed to lab10_o1-blogentry.php
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
   if ($form_array['author_name'] && $form_array['blog_title']  && 
       $form_array['blog_entry']) {
      return 1;
   }
   else return 0;
}

#--------------------------#
#   User variables         #
#--------------------------#
# implement ost_library/webdataconnect.inc.php OST mysql-server 
   include("ost_library/webdataconnect.inc.php");
   $connID = connect_to_mywebdata();
/*-- before implementation.  now in library include file
$host = "sql.useractive.com";  // the server where the database resides
$user = "ghornbec";            // sandbox user login
$pw = "1001san";               // sandbox password
$database = "ghornbec";        // my database, same userid as sandbox login
 */
# $table_name = "addressbook";   // my addressbook table
$table_name = "blogs";         // my blogs table, associated table blog_comments

#--------------------------#
#   Main body              #
#--------------------------#
if (check_input($_POST)) {
// echo "<br> main body return 1 form_array contents <br>";
// print_r($form_array);
// echo "<br> main body return 1 with form_array contents <br>";
/*-- before implementation.  now in library include file
   $db = mysql_connect($host,$user,$pw)
         or die("Cannot connect to MySQL on $host");
   mysql_select_db($database, $db)
         or die("Cannot connect to database: $database");
 */
   /* set timestamp based fields - blogid and date_post */
   $blogid = time();  // unix system time int(10) seconds from 01-01-1970 midnight
   $date_post = date("Y-m-d G:i:s", $blogid); // formated to 2013-08-03 12:15:30
   
   $command = "insert into $table_name values 
                ('','".$blogid."',
                    '".addslashes($_POST['author_name'])."',
                    '".$date_post."',
                    '".addslashes($_POST['blog_title'])."',
                    '".addslashes($_POST['blog_entry'])."');";
// echo "<br> $command <br>";
    $result = mysql_query($command);
    
    print "Record successfully inserted into $table_name. <br>";
/*-- before implementation.  now in library include file
    mysql_close($db);
 */
    mysql_close($connID);
}

else { 

    print "Record NOT inserted due to errors. <br>";
}

?>

<!--  html page reference to view address book entries -->
<!--  was: href="../include/lab10_o1-blogview.php" -->
   <a href="blogindex.php">View my Blog Entry Titles</a>

