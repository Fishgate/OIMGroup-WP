<?php 
// Local server settings
 
// Local Database
define('DB_NAME', 'oim');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');
 
// Overwrites the database to save keep edeting the DB
define('WP_HOME','http://192.168.1.15/~tyronestafford/oim/htdocs/');
define('WP_SITEURL','http://192.168.1.15/~tyronestafford/oim/htdocs/');
 
// Turn on debug for local environment
define('WP_DEBUG', true);

?>