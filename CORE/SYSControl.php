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
		final public static function Load($Class,$Method){
			self::$conf	=	&basic::$conf;
			include_once(self::$conf['Path']['Controller']."{$Class}.php");
			$Class::$Method();
		}
		
		
		
		
	}