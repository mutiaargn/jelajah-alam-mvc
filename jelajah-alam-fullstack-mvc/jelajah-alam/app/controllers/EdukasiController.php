<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Edukasi.php';
class EdukasiController extends Controller {
    public function index() { $this->view('edukasi/index',['artikel'=>(new Edukasi())->all()]); }
    public function detail($id) {
        $item=(new Edukasi())->find((int)$id);
        if (!$item) { http_response_code(404); exit('Artikel tidak ditemukan.'); }
        $this->view('edukasi/detail',['item'=>$item]);
    }
}
