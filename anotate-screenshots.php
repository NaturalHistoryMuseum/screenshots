<?php
$convert_string = "convert -background '#0008' -fill white -gravity west -size 1200x600 caption:\"%s\" +size %s +swap -gravity south -composite %s";
// Get a list of all the files in the directory, and filter HARD!
$files = scandir('.');
// Get the details from dev.scratchpads.eu
$databasedetails = parse_ini_file('/etc/drupal/6/drupal_db_passwords',true);
$connection = mysqli_init();
mysqli_real_connect($connection, "localhost", $databasedetails['devscratchpadseu']['user'], $databasedetails['devscratchpadseu']['password'], 'devscratchpadseu', 3306, NULL, MYSQLI_CLIENT_FOUND_ROWS);
mysqli_query($connection, 'SET NAMES "utf8"');
$sites = unserialize(array_pop(mysqli_fetch_array(mysqli_query($connection, "SELECT value FROM variable WHERE name = 'scratchpad_sites_list'", MYSQLI_USE_RESULT))));
foreach($sites as $url => $site_details){
  $site_details = $sites[$url];
  if(is_array($site_details)){
    if(is_array($site_details['nodes'])){
      $nodes = array_sum($site_details['nodes']);
    } else {
      $nodes = 1;
    }
    $caption = ' Pages: '.$nodes.'\n Users: '.$site_details['users']['total'].'\n Views: '.$site_details['views'];
    echo sprintf($convert_string,$caption,"$url.1200x900.jpg","$url.annotated.jpg")."\n";
  }
}
