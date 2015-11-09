<?php 
	set_error_handler('errorHandler', E_ALL);#E_ALL segir að þetta taki við öllum villum

	function errorHandler($number, $text, $file, $line){
		if (ob_get_length()) {
			ob_clean();
		}
		$errorMessage = 'Error'. $number . chr(10) . 'Message:'. $text . chr(10) . 'file: '. $file . chr(10) . 'line: '. $line . chr(10);#cr 10 segir browsernum að fara niður 1 línu ef það eru margar villur
		echo $errorMessage;
		exit;
	}
?>