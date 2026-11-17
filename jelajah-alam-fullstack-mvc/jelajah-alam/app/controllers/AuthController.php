<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';
class AuthController extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) die('Permintaan tidak valid.');
            $user=(new User())->findByUsername(trim($_POST['username'] ?? ''));
            if ($user && password_verify($_POST['password'] ?? '', $user['password'])) {
                session_regenerate_id(true); $_SESSION['admin_id']=$user['id']; $_SESSION['admin_name']=$user['nama'];
                $this->redirect('admin');
            }
            $error='Username atau password salah.';
            $this->view('auth/login',['error'=>$error]); return;
        }
        $this->view('auth/login');
    }
    public function logout() { session_destroy(); $this->redirect(''); }
}
