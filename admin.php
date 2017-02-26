<?php
if($_FILES){
$temp_name = $_FILES['test']['tmp_name'];
$name = __DIR__.'/'.$_FILES['test']['name'];
$result = move_uploaded_file($temp_name, $name);
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Загрузка файлов</title>
    
  </head>
  <body>

    <h2>Загрузка тестовых файлов</h2>

   <form method = 'POST' enctype='multipart/form-data'>
		<input type ='file' name='test'>
		<button>Отправить</button>
	</form>
	<?php if(isset($result)): ?>
		<p style ="font-size:20px;">Файл успешно загружен!</p>
	<?php endif; ?>
	<p style ="color: blue; font-size:20px;"><a href="list.php">Перейти к списку загруженных файлов</p>
  </body>
</html>
