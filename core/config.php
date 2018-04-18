<?

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'shop_db');

$db = mysqli_connect(HOST, USER, PASS, DB);

//переменная для стилей админки, пришлось зафиксировать, иначе стили с разной вложенностью не работают
$site_root_url = "http://my-shop.loc/";

?>