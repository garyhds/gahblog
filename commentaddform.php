<?php
/*-- filename: gahblog/commentaddform.php
      - Sun 18 Aug 2013 11:30:11 PDT reorganized with modifications
*/
#--------------------------#
#   Functions              #
#--------------------------#
/*   verify expected data    */
function check_input ($form_array) {
#--- debug start  ---------#
// echo "<br> check_input form_array contents <br>";
// print_r($form_array);
// echo "<br> check_input continue form_array contents <br>";
#--- debug finish  --------#
   if ($form_array['blogid']) {
      return 1;
   }
   else return 0;
}
#--------------------------#
#   Main body              #
#--------------------------#
if (check_input($_GET)) {
   $selectedid = $_GET['blogid'];
#--- debug start  ---------#
// echo "<br> main body return 1 form_array contents <br>";
// print_r($_GET);
// print "selectedid: ".$selectedid." Nice!\n";
// echo "<br> main body return 1 with form_array contents <br>";
#--- debug finish  --------#
}
?>
<!-- <!doctype html>
     Intro PHP/SQL lesson 11 Project Address/Phone Book - Part 3
      - Modified lab10_o1-blogentry.html and lab10_o1-blogentry.php
      - Fri Aug 16 15:43:14 PDT 2013 
      - Renamed to lab10_o1-blogentry.html
     Used Text from Javascript: JSON and Ajax Lesson 10
      - The Advertures of Sherlock Holmes 
      - http://www.gutenberg.org/files/1661/1661-h/1661-h.htm#1
  -->
<html>
<head>
   <!--  adding some css for table asthetics  -->
   <link rel="stylesheet" href="blogaddforms.css">
   <title>The Blog Comment Form></title>
</head>
<body>
   <h2>Adding Comments for Blog ID: <?php echo $_GET['blogid'] ?></h2>
   <h3>Blog Title: <?php echo $_GET['blog_title'] ?></h3>
   <form action="commentaddentry.php" method="POST">
      <input type="hidden" name="blogid" value="<?php echo $_GET['blogid'] ?>" /><br />
      <table>
         <caption>Blog Comment Entry - ALL Fields Required</caption>
         <tr>
            <th><label for="author_name">Author:</label></th>
            <td><input type="text" name="author_name" size="25"></td>
         </tr>
         <tr>
            <th><label for="author_email">Author Email:</label></th>
            <td><input type="text" name="author_email" size="50"></td>
         </tr>
         <tr>
            <th><label for="comment_entry">Article Comment:</label></th>
            <td><textarea name="comment_entry"></textarea></td>
         </tr>
      </table>
      <input type="submit" value="Submit">
   </form>
</body>
</html>
