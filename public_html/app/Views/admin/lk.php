<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Административная панель</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="css/mdb.min.css">
	<!-- Your custom styles (optional) -->
	<style>
	
	</style>
</head>

<body class="fixed-sn white-skin">
<div id="App">
<!-- Main Navigation -->
<header>
	
	<!-- Sidebar navigation -->
	<div id="slide-out" class="side-nav fixed">
		<ul class="custom-scrollbar">
			
			<!-- Logo -->
			<li class="logo-sn waves-effect py-3">
				<div class="text-center">
					<a href="/admin" class="pl-0">
						<h4 class="text-capitalize">Центр управления полётами</h4>
					</a>
				</div>
			</li>
			
			<!-- Search Form -->
			
			
			<!-- Side navigation links -->
			<li>
				<ul class="collapsible collapsible-accordion">
					<li>
						<a class="collapsible-header waves-effect" v-on:click="openCrud('Объекты')"><i
									class="w-fa fas fa-map" ></i>Отслеживаемые объекты</a>
					</li>
					<li>
						<hr/>
					</li>
					<li>
						<a  class="collapsible-header waves-effect" v-on:click="openCrudGroups('Группы')"><i
								class="w-fa fas fa-users"></i>Группы</a>
					</li>
					<li>
						<a  class="collapsible-header waves-effect"  v-on:click="openModalRoles"><i
								class="w-fa fas fa-mask"></i>Роли</a>
					</li>
					<li>
						<a  class="collapsible-header waves-effect" v-on:click="openModalRoles"><i
									class="w-fa fas fa-user"></i>Пользователи</a>
					</li>
					<li>
						<a  class="collapsible-header waves-effect"><i
									class="w-fa fas fa-lock"></i>Разрешения</a>
					</li>
					<li>
						<hr/>
					</li>
					<li>
						<a  class="collapsible-header waves-effect"><i
									class="w-fa fas fa-chart-pie"></i>Виды запросов</a>
					</li>
					
					<li>
						<hr/>
					</li>
					<li>
						<a  class="collapsible-header waves-effect"><i
								class="w-fa fas fa-scroll"></i>Лог действий</a>
					</li>
						<hr/>
					<li>
						<a  class="collapsible-header waves-effect"><i
									class="w-fa fas fa-database"></i>Управление кэшем</a>
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
			<p>Основная информация</p>
		</div>
		
		<div class="d-flex change-mode">
			
			<div class="ml-auto mb-0 mr-3 change-mode-wrapper">
				<button class="btn btn-outline-black btn-sm" id="dark-mode">Сменить тему</button>
			</div>
			
			<!-- Navbar links -->
			<ul class="nav navbar-nav nav-flex-icons ml-auto">
				
				<!-- Dropdown -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
					   aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block"><?=$name?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="/logout">Выйти</a>
						<a class="dropdown-item" onclick= "$('#newPassword').modal('show')">Настройки</a>
					</div>
				</li>
			
			</ul>
			<!-- Navbar links -->
		
		</div>
	
	</nav>
	<!-- Navbar -->
	
	<!-- Fixed button -->
	<div class="fixed-action-btn clearfix d-none d-xl-block" style="bottom: 45px; right: 24px;">
		
		<a class="btn-floating btn-lg red">
			<i class="fas fa-pencil-alt"></i>
		</a>
		<!-- Новая запись для -->
		<ul class="list-unstyled">
			<li><a class="btn-floating yellow darken-1" title="Новая группа"><i class="fas fa-users"></i></a></li>
			<li><a class="btn-floating green" title="Новая роль"><i class="fas fa-mask"></i></a></li>
			<li><a class="btn-floating blue" title="Новый пользователь" v-on:click="addUser"><i class="fas fa-user"></i></a></li>
			<li><a class="btn-floating red" title="Новый отчет"><i class="fas fa-chart-pie"></i></a></li>
		</ul>
		<!-- Новая запись для -->
	</div>
	<!-- Fixed button -->

</header>
<!-- Main Navigation -->

<!-- Main layout -->
<main style="min-height: 90vh">
	
	<div class="container-fluid">
		
		<!-- Section: Intro -->
		<section class="mt-md-4 pt-md-2 mb-5 pb-4">
			
			<!-- Grid row -->
			<div class="row">
				
				<!-- Grid column -->
				<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
					
					<!-- Card -->
					<div class="card card-cascade cascading-admin-card ">
						
						<!-- Card Data -->
						<div class="admin-up ">
							<i class="far fa-map primary-color mr-3 z-depth-2 waves-effect" v-on:click="openCrud('Объекты')"></i>
							<div class="data ">
								<p class="text-uppercase">Объекты</p>
								<h4 class="font-weight-bold dark-grey-text"><?=$ObjectsCount ?></h4>
							</div>
						</div>
					</div>
					<!-- Card -->
				
				</div>
				<!-- Grid column -->
				
				<!-- Grid column -->
				<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
					
					<!-- Card -->
					<div class="card card-cascade cascading-admin-card">
						
						<!-- Card Data -->
						<div class="admin-up">
							<i class="fas fa-users warning-color mr-3 z-depth-2 waves-effect" v-on:click="openCrudGroups('Группы')"></i>
							<div class="data">
								<p class="text-uppercase">Группы</p>
								<h4 class="font-weight-bold dark-grey-text"><?=$UserGroupsCount?></h4>
							</div>
						</div>
					
					</div>
					<!-- Card -->
				
				</div>
				<!-- Grid column -->
				
				<!-- Grid column -->
				<div class="col-xl-3 col-md-6 mb-md-0 mb-4">
					
					<!-- Card -->
					<div class="card card-cascade cascading-admin-card">
						
						<!-- Card Data -->
						<div class="admin-up">
							<i class="fas fa-mask light-blue lighten-1 mr-3 z-depth-2 waves-effect" v-on:click="openModalRoles"></i>
							<div class="data">
								<p class="text-uppercase">Роли</p>
								<h4 class="font-weight-bold dark-grey-text"><?=$RolesCount?></h4>
							</div>
						</div>
					</div>
					<!-- Card -->
				</div>
				<!-- Grid column -->
				
				<!-- Grid column -->
				<div class="col-xl-3 col-md-6 mb-0">
					
					<!-- Card -->
					<div class="card card-cascade cascading-admin-card">
						
						<!-- Card Data -->
						<div class="admin-up">
							<i class="fas fa-user red accent-2 mr-3 z-depth-2 waves-effect"></i>
							<div class="data">
								<p class="text-uppercase">Пользователи</p>
								<h4 class="font-weight-bold dark-grey-text"><?=$UserCount?></h4>
							</div>
						</div>
					</div>
					<!-- Card -->
				</div>
				<!-- Grid column -->
				<div class="col-xl-3 col-md-6 mb-md-0 mb-4">
					
					<!-- Card -->
					<div class="card card-cascade cascading-admin-card">
						
						<!-- Card Data -->
						<div class="admin-up">
							<i class="fas fa-chart-pie light-green lighten-1 mr-3 z-depth-2 waves-effect"></i>
							<div class="data">
								<p class="text-uppercase">Отчетов</p>
								<h4 class="font-weight-bold dark-grey-text"><?=$QueryCount?></h4>
							</div>
						</div>
					</div>
					<!-- Card -->
					
				</div>
				<!-- Grid column -->
				<div class="col-xl-3 col-md-6 mb-md-0 mb-4">
				
				<!-- Card -->
					<div class="card card-cascade cascading-admin-card">
					
					<!-- Card Data -->
					<div class="admin-up">
						<i class="fas fa-database purple-gradient lighten-1 mr-3 z-depth-2 waves-effect"></i>
						<div class="data">
							<p class="text-uppercase">Кэшированные</p>
							<h4 class="font-weight-bold dark-grey-text"><?=$CacheCount?></h4>
						</div>
					</div>
				</div>
				<!-- Card -->
				</div>
				<!-- Grid column -->
				<div class="col-xl-3 col-md-6 mb-md-0 mb-4">
					
					<!-- Card -->
					<div class="card card-cascade cascading-admin-card">
						
						<!-- Card Data -->
						<div class="admin-up">
							<i class="fas fa-lock dark-bg-admin lighten-1 mr-3 z-depth-2 waves-effect"></i>
							<div class="data">
								<p class="text-uppercase">Разрешения</p>
								<h4 class="font-weight-bold dark-grey-text">&nbsp;</h4>
							</div>
						</div>
					</div>
					<!-- Card -->
				</div>
			</div>
			<!-- Grid row -->
		</section>
		<!-- Section: Intro -->
		<!-- Section: Main panel -->
		<section class="mb-5">
			
			<!-- Card -->
			<div class="card card-cascade narrower">
				
				<!-- Section: Chart -->
				<section>
					
					<!-- Grid row -->
					
				
				</section>
				<!-- Section: Chart -->
				
				<!-- Section: Table -->
				<section>
					<div class="card card-cascade narrower z-depth-0">
						<div
							class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
							<div>
								<button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
										class="fas fa-th-large mt-0"></i></button>
								<button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
										class="fas fa-columns mt-0"></i></button>
							</div>
							<a href="" class="white-text mx-3">Лог действий по <?=$LogFilter?> за период с <?= $LogStart ?> по <?= $LogEnd ?></a>
							<div>
								<button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
										class="fas fa-pencil-alt mt-0"></i></button>
								<button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
										class="fas fa-eraser mt-0"></i></button>
								<button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
										class="fas fa-info-circle mt-0"></i></button>
							</div>
						</div>
						<div class="px-4">
							<div class="table-responsive">
								<table class="table table-hover mb-0">
									<thead>
									<tr>
										<th>
											&nbsp;
										</th>
										<th class="th-lg"><a>Логин<i class="fas fa-sort ml-1"></i></a></th>
										<th class="th-lg"><a>Имя<i class="fas fa-sort ml-1"></i></a></th>
										<th class="th-lg"><a>Группа<i class="fas fa-sort ml-1"></i></a></th>
										<th class="th-lg"><a>Роль<i class="fas fa-sort ml-1"></i></a></th>
										<th class="th-lg"><a>Действие<i class="fas fa-sort ml-1"></i></a></th>
										<th class="th-lg"><a>Время<i class="fas fa-sort ml-1"></i></a></th>
									</tr>
									</thead>
									<!-- Table head -->
									
									<!-- Table body -->
									<tbody>
									<?php foreach ($Logs as $log):?>
									<tr>
										<th scope="row">
											&nbsp;
										</th>
										<td><?=$log['user_login']?></td>
										<td><?=$log['user_real_name']?></td>
										<td><?=$log['group_name']?></td>
										<td><?=$log['role_name']?></td>
										<td><?=$log['action']?></td>
										<td><?= date('d-m-Y H:i:s',strtotime($log['created_at']))?></td>
									</tr>
									<?php endforeach;?>
									</tbody>
								</table>
							</div>
							<hr class="my-0">
						</div>
					</div>
				</section>
			</div>
		</section>
	</div>

</main>
<!-- Main layout -->

<!-- Footer -->
<footer class="page-footer pt-0 mt-5 rgba-stylish-light">
	
	<!-- Copyright -->
	<div class="footer-copyright py-3 text-center">
		<div class="container-fluid">
			© 2022 Copyright: <a href="/admin" >Persona Sport Digital </a>
		</div>
	</div>
</footer>
	<div class="modal fade" id="userAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	     aria-hidden="true">
		<div class="modal-dialog cascading-modal modal-avatar " role="document">
			<!-- Content -->
			<div class="modal-content">
				
				<!-- Header -->
				<div class="modal-header">
					<img src="https://i.pinimg.com/originals/d7/c3/66/d7c36686f55ef6b1bb6607fab3f8d14b.jpg" class="rounded-circle img-fluid">
				</div>
				<!-- Body -->
				<div class="modal-body text-center mb-1">
					
					<h5 class="mt-1 mb-2">{{User.info.name}}</h5>
					<template v-if="User.info.name == null">
						<div class="md-form ml-0 mr-0">
							<input type="text"  v-model="User.info.sid" id="form1" class="form-control ml-0">
							<label for="form1" class="ml-0" >1c ID Сотрудника</label>
						</div>
						
						<div class="text-center mt-4">
							<button class="btn btn-cyan mt-1" v-on:click="getUserName()">Найти <i class="fas fa-sign-in-alt ml-1"></i></button>
						</div>
					</template>
					<template v-if="User.info.group == null && User.info.name !== null">
						<div class="md-form ml-0 mr-0">
							<p  class="ml-0" >Укажите группу сотрудника</p>
							<select type="select"   v-model="UserGroup"  id="form1" class="form-control ml-0">
								
								<option v-for="group in GroupsList" :value="group.group_id">{{group.group_name}}</option>
							</select>
						</div>

					</template>
					<template v-if="User.info.group == !null && User.info.name !== null && User.info.object == null">
						<div class="md-form ml-0 mr-0">
							
							<p  class="ml-0" >Укажите объект пользователя</p>
							<select type="select"   v-model="User.info.object"  id="form1" class="form-control ml-0">
								<option v-for="obj in ObjectList" :value="obj.object_id">{{obj.object_name}}</option>
							</select>
						</div>

					</template>
					
					<template v-if="UserGroup == !null && User.info.name !== null && User.info.object == !null && User.info.role == null">
						<div class="md-form ml-0 mr-0">
							<p  class="ml-0" >Укажите роль пользователя</p>
							<select type="select"  v-model="User.info.role"  id="form1" class="form-control ml-0">
								<option v-for="role in RolesList" :value="role.role_id">{{role.role_name}}</option>
							</select>
						</div>
					</template>
					
					<template v-if="UserGroup == !null && User.info.name !== null && User.info.object !== null && User.info.role !==null">
						<div class="md-form ml-0 mr-0">
							<input type="text"  v-model.trim="User.info.login" id="form1" class="form-control ml-0">
							<label for="form1" class="ml-0" >Логин сотрудника</label>
						</div>
						<div class="md-form ml-0 mr-0">
							<input type="text"  v-model.trim="User.info.password" id="form1" class="form-control ml-0">
							<label for="form1" class="ml-0" >Временный пароль</label>
						</div>
						<div class="text-center mt-4">
							<button class="btn btn-cyan mt-1" v-on:click="CreateUser()">Создать пользователя <i class="fas fa-sign-in-alt ml-1"></i></button>
						</div>
					</template>
				</div>
			
			</div>
			<!-- Content -->
		</div>
	</div>
	<div class="modal fade" id="CRUD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	     aria-hidden="true">
		<div class="modal-dialog cascading-modal modal-lg" role="document">
			<!-- Content -->
			<div class="modal-content">
				
				<!-- Header -->
				<div class="modal-header mt-1 text-center">
					<h5 class="mt-1 mb-2 text-center">{{CRUD.Modal.name}}</h5>
					<div class="ml-auto">
						<template v-if="CRUD.ActiveEl.index == null">
						<button type="button" class="btn btn-success btn-rounded  btn-sm px-2" v-on:click="newObject()" title="Добавить объект">
							&nbsp;<i class="fas fa-plus mt-0" ></i>&nbsp;
						</button>
						</template>
						<template v-else>
							<button type="button" class="btn btn-success  btn-rounded  btn-sm px-2" disabled title="Добавить объект">
								&nbsp;<i class="fas fa-plus mt-0" ></i>&nbsp;
							</button>
						</template>
					</div>
				</div>
				<!-- Body -->
				<div class="modal-body text-center mb-1">
					
					
					<template v-if="CRUD.Modal.name == 'Объекты'">
						<div class="md-form ml-0 mr-0">
							<table class="table table-bordered table-striped table-primary">
								<thead class="text-center">
									<th>№</th>
									<th>Название</th>
									<th>Действия</th>
								</thead>
								<tbody>
									<tr v-for="(item, index) in CRUD.List">
											<td class="center" v-text="index+1"></td>
										<template v-if="index !== CRUD.ActiveEl.index">
											<td v-text="item.object_name"></td>
										<template v-if="CRUD.ActiveEl.index == null">
											<td>
												<button type="button" class="btn btn-outline-dark-green btn-rounded btn-sm px-2" v-on:click="editObject(index)" title="Редактировать">
													<i class="fas fa-pencil-alt mt-0" ></i>
												</button>
												<button type="button" class="btn btn-outline-danger btn-rounded btn-sm px-2" v-on:click="deleteObject(index)" title="Удалить объект">
													<i	class="fas fa-eraser mt-0"></i>
												</button>
											</td>
										</template>
										<template v-else>
											<td>
												<button type="button" class="btn btn-outline-dark-green btn-rounded btn-sm px-2" disabled  title="Редактировать">
													<i class="fas fa-pencil-alt mt-0" ></i>
												</button>
												<button type="button" class="btn btn-outline-danger btn-rounded btn-sm px-2" disabled title="Удалить объект">
													<i	class="fas fa-eraser mt-0"></i>
												</button>
											</td>
										</template>
										</template>
										<template v-else>
											<td>
												<input type="text" class="form-control" v-model="CRUD.ActiveEl.object_name" placeholder="Назовите объект"/>
											</td>
											<td>
												<button v-if="CRUD.ActiveEl.object_name!==null && CRUD.ActiveEl.object_name!==''" v-on:click="saveObject(index)" type="button" class="btn btn-success btn-rounded btn-sm px-2"  title="Сохранить">
													<i class="fas fa-save mt-0" ></i>
												</button>
												<button v-else type="button" class="btn btn-success btn-rounded btn-sm px-2" disabled title="Сохранить">
													<i class="fas fa-save mt-0" ></i>
												</button>
												<button v-if="CRUD.ActiveEl.object_name!==null && CRUD.ActiveEl.object_name!==''" type="button" class="btn btn-black btn-rounded btn-sm px-2" v-on:click="cancelEdit()" title="Отменить">
													<i	class="fas fa-chevron-left mt-0"></i>
												</button>
												<button v-else type="button" class="btn btn-black btn-rounded btn-sm px-2" disabled title="Отменить">
													<i	class="fas fa-chevron-left mt-0"></i>
												</button>
											</td>
										</template>
									</tr>
								</tbody>
								
							</table>
						</div>
						
						<div class="text-center mt-4">
							<button class="btn btn-cyan mt-1" v-on:click="closeModalCRUD()">Закрыть</button>
						</div>
					</template>
					
				</div>
			
			</div>
			<!-- Content -->
		</div>
	</div>
	<div class="modal fade" id="CRUDGroups" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	     aria-hidden="true">
		<div class="modal-dialog cascading-modal modal-lg" role="document">
			<!-- Content -->
			<div class="modal-content">
				
				<!-- Header -->
				<div class="modal-header mt-1 text-center">
					<h5 class="mt-1 mb-2 text-center">{{CRUDGroups.Modal.name}}</h5>
					<div class="ml-auto">
						<template v-if="CRUDGroups.ActiveEl.index == null">
							<button type="button" class="btn btn-success btn-rounded  btn-sm px-2" v-on:click="newObjectGroups()" title="Добавить группу">
								&nbsp;<i class="fas fa-plus mt-0" ></i>&nbsp;
							</button>
						</template>
						<template v-else>
							<button type="button" class="btn btn-success  btn-rounded  btn-sm px-2" disabled title="Добавить группу">
								&nbsp;<i class="fas fa-plus mt-0" ></i>&nbsp;
							</button>
						</template>
					</div>
				</div>
				<!-- Body -->
				<div class="modal-body text-center mb-1">
					<template >
						<div class="md-form ml-0 mr-0">
							<table class="table table-bordered table-striped table-warning">
								<thead class="text-center">
								<th>№</th>
								<th>Группа</th>
								<th>Действия</th>
								</thead>
								<tbody>
								<tr v-for="(item, index) in CRUDGroups.List">
									<td class="center" v-text="index+1"></td>
									<template v-if="index !== CRUDGroups.ActiveEl.index">
										<td v-text="item.group_name"></td>
										<template v-if="CRUDGroups.ActiveEl.index == null">
											<td>
												<button type="button" class="btn btn-outline-dark-green btn-rounded btn-sm px-2" v-on:click="editObjectGroups(index)" title="Редактировать">
													<i class="fas fa-pencil-alt mt-0" ></i>
												</button>
												<button type="button" class="btn btn-outline-danger btn-rounded btn-sm px-2" v-on:click="deleteObjectGroups(index)" title="Удалить группу">
													<i	class="fas fa-eraser mt-0"></i>
												</button>
											</td>
										</template>
										<template v-else>
											<td>
												<button type="button" class="btn btn-outline-dark-green btn-rounded btn-sm px-2" disabled  title="Редактировать">
													<i class="fas fa-pencil-alt mt-0" ></i>
												</button>
												<button type="button" class="btn btn-outline-danger btn-rounded btn-sm px-2" disabled title="Удалить группу">
													<i	class="fas fa-eraser mt-0"></i>
												</button>
											</td>
										</template>
									</template>
									<template v-else>
										<td>
											<input type="text" class="form-control" v-model="CRUDGroups.ActiveEl.group_name" placeholder="Назовите группу"/>
										</td>
										<td>
											<button v-if="CRUDGroups.ActiveEl.group_name!==null && CRUDGroups.ActiveEl.group_name!==''" v-on:click="saveObjectGroups(index)" type="button" class="btn btn-success btn-rounded btn-sm px-2"  title="Сохранить">
												<i class="fas fa-save mt-0" ></i>
											</button>
											<button v-else type="button" class="btn btn-success btn-rounded btn-sm px-2" disabled title="Сохранить">
												<i class="fas fa-save mt-0" ></i>
											</button>
											<button v-if="CRUDGroups.ActiveEl.group_name!==null && CRUDGroups.ActiveEl.group_name!==''" type="button" class="btn btn-black btn-rounded btn-sm px-2" v-on:click="cancelEditGroups()" title="Отменить">
												<i	class="fas fa-chevron-left mt-0"></i>
											</button>
											<button v-else type="button" class="btn btn-black btn-rounded btn-sm px-2" disabled title="Отменить">
												<i	class="fas fa-chevron-left mt-0"></i>
											</button>
										</td>
									</template>
								</tr>
								</tbody>
							
							</table>
						</div>
						
						<div class="text-center mt-4">
							<button class="btn btn-cyan mt-1" v-on:click="closeModalCRUDGroups()">Закрыть</button>
						</div>
					</template>
				
				</div>
			
			</div>
			<!-- Content -->
		</div>
	</div>
	<div class="modal fade" id="newPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	     aria-hidden="true">
		<div class="modal-dialog cascading-modal modal-avatar " role="document">
			<!-- Content -->
			<div class="modal-content">
				
				<!-- Header -->
				<div class="modal-header">
					<img src="https://i.pinimg.com/originals/d7/c3/66/d7c36686f55ef6b1bb6607fab3f8d14b.jpg" class="rounded-circle img-fluid">
				</div>
				<!-- Body -->
				<div class="modal-body text-center mb-1">
					<h5 class="mt-1 mb-2">Изменить пароль</h5>
						<div class="bg-danger" role="alert">{{newPasswordErrors}}</div>
						<div class="md-form ml-0 mr-0">
							<input type="password"  v-model.trim="newPassword" id="form1" class="form-control ml-0">
							<label for="form1" class="ml-0" >Придумайте новый пароль</label>
						</div>
						<div class="md-form ml-0 mr-0">
							<input type="password"  v-model.trim="newPasswordConfirm" id="form2" class="form-control ml-0">
							<label for="form2" class="ml-0" >Новый пароль еще раз </label>
						</div>
						<div class="text-center mt-4">
							<button class="btn btn-cyan mt-1" v-on:click="setNewPassword()">Поменять <i class="fas fa-sign-in-alt ml-1"></i></button>
						</div>
				</div>
			
			</div>
			<!-- Content -->
		</div>
	</div>
	<div class="modal fade" id="RolesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	     aria-hidden="true">
		<div class="modal-dialog cascading-modal modal-lg" role="document">
			<!-- Content -->
			<div class="modal-content">
				
				<!-- Header -->
				<div class="modal-header mt-1 text-center">
					<h5 class="mt-1 mb-2 text-center">Роли</h5>
					<div class="ml-auto">
						<button v-if="ActiveGroupIndex!==null" class="btn btn-outline-deep-purple btn-sm btn-rounded" v-on:click="addRole">Добавить роль в  {{CRUDGroups.List[ActiveGroupIndex].group_name}}</button>
					</div>
				</div>
				<!-- Body -->
				<div class="modal-body text-center mb-1">
					<div class = "row">
						<div class="col-6">
							<div class="col-12 shadow-sm" v-for="(item,index) in CRUDGroups.List" v-on:click="setActiveGroup(index)">
								<p class=" text-info" v-if="ActiveGroupIndex == index">{{item.group_name}}
									</p>
								<p v-else style="cursor: pointer">{{item.group_name}}</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row justify-content-between">
								<div class="col-12" v-for="(item,index) in Roles.List">
									<p class="text-info" v-if="ActiveRoleIndex == index">{{item.role_name}}
										<span>
									<button type="button" class="btn btn-outline-dark-green btn-rounded btn-sm px-2" v-on:click="editRole()" title="Редактировать">
										<i class="fas fa-pencil-alt mt-0" ></i>
									</button>
									<button type="button" class="btn btn-outline-danger btn-rounded btn-sm px-2" v-on:click="deleteRole()" title="Удалить роль">
										<i	class="fas fa-eraser mt-0"></i>
									</button>
									</span>
									</p>
									<p class="text-dark" style="cursor: pointer" v-else v-on:click="setActiveRole(index)">{{item.role_name}}</p>
								</div>
								
							</div>
						</div>
					</div>
						<div class="text-center mt-4">
							<button class="btn btn-cyan mt-1" onclick="$('#RolesModal').modal('hide')">Закрыть</button>
						</div>
					
				
				</div>
			
			</div>
			<!-- Content -->
		</div>
	</div>
</div>
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
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.js" integrity="sha512-uplugzeh2/XrRr7RgSloGLHjFV0b4FqUtbT5t9Sa/XcilDr1M3+88u/c+mw6+HepH7M2C5EVmahySsyilVHI/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
	const App = new Vue({
		el:'#App',
		data:{
			ActiveRoleIndex:null,
			ActiveGroupIndex:null,
			newPassword:null,
			newPasswordConfirm:null,
			newPasswordErrors:null,
			UserSID:null,
			UserGroup:null,
			User:{
				
				info:{
					sid:null,
					name:null,
					group:null,
					object:null,
					login:null,
					password:null,
					role:null
				}
			},
			GroupsList:null,
			addUserID:null,
			ObjectList:null,
			RolesList:null,
			CRUD:{
				Modal:{
					name:'Crud Operations',
					content:[]
				},
				List:[],
				ActiveEl:{
					index:null,
					object_name:null,
					group_name:null,
					role_name:null
				}
			},
			CRUDGroups:{
				Modal:{
					name:'Группы пользователей',
					content:[]
				},
				List:[],
				ActiveEl:{
					index:null,
					object_name:null,
					group_name:null,
					role_name:null
				}
			},
			Roles:{
				List:[]
			}
		},
		methods:{
			deleteRole(){
				const self = this
			 
				if(confirm('Вы действительно хотите удалить '+this.Roles.List[this.ActiveRoleIndex].role_name)){
					axios.get('/admin/deleteRole?group='+this.ActiveGroupIndex+'&id='+this.Roles.List[this.ActiveRoleIndex].role_id ).then(
							res=>{
								self.Roles.List = res.data
							}
					)
			
				}
			},
			editRole(){
				const self = this
				let newName = prompt('Новое название для роли:',this.Roles.List[this.ActiveRoleIndex].role_name)
				if (typeof newName!==false && newName.length > 0 ){
					axios.get('/admin/editRole?group='+this.ActiveGroupIndex+'&name='+newName+'&id='+this.Roles.List[this.ActiveRoleIndex].role_id ).then(
							res=>{
								self.Roles.List = res.data
							}
					)
					
				}
			},
			addRole(){
				const self = this
				let newName = prompt('Название для новой роли:')
				if (typeof newName!==false && newName.length > 0 ){
					axios.get('/admin/addRole?group='+this.ActiveGroupIndex+'&name='+newName).then(
							res=>{
								self.Roles.List = res.data
							}
					)

				}
			},
			setActiveRole(index){
				this.ActiveRoleIndex = index
			},
			setActiveGroup(index){
				const self = this
				this.ActiveGroupIndex = index
				this.ActiveRoleIndex = null
				axios.get('/admin/getRolesByGroupID?id='+this.CRUDGroups.List[index].group_id).then(
						res=>{
							self.Roles.List = res.data
						}
				)
			},
			setNewPassword(){
			 var len = this.newPassword.length
			 var lencon = this.newPasswordConfirm.length
				if(len == lencon && len > 3){
					this.newPasswordErrors = null
					axios.get('/login/newPassword?pass='+this.newPassword).then(
							$('#newPassword').modal('hide')
					)
				}
				else{
					if(len < 3){
						this.newPasswordErrors = 'Длина пароль должна быть более 3х символов'
					}
					if(len !== lencon){
						this.newPasswordErrors = 'Пароли не совпадают'
					}
				}
			},
			
			deleteObject(index){
				const self = this
				let coun = this.CRUD.List.length
				for (let i = 0; i < coun; i++){
					if(i == index ){
						let choise  = confirm('Вы уверены что хотите удалить объект '+self.CRUD.List[i].object_name+'?')
						if(choise){
							axios.get('admin/delete?id='+self.CRUD.List[i].object_id+'&table=objects').then(res=>{
								this.getCrudLict('objects')
							})
						}
					}
				}
				
			},
			cancelEdit(){
				this.CRUD.ActiveEl.index = null
				this.CRUD.ActiveEl.object_name = null
				this.CRUD.ActiveEl.group_name = null
				this.CRUD.ActiveEl.role_name = null
			},
			editObject(index){
				const self = this
				this.CRUD.ActiveEl.index = index
				let coun = this.CRUD.List.length
				for (let i = 0; i < coun; i++){
					if(i == index ){
						self.CRUD.ActiveEl.object_name = self.CRUD.List[i].object_name
					}
				}
				
			},
			setActiveElObject(index){
				this.CRUD.ActiveEl.index = index
			},
			newObject(){
				if(this.CRUD.Modal.name == 'Объекты'){
					this.CRUD.List.push({object_id:'new',object_name:''})
					let index = this.CRUD.List.length
					this.setActiveElObject(index-1)
				}
			},
			getCrudLict(uri){
				const self = this
				axios.get('/admin/list?list='+uri).then(res=>{
					self.CRUD.List = res.data.response
				})
			},
			openCrud(mode){
				this.CRUD.Modal.name = mode
				if(mode=='Объекты'){
				 this.getCrudLict('objects')
				}
				$('#CRUD').modal('show')
			},
			saveObject(index){
				if(this.CRUD.List[index].object_id == 'new'){
					axios.get('/admin/createObject?name='+this.CRUD.ActiveEl.object_name+'&table=objects')
				}
				else{
					axios.get('/admin/updateObject?name='+this.CRUD.ActiveEl.object_name+'&table=objects&id='+this.CRUD.List[index].object_id)
				}
				this.CRUD.ActiveEl.index = null
				this.CRUD.ActiveEl.object_name = null
				this.CRUD.ActiveEl.group_name = null
				this.CRUD.ActiveEl.role_name = null
				this.getCrudLict('objects')
			},
			openModal(name){
				$('#'+name).modal('show')
			},
			closeModal(name){
				$('#'+name).modal('hide')
			},
			closeModalCRUD(){
				let cou = this.CRUD.List.length
				const self = this
				for(let i = 0; i < cou; i++){
					if(this.CRUD.List[i].object_id == 'new'){
						self.CRUD.List.slice(i,1);
					}
				}
				this.CRUD.ActiveEl={index:null,object_name:null,group_name:null,role_name:null}
				$('#CRUD').modal('hide')
			},
			// Groups
			
			
			
			
			deleteObjectGroups(index){
				const self = this
				let coun = this.CRUDGroups.List.length
				for (let i = 0; i < coun; i++){
					if(i == index ){
						let choise  = confirm('Вы уверены что хотите удалить объект '+self.CRUDGroups.List[i].group_name+'?')
						if(choise){
							axios.get('admin/delete?id='+self.CRUDGroups.List[i].group_id+'&table=usergroups').then(res=>{
								this.getCrudLictGroups('groups')
							})
						}
					}
				}
				
			},
			cancelEditGroups(){
				this.CRUDGroups.ActiveEl.index = null
				this.CRUDGroups.ActiveEl.object_name = null
				this.CRUDGroups.ActiveEl.group_name = null
				this.CRUDGroups.ActiveEl.role_name = null
			},
			editObjectGroups(index){
				const self = this
				this.CRUDGroups.ActiveEl.index = index
				let coun = this.CRUDGroups.List.length
				for (let i = 0; i < coun; i++){
					if(i == index ){
						self.CRUDGroups.ActiveEl.group_name = self.CRUDGroups.List[i].group_name
					}
				}
				
			},
			setActiveElObjectGroups(index){
				this.CRUDGroups.ActiveEl.index = index
			},
			newObjectGroups(){
					this.CRUDGroups.List.push({object_id:'new',object_name:''})
					let index = this.CRUDGroups.List.length
					this.setActiveElObjectGroups(index-1)
			},
			getCrudLictGroups(uri){
				const self = this
				axios.get('/admin/list?list='+uri).then(res=>{
					self.CRUDGroups.List = res.data.response
				})
			},
			openCrudGroups(mode){
				this.CRUDGroups.Modal.name = mode
				
					this.getCrudLictGroups('groups')
				
				$('#CRUDGroups').modal('show')
			},
			saveObjectGroups(index){
				if(this.CRUDGroups.List[index].object_id == 'new'){
					axios.get('/admin/createObject?name='+this.CRUDGroups.ActiveEl.group_name+'&table=usergroups').then(
							this.getCrudLictGroups('groups')
					)
				}
				else{
					axios.get('/admin/updateObject?name='+this.CRUDGroups.ActiveEl.group_name+'&table=usergroups&id='+this.CRUDGroups.List[index].group_id).then(
							this.getCrudLictGroups('groups')
					)
				}
				this.CRUDGroups.ActiveEl.index = null
				this.CRUDGroups.ActiveEl.object_name = null
				this.CRUDGroups.ActiveEl.group_name = null
				this.CRUDGroups.ActiveEl.role_name = null
				this.getCrudLictGroups('groups')
			},
			closeModalCRUDGroups(){
				let cou = this.CRUDGroups.List.length
				const self = this
				for(let i = 0; i < cou; i++){
					if(this.CRUDGroups.List[i].group_id == 'new'){
						self.CRUDGroups.List.slice(i,1);
					}
				}
				this.CRUDGroups.ActiveEl={index:null,object_name:null,group_name:null,role_name:null}
				$('#CRUDGroups').modal('hide')
			},
			// Roles
			openModalRoles(){
				const self = this
				axios.get('/admin/list?list=groups').then(res=>{
					self.CRUDGroups.List = res.data.response
				})
				$('#RolesModal').modal('show')
			},
			deleteObjectRoles(index){
				const self = this
				let coun = this.CRUD.List.length
				for (let i = 0; i < coun; i++){
					if(i == index ){
						let choise  = confirm('Вы уверены что хотите удалить объект '+self.CRUD.List[i].object_name+'?')
						if(choise){
							axios.get('admin/delete?id='+self.CRUD.List[i].object_id+'&table=objects').then(res=>{
								this.getCrudLict('objects')
							})
						}
					}
				}
				
			},
			cancelEditRoles(){
				this.CRUD.ActiveEl.index = null
				this.CRUD.ActiveEl.object_name = null
				this.CRUD.ActiveEl.group_name = null
				this.CRUD.ActiveEl.role_name = null
			},
			editObjectRoles(index){
				const self = this
				this.CRUD.ActiveEl.index = index
				let coun = this.CRUD.List.length
				for (let i = 0; i < coun; i++){
					if(i == index ){
						self.CRUD.ActiveEl.object_name = self.CRUD.List[i].object_name
					}
				}
				
			},
			setActiveElObjectRoles(index){
				this.CRUD.ActiveEl.index = index
			},
			newObjectRoles(){
				if(this.CRUD.Modal.name == 'Объекты'){
					this.CRUD.List.push({object_id:'new',object_name:''})
					let index = this.CRUD.List.length
					this.setActiveElObject(index-1)
				}
			},
			getCrudLictRoles(uri){
				const self = this
				axios.get('/admin/list?list='+uri).then(res=>{
					self.CRUD.List = res.data.response
				})
			},
			openCrudRoles(mode){
				this.CRUD.Modal.name = mode
				if(mode=='Объекты'){
					this.getCrudLict('objects')
				}
				$('#CRUD').modal('show')
			},
			saveObjectRoles(index){
				if(this.CRUD.List[index].object_id == 'new'){
					axios.get('/admin/createObject?name='+this.CRUD.ActiveEl.object_name+'&table=objects')
				}
				else{
					axios.get('/admin/updateObject?name='+this.CRUD.ActiveEl.object_name+'&table=objects&id='+this.CRUD.List[index].object_id)
				}
				this.CRUD.ActiveEl.index = null
				this.CRUD.ActiveEl.object_name = null
				this.CRUD.ActiveEl.group_name = null
				this.CRUD.ActiveEl.role_name = null
				this.getCrudLict('objects')
			},
			closeModalCRUDRoles(){
				let cou = this.CRUD.List.length
				const self = this
				for(let i = 0; i < cou; i++){
					if(this.CRUD.List[i].object_id == 'new'){
						self.CRUD.List.slice(i,1);
					}
				}
				this.CRUD.ActiveEl={index:null,object_name:null,group_name:null,role_name:null}
				$('#CRUD').modal('hide')
			},
			// Users
			deleteObjectUsers(index){
				const self = this
				let coun = this.CRUD.List.length
				for (let i = 0; i < coun; i++){
					if(i == index ){
						let choise  = confirm('Вы уверены что хотите удалить объект '+self.CRUD.List[i].object_name+'?')
						if(choise){
							axios.get('admin/delete?id='+self.CRUD.List[i].object_id+'&table=objects').then(res=>{
								this.getCrudLict('objects')
							})
						}
					}
				}
				
			},
			cancelEditUsers(){
				this.CRUD.ActiveEl.index = null
				this.CRUD.ActiveEl.object_name = null
				this.CRUD.ActiveEl.group_name = null
				this.CRUD.ActiveEl.role_name = null
			},
			editObjectUsers(index){
				const self = this
				this.CRUD.ActiveEl.index = index
				let coun = this.CRUD.List.length
				for (let i = 0; i < coun; i++){
					if(i == index ){
						self.CRUD.ActiveEl.object_name = self.CRUD.List[i].object_name
					}
				}
				
			},
			setActiveElObjectUsers(index){
				this.CRUD.ActiveEl.index = index
			},
			newObjectUsers(){
				if(this.CRUD.Modal.name == 'Объекты'){
					this.CRUD.List.push({object_id:'new',object_name:''})
					let index = this.CRUD.List.length
					this.setActiveElObject(index-1)
				}
			},
			getCrudLictUsers(uri){
				const self = this
				axios.get('/admin/list?list='+uri).then(res=>{
					self.CRUD.List = res.data.response
				})
			},
			openCrudUsers(mode){
				this.CRUD.Modal.name = mode
				if(mode=='Объекты'){
					this.getCrudLict('objects')
				}
				$('#CRUD').modal('show')
			},
			saveObjectUsers(index){
				if(this.CRUD.List[index].object_id == 'new'){
					axios.get('/admin/createObject?name='+this.CRUD.ActiveEl.object_name+'&table=objects')
				}
				else{
					axios.get('/admin/updateObject?name='+this.CRUD.ActiveEl.object_name+'&table=objects&id='+this.CRUD.List[index].object_id)
				}
				this.CRUD.ActiveEl.index = null
				this.CRUD.ActiveEl.object_name = null
				this.CRUD.ActiveEl.group_name = null
				this.CRUD.ActiveEl.role_name = null
				this.getCrudLict('objects')
			},
			closeModalCRUDUsers(){
				let cou = this.CRUD.List.length
				const self = this
				for(let i = 0; i < cou; i++){
					if(this.CRUD.List[i].object_id == 'new'){
						self.CRUD.List.slice(i,1);
					}
				}
				this.CRUD.ActiveEl={index:null,object_name:null,group_name:null,role_name:null}
				$('#CRUD').modal('hide')
			},
			//Reports
			deleteObjectReports(index){
				const self = this
				let coun = this.CRUD.List.length
				for (let i = 0; i < coun; i++){
					if(i == index ){
						let choise  = confirm('Вы уверены что хотите удалить объект '+self.CRUD.List[i].object_name+'?')
						if(choise){
							axios.get('admin/delete?id='+self.CRUD.List[i].object_id+'&table=objects').then(res=>{
								this.getCrudLict('objects')
							})
						}
					}
				}
				
			},
			cancelEditReports(){
				this.CRUD.ActiveEl.index = null
				this.CRUD.ActiveEl.object_name = null
				this.CRUD.ActiveEl.group_name = null
				this.CRUD.ActiveEl.role_name = null
			},
			editObjectReports(index){
				const self = this
				this.CRUD.ActiveEl.index = index
				let coun = this.CRUD.List.length
				for (let i = 0; i < coun; i++){
					if(i == index ){
						self.CRUD.ActiveEl.object_name = self.CRUD.List[i].object_name
					}
				}
				
			},
			setActiveElObjectReports(index){
				this.CRUD.ActiveEl.index = index
			},
			newObjectReports(){
				if(this.CRUD.Modal.name == 'Объекты'){
					this.CRUD.List.push({object_id:'new',object_name:''})
					let index = this.CRUD.List.length
					this.setActiveElObject(index-1)
				}
			},
			getCrudLictReports(uri){
				const self = this
				axios.get('/admin/list?list='+uri).then(res=>{
					self.CRUD.List = res.data.response
				})
			},
			openCrudReports(mode){
				this.CRUD.Modal.name = mode
				if(mode=='Объекты'){
					this.getCrudLict('objects')
				}
				$('#CRUD').modal('show')
			},
			saveObjectReports(index){
				if(this.CRUD.List[index].object_id == 'new'){
					axios.get('/admin/createObject?name='+this.CRUD.ActiveEl.object_name+'&table=objects')
				}
				else{
					axios.get('/admin/updateObject?name='+this.CRUD.ActiveEl.object_name+'&table=objects&id='+this.CRUD.List[index].object_id)
				}
				this.CRUD.ActiveEl.index = null
				this.CRUD.ActiveEl.object_name = null
				this.CRUD.ActiveEl.group_name = null
				this.CRUD.ActiveEl.role_name = null
				this.getCrudLict('objects')
			},
			closeModalCRUDReports(){
				let cou = this.CRUD.List.length
				const self = this
				for(let i = 0; i < cou; i++){
					if(this.CRUD.List[i].object_id == 'new'){
						self.CRUD.List.slice(i,1);
					}
				}
				this.CRUD.ActiveEl={index:null,object_name:null,group_name:null,role_name:null}
				$('#CRUD').modal('hide')
			},
			//Permissions
			deleteObjectPermissions(index){
				const self = this
				let coun = this.CRUD.List.length
				for (let i = 0; i < coun; i++){
					if(i == index ){
						let choise  = confirm('Вы уверены что хотите удалить объект '+self.CRUD.List[i].object_name+'?')
						if(choise){
							axios.get('admin/delete?id='+self.CRUD.List[i].object_id+'&table=objects').then(res=>{
								this.getCrudLict('objects')
							})
						}
					}
				}
				
			},
			cancelEditPermissions(){
				this.CRUD.ActiveEl.index = null
				this.CRUD.ActiveEl.object_name = null
				this.CRUD.ActiveEl.group_name = null
				this.CRUD.ActiveEl.role_name = null
			},
			editObjectPermissionss(index){
				const self = this
				this.CRUD.ActiveEl.index = index
				let coun = this.CRUD.List.length
				for (let i = 0; i < coun; i++){
					if(i == index ){
						self.CRUD.ActiveEl.object_name = self.CRUD.List[i].object_name
					}
				}
				
			},
			setActiveElObjectPermissions(index){
				this.CRUD.ActiveEl.index = index
			},
			newObjectPermissions(){
				if(this.CRUD.Modal.name == 'Объекты'){
					this.CRUD.List.push({object_id:'new',object_name:''})
					let index = this.CRUD.List.length
					this.setActiveElObject(index-1)
				}
			},
			getCrudLictPermissions(uri){
				const self = this
				axios.get('/admin/list?list='+uri).then(res=>{
					self.CRUD.List = res.data.response
				})
			},
			openCrudPermissions(mode){
				this.CRUD.Modal.name = mode
				if(mode=='Объекты'){
					this.getCrudLict('objects')
				}
				$('#CRUD').modal('show')
			},
			saveObjectPermissions(index){
				if(this.CRUD.List[index].object_id == 'new'){
					axios.get('/admin/createObject?name='+this.CRUD.ActiveEl.object_name+'&table=objects')
				}
				else{
					axios.get('/admin/updateObject?name='+this.CRUD.ActiveEl.object_name+'&table=objects&id='+this.CRUD.List[index].object_id)
				}
				this.CRUD.ActiveEl.index = null
				this.CRUD.ActiveEl.object_name = null
				this.CRUD.ActiveEl.group_name = null
				this.CRUD.ActiveEl.role_name = null
				this.getCrudLict('objects')
			},
			closeModalCRUDPermissions(){
				let cou = this.CRUD.List.length
				const self = this
				for(let i = 0; i < cou; i++){
					if(this.CRUD.List[i].object_id == 'new'){
						self.CRUD.List.slice(i,1);
					}
				}
				this.CRUD.ActiveEl={index:null,object_name:null,group_name:null,role_name:null}
				$('#CRUD').modal('hide')
			},
			// CACHE
			
			
			//New User
			addUser(){
				this.openModal('userAdd')
				
			},
			getUserName(){
				axios.get('admin/addUser?id='+this.User.info.sid).then(res=>{
					this.User.info.name = res.data.name
				})
				axios.get('admin/getGroups').then(res=>{
					this.GroupsList = res.data.response
				})
				axios.get('admin/getObjects').then(res=>{
					this.ObjectList = res.data.response
				})
			},
			setUserGroup(){
				axios.get('admin/getAvaluableRoles?group_id='+this.UserGroup).then(res=>{
					this.RolesList = res.data.response
				})
				this.User.info.group = this.UserGroup
			},
			CreateUser(){
				const self = this
				axios.get('admin/createUser?info='+JSON.stringify(this.User.info)).then(res=>{
					self.closeModal('userAdd')
				})
			}
			
		},
		watch: {
			UserGroup(){
			this.setUserGroup()
		}
		}
	});
</script>



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

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})

</script>

<!-- Charts -->
<script>
	// Small chart
	$(function () {
		$('.min-chart#chart-sales').easyPieChart({
			barColor: "#FF5252",
			onStep: function (from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});
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

