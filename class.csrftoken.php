<?php
error_reporting(0);
/**
 * @Author: Eka Syahwan
 * @Date:   2017-05-27 06:52:42
 * @Last Modified by:   Eka Syahwan
 * @Last Modified time: 2017-05-27 07:08:07
 */
session_start();
class CSRFToken
{
	public function generate_token(){
		$_SESSION['token']  = "__csrfToken:".md5(date("dmY h:i:s").rand(10000,90000));
		return $_SESSION['token'];
	}
	public function show_tokenHTML(){
		echo '<input type="hidden" name="token" value="'.$this->generate_token().'"></input>';
	}
	public function validateToken($token){
		if($token != $_SESSION['token']){
			return false;
		}else{
			return true;
		}
	}
}