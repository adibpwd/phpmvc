<?php


?>

<!-- Button trigger modal -->

<div class="container mt-4">

  <div class="row ml-4 bt-3">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row ml-4 bt-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary mb-3 tombolTambahData" data-toggle="modal" data-target="#formModal">
        tambah data mahasiswa
      </button>
    </div>
  </div>

  <div class="row ml-4 bt-3">
    <div class="col-lg-6">
      <form action="<?= BASEURL ?>/mahasiswa/cari" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari Pengguna" autocomplete="off" name="keyword" id="keyword">
          <div class="input-group-append">
            <button class="btn btn-warning" type="submit" id="tombolCari">Cari</button>
      </form>
    </div>
  </div>
</div>
</div>

<div class="row container">
  <div class="col-lg-6">
    <h1 class="ml-4">Daftar Mahasiswa</h1>

    <div class="btn-group dropright float-right" style="margin: -9% -54%;">
      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Pilih Halaman
      </button>
      <div class="dropdown-menu ml-2 text-center">
        <?php

        for ($no = 1; $no <= $data['amountPage']; $no++) {

        ?> <a href="<?= BASEURL ?>/mahasiswa/index/<?= $no ?>" class="text-danger text-decoration_none"> <?= $no ?> </a> <?php
                                                                                                                              }
                                                                                                                                ?>
      </div>
    </div>


    <table class="table table-hover table-dark ml-4 text-center">
      <thead>
        <tr>
          <th scope="col">no</th>
          <th scope="col">photos</th>
          <th scope="col">fullname</th>
          <th scope="col">age</th>
          <th scope="col">car name</th>
          <th scope="col">gender</th>
          <th scope="col">class name</th>
          <th scope="col"></th>
          <th scope="col">actiona</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 0;
        while ($no < count($data['mhs'])) {
        ?> <tr style=" border-top: 2px solid yellow;">
            <th scope="row"><?= $no + 1 ?></th> <?php $no - 1 ?>
            <td><?= $data['mhs']["$no"]['foto'] ?></td>
            <td><?= $data['mhs']["$no"]['fullname'] ?></td>
            <td><?= $data['mhs']["$no"]['age'] ?></td>
            <td><?= $data['mhs']["$no"]['car_name'] ?></td>
            <td><?= $data['mhs']["$no"]['gender'] ?></td>
            <td><?= $data['mhs']["$no"]['kelas'] ?></td>
            <td>
              <a class="badge badge-success badge-pill float-right ml-1 tampilModalUbah" href="<?= BASEURL ?>/mahasiswa/getubah/<?= $data['mhs']["$no"]['id'] ?>" data-toggle="modal" data-target="#formModal" data-id="<?= $data['mhs']["$no"]['id'] ?>">update</a>
            </td>
            <td>
              <a class="badge badge-primary badge-pill float-right ml-1" href="<?= BASEURL ?>/mahasiswa/detail/<?= $data['mhs']["$no"]['id'] ?>">detail</a>
            </td>
            <td>
              <a class="badge badge-danger badge-pill float-right mr-1" href="<?= BASEURL ?>/mahasiswa/hapus/<?= $data['mhs']["$no"]['id'] ?>" onclick="return confirm('yakin mau dihapus')">hapus</a>
            </td>
          </tr>
        <?php
          $no++;
        } ?>
      </tbody>
    </table>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">tambah data mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>/mahasiswa/tambah/" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="foto">foto</label>
            <img src="<?= BASEURL ?>/img/loader.gif" alt="da" width="150px" height="150px">
            <input type="file" id="foto" name="foto" placeholder="kldsa">
          </div>
          <div class="form-group">
            <label for="fullname">nama</label>
            <input type="text" class="form-control" id="fullname" placeholder="nama" name="fullname">
          </div>
          <div class="form-group">
            <label for="age">umur</label>
            <input type="text" class="form-control" id="age" placeholder="umur" name="age">
          </div>
          <div class="form-group">
            <label for="mobil">nama mobil</label>
            <input type="text" class="form-control" id="mobil" placeholder="nama mobil" name="mobil">
          </div>
          <div class="form-group">
            <label for="kelamin">jenis kelamin</label>
            <input type="text" class="form-control" id="kelamin" placeholder="jenis kelamin" name="kelamin">
          </div>
          <div class="form-group">
            <label for="kelas">nama kelas</label>
            <input type="text" class="form-control" id="kelas" placeholder="kelas" name="kelas">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">tambah mahasiswa</button>
        </form>
      </div>
    </div>
  </div>
</div>