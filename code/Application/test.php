<?php
// Create new Message
$query_getunternehmenid = "select recruiter_id from search where id='1';";
echo $query_getunternehmenid;
$resultunternehmensid = mysqli_query($con, $query_getunternehmenid);
$row = $resultunternehmensid->fetch_assoc();
echo $row;
$rec_id = $row["recruiter_id"];
echo $rec_id;