<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Вход</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="/css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<style>
		html,
		body,
		header,
		.view {
			height: 100%;
		}
		@media (min-width: 560px) and (max-width: 740px) {
			html,
			body,
			header,
			.view {
				height: 650px;
			}
		}
		@media (min-width: 800px) and (max-width: 850px) {
			html,
			body,
			header,
			.view  {
				height: 650px;
			}
		}
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			/* display: none; <- Crashes Chrome on hover */
			-webkit-appearance: none;
			margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
		}
	</style>
</head>

<body class="login-page">

<!-- Main Navigation -->
<header>
	
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
		<div class="container">
			<a class="navbar-brand" href="#"><strong>Оперативные отчеты</strong></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
			        aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent-7">
			
			
			</div>
		</div>
	</nav>
	<!-- Navbar -->
	
	<!-- Intro Section -->
	<section class="view intro-2" id="loginApp">
		<div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
						
						<!-- Form with header -->
						<div class="card wow fadeIn" data-wow-delay="0.3s">
							<div class="card-body">
								
								<!-- Header -->
								
								
								<!-- Body -->
								<template v-if="mode_login == 'password'">
									<div class="form-header purple-gradient">
										<h3 class="font-weight-500 my-2 py-1"><i class="fas fa-user"></i> Вход :</h3>
									</div>
									<div class="md-form" >
										<i class="fas fa-user prefix white-text"></i>
										<input type="text" v-model.trim="login" id="orangeForm-name" class="form-control">
										<label for="orangeForm-name">Имя пользователя</label>
									</div>
									<div class="md-form" >
										<i class="fas fa-lock prefix white-text"></i>
										<input type="password" v-model.trim="password" id="orangeForm-pass" class="form-control">
										<label for="orangeForm-pass">Пароль</label>
									</div>
									<div class="text-center">
										<button  class="btn purple-gradient btn-lg" v-on:click="checkpair">Войти</button>
										
									</div>
								</template>
								
								<template v-if="mode_login == 'code'">
									<div class="form-header purple-gradient">
										<h3 class="font-weight-500 my-2 py-1"><i class="fas fa-lock"></i> Безопасность :</h3>
									</div>
									<div class="md-form" >
										<h3 class="text-center text-white">Здравствуйте {{userName}}!</h3>
									</div>
									
									<div class="md-form" >
										<i class="fab fa-telegram prefix white-text"></i>
										<input type="number" v-model.trim="code" id="orangeForm-email" class="form-control">
										<label for="orangeForm-email">Код подтверждения</label>
									</div>
									
									<div class="text-center">
										<button  class="btn purple-gradient btn-lg" v-on:click="checkcode">Подтвердить</button>
										<hr/>
										<a href="/Example">
											<button  class="btn btn-rounded btn-white btn-lg">Примеры компонентов</button></a>
									</div>
								</template>
								<!-- Error message -->
								
							</div>
							
						</div>
						<!-- Form with header -->
					
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro Section -->

</header>
<!-- Main Navigation -->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/js/mdb.js"></script>

<!-- Custom scripts -->
<script>

	new WOW().init();
	$('#btnTopLeft').on('click', );
</script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.js" integrity="sha512-uplugzeh2/XrRr7RgSloGLHjFV0b4FqUtbT5t9Sa/XcilDr1M3+88u/c+mw6+HepH7M2C5EVmahySsyilVHI/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
	const Login = new Vue({
		el:'#loginApp',
		data:{
			login:null,
			password:null,
			code:null,
			mode_login:'password',
			userName:'Администратор'
		},
		methods:{
			checkpair(){
				const self = this
				var bodyFormData = new FormData();
				bodyFormData.append('login',this.login)
				bodyFormData.append('password',this.password)
				axios({
					method: "post",
					url: "/Login/checkpair",
					data: bodyFormData,
					headers: { "Content-Type": "multipart/form-data" },
				}).then(function (response) {
							
							if(response.data.result == 'wait for code'){
								self.mode_login = 'code'
								self.userName = response.data.name
							}
							else{
								
								toastr.error(response.data.result)
							}
						})
						
			},
			checkcode(){
				const self = this
				var bodyFormData = new FormData();
				bodyFormData.append('code',this.code)
				axios({
					method: "post",
					url: "/Login/checkcode",
					data: bodyFormData,
					headers: { "Content-Type": "multipart/form-data" },
				}).then(function (response) {
					if(response.data.result=='success'){
						window.location.href="/"
					}
					else{
						self.errors = response.data.result
						toastr.error(response.data.result)
					}
				})
			}
		}
	})
</script>
</body>

</html>
