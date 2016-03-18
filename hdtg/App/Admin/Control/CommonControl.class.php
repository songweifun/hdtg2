<?php
class CommonControl extends Control{
	protected $db;	//数据连接
	//初始化的
	public function __init(){
		if(method_exists($this,'__auto')){
			$this->__auto();
		}
	}
	
	
}













?>