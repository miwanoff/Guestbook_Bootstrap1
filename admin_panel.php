<?php
include_once ("dbconnect.php"); // подключение базы данных
ob_start();
session_start(); // создаем новую сессию или восстанавливаем текущую
if (!$_SESSION ['user_login']) {
	// проверяем правильность авторизации
	Header("Location: index.php"); // если ошибка, то перенаправляем на страницу авторизации
	ob_end_flush();
}
else {
	
include "header.php";
ob_end_flush();
?>

	<nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="index.php">Просмотр сайта</a></li>
              </ul>
            </div>
        </nav>
        <div class="container" >
	<h3>Добавить сообщение</h3>
	<!-- форма отправки сообщения -->
	<form name="myForm" action="action.php" method="post" id="myForm"
		onSubmit="return overify_message(this);">
		<input type=hidden name="action" value="add">
		<div>Имя пользователя:</div>
		<input name="username" style="width: 300px;">
		<div>Сообщение:</div>
		
                <div class="container">
                    <div class="hero-unit">


                          <div id="alerts"></div>
                      <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                        <div class="btn-group">
                          <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            </ul>
                          </div>
                        <div class="btn-group">
                          <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                            <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                            <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                          <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
                          <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
                          <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
                          <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
                        </div>
                        <div class="btn-group">
                          <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
                          <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
                          <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
                          <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
                        </div>
                        <div class="btn-group">
                          <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
                          <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
                          <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
                          <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
                        </div>
                        <div class="btn-group">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
                                      <div class="dropdown-menu input-append">
                                              <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                                              <button class="btn" type="button">Add</button>
                          </div>
                          <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>
                        </div>

                        <div class="btn-group">
                          <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
                          <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                        </div>
                        <div class="btn-group">
                          <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
                          <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
                        </div>
                        <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
                      </div>
                      <div id="editor">
                        Go ahead...
                      </div>
                      <textarea  type="hidden" id="hidden-editor" class="textarea" style="display:none;width: 810px; height: 200px;" name="message"></textarea>
  
       
                    </div>
                </div>
		<div>
			<input type="submit" id="submit-btn" name="submitAdd" value="Отправить сообщение">
		</div>
	</form>
      </div>

<?php
}

if (isset($_SESSION ['add']) && $_SESSION ['add'] == true) {
	echo "Запись была добавлена успешно";
	$_SESSION ['add'] = false;
}
include "footer.php";
