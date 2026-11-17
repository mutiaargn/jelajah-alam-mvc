<?php
require_once __DIR__ . '/../core/Model.php';
class Edukasi extends Model {
    public function all() { return $this->db->query("SELECT * FROM edukasi ORDER BY id DESC")->fetchAll(); }
    public function find($id) {
        $q=$this->db->prepare("SELECT * FROM edukasi WHERE id=?"); $q->execute([$id]); return $q->fetch();
    }
    public function create($d) {
        $q=$this->db->prepare("INSERT INTO edukasi(judul,ringkasan,isi) VALUES(?,?,?)");
        return $q->execute([$d['judul'],$d['ringkasan'],$d['isi']]);
    }
    public function delete($id) {
        $q=$this->db->prepare("DELETE FROM edukasi WHERE id=?"); return $q->execute([$id]);
    }
}
