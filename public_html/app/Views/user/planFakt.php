<!DOCTYPE html>
<html lang="ru">
<style>
	.percent2{
		margin-top:50%;
		display: inline-block;
	}
</style>
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
	<div id="slide-out" class="side-nav fixed">
		<ul class="custom-scrollbar">

			<!-- Logo -->
			<li class="logo-sn waves-effect py-3">
				<div class="text-center">
					<a href="/" class="pl-0"><img src="/img/logo.png" class="img-fluid" style="width: 90%"></a>
				</div>
			</li>

			<!-- Search Form -->

			<!-- Side navigation links -->
			<li>
				<ul class="collapsible collapsible-accordion">
					<li>
						<a class="collapsible-header waves-effect arrow-r">
							<i class="w-fa fas fa-tachometer-alt"></i>Финансы<i class="fas fa-angle-down rotate-icon"></i>
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="#" class="waves-effect disabled">Стратегическое планирование</a>
								</li>
								<li>
									<a href="/planfakt" class="collapsible-header waves-effect active disabled"><i
												class="w-fa fas fa-coins"></i>План/Факт</a>
								</li>

								<li>
									<a href="#" class="waves-effect disabled">Контракты</a>
								</li>
								<li>
									<a href="#" class="waves-effect disabled">ОПИУ</a>
								</li>

							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header waves-effect arrow-r">
							<i class="w-fa fas fa-tachometer-alt"></i>Продажи<i class="fas fa-angle-down rotate-icon"></i>
						</a>
						<div class="collapsible-body">
							<ul>
								<!--<li>
									<a href="#" class="waves-effect disabled">Стратегическое планирование</a>
								</li>
								<li>
									<a href="/planfakt" class="collapsible-header waves-effect"><i
												class="w-fa fas fa-coins"></i>План/Факт</a>
								</li>

								<li>
									<a href="#" class="waves-effect disabled">Контракты</a>
								</li>
								<li>
									<a href="#" class="waves-effect disabled">ОПИУ</a>
								</li>-->

							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header waves-effect arrow-r">
							<i class="w-fa fas fa-tachometer-alt"></i>Услуги<i class="fas fa-angle-down rotate-icon"></i>
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="#" class="waves-effect disabled">Сплит по услугам</a>
								</li>
								<li>
									<a href="#" class="collapsible-header waves-effect disabled" ><i
												class="w-fa fas fa-coins"></i>Прогноз</a>
								</li>

								<li>
									<a href="#" class="waves-effect disabled">Конверсия</a>
								</li>
								<li>
									<a href="#" class="waves-effect disabled">Оказанные услуги</a>
								</li>

							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header waves-effect arrow-r">
							<i class="w-fa fas fa-tachometer-alt"></i>Клиент<i class="fas fa-angle-down rotate-icon"></i>
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="#" class="waves-effect disabled">Сегментация</a>
								</li>
								<li>
									<a href="#" class="collapsible-header waves-effect disabled" ><i
												class="w-fa fas fa-coins"></i>Продление/возобновление</a>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header waves-effect arrow-r">
							<i class="w-fa fas fa-tachometer-alt"></i>Маркетинг<i class="fas fa-angle-down rotate-icon"></i>
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="#" class="waves-effect disabled">Воронка</a>
								</li>
								<li>
									<a href="#" class="collapsible-header waves-effect disabled" ><i
												class="w-fa fas fa-coins"></i>ROI</a>
								</li>
							</ul>
						</div>
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
			<p>План / Факт</p>
		</div>

	</nav>
	<!-- Navbar -->

	<!-- Fixed button -->

	<!-- Fixed button -->

</header>
<!-- Main Navigation -->

<!-- Main layout -->
<main style="min-height: 90vh" id="App">

	<div class="container-fluid">

		<!-- Section: Intro -->
		<section class="mt-md-2 pt-md-2 mb-5 pb-4">
			<div class=" mb-4">
				<div class="col-lg-6">
					<div class="card mt-n3">
						<div class="maintable-card-body">
							<div class="row justify-content-center  mt-3 mb-2">
								<div class="container">
									<label for="select">Прошлые месяцы</label>
									<select class="form-control  text-black-50" v-model="Curmonth" v-on:change="setDatePeriod">
										<option value="null" selected disabled class="text-black-50"> Выберите месяц</option>
										<option v-for="(item,index) in month" :value="index+1" v-text="item"></option>
									</select>
								</div>
							</div>
							<div class="row justify-content-between mb-2 mt-3">
								<div class="col">
									<label for="startDate">Дата начала</label>
									<input type="date" class="form-control text-black-50" v-model="currStart"/>
								</div>

								<div class="col">
									<label for="EndDate">Дата конца</label>
									<input type="date" class="form-control text-black-50"   v-model="currEnd"/>
								</div>
							</div>
							<div class="row justify-content-between mb-3 mt-3">
                                <div class="col">
                                <a :href = "'/planfakt?start='+currStart+'&end='+currEnd">
                                    <button class="button-view" v-on:click="getInfo" style="font-size: 14pt">Показать</button>
                                </a>
                                </div>
								<div class="col form-check form-switch lastyear">
									<input class="form-check-input textlastyear" type="checkbox" id="flexSwitchCheckChecked" v-model="appg">
									<label class="form-check-label textlastyear" for="flexSwitchCheckChecked">Показать прошлый год</label>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
			<!-- Grid row -->
			<h4 class="h4 text-center mt-4 mb-4" style="color: #332525 !important" v-text="viewText"></h4>
			<div class="row">

				<!-- Grid column -->


				<!-- Card -->

					<?php $iterration = 0;?>
					<?php foreach ($content['current'] as $current):?>
					<div class="col-lg-6" v-show="single">
						<div class="card">
							<div class="card-header bg-dark">
								<h3 class="h3 text-white"><?=str_replace('!','',$current['Club'])?></h3>
								<p class="text-white">План — <span class="text-white" ><?=round(($current['TotalPlan']/1000000),1)?></span> млн. руб.</p>
								<p class="text-white" style="margin-top: -1rem !important; margin-bottom: -0.10rem !important;">Прогноз — <span class="text-white" ><?=round(($current['TotalPlan']*$current['Percent'])/100000000,1)?></span>  млн. руб.</p>
							</div>
							<div class="card-body">
                                <div class="row">
                                <div class="col">
                                        <canvas id="barChart_<?=$iterration?>" height="200px"></canvas>
                                </div>
								<div class="col mt-4 row justify-content-center" >
									<span class="min-chart my-4 " id="chart-sales" data-percent="<?=$current['Percent']?>" >
										<span class="percent"></span>
										<span style="font-size: xx-small"> Основной</span>
									</span>
								</div>
                                </div>
								<div class="card-footer">
									<p class="" style="color: #26599E; font-size: 12pt !important;">{{'План на '+currEndSTR}}  — <span class="" style="color: #26599E" ><?=round($current['CurrentPlan']/1000000,1)?> </span><span class="" style="color: #26599E"> млн. руб.</span></p>
									<p class="" style="color: #F05050; font-size: 12pt !important; margin-top: -1rem !important; ">Фактически — <span class="" style="color: #F05050" ><?=round($current['SummFact']/1000000,1)?></span > <span class="" style="color: #F05050"> млн. руб.</span></p>
									<?php if($current['CurrentPlan'] - $current['SummFact'] > 0):?>
										<p class="text-danger" style="margin-top: -1rem !important; margin-bottom: -.5rem !important; font-size: 12pt !important; color: #F05050;"> Дельта: -<?=round(($current['CurrentPlan'] - $current['SummFact'])/1000000,1)?><span class="" style="color: #F05050;"> млн. руб.</span></p>
									<?php else: ?>
										<p class="text-success" style="margin-top: -1rem !important; margin-bottom: -.5rem !important; font-size: 12pt !important; color: #45D294;"> Дельта: <?=round(($current['CurrentPlan'] - $current['SummFact'])/1000000,1)?><span class="" style="color: #45D294;"> млн. руб.</span></p>
									<?php endif;?>
								</div>
							</div>

                            <!-- KIDS-BEGIN -->
                            <div class="card-header-kids bg-dark">
                                <h3 class="h3 text-white"><?=str_replace('!','',$current['Club'])?> — Kids</h3>
                                <p class="text-white">План — <span class="text-white" ><?=round(($current['KidsPlan']/1000000),1)?></span> млн. руб.</p>
                                <p class="text-white" style="margin-top: -1rem !important; margin-bottom: -0.10rem !important;">Фактически — <span class="text-white" ><?=round(($current['KidsFact']*$current['Percent'])/100000000,1)?></span>  млн. руб.</p>
                            </div>
                            <!-- KIDS-CARD-BODY -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <canvas id="barChartKids_<?=$iterration?>" height="200px"></canvas>
                                    </div>
                                    <div class="col mt-4 row justify-content-center" >
									<span class="min-chart my-4 " id="chart-sales" data-percent="<?=$current['Percent']?>" >
										<span class="percent"></span>
										<span style="font-size: xx-small"> Основной</span>
									</span>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="" style="color: #26599E; font-size: 12pt !important;">{{'План на '+currEndSTR}}  — <span class="" style="color: #26599E" ><?=round($current['KidsPlan']/1000000,1)?> </span><span class="" style="color: #26599E"> млн. руб.</span></p>
                                    <p class="" style="color: #F05050; font-size: 12pt !important; margin-top: -1rem !important; ">Фактически — <span class="" style="color: #F05050" ><?=round($current['KidsFact']/1000000,1)?></span > <span class="" style="color: #F05050"> млн. руб.</span></p>
                                    <?php if($current['KidsPlan'] - $current['KidsFact'] > 0):?>
                                        <p class="text-danger" style="margin-top: -1rem !important; margin-bottom: -.5rem !important; font-size: 12pt !important; color: #F05050;"> Дельта: -<?=round(($current['KidsPlan'] - $current['KidsFact'])/1000000,1)?><span class="" style="color: #F05050;"> млн. руб.</span></p>
                                    <?php else: ?>
                                        <p class="text-success" style="margin-top: -1rem !important; margin-bottom: -.5rem !important; font-size: 12pt !important; color: #45D294;"> Дельта: <?=round(($current['KidsPlan'] - $current['KidsFact'])/1000000,1)?><span class="" style="color: #45D294;"> млн. руб.</span></p>
                                    <?php endif;?>
                                </div>
                            </div>
                            <!-- KIDS-END -->
						</div>


					</div>
					<?php $iterration++;?>
					<?php	endforeach; ?>
					<?php for($i = 0,$iMax=count($content['current']); $i<$iMax; $i++): ?>

						<div class="col-lg-6" v-show="appg">
							<div class="card">
								<div class="card-header bg-dark">
									<h3 class="h3 text-white"><?=str_replace('!','',$content['current'][$i]['Club'])?></h3>
										<p class="text-white">План — <span class="text-white" ><?=round($content['current'][$i]['TotalPlan']/1000000,1)?></span> млн. руб.</p>
										<p class="text-white" style="margin-top: -1rem !important; margin-bottom: -0.10rem !important;">Прогноз — <span class="text-white" ><?=round($content['current'][$i]['TotalPlan']*$content['current'][$i]['Percent']/100000000,1)?></span>  млн. руб.</p>
								</div>
							<div class="card-body">
								<div class="row justify-content-between" >
									<div class="col row justify-content-center">
												<span class="min-chart my-4 row justify-content-center" id="chart-sales" data-percent="<?=$content['current'][$i]['Percent']?>" >
													<span class="percent"></span>
													<span style="font-size: xx-small"> Основной</span>
												</span>
									</div>
									<div class="col row justify-content-center">
												<span class="min-chart my-4" id="chart-sales-appg" data-percent="<?=$content['appg'][$i]['Percent']?>" >
													<span class="percent" id="percent2"></span>
													<span style="font-size: xx-small"> Ранее</span>
												</span>
									</div>
								</div>
									<div class="row justify-content-between">
										<div class="col">
											<canvas id="barChart_current<?=$i?>" height="200px"></canvas>
										</div>
										<div class="col">
											<canvas id="barChart_appg<?=$i?>" height="200px"></canvas>
										</div>
									</div>
                                <div class="card-footer">
                                    <p class="" style="color: #26599E">{{'План на '+currEndSTR}}  — <span class="" style="color: #26599E" ><?=round($current['CurrentPlan']/1000000,1)?> </span><span class="" style="color: #26599E"> млн. руб.</span></p>
                                    <p class="" style="color: #F05050; margin-top: -1rem !important; ">Фактически — <span class="" style="color: #F05050" ><?=round($current['SummFact']/1000000,1)?></span > <span class="" style="color: #F05050"> млн. руб.</span></p>
                                    <?php if($current['CurrentPlan'] - $current['SummFact'] > 0):?>
                                        <p class="text-danger" style="margin-top: -1rem !important; margin-bottom: -.5rem !important; color: #F05050;"> Дельта: -<?=round(($current['CurrentPlan'] - $current['SummFact'])/1000000,1)?><span class="" style="color: #F05050;"> млн. руб.</span></p>
                                    <?php else: ?>
                                        <p class="text-success" style="margin-top: -1rem !important; margin-bottom: -.5rem !important; color: #45D294;"> Дельта: <?=round(($current['CurrentPlan'] - $current['SummFact'])/1000000,1)?><span class="" style="color: #45D294;"> млн. руб.</span></p>
                                    <?php endif;?>
                                </div>
						</div>
                                <!-- KIDS-BEGIN -->
                                <div class="card-header-kids bg-dark">
                                    <h3 class="h3 text-white"><?=str_replace('!','',$current['Club'])?> — Kids</h3>
                                    <p class="text-white">План — <span class="text-white" ><?=round(($current['KidsPlan']/1000000),1)?></span> млн. руб.</p>
                                    <p class="text-white" style="margin-top: -1rem !important; margin-bottom: -0.10rem !important;">Фактически — <span class="text-white" ><?=round(($current['KidsFact']*$current['Percent'])/100000000,1)?></span>  млн. руб.</p>
                                </div>
                                <!-- CARD-BODY -->
                                <div class="card-body">
                                    <div class="row justify-content-between" >
                                        <div class="col row justify-content-center">
												<span class="min-chart my-4 row justify-content-center" id="chart-sales" data-percent="<?=$content['current'][$i]['Percent']?>" >
													<span class="percent"></span>
													<span style="font-size: xx-small"> Основной</span>
												</span>
                                        </div>
                                        <div class="col row justify-content-center">
												<span class="min-chart my-4" id="chart-sales-appg" data-percent="<?=$content['appg'][$i]['Percent']?>" >
													<span class="percent" id="percent2"></span>
													<span style="font-size: xx-small"> Ранее</span>
												</span>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col">
                                            <canvas id="barChartKids_current<?=$i?>" height="200px"></canvas>
                                        </div>
                                        <div class="col">
                                            <canvas id="barChartKids_appg<?=$i?>" height="200px"></canvas>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="" style="color: #26599E; font-size: 12pt !important;">{{'План на '+currEndSTR}}  — <span class="" style="color: #26599E" ><?=round($current['KidsPlan']/1000000,1)?> </span><span class="" style="color: #26599E"> млн. руб.</span></p>
                                        <p class="" style="color: #F05050; font-size: 12pt !important; margin-top: -1rem !important; ">Фактически — <span class="" style="color: #F05050" ><?=round($current['KidsFact']/1000000,1)?></span > <span class="" style="color: #F05050"> млн. руб.</span></p>
                                        <?php if($current['KidsPlan'] - $current['KidsFact'] > 0):?>
                                            <p class="text-danger" style="margin-top: -1rem !important; margin-bottom: -.5rem !important; font-size: 12pt !important; color: #F05050;"> Дельта: -<?=round(($current['KidsPlan'] - $current['KidsFact'])/1000000,1)?><span class="" style="color: #F05050;"> млн. руб.</span></p>
                                        <?php else: ?>
                                            <p class="text-success" style="margin-top: -1rem !important; margin-bottom: -.5rem !important; font-size: 12pt !important; color: #45D294;"> Дельта: <?=round(($current['KidsPlan'] - $current['KidsFact'])/1000000,1)?><span class="" style="color: #45D294;"> млн. руб.</span></p>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <!-- KIDS-END -->
					</div>
				</div>
					<?php endfor;?>
			</div>
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


<!-- Initializations -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.js" integrity="sha512-uplugzeh2/XrRr7RgSloGLHjFV0b4FqUtbT5t9Sa/XcilDr1M3+88u/c+mw6+HepH7M2C5EVmahySsyilVHI/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
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
		$('.min-chart#chart-sales-appg').easyPieChart({
			barColor: "#4572e5",
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
<script>
	const PlanFakt = new Vue({
		el:'#App',
		data: {
			currStart: '<?=$start?>',
			currEnd: '<?=$end?>',
			currEndSTR:'<?=$endSTR?>',
			viewText: 'Текущий отчет c <?=$startSTR?> по <?=$endSTR?>',
			month:<?= json_encode($month)?>,
			Curmonth:null,
			appg:false,

		},
		computed:{
			single:function(){
				 if(this.appg==false){
					 return true
				 }
				 else{
					 $('.min-chart#chart-sales-appg').easyPieChart({
						 barColor: "#4572e5",
						 onStep2: function (from, to, percent) {
							 $(this.el).find('.percent').text(Math.round(percent));
						 }
					 });
					 return false
				 }
			}
		},
		methods:{
			setDatePeriod(){
				const self = this
				let Forma ={
					month:this.Curmonth
				}
				axios.post('/API/User/getPeriod',Forma).then(res=>{
					self.currStart = res.data.start
					self.currEnd = res.data.end
				})
			},
			getInfo(){
				const self = this
				let Forma ={
					start:this.currStart,
					end:this.currEnd
				}
				axios.post('/planfakt',Forma).then(res=>{
					self.content = res.data.content
					self.viewText = 'Текуший отчет c '+res.data.start+' по '+res.data.end
					self.currEndSTR = res.data.end
					self.rerender()

				})
			},
			rerender(){

			}
		}
	})
</script>
<?php for($i=0,$iMax=count($content['current']); $i<$iMax; $i++):?>
<script>
	var ctxB = document.getElementById("barChart_<?=$i?>").getContext('2d');
	var myBarChart = new Chart(ctxB, {
		type: 'bar',
		data: {
			labels: [ "План"," ","Факт"],
			datasets: [{
				label: [''],
				data: [<?=round($content['current'][$i]['TotalPlan']/1000000,1)?>,0.001,<?=round(($content['current'][$i]['SummFact']/1000000),1)?>],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
						'',
					'rgba(54, 162, 235, 0.2)',

				],
				borderColor: [
					'rgba(255,99,132,1)',
						'',
					'rgba(54, 162, 235, 1)',

				],
				borderWidth: 1
			}]
		},
		optionss: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
<script>
		var ctxB = document.getElementById("barChart_current<?=$i?>").getContext('2d');
		var myBarChart = new Chart(ctxB, {
			type: 'bar',
			data: {
				labels: [ "План"," ","Факт"],
				datasets: [{
					label: [''],
                    data: [<?=round($content['current'][$i]['TotalPlan']/1000000,1)?>,0.001,<?=round(($content['current'][$i]['SummFact']/1000000),1)?>],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'',
						'rgba(54, 162, 235, 0.2)',

					],
					borderColor: [
						'rgba(255,99,132,1)',
						'',
						'rgba(54, 162, 235, 1)',

					],
					borderWidth: 1
				}]
			},
			optionss: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>
	<script>
		var ctxB = document.getElementById("barChart_appg<?=$i?>").getContext('2d');
		var myBarChart = new Chart(ctxB, {
			type: 'bar',
			data: {
				labels: [ "План"," ","Факт"],
				datasets: [{
					label: ['<?=number_format($content['appg'][$i]['TotalPlan'],0,'.',' ') ?> / <?=number_format($content['appg'][$i]['SummFact'],0,'.',' ') ?>'],
					data: [<?=round($content['appg'][$i]['TotalPlan']/1000000,1)?>,0.001,<?=round(($content['appg'][$i]['SummFact']/1000000),1)?>],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'',
						'rgba(54, 162, 235, 0.2)',

					],
					borderColor: [
						'rgba(255,99,132,1)',
						'',
						'rgba(54, 162, 235, 1)',

					],
					borderWidth: 1
				}]
			},
			optionss: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>

<!-- KIDS-TABLE SCRIPT -->

    <script>
        var ctxB = document.getElementById("barChartKids_<?=$i?>").getContext('2d');
        var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: [ "План"," ","Факт"],
                datasets: [{
                    label: [''],
                    data: [<?=round($content['current'][$i]['KidsPlan']/1000000,1)?>,0.001,<?=round(($content['current'][$i]['KidsFact']/1000000),1)?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        '',
                        'rgba(54, 162, 235, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        '',
                        'rgba(54, 162, 235, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            optionss: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctxB = document.getElementById("barChartKids_current<?=$i?>").getContext('2d');
        var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: [ "План"," ","Факт"],
                datasets: [{
                    label: [''],
                    data: [<?=round($content['current'][$i]['KidsPlan']/1000000,1)?>,0.001,<?=round(($content['current'][$i]['KidsFact']/1000000),1)?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        '',
                        'rgba(54, 162, 235, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        '',
                        'rgba(54, 162, 235, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            optionss: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctxB = document.getElementById("barChartKids_appg<?=$i?>").getContext('2d');
        var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: [ "План"," ","Факт"],
                datasets: [{
                    label: ['<?=number_format($content['appg'][$i]['KidsPlan'],0,'.',' ') ?> / <?=number_format($content['appg'][$i]['KidsFact'],0,'.',' ') ?>'],
                    data: [<?=round($content['appg'][$i]['KidsPlan']/1000000,1)?>,0.001,<?=round(($content['appg'][$i]['KidsFact']/1000000),1)?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        '',
                        'rgba(54, 162, 235, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        '',
                        'rgba(54, 162, 235, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            optionss: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

<!-- END KIDS-TABLE SCRIPT -->

<?php endfor;?>
</body>

</html>
