<?php
class Controller {
    protected function view($file, $data = []) {
        extract($data);
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/' . $file . '.php';
        require __DIR__ . '/../views/layout/footer.php';
    }
    protected function redirect($path) {
        header('Location: ' . BASE_URL . '/' . ltrim($path, '/'));
        exit;
    }
}
