<?php
  $opt = $_GET['opt'];
 
  switch($opt)
  {
    case 0:
    default:
      echo '
           ';
        break;
    case 1:
      echo '
            <span class="label"><b>Target</b></span>
    		<input name="target" type="number" id="target" class="input" style="width:100px;" placeholder="Jumlah..." required> %
           ';
        break;
    case 2:
      echo '
            <span class="label"><b>Target</b></span>
    		<input name="target" type="number" id="target" class="input" style="width:100px;" placeholder="Jumlah..." required>
    		<input name="satuan_target" type="text" id="satuan_target" class="input" size="20" title="Satuan Target" placeholder="Satuan..." required>
           ';
        break;
    case 3:
      echo '
            <span class="label"><b>Target</b></span>
    		<input name="target" type="text" id="target" class="input" size="20" required>
           ';
        break;
  }
?>