<?php
	defined('FLAG') or DIE('ACCESS ERROR!');
	/*
	*Name:System Config
	*Date:20150830
	*Author:MeteorCat
	*Email:guixin2010@live.cn
	*/
	$dir = getcwd();
	$dir = str_replace('\\','/',$dir);
	$dir = $dir.'/';
	$config = array();
	
	
	//====================append configure=====================
	
	//------------------Path-------------------------
	//Root Diretory
	$config['Path']['root'] = $dir;
	
	//Core Diretory
	$core=$dir.'CORE/';
	$config['Path']['Core'] = $core;
			
	//Hook Diretory
	$config['Path']['Hook'] = $core.'HOOK/';
	
	
	//------------------Limit-------------------------
	//Ip Limit
	//Example:
	/*
	*$config['Limit']['Ip']['ALL'] = TRUE; //Allow All
	*$config['Limit']['Ip']['ALL'] = FALSE; //Deny All
	*$config['Limit']['Ip']['Deny'] = array('192.168.1.1','192.168.1.2'......); //Specify Deny Ip
	*$config['Limit']['Ip']['Allow'] = array('192.168.1.1','192.168.1.2'......); //Specify Allow Ip
	*/
	$config['Limit']['Ip']['ALL'] = TRUE;
	
	
	
		
	//===========================End==========================
		
	return $config;