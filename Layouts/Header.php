<?php
require("Lib\db.php");
$data = new Database;

require("lib\coreFunction.php");
$core = new coreFunction;
?>
<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="max-age=604800" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="Bootstrap e-commerce html template similar to Alibaba">
	<meta name="keywords" content="Online template, shop, theme, template, html, css, bootstrap 4">

	<title>Website title - bootstrap alistyle html template</title>

	<!-- jQuery -->
	<script src="Assets\js\jquery-2.0.0.min.js" type="text/javascript"></script>

	<!-- Bootstrap4 files-->
	<script src="Assets\js\bootstrap.bundle.min.js" type="text/javascript"></script>
	<link href="Assets\css\bootstrap.css" rel="stylesheet" type="text/css" />

	<!-- Font awesome 5 -->
	<link href="Assets\fonts\fontawesome\css\all.min.css" type="text/css" rel="stylesheet">

	<!-- custom style -->
	<link href="Assets\css\ui.css" rel="stylesheet" type="text/css" />
	<link href="Assets\css\responsive.css.map" rel="stylesheet" type="text/css" />

	<!-- DETAIL STAR-->
	<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>

	<!-- custom javascript -->
	<script src="Assets\js\script.js" type="text/javascript"></script>

	<!-- REGISTER -->

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<style>
		body {
			font-family: "Inter", sans-serif;
		}
	</style>
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

	<link href="https://fonts.googleapis.com/css2?family=Croissant+One&family=Lobster&display=swap" rel="stylesheet">


</head>

<body>

	<b class="screen-overlay"></b>

	<header class="section-header">
		<section class="header-main border-bottom">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-2 col-lg-3 col-md-12">
						<a href="index.php?page=home" class="brand-wrap">
							<img class="logo" src="Assets\images\logo.png">
						</a> <!-- brand-wrap.// -->
					</div>
					<div class="col-xl-6 col-lg-5 col-md-6">
						<form action="index.php?page=search" class="search-header">
							<div class="input-group w-100">
								<select class="custom-select border-right" name="page">
									<option value="search">All type</option>
									<option value="search">Special</option>
									<option value="search">Only best</option>
									<option value="search">Latest</option>
								</select>
								<input type="text" class="form-control" placeholder="Search" name="search">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-search"></i> Search
									</button>
								</div>
							</div>
						</form> <!-- search-wrap .end// -->
					</div> <!-- col.// -->
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="widgets-wrap float-md-right">
							<div class="widget-header mr-3">
								<?php
								if (isset($_SESSION['user'])) {
								?>

									<a href="index.php?page=account&id=<?= isset($_SESSION['id']) ? $_SESSION['id'] : 0 ?>" class="widget-view">
										<div class="icon-area">
											<i class="fa fa-user"></i>
											<span class="notify">3</span>
										</div>
										<small class="text">
											<?php
											$myprofile = 'My Profile';
											if (isset($_COOKIE['name'])) {
												$myprofile = $_COOKIE['name'];
											}
											if (isset($_SESSION['name'])) {
												$myprofile = $_SESSION['name'];
											}
											echo $myprofile;
											?>
										</small>
									</a>
								<?php
								} else {
								?>
									<div class="widget-view" s>
										<div class="icon-area">
											<i class="fa fa-user"></i>
										</div>
										<small class="text">
											<?php
											$myprofile = 'My Profile';
											if (isset($_COOKIE['name'])) {
												$myprofile = $_COOKIE['name'];
											}
											if (isset($_SESSION['name'])) {
												$myprofile = $_SESSION['name'];
											}
											echo $myprofile;
											?>
										</small>
									</div>
								<?php

								}
								?>
							</div>
							<div class="widget-header mr-3">
								<a href="index.php?page=message" class="widget-view">
									<div class="icon-area">
										<i class="fa fa-comment-dots"></i>
										<span class="notify">1</span>
									</div>
									<small class="text"> Message </small>
								</a>
							</div>
							<div class="widget-header mr-3">
								<?php
								if (isset($_SESSION['user'])) {
								?>
									<a href="index.php?page=order" class="widget-view">
										<div class="icon-area">
											<i class="fa fa-store"></i>
										</div>
										<small class="text"> Orders </small>
									</a>
								<?php
								} else {
								?>
									<p class="widget-view">
									<div class="icon-area">
										<i class="fa fa-store"></i>
									</div>
									<small class="text"> Orders </small>
									</p>
								<?php
								}
								?>
							</div>
							<div class="widget-header">
								<?php
								if (isset($_SESSION['user'])) {
								?>
									<a href="index.php?page=cart" class="widget-view disable">
										<div class="icon-area">
											<i class="fa fa-shopping-cart"></i>
											<span class="notify"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>
										</div>
										<small class="text"> Cart </small>
									</a>
								<?php
								} else {
								?>
									<p class="widget-view disable">
									<div class="icon-area">
										<i class="fa fa-shopping-cart"></i>
										<span class="notify">0</span>
									</div>
									<small class="text"> Cart </small>
									</p>
								<?php
								}
								?>
							</div>
						</div> <!-- widgets-wrap.// -->
					</div> <!-- col.// -->
				</div> <!-- row.// -->
			</div> <!-- container.// -->
		</section> <!-- header-main .// -->



		<nav class="navbar navbar-main navbar-expand-lg border-bottom">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="main_nav">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-bars text-muted mr-2"></i>&emsp;Category&emsp;</a>
							<div class="dropdown-menu dropdown-large">
								<nav class="row">
									<div class="col-6">
										<a href="index.php?page=home">Home page</a>
										<a href="index.php?page=category">All category</a>
										<a href="index.php?page=listinggrid">Listing grid</a>
										<a href="index.php?page=cart">Shopping cart</a>
										<?php
										if (isset($_SESSION['user'])) {	?>
											<a href="index.php?page=logout">
												Log Out
											</a>

										<?php
										} else {	?>
											<a href="index.php?page=login">
												Log In
											</a>
										<?php
										}
										?>
										<a href="index.php?page=register">Register</a>
									</div>
									<div class="col-6">
										<ul>
											<li>
												<a href="index.php?page=account">Profile Main

												</a>
											</li>
											<li?><a href="index.php?page=order">Profile Orders</a>
						</li>

						<!-- LIST CATEGORY -->
						<?php
						$sql = "SELECT * FROM CATEGORY";
						$list_category = $core->getAll($sql);
						foreach ($list_category as $category) {
						?>
							<li>
								<a href="index.php?page=listinggrid&catid=<?= $category['id'] ?>" id="shoplist">
									<?php
									echo $category['category_name'];
									?>
								</a>
							</li>
						<?php
						}
						?>
					</ul>
				</div>
		</nav> <!--  row end .// -->
		</div> <!--  dropdown-menu dropdown-large end.// -->
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Ready to ship</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Trade shows</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Services</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Sell with us</a>
		</li>
		</ul>
		<ul class="navbar-nav ml-md-auto">
			<li class="nav-item">
				<a class="nav-link" href="#">Get the app</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http://example.com" data-toggle="dropdown">English</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="#">Russian</a>
					<a class="dropdown-item" href="#">French</a>
					<a class="dropdown-item" href="#">Spanish</a>
					<a class="dropdown-item" href="#">Chinese</a>
				</div>
			</li>
		</ul>
		</div> <!-- collapse .// -->
		</div> <!-- container .// -->
		</nav>

	</header> <!-- section-header.// -->