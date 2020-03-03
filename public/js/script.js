$(function() {
  
  $('.tombolTambahData').on('click', function() {
    $('#formModalLabel').html('Tambah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('tambah data');
    $('.form-group input').val('');
    $('#age').val('');
  });

  $('.tampilModalUbah').on('click', function() {
    $('#formModalLabel').html('ubah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('ubah data');
    $('.modal-body form').attr('action', 'http://localhost:8080/phpmvc/public/mahasiswa/ubah')
    
     const id = $(this).data('id'); 
     
    
    $.ajax({
      url: 'http://localhost:8080/phpmvc/public/mahasiswa/getubah/',
      data: {id : id},
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('#fullname').val(data.fullname);
        $('#age').val(data.age);
        $('#id').val(data.id);
        $('#kelamin').val(data.gender);
        $('#kelas').val(data.kelas);
        $('#mobil').val(data.car_name);
      }, 
      error: function(){
        alert('something went wrong.');
    }
    });
    
  });
});


// $(document).ready(() => {
//   $('#tombolCari').hide();

//   $('#keyword').on('keyup', () => {

//     $('#data-mahasiswa').html('<img src="http://localhost:8080/phpmvc/public/img/loader.gif">');
    
//     $.get('http://localhost:8080/phpmvc/public/mahasiswa/cariByKeyword/' + $('#keyword').val(), (data) => {
//       $('#data-mahasiswa').html(data);
//     });
//   });
// });