<?php

header('Content-Type: text/json');

if (
isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' &&
strpos($_SERVER['HTTP_REFERER'].'', $_SERVER['SERVER_NAME']) !== false
) {
$tk = new SoapClient("http://bedrift.telefonkatalogen.no/tk/plainsearch.php?wsdl&style=document&username=SOSPESO&password=Link1234");
$result = $tk->search(array("qry" => $_GET['qry'], "from" => 1, "to" => 1));
echo json_encode($result);
} else {
http_status_code(403);
echo('{}');
}