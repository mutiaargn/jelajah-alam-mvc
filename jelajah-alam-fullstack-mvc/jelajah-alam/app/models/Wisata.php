<?php
require_once __DIR__ . '/../core/Model.php';
class Wisata extends Model {
    public function all($keyword = '') {
        if ($keyword !== '') {
            $q = $this->db->prepare("SELECT * FROM wisata WHERE nama LIKE ? OR lokasi LIKE ? ORDER BY id DESC");
            $like = "%$keyword%"; $q->execute([$like, $like]); return $q->fetchAll();
        }
        return $this->db->query("SELECT * FROM wisata ORDER BY id DESC")->fetchAll();
    }
    public function find($id) {
        $q = $this->db->prepare("SELECT * FROM wisata WHERE id = ?");
        $q->execute([$id]); return $q->fetch();
    }
    public function create($d) {
        $q = $this->db->prepare("INSERT INTO wisata (nama,lokasi,kategori,harga_tiket,deskripsi,gambar) VALUES (?,?,?,?,?,?)");
        return $q->execute([$d['nama'],$d['lokasi'],$d['kategori'],$d['harga_tiket'],$d['deskripsi'],$d['gambar']]);
    }
    public function update($id, $d) {
        $q = $this->db->prepare("UPDATE wisata SET nama=?,lokasi=?,kategori=?,harga_tiket=?,deskripsi=?,gambar=? WHERE id=?");
        return $q->execute([$d['nama'],$d['lokasi'],$d['kategori'],$d['harga_tiket'],$d['deskripsi'],$d['gambar'],$id]);
    }
    public function delete($id) {
        $q = $this->db->prepare("DELETE FROM wisata WHERE id=?"); return $q->execute([$id]);
    }
}
