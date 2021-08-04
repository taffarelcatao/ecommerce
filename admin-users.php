<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;

$app->get("/admin/user", function(){

	User::verifyLogin();

	$users = User::listAll();

	$page = new Hcode\PageAdmin();

	$page->setTpl("users", array(
		"users"=>$users
	));
});

$app->get("/admin/user/create", function(){

	User::verifyLogin();

	$page = new Hcode\PageAdmin();

	$page->setTpl("users-create");
});

$app->get("/admin/user/:iduser/delete", function($iduser){

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->delete();

	header("Location: /admin/user");
	exit;
});

$app->get("/admin/user/:iduser", function($iduser){

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$page = new Hcode\PageAdmin();

	$page->setTpl("users-update", array(
		"user"=>$user->getValues()
	));
});

$app->post("/admin/user/create", function(){

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->setData($_POST);

	$user->save();

	header("Location: /admin/user");
	exit;
});

$app->post("/admin/user/:iduser", function($iduser){

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->get((int)$iduser);

	$user->setData($_POST);

	$user->update();

	header("Location: /admin/user");
	exit;
});

?>