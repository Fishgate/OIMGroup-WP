<?php 
// Local server settings
 
// Local Database
define('DB_NAME', 'stagidazas_oim');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
 
// Overwrites the database to save keep edeting the DB
define('WP_HOME','http://192.168.1.11/OIM/website-wp/htdocs/');
define('WP_SITEURL','http://192.168.1.11/OIM/website-wp/htdocs/');
 
// Turn on debug for local environment
define('WP_DEBUG', true);

?>