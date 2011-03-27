<?php
	
	class db{

		static function pdo(){
			return new PDO('mysql:host=localhost;dbname='.DB_NAME, DB_USER, DB_PASS);
		}
	}
?>