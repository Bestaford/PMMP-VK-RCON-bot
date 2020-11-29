<?php

/* VK Callback RCON bot configuration file
// https://vk.com/bestaford
// https://talk.24serv.pro/u/bestaford/summary
//  ____            _         __              _ 
// |  _ \          | |       / _|            | |
// | |_) | ___  ___| |_ __ _| |_ ___  _ __ __| |
// |  _ < / _ \/ __| __/ _` |  _/ _ \| '__/ _` |
// | |_) |  __/\__ \ || (_| | || (_) | | | (_| |
// |____/ \___||___/\__\__,_|_| \___/|_|  \__,_|
*/

const VK_KEY = ""; //Ключ сообщества VK
const CONFIRM_STR = ""; //Строка, которую должен вернуть сервер
const VERSION = "5.101"; //Версия VK API

const RCON_HOST = "127.0.0.1"; //Адрес сервера. Если бот установлен на том же VDS, что и сервер, то ставим 127.0.0.1 (localhost)
const RCON_PORT = "19132"; //Порт сервера
const RCON_PASSWORD = ""; //Пароль RCON из server.properties

$admins = []; //Айди администраторов или бесед через запятую
$commands = ["op", "stop", "reload", "setgroup", "ban", "kick"]; //Запрещённые команды через запятую

?>