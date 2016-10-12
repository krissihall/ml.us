<?PHP 


// define database connection constants
define("DB_SERVER", "localhost");
define("DB_USER", "mystica");
define("DB_PASS", "92eB5C4!7");
define("DB_NAME", "mystica_lunaire");

 
$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS); 
$db = mysql_select_db(DB_NAME, $connection);


// define constants for tables
define("TBL_USERS", "r_users");
define("TBL_ACTIVE_USERS",  "r_active_users");
define("TBL_ACTIVE_GUESTS", "r_active_guests");
define("TBL_BANNED_USERS",  "r_banned_users");


// define constants
define("ADMIN_NAME", "admin");
define("GUEST_NAME", "Guest");
define("ADMIN_LEVEL", 9);
define("USER_LEVEL",  1);
define("GUEST_LEVEL", 0);


// tracker constants
define("TRACK_VISITORS", true);


// timeout constants
define("USER_TIMEOUT", 10);
define("GUEST_TIMEOUT", 5);


// cooking constants
define("COOKIE_EXPIRE", 60*60*24*100);  //100 days by default
define("COOKIE_PATH", "/");  //Available in whole domain


// email, name, constants
define("EMAIL_FROM_NAME", "Lunaire");
define("EMAIL_FROM_ADDR", "lunaire@mysticallegends.com");
define("EMAIL_WELCOME", true);


// lowercase constant
define("ALL_LOWERCASE", false);
?>