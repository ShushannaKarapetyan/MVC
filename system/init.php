<?php
	//spl_autoload_register () does not need to implement an autoload function in every __autoload () file.
	spl_autoload_register(function ($className){
	        include "classes/$className.php";
	    });

    $rout = new Rout();

?>