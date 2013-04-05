<?php


$server_name = "sumer3";
$connection_info = array( "Database"=>"bis_testing", "UID"=>"bisuser", "PWD"=>"1qazse4");
$conn = sqlsrv_connect( $server_name, $connection_info);
if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
}

if ( sqlsrv_begin_transaction( $conn ) === false ) {
     die( print_r( sqlsrv_errors(), true ));
}
$result = array();

// insert a new brand

$sql = "INSERT INTO Brand(brand_name, deleted, created_at)
       OUTPUT Inserted.brand_id
       values
       (?, ?, ?);";

$brand_name = 'Be a lady'; $deleted = 0; $created_at = '2013-03-21 07:07:23.367';
$stmt = sqlsrv_query( $conn, $sql, array($brand_name, $deleted, $created_at));
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
$result[] = $stmt;

$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
print_r($row);
//$brand_pk = $row[0];
//echo $brand_pk;

/*$sql = "SELECT CAST(COALESCE(SCOPE_IDENTITY(), @@IDENTITY) AS int)";
$stmt = sqlsrv_query( $conn, $sql);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
$result[] = $stmt;

$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
$brand_pk = $row[0];
echo $brand_pk;*/

// insert admin post

/*$sql = "INSERT INTO Post(post_name, brand_id, deleted, created_at)
       values
       (?, ?, ?, ?);";

$post_name = 'Admin'; $deleted = 0; $created_at = '2013-03-21 07:07:23.367';
$stmt = sqlsrv_query( $conn, $sql, array($post_name, $brand_pk, $deleted, $created_at));
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
$result[] = $stmt;

if(count(array_keys($result, 'yes')) == count($result)) {
     sqlsrv_commit( $conn );
     echo "Transaction committed.<br />";
} else {
     sqlsrv_rollback( $conn );
     echo "Transaction rolled back.<br />";
}*/

?>