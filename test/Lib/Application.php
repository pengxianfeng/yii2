<?php
/**
 * Created by PhpStorm.
 * User: LEWANgame
 * Date: 2018/7/31
 * Time: 16:13
 */


class Application
{
	public  function __construct($config = [])
	{
	
	}
	
	public function loadClass(){
		spl_autoload_register(function ($class) {
			try{
				if ($class) {
					$file = str_replace('\\', '/', $class);
					$file .= '.php';
					if (file_exists($file)) {
						require_once $file;
					}else{
						throw (new \Exception($file." is no found"));
					}
				}
			}catch (Exception $e){
//				var_dump($e->getMessage());
			}
		});
	}
	
	public function __destruct()
	{
		// TODO: Implement __destruct() method.
	}
}