<?php
/*-- filename: gahblog/blogaddform.php
      - Sun 18 Aug 2013 11:30:11 PDT reorganized with modifications
      - old filename: lesson10-12_blog/lab10_o1-blogentry.html
*/
?>
<!-- <!doctype html>
     Intro PHP/SQL lesson 10 Project Addressbook - Part 2
      - Modified lab10_o1-addentry.php and reorganized for blogs table
      - Fri 02 Aug 2013 02:25:21 PM PDT 
      - Renamed to lab10_o1-blogentry.html
     Used Text from Javascript: JSON and Ajax Lesson 10
      - The Advertures of Sherlock Holmes 
      - http://www.gutenberg.org/files/1661/1661-h/1661-h.htm#1
     moved library reference to ghornbec/gah_phpsql/include.
     calling html is located in ghornbec/gah_phpsql/lesson10-12_blog
     Was lab10_h1-addentry.html
      - Main HTML file with library reference ghornbec/cgi/addentry.php.
      - Wed Jul 24 15:05:27 PDT 2013 was lab10_h1-addentry.html
  -->
<html>
<head>
   <!--  adding some css for table asthetics  -->
   <!-- <link rel="stylesheet" href="lab10_o1-blogentry.css"> -->
   <link rel="stylesheet" href="blogaddforms.css">
   <title>The Blog Initialize Form></title>
</head>
<body>
   <h1>Welcome to my blog!</h1>
   <!-- was: "../include/lab10_o1-blogentry.php"  -->
   <form action="blogaddentry.php" method="POST">
      <table>
         <caption>Blog Data Entry - ALL Fields Required</caption>
         <tr>
            <th><label for="author_name">Author:</label></th>
            <td><input type="text" name="author_name" size="25"></td>
         </tr>
         <tr>
            <th><label for="blog_title">Article Title:</label></th>
            <td><input type="text" name="blog_title" size="50"></td>
         </tr>
         <tr>
            <th><label for="blog_entry">Article Content:</label></th>
            <td><textarea name="blog_entry"></textarea></td>
         </tr>
      </table>
      <input type="submit" value="Submit">
   </form>
</body>
</html>
