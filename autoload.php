<?php
function autoload1($className) {
	$filename = $className.".php";
	if (is_readable ( $filename )) {
		require $filename;
	}
}
spl_autoload_register ( "autoload1" );

