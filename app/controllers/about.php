<?php

class about extends Controller
{
  
  public function index($nama = 'no name', $pekerjaan =  'no work')
  {
    $data['title'] = "about";
    $data['nama'] = $nama;
    $data['pekerjaan'] = $pekerjaan;
    $this->view("templates/header", $data);
    $this->view("about/index", $data);
    $this->view("templates/footer");
  }

  public function page()
  {
    $data['title'] = "pages";
    $this->view("templates/header", $data);
    $this->view("about/page");
    $this->view("templates/footer");
  }
}
