<head>
</head>
<body>
<div align="center" style="width:100%;">
<table width="100%">
<?php ini_set( "display_errors", 0);
$index = $_GET[index];

if ($index==home or $index==edithome or $index==profil or $index==informasi or $index==password){
echo "
<tr>
<td>
</td>
</tr>";
}
//SARAN PERBAIKAN SARAN PERBAIKAN SARAN PERBAIKAN SARAN PERBAIKAN SARAN PERBAIKAN SARAN PERBAIKAN//
else if ($index==forum) {
$jml_doc = mysql_num_rows(mysql_query("select * from forum"));
echo "<tr><td width='197px'>&nbsp;</td><td align='left'><span style='margin-left:5px' class='jml'>Jumlah Data :</span> <br><span style='margin-left:5px' class='jml'> <b>$jml_doc</b> Komentar</span>";
?>
</td>

<td  align="right" style="margin-right:5px;">
<?php 
$dataPerPage = 30;
	if(isset($_GET['pages']))
	{
	    $noPage = $_GET['pages'];
	} 
	else
	{
		$noPage = 1;
	}
	
	$z		= 1;
	$pag	= mysql_query("SELECT COUNT(*) AS jumData FROM forum$wh");
	$row	= mysql_fetch_array($pag);
 
	$jumData = $row['jumData'];
 
	$jumPage = ceil($jumData/$dataPerPage);
 
	$offset = ($noPage - 1) * $dataPerPage;
	
	$query	= mysql_query( "SELECT * FROM forum$wh  DESC LIMIT $offset, $dataPerPage");
	//$noPage = $_GET['pages'];
	$i		= $noPage + ($noPage - 1) * ($dataPerPage - 1);
	while($data	= mysql_fetch_array($query)){
	
?>
	
<?php $i++; $z++;}?>
<?php
echo '<div class="pagination dark"><span class="page dark active">Page</span>';

if ($noPage > 1) echo  "<a href='index.php?index=forum&pages=".($noPage-1)."' class='page dark'>&lt;</a>";
for($page = 1; $page <= $jumPage; $page++)
{
	if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
	{   
    	if (($showPage == 1) && ($page != 2))  echo "..."; 
        if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
        if ($page == $noPage) echo "<span class='page dark active'>".$page."</span>";
        else echo " <a href='index.php?index=forum&data=".$jml_doc."&pages=".$page."' class='page dark'>".$page."</a>";
    	    $showPage = $page;          
    }
}
 
if ($noPage < $jumPage) echo "<b><a href='index.php?index=forum&data=".$jml_doc."&pages=".($noPage+1)." class='page dark'>&gt;</a></div>"; }

//DATA KARWAS//
else if ($index==data) {
$jml_doc = mysql_num_rows(mysql_query("select * from data"));
echo "<tr><td width='197px'>&nbsp;</td><td align='left'><span style='margin-left:5px' class='jml'>Jumlah Data :</span> <br><span style='margin-left:5px' class='jml'> <b>$jml_doc</b> Data</span>";
?>
</td>

<td  align="right" style="margin-right:5px;">
<?php 
$dataPerPage = 30;
	if(isset($_GET['pages']))
	{
	    $noPage = $_GET['pages'];
	} 
	else
	{
		$noPage = 1;
	}
	
	$z		= 1;
	$pag	= mysql_query("SELECT COUNT(*) AS jumData FROM data$wh");
	$row	= mysql_fetch_array($pag);
 
	$jumData = $row['jumData'];
 
	$jumPage = ceil($jumData/$dataPerPage);
 
	$offset = ($noPage - 1) * $dataPerPage;
	
	$query	= mysql_query( "SELECT * FROM data$wh  DESC LIMIT $offset, $dataPerPage");
	//$noPage = $_GET['pages'];
	$i		= $noPage + ($noPage - 1) * ($dataPerPage - 1);
	while($data	= mysql_fetch_array($query)){
	
?>
	
<?php $i++; $z++;}?>
<?php
echo '<div class="pagination dark"><span class="page dark active">Page</span>';

if ($noPage > 1) echo  "<a href='index.php?index=data&pages=".($noPage-1)."' class='page dark'>&lt;</a>";
for($page = 1; $page <= $jumPage; $page++)
{
	if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
	{   
    	if (($showPage == 1) && ($page != 2))  echo "..."; 
        if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
        if ($page == $noPage) echo "<span class='page dark active'>".$page."</span>";
        else echo " <a href='index.php?index=data&data=".$jml_doc."&pages=".$page."' class='page dark'>".$page."</a>";
    	    $showPage = $page;          
    }
}
 
if ($noPage < $jumPage) echo "<b><a href='index.php?index=data&data=".$jml_doc."&pages=".($noPage+1)." class='page dark'>&gt;</a></div>"; }


//WILAYAH WILAYAH WILAYAH WILAYAH WILAYAHWILAYAH//
else if ($index==wilayah) {
$jml_doc = mysql_num_rows(mysql_query("select * from wilayah"));
echo "<tr><td width='197px'>&nbsp;</td><td align='left'><span style='margin-left:5px' class='jml'>Jumlah Data :</span> <br><span style='margin-left:5px' class='jml'> <b>$jml_doc</b> Wilayah</span>";
?>
</td>

<td  align="right" style="margin-right:5px;">
<?php 
$dataPerPage = 30;
	if(isset($_GET['pages']))
	{
	    $noPage = $_GET['pages'];
	} 
	else
	{
		$noPage = 1;
	}
	
	$z		= 1;
	$pag	= mysql_query("SELECT COUNT(*) AS jumData FROM wilayah$wh");
	$row	= mysql_fetch_array($pag);
 
	$jumData = $row['jumData'];
 
	$jumPage = ceil($jumData/$dataPerPage);
 
	$offset = ($noPage - 1) * $dataPerPage;
	
	$query	= mysql_query( "SELECT * FROM wilayah$wh  DESC LIMIT $offset, $dataPerPage");
	//$noPage = $_GET['pages'];
	$i		= $noPage + ($noPage - 1) * ($dataPerPage - 1);
	while($data	= mysql_fetch_array($query)){
	
?>
	
<?php $i++; $z++;}?>
<?php
echo '<div class="pagination dark"><span class="page dark active">Page</span>';

if ($noPage > 1) echo  "<a href='index.php?index=wilayah&pages=".($noPage-1)."' class='page dark'>&lt;</a>";
for($page = 1; $page <= $jumPage; $page++)
{
	if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
	{   
    	if (($showPage == 1) && ($page != 2))  echo "..."; 
        if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
        if ($page == $noPage) echo "<span class='page dark active'>".$page."</span>";
        else echo " <a href='index.php?index=wilayah&data=".$jml_doc."&pages=".$page."' class='page dark'>".$page."</a>";
    	    $showPage = $page;          
    }
}
 
if ($noPage < $jumPage) echo "<b><a href='index.php?index=wilayah&data=".$jml_doc."&pages=".($noPage+1)." class='page dark'>&gt;</a></div>"; }


//DAFTAR ANGGOTA DAFTAR ANGGOTA//
else if ($index==data_user) {
$jml_doc = mysql_num_rows(mysql_query("select * from user"));
echo "<tr><td width='197px'>&nbsp;</td><td align='left'><span style='margin-left:5px' class='jml'>Jumlah Data :</span> <br><span style='margin-left:5px' class='jml'> <b>$jml_doc</b> Anggota</span>";
?>
</td>

<td  align="right" style="margin-right:5px;">
<?php 
$dataPerPage = 30;
	if(isset($_GET['pages']))
	{
	    $noPage = $_GET['pages'];
	} 
	else
	{
		$noPage = 1;
	}
	
	$z		= 1;
	$pag	= mysql_query("SELECT COUNT(*) AS jumData FROM user$wh");
	$row	= mysql_fetch_array($pag);
 
	$jumData = $row['jumData'];
 
	$jumPage = ceil($jumData/$dataPerPage);
 
	$offset = ($noPage - 1) * $dataPerPage;
	
	$query	= mysql_query( "SELECT * FROM user$wh  DESC LIMIT $offset, $dataPerPage");
	//$noPage = $_GET['pages'];
	$i		= $noPage + ($noPage - 1) * ($dataPerPage - 1);
	while($data	= mysql_fetch_array($query)){
	
?>
	
<?php $i++; $z++;}?>
<?php
echo '<div class="pagination dark"><span class="page dark active">Page</span>';

if ($noPage > 1) echo  "<a href='index.php?index=data_user&pages=".($noPage-1)."' class='page dark'>&lt;</a>";
for($page = 1; $page <= $jumPage; $page++)
{
	if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
	{   
    	if (($showPage == 1) && ($page != 2))  echo "..."; 
        if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
        if ($page == $noPage) echo "<span class='page dark active'>".$page."</span>";
        else echo " <a href='index.php?index=data_user&data=".$jml_doc."&pages=".$page."' class='page dark'>".$page."</a>";
    	    $showPage = $page;          
    }
}
 
if ($noPage < $jumPage) echo "<b><a href='index.php?index=data_user&data=".$jml_doc."&pages=".($noPage+1)." class='page dark'>&gt;</a></div>"; }


//TABEL lainnya TABEL lainnya TABEL lainnya TABEL lainnya TABEL lainnya TABEL lainnya//
else {
$jml_doc = mysql_num_rows(mysql_query("select * from $index"));
echo "<tr><td width='197px'>&nbsp;</td><td align='left'><span style='margin-left:5px' class='jml'>Jumlah Data :</span> <br><div style='margin-left:5px' class='jml'> <b>$jml_doc</b> Data</div>";
?>
</td>

<td align="right" style="margin-right:5px;">
<?php 
$dataPerPage = 30;
	if(isset($_GET['pages']))
	{
	    $noPage = $_GET['pages'];
	} 
	else
	{
		$noPage = 1;
	}
	
	$z		= 1;
	$pag	= mysql_query("SELECT COUNT(*) AS jumData FROM $admin$wh");
	$row	= mysql_fetch_array($pag);
 
	$jumData = $row['jumData'];
 
	$jumPage = ceil($jumData/$dataPerPage);
 
	$offset = ($noPage - 1) * $dataPerPage;
	
	$query	= mysql_query( "SELECT * FROM $index$wh  DESC LIMIT $offset, $dataPerPage");
	//$noPage = $_GET['pages'];
	$i		= $noPage + ($noPage - 1) * ($dataPerPage - 1);
	while($data	= mysql_fetch_array($query)){
	
?>
	
<?php $i++; $z++;}?>
<?php 
echo '<div class="pagination dark"><span class="page dark active">Page</span>';

if ($noPage > 1) echo  "<b><a href='index.php?index=$index&pages=".($noPage-1)."' class='page dark'>&lt;</a>";
for($page = 1; $page <= $jumPage; $page++)
{
	if ((($page >= $noPage - 2) && ($page <= $noPage + 2)) || ($page == 1) || ($page == $jumPage)) 
	{   
    	if (($showPage == 1) && ($page != 2))  echo "..."; 
        if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
        if ($page == $noPage) echo "<span class='page dark active'>".$page."</span>";
        else echo " <a href='index.php?index=$index&data=".$jml_doc."&pages=".$page."' class='page dark'>".$page."</a>";
    	    $showPage = $page;          
    }
}
 
if ($noPage < $jumPage) echo "<b><a href='index.php?index=$index&data=".$jml_doc."&pages=".($noPage+1)." class='page dark'>&gt;</a></div> " ;  
}  ?>
</td>
</tr>
</table>

</div>
</body>