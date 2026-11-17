<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Wisata.php';
class WisataController extends Controller {
    public function index() {
        $keyword=trim($_GET['q'] ?? '');
        $this->view('wisata/index',['wisata'=>(new Wisata())->all($keyword),'keyword'=>$keyword]);
    }
    public function detail($id) {
        $item=(new Wisata())->find((int)$id);
        if (!$item) { http_response_code(404); exit('Wisata tidak ditemukan.'); }
        $this->view('wisata/detail',['item'=>$item]);
    }
}
