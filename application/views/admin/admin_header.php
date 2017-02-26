<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>"> -->
	<?= link_tag('assets/css/bootstrap.min.css');?>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= base_url('admin/dashboard'); ?>">Admin Dashboard </a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url('logout');?>">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>