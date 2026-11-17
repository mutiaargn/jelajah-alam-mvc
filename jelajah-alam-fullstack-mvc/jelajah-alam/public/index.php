<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/WisataController.php';
require_once __DIR__ . '/../app/controllers/EdukasiController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';
if (empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32));
$url=trim($_GET['url'] ?? '', '/'); $parts=$url===''?[]:explode('/',$url);
$controller=$parts[0] ?? 'home'; $method=$parts[1] ?? 'index'; $arg=$parts[2] ?? null;
$routes=[
 'home'=>['index'=>[HomeController::class,'index']],
 'wisata'=>['index'=>[WisataController::class,'index'],'detail'=>[WisataController::class,'detail']],
 'edukasi'=>['index'=>[EdukasiController::class,'index'],'detail'=>[EdukasiController::class,'detail']],
 'auth'=>['login'=>[AuthController::class,'login'],'logout'=>[AuthController::class,'logout']],
 'admin'=>[
   'index'=>[AdminController::class,'index'],'tambahWisata'=>[AdminController::class,'tambahWisata'],
   'editWisata'=>[AdminController::class,'editWisata'],'hapusWisata'=>[AdminController::class,'hapusWisata'],
   'tambahEdukasi'=>[AdminController::class,'tambahEdukasi'],'hapusEdukasi'=>[AdminController::class,'hapusEdukasi']
 ]
];
if (!isset($routes[$controller][$method])) { http_response_code(404); exit('Halaman tidak ditemukan.'); }
[$class,$action]=$routes[$controller][$method]; (new $class())->$action(...($arg!==null?[$arg]:[]));
