<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
				<a class="navbar-brand" href="#">Trivacam</a>
		</div>
		<div class="collapse navbar-collapse">
				<div class="pull-left">
						<form class="navbar-form" method="post">
								<div class="input-group">
										<input type="text" class="form-control" placeholder="Search" name="keyword">
										<div class="input-group-btn">
												<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
										</div>
								</div>
						</form>
				</div>
		</div>
	</nav>
	<?php
		//jika form sudah diisi maka dilakukan crawler
		//mengabaikan error pada document html yang di load
		ini_set('display_errors','off');
		if(isset($_POST['keyword'])){
			//CRAWLER WEBSITE DENGAN MENGGUNAKAN CURL ATAU SEE URL
			function crawlerSatu(){
				// $url = "https://www.els.co.id/?category=&s=".$_POST['keyword']."&search_posttype=product&search_sku=1";
				$url = "http://egoprojogja.com/price-list";
				// $url = "http://www.usd.ac.id/index.php";

				//inisialisasi CURL
				$ch = curl_init();
				//set URL-nya
				curl_setopt($ch, CURLOPT_URL, $url);
				//cookies
				curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookieFileName");
				//ini untuk mengambil isi body response-nya saja
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$output = curl_exec($ch);
				//biar tidak boros memory
				curl_close($ch);
				//menampilkan
				// echo $output;
	      // showDataEls($output);
				printText($output);
			}

			function printText($output)
			{
				echo "masuk funngsi";
				$dom = new DOMDocument();
  			$dom->loadHTML($output);
  			$xpath = new DOMXPath($dom);
  			// $results = $xpath->query('//ul[@id="loop-products"]/li/div/div/div[@class="item-content"]');



				//----------------QUERY Xpath LIST--------------------
				//NAMA
				$names = $xpath->query('//section[@class="row section-content"]');
				//HARGA 1
				$hargas = $xpath->query('//section[@class="row section-content"]/div[2]//ul');


  			echo "<h2>Hasil Pencarian</h2>";
				//----------------CONTAINER--------------------
				$namaKamera = array();
				$hargaSewa1 = array();
				//----------------GET VALUE--------------------
				//GET NAMA
  			foreach ($names as $name) {
					$namaKamera[]=$name->childNodes[1]->childNodes[1]->childNodes[1]->childNodes[1]->nodeValue;
      	}
				//GET HARGA 1
				foreach ($hargas as $harga) {
				$hargaSewa1[]=$harga->childNodes[1]->nodeValue;
				}
				//GET HARGA 2
				foreach ($hargas as $harga) {
				$hargaSewa[]=$harga->childNodes[2]->nodeValue;
				}

				//----------------SHOW DATA ONE BY ONE--------------------
				echo count($namaKamera)."<br>";
				foreach ($namaKamera as $nama) {
					echo "nama:".$nama."<br>";
				}
				echo count($hargaSewa1)."<br>";
				foreach ($hargaSewa1 as $harga) {
					echo "harga:".$harga."<br>";
				}

				//----------------SHOW ALL DATA--------------------
				for ($i=0; $i <45 ; $i++) {
					
				}
			}
			crawlerSatu();
		}

	?>

</body>
</html>
