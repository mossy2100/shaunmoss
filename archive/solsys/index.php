<?php
if ($_SERVER['HTTP_HOST'] == 'localhost')
	header("Location: http://localhost/solsys/www/dev");
else 
	header("Location: http://dev.solsys.net.au");
?>