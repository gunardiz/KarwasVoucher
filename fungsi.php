<?php
  function checkLogin()
  {
  	if( $_SESSION['IS_LOGIN'] != 'OK' ){
      header( 'Location: login.php?e=2' );
      exit;
    }
  }
  
  function isLogin()
  {
    return $_SESSION['IS_LOGIN'] == 'OK';
  }
  
    function checkLogin2()
  {
  	if( $_SESSION['IS_LOGIN2'] != 'OK' ){
      header( 'Location: login.php?aksi=error' );
      exit;
    }
  }
  
  function isLogin2()
  {
    return $_SESSION['IS_LOGIN2'] == 'OK';
  }
  
  
	
	

?>
