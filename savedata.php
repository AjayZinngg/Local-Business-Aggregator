<?php

include 'connect.inc.php';

$signup=1;
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['storename']) && isset($_POST['tags']) && isset($_POST['address']) && isset($_POST['descr']) && isset($_POST['lat']) && isset($_POST['lng']))
{
        $lat=$_POST['lat'];
        $lng=$_POST['lng'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $storename=$_POST['storename'];
        $tags=$_POST['tags'];
        $address=$_POST['address'];
        $descr=$_POST['descr'];

        $query = "Select `email` from `localstore1` where `email`='$email'";
        $query_run = mysql_query($query);
        if (mysql_num_rows($query_run)==1)
        {
            echo "this emailid '$email'. already exists";
        }
        else
        {
        $query= "INSERT into `localstore1` (name, email, storename, tags,address,descr,lat,lng) VALUES ('".mysql_real_escape_string($name)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($storename)."','".mysql_real_escape_string($tags)."','".mysql_real_escape_string($address)."','".mysql_real_escape_string($descr)."','".mysql_real_escape_string($lat)."','".mysql_real_escape_string($lng)."')";
        $query_run = mysql_query($query) or die(mysql_error());
        if ($query_run)
        {
            echo "Your store location is stored";
	    }
        else
        {
            echo "Query run error";
        }
        }
}
else
{
  echo "all fields are required";
}
?>



