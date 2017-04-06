<?php

  // first of ALL ... U CONFIGURE THE OCI8 THEN AFTER IT WILL WORK ...
  // DOWNLOAD THE ZIP FILE FROM ORACLE SITE FOR INCIENTCLIENT (BASIC,SDK,SQLPLUS)
  // EXTRACT THE ALL FILE USING COMMAND PROMPT IN SAME PLACE
  // THEN AFTER MAKE THE SYMBOLIC LINK SUCH AS ln -s file.so.12.2 file.so
  // fire the command sudo apt-get install oci8 
  // include the extension=oci8.so in php.ini
  //  

$tns = "
(DESCRIPTION =
   (ADDRESS_LIST =
     (ADDRESS = (PROTOCOL = TCP)(HOST = host_name)(PORT = 1521))
   )
   (CONNECT_DATA =
     (SID=ORCL)
   )
 )
      ";

 $conn = oci_connect('username', 'password', $tns);
if (!$conn) {
      $m = oci_error();
   echo $m['message'], "\n";
   exit;
}

?>

