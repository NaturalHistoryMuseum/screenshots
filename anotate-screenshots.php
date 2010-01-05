<?php
$convert_string = "convert -background '#0008' -fill white -gravity west -size 1024x500 caption:\"%s\" +size %s +swap -gravity south -composite %s";
// Get a list of all the files in the directory, and filter HARD!
$files = scandir('.');
// Get the details from dev.scratchpads.eu
$databasedetails = parse_ini_file('/etc/drupal/6/drupal_db_passwords',true);
$mysqli = mysqli_connect("localhost", $databasedetails['devscratchpadseu']['user'], $databasedetails['devscratchpadseu']['password'], 'devscratchpadseu');
$sites = unserialize(array_pop(mysqli_fetch_array(mysqli_query($mysqli, "SELECT value FROM variable WHERE name = 'scratchpad_sites_list'", MYSQLI_USE_RESULT))));
foreach($sites as $url => $site_details){
  echo "$url\n";
  /*
  // $file is the start need to connect to a database now, and do some stuff
  $domain = str_replace('-','',array_shift(explode(".", $file)));
  if($domain =="pad"){
    $domain = explode(".",$file);
    $domain = str_replace('-','',$domain[1]);
  }
  $nodes = array_pop(mysql_fetch_array(mysql_query("SELECT COUNT(nid) AS nodes FROM node;")));
  $users = array_pop(mysql_fetch_array(mysql_query("SELECT COUNT(uid) AS users FROM users")));
  $views = array_pop(mysql_fetch_array(mysql_query("SELECT SUM(totalcount) AS totalcount FROM node_counter;")));
  $caption = ' Pages: '.$nodes.'\n Users: '.$users.'\n Views: '.$views;
  $file_parts = explode('.',$file);
  array_pop($file_parts);
  array_push($file_parts,'annotated.jpg');
  $filenew = implode('.',$file_parts);
  echo sprintf($convert_string,$caption,$file,$filenew)."\n";
*/
}
