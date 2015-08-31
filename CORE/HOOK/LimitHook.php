<?php
	defined('FLAG') or DIE('ACCESS ERROR!');
	/*
	*Name:Limited Class 
	*Date:20150830
	*Author:MeteorCat
	*Email:guixin2010@live.cn
	*/
	class LimitHook{
		private static $conf;
		//-------------------Formatter-------------------------
		/*
		*Arguments===>array
		*Reserve Module Argument
		*/
		public static function Load($arguments = NULL){
			//Load Config
			self::$conf=Basic::$conf['Limit'];
			
			//Call Ip Method
			self::Ip();	
					
		}
		//-------------------------End-------------------------
		
		//-------------------------Limited IP-------------------------
		private static function Ip(){	
				
				foreach(self::$conf['Ip'] as $act=>$arg){
					//Allow\Deny ALL
					if($act === "ALL"){
						
						$arg !== TRUE &&  die('ACCESS ERROR!'); 
						
						break;
					}
										
					//Specify Allow\Deny Ip 
					if($act === 'Deny'){
						
						in_array($_SERVER['REMOTE_ADDR'],$arg) == TRUE && die('ACCESS ERROR!');
						
						break;	
					}
					
					if($act === 'Allow'){
						
						in_array($_SERVER['REMOTE_ADDR'],$arg) == FALSE && die('ACCESS ERROR!');
						
						break;
					}
				}
				
			return;
			
		}
		
		
		
		
	}