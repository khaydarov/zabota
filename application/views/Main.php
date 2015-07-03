<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Страница входа на приложение</title>

	<!-- INCLUDE STYLES -->
	<link rel="stylesheet" href="/social/application/views/styles/css/bootstrap.css">
	<link rel="stylesheet/less" href="/social/application/views/styles/main.less">
	<link rel="stylesheet" href="/social/application/views/styles/tpl.css">

	<!-- INCLUDE JS -->
	<script src="/social/application/views/styles/js/bootstrap.js"></script>
	<script src="/social/application/views/styles/js/jquery-1.9.1.js"></script>
	<script src="/social/application/views/styles/js/jquery-ui-1.10.3.custom.js"></script>
	<script src="/social/application/views/styles/js/json2.js"></script>
	<script src="/social/application/views/styles/js/xmlhttprequest.js"></script>
	<script src="/social/application/views/styles/js/9.less-1.3.0.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="col-lg-12 header">	
		</div>
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-3 "></div>
				<div class="col-lg-6 ">
					<div class="row">
						<div class="col-lg-2 "></div>
						<div class="col-lg-6 col-md-5 col-md-offset-3 col-xs-6 col-xs-offset-3 col-lg-offset-1 enter_container">
							<?=$content; ?>
						</div>
						<div class="col-lg-2 "></div>
					</div>
				</div>
				<div class="col-lg-3 "></div>
			</div>
		</div>
	</div>
</body>
</html>