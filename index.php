<?php
	/*
	*Name:Itme Emtry
	*Date:20150830
	*Author:MeteorCat
	*Email:guixin2010@live.cn
	*/
	
	
	//Access Flag
	Defined('FLAG')	or	Define('FLAG','flag');
	
	//Judge Folder
	if(!File_Exists('./CORE')){
		
		die('ERROR! NOT CORE FILE');
	}
	
	//using Basic Framework
	require('./CORE/Basic.php');
	Basic::Ini();