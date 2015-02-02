
<?php
			if ($_GET[index]=='home'){
  			include "home.php";
			}
			elseif ($_GET[index]=='edithome'){
  			include "edithome.php";
			}
			elseif ($_GET[index]=='wilayah'){
  			include "wilayah/wilayah.php";
			}
			elseif ($_GET[index]=='data'){
  			include "data/data.php";
			}
			elseif ($_GET[index]=='data_user'){
  			include "data_user/data_user.php";
			}
			elseif ($_GET[index]=='forum'){
  			include "forum/forum.php";
			}
			elseif ($_GET[index]=='bantuan'){
  			include "bantuan/bantuan_tampil.php";
			}
			elseif ($_GET[index]=='profil'){
  			include "user/profil.php";
			}
			elseif ($_GET[index]=='password'){
  			include "user/password.php";
			}
			elseif ($_GET[index]=='pengaturan'){
  			include "user/pengaturan.php";
			}
			elseif ($_GET[index]=='login'){
  			include "../login/logout.php";
			}
			?>