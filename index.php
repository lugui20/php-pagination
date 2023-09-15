<?php

	// +++++++++++++++++++++++++++++++++++++++++++++++++++
	// This example shows how to use Class CtrlPagination
	// +++++++++++++++++++++++++++++++++++++++++++++++++++

	$resultsQty = 35; // Just an example.
	// The value for $resultsQty can be returned from a DB query
	// like "SELECT count(*) FROM table_name WHERE conditions;"

	$limit = 10; // setup how many records per page

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";  
    else
        $url = "http://";
    $url.= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	$baseLink = strtok($url, '?');

	include_once("ctrlPagination.php");
	include_once("intPagination.php");
	include_once("cPagination.php");
	$ctrlPagination = new CtrlPagination();
	$intPagination = new IntPagination();
	$cPagination = new CPagination();
	$ctrlPagination->calculate($cPagination, $resultsQty, $limit);
	$offset = $cPagination->getOffset();	

	// Now, use $limit and $offset to extract complete records from DB
	// similar to: "SELECT columns FROM table_name 
	//				WHERE conditions LIMIT :limit OFFSET :offset"



?><!DOCTYPE html>
	<head>
		<title>Pagination example</title>
		<link rel="stylesheet" href="./template.css?v=<?php echo time(); ?>" type="text/css">
	</head>
	<body><div class="column-100">			
		<?php $ctrlPagination->draw($cPagination, $intPagination, $baseLink); ?>
		<?php $ctrlPagination->stats($cPagination, $intPagination); ?>
	</div>
	</body>
</html>