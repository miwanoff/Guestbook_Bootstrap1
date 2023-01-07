<?php
	include_once "dbconnect.php";
	include_once "action.php";
	if(!isset($_SESSION))
	{
	  session_start(); // создаем новую сессию или восстанавливаем текущую
	}
        include "header.php";
?>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <ul class="nav navbar-nav navbar-right">
				

<?php
// блок отображения сообщений
	$c=0;	
	if (isset($_SESSION ['user_login'])) {
		echo "<li><a href='admin_panel.php'>Войти в административную панель</a></li>";
		echo "<li><a href='action.php?action=logout'>Выйти из аккаунта</a></li>";
	}	
	else {
		echo "<li><a href='autorize.php'>Войти</a></li>";
		echo "<li><a href='registration.php'>Зарегистрироваться</a></li>";
	}
?>
     </ul>
    </div>
  </nav>
<div class="container bg-grey" >
<?php
	$out=out(5);// вызов функции out() из action.php для получения массива с результатом запроса SELECT * FROM GBookTable
	if(count($out)>0){
    foreach($out as $row)//вывод массива построчно
	  {	
?>
            <div class="container" style="margin:10px; padding:5px;background:f0f0f0;">
                            <div style="color: #999999; border-bottom:1px solid #999999;padding:5px;">Опубликовал: <span style="color: #444;font-weight: bold;"><?php echo $row['username']; ?></span></div>
                            <div style="background:#fafafa;padding:5px;"><?php echo $row['message'];  ?></div>
                            <div style="color: #999999; border-top:1px solid #999999;padding:5px;">Дата публикации: <?php echo $row['date']; ?></div>
            </div>
            <?php
	  }
	}
	  else // если ни одной записи не встретилось
		echo "В гостевой книге пока нет записей...<br>";
    ?>
</div>
    <?php
	  include "footer.php";
          