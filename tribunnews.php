<html>
<head>
</head>
<style>
html {
  background: #f5f7f8;
  font-family: system-ui;
  -webkit-font-smoothing: antialiased;
  padding: 20px 0;
}

header {
  width: 90%;
  max-width: 1240px;
  margin: 0 auto;
}

.band {
  width: 90%;
  max-width: 1240px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr;
  grid-template-rows: auto;
  grid-gap: 20px;
}
@media (min-width: 30em) {
  .band {
    grid-template-columns: 1fr 1fr;
  }
}
@media (min-width: 60em) {
  .band {
    grid-template-columns: repeat(4, 1fr);
  }
}

.card {
  background: white;
  text-decoration: none;
  color: #444;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  min-height: 100%;
  position: relative;
  top: 0;
  transition: all 0.1s ease-in;
}
.card:hover {
  top: -2px;
  box-shadow: 0 4px 5px rgba(0, 0, 0, 0.2);
}
.card article {
  padding: 20px;
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.card h1 {
  font-size: 20px;
  margin: 0;
  color: #333;
}
.card p {
  flex: 1;
  line-height: 1.4;
}
.card span {
  font-size: 12px;
  font-weight: bold;
  color: #999;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  margin: 2em 0 0 0;
}
.card .thumb {
  padding-bottom: 60%;
  background-size: cover;
  background-position: center center;
}

@media (min-width: 60em) {
  .item-1 {
    grid-column: 1/span 2;
  }
  .item-1 h1 {
    font-size: 24px;
  }
  .item-8 {
    grid-column: 1/span 2;
  }
  .item-8 h1 {
    font-size: 24px;
  }
  .item-15 {
    grid-column: 1/span 2;
  }
  .item-15 h1 {
    font-size: 24px;
  }
}
</style>
<body>
<header>
  <a href="https://api.anubiskun.xyz"><h1>DEMO API REST TRIBUN NEWS</h1></a> <a href="#"><h3>CHECK SOURCE CODE</h3></a>
</header>
<div class="band">
<?php 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, 'https://www.api.anubiskun.xyz/tribunnews/?api=b1bb7866');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
$js = json_decode($result, true);
for ($i=0; $i<count($js['anubis']); $i++){
	$r = $js['anubis'][$i];
	$k = $i+1;
echo '
  <div class="item-'.$k.'">
    <a href="'.$r['url'].'" class="card">';
if ($r['thumb']){
	echo '<div class="thumb" style="background-image: url('.$r['thumb'].');"></div>';
} else {
	echo '<div class="thumb" style="background-image: url(https://api.anubiskun.xyz/no_photo.png);"></div>';
}
echo '
      <article>
        <h1>'.$r['title'].'</h1>
        <span>'.$r['time'].'</span>
      </article>
    </a>
  </div>';

} ?>
</div>
</body>
</html>