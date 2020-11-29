<?php

/* VK Callback RCON bot
// https://vk.com/bestaford
// https://talk.24serv.pro/u/bestaford/summary
//  ____            _         __              _ 
// |  _ \          | |       / _|            | |
// | |_) | ___  ___| |_ __ _| |_ ___  _ __ __| |
// |  _ < / _ \/ __| __/ _` |  _/ _ \| '__/ _` |
// | |_) |  __/\__ \ || (_| | || (_) | | | (_| |
// |____/ \___||___/\__\__,_|_| \___/|_|  \__,_|
*/
 
require_once "simplevk-master/autoload.php";
require_once "Rcon.php";
require_once "Config.php";

use DigitalStar\vk_api\vk_api;
use Thedudeguy\Rcon;

$vk = vk_api::create(VK_KEY, VERSION)->setConfirm(CONFIRM_STR);
$vk->initVars($id, $message, $payload, $user_id, $type);
if($type == "message_new" && $message[0] == "/") {
	if(in_array($id, $admins)) {
		$message = strtolower(trim(ltrim($message, "/")));
		$command = explode(" ", $message)[0];
		if((!in_array($command, $commands)) && (strpos($message, "pocketmine") === false)) {
			try {
				$rcon = new Rcon(RCON_HOST, RCON_PORT, RCON_PASSWORD, 1);
				if($rcon->connect()) {
					$response = trim($rcon->sendCommand($message));
					if($response !== "") {
						$response = "Ответ сервера: \n\n".$response;
					}
					$vk->reply(trim("[✔] Команда выполнена. ".$response));
				} else {
					$vk->reply("[✖] Ошибка авторизации RCON.");
				}
			} catch(Exception $e) {
				$vk->reply("[✖] Произошла внутренняя ошибка. \n\n".$e->getMessage());
			}
		} else {
			$vk->reply("[✖] Команда запрещена.");
		}
	} else {
		$vk->reply("[✖] Нет доступа. Ваш айди: ".$id);
	}
}
?>