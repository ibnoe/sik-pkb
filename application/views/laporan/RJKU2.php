<!DOCTYPE html>

<html lang="en">

<head>
	<?= $inc; ?>
	<script>
	function popup(url) 
		{
			newwindow=window.open(url,'bukuuji','height=600,width=800');
			if (window.focus) {newwindow.focus()}
			return false;
		}
	</script>
</head>

<body style="overflow: hidden;">

    <div id="loading"> 
        <script type = "text/javascript"> 
            document.write("<div id='container'><p id='content'>" + "<img id='loadinggraphic' width='16' height='16' src='<?= base_url() ?>images/ajax-loader-eeeeee.gif' /> " + "Loading...</p></div>");
        </script> 
    </div>

    <div id="wrapper" class="clearfix">
        <?= $header; ?>
        <section>
            <div class="container_8 clearfix">                

                <!-- Main Section -->
                <section class="main-section grid_8">
                    <div class="main-content" style="min-height:500px">
                        <header>
                            <h3 align="center">Rekapitulasi Jumlah Kendaraan yang Diuji Bulan <?=$this->converter_model->getNamaBulan($bulan)?> <?=$tahun?>
							<br>Jenis Kendaraan: <?=$kelompok?>
							</h3>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:10px;">
							<center>
							<table width="97%" align="center" class="display2"  style="border:1px #CCCCCC solid;">
								<thead>
									<tr>
										<th class="ui-state-default" width="3%" rowspan="2"><br><b>No.</b></th> 
										<th class="ui-state-default" rowspan="2"><br><b>Subjenis Kendaraan</b></th>
										<th class="ui-state-default" rowspan="2"><br><b>Sampai Dengan Bulan Lalu</b></th>
										<th class="ui-state-default" colspan="2"><b>Bulan Ini</b></th>
										<th class="ui-state-default" rowspan="2"><br><b>Jumlah Bulan Ini</b></th>
										<th class="ui-state-default" rowspan="2"><br><b>Jumlah s/d Bulan Ini</b></th>
									</tr>
									<tr>
										<th class="ui-state-default"><b>Uji Pertama</b></th>
										<th class="ui-state-default"><b>Uji Berkala</b></th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($jnsKendaraan as $d1):?>
								<?php
									$BlnLalu1=$this->pendaftaranmodel->getDataUjiBulanSebelumnya($tahun,$bulan,$d1->id_jeniskendaraan,"baru");
									$BlnLalu2=$this->pendaftaranmodel->getDataUjiBulanSebelumnya($tahun,$bulan,$d1->id_jeniskendaraan,"berkala");
									$tBlnLalu1	= $tBlnLalu1+$BlnLalu1;
									$tBlnLalu2	= $tBlnLalu2+$BlnLalu2;
								
									$BlnIni1=$this->pendaftaranmodel->getDataUjiBulanIni($tahun,$bulan,$d1->id_jeniskendaraan,"baru");
									$BlnIni2=$this->pendaftaranmodel->getDataUjiBulanIni($tahun,$bulan,$d1->id_jeniskendaraan,"berkala");
									$tBlnIni1	= $tBlnIni1+$BlnIni1;
									$tBlnIni2	= $tBlnIni2+$BlnIni2;
								
									$jSdBulanIni= $BlnLalu1+$BlnLalu2+$BlnIni1+$BlnIni2;
									$tSdBulanIni= $tSdBulanIni+$jSdBulanIni;
								?>
									<tr height="25px">
										<td align="center"><?=$a=$a+1?></td>
										<td>&nbsp;&nbsp;<?=$d1->detail?></td>
										<td align="center"><?=$BlnLalu1+$BlnLalu2?></td>
										<td align="center"><?=$BlnIni1?></td>
										<td align="center"><?=$BlnIni2?></td>
										<td align="center"><?=$BlnIni1+$BlnIni2?></td>
										<td align="center"><b><?=$jSdBulanIni?></b></td>
									</tr>
								<?php endforeach; ?>
									<tr height="30px" align="center">
										<td colspan="2"><b>Jumlah</b></td>
										<td><b><?=$tBlnLalu1+$tBlnLalu2?></b></td>
										<td><b><?=$tBlnIni1?></b></td>
										<td><b><?=$tBlnIni2?></b></td>
										<td><b><?=$tBlnIni1+$tBlnIni2?></b></td>
										<td><b><?=$tSdBulanIni?></b></td>
									</tr>
								</tbody>
							</table>
							</center>
							
							<div align="right" style="margin-top:5px; margin-right:10px;display:<?=$display?>;">
								<button class="button" style="width:100px; height:25px;" type="button" onClick="javascript:location.href='<?=base_url()?>index.php/laporan/RJKU';">Kembali</button>
								<button class="button" style="width:120px; height:25px;" type="button" onClick="javascript:popup('<?=base_url()?>index.php/laporan/RJKU2_pdf/<?=$id?>');">Cetak PDF</button>
							</div>
							 
                            </div> 
                        </section> 
                    </div> 
                </section>
                <!-- Main Section End -->

            </div>
        </section>
    </div>
    <?= $footer; ?>

</body>

</html>