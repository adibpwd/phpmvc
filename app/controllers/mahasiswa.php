<?php

class mahasiswa extends Controller
{
  public function index($id)
  { 
    $data["title"] = "mahasiswa";
    $data['amountMhs'] = $this->model('Mahasiswa_model')->amountUsers();
    $data['maxMhsPage'] = 5;
    $data['amountPage'] = ceil($data['amountMhs'] / $data['maxMhsPage']);
    $data['pageActive'] = $id;
    $data['startUser'] = ($data['maxMhsPage'] * $data['pageActive']) - $data['maxMhsPage'];
    $data['mhs'] = $this->model('Mahasiswa_model')->userssInnerKelas($data);
    $this->view("templates/header", $data);
    $this->view("mahasiswa/index", $data);
    $this->view("templates/footer");
  } 

  public function detail($id) {
    $data["title"] = "detail mahasiswa";
    $data["mhs"] = $this->model('Mahasiswa_model')->getMhsById($id);
    $this->view("templates/header", $data);
    $this->view("mahasiswa/detail", $data);
    $this->view("templates/header");
  }

  public function tambah() {
    
    if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
      Flasher::setFlash('berhasil', ' ditambahkann', 'success');
      header('Location: ' . BASEURL . '/mahasiswa/index/1');
      exit;
    } else {
      Flasher::setFlash('gagal', ' ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/mahasiswa/index/1');
      exit;
    }
  }

  public function hapus($id) {
    $notif = $this->model('Mahasiswa_model')->hapusDataMahasiswa($id);
    if( $notif > 0 ) { 
      Flasher::setFlash('berhasil', ' dihapus', 'success');
      header('Location: ' . BASEURL . '/mahasiswa/index/1');
      exit;
    } else {
      Flasher::setFlash('gagal', ' dihapus', 'danger');
      header('Location: ' . BASEURL . '/mahasiswa/index/1');
      exit;
    }
  }

  public function getubah() {
    echo json_encode($this->model('Mahasiswa_model')->getMhsById($_POST['id']));
  }

  public function ubah() {
   
    if( $this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ) {
      Flasher::setFlash('berhasil', ' diubah', 'success');
      header('Location: ' . BASEURL . '/mahasiswa/index/1');
      exit;
    } else {
      Flasher::setFlash('gagal', ' diubah', 'danger');
      header('Location: ' . BASEURL . '/mahasiswa/index/1');
      exit;
    }
  }

  public function cari() {
    $data["title"] = "mahasiswa";
    $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
    $this->view("templates/header", $data);
    $this->view("mahasiswa/index", $data);
    $this->view("templates/footer");
  }

  public function cariByKeyword($keyword = '') {
    usleep(1000000);

    $data['mhs'] = $this->model('Mahasiswa_model')->cariMhsByKeyword($keyword);
    $confirm = "'yakin mau hapus ?'";
    if($data['mhs']) {
      foreach ($data['mhs'] as $mhs) {
        echo '<li class="list-group-item">
          nama : ' . $mhs['fullname'] . '
          <a class="badge badge-success badge-pill float-right ml-1 tampilModalUbah" href="' . BASEURL . '/mahasiswa/ubah/' . $mhs['id'] . '" data-toggle="modal" data-target="#formModal" 
          data-id="' . $mhs['id'] . '">update</a>
          <a class="badge badge-primary badge-pill float-right ml-1" href="' . BASEURL . '/mahasiswa/detail/' . $mhs['id'] . '">detail</a>
          <a class="badge badge-danger badge-pill float-right mr-1" href="' . BASEURL . '/mahasiswa/hapus/' . $mhs['id'] . '" onclick="return confirm('. $confirm .')">hapus</a>
        </li>';
         } 
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        cari yang lain, <strong> mungkin dia bukan yang terbaik untukmu. </strong> maaf.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';
      }
   }
}