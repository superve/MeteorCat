<?php
	defined('FLAG') or DIE('ACCESS ERROR!');
	/*
	*Name:Controller Base
	*Date:20150831
	*Author:MeteorCat
	*Email:guixin2010@live.cn
	*/
	
	class SYSControl{
		static protected $conf; 
			
		//Server Storey
		final public static function Load($arg){
			self::$conf	=	&basic::$conf;
			
			self::Search($arg);
			
		}
		
		
		/*
		*Check Position
		*$arg	----->	Array
		*
		*/
		final private static function Search($arg){
			
			$files	=	array();
			
			$Controller	=	NULL;
			
			$Method	=	NULL;
			
			$handle	=	opendir(self::$conf['Path']['Controller']);
			
			while(FALSE !==  ($file=readdir($handle))){
				
				if($file === "." || $file === ".."){
					continue;
				}
				
				$file	=	basename($file,'.php');
				$files[]	=	$file;
			}
			unset($handle);
			
			
			foreach($arg as $class	=>	$method){
				
				$class	=	ucfirst(strtolower($class));
				$method	=	ucfirst(strtolower($method));
				
				if(in_array($class,$files)){
					$Controller	=	$class;
					$Method	=	$method;
				}
				
				
			}
			
			$Controller	===	NULL	&&	Die('ACCESS ERROR');
				
			include_once(self::$conf['Path']['Controller']."{$Controller}.php");
			$Controller::$Method();
		}
		
		public static function __CallStatic($me){
			
		} 
		
		
		
	}