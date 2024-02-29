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
$table = 'products';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'name',  'dt' => 1 ),
    array( 
        'db' => 'image',   
        'dt' => 2,
        'formatter' => function($d, $row) {
            return '<img src="' . $d . '" alt="Product Image" width="47" height="62">';
        }
    ),
    array(
        'db'        => 'price',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return number_format($d)."₫";
        }
    ),
    array( 
        'db' => 'category_id',     
        'dt' => 4,
        'formatter' => function($d, $row) {
            // Assuming category_id maps to product categories
            switch ($d) {
                case 1:
                    return 'Shirt';
                case 2:
                    return 'Pants';
                case 3:
                    return 'Shoes';
                case 4:
                    return 'Accessory';
                default:
                    return 'Unknown';
            }
        }
    ),
    array(
        'db' => 'id',
        'dt' => 5,
        'formatter' => function($d, $row) {
            return
            '<a class="btn btn-block btn-success"  title="Delete" type="button" href="?controller=dashboard&action=restore&id=' . $row['id'] . '">
                Restore
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
    SSP::product_trash( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>