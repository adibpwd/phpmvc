<?php

class Mahasiswa_model {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }
   
    public function amountUsers() {
      $this->db->query("SELECT * FROM userss INNER JOIN kelas WHERE userss.kelas_id=kelas.id");
      return $this->db->rowCount();
    }

    public function getAllMahasiswa() {
      $this->db->query("SELECT * FROM userss");
      return $this->db->resultSet();
    }

    public function userssInnerKelas($data) {
      $this->db->query("SELECT userss.id, userss.fullname, userss.foto, userss.age, userss.car_name, userss.gender, kelas.kelas 
      FROM userss  INNER JOIN kelas WHERE userss.kelas_id=kelas.id LIMIT " . $data['startUser'] . ", " . $data['maxMhsPage']. "");
      return $this->db->resultSet();
    }

    public function getMhsById($id) {
      $this->db->query("SELECT userss.id, userss.fullname, userss.foto, userss.age, userss.car_name, userss.gender, kelas.kelas 
      FROM userss INNER JOIN kelas ON userss.kelas_id=kelas.id AND userss.id=:id");
      $this->db->bind("id", $id);
      return $this->db->single();
    }

    public function tambahDataMahasiswa($data) {
      if($data["fullname"] != "" && $data["age"] != "") {

        $this->db->query("INSERT INTO userss (fullname, age, gender, car_name) VALUES (:fullname, :age, :kelamin, :mobil)");
        $this->db->bind('fullname', $data['fullname']);
        $this->db->bind('age', $data['age']);
        $this->db->bind('mobil', $data['mobil']);
        $this->db->bind('kelamin', $data['kelamin']);
        $this->db->execute();
  
        return $this->db->rowCount();
      }

    }

    public function hapusDataMahasiswa($id) {
      
      $this->db->query("DELETE FROM userss WHERE id=:id");
      $this->db->bind("id", $id);
      $this->db->execute();

      return $this->db->rowCount();
    }
 
    public function ubahDataMahasiswa($data1) {
       

        $query = "UPDATE userss SET fullname=:fullname, age=:age, gender=:kelamin, car_name=:mobil WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data1['id']);
        $this->db->bind('fullname', $data1['fullname']);
        $this->db->bind('age', $data1['age']); die;
        $this->db->bind('mobil', $data1['mobil']);
        $this->db->bind('kelamin', $data1['kelamin']);
        $this->db->execute();
        return $this->db->rowCount($query);
    }

    public function cariDataMahasiswa() {
      $keyword = $_POST['keyword'];
      $query = "SELECT * FROM userss WHERE fullname LIKE :keyword";

      $this->db->query($query);
      $this->db->bind('keyword', "%$keyword%");
      return $this->db->resultSet();
    }
    
    public function cariMhsByKeyword($keyword) {
      $query = "SELECT * FROM userss WHERE fullname LIKE :keyword";

      $this->db->query($query);
      $this->db->bind('keyword', "%$keyword%");
      return $this->db->resultSet();
    }
}