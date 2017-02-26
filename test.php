<?php
if(!$_GET OR $_GET['id']==='') header('Location: list.php');
$id = $_GET['id'];
$array = json_decode(file_get_contents($id.'.json'), true);
$message ='';
if(isset($_POST['submit'])){ 
$check = $_POST['response'];
foreach($array as $arr => $item){
if($item[$check]===false){
	 $message= '<p style="color: red; font-size:20px;">ответ неверный, попробуйте еще раз</p>';
} else{
	$message = '<p style ="color: green; font-size:20px;">ответ верный</p>';
	}
  }
}
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body>

<form method = "post">
	<?php foreach($array as $arr=>$item): ?>
	<h2><?= $arr; ?></h2>
	<h3>Выберите правильный вариант ответа</h3>
	<?php foreach($item as $key => $value): ?>
  <input type="radio" name="response" value="<?= $key; ?>"><?= $key; ?><br>
  <?php endforeach; ?>
  <?php endforeach; ?>
  
  <input type= "submit" name="submit" value="Отправить">
</form> 
<?= $message; ?>
<p style ="color: blue; font-size:20px;"><a href="list.php">Перейти к списку тестов</a></p>
</body>
</html>
