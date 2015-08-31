<?php
	defined('FLAG') or DIE('ACCESS ERROR!');
	/*
	*Name:Index Controller
	*Date:20150831
	*Author:MeteorCat
	*Email:guixin2010@live.cn
	*/
	class Hello extends SYSControl{
		
		protected static function Index(){
			echo 'Hello World';
		}
	}