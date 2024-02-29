<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See https://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - https://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
          // DB table to use
$table = 'orders';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'customer_id',  'dt' => 1 ),
    array( 'db' => 'phone',  'dt' => 2 ),
    array( 'db' => 'email',  'dt' => 3 ),
    array( 'db' => 'address',  'dt' => 4 ),
     array(
        'db'        => 'total',
        'dt'        => 5,
        'formatter' => function( $d, $row ) {
            return number_format($d)."₫";
        }
    ),
    array( 'db' => 'created_at',  'dt' => 6 ),
    array( 'db' => 'fullname',  'dt' => 7 ),
    array( 'db' => 'note',  'dt' => 8 ),
    array( 'db' => 'method',  'dt' => 9 ),
    array(
       'db' => 'id',
       'dt' => 10,
       'formatter' => function($d, $row) {
           return 
           '<a href="?controller=dashboard&action=detailOrder&id='. $row['id'] .'">
                <i class="fa-solid fa-circle-info"></i> 
            </a>'
           ;
       }
    )
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'webphp',
    'host' => 'localhost'
    // ,'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
 


?>