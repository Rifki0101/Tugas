<?php 

class Pilihan extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Pilihan';
        $data['mhs'] = $this->model('Pilihan_model')->getAllPilihan();
        $this->view('templates/header', $data);
        $this->view('pilihan/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Pilihan';
        $data['mhs'] = $this->model('Pilihan_model')->getPilihanById($id);
        $this->view('templates/header', $data);
        $this->view('pilihan/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('Pilihan_model')->tambahDataPilihan($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pilihan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pilihan');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Pilihan';
        $data['mhs'] = $this->model('Pilihan_model')->cariDataPilihan();
        $this->view('templates/header', $data);
        $this->view('pilihan/index', $data);
        $this->view('templates/footer');
    }

}