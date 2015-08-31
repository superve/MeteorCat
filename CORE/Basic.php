<?php
	defined('FLAG') or DIE('ACCESS ERROR!');
	/*
	*Name:Initialize Item
	*Date:20150830
	*Author:MeteorCat
	*Email:guixin2010@live.cn
	*/
	
	//Initialize Class
	class Basic{
		//Config
		public static $conf;
		
		//-------------------Formatter-------------------------
		public static function Ini(){
			//Load Config
			self::Config();
			
			
			//Register Class
			spl_autoload_register(__CLASS__.'::AutoLoad');
			
			//Load Hook
			self::Hook();
			
		}
		//----------------------End----------------------
		
		
		//---------------------Config-----------------------
		private static function Config(){
			//Judge\Create Hook Folder
			$Conf=include_once('./CORE/Config.php');
			$GLOBALS['CONF']=$Conf;
			self::$conf=$Conf;
		} 
		
		//-------------------End--------------------------
		
		//Flag
		//------------------Load Hook Class-----------------
		private static function AutoLoad($class){
			
			foreach(self::$conf['Path'] as $name=>$path){
				
				if(strpos($class,"{$name}") !== FALSE){
					$path = $path.$class.".php";
					
					if(IS_FILE($path)){
						include_once($path);
					}
					
				}
			}
			
			
			
		}
		//------------------End-----------------
		
		
		
		//---------------------Hook Load-----------------------
		private static function Hook(){
			
			//Read&Load Hook Function
			$handle=opendir(self::$conf['Path']['Hook']);
			
			while(FALSE !==  ($file=readdir($handle))){
				
				if($file === "." || $file === ".."){
					continue;
				}
				
				//using Hook Class
				$file=basename($file,'.php');
				$file::Load();
			}
			unset($handle);
			
		} 
		
		//-------------------------End--------------------------
		
		
		


		
		
		
	}
	