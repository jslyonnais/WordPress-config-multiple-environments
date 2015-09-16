# WordPress-config-multiple-environments
Tired of changing your WordPress URL and you're working on multiple environments at the same time (local, staging and prod) ? Get rid of this by changing your wp-config.php file ! Follow this "tutorial" (or take the file as an example).

## Set up multiple environments using multiple database
1. You should create at least an default env (for us is "production") and another one for another environment.
	```
	/* Default environment */
	$db['production'][DB_NAME] 		= "db_name";
	$db['production'][DB_USER] 		= "root";
	$db['production'][DB_PASSWORD] 	= "root";
	$db['production'][DB_HOST] 		= "localhost";
	
	/* Staging environment */
	$db['stage'][DB_NAME] 			= "db_name";
	$db['stage'][DB_USER] 			= "stage";
	$db['stage'][DB_PASSWORD] 		= "stage123";
	$db['stage'][DB_HOST] 			= "localhost";
	
	/* Local environment */
	$db['local'][DB_NAME] 			= "db_name";
	$db['local'][DB_USER] 			= "local";
	$db['local'][DB_PASSWORD] 		= "local123";
	$db['local'][DB_HOST] 			= "localhost";
	```

2. You gonna need to define when the environment would be applied.
	```
	/* Define host URL */
	$hosts['stage']					= "project.stage.url.com";
	$hosts['local']					= "project.local";
	```

3. By default, environment should be "production" (in case something went wrong, this should be running on live website ;-) ).
	```
	/* Define default environment */
	$environment = "production";
	```

4. For each custom host you previously entered, get parameters and get the url.
	```
	foreach ($hosts as $env => $host) 
		if (preg_match("/(www\.)?$host$/is", $_SERVER["HTTP_HOST"]))
		{
			$environment = $env;
		}
	```

5. Now that you get the info in a variable, define WP database and URL parameters.
	```
	define('DB_NAME'	, $db[$environment][DB_NAME]);
	define('DB_USER'	, $db[$environment][DB_USER]);
	define('DB_PASSWORD', $db[$environment][DB_PASSWORD]);
	define('DB_HOST'	, $db[$environment][DB_HOST]);
	
	define('WP_SITEURL'	, 'http://' . $db[$environment][DB_HOST]);
	define('WP_HOME'	, 'http://' . $db[$environment][DB_HOST]);
	```

6. Enjoy life ! ;-)
