<!DOCTYPE html>
<html>
<head>
	<title>PEMROGRAMAN WEB LANJUT</title>
        <link rel="stylesheet" type="text/css" href="tabel.css">
</head>

<body>
	<center><h1>PEMROGRAMAN WEB LANJUT</h1></center>
    <form action="" method="post">
			<input type="text" name="keyword"/>
			<input type="submit" value="cari"/><br/>
		</form>
	<table cellspacing='0'>
		<thead>
			<tr>
				<th>Index 1</th>
				<th>Index 2</th>
				<th>Index 3</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php
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
			}
			crawlerSatu();
		}

	?>
</td>
				<td> </td>
				<td> </td>
			</tr>
		</tbody>
	</table>
</body>
</html>