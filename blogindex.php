<?php
/*-- filename: gahblog/blogindex.php
     GitHub Repository deviation from course
      - Fri 29 Nov 2013 11:47:17 PST set 2x gahblog coding branches 
      - implement ost_library/webdataconnect.inc.php OST mysql-server 
     Regular class project cleanup file structure
      - Sun 18 Aug 2013 11:30:11 PDT reorganized with modifications
      - old filename: lesson10-12_blog/lab11_o1-bloglist.php
     Intro PHP/SQL lesson 11 Project Addressbook - Part 3
      - Modified lab10_o1-blogview.php.  
      - Was debug utility to easily check table contents after insert.
      - Sun Aug 11 18:38:47 PDT 2013
     for latter:
     User and Main good candidate for a database connection include file
 */
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
/*-- before implementation.  now in library include file
$db = mysql_connect($host,$user,$pw)
      or die("Cannot connect to MySQL on $host");
mysql_select_db($database, $db)
      or die("Cannot connect to database: $database");
 */
?>

<html>
<head>
   <!--  adding some css for table asthetics 2nd use -->
   <!-- <link rel="stylesheet" href="lab10_o1-blogentry.css"> -->
   <link rel="stylesheet" href="blogaddforms.css">
   <title>The Blog List</title>
</head>
<body>
<!--  html page table headers to view current blog entries -->
<h1>Current Blogs</h1>
<?php
   $command = "select datediff('2014-07-04', now());";
   $result = mysql_query($command);
   print "</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>NOTICE:&nbsp;&nbsp;</b>".mysql_result($result, 0);
   print "&nbsp; <b>DAYS UNTIL</b>&nbsp; July 4th 2014! <br /><br /></div>" ;
?>
<table border="1">
   <tr>
      <th>Post ID</th>
      <th>Blog ID</th>
      <th>Blog Author</th>
      <th>Blog Title</th>
      <th>Blog Entry Date</th>
   </tr>

<?php     //    mysql_close($db);

/* php current blog entry listing with link to detail    */
   $command = "select *, date_format(date_post, '%W, %m/%d/%Y - %h:%i %p CDT') as formated_date from $table_name;";
// echo "<br> $command <br>";
   $result = mysql_query($command);
   while ($data = mysql_fetch_object($result)) {
      /* mysql format the date_post something like "Monday, 11/04/2006 - 12:31 PM CST"  */
      /* php functions, create a date object, then format the output  */
      // $date_formated=date_format(date_create($data->date_post), "l, m-d-Y - G:i A T");
      print "<tr><td><a href='blogshow.php?postid=$data->postid'".">".$data->postid."</a></td>";
      print "<td>".$data->blogid."</td>";
      print "<td>".$data->author_name."</td>";
      print "<td>".$data->blog_title."</td>";
      print "<td>".$data->formated_date."</td></tr>\n";
   }    
//    print "Record successfully inserted into $table_name. <br>";
/*-- before implementation.  now in library include file
    mysql_close($db);
 */
    mysql_close($connID);
?>

<!--  html end table and page reference to add new blog entries -->
</table>
<p>
   <!-- was: href="../lesson10-12_blog/lab10_o1-blogentry.html" -->
   <a href="blogaddform.php">Add new blog entry</a>
</p>
</body>

</html>
