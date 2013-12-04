<?php
/*-- filename: gahblog/blogshow.php
     GitHub Repository deviation from course
      - Wed 04 Dec 2013 14:10:56 PST set 2x gahblog coding branches 
      - implement ost_library/webdataconnect.inc.php OST mysql-server 
     Regular class project cleanup file structure
      - Sun 18 Aug 2013 11:30:11 PDT reorganized with modifications
      - old filename: include/lab11_o1-blogdetail.php
     Intro PHP/SQL lesson 11 Project Addressbook - Part 3
     - New lab11_o1-blogdetail.php. Display blog details after selected from item list.
     - Sun Aug 11 18:38:47 PDT 2013
 */
#--------------------------#
#   Functions              #
#--------------------------#
/*   verify expected data    */
function check_input ($form_array) {
   if ($form_array['postid']) {
      return 1;
   }
   else return 0;
}
#--------------------------#
#   User variables         #
#--------------------------#
/*   database connection done in calling php.   */
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
$table_name = "blogs";          // my blogs table, associated table blog_comments
$table_name2 = "blog_comments"; // my blog_comments table, associated table blogs
#--------------------------#
#   Main body              #
#--------------------------#
if (check_input($_GET)) {
   $selectedid = $_GET['postid'];
/*-- before implementation.  now in library include file
   $db = mysql_connect($host,$user,$pw)
         or die("Cannot connect to MySQL on $host");
   mysql_select_db($database, $db)
         or die("Cannot connect to database: $database");
 */
?>
<html>
<head>
   <title>Blog Details</title>
</head>
<body>
   <!--  html page header to view current blog details -->
   <h1>Current Blog Details</h1>
<?php
# php current blog entry listing with link to detail
   $command = "select * from $table_name where postid='$selectedid'";
// echo "<br> $command <br>";
   $result = mysql_query($command);
   while ($data = mysql_fetch_object($result)) {
   /* current blogid entry listing with link to detail  */
   /* row 1 - php current blog entry details   */
      print "<span style='font-weight:bold'>Post ID:&nbsp;&nbsp;</span>".$data->postid."<span>&#44;&nbsp;&nbsp;&nbsp;</span>";
      print "<span style='font-weight:bold'>Blog ID:&nbsp;&nbsp;</span>".$data->blogid."<span>&#44;&nbsp;&nbsp;&nbsp;</span>";
      print "<span style='font-weight:bold'>Topic Post Date:&nbsp;&nbsp;</span>".$data->date_post."<br /><br />";
   /* row 2 - php current blog entry details   */
      print "<span style='font-weight:bold'>Blog Author:&nbsp;&nbsp;</span>".$data->author_name."<span>&#44;&nbsp;&nbsp;&nbsp;</span>";
      print "<span style='font-weight:bold'>Blog Title:&nbsp;&nbsp;</span>".$data->blog_title."<br /><br />";
   /* row 3 - php current blog entry details   */
      print "<span style='font-weight:bold'>Blog Entry:&nbsp;&nbsp;&nbsp;</span>".$data->blog_entry."<br /><br />";
   /* get variables - php comment entry details   */
      /* current blogid entry listing comment details  */
      $refid    = $data->blogid;
      // echo str_replace("world","Peter","Hello world!");
      $reftitle = str_replace(" ", "&#32;", $data->blog_title);
      $command2 = "select * from $table_name2 where blogid='$refid' order by date_post desc";
// echo "<br> $command2 <br>";
      $result2 = mysql_query($command2);
      while ($data2 = mysql_fetch_object($result2)) {
         print "<div><fieldset><legend><h5><span style='font-weight:normal'>Comment ID:&nbsp;&nbsp;</span>".$data2->commentid."<span>&#44;&nbsp;&nbsp;&nbsp;</span>";
         print "<span style='font-weight:normal'>Date Posted:&nbsp;&nbsp;</span>".$data2->date_post."<br />";
         print "<span style='font-weight:normal'>Author:&nbsp;&nbsp;</span>".$data2->author_name."<span>&#44;&nbsp;&nbsp;&nbsp;</span>";
         print "<span style='font-weight:normal'>Author Email:&nbsp;&nbsp;</span>".$data2->author_email."</h5></legend>";
         print "<span>&nbsp;&nbsp;&nbsp;</span>".$data2->comment_entry."</fieldset></div>";
      }
   }    
   //  print "Record successfully displayed from $table_name. <br />";
   print "<br> Record successfully displayed from $table_name. <br />";
}
else { 
    print "Record NOT displayed due to errors. <br>";
}
    // page end option 1 - add new blog entry
    print "<br /><a href='blogindex.php'>View my Blog Entry Titles</a><br />";
    // page end option 2 - add comment to this blog entry
//  print "<tr><td><a href='blogshow.php?postid=$data->postid'".">".$data->postid."</a></td>";
    print "<br /><a href="."commentaddform.php?blogid=$refid&blog_title=$reftitle".">Add blog comment</a><br />";
    // mysql_close($db);
?>

</body>
</html>
