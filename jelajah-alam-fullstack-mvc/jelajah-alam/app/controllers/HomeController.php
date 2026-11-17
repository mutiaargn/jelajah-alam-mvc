<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Wisata.php';
require_once __DIR__ . '/../models/Edukasi.php';
class HomeController extends Controller {
    public function index() {
        $wisata=(new Wisata())->all();
        $edukasi=(new Edukasi())->all();
        $this->view('home/index',['wisata'=>array_slice($wisata,0,3),'edukasi'=>array_slice($edukasi,0,3)]);
    }
}
