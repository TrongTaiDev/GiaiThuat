<?php
include( 'config.php' );
	$sodong=2;
	if (!isset($_GET["page"]))
	  { 
	  	$p = 1;
	  }
  	else
	  {
		$p=intval($_GET["page"]);
	  }
	$thongtin = $_GET['thongtin'];
    $x=($p-1)*$sodong;
	$sql="select * from sinhvien where hoten like '%$thongtin%' limit $x, $sodong";
	$result = mysql_query($sql);
?>
<style type="text/css">
	#container {
		width: 400px;
		margin: auto;
	}
	#container h1{
		text-align: center;
	}	
	.block {
		display: block;
		margin: 30px;
		float: left;
		width: 130px;
		height: auto;
		
	}
	.avatar{
		float: left;
		width: 100%;
		height: 150px;
	}
	.name{
		text-align: center;
		float: left;
		width: 100%;
		height: auto;
	}
</style>
<div id="container">
	<h1>KẾT QUẢ TÌM KIẾM</h1>
	<?php
	while($ketqua = mysql_fetch_array($result)){
	?>
	<div class="block">
		<div class="avatar"><img src="img/<?php echo $ketqua['avatar']?>" width="130px" height="150px"/></div>
		<div class="name"><?php echo $ketqua['hoten']?></div>
	</div>
	<?php } ?>
</div>
<p align="center" style="clear:both;">
<?php

  $kq =mysql_query("select * from sinhvien where hoten like '%$thongtin%'");
  $tongsotrang=ceil(mysql_num_rows($kq)/$sodong);
  
  for($i=1;$i<=$tongsotrang;$i++)
  {
	   if ($i==$p)
   	   {
		 echo $i."&nbsp;";
	   }
   	   else
       {
?>
		 <a href="ketquatim.php?page=<?php echo $i; ?>&thongtin=<?php echo $thongtin?>"><?php echo $i; ?></a>
<?php
		   }
	   }
?>   
</p>