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
			
			//assign URL
			self::Assigner();
			
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
		//------------------AutoLoad Hook Class-----------------
		private static function AutoLoad($class){
			
			
			foreach(self::$conf['Path'] as $name=>$path){
				
				//Load Hook Class
				if(strpos($class,"{$name}") !== FALSE){
					$path = $path.$class.".php";
					if(IS_FILE($path)){
						include_once($path);
						return TRUE;
					}
					return FALSE;
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
		
		
		//---------------------Assigner-----------------------
		private static function Assigner(){
			
			$url=self::$conf['URL']['Model'];
			echo '<pre>';
			//var_dump($_SERVER);
			switch($url){
				case 'PATH_INFO':
				
					if(array_key_exists('PATH_INFO',$_SERVER) === FALSE) {
						
						SYSControl::Load(array(self::$conf['URL']['Class']=>self::$conf['URL']['Method']));
						
						exit;	
					}
					
					$arg	=	$_SERVER['PATH_INFO'];
					$arg	=	substr($arg,1); 
					$partition	=	strpos($arg,'/');
					
					SYSControl::Load(array(substr($arg,0,$partition)=>substr($arg,$partition+1)));
					exit;
					
				case 'QUERY_STRING':
				
					
					$argArray	=	array();
					$arg	=	$_SERVER[$url];
					
					empty($arg)	?	SYSControl::Load(array(self::$conf['URL']['Class']=>self::$conf['URL']['Method']))	&& exit:'';
					
					$arr	=	explode("&",$arg);
					foreach($arr as $values){
						$pos	=	strpos($values,'=');
						$argArray[substr($values,0,$pos)]=substr($values,$pos+1);
					}
					
					
					SYSControl::Load($argArray);
					
				exit;		
 
			}
			
			Die('ACCESS ERROR');
			
		}

		//-------------------------End--------------------------
		
		
	}
	