<?php
  require_once 'konfigurasi.php';
  
  $conn = mysql_connect( $db_host, $db_user, $db_pass );
  if( !$conn ){
    die( 'Koneksi tidak berhasil: ' . mysql_error() );
  }

  $db = mysql_select_db( $db_data, $conn );
  if( !$db ){
    die( 'Tidak berhasil terkoneksi ke database: ' . mysql_error() );
  }
  $username= $_POST['nama'];
  $password= $_POST['password'];
  
  if($username=='perusak'){
	  $result = mysql_query( "SELECT * FROM admin
                          WHERE username='$username' 
                          AND password='$password' ");                            
		if( !$result ){
			die( 'Query gagal: ' . mysql_error() );
		}
		$_SESSION['IS_LOGIN2'] = 'OK';
		header( 'Location: indexadmin.php' );
	  }
  else{
  $result = mysql_query( "SELECT * FROM anggota
                          WHERE user_id='$username' 
                          AND user_psw='$password' ");                            
  if( !$result ){
    die( 'Query gagal: ' . mysql_error() );
  }
  
  $total = mysql_num_rows( $result );
  
  if ( $total > 0 ) {
	 
    $_SESSION['IS_LOGIN2'] = 'OK';
	setcookie('user_id',$_POST['nama']);
	header( 'Location: form user/user.php' );
      }
 else{	  
	 header( 'Location: index.php?aksi=login&cek=salah' );
	}
  }
?>
