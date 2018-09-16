<!DOCTYPE html>
<html>
<head>
<h1>KAMERA</h2>
<form action="" method="post">
			<input type="text" name="keyword"/>
			<input type="submit" value="cari"/><br/>
		</form>
<style>
#kamera {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#kamera td, #kamera th {
    border: 1px solid #ddd;
    padding: 8px;
}

#kamera tr:nth-child(even){background-color: #f2f2f2;}

#kamera tr:hover {background-color: #ddd;}

#kamera th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>
	<select id="cmbMake" name="Make" >
     <option value="">Select Manufacturer</option>
     <option value="--Any--">--Any--</option>
     <option value="Toyota">Toyota</option>
     <option value="Nissan">Nissan</option>
  </select>

<table id="kamera">
  <tr>
    <th>Index 1</th>
    <th>Index 2</th>
    <th>Index 3</th>
  </tr>
  <tr>
    <td>  
    	<?php 
			ini_set('display_errors', 'off');
			if(isset($_POST['keyword'])){
				$url = "https://gudangdigitalonline.com/?post_type=product&s=".$_POST['keyword']."";

				//inisialisasi CURL
				$ch = curl_init();

				//set URL-nya
				curl_setopt($ch, CURLOPT_URL, $url);

				//ini untuk mengambil isi body response-nya saja
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				//jalankan CURL-nya
				$result = curl_exec($ch);

				//tutup CURL-nya
				$output = curl_exec($ch);
				curl_close($ch);

				$dom = new DOMDocument();
				$dom->loadHTML($output);
				$xpath = new DOMXPath($dom);
				$results = $xpath->query('//div[@class="product-meta-wrapper border"]');

				echo "<h3>Hasil Pencarian untuk kata '".$_POST['keyword']."'</h3>";
				foreach($results as $result){
				echo $result->childNodes[1]->nodeValue." - ".$result->childNodes[3]->nodeValue."<br/>";
				echo "<h3>link '".$_POST['keyword']."'</h3>";
				// echo $result->childNodes[1]->childNodes[1]->getAttribute('href');
			}
			}
		?>
    </td>
    <td>  
    	<?php 
			ini_set('display_errors', 'off');
			if(isset($_POST['keyword'])){
				$url = "https://www.momidigital.com/?post_type=product&s=".$_POST['keyword']."";

				//inisialisasi CURL
				$ch = curl_init();

				//set URL-nya
				curl_setopt($ch, CURLOPT_URL, $url);

				//ini untuk mengambil isi body response-nya saja
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				//jalankan CURL-nya
				$result = curl_exec($ch);

				//tutup CURL-nya
				$output = curl_exec($ch);
				curl_close($ch);

				$dom = new DOMDocument();
				$dom->loadHTML($output);
				$xpath = new DOMXPath($dom);
				$results = $xpath->query('//div[@class="clearfix info-product classic"]');

				echo "<h3>Hasil Pencarian untuk kata '".$_POST['keyword']."'</h3>";
				foreach($results as $result){
				echo $result->childNodes[1]->nodeValue." - ".$result->childNodes[3]->nodeValue."<br/>";
			}
			}
		?>
    </td>
    <td>  
    	`<?php 
			ini_set('display_errors', 'off');
			if(isset($_POST['keyword'])){
				$url = "https://bursakameraprofesional.co.id/catalogsearch/result/?q=".$_POST['keyword']."";

				//inisialisasi CURL
				$ch = curl_init();

				//set URL-nya
				curl_setopt($ch, CURLOPT_URL, $url);

				//ini untuk mengambil isi body response-nya saja
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				//jalankan CURL-nya
				$result = curl_exec($ch);

				//tutup CURL-nya
				$output = curl_exec($ch);
				curl_close($ch);

				$dom = new DOMDocument();
				$dom->loadHTML($output);
				$xpath = new DOMXPath($dom);
				$results = $xpath->query('//div[@class="product details product-item-details box-info"]');

				echo "<h3>Hasil Pencarian untuk kata '".$_POST['keyword']."'</h3>";
				foreach($results as $result){
				echo $result->childNodes[1]->nodeValue." - ".$result->childNodes[5]->nodeValue."<br/>";
			}
			}
		?>
    </td>
  </tr>
  
</table>

</body>
</html>
