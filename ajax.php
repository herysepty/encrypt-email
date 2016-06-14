<?php
	// include "Blowfish.php";
	include "aes.php";
	#error_reporting(0);
	
	
	if(isset($_POST['action'])){
		switch($_POST['action']){
			case 'dekripsi':  dekrip();
			break;
			
		}
	}
	
	function dekrip(){
		$key=$_POST['key'];
		$text=$_POST['text'];
		// $replace = str_replace(" ", "+", $text);
		// $texttest= "Von7rQAFOvE2O/a3ZrhCpfgYKBQbu3YrdtK0QLU3EM8vAiCghCzYRuUbJNdU/6xY/xdnmwwbatx7lhtZTPgcdHVp8TuCv3XPy8iTDbCGM4= ";
		#$start = (double)microtime()+time();
		// $blowfish=new Blowfish($key);
		// $dek = $blowfish->dekripsi($replace);
		// $test = $blowfish->dekripsi($text);
		$aes = new Aes();
		$dek = $aes->decrypt(strip_tags($text),$key);
		echo $dek;
		#echo $texttest;
		#echo ("<br>");
		#echo $text;
		#echo $replace;
		#echo $test;
		#$diff = (double)microtime()+time() - $start;
		#echo $crypto;
		
		#print_r($blowfish->dekripsi($text));
	}
	
?>