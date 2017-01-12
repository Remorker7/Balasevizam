<?php
	function zag(){
		header ("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
		header ('Content-Type: application/json');
		header ('Access-Control-Allow-Origin: *');
	}

	function rest_get($request, $data){ 
		$var = $_GET['id'];
		$veza = new PDO('mysql:host=localhost; dbname=balasevizam', 'remorker7', 'balasevizam7');
        $veza->exec("set names utf8");
        $upit = $veza->prepare("SELECT * FROM najbolje WHERE id=?");
        $upit->bindValue(1, $var, PDO::PARAM_INT);
        $upit->execute();
		$ispis = '';
		foreach($upit->fetchAll() as $red) {
			$ispis = array('izvođač' => $red['izvodjac'], 'pjesma' => $red['pjesma']);
		}
		if($ispis != ''){
			echo json_encode($ispis, JSON_UNESCAPED_UNICODE);
		}
		else {
			rest_error($ispis);
		}
	}
	function rest_post($request, $data) 
	{
		print "N/A";
	}
	function rest_delete($request) 
	{
		print "N/A";
	}
	function rest_put($request, $data) 
	{ 
		print "N/A";
	}
	function rest_error($request) 
	{ 
		print "Neispravan ID!";
	}
	$method = $_SERVER ['REQUEST_METHOD'];
	$request = $_SERVER ['REQUEST_URI'];
	switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zag(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}
?>