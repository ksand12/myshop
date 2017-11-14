<?php
session_start();
/*
$title = 'Главная страница';
*/
$description = 'Описание 1-23';
$keywords = 'товары, ';

$keywords = '';

$db_location = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'myshop';
$db_con = mysqli_connect($db_location, $db_user, $db_pass, $db_name);

if(!$db_con){
	
	exit('Error');
	
}











