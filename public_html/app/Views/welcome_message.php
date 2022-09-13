<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Оперативные отчеты: План / Факт</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/mdb.min.css">
	<style>
	</style>
</head>

<body class="fixed-sn white-skin">

<!-- Main Navigation -->
<header>
	
	<!-- Sidebar navigation -->
	<div id="slide-out" class="side-nav sn-bg-4 fixed">
		<ul class="custom-scrollbar">
			
			<!-- Logo -->
			<li class="logo-sn waves-effect py-3">
				<div class="text-center">
					<a href="/" class="pl-0"><img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"></a>
				</div>
			</li>
			
			<!-- Search Form -->
			
			<!-- Side navigation links -->
			<li>
				<ul class="collapsible collapsible-accordion">
					
					<li>
						<a href="/Example?q=charts" class="collapsible-header waves-effect"><i
								class="w-fa fas fa-chart-pie"></i>План/Факт</a>
					</li>
					
				
				</ul>
			</li>
			<!-- Side navigation links -->
		
		</ul>
		<div class="sidenav-bg mask-strong"></div>
	</div>
	<!-- Sidebar navigation -->
	
	<!-- Navbar -->
	<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
		
		<!-- SideNav slide-out button -->
		<div class="float-left">
			<a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
		</div>
		
		<!-- Breadcrumb -->
		<div class="breadcrumb-dn mr-auto">
			<p>Панель приборов</p>
		</div>
	
	</nav>
	<!-- Navbar -->
	
	<!-- Fixed button -->
	
	<!-- Fixed button -->

</header>
<!-- Main Navigation -->

<!-- Main layout -->
<main style="min-height: 90vh">
	
	<div class="container-fluid">
		
		<!-- Section: Intro -->
		<section class="mt-md-4 pt-md-2 mb-5 pb-4">
			<div class=" mt-2 mb-4">
				<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<div class="row justify-content-center mt-2 mb-2">
							<div class="container">
								<label for="select">Выберите месяц</label>
								<select class="form-control">
									<option value="null" selected disabled> Выберите месяц</option>
									<?php $i=-1;?>
									<?php foreach($month as $el):?>
									<?php $i++;?>
									<option value="<?=$i?>"><?=$el?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="row justify-content-between mb-2">
							<div class="col">
								<label for="startDate">Дата начала</label>
								<input type="date" class="form-control" value="<?=date('Y-m-01')?>"/>
							</div>
							
							<div class="col">
								<label for="EndDate">Дата конца</label>
								<input type="date" class="form-control" value="<?=date('Y-m-d')?>" />
							</div>
						</div>
						<div class="row justify-content-center mt-2">
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
								<label class="form-check-label" for="flexSwitchCheckChecked">Показать прошлый год</label>
							</div>
						</div>
						<div class="row justify-content-center mt-2">
							<button class="btn btn-deep-purple btn-rounded">Показать</button>
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- Grid row -->
			<h4 class="h4 text-center mt-4 -mb-4">Текущий вид</h4>
			<div class="row">
				
				<!-- Grid column -->
				
					
					<!-- Card -->
					
				
				<?php foreach($content as $obj): ?>
				<div class="col-lg-3">
					<div class="card">
						<div class="card-header bg-dark">
							<h3 class="h3 text-center text-white"><?=str_replace('!','',$obj['Club']) ?></h3>
						</div>
						<div class="card-body">
							<div class="row justify-content-center">
							<span class="min-chart my-4" id="chart-sales" data-percent="<?=$obj['Percent']?>"><span
										class="percent"></span></span>
							</div>
						</div>
						<div class="card-footer">
							<p class="text-dark">План - <span class="text-dark"><?= number_format($obj['TotalPlan'],0,'.',' ') ?> р.</span> </p>
							<p class="text-dark">План на текуший день - <span class="text-dark"><?= number_format($obj['CurrentPlan'],0,'.',' ') ?> р.</span> </p>
							<p class="text-dark">Фактически - <span class="text-dark"><?= number_format($obj['SummFact'],0,'.',' ') ?> р.</span> </p>
						</div>
					</div>
				</div>
				<?php endforeach;?>
					<!-- Card -->
					</div>
				</div>
				
			</div>
			<!-- Grid row -->
		
		</section>
		<!-- Section: Intro -->
		
		
	</div>

</main>
<!-- Main layout -->

<!-- Footer -->
<footer class="page-footer pt-0 mt-5 rgba-stylish-light">
	
	<!-- Copyright -->
	<div class="footer-copyright py-3 text-center">
		<div class="container-fluid">
			© 2022 Copyright: <a href="/" > Персона-Digital </a>
		</div>
	</div>

</footer>
<!-- Footer -->

<!-- SCRIPTS -->
<!-- JQuery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>

<!-- Initializations -->
<script>
	// SideNav Initialization
	$(".button-collapse").sideNav();

	var container = document.querySelector('.custom-scrollbar');
	var ps = new PerfectScrollbar(container, {
		wheelSpeed: 2,
		wheelPropagation: true,
		minScrollbarLength: 20
	});

	// Data Picker Initialization
	$('.datepicker').pickadate({
		monthsFull: [ 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря' ],
		monthsShort: [ 'янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек' ],
		weekdaysFull: [ 'воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота' ],
		weekdaysShort: [ 'вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб' ],
		today: 'сегодня',
		clear: 'удалить',
		close: 'закрыть',
		firstDay: 1,
		format: 'd mmmm yyyy г.',
		formatSubmit: 'yyyy/mm/dd'
	});

	// Material Select Initialization
	$(document).ready(function () {
		$('.mdb-select').material_select();
	});

	// Tooltips Initialization
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})

</script>

<!-- Charts -->
<script>
	// Small chart
	$(function () {
		$('.min-chart#chart-sales').easyPieChart({
			barColor: "#45d294",
			onStep: function (from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});
	});

	// Main chart
	var ctxL = document.getElementById("lineChart").getContext('2d');
	var myLineChart = new Chart(ctxL, {
		type: 'line',
		data: {
			labels: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],
			datasets: [{
				label: "Имя таблицы",
				fillColor: "#fff",
				backgroundColor: 'rgba(255, 255, 255, .3)',
				borderColor: 'rgba(255, 255, 255)',
				data: [0, 10, 5, 2, 20, 30, 45],
			}]
		},
		options: {
			legend: {
				labels: {
					fontColor: "#fff",
				}
			},
			scales: {
				xAxes: [{
					gridLines: {
						display: true,
						color: "rgba(255,255,255,.25)"
					},
					ticks: {
						fontColor: "#fff",
					},
				}],
				yAxes: [{
					display: true,
					gridLines: {
						display: true,
						color: "rgba(255,255,255,.25)"
					},
					ticks: {
						fontColor: "#fff",
					},
				}],
			}
		}
	});

	$(function () {
		$('#dark-mode').on('click', function (e) {

			e.preventDefault();
			$('h4, button').not('.check').toggleClass('dark-grey-text text-white');
			$('.list-panel a').toggleClass('dark-grey-text');

			$('footer, .card').toggleClass('dark-card-admin');
			$('body, .navbar').toggleClass('white-skin navy-blue-skin');
			$(this).toggleClass('white text-dark btn-outline-black');
			$('body').toggleClass('dark-bg-admin');
			$('h6, .card, p, td, th, i, li a, h4, input, label').not(
				'#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
			$('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
			$('.gradient-card-header').toggleClass('white black lighten-4');
			$('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');

		});
	});

</script>

</body>

</html>
