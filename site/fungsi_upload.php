<?php
function Upload_doc($fupload_name){
  //direktori banner
  $vdir_upload = "../file/dokumen/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload1"]["tmp_name"], $vfile_upload);
}

function Upload_trf($fupload_name){
  //direktori banner
  $vdir_upload = "../file/bukti_transfer/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload2"]["tmp_name"], $vfile_upload);
}

?>
