<?php
error_reporting(0);
/**
 * @Author: Eka Syahwan
 * @Date:   2017-05-27 06:52:42
 * @Last Modified by:   Eka Syahwan
 * @Last Modified time: 2018-11-14 16:54:26
 */
class CSRFToken
{
	public function generate_token(){
		$_SESSION['token']  = "csrf_token:".md5(password_hash( date("dmY h:i:s").rand(10000,90000),PASSWORD_DEFAULT));
		return $_SESSION['token'];
	}
	public function show_tokenHTML(){
		echo '<input type="hidden" name="token" value="'.$this->generate_token().'"></input>';
	}
	public function validateToken($token){
		if($token != $_SESSION['token']){
			
			$this->generate_token();

			return false;
		}else{

			$this->generate_token();
			
			return true;
		}
	}
}
