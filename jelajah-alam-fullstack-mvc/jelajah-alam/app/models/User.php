<?php
require_once __DIR__ . '/../core/Model.php';
class User extends Model {
    public function findByUsername($username) {
        $q=$this->db->prepare("SELECT * FROM users WHERE username=?"); $q->execute([$username]); return $q->fetch();
    }
}
