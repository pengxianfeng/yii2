<?php
/**
 *       Filename:  index.php
 *    Description:  
 *         Author:  liuyoubin@happyplaygame.net
 *        Created:  2016年12月21日 下午04:59:01
 *     Copyright (c) 2016, happyplaygame.net All Rights Reserved
 */

define("ROOT_PATH", dirname(__FILE__));
define("CONTROLLER_PATH", ROOT_PATH . "/controller/");
define("LIB_PATH", ROOT_PATH . "/lib/");
define("MODEL_PATH", ROOT_PATH . "/model/");
define("VIEW_PATH", ROOT_PATH . "/view/");
define("LOG_PATH", ROOT_PATH . "/log/");
define("CONFIG_PATH", ROOT_PATH."/config/");
define("PHPLIB_PATH", ROOT_PATH."/../phplib/");
define("ASSETS_PATH", ROOT_PATH."/assets/");
define("WHITE_PATH", ROOT_PATH."/../whiteiplist/");


require_once(PHPLIB_PATH."framework/UbinEngine.php");
require_once(PHPLIB_PATH."log/Logger.php");
require_once(PHPLIB_PATH."encrypt/Encrypt.php");
require_once(PHPLIB_PATH."config/EnvConfig.php");

UbinEngine::AutoLoad(CONTROLLER_PATH);
UbinEngine::AutoLoad(LIB_PATH);
UbinEngine::AutoLoad(CONFIG_PATH);
UbinEngine::AutoLoad(MODEL_PATH);

UbinEngine::AutoHandleErrors(true);

UbinEngine::AutoHandleErrors(true);
if(EnvConfig::ENV =="online"){
	Logger::Config(0x0f, LOG_PATH."growth.log");
}else{
	Logger::Config(Logger::LOG_LEVEL_ALL, LOG_PATH."growth.log");
}

function mtime(){
	$t = gettimeofday();
	return intval($t["sec"] * 1000) + intval($t["usec"] / 1000);
}


UbinEngine::LoadRoute(RouteConfig::$Routes);

function before(){
	UbinEngine::Set("start", mtime());
}

function after(){
	$context = UbinEngine::GetAll();
	$cost = mtime() - $context["start"];
	unset($context["start"]);
	$data = $_REQUEST;
	$data["cost"] = $cost;

	if(isset($context["logid"])) {
		unset($context["logid"]);
	}
	if(isset($context["_username_"])){
		$data["username"] = $context["_username_"];
		$data["userid"] = $context["_userid_"];
		$data["role"] = $context["_role_"];
		unset($context["_userid_"]);
		unset($context["_username_"]);
		unset($context["_role_"]);
	}

	$data = array_merge($data, $context);
	if(isset($data["password"])){
		unset($data["password"]);
	}
	Logger::Notice("request done", 0, $data);
}

UbinEngine::AfterRequest("after");
UbinEngine::BeforeRequest("before");
UbinEngine::Run();
