<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Artjoker-test</title>

		<link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/css/chosen.css" />
		<script src="/js/jquery-3.4.1.js" type="text/javascript"></script>
        <script src="/js/chosen.jquery.js" type="text/javascript"></script>
        <script src="/js/chosen.proto.js" type="text/javascript"></script>
        <script src="/js/my.js" type="text/javascript"></script>
		<script type="text/javascript"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<a href="/">Artjoker-test</a>
				</div>
				<div id="menu">
					<ul>
						<li><a href="/register">Регистрация</a></li>
						<li class="last"><a href="/contacts">Контакты</a></li>
					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="page">

				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>
					</div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
			<div id="page-bottom">
				<div id="page-bottom-sidebar">
					<h3>Наши контакты</h3>
					<ul class="list">
						<li>skype</li>
						<li class="last">email:</li>
					</ul>
				</div>
				<div id="page-bottom-content">
					<h3>О Компании</h3>
				</div>
				<br class="clearfix" />
			</div>
		</div>
		<div id="footer">
			<a href="/">Artjoker-test</a> &copy; 2020</a>
		</div>
	</body>
</html>