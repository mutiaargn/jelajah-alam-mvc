<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Wisata.php';
require_once __DIR__ . '/../models/Edukasi.php';
class AdminController extends Controller {
    private function guard() { if (empty($_SESSION['admin_id'])) $this->redirect('auth/login'); }
    public function index() {
        $this->guard();
        $this->view('admin/index',['wisata'=>(new Wisata())->all(),'artikel'=>(new Edukasi())->all()]);
    }
    public function tambahWisata() {
        $this->guard();
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            $this->csrf();
            (new Wisata())->create($this->clean($_POST)); $this->redirect('admin');
        }
        $this->view('admin/form-wisata',['item'=>null]);
    }
    public function editWisata($id) {
        $this->guard(); $model=new Wisata(); $item=$model->find((int)$id);
        if (!$item) exit('Data tidak ditemukan.');
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            $this->csrf(); $model->update((int)$id,$this->clean($_POST)); $this->redirect('admin');
        }
        $this->view('admin/form-wisata',['item'=>$item]);
    }
    public function hapusWisata($id) {
        $this->guard(); if ($_SERVER['REQUEST_METHOD']!=='POST') exit('Metode tidak diizinkan.');
        $this->csrf(); (new Wisata())->delete((int)$id); $this->redirect('admin');
    }
    public function tambahEdukasi() {
        $this->guard();
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            $this->csrf(); (new Edukasi())->create($this->clean($_POST)); $this->redirect('admin');
        }
        $this->view('admin/form-edukasi');
    }
    public function hapusEdukasi($id) {
        $this->guard(); if ($_SERVER['REQUEST_METHOD']!=='POST') exit('Metode tidak diizinkan.');
        $this->csrf(); (new Edukasi())->delete((int)$id); $this->redirect('admin');
    }
    private function csrf() { if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) die('Token tidak valid.'); }
    private function clean($input) {
        $out=[]; foreach ($input as $k=>$v) $out[$k]=is_string($v)?trim($v):$v; return $out;
    }
}
