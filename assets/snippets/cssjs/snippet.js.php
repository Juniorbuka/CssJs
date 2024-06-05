<?php
if(!defined('MODX_BASE_PATH')) {die('What are you doing? Get out of here!');}

// Параметри
$files = isset($files) ? $files : ''; // Список файлів (css, scss, less)
$minify = isset($minify) ? $minify : '1'; // зжимати і мініфікувати файли
$folder = isset($folder) ? $folder : ''; // папка для згенерованих стилів за замовчуванням в корінь
$filename = isset($filename) ? $filename : 'scripts'; // Ім'я файлу
$filepre = isset($filepre) ? $filepre : ''; // Завантаження файлу, наприклад (defer)
//$inline = isset($inline) ? $inline : ''; // інлайн код стилів
//$parse = isset($parse) ? $parse : '0'; // обробляти чи теги MODX

// Обробляємо файли, перетворюємо less і scss
$filesArr = explode(',', str_replace('\n', '', $files));
foreach ($filesArr as $key => $value) {
	$file = MODX_BASE_PATH . trim($value);
	$v[$key] =  filemtime($file);
	$filesForMin[$key] = $file;  
}
if ($minify == '1') {
		include_once(MODX_BASE_PATH. "assets/snippets/cssjs/class.magic-min.php"); 
		$minified = new Minifier();
		$min = $minified->merge( MODX_BASE_PATH.$folder.$filename.'.min.js', 'js', $filesForMin );
		return '<script '.$filepre.' src="'.$modx->config['site_url'].$folder.$filename.'.min.js?v='.substr(md5(max($v)),0,3).'"></script>';
}else{
	$links = '';
	foreach ($filesArr as $key => $value) {
		$links .= '<script src="'.$modx->config['site_url'].trim($value).'?v='.substr(md5($v[$key]),0,3).'"></script>';	
	}	
	return $links;
}
?>
