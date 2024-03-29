<!DOCTYPE html>
<html lang="en">

<head>
	<title>UMCHAIN - website builder</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<!-- <style>body{opacity: 0;}</style> -->
	<link rel="stylesheet" href="/home/css/style.min.css?_v=3">

	<link rel="apple-touch-icon" sizes="180x180" href="/home/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/home/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/home/favicon-16x16.png">
	<link rel="shortcut icon" href="/home/favicon.ico">
	<!-- <meta name="robots" content="noindex, nofollow"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-SGDCSBFMM6"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-SGDCSBFMM6');
	</script>
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<div class="header__container">
				<a href="/" class="header__logo logo"><img src="/home/img/logo.svg" alt="Logo"></a>
				<div class="header__menu menu">
					<button type="button" class="menu__icon icon-menu"><span></span></button>
					<nav class="menu__body">
						<ul class="menu__list">
							<li class="menu__item"><a href="#" class="menu__link" data-goto=".about">ABOUT</a></li>
							<li class="menu__item"><a href="#" class="menu__link" data-goto=".whom">FOR WHOM</a></li>
							<li class="menu__item"><a href="#" class="menu__link" data-goto=".functional">FUNCTIONAL</a></li>
							<li class="menu__item"><a href="#" class="menu__link" data-goto=".sign-up">REGISTRATION</a></li>
							<li class="menu__item"><a href="#" class="menu__link" data-goto=".umc-token">UMC TOKEN</a></li>

						</ul>
						<div class="menu__social social">
							<a href="" class="social__item">
								<img src="/home/img/icons/social/instagram.svg" alt="Image">
							</a>
							<a href="" class="social__item">
								<img src="/home/img/icons/social/telegram.svg" alt="Image">
							</a>
							<a href="" class="social__item">
								<img src="/home/img/icons/social/linkedin.svg" alt="Image">
							</a>
							<a href="" class="social__item">
								<img src="/home/img/icons/social/tw.svg" alt="Image">
							</a>
							<a href="" class="social__item">
								<img src="/home/img/icons/social/discord.svg" alt="Image">
							</a>
						</div>
					</nav>
				</div>
				<div class="header__actions" data-da=".menu__body, 991.98">
					<div class="header__lang lang">
						{{-- <button class="lang__btn _icon-arrow" type="button">EN</button>
						<ul class="submenu">
							<li class="submenu__item">
								<a href="/ru" class="submenu__link">RU</a>
							</li>
						</ul> --}}
					</div>
					<button class="button header__btn _icon-arrow-r text text_btn" data-goto=".sign-up" type="button">Sign up</button>
				</div>
			</div>
		</header>

		<main class="page">
			<section class="hero section-bottom">
				<div class="hero__container-big">
					<div class="hero__inner" style="background-image: url(/home/img/hero-bg.jpg);">
						<div class="hero__content">
							<h1 class="hero__title title title_h1">
								The first decentralized neural website builder
							</h1>
							<div class="hero__text text text_accent">
								Create your website in minutes to bring your business to web 3.0
							</div>
						</div>
						<div class="hero__action">
							<button class="button hero__btn _icon-arrow-r text text_btn" data-goto=".sign-up" type="button">
								Sign up
							</button>
						</div>
					</div>
				</div>
			</section>
			<section class="advantages section-bottom">
				<div class="advantages__container">
					<h2 class="advantages__title text text_accent title-page">Advantages</h2>
					<div class="advantages__items">
						<div class="item-advantages">
							<div class="item-advantages__text text">Rapid website creation</div>
							<img src="/home/img/icons/advantages/01.svg" alt="Image" class="item-advantages__img">
						</div>
						<div class="item-advantages">
							<div class="item-advantages__text text">Decentralization through blockchain</div>
							<img src="/home/img/icons/advantages/02.svg" alt="Image" class="item-advantages__img">
						</div>
						<div class="item-advantages">
							<div class="item-advantages__text text">Adaptive neural networks</div>
							<img src="/home/img/icons/advantages/03.svg" alt="Image" class="item-advantages__img">
						</div>
						<div class="item-advantages">
							<div class="item-advantages__text text">UMCT token as the core of the ecosystem</div>
							<img src="/home/img/icons/advantages/04.svg" alt="Image" class="item-advantages__img">
						</div>
					</div>
				</div>
			</section>
			<section class="about section-bottom">
				<div class="about__container-big">
					<div class="about__inner section-padding" style="background-image: url(/home/img/about-bg.jpg);">
						<div class="about__container">
							<div class="about__block title-block">
								<h2 class="title-block__title title-page text text_accent">ABOUT</h2>
								<div class="title-block__text title title_h2">How can our service be useful for a specific
									user
								</div>
							</div>
							<div class="about__items">
								<div class="item-about">
									<div class="item-about__title">Marketplace builder</div>
									<div class="item-about__text text">
										Connect sellers to your site, the system will automatically charge them a commission
										from the sale, which you set yourself
									</div>
								</div>
								<div class="item-about">
									<div class="item-about__title">Landing Page</div>
									<div class="item-about__text text">
										Create landing pages in 5 minutes with artificial intelligence
									</div>
								</div>
								<div class="item-about">
									<div class="item-about__title">Online store</div>
									<div class="item-about__text text">
										Upload products, set prices and discounts yourself
									</div>
								</div>
								<div class="item-about">
									<div class="item-about__title">Select method of payment</div>
									<div class="item-about__text text">
										Peer-to-peer transaction, cryptoprocessing payments, internet acquiring
									</div>
								</div>
								<div class="item-about">
									<div class="item-about__title">Loyalty program</div>
									<div class="item-about__text text">
										Give your customers promotional codes with a discount, arrange promotions for goods,
										accrue bonuses for purchases
									</div>
								</div>
								<div class="item-about">
									<div class="item-about__title">Individual domain</div>
									<div class="item-about__text text">
										Connect your own domain or use our
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="whom section-bottom">
				<div class="whom__container">
					<div class="whom__block title-block">
						<h2 class="title-block__title title-page text text_accent">FOR WHOM</h2>
						<div class="title-block__text title title_h2">Anyone can use the Umchain constructor, we have
							identified the main business groups for whom our offer will be relevant
						</div>
					</div>
					<div class="whom__content">
						<div class="whom__logo">
							<img src="/home/img/for-logo.svg" alt="Image">
						</div>
						<div data-spollers class="whom__spoilers spollers">
							<details class="spollers__item">
								<summary class="spollers__title title title_h3">Startup</summary>
								<div class="spollers__body text">Startup business that wants to test customer needs</div>
							</details>
							<details class="spollers__item">
								<summary class="spollers__title title title_h3">Offline business</summary>
								<div class="spollers__body text">For offline business owners who want to get more profit
									from online orders
								</div>
							</details>
							<details class="spollers__item">
								<summary class="spollers__title title title_h3">Affiliate marketing</summary>
								<div class="spollers__body text">Create creatives with artificial intelligence in a short
									amount of time
								</div>
							</details>
						</div>
					</div>
				</div>
			</section>
			<section class="functional section-bottom">
				<div class="functional__container">
					<h2 class="functional__title title-page text text_accent">FUNCTIONAL</h2>
					<div class="functional__items">
						<div class="functional-item">
							<h3 class="functional-item__title title title_h3">Current functional</h3>
							<div class="functional-item__text text">At the moment, our service can already generate a
								full-fledged landing page, with a ready-made structure, unique texts and images as well as
								with the ability to connect any payment method and provide hosting
							</div>
						</div>
						<div class="functional-item">
							<h3 class="functional-item__title title title_h3">Future functional</h3>
							<div class="functional-item__text text">In the future, it will be possible to generate online
								stores and marketplaces
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="sign-up section-bottom">
				<div class="sign-up__container-big">
					<div class="sign-up__inner section-padding" style="background-image: url('/home/img/sign-bg.jpg');">
						<div class="sign-up__container">
							<div class="sign-up__block title-block">
								<h2 class="title-block__title title-page text text_accent">Sign up</h2>
								<div class="title-block__text title_h2 title">
									At the moment, the service is being openly tested
								</div>
							</div>
							<form class="sign-up__form form" id="form">
								@csrf
								<input type="hidden" name="token" id="token">
								<div class="form__column">
									<input class="form__input input" required autocomplete="off" type="text" name="name" data-error="Incorrect Name" placeholder="Name">
								</div>
								<div class="form__column">
									<input class="form__input input" required autocomplete="off" type="text" name="telegram" data-error="Incorrect Login" placeholder="Telegram account*">
								</div>
								<div class="form__column">
									<input class="form__input input" required autocomplete="off" type="email" name="email" data-error="Incorrect Email" placeholder="Email*">
								</div>
								<div class="form__column">
									<button class="form__button button text text_btn" id="submit-button" type="submit">
										<span class="_default-btn _icon-arrow-r">Sign up</span>
										<span class="_success-btn _icon-check">registration complete</span>
									</button>
									<div class="form__agree">I agree to UMChain processing my personal data</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			{{-- <section class="umc-token section-bottom">
				<div class="umc-token__container">
					<h2 class="umc-token__title title-page text text_accent">UMC TOKEN</h2>
					<div class="umc-token__wrapper">
						<div class="umc-token__content">
							<h3 class="title title_h2">Learn how to create a passive income of over
								500% per annum from trading umc tokens after the company goes public on an exchange</h3>
							<div class="umc-token__text text">The UMCT Token is functioning in Umchain system. This token is
								categorized as Utility, as it is an infrastructure unit that serves as an economic model for
								the ecosystem.
							</div>
							<a href="https://wp.umchain.org/" class="umc-token__btn text text_btn button _icon-arrow-r">More about</a>
						</div>
						<div class="umc-token__img -ibg--contain">
							<img src="/home/img/chart.svg" alt="Image">
						</div>
					</div>
				</div>
			</section> --}}
		</main>
		<footer class="footer">
			<div class="footer__container">
				<div class="footer__top top-footer">
					<div class="top-footer__col">
						<a href="/" class="footer__logo logo"><img src="/home/img/logo.svg" alt="Logo"></a>
					</div>
					<div class="top-footer__col">
						<div class="top-footer__title text text_btn">Navigation</div>
						<div class="top-footer__menu menu">
							<nav class="menu__body">
								<ul class="menu__list">
									<li class="menu__item"><a href="#" class="menu__link" data-goto=".about">ABOUT</a></li>
									<li class="menu__item"><a href="#" class="menu__link" data-goto=".whom">FOR WHOM</a></li>
									<li class="menu__item"><a href="#" class="menu__link" data-goto=".functional">FUNCTIONAL</a></li>
									<li class="menu__item"><a href="#" class="menu__link" data-goto=".sign-up">REGISTRATION</a></li>
									{{-- <li class="menu__item"><a href="#" class="menu__link" data-goto=".umc-token">UMC TOKEN</a></li> --}}
								</ul>
							</nav>
						</div>
					</div>
					<div class="top-footer__col">
						<div class="top-footer__title text text_btn">Socials</div>
						<div class="footer__social social">
							<a href="" class="social__item">
								<img src="/home/img/icons/social/instagram.svg" alt="Image">
							</a>
							<a href="" class="social__item">
								<img src="/home/img/icons/social/telegram.svg" alt="Image">
							</a>
							<a href="" class="social__item">
								<img src="/home/img/icons/social/linkedin.svg" alt="Image">
							</a>
							<a href="" class="social__item">
								<img src="/home/img/icons/social/tw.svg" alt="Image">
							</a>
							<a href="" class="social__item">
								<img src="/home/img/icons/social/discord.svg" alt="Image">
							</a>
						</div>
					</div>
				</div>
				<div class="footer__bottom">
					<div class="footer__text text">© 2023, UMChain OU</div>
					<div class="footer__text text"><a href="">Privacy policy</a></div>
				</div>
			</div>
		</footer>

	</div>
	<script src="/home/js/app.min.js?_v=20231226094019"></script>

	<!-- Скрипт отправки формы -->
	<script>
		document.querySelector("#token").value = "token_12dxaskjhkjafdclKJC";
		let button = document.querySelector("#submit-button");

		document.querySelector("#form").addEventListener('submit', async event => {
			event.preventDefault();

			button.disabled = true;

			let data = new FormData(event.target);

			try {
				const response = await fetch('{{ route('register-request') }}', {
					method: "POST",
					body: data,
				});
				if (response.ok) {
					event.target.classList.add('_send-success')
				}
			} catch (error) {
				console.error("Ошибка:", error);
				alert('Something went wrong! Try to refresh page');
			}
		});
	</script>
</body>

</html>
