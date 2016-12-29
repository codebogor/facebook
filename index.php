<?php

require 'src/facebook.php';
$appID = "1185806718181519";
$appSecret ="3ece7f9bb4f899f41d282b82779648d8";
$facebook = new Facebook(array(
		'appId'  => $appID,
		'secret' => $appSecret
		
));
if ($facebook->getUser()==0)
{
	$loginUrl = $facebook->getLoginUrl(array(
		'scope' => 'user_posts,manage_pages,publish_actions,publish_pages'	
	));
	echo "<a href=\"$loginUrl\">Login With Facebook</a>";
}
else {
	$pages = $facebook->api('me/accounts');
	
	$id = $pages['data'][0]['id'];
	$token = $pages['data'][0]['access_token'];
	
	$api = $facebook->api($id.'/feed',"POST",array(
			'access_token'=>$token,
			'link'=>'codebogor.com',
			'message'=>'hello php sdk'
			
	));
	
}
?>
