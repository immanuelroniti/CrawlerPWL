<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- <h1>KAMERA</h2>
<form action="" method="post">
	<input type="text" name="keyword"/>
	<input type="submit" value="cari"/><br/>
</form> -->
<!-- <style>
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
</style> -->
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Comp Camera YK</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link disabled" href="#">Disabled</a> -->
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://gudangdigitalonline.com/wp-content/uploads/2018/09/WEB-Banner-Cannon-2.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://gudangdigitalonline.com/wp-content/uploads/2018/09/Web-Instax-Mini-8-Pink.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://gudangdigitalonline.com/wp-content/uploads/2018/09/Zhiyun-Smooth-4.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php
			ini_set('display_errors', 'off');
			if(isset($_POST['keyword'])){

				function showData($results,$links)
				{
					$namas = array();
					$hargas = array();
					$linkContainer = array();
					$imagesContainer = array();

					foreach ($results as $result) {
						$namas[] = $result->childNodes[1]->nodeValue;
						$hargas[] = $result->childNodes[3]->nodeValue;
					}

					foreach ($links as $link) {
						$linkContainer[]= $link->childNodes[1]->attributes['href']->nodeValue;
						echo $links->childNodes[1]->attributes['href']->nodeValue;
					}

					echo "namanya:".count($namas)."<br>";
					echo "harga:".count($hargas)."<br>";
					echo "link:".count($linkContainer)."<br>";
					// echo "link:".count($imagesContainer)."<br>";
					echo "<div class='container-fluid'>";
					echo "<h3>Hasil Pencarian untuk kata '".$_POST['keyword']."'</h3>";
					echo "<div class='row'>";
					for ($i=0; $i < 24 ; $i++) {
					echo  "<div class='col-sm-3'>";
					echo    "<div class='card'>";
					echo      "<div class='card-body'>";
					// echo        "<h6 class='card-title'>".$result->childNodes[1]->nodeValue."</h6>";
					echo        "<h6 class='card-title'>".$namas[$i]."</h6>";
					// echo        "<p class='card-text'>".$result->childNodes[3]->nodeValue."</p>";
					echo        "<p class='card-text'>".$hargas[$i]."</p>";
					echo        "<a href='".$linkContainer[$i]."' target='_blank' class='btn btn-primary'>Go somewhere</a>";
					echo      "</div>";
					echo    "</div>";
					echo  "</div>";
					}
					echo "</div>";
					echo "</div>";
				}

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
				$links = $xpath->query('//div[@class="clearfix product-wrapper border"]');
				$images = $xpath->query('//span[@class="face"]/img');
				// foreach ($images as $image) {
				// 	echo "hasil:".$image->childNodes[1]->attributes['height']->nodeValue;
				// 	// echo $image."<br>";
				// }
				showData($results,$links);


			}
?>
    <!-- </td>
    <td> -->
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
    <!-- </td>
    <td> -->
    	<?php
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
    <!-- </td>
  </tr>
</table> -->
</body>
</html>
