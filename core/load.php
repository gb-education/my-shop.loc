<?
require_once ('config.php');
require_once ('core.php');

$url = explode('/', $_SERVER['HTTP_REFERER']);
//var_dump($url);
$page_name = $url[count($url)-2];

$sql_cat = "SELECT * FROM `categories` WHERE `alias` = '".$page_name."';";
	//echo "$sql_cat";
mysqli_query($db, $sql_cat);
if (mysqli_affected_rows($db) > 0) {
	$result = mysqli_query($db, $sql_cat);
}
else {
	echo "В базе ничего не найдено. Ошибка 404.";
	exit;
}
//print_r($result);
$array_result = array();
while ($row = mysqli_fetch_assoc($result)) {
		$array_result[] = $row;
	}

if (isset($_GET['num'])) {
	$num = (int)$_GET['num'];
	$sql_goods = "SELECT * FROM `goods` WHERE `cat_id` = ".$array_result[0]['id']." LIMIT ".$num.", 3;";
	if (getAssocResult($sql_goods)) {

		foreach (getAssocResult($sql_goods) as $prod_once_info) {
				//echo $key;
				//echo $value;
				//print_r($prod_once_info);
				$prod_once = file_get_contents('../template/00_product_once.tpl');

				foreach ($prod_once_info as $key => $value) {
					//echo $key."<br>";
					//echo $value."<br>";
					$prod_once = str_replace("{{".$key."}}",$value,$prod_once);
				}
				$prod_list .= $prod_once;
			}

		echo $prod_list;

	}
}