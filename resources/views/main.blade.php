<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
		<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<title>BG</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg bg-transparent text-white fixed-top">
			<div class="container col-1"></div>
			<div class="container d-xl-block d-none col-1"></div>
			<div class="container d-xxl-block d-none col-1"></div>
			<div class="container nav-item d-lg-flex d-none justify-content-center nav-a lines-a active" data-scroll-target="0">
				BuyGift
			</div>
			<div class="container nav-item d-lg-flex d-none justify-content-center nav-a lines-a" data-scroll-target="1">
				распродажи
			</div>
			<div class="container nav-item d-lg-flex d-none justify-content-center nav-a" id="logo" data-scroll-target="0">
				<svg width="40" height="40">
					<line
						x1="0" y1="20" x2="24" y2="20"
						stroke=#AEAEAE stroke-width="5" stroke-linecap="round"
					/>
					<line class="vertical-line"
						x1="25" y1="15" x2="25" y2="25"
						stroke=#AEAEAE stroke-width="5" stroke-linecap="round"
					/>
				</svg>
				<div>BG</div>
				<svg width="40" height="40">
					<line
						x1="40" y1="20" x2="16" y2="20"
						stroke=#AEAEAE stroke-width="5" stroke-linecap="round"
					/>
					<line class="vertical-line"
						x1="15" y1="15" x2="15" y2="25"
						stroke=#AEAEAE stroke-width="5" stroke-linecap="round"
					/>
				</svg>
			</div>
			<div class="container nav-item d-lg-flex d-none justify-content-center nav-a lines-a" data-scroll-target="2">
				ключи
			</div>
			<div class="container nav-item d-lg-flex d-none justify-content-center nav-a lines-a" data-scroll-target="3">
				отзывы
			</div>
			<div class="container d-lg-block d-none col-1"></div>
			<div class="container nav-item d-lg-flex d-none col-2 justify-content-center">
				@if(Auth::check())
					<a href="profile">
					<button class="nav-btn" id="top-btn" data-scroll-target="0">Перейти в профиль</button>
					</a>
				@else
					<button class="nav-btn" id="top-btn" data-scroll-target="4">Воспользоваться</button>
				@endif
			</div>
			
			<button class="d-lg-none d-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" id="menu-btn">
				<svg width="30" height="30">
					<line id="mb-line1"
						x1="5" y1="9" x2="25" y2="9"
						stroke="white" stroke-width="3" stroke-linecap="round"
					/>
					<line id="mb-line2"
						x1="5" y1="15" x2="25" y2="15"
						stroke="white" stroke-width="3" stroke-linecap="round"
					/>
					<line id="mb-line3"
						x1="5" y1="21" x2="25" y2="21"
						stroke="white" stroke-width="3" stroke-linecap="round"
					/>
				</svg>
			</button>
			<div class="offcanvas offcanvas-top d-lg-none d-flex" data-bs-scroll="true" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
				<div class="offcanvas-body d-flex flex-column justify-content-center align-items-center">
						<button class="nav-btn-mini" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" id="offcanvas-btn">BuyGift</button>
						<button class="nav-btn-mini" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" id="offcanvas-btn">распродажи</button>
						<button class="nav-btn-mini" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" id="offcanvas-btn">ключи</button>
						<button class="nav-btn-mini" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" id="offcanvas-btn">отзывы</button>
						<button class="nav-btn-mini nav-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">воспользоваться</button>
				</div>
			</div>
		</nav>

		<div class="screen container-sm d-flex justify-content-center flex-column" id="a">
			<div class="container d-flex align-items-center flex-column">
				<p class="d-sm-none d-block" style="letter-spacing: 2px;">У нас игры дешевле</p>
				<p class="d-sm-block d-none">У нас игры дешевле чем на распродаже, чем ключи</p>
				<h1>BuyGift</h1>
				<button class="nav-btn" data-scroll-target="4">Регистрируйся и покупай</button>
			</div>
		</div>
		<svg width="50" height="50" style="position:relative; left: calc(50% - 25px); z-index: 3;" id="btm-arrow">
			<line id="btm-line1"
				x1="25" y1="5" x2="25" y2="35" stroke="white" stroke-width="3" stroke-linecap="round"
			/>
			<line id="btm-line2"
				x1="15" y1="25" x2="25" y2="35" stroke="white" stroke-width="3" stroke-linecap="round"
			/>
			<line id="btm-line3"
				x1="25" y1="35" x2="35" y2="25" stroke="white" stroke-width="3" stroke-linecap="round"
			/>
		</svg>
		<div class="screen d-flex justify-content-center" id="b">
			<div class="b-half d-lg-block d-none"></div>
			<div class="b-half d-lg-flex d-none flex-column justify-content-center">
				<h2>Дешевле чем на распродаже</h2>
				<p>Forza Horizon 5<br>стоит 2999 руб.! Во время распродажи<br>она продаётся со скидкой в 10%, а<br>если сложить с нашей скидкой в 20%, то<br>цена упадёт до 2159 руб.!</p>
			</div>
			<div class="b-one d-lg-none d-flex flex-column justify-content-center">
				<h2>Дешевле чем на распродаже</h2>
				<p><i>Forza Horizon 5</i><br>стоит 2999 руб.! Во время распродажи<br>она продаётся со скидкой в 10%, а<br>если сложить с нашей скидкой в 20%, то<br>цена упадёт до 2159 руб.!</p>
			</div>
		</div>
		<div class="screen" id="c">
			<div class="c-half d-lg-flex d-none flex-column justify-content-center">
				<h2>Дешевле чем на распродаже</h2>
				<p>Для <i>Dying Light 2 Ultimate</i><br>нету ключей! Только у нас вы сможете<br>купить Ultimate Edition дешевле<br>чем за 3999 руб.</p>
			</div>
			<div class="c-half d-lg-block d-none"></div>
			<div class="c-one d-lg-none d-flex flex-column justify-content-center">
				<h2>Не для всего есть ключи</h2>
				<p>Для <i>Dying Light 2 Ultimate</i><br>нету ключей! Только у нас вы сможете<br>купить Ultimate Edition дешевле<br>чем за 3999 руб.</p>
			</div>
		</div>
		<div class="screen" id="d">
			<div id="d-header">
				<h1>Отзывы клиентов</h1>
			</div>
			<div id="carouselControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
				<div class="carousel-inner">
					@for ($i = 0; $i < 4; $i++)
						<div class="carousel-item {{ ($i == 0) ? 'active' : '' }}">
							<div class="review-page">
								@for ($j = 0; $j < 3; $j++)
									<div class="review">
										<div class="review-top">
											<img src="imgs/test_avatar.png" alt="">
											<div>
												<p class="review-name">Nickname</p>
												<p class="review-exp d-sm-block d-none">Куплено игр через наш сервис: 0</p>
												<p class="review-exp d-sm-none d-block">Куплено игр: 0</p>
											</div>
										</div>
										<div class="review-stars">
											<img src="imgs/star.svg" alt="">
											<img src="imgs/star.svg" alt="">
											<img src="imgs/star.svg" alt="">
											<img src="imgs/star.svg" alt="">
											<img src="imgs/star.svg" alt="">
										</div>
										<p class="review-date">опубликованно: 1 апреля 2022</p>
										<p class="review-text">Отзыв!</p>
									</div>
								@endfor
							</div>
						</div>
					@endfor
				</div>
				<button class="carousel-control-prev review-btn" type="button" data-bs-target="#carouselControls" data-bs-slide="prev" style="display: none;">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next review-btn" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
		<div class="screen" id="e">
			<div id="e-div">
				<h1 class="d-none d-xs-inline">Хочешь купить игру дешевле?</h1>
				<h1 class="d-xs-none d-inline">Хочешь игру дешевле?</h1>
				<p class="d-none d-md-inline">Регистрируйся прямо сейчас и получи дополнительную скидку в 5% на первую покупку!</p>
				<p class="d-md-none d-inline">Доп. скидка в 5% на первую покупку!</p>
			</div>
			<div class="div-btn">
				@if(Auth::check())
					<a href="/auth">
						<button class="nav-btn anim-btn">В профиль</button>
					</a>
				@else
					<a href="/auth">
						<button class="nav-btn anim-btn">Авторизоваться</button>
					</a>
				@endif
			</div>
			<br><br><br>
			<div class="div-btn">
				@if(Auth::check())
					<a href="/reg">
						<button class="nav-btn anim-btn">Выйти из аккаунта</button>
					</a>
				@else
					<a href="/reg">
						<button class="nav-btn anim-btn">Зарегистрироваться</button>
					</a>
				@endif
			</div>
		</div>
		<p id="last">сделал Я в 2022 году</p>
		<canvas id="canvas"></canvas>
	</body>
	<script type="module" src="script.js"></script>
</html>