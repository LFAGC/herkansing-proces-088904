<?php

require 'session.inc.php';
require 'config.php';

$id = $_SESSION['id'];

$sql = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($mysqli, $sql);

$userdata = mysqli_fetch_array($result);

ob_start();

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=account_export_'.strtolower($userdata['username']).'.csv');

$header_args = array('Id', 'Gebruikersnaam');

$data = array(
    array(strval($userdata['id']), $userdata['username']),
);

ob_end_clean();

$output = fopen( 'php://output', 'w' );

fputcsv( $output, $header_args );

foreach( $data as $data_item ){
    fputcsv( $output, $data_item );
}

fclose( $output );
exit;