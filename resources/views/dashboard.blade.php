@extends('layouts.app')

@section('title', 'Choose your site')

@section('content')
<style>
	/*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
	/* Document
	========================================================================== */
	/**
	* 1. Correct the line height in all browsers.
	* 2. Prevent adjustments of font size after orientation changes in iOS.
	*/
	html {
	line-height: 1.15;
	/* 1 */
	-webkit-text-size-adjust: 100%;
	/* 2 */
	}

	/* Sections
		========================================================================== */
	/**
	* Remove the margin in all browsers.
	*/
	body {
	margin: 0;
	}

	/**
	* Render the `main` element consistently in IE.
	*/
	main {
	display: block;
	}

	/**
	* Correct the font size and margin on `h1` elements within `section` and
	* `article` contexts in Chrome, Firefox, and Safari.
	*/
	h1 {
	font-size: 2em;
	margin: 0.67em 0;
	}

	/* Grouping content
		========================================================================== */
	/**
	* 1. Add the correct box sizing in Firefox.
	* 2. Show the overflow in Edge and IE.
	*/
	hr {
	-webkit-box-sizing: content-box;
			box-sizing: content-box;
	/* 1 */
	height: 0;
	/* 1 */
	overflow: visible;
	/* 2 */
	}

	/**
	* 1. Correct the inheritance and scaling of font size in all browsers.
	* 2. Correct the odd `em` font sizing in all browsers.
	*/
	pre {
	font-family: monospace, monospace;
	/* 1 */
	font-size: 1em;
	/* 2 */
	}

	/* Text-level semantics
		========================================================================== */
	/**
	* Remove the gray background on active links in IE 10.
	*/
	a {
	background-color: transparent;
	}

	/**
	* 1. Remove the bottom border in Chrome 57-
	* 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
	*/
	abbr[title] {
	border-bottom: none;
	/* 1 */
	text-decoration: underline;
	/* 2 */
	-webkit-text-decoration: underline dotted;
			text-decoration: underline dotted;
	/* 2 */
	}

	/**
	* Add the correct font weight in Chrome, Edge, and Safari.
	*/
	b,
	strong {
	font-weight: bolder;
	}

	/**
	* 1. Correct the inheritance and scaling of font size in all browsers.
	* 2. Correct the odd `em` font sizing in all browsers.
	*/
	code,
	kbd,
	samp {
	font-family: monospace, monospace;
	/* 1 */
	font-size: 1em;
	/* 2 */
	}

	/**
	* Add the correct font size in all browsers.
	*/
	small {
	font-size: 80%;
	}

	/**
	* Prevent `sub` and `sup` elements from affecting the line height in
	* all browsers.
	*/
	sub,
	sup {
	font-size: 75%;
	line-height: 0;
	position: relative;
	vertical-align: baseline;
	}

	sub {
	bottom: -0.25em;
	}

	sup {
	top: -0.5em;
	}

	/* Embedded content
		========================================================================== */
	/**
	* Remove the border on images inside links in IE 10.
	*/
	img {
	border-style: none;
	}

	/* Forms
		========================================================================== */
	/**
	* 1. Change the font styles in all browsers.
	* 2. Remove the margin in Firefox and Safari.
	*/
	button,
	input,
	optgroup,
	select,
	textarea {
	font-family: inherit;
	/* 1 */
	font-size: 100%;
	/* 1 */
	line-height: 1.15;
	/* 1 */
	margin: 0;
	/* 2 */
	}

	/**
	* Show the overflow in IE.
	* 1. Show the overflow in Edge.
	*/
	button,
	input {
	/* 1 */
	overflow: visible;
	}

	/**
	* Remove the inheritance of text transform in Edge, Firefox, and IE.
	* 1. Remove the inheritance of text transform in Firefox.
	*/
	button,
	select {
	/* 1 */
	text-transform: none;
	}

	/**
	* Correct the inability to style clickable types in iOS and Safari.
	*/
	button,
	[type="button"],
	[type="reset"],
	[type="submit"] {
	-webkit-appearance: button;
	}

	/**
	* Remove the inner border and padding in Firefox.
	*/
	button::-moz-focus-inner,
	[type="button"]::-moz-focus-inner,
	[type="reset"]::-moz-focus-inner,
	[type="submit"]::-moz-focus-inner {
	border-style: none;
	padding: 0;
	}

	/**
	* Restore the focus styles unset by the previous rule.
	*/
	button:-moz-focusring,
	[type="button"]:-moz-focusring,
	[type="reset"]:-moz-focusring,
	[type="submit"]:-moz-focusring {
	outline: 1px dotted ButtonText;
	}

	/**
	* Correct the padding in Firefox.
	*/
	fieldset {
	padding: 0.35em 0.75em 0.625em;
	}

	/**
	* 1. Correct the text wrapping in Edge and IE.
	* 2. Correct the color inheritance from `fieldset` elements in IE.
	* 3. Remove the padding so developers are not caught out when they zero out
	*    `fieldset` elements in all browsers.
	*/
	legend {
	-webkit-box-sizing: border-box;
			box-sizing: border-box;
	/* 1 */
	color: inherit;
	/* 2 */
	display: table;
	/* 1 */
	max-width: 100%;
	/* 1 */
	padding: 0;
	/* 3 */
	white-space: normal;
	/* 1 */
	}

	/**
	* Add the correct vertical alignment in Chrome, Firefox, and Opera.
	*/
	progress {
	vertical-align: baseline;
	}

	/**
	* Remove the default vertical scrollbar in IE 10+.
	*/
	textarea {
	overflow: auto;
	}

	/**
	* 1. Add the correct box sizing in IE 10.
	* 2. Remove the padding in IE 10.
	*/
	[type="checkbox"],
	[type="radio"] {
	-webkit-box-sizing: border-box;
			box-sizing: border-box;
	/* 1 */
	padding: 0;
	/* 2 */
	}

	/**
	* Correct the cursor style of increment and decrement buttons in Chrome.
	*/
	[type="number"]::-webkit-inner-spin-button,
	[type="number"]::-webkit-outer-spin-button {
	height: auto;
	}

	/**
	* 1. Correct the odd appearance in Chrome and Safari.
	* 2. Correct the outline style in Safari.
	*/
	[type="search"] {
	-webkit-appearance: textfield;
	/* 1 */
	outline-offset: -2px;
	/* 2 */
	}

	/**
	* Remove the inner padding in Chrome and Safari on macOS.
	*/
	[type="search"]::-webkit-search-decoration {
	-webkit-appearance: none;
	}

	/**
	* 1. Correct the inability to style clickable types in iOS and Safari.
	* 2. Change font properties to `inherit` in Safari.
	*/
	::-webkit-file-upload-button {
	-webkit-appearance: button;
	/* 1 */
	font: inherit;
	/* 2 */
	}

	/* Interactive
		========================================================================== */
	/*
	* Add the correct display in Edge, IE 10+, and Firefox.
	*/
	details {
	display: block;
	}

	/*
	* Add the correct display in all browsers.
	*/
	summary {
	display: list-item;
	}

	/* Misc
		========================================================================== */
	/**
	* Add the correct display in IE 10+.
	*/
	template {
	display: none;
	}

	/**
	* Add the correct display in IE 10.
	*/
	[hidden] {
	display: none;
	}

	* {
	margin: 0;
	padding: 0;
	-webkit-box-sizing: border-box;
			box-sizing: border-box;
	outline: none;
	}

	body {
	font-family: "opensans", sans-serif;
	margin: 0 auto;
	background-color: #FFF;
	}

	h1, h2, h3, h4, h5 {
	margin: 0;
	}

	ul,
	li {
	margin: 0;
	padding: 0;
	list-style: none;
	}

	a {
	text-decoration: none;
	cursor: pointer;
	}

	input,
	textarea,
	fieldset {
	border: none;
	}

	img {
	max-width: 100%;
	}

	button {
	background-color: transparent;
	cursor: pointer;
	border: none;
	}

	input,
	textarea,
	fieldset {
	border: none;
	}

	textarea {
	resize: none;
	}

	.visually-hidden:not(:focus):not(:active),
	input[type="checkbox"].visually-hidden,
	input[type="radio"].visually-hidden {
	position: absolute;
	width: 1px;
	height: 1px;
	margin: -1px;
	border: 0;
	padding: 0;
	white-space: nowrap;
	-webkit-clip-path: inset(100%);
	clip-path: inset(100%);
	clip: rect(0 0 0 0);
	overflow: hidden;
	}

</style>
<style>
		.um-create-site {
	max-width: 1440px;
	margin: 0 auto;
	padding: 0 15px;
	margin-top: 50px;
	}

	.um-create-site__title {
	margin-bottom: 24px;
	font-weight: 600;
	font-size: 16px;
	line-height: 150%;
	letter-spacing: 0.0275em;
	text-transform: uppercase;
	color: #3657C8;
	}

	.um-create-site__wrapp {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	}

	.um-menu-create-site {
	position: fixed;
	left: 4000px;
	}

	.um-menu-create-site__list {
	width: 100px;
	}

	.um-menu-create-site__item {
	margin-bottom: 29px;
	}

	.um-menu-create-site__link {
	font-style: normal;
	font-weight: 700;
	font-size: 16px;
	line-height: 150%;
	color: #0B1331;
	-webkit-transition-duration: .5s;
			transition-duration: .5s;
	}

	.um-menu-create-site__link:hover, .um-menu-create-site__link:focus {
	color: #3657C8;
	}

	.um-menu-create-site__link:active {
	color: #0B1331;
	}

	.um-menu-create-site__link:hover > i,
	.um-menu-create-site__link:focus > i {
	color: #3657C8;
	}

	.um-menu-create-site__link:active > i {
	color: #0B1331;
	}

	.um-menu-create-site__link--active {
	color: #3657C8;
	}

	.um-content-create-site__title {
	max-width: 781px;
	margin-bottom: 36px;
	font-weight: 600;
	font-size: 16px;
	line-height: 160%;
	letter-spacing: 0.05em;
	color: #0B1331;
	}

	.um-content-create-site__list {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
		-ms-flex-direction: column;
			flex-direction: column;
	}

	.um-content-create-site__item {
	margin-bottom: 24px;
	}

	.um-type-create-site {
	position: relative;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
		-ms-flex-direction: column;
			flex-direction: column;
	min-width: 346px;
	max-width: 421px;
	height: 210px;
	width: 100%;
	padding: 116px 50px 5px 16px;
	border-radius: 12px;
	overflow: hidden;
	-webkit-transition-duration: .5s;
			transition-duration: .5s;
	}

	.um-type-create-site:hover > .um-type-create-site__elem,
	.um-type-create-site:focus > .um-type-create-site__elem {
	top: 20px;
	right: 20px;
	width: 40px;
	height: 40px;
	}

	.um-type-create-site:active {
	opacity: .9;
	}

	.um-type-create-site__elem {
	position: absolute;
	right: -20px;
	top: -20px;
	width: 106px;
	height: 106px;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-pack: center;
		-ms-flex-pack: center;
			justify-content: center;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	border-radius: 60px;
	-webkit-transition-duration: .5s;
			transition-duration: .5s;
	}

	.um-type-create-site__icon {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-pack: center;
		-ms-flex-pack: center;
			justify-content: center;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	width: 40px;
	height: 40px;
	color: #BFC6E0;
	-webkit-box-shadow: -3px -2px 19px 0px #c4b794;
			box-shadow: -3px -2px 19px 0px #c4b794;
	-webkit-transform: rotate(180deg);
			transform: rotate(180deg);
	border-radius: 50px;
	}

	.um-type-create-site__title {
	font-style: normal;
	font-weight: 700;
	font-size: 18px;
	line-height: 150%;
	letter-spacing: 0.0275em;
	color: #FFFFFF;
	}

	.um-type-create-site__text {
	font-weight: 600;
	font-size: 14px;
	line-height: 160%;
	letter-spacing: 0.05em;
	color: #FFFFFF;
	}

	.um-type-create-site--bg-magenta {
	background-color: #926CD0;
	}

	.um-type-create-site--bg-magenta .um-type-create-site__elem {
	background-color: #9D75DE;
	}

	.um-type-create-site--bg-magenta i {
	-webkit-box-shadow: -4px -3px 20px -9px #000;
			box-shadow: -4px -3px 20px -9px #000;
	}

	.um-type-create-site--bg-black {
	background-color: #0B1331;
	}

	.um-type-create-site--bg-black .um-type-create-site__elem {
	background-color: #282F4A;
	}

	.um-type-create-site--bg-black i {
	-webkit-box-shadow: -4px -3px 20px -9px #000;
			box-shadow: -4px -3px 20px -9px #000;
	}

	.um-type-create-site--bg-green {
	background-color: #80D9A1;
	}

	.um-type-create-site--bg-green .um-type-create-site__elem {
	background-color: #76CA95;
	}

	.um-type-create-site--bg-green i {
	-webkit-box-shadow: -4px -3px 20px -9px #000;
			box-shadow: -4px -3px 20px -9px #000;
	}

	.um-type-create-site--bg-yellow {
	background-color: #FAE174;
	}

	.um-type-create-site--bg-yellow .um-type-create-site__elem {
	background-color: #ECDB7B;
	}

	.um-type-create-site--bg-yellow i {
	-webkit-box-shadow: -4px -3px 20px -9px #000;
			box-shadow: -4px -3px 20px -9px #000;
	}

	.um-type-create-site--bg-pink {
	background-color: #DE75CD;
	}

	.um-type-create-site--bg-pink .um-type-create-site__elem {
	background-color: #D357C0;
	}

	.um-type-create-site--bg-pink i {
	-webkit-box-shadow: -4px -3px 20px -9px #000;
			box-shadow: -4px -3px 20px -9px #000;
	}

	.um-type-create-site--bg-orange {
	background-color: #ED954E;
	}

	.um-type-create-site--bg-orange .um-type-create-site__elem {
	background-color: #EF7F2B;
	}

	.um-type-create-site--bg-orange i {
	-webkit-box-shadow: -4px -3px 20px -9px #000;
			box-shadow: -4px -3px 20px -9px #000;
	}

	.um-add-create-site__text {
	margin-bottom: 29px;
	font-weight: 600;
	font-size: 16px;
	line-height: 160%;
	letter-spacing: 0.05em;
	color: #0B1331;
	}

	.text-color-black {
	color: #0B1331;
	}

	.disabled-link {
	pointer-events: none;
	cursor: default;
	opacity: .5;
	}

	.um-add-create-site--none {
	display: none;
	}

	.um-button-create-site {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	-webkit-box-pack: center;
		-ms-flex-pack: center;
			justify-content: center;
	width: 285px;
	height: 68px;
	background: #3657C8;
	border-radius: 39px;
	font-weight: 700;
	font-size: 20px;
	line-height: 160%;
	text-align: center;
	letter-spacing: 0.05em;
	color: #FFFFFF;
	-webkit-transition-duration: .5s;
			transition-duration: .5s;
	cursor: pointer;
	}

	.um-button-create-site:hover, .um-button-create-site:focus {
	color: #0B1331;
	}

	.um-button-create-site:active {
	color: #FFFFFF;
	}

	@media (min-width: 768px) {
	.um-create-site__title {
		margin-bottom: 27px;
	}
	.um-menu-create-site {
		position: static;
		width: 100px;
	}
	.um-content-create-site {
		margin-left: 100px;
		margin-top: -55px;
	}
	.um-content-create-site__title {
		font-weight: 700;
		font-size: 24px;
		line-height: 160%;
	}
	.um-content-create-site__list {
		-webkit-box-orient: horizontal;
		-webkit-box-direction: normal;
			-ms-flex-direction: row;
				flex-direction: row;
		-ms-flex-wrap: wrap;
			flex-wrap: wrap;
	}
	.um-content-create-site__item:nth-child(odd) {
		margin-right: 40px;
	}
	.um-type-create-site {
		min-width: 346px;
		max-width: 346px;
	}
	}

	@media (min-width: 1280px) {
	.um-menu-create-site {
		position: static;
		width: 100px;
	}
	.um-content-create-site {
		margin-left: 150px;
		margin-bottom: 4px;
	}
	.um-content-create-site__item {
		margin-bottom: 40px;
	}
	.um-type-create-site {
		min-width: 421px;
		height: 164px;
		padding-top: 70px;
	}
	}

	input::-webkit-input-placeholder {
	color: #BFC6E0;
	font-weight: 600;
	font-size: 16px;
	line-height: 160%;
	}

	input:-ms-input-placeholder {
	color: #BFC6E0;
	font-weight: 600;
	font-size: 16px;
	line-height: 160%;
	}

	input::-ms-input-placeholder {
	color: #BFC6E0;
	font-weight: 600;
	font-size: 16px;
	line-height: 160%;
	}

	input::placeholder {
	color: #BFC6E0;
	font-weight: 600;
	font-size: 16px;
	line-height: 160%;
	}

	.um-form-create-site__wrap {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	-ms-flex-wrap: wrap;
		flex-wrap: wrap;
	margin-bottom: 10px;
	}

	.um-form-create-site__label {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
		-ms-flex-direction: column;
			flex-direction: column;
	margin-bottom: 20px;
	}

	.um-form-create-site__label-setting-bold {
	margin-right: 16px;
	}

	.um-form-create-site__label-setting-italics {
	margin-right: 24px;
	}

	.um-form-create-site__label-setting-radio {
	margin-right: 16px;
	}

	.um-form-create-site__label-setting-color {
	position: relative;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	margin-left: 8px;
	}

	.um-form-create-site__text {
	margin-bottom: 4px;
	font-weight: 600;
	font-size: 16px;
	line-height: 160%;
	letter-spacing: 0.05em;
	color: #0B1331;
	}

	.um-form-create-site__text-color {
	font-weight: 600;
	font-size: 16px;
	line-height: 160%;
	letter-spacing: 0.05em;
	color: #0B1331;
	cursor: pointer;
	}

	.um-form-create-site__asterisk {
	margin-left: 4px;
	font-size: 20px;
	color: #D24B6C;
	}

	.um-form-create-site__input {
	padding: 10px 25px;
	max-width: 344px;
	width: 100%;
	height: 46px;
	background: #FFFFFF;
	border: 2px solid #BFC6E0;
	border-radius: 49px;
	}

	.um-form-create-site__input-none, .um-form-create-site__input-file {
	display: none;
	}

	.um-form-create-site__input-bold {
	display: none;
	}

	.um-form-create-site__input-bold:checked + i {
	color: #3657C8;
	}

	.um-form-create-site__input-italics {
	display: none;
	}

	.um-form-create-site__input-italics:checked + i {
	color: #3657C8;
	}

	.um-form-create-site__input-italics {
	display: none;
	}

	.um-form-create-site__input-italics:checked + i {
	color: #3657C8;
	}

	.um-form-create-site__input-setting-radio {
	display: none;
	}

	.um-form-create-site__input-setting-radio:checked + i {
	color: #3657C8;
	}

	.um-form-create-site__input-color {
	position: absolute;
	top: 15px;
	left: 6px;
	width: 0;
	height: 0;
	z-index: 0;
	}

	.um-form-create-site__icon-download {
	position: relative;
	padding: 10px 25px;
	max-width: 344px;
	width: 100%;
	height: 46px;
	background: #FFFFFF;
	border: 2px solid #BFC6E0;
	border-radius: 49px;
	cursor: pointer;
	}

	.um-form-create-site__icon-download span {
	color: #BFC6E0;
	font-weight: 600;
	font-size: 16px;
	line-height: 160%;
	}

	.um-form-create-site__icon-download i {
	position: absolute;
	right: 3px;
	top: 3px;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-pack: center;
		-ms-flex-pack: center;
			justify-content: center;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	width: 36px;
	height: 36px;
	background-color: #3657C8;
	color: #FFFFFF;
	border-radius: 50px;
	-webkit-transition-duration: .5s;
			transition-duration: .5s;
	}

	.um-form-create-site__icon-download:hover > i,
	.um-form-create-site__icon-download:focus > i {
	color: #0B1331;
	}

	.um-form-create-site__icon-download:active > i {
	color: #0B1331;
	}

	.um-form-create-site__elem-color {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	width: 18px;
	height: 18px;
	margin-right: 10px;
	background: #000;
	border-radius: 50px;
	z-index: 1;
	cursor: pointer;
	}

	.um-form-create-site__label-setting-link {
	margin-left: 10px;
	}

	.um-form-create-site__btn {
	margin-top: 40px;
	}

	.um-form-create-site__wrap-btn {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-ms-flex-wrap: wrap;
		flex-wrap: wrap;
	-webkit-box-pack: justify;
		-ms-flex-pack: justify;
			justify-content: space-between;
	max-width: 600px;
	}

	.um-form-create-site__textarea {
	border: 2px solid #BFC6E0;
	border-radius: 20px;
	max-width: 867px;
	width: 100%;
	height: 264px;
	padding: 25px;
	}

	.icon-um-bolt,
	.icon-um-slash,
	.icon-um-right,
	.icon-um-center,
	.icon-um-left {
	-webkit-transition-duration: .5s;
			transition-duration: .5s;
	cursor: pointer;
	}

	@media (min-width: 768px) {
	.um-form-create-site__input {
		width: 400px;
	}
	.um-form-create-site__icon-download {
		width: 400px;
	}
	}

	.um-domain-create-site__info-list {
	margin-top: 34px;
	}

	.um-domain-create-site__info-item {
	position: relative;
	max-width: 571px;
	margin-bottom: 12px;
	margin-left: 24px;
	font-weight: 600;
	font-size: 14px;
	line-height: 160%;
	letter-spacing: 0.05em;
	color: #000000;
	}

	.um-domain-create-site__info-item::after {
	content: "";
	position: absolute;
	left: -24px;
	top: 7px;
	display: block;
	width: 10px;
	height: 10px;
	border-radius: 50px;
	background: #3657C8;
	}

	.um-domain-create-site__text {
	margin-top: 67px;
	max-width: 571px;
	margin-bottom: 59px;
	font-weight: 400;
	font-size: 14px;
	line-height: 160%;
	letter-spacing: 0.05em;
	color: #0B1331;
	}

	.um-domain-create-site__item {
	position: relative;
	margin-bottom: 74px;
	}

	.um-domain-create-site__item span {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-pack: center;
		-ms-flex-pack: center;
			justify-content: center;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	width: 44px;
	height: 44px;
	margin-bottom: 19px;
	font-weight: 600;
	font-size: 18px;
	line-height: 140%;
	letter-spacing: 0.03em;
	color: #FFFFFF;
	background-color: #3657C8;
	border-radius: 50px;
	}

	.um-domain-create-site__item h3 {
	width: 309px;
	margin-bottom: 8px;
	font-weight: 700;
	font-size: 16px;
	line-height: 22px;
	letter-spacing: 0.03em;
	color: #0B1331;
	}

	.um-domain-create-site__item p {
	width: 309px;
	font-weight: 400;
	font-size: 14px;
	line-height: 19px;
	letter-spacing: 0.03em;
	color: #0B1331;
	}

	.um-domain-create-site__item--arrow::before {
	content: "";
	position: absolute;
	bottom: -67px;
	left: 20px;
	display: block;
	width: 4px;
	height: 56px;
	background-image: url("../../images/img/svg/Arrow-bottom.svg");
	background-repeat: no-repeat;
	background-position: center;
	}

	.um-style-form-create-site {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
		-ms-flex-direction: column;
			flex-direction: column;
	}

	.um-style-form-create-site__title {
	margin-bottom: 40px;
	font-weight: 600;
	font-size: 16px;
	line-height: 160%;
	letter-spacing: 0.05em;
	color: #0B1331;
	}

	.um-style-form-create-site__label {
	cursor: pointer;
	margin-bottom: 55px;
	}

	.um-style-form-create-site__wrap-radio {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	margin-bottom: 31px;
	}

	.um-style-form-create-site__elem {
	position: relative;
	margin-right: 11px;
	width: 22px;
	height: 22px;
	border: 1px solid #0B1331;
	border-radius: 50px;
	background-color: #fff;
	}

	.um-style-form-create-site__elem::before {
	content: "";
	position: absolute;
	top: 4px;
	left: 4px;
	display: block;
	width: 12px;
	height: 12px;
	opacity: 0;
	-webkit-transition: opacity .3s ease-in-out;
	transition: opacity .3s ease-in-out;
	background-color: #3657C8;
	border-radius: 50px;
	}

	.um-style-form-create-site__radio {
	display: none;
	}

	.um-style-form-create-site__radio:checked + .um-style-form-create-site__elem::before {
	opacity: 1;
	}

	.um-style-form-create-site__number {
	font-weight: 600;
	font-size: 16px;
	line-height: 120%;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	letter-spacing: 0.03em;
	color: #0B1331;
	}

	.um-style-form-create-site__list {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	margin-bottom: 23px;
	}

	.um-style-form-create-site__item {
	margin-right: 25px;
	width: 50px;
	height: 50px;
	border-radius: 50px;
	}

	.um-style-form-create-site__img {
	margin-right: 18px;
	width: 90px;
	-webkit-box-shadow: 4.97674px 4.97674px 24.8837px rgba(177, 177, 177, 0.25);
			box-shadow: 4.97674px 4.97674px 24.8837px rgba(177, 177, 177, 0.25);
	}

	.um-style-form-create-site__btn-wrap {
	-ms-flex-preferred-size: 100%;
		flex-basis: 100%;
	}

	.add-btn {
	font-weight: 600;
	font-size: 16px;
	line-height: 160%;
	letter-spacing: 0.05em;
	color: #BFC6E0;
	}

	.add-btn i {
	font-size: 14px;
	}

	@media (min-width: 768px) {
	.um-style-form-create-site {
		-webkit-box-orient: horizontal;
		-webkit-box-direction: normal;
			-ms-flex-direction: row;
				flex-direction: row;
		-ms-flex-wrap: wrap;
			flex-wrap: wrap;
		-webkit-box-pack: justify;
			-ms-flex-pack: justify;
				justify-content: space-between;
	}
	.um-style-form-create-site__title {
		-ms-flex-preferred-size: 100%;
			flex-basis: 100%;
	}
	}

	.um-page-create-site__wrap-btn {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
		-ms-flex-direction: column;
			flex-direction: column;
	}

	.um-page-create-site__wrap-btn button {
	margin-bottom: 36px;
	}

	.um-setting-create-site {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	-ms-flex-wrap: wrap;
		flex-wrap: wrap;
	margin-bottom: 36px;
	}

	.um-setting-create-site__item {
	margin-right: 28px;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-ordinal-group: 3;
		-ms-flex-order: 2;
			order: 2;
	}

	.um-setting-create-site__btn {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-pack: center;
		-ms-flex-pack: center;
			justify-content: center;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	width: 46px;
	height: 46px;
	color: #fff;
	font-size: 20px;
	border-radius: 50px;
	-webkit-transition-duration: .5s;
			transition-duration: .5s;
	}

	.um-setting-create-site__btn:hover, .um-setting-create-site__btn:focus {
	color: #0B1331;
	}

	.um-setting-create-site__btn:active {
	color: #fff;
	}

	.um-setting-create-site__item-text {
	-webkit-box-ordinal-group: 2;
		-ms-flex-order: 1;
			order: 1;
	-ms-flex-preferred-size: 100%;
		flex-basis: 100%;
	margin-bottom: 16px;
	font-weight: 600;
	font-size: 16px;
	line-height: 160%;
	letter-spacing: 0.05em;
	color: #0B1331;
	}

	@media (min-width: 768px) {
	.um-page-create-site__wrap-btn {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: horizontal;
		-webkit-box-direction: normal;
			-ms-flex-direction: row;
				flex-direction: row;
	}
	.um-page-create-site__wrap-btn button {
		margin-bottom: 0;
		margin-right: 43px;
	}
	.um-setting-create-site {
		text-align: center;
	}
	.um-setting-create-site__item {
		-webkit-box-ordinal-group: 2;
			-ms-flex-order: 1;
				order: 1;
		margin-right: 12px;
	}
	.um-setting-create-site__item-text {
		-webkit-box-ordinal-group: 2;
			-ms-flex-order: 1;
				order: 1;
		-ms-flex-preferred-size: auto;
			flex-basis: auto;
		margin-bottom: 0;
	}
	}

	.um-content-create-site {
	max-width: 1019px;
	min-width: 320px;
	width: 100%;
	}

	.um-setting-block-create-site {
	position: relative;
	max-width: 1019px;
	min-width: 320px;
	width: 100%;
	padding-top: 80px;
	padding-left: 24px;
	padding-right: 24px;
	padding-bottom: 52px;
	margin-bottom: 30px;
	-webkit-box-shadow: 10px 10px 20px rgba(161, 166, 185, 0.15);
			box-shadow: 10px 10px 20px rgba(161, 166, 185, 0.15);
	border-radius: 12px;
	}

	.um-setting-block-create-site__title {
	margin-bottom: 31px;
	font-weight: 700;
	font-size: 16px;
	line-height: 22px;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	letter-spacing: 0.03em;
	color: #0B1331;
	}

	.um-setting-block-create-site__title-block {
	font-weight: 700;
	font-size: 24px;
	line-height: 160%;
	letter-spacing: 0.05em;
	color: #BFC6E0;
	}

	.um-setting-block-create-site__btn-wrap {
	position: absolute;
	top: 24px;
	right: 47px;
	}

	.um-setting-block-create-site__block {
	margin-bottom: 20px;
	}

	.um-setting-block-create-site__text-mb {
	display: block;
	margin-bottom: 23px;
	}

	.um-setting-block-create-site__preview-list {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	}

	.um-setting-block-create-site__preview-list img {
	-webkit-box-shadow: 10px 10px 20px rgba(161, 166, 185, 0.15);
			box-shadow: 10px 10px 20px rgba(161, 166, 185, 0.15);
	}

	.um-setting-block-create-site__preview-item {
	margin-right: 10px;
	}

	.um-catalog-create-site {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	max-width: 1000px;
	-ms-flex-wrap: wrap;
		flex-wrap: wrap;
	}

	.um-catalog-create-site__item {
	margin-right: 19px;
	}

	.um-paginator-create-site {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	-webkit-box-pack: end;
		-ms-flex-pack: end;
			justify-content: flex-end;
	margin-top: 60px;
	}

	.um-paginator-create-site__list {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	}

	.um-paginator-create-site__item {
	margin-right: 25px;
	}

	.um-paginator-create-site__link {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-pack: center;
		-ms-flex-pack: center;
			justify-content: center;
	-webkit-box-align: center;
		-ms-flex-align: center;
			align-items: center;
	width: 30px;
	height: 30px;
	font-weight: 400;
	font-size: 18px;
	line-height: 25px;
	letter-spacing: 0.03em;
	color: #696969;
	}

	.um-paginator-create-site__link--active {
	background-color: #696969;
	color: #fff;
	border-radius: 50px;
	}

	@media (min-width: 768px) {
	.um-setting-block-create-site {
		padding-top: 24px;
	}
	}

	.color-grey {
	background-color: #949AA5;
	}

	.color-black {
	background-color: #17181A;
	}

	.color-green {
	background-color: #03C04F;
	}

	.color-light-grey {
	background-color: #97A3AF;
	}

	.color-light-black {
	background-color: #0B1331;
	}

	.color-orange {
	background-color: #F46242;
	}

	.color-bold-grey {
	background-color: #696969;
	}

	.color-bold-black {
	background-color: #000000;
	}

	.color-blue {
	background-color: #0066FF;
	}

	.color-dark-blue {
	background-color: #3657C8;
	}

	.color-dark-grey {
	background-color: #B0BFF0;
	}

	.color-light-blue {
	background-color: #6ACDF8;
	}
</style>


    <div class="container min-h-screen mx-auto">
        <div class="um-create-site">

            <h3 class="um-create-site__title"></h3>

            <div class="um-create-site__wrapp">

                <!-- Меню Создать сайт -->
                <div class="um-menu-create-site">
                    <ul class="um-menu-create-site__list">
                        {{-- <li class="um-menu-create-site__item"><a
                                class="um-menu-create-site__link um-menu-create-site__link--active" href="#">My site</a>
                        </li> --}}
                    </ul>
                </div>

                <!-- блок выбор сайта -->
                <div class="um-content-create-site">

                    <h2 class="mt-5 um-content-create-site__title">Select type of site</h2>

                    <ul class="um-content-create-site__list">
                        <li class="um-content-create-site__item">
                            <a class="um-type-create-site um-type-create-site--bg-magenta" href="{{ route('personal.sites') }}">
                                <span class="um-type-create-site__elem">
                                    <i class="um-type-create-site__icon icon-um-back"></i>
                                </span>
                                <span class="um-type-create-site__title">Landing Page</span>
                                <span class="um-type-create-site__text">Create a landing page or business card site</span>
                            </a>
                        </li>
                        <li class="um-content-create-site__item">
                            <a class="um-type-create-site um-type-create-site--bg-black" href="#">
								<div class="absolute top-0 bottom-0 left-0 right-0 bg-[#000000cc] z-10 flex justify-center items-center text-white transition opacity-0 hover:opacity-100">
									Coming soon ...
								</div>
                                <span class="um-type-create-site__elem">
                                    <i class="um-type-create-site__icon icon-um-back"></i>
                                </span>
                                <span class="um-type-create-site__title">Internet - store of services</span>
                                <span class="um-type-create-site__text">Website for selling services. Appointment with a
                                    specialist, by time and date</span>
                            </a>
                        </li>
                        <li class="um-content-create-site__item">
							<a class="um-type-create-site um-type-create-site--bg-green" href="#">
								<div class="absolute top-0 bottom-0 left-0 right-0 bg-[#000000cc] z-10 flex justify-center items-center text-white transition opacity-0 hover:opacity-100">
									Coming soon ...
								</div>
                                <span class="um-type-create-site__elem">
                                    <i class="um-type-create-site__icon icon-um-back"></i>
                                </span>
                                <span class="um-type-create-site__title">Website for selling services</span>
                                <span class="um-type-create-site__text">Website for selling services with an application
                                    form</span>
                            </a>
                        </li>
                        <li class="um-content-create-site__item">
                            <a class="um-type-create-site um-type-create-site--bg-yellow" href="#">
								<div class="absolute top-0 bottom-0 left-0 right-0 bg-[#000000cc] z-10 flex justify-center items-center text-white transition opacity-0 hover:opacity-100">
									Coming soon ...
								</div>
                                <span class="um-type-create-site__elem">
                                    <i class="um-type-create-site__icon icon-um-back"></i>
                                </span>
                                <span class="um-type-create-site__title text-color-black">Website - Blog</span>
                                <span class="um-type-create-site__text text-color-black">For those who plan to blog</span>
                            </a>
                        </li>
                        <li class="um-content-create-site__item">
                            <a class="um-type-create-site um-type-create-site--bg-pink" href="#">
								<div class="absolute top-0 bottom-0 left-0 right-0 bg-[#000000cc] z-10 flex justify-center items-center text-white transition opacity-0 hover:opacity-100">
									Coming soon ...
								</div>
                                <span class="um-type-create-site__elem">
                                    <i class="um-type-create-site__icon icon-um-back"></i>
                                </span>
                                <span class="um-type-create-site__title">Corporate website</span>
                                <span class="um-type-create-site__text">Multi-page website, suitable for presenting a
                                    company</span>
                            </a>
                        </li>
                        <li class="um-content-create-site__item">
                            <a class="um-type-create-site um-type-create-site--bg-orange" href="#">
								<div class="absolute top-0 bottom-0 left-0 right-0 bg-[#000000cc] z-10 flex justify-center items-center text-white transition opacity-0 hover:opacity-100">
									Coming soon ...
								</div>
                                <span class="um-type-create-site__elem">
                                    <i class="um-type-create-site__icon icon-um-back"></i>
                                </span>
                                <span class="um-type-create-site__title">Online - store of goods</span>
                                <span class="um-type-create-site__text">Website for selling goods</span>
                            </a>
                        </li>
                    </ul>

                    <!-- блок выбор сайта -->
                    <div class="um-add-create-site um-add-create-site--none">
                        <p class="um-add-create-site__text">If you would like to create another website, please fill out the
                            application form</p>
                        <button class="um-button-create-site">I want a website!</button>
                    </div>

                </div>

            </div>



        </div>
    </div>
@endsection
