<?php
class BuyControl extends Control{
	
	/**
	 * 订单提交页
	 */
	public function index(){
		$this->display();
	}
	/**
	 * 付款页 
	 */
	public function payment(){
		$this->display();
	}
	/**
	 * 购买成功
	 */
	public function buysuccess(){
		$this->display();
	}
}













?>