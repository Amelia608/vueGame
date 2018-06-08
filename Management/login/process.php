<?PHP
require_once(dirname(__FILE__).'/../../common/config.inc.php');
require(root_xrclass.'user.class.php');

$username = $_POST2['username'];
$password = $_POST2['password'];

$lg = new adm();

$arr_result = $lg->login($username,$password,getip());

echo json_encode_api($arr_result);
?>
