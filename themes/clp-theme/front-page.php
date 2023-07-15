<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clp-theme
 */

get_header();
?>


<style>
/* Style 1 */
#main{
	padding: 140px 0px 20px 0px;
}
#main .title, #main .search-robots-description, #main .special-offer, #main .special-offer-text{
	color: white;
}

#main .main-img-content picture{
	background: #f0ffff;
	box-shadow: 3px 1px 15px 0px #c5c5c5;
}
#main .block-background{
	background-color: #0F0B45;
    overflow: hidden;
    transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
    padding: 12% 0% 7% 0%;
}
#main .block-background .image-bottom-container{
    bottom: -1px;
    overflow: hidden;
    position: absolute;
    left: 0;
    width: 100%;
    line-height: 0;
    direction: ltr;
}
#main .block-background .image-bottom-container svg {
    width: calc(100% + 1.3px);
    height: 285px;
	transform: translateX(-50%) rotateY(180deg);
	display: block;
	width: calc(100% + 1.3px);
	position: relative;
	left: 50%;
}
#main .block-background .image-bottom-container svg path{
    fill: #ffffff;
}
#main .main-img-content {
    width: 50%;
    z-index: 10000;
}
#main .main-img-content picture{
	border-radius: 300px;
	display: block;
	padding: 30px;
    max-width: 370px;
}
#main .container-btn{
    display: inline-block;
}
#main .btn{
	width: 341px;
}


/* Style 2 */
#main:before {
	background: #f7f7f7 none repeat scroll 0 0;
	height: 100%;
	top: 68%;
	content: "";
	left: 0;
	position: absolute;
	-webkit-transform: skewY(170deg);
    transform: skewY(163deg);
	width: 100%;
	z-index: 0;
}
#main .block-background{
    display: none;
}
#main{
	position: relative;
	padding: 110px 0px 140px 0px;
}
#main .main-img-content picture {
    background: #ffffff;
}


/* Style 3 */
body #main {
    background: transparent -webkit-linear-gradient(left,#d4ebfb 0%,#f6f5ff 100%) repeat scroll 0 0;
    background: transparent linear-gradient(to right,#d4ebfb 0%,#f6f5ff 100%) repeat scroll 0 0;
}
body #main .title, #main .search-robots-description, #main .special-offer, #main .special-offer-text {
    color: #091e50;
}
</style>

	<main id="primary" class="site-main">

	<section id="main" class="container-section">
		<div class="container">
				<div class="main-text-content">	
					<h1 class="title">Create Landing Page</h1>
					<p class="text-after-title">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet velit vel erat aliquet porttitor. Mauris a enim non elit cursus tristique quis ut urna.
						Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					</p>	
						
					<p class="special-offer">
						Landing pages from 1000 €
					</p>
					<p class="special-offer-text">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					</p>
					<div class="container-btn">
						<button type="button" class="btn btn-size-big">find out the cost &#x2192;</button>
					</div>
				</div>			

				<div class="main-img-content">
					<picture>
						<img decoding="async" src="/wp-content/themes/clp-theme/images/bg-main-100.png" alt="Make Landing Page">
					</picture>	
				</div>		
		</div>
		
		<div class="block-background">
			<div class="image-bottom-container">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
				<path class="elementor-shape-fill" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3
				c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3
				c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path>
				</svg>
			</div>
		</div>


	</section>
	
	

	<section id="our-advantage" class="container-section">
		<div class="container">
		
			<div class="advantage">
		
				<div class="advantage-text-block">
					<h2 class="title">Why Choose Us</h2>
					<div class="advantage-list">
						<h3 class="advantage-list-title">Уникальный дизайн</h3>
						<p class="advantage-list-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet velit vel erat aliquet porttitor.
						</p>
						<h3 class="advantage-list-title">Ни каких платных подписок и ежемесячной оплаты</h3>
						<p class="advantage-list-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet velit vel erat aliquet porttitor.
						</p>						
						<h3 class="advantage-list-title">Ни какой переплаты сторониим фриланс сервесам</h3>
						<p class="advantage-list-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet velit vel erat aliquet porttitor.
						</p>						
						<h3 class="advantage-list-title">У нас крутые специ, с большим стажем.</h3>
						<p class="advantage-list-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet velit vel erat aliquet porttitor.
						</p>						
					</div >
				</div>
				
				<div class="advantage-img-content">
					<picture>
						<img decoding="async" src="/wp-content/themes/clp-theme/images/our-advantage-1.png" alt="Advantage">
					</picture>	
				</div>
			
			</div>
			
			
		</div>
	</section>




	<section id="work-cycle" class="container-section">
		<div class="container">
			<h2 class="title">Steps to Create a Landing Page</h2>
		</div>


		<div class="container">

			<div class="work-cycle-list work-list-1">
				<div class="card-container work-list-item">
					<div class="card card-1" data-rocket="0">
						<div class="flip-card front"> 
							<p class="title-flip">Planning</p>
							<img class="img-flip" src="/wp-content/themes/clp-theme/images/w1.png" />
							<!--<span class="numeric-step">1</span>-->
						</div> 
						<div class="flip-card back">
							<p class="text-flip">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet velit vel erat aliquet porttitor. Mauris a enim non elit cursus tristique quis ut urna.
							</p>
							<!--<span class="numeric-step">1</span>-->
						</div>
					</div>
				</div>
				<div class="card-container work-list-item">
					<div class="card card-2" data-rocket="0">
						<div class="flip-card front"> 
							<p class="title-flip">Structure</p>
							<img class="img-flip" src="/wp-content/themes/clp-theme/images/w2.png" />
						</div> 
						<div class="flip-card back">
							<p class="text-flip">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet velit vel erat aliquet porttitor. Mauris a enim non elit cursus tristique quis ut urna.
							</p>
						</div> 
					</div>
				</div>
				<div class="card-container work-list-item">
					<div class="card card-3" data-rocket="0">
						<div class="flip-card front"> 
							<p class="title-flip">Design</p>
							<img class="img-flip" src="/wp-content/themes/clp-theme/images/w3.png" />
						</div> 
						<div class="flip-card back">
							<p class="text-flip">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet velit vel erat aliquet porttitor. Mauris a enim non elit cursus tristique quis ut urna.
							</p>
						</div> 
					</div>
				</div>
			</div>
			
			<div class="work-cycle-list work-list-1">
				<div class="card-container work-list-item">
					<div class="card card-4" data-rocket="0">
						<div class="flip-card front"> 
							<p class="title-flip">Content</p>
							<img class="img-flip" src="/wp-content/themes/clp-theme/images/w4.png" />
						</div> 
						<div class="flip-card back">
							<p class="text-flip">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet velit vel erat aliquet porttitor. Mauris a enim non elit cursus tristique quis ut urna.
							</p>
						</div> 
					</div>
				</div>
				<div class="card-container work-list-item">
					<div class="card card-5" data-rocket="0">
						<div class="flip-card front"> 
							<p class="title-flip">Development</p>
							<img class="img-flip" src="/wp-content/themes/clp-theme/images/w5.png" />
						</div> 
						<div class="flip-card back">
							<p class="text-flip">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet velit vel erat aliquet porttitor. Mauris a enim non elit cursus tristique quis ut urna.
							</p>
						</div> 
					</div>
				</div>
				<div class="card-container work-list-item">
					<div class="card-btn">
						<div class="text-center">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="rocket" viewBox="0 0 700 400" shape-rendering="geometricPrecision" text-rendering="geometricPrecision">
								<defs>
									<linearGradient id="rocket-fin-2-fill" x1="406.1758" y1="408.4629" x2="554.585" y2="571.9215" spreadMethod="pad" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 1 0 0)"><stop id="rocket-fin-2-fill-0" offset="0%" stop-color="rgb(50,54,155)"/><stop id="rocket-fin-2-fill-1" offset="26%" stop-color="rgb(79,94,177)"/><stop id="rocket-fin-2-fill-2" offset="85%" stop-color="rgb(151,194,233)"/><stop id="rocket-fin-2-fill-3" offset="100%" stop-color="rgb(170,220,247)"/></linearGradient><linearGradient id="rocket-fin-1-fill" x1="394.2058" y1="408.6286" x2="245.7966" y2="572.0872" spreadMethod="pad" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 1 0 0)"><stop id="rocket-fin-1-fill-0" offset="0%" stop-color="rgb(50,54,155)"/>
										<stop id="rocket-fin-1-fill-1" offset="26%" stop-color="rgb(79,94,177)"/>
										<stop id="rocket-fin-1-fill-2" offset="85%" stop-color="rgb(151,194,233)"/>
										<stop id="rocket-fin-1-fill-3" offset="100%" stop-color="rgb(170,220,247)"/>
									</linearGradient>
									<linearGradient id="rocket-path1-fill" x1="320.2755" y1="311.207" x2="480.5908" y2="311.1364" spreadMethod="pad" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 1 0 0)"><stop id="rocket-path1-fill-0" offset="0%" stop-color="rgb(170,220,247)"/><stop id="rocket-path1-fill-1" offset="12%" stop-color="rgb(165,213,243)"/><stop id="rocket-path1-fill-2" offset="29%" stop-color="rgb(150,192,230)"/><stop id="rocket-path1-fill-3" offset="50%" stop-color="rgb(127,159,211)"/><stop id="rocket-path1-fill-4" offset="75%" stop-color="rgb(94,112,183)"/><stop id="rocket-path1-fill-5" offset="100%" stop-color="rgb(54,55,149)"/></linearGradient><linearGradient id="rocket-path2-fill" x1="376.4312" y1="529.4361" x2="444.3308" y2="499.3134" spreadMethod="pad" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 1 0 0)"><stop id="rocket-path2-fill-0" offset="0%" stop-color="rgb(170,220,247)"/><stop id="rocket-path2-fill-1" offset="12%" stop-color="rgb(165,213,243)"/><stop id="rocket-path2-fill-2" offset="31%" stop-color="rgb(150,192,232)"/><stop id="rocket-path2-fill-3" offset="54%" stop-color="rgb(127,159,214)"/><stop id="rocket-path2-fill-4" offset="79%" stop-color="rgb(94,113,189)"/><stop id="rocket-path2-fill-5" offset="100%" stop-color="rgb(63,69,165)"/></linearGradient><linearGradient id="rocket-ellipse-fill" x1="-5.49" y1="-49.39" x2="5.56" y2="50" spreadMethod="pad" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 1 0 0)"><stop id="rocket-ellipse-fill-0" offset="0%" stop-color="rgb(170,220,247)"/><stop id="rocket-ellipse-fill-1" offset="12%" stop-color="rgb(165,213,243)"/><stop id="rocket-ellipse-fill-2" offset="31%" stop-color="rgb(150,192,232)"/><stop id="rocket-ellipse-fill-3" offset="54%" stop-color="rgb(127,159,214)"/><stop id="rocket-ellipse-fill-4" offset="79%" stop-color="rgb(94,113,189)"/><stop id="rocket-ellipse-fill-5" offset="100%" stop-color="rgb(63,69,165)"/></linearGradient><linearGradient id="rocket-ellipse2-fill" x1="-40.5" y1="4.5" x2="41" y2="-4.56" spreadMethod="pad" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 1 0 0)"><stop id="rocket-ellipse2-fill-0" offset="0%" stop-color="rgb(50,183,224)"/>
										<stop id="rocket-ellipse2-fill-1" offset="2%" stop-color="rgb(45,157,199)"/>
										<stop id="rocket-ellipse2-fill-2" offset="5%" stop-color="rgb(37,118,160)"/>
										<stop id="rocket-ellipse2-fill-3" offset="9%" stop-color="rgb(31,84,127)"/>
										<stop id="rocket-ellipse2-fill-4" offset="13%" stop-color="rgb(25,56,101)"/>
										<stop id="rocket-ellipse2-fill-5" offset="17%" stop-color="rgb(21,35,80)"/>
										<stop id="rocket-ellipse2-fill-6" offset="21%" stop-color="rgb(18,20,65)"/>
										<stop id="rocket-ellipse2-fill-7" offset="27%" stop-color="rgb(17,11,57)"/>
										<stop id="rocket-ellipse2-fill-8" offset="35%" stop-color="rgb(16,8,54)"/>
										<stop id="rocket-ellipse2-fill-9" offset="47%" stop-color="rgb(17,11,57)"/>
										<stop id="rocket-ellipse2-fill-10" offset="57%" stop-color="rgb(19,21,67)"/>
										<stop id="rocket-ellipse2-fill-11" offset="66%" stop-color="rgb(22,38,83)"/>
										<stop id="rocket-ellipse2-fill-12" offset="75%" stop-color="rgb(27,62,107)"/>
										<stop id="rocket-ellipse2-fill-13" offset="83%" stop-color="rgb(33,93,137)"/>
										<stop id="rocket-ellipse2-fill-14" offset="91%" stop-color="rgb(40,131,174)"/>
										<stop id="rocket-ellipse2-fill-15" offset="99%" stop-color="rgb(49,175,217)"/>
										<stop id="rocket-ellipse2-fill-16" offset="100%" stop-color="rgb(50,183,224)"/>
									</linearGradient>
									<linearGradient id="rocket-shadow-fill" x1="360.79" y1="259.36" x2="426.78" y2="307.31" spreadMethod="pad" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 1 0 0)">
										<stop id="rocket-shadow-fill-0" offset="0%" stop-color="rgb(121,103,141)"/>
										<stop id="rocket-shadow-fill-1" offset="32%" stop-color="rgb(16,8,54)"/>
										<stop id="rocket-shadow-fill-2" offset="75%" stop-color="rgb(28,19,64)"/>
										<stop id="rocket-shadow-fill-3" offset="82%" stop-color="rgb(29,20,65)"/>
										<stop id="rocket-shadow-fill-4" offset="100%" stop-color="rgb(121,103,141)"/>
									</linearGradient>
									<linearGradient id="rocket-big-flame-fill" x1="399.4348" y1="677.9451" x2="399.9938" y2="516.4786" spreadMethod="pad" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 1 0 0)"><stop id="rocket-big-flame-fill-0" offset="0%" stop-color="rgb(255,255,213)"/><stop id="rocket-big-flame-fill-1" offset="18%" stop-color="rgb(255,244,192)"/><stop id="rocket-big-flame-fill-2" offset="54%" stop-color="rgb(254,216,140)"/><stop id="rocket-big-flame-fill-3" offset="64%" stop-color="rgb(254,208,124)"/>
										<stop id="rocket-big-flame-fill-4" offset="70%" stop-color="rgb(254,202,122)"/>
										<stop id="rocket-big-flame-fill-5" offset="79%" stop-color="rgb(254,185,116)"/>
										<stop id="rocket-big-flame-fill-6" offset="88%" stop-color="rgb(255,158,106)"/>
										<stop id="rocket-big-flame-fill-7" offset="98%" stop-color="rgb(255,119,92)"/>
										<stop id="rocket-big-flame-fill-8" offset="100%" stop-color="rgb(255,111,89)"/>
									</linearGradient>
									<linearGradient id="rocket-small-flame-fill" x1="399.5928" y1="627.9961" x2="399.996" y2="516.6755" spreadMethod="pad" gradientUnits="userSpaceOnUse" gradientTransform="matrix(1 0 0 1 0 0)"><stop id="rocket-small-flame-fill-0" offset="0%" stop-color="rgb(252,255,216)"/>
										<stop id="rocket-small-flame-fill-1" offset="19%" stop-color="rgb(253,247,195)"/>
										<stop id="rocket-small-flame-fill-2" offset="57%" stop-color="rgb(255,226,143)"/>
										<stop id="rocket-small-flame-fill-3" offset="64%" stop-color="rgb(255,221,131)"/>
										<stop id="rocket-small-flame-fill-4" offset="76%" stop-color="rgb(255,215,129)"/>
										<stop id="rocket-small-flame-fill-5" offset="92%" stop-color="rgb(255,198,123)"/>
										<stop id="rocket-small-flame-fill-6" offset="100%" stop-color="rgb(255,188,119)"/>
									</linearGradient>
								</defs>
									<g id="rocket-g1" transform="matrix(0.564671 0 0 0.564671 124.1316 -22.275024)">
									<circle id="rocket-background-circle" r="247" transform="matrix(1 0 0 1 400 400)" fill="rgb(241,243,245)" stroke="none" stroke-width="1"/><polygon id="rocket-star-1" points="572,360 577.15,382.85 600,388 577.15,393.15 572,416 566.85,393.15 544,388 566.85,382.85 572,360" transform="matrix(1 0 0 1 -1.489936 148.253604)" fill="rgb(173,178,207)" stroke="rgb(173,178,207)" stroke-width="2.67721" stroke-linecap="round" stroke-linejoin="round" opacity="0"/><circle id="rocket-star-3" r="12" transform="matrix(1 0 0 1 538.207717 522.913385)" fill="rgb(173,178,207)" stroke="none" stroke-width="1" opacity="0"/><circle id="rocket-star-2" r="7" transform="matrix(1 0 0 1 249.357545 608.28938)" fill="rgb(173,178,207)" stroke="none" stroke-width="1" opacity="0"/>
									<g id="rocket-rocket" style="transform: none;">
									<g id="rocket-fins"><polygon id="rocket-fin-2" points="474.68,371.86 544.64,444.53 510.01,643.48 485.6,513.8 427.59,483.55 474.68,371.86" fill="url(#rocket-fin-2-fill)" stroke="none" stroke-width="1"/><polygon id="rocket-fin-1" points="372.41,483.55 314.4,513.8 289.99,643.48 255.36,444.53 325.32,371.86 372.41,483.55" fill="url(#rocket-fin-1-fill)" stroke="none" stroke-width="1"/></g><g id="rocket-body"><path id="rocket-path1" d="M442.65,515.42C442.65,515.42,480,470,480,330C480,280,484.76,171.88,400,110C315.24,171.88,320,280,320,330C320,470,357.35,515.42,357.35,515.42Z" fill="url(#rocket-path1-fill)" stroke="none" stroke-width="1"/><path id="rocket-path2" d="M442.89,515L438.47,524C437.04,527.13,433.47,530,430,530L370,530C366.56,530,363,527.13,361.53,524L357.11,515Z" fill="url(#rocket-path2-fill)" stroke="none" stroke-width="1"/></g><g id="rocket-window"><circle id="rocket-ellipse" r="50" transform="matrix(1 0 0 1 400 274)" fill="url(#rocket-ellipse-fill)" stroke="none" stroke-width="1"/>
									<circle id="rocket-ellipse2" r="41" transform="matrix(1 0 0 1 400 274)" fill="url(#rocket-ellipse2-fill)" stroke="none" stroke-width="1"/><path id="rocket-shadow" style="mix-blend-mode:multiply;isolation:isolate" d="M401.5,310C388.141086,310.000294,375.641311,303.412901,368.090081,292.392943C360.53885,281.372984,358.907597,267.33813,363.73,254.88C356.148061,269.262567,357.781097,286.766505,367.892684,299.498348C378.004271,312.230192,394.683814,317.784245,410.409611,313.655887C426.135407,309.527529,437.936052,296.496817,440.49,280.44C435.586563,297.917768,419.652578,309.99801,401.5,310Z" opacity="0.7" fill="url(#rocket-shadow-fill)" stroke="none" stroke-width="1"/></g><g id="rocket-flame"><path id="rocket-big-flame" d="M 430 530 C 430 530 479.9500599999994 578.7945599999986 400 692 C 320.0499400000006 578.7945599999986 370 530 370 530" fill="url(#rocket-big-flame-fill)" stroke="none" stroke-width="1"/><path id="rocket-small-flame" d="M 421.64 530 C 421.64 530 454.94505999999967 578.9377399999993 400.000000334 656.6600000000004 C 345.05494000000033 578.9377399999993 378.36 530 378.36 530" fill="url(#rocket-small-flame-fill)" stroke="none" stroke-width="1"/></g></g><line id="rocket-line1" x1="0" y1="-50.132649" x2="0" y2="50.132649" transform="matrix(1 0 0 1 580.522499 660.022516)" opacity="0" fill="none" stroke="rgb(173,178,207)" stroke-width="6" stroke-linecap="round"/><line id="rocket-line2" x1="0" y1="-50.132649" x2="0" y2="50.132649" transform="matrix(1 0 0 1 219.434259 142.027675)" opacity="0" fill="none" stroke="rgb(173,178,207)" stroke-width="6" stroke-linecap="round"/></g>
									
										<script>
											<![CDATA[!function wwwwq(t,n){"object"==typeof exports&&"undefined"!=typeof module?module.exports=n():"function"==typeof define&&define.amd?define(n):((t="undefined"!=typeof globalThis?globalThis:t||self).__SVGATOR_PLAYER__=t.__SVGATOR_PLAYER__||{},t.__SVGATOR_PLAYER__["91c80d77"]=n())}(this,(function(){"use strict";function t(t,n){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);n&&(r=r.filter((function(n){return Object.getOwnPropertyDescriptor(t,n).enumerable}))),e.push.apply(e,r)}return e}function n(n){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?t(Object(r),!0).forEach((function(t){o(n,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(n,Object.getOwnPropertyDescriptors(r)):t(Object(r)).forEach((function(t){Object.defineProperty(n,t,Object.getOwnPropertyDescriptor(r,t))}))}return n}function e(t){return(e="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function r(t,n){if(!(t instanceof n))throw new TypeError("Cannot call a class as a function")}function i(t,n){for(var e=0;e<n.length;e++){var r=n[e];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function u(t,n,e){return n&&i(t.prototype,n),e&&i(t,e),t}function o(t,n,e){return n in t?Object.defineProperty(t,n,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[n]=e,t}function a(t){return(a=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)})(t)}function l(t,n){return(l=Object.setPrototypeOf||function(t,n){return t.__proto__=n,t})(t,n)}function s(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(t){return!1}}function f(t,n,e){return(f=s()?Reflect.construct:function(t,n,e){var r=[null];r.push.apply(r,n);var i=new(Function.bind.apply(t,r));return e&&l(i,e.prototype),i}).apply(null,arguments)}function c(t,n){if(n&&("object"==typeof n||"function"==typeof n))return n;if(void 0!==n)throw new TypeError("Derived constructors may only return object or undefined");return function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(t)}function h(t,n,e){return(h="undefined"!=typeof Reflect&&Reflect.get?Reflect.get:function(t,n,e){var r=function(t,n){for(;!Object.prototype.hasOwnProperty.call(t,n)&&null!==(t=a(t)););return t}(t,n);if(r){var i=Object.getOwnPropertyDescriptor(r,n);return i.get?i.get.call(e):i.value}})(t,n,e||t)}function v(t){return function(t){if(Array.isArray(t))return d(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||function(t,n){if(!t)return;if("string"==typeof t)return d(t,n);var e=Object.prototype.toString.call(t).slice(8,-1);"Object"===e&&t.constructor&&(e=t.constructor.name);if("Map"===e||"Set"===e)return Array.from(t);if("Arguments"===e||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(e))return d(t,n)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function d(t,n){(null==n||n>t.length)&&(n=t.length);for(var e=0,r=new Array(n);e<n;e++)r[e]=t[e];return r}var y=g(Math.pow(10,-6));function g(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:6;if(Number.isInteger(t))return t;var e=Math.pow(10,n);return Math.round((+t+Number.EPSILON)*e)/e}function p(t,n){var e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:y;return Math.abs(t-n)<e}var m=Math.PI/180;function b(t){return t}function w(t,n,e){var r=1-e;return 3*e*r*(t*r+n*e)+e*e*e}function A(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:1,r=arguments.length>3&&void 0!==arguments[3]?arguments[3]:1;return t<0||t>1||e<0||e>1?null:p(t,n)&&p(e,r)?b:function(i){if(i<=0)return t>0?i*n/t:0===n&&e>0?i*r/e:0;if(i>=1)return e<1?1+(i-1)*(r-1)/(e-1):1===e&&t<1?1+(i-1)*(n-1)/(t-1):1;for(var u,o=0,a=1;o<a;){var l=w(t,e,u=(o+a)/2);if(p(i,l))break;l<i?o=u:a=u}return w(n,r,u)}}function x(){return 1}function k(t){return 1===t?1:0}function _(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0;if(1===t){if(0===n)return k;if(1===n)return x}var e=1/t;return function(t){return t>=1?1:(t+=n*e)-t%e}}var S=Math.sin,O=Math.cos,M=Math.acos,E=Math.asin,j=Math.tan,P=Math.atan2,I=Math.PI/180,B=180/Math.PI,R=Math.sqrt,T=function(){function t(){var n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1,e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:0,u=arguments.length>3&&void 0!==arguments[3]?arguments[3]:1,o=arguments.length>4&&void 0!==arguments[4]?arguments[4]:0,a=arguments.length>5&&void 0!==arguments[5]?arguments[5]:0;r(this,t),this.m=[n,e,i,u,o,a],this.i=null,this.w=null,this.s=null}return u(t,[{key:"determinant",get:function(){var t=this.m;return t[0]*t[3]-t[1]*t[2]}},{key:"isIdentity",get:function(){if(null===this.i){var t=this.m;this.i=1===t[0]&&0===t[1]&&0===t[2]&&1===t[3]&&0===t[4]&&0===t[5]}return this.i}},{key:"point",value:function(t,n){var e=this.m;return{x:e[0]*t+e[2]*n+e[4],y:e[1]*t+e[3]*n+e[5]}}},{key:"translateSelf",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0;if(!t&&!n)return this;var e=this.m;return e[4]+=e[0]*t+e[2]*n,e[5]+=e[1]*t+e[3]*n,this.w=this.s=this.i=null,this}},{key:"rotateSelf",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0;if(t%=360){var n=S(t*=I),e=O(t),r=this.m,i=r[0],u=r[1];r[0]=i*e+r[2]*n,r[1]=u*e+r[3]*n,r[2]=r[2]*e-i*n,r[3]=r[3]*e-u*n,this.w=this.s=this.i=null}return this}},{key:"scaleSelf",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:1;if(1!==t||1!==n){var e=this.m;e[0]*=t,e[1]*=t,e[2]*=n,e[3]*=n,this.w=this.s=this.i=null}return this}},{key:"skewSelf",value:function(t,n){if(n%=360,(t%=360)||n){var e=this.m,r=e[0],i=e[1],u=e[2],o=e[3];t&&(t=j(t*I),e[2]+=r*t,e[3]+=i*t),n&&(n=j(n*I),e[0]+=u*n,e[1]+=o*n),this.w=this.s=this.i=null}return this}},{key:"resetSelf",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:0,r=arguments.length>3&&void 0!==arguments[3]?arguments[3]:1,i=arguments.length>4&&void 0!==arguments[4]?arguments[4]:0,u=arguments.length>5&&void 0!==arguments[5]?arguments[5]:0,o=this.m;return o[0]=t,o[1]=n,o[2]=e,o[3]=r,o[4]=i,o[5]=u,this.w=this.s=this.i=null,this}},{key:"recomposeSelf",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null,r=arguments.length>3&&void 0!==arguments[3]?arguments[3]:null,i=arguments.length>4&&void 0!==arguments[4]?arguments[4]:null;return this.isIdentity||this.resetSelf(),t&&(t.x||t.y)&&this.translateSelf(t.x,t.y),n&&this.rotateSelf(n),e&&(e.x&&this.skewSelf(e.x,0),e.y&&this.skewSelf(0,e.y)),!r||1===r.x&&1===r.y||this.scaleSelf(r.x,r.y),i&&(i.x||i.y)&&this.translateSelf(i.x,i.y),this}},{key:"decompose",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,e=this.m,r=e[0]*e[0]+e[1]*e[1],i=[[e[0],e[1]],[e[2],e[3]]],u=R(r);if(0===u)return{origin:{x:g(e[4]),y:g(e[5])},translate:{x:g(t),y:g(n)},scale:{x:0,y:0},skew:{x:0,y:0},rotate:0};i[0][0]/=u,i[0][1]/=u;var o=e[0]*e[3]-e[1]*e[2]<0;o&&(u=-u);var a=i[0][0]*i[1][0]+i[0][1]*i[1][1];i[1][0]-=i[0][0]*a,i[1][1]-=i[0][1]*a;var l=R(i[1][0]*i[1][0]+i[1][1]*i[1][1]);if(0===l)return{origin:{x:g(e[4]),y:g(e[5])},translate:{x:g(t),y:g(n)},scale:{x:g(u),y:0},skew:{x:0,y:0},rotate:0};i[1][0]/=l,i[1][1]/=l,a/=l;var s=0;return i[1][1]<0?(s=M(i[1][1])*B,i[0][1]<0&&(s=360-s)):s=E(i[0][1])*B,o&&(s=-s),a=P(a,R(i[0][0]*i[0][0]+i[0][1]*i[0][1]))*B,o&&(a=-a),{origin:{x:g(e[4]),y:g(e[5])},translate:{x:g(t),y:g(n)},scale:{x:g(u),y:g(l)},skew:{x:g(a),y:0},rotate:g(s)}}},{key:"clone",value:function(){var t=this.m;return new this.constructor(t[0],t[1],t[2],t[3],t[4],t[5])}},{key:"toString",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:" ";return null===this.s&&(this.s="matrix("+this.m.map((function(t){return g(t)})).join(t)+")"),this.s}}],[{key:"create",value:function(t){return t?Array.isArray(t)?f(this,v(t)):t instanceof this?t.clone():(new this).recomposeSelf(t.origin,t.rotate,t.skew,t.scale,t.translate):new this}}]),t}();function N(t,n,e){return t>=.5?e:n}function C(t,n,e){return 0===t||n===e?n:t*(e-n)+n}function F(t,n,e){var r=C(t,n,e);return r<=0?0:r}function L(t,n,e){var r=C(t,n,e);return r<=0?0:r>=1?1:r}function q(t,n,e){return 0===t?n:1===t?e:{x:C(t,n.x,e.x),y:C(t,n.y,e.y)}}function V(t,n,e){return 0===t?n:1===t?e:{x:F(t,n.x,e.x),y:F(t,n.y,e.y)}}function D(t,n,e){var r=function(t,n,e){return Math.round(C(t,n,e))}(t,n,e);return r<=0?0:r>=255?255:r}function z(t,n,e){return 0===t?n:1===t?e:{r:D(t,n.r,e.r),g:D(t,n.g,e.g),b:D(t,n.b,e.b),a:C(t,null==n.a?1:n.a,null==e.a?1:e.a)}}function Y(t,n,e){var r=n.length;if(r!==e.length)return N(t,n,e);for(var i=new Array(r),u=0;u<r;u++)i[u]=C(t,n[u],e[u]);return i}function G(t,n){for(var e=[],r=0;r<t;r++)e.push(n);return e}function U(t,n){if(--n<=0)return t;var e=(t=Object.assign([],t)).length;do{for(var r=0;r<e;r++)t.push(t[r])}while(--n>0);return t}var $,W=function(){function t(n){r(this,t),this.list=n,this.length=n.length}return u(t,[{key:"setAttribute",value:function(t,n){for(var e=this.list,r=0;r<this.length;r++)e[r].setAttribute(t,n)}},{key:"removeAttribute",value:function(t){for(var n=this.list,e=0;e<this.length;e++)n[e].removeAttribute(t)}},{key:"style",value:function(t,n){for(var e=this.list,r=0;r<this.length;r++)e[r].style[t]=n}}]),t}(),H=/-./g,Q=function(t,n){return n.toUpperCase()};function X(t){return"function"==typeof t?t:N}function J(t){return t?"function"==typeof t?t:Array.isArray(t)?function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:b;if(!Array.isArray(t))return n;switch(t.length){case 1:return _(t[0])||n;case 2:return _(t[0],t[1])||n;case 4:return A(t[0],t[1],t[2],t[3])||n}return n}(t,null):function(t,n){var e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:b;switch(t){case"linear":return b;case"steps":return _(n.steps||1,n.jump||0)||e;case"bezier":case"cubic-bezier":return A(n.x1||0,n.y1||0,n.x2||0,n.y2||0)||e}return e}(t.type,t.value,null):null}function Z(t,n,e){var r=arguments.length>3&&void 0!==arguments[3]&&arguments[3],i=n.length-1;if(t<=n[0].t)return r?[0,0,n[0].v]:n[0].v;if(t>=n[i].t)return r?[i,1,n[i].v]:n[i].v;var u,o=n[0],a=null;for(u=1;u<=i;u++){if(!(t>n[u].t)){a=n[u];break}o=n[u]}return null==a?r?[i,1,n[i].v]:n[i].v:o.t===a.t?r?[u,1,a.v]:a.v:(t=(t-o.t)/(a.t-o.t),o.e&&(t=o.e(t)),r?[u,t,e(t,o.v,a.v)]:e(t,o.v,a.v))}function K(t,n){var e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null;return t&&t.length?"function"!=typeof n?null:("function"!=typeof e&&(e=null),function(r){var i=Z(r,t,n);return null!=i&&e&&(i=e(i)),i}):null}function tt(t,n){return t.t-n.t}function nt(t,n,r,i,u){var o,a="@"===r[0],l="#"===r[0],s=$[r],f=N;switch(a?(o=r.substr(1),r=o.replace(H,Q)):l&&(r=r.substr(1)),e(s)){case"function":if(f=s(i,u,Z,J,r,a,n,t),l)return f;break;case"string":f=K(i,X(s));break;case"object":if((f=K(i,X(s.i),s.f))&&"function"==typeof s.u)return s.u(n,f,r,a,t)}return f?function(t,n,e){if(arguments.length>3&&void 0!==arguments[3]&&arguments[3])return t instanceof W?function(r){return t.style(n,e(r))}:function(r){return t.style[n]=e(r)};if(Array.isArray(n)){var r=n.length;return function(i){var u=e(i);if(null==u)for(var o=0;o<r;o++)t[o].removeAttribute(n);else for(var a=0;a<r;a++)t[a].setAttribute(n,u)}}return function(r){var i=e(r);null==i?t.removeAttribute(n):t.setAttribute(n,i)}}(n,r,f,a):null}function et(t,n,r,i){if(!i||"object"!==e(i))return null;var u=null,o=null;return Array.isArray(i)?o=function(t){if(!t||!t.length)return null;for(var n=0;n<t.length;n++)t[n].e&&(t[n].e=J(t[n].e));return t.sort(tt)}(i):(o=i.keys,u=i.data||null),o?nt(t,n,r,o,u):null}function rt(t,n,e){if(!e)return null;var r=[];for(var i in e)if(e.hasOwnProperty(i)){var u=et(t,n,i,e[i]);u&&r.push(u)}return r.length?r:null}function it(t,n){if(!n.duration||n.duration<0)return null;var e=function(t,n){if(!n)return null;var e=[];if(Array.isArray(n))for(var r=n.length,i=0;i<r;i++){var u=n[i];if(2===u.length){var o=null;if("string"==typeof u[0])o=t.getElementById(u[0]);else if(Array.isArray(u[0])){o=[];for(var a=0;a<u[0].length;a++)if("string"==typeof u[0][a]){var l=t.getElementById(u[0][a]);l&&o.push(l)}o=o.length?1===o.length?o[0]:new W(o):null}if(o){var s=rt(t,o,u[1]);s&&(e=e.concat(s))}}}else for(var f in n)if(n.hasOwnProperty(f)){var c=t.getElementById(f);if(c){var h=rt(t,c,n[f]);h&&(e=e.concat(h))}}return e.length?e:null}(t,n.elements);return e?function(t,n){var e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:1/0,r=arguments.length>3&&void 0!==arguments[3]?arguments[3]:1,i=arguments.length>4&&void 0!==arguments[4]&&arguments[4],u=arguments.length>5&&void 0!==arguments[5]?arguments[5]:1,o=t.length,a=r>0?n:0;i&&e%2==0&&(a=n-a);var l=null;return function(s,f){var c=s%n,h=1+(s-c)/n;f*=r,i&&h%2==0&&(f=-f);var v=!1;if(h>e)c=a,v=!0,-1===u&&(c=r>0?0:n);else if(f<0&&(c=n-c),c===l)return!1;l=c;for(var d=0;d<o;d++)t[d](c);return v}}(e,n.duration,n.iterations||1/0,n.direction||1,!!n.alternate,n.fill||1):null}function ut(t){return+("0x"+(t.replace(/[^0-9a-fA-F]+/g,"")||27))}function ot(t,n,e){return!t||!e||n>t.length?t:t.substring(0,n)+ot(t.substring(n+1),e,e)}function at(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:27;return!t||t%n?t%n:at(t/n,n)}function lt(t,n,e){if(t&&t.length){var r=ut(e),i=ut(n),u=at(r)+5,o=ot(t,at(r,5),u);return o=o.replace(/\x7c$/g,"==").replace(/\x2f$/g,"="),o=function(t,n,e){var r=+("0x"+t.substring(0,4));t=t.substring(4);for(var i=n%r+e%27,u=[],o=0;o<t.length;o+=2)if("|"!==t[o]){var a=+("0x"+t[o]+t[o+1])-i;u.push(a)}else{var l=+("0x"+t.substring(o+1,o+1+4))-i;o+=3,u.push(l)}return String.fromCharCode.apply(String,u)}(o=(o=atob(o)).replace(/[\x41-\x5A]/g,""),i,r),o=JSON.parse(o)}}Number.isInteger||(Number.isInteger=function(t){return"number"==typeof t&&isFinite(t)&&Math.floor(t)===t}),Number.EPSILON||(Number.EPSILON=2220446049250313e-31);var st=function(){function t(n,e){var i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};r(this,t),this._id=0,this._running=!1,this._rollingBack=!1,this._animations=n,this.duration=e.duration,this.alternate=e.alternate,this.fill=e.fill,this.iterations=e.iterations,this.direction=i.direction||1,this.speed=i.speed||1,this.fps=i.fps||100,this.offset=i.offset||0,this.rollbackStartOffset=0}return u(t,[{key:"_rollback",value:function(){var t=this,n=1/0,e=null;this.rollbackStartOffset=this.offset,this._rollingBack||(this._rollingBack=!0,this._running=!0);this._id=window.requestAnimationFrame((function r(i){if(t._rollingBack){null==e&&(e=i);var u=i-e,o=t.rollbackStartOffset-u,a=Math.round(o*t.speed);if(a>t.duration&&n!=1/0){var l=!!t.alternate&&a/t.duration%2>1,s=a%t.duration;a=(s+=l?t.duration:0)||t.duration}var f=t.fps?1e3/t.fps:0,c=Math.max(0,a);if(c<n-f){t.offset=c,n=c;for(var h=t._animations,v=h.length,d=0;d<v;d++)h[d](c,t.direction)}var y=!1;if(t.iterations>0&&-1===t.fill){var g=t.iterations*t.duration,p=g==a;a=p?0:a,t.offset=p?0:t.offset,y=a>g}a>0&&t.offset>=a&&!y?t._id=window.requestAnimationFrame(r):t.stop()}}))}},{key:"_start",value:function(){var t=this,n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,e=-1/0,r=null,i={},u=function u(o){t._running=!0,null==r&&(r=o);var a=Math.round((o-r+n)*t.speed),l=t.fps?1e3/t.fps:0;if(a>e+l&&!t._rollingBack){t.offset=a,e=a;for(var s=t._animations,f=s.length,c=0,h=0;h<f;h++)i[h]?c++:(i[h]=s[h](a,t.direction),i[h]&&c++);if(c===f)return void t._stop()}t._id=window.requestAnimationFrame(u)};this._id=window.requestAnimationFrame(u)}},{key:"_stop",value:function(){this._id&&window.cancelAnimationFrame(this._id),this._running=!1,this._rollingBack=!1}},{key:"play",value:function(){!this._rollingBack&&this._running||(this._rollingBack=!1,this.rollbackStartOffset>this.duration&&(this.offset=this.rollbackStartOffset-(this.rollbackStartOffset-this.offset)%this.duration,this.rollbackStartOffset=0),this._start(this.offset))}},{key:"stop",value:function(){this._stop(),this.offset=0,this.rollbackStartOffset=0;var t=this.direction,n=this._animations;window.requestAnimationFrame((function(){for(var e=0;e<n.length;e++)n[e](0,t)}))}},{key:"reachedToEnd",value:function(){return this.iterations>0&&this.offset>=this.iterations*this.duration}},{key:"restart",value:function(){this._stop(),this.offset=0,this._start()}},{key:"pause",value:function(){this._stop()}},{key:"reverse",value:function(){this.direction=-this.direction}}],[{key:"build",value:function(e,r){return delete e.animationSettings,e.options=lt(e.options,e.root,"91c80d77"),e.animations.map((function(t){var r=lt(t.s,e.root,"91c80d77");for(var i in delete t.s,e.animationSettings||(e.animationSettings=n({},r)),r)r.hasOwnProperty(i)&&(t[i]=r[i])})),(e=function(t,n){if($=n,!t||!t.root||!Array.isArray(t.animations))return null;for(var e=document.getElementsByTagName("svg"),r=!1,i=0;i<e.length;i++)if(e[i].id===t.root&&!e[i].svgatorAnimation){(r=e[i]).svgatorAnimation=!0;break}if(!r)return null;var u=t.animations.map((function(t){return it(r,t)})).filter((function(t){return!!t}));return u.length?{element:r,animations:u,animationSettings:t.animationSettings,options:t.options||void 0}:null}(e,r))?{el:e.element,options:e.options||{},player:new t(e.animations,e.animationSettings,e.options)}:null}},{key:"push",value:function(t){return this.build(t)}},{key:"init",value:function(){var t=this,n=window.__SVGATOR_PLAYER__&&window.__SVGATOR_PLAYER__["91c80d77"];Array.isArray(n)&&n.splice(0).forEach((function(n){return t.build(n)}))}}]),t}();!function(){for(var t=0,n=["ms","moz","webkit","o"],e=0;e<n.length&&!window.requestAnimationFrame;++e)window.requestAnimationFrame=window[n[e]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[n[e]+"CancelAnimationFrame"]||window[n[e]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(n){var e=Date.now(),r=Math.max(0,16-(e-t)),i=window.setTimeout((function(){n(e+r)}),r);return t=e+r,i},window.cancelAnimationFrame=window.clearTimeout)}();var ft=function(t,n){var e=!1,r=null;return function(i){e&&clearTimeout(e),e=setTimeout((function(){return function(){for(var i=0,u=window.innerHeight,o=0,a=window.innerWidth,l=t.parentNode;l instanceof Element;){var s=window.getComputedStyle(l);if("visible"!==s.overflowY||"visible"!==s.overflowX){var f=l.getBoundingClientRect();"visible"!==s.overflowY&&(i=Math.max(i,f.top),u=Math.min(u,f.bottom)),"visible"!==s.overflowX&&(o=Math.max(o,f.left),a=Math.min(a,f.right))}if(l===l.parentNode)break;l=l.parentNode}e=!1;var c=t.getBoundingClientRect(),h=Math.min(c.height,Math.max(0,i-c.top)),v=Math.min(c.height,Math.max(0,c.bottom-u)),d=Math.min(c.width,Math.max(0,o-c.left)),y=Math.min(c.width,Math.max(0,c.right-a)),g=(c.height-h-v)/c.height,p=(c.width-d-y)/c.width,m=Math.round(g*p*100);null!==r&&r===m||(r=m,n(m))}()}),100)}},ct=function(){function t(n,e,i){r(this,t),e=Math.max(1,e||1),e=Math.min(e,100),this.el=n,this.onTresholdChange=i&&i.call?i:function(){},this.tresholdPercent=e||1,this.currentVisibility=null,this.visibilityCalculator=ft(n,this.onVisibilityUpdate.bind(this)),this.bindScrollWatchers(),this.visibilityCalculator()}return u(t,[{key:"bindScrollWatchers",value:function(){for(var t=this.el.parentNode;t&&(t.addEventListener("scroll",this.visibilityCalculator),t!==t.parentNode&&t!==document);)t=t.parentNode}},{key:"onVisibilityUpdate",value:function(t){var n=this.currentVisibility>=this.tresholdPercent,e=t>=this.tresholdPercent;if(null===this.currentVisibility||n!==e)return this.currentVisibility=t,void this.onTresholdChange(e);this.currentVisibility=t}}]),t}();function ht(t){return g(t)+""}function vt(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:" ";return t&&t.length?t.map(ht).join(n):""}function dt(t){return ht(t.x)+","+ht(t.y)}function yt(t){return t?null==t.a||t.a>=1?"rgb("+t.r+","+t.g+","+t.b+")":"rgba("+t.r+","+t.g+","+t.b+","+t.a+")":"transparent"}function gt(t){return t?"url(#"+t+")":"none"}var pt={f:null,i:V,u:function(t,n){return function(e){var r=n(e);t.setAttribute("rx",ht(r.x)),t.setAttribute("ry",ht(r.y))}}},mt={f:null,i:function(t,n,e){return 0===t?n:1===t?e:{width:F(t,n.width,e.width),height:F(t,n.height,e.height)}},u:function(t,n){return function(e){var r=n(e);t.setAttribute("width",ht(r.width)),t.setAttribute("height",ht(r.height))}}};Object.freeze({M:2,L:2,Z:0,H:1,V:1,C:6,Q:4,T:2,S:4,A:7});var bt={},wt=null;function At(t){var n=function(){if(wt)return wt;if("object"!==("undefined"==typeof document?"undefined":e(document))||!document.createElementNS)return{};var t=document.createElementNS("http://www.w3.org/2000/svg","svg");return t&&t.style?(t.style.position="absolute",t.style.opacity="0.01",t.style.zIndex="-9999",t.style.left="-9999px",t.style.width="1px",t.style.height="1px",wt={svg:t}):{}}().svg;if(!n)return function(t){return null};var r=document.createElementNS(n.namespaceURI,"path");r.setAttributeNS(null,"d",t),r.setAttributeNS(null,"fill","none"),r.setAttributeNS(null,"stroke","none"),n.appendChild(r);var i=r.getTotalLength();return function(t){var n=r.getPointAtLength(i*t);return{x:n.x,y:n.y}}}function xt(t){return bt[t]?bt[t]:bt[t]=At(t)}function kt(t,n,e,r){if(!t||!r)return!1;var i=["M",t.x,t.y];if(n&&e&&(i.push("C"),i.push(n.x),i.push(n.y),i.push(e.x),i.push(e.y)),n?!e:e){var u=n||e;i.push("Q"),i.push(u.x),i.push(u.y)}return n||e||i.push("L"),i.push(r.x),i.push(r.y),i.join(" ")}function _t(t,n,e,r){var i=arguments.length>4&&void 0!==arguments[4]?arguments[4]:1,u=kt(t,n,e,r),o=xt(u);try{return o(i)}catch(t){return null}}function St(t,n,e,r){var i=1-r;return i*i*t+2*i*r*n+r*r*e}function Ot(t,n,e,r){return 2*(1-r)*(n-t)+2*r*(e-n)}function Mt(t,n,e,r){var i=arguments.length>4&&void 0!==arguments[4]&&arguments[4],u=_t(t,n,null,e,r);return u||(u={x:St(t.x,n.x,e.x,r),y:St(t.y,n.y,e.y,r)}),i&&(u.a=Et(t,n,e,r)),u}function Et(t,n,e,r){return Math.atan2(Ot(t.y,n.y,e.y,r),Ot(t.x,n.x,e.x,r))}function jt(t,n,e,r,i){var u=i*i;return i*u*(r-t+3*(n-e))+3*u*(t+e-2*n)+3*i*(n-t)+t}function Pt(t,n,e,r,i){var u=1-i;return 3*(u*u*(n-t)+2*u*i*(e-n)+i*i*(r-e))}function It(t,n,e,r,i){var u=arguments.length>5&&void 0!==arguments[5]&&arguments[5],o=_t(t,n,e,r,i);return o||(o={x:jt(t.x,n.x,e.x,r.x,i),y:jt(t.y,n.y,e.y,r.y,i)}),u&&(o.a=Bt(t,n,e,r,i)),o}function Bt(t,n,e,r,i){return Math.atan2(Pt(t.y,n.y,e.y,r.y,i),Pt(t.x,n.x,e.x,r.x,i))}function Rt(t,n,e){return t+(n-t)*e}function Tt(t,n,e){var r=arguments.length>3&&void 0!==arguments[3]&&arguments[3],i={x:Rt(t.x,n.x,e),y:Rt(t.y,n.y,e)};return r&&(i.a=Nt(t,n)),i}function Nt(t,n){return Math.atan2(n.y-t.y,n.x-t.x)}function Ct(t,n,e){var r=arguments.length>3&&void 0!==arguments[3]&&arguments[3];if(Lt(n)){if(qt(e))return Mt(n,e.start,e,t,r)}else if(Lt(e)){if(n.end)return Mt(n,n.end,e,t,r)}else{if(n.end)return e.start?It(n,n.end,e.start,e,t,r):Mt(n,n.end,e,t,r);if(e.start)return Mt(n,e.start,e,t,r)}return Tt(n,e,t,r)}function Ft(t,n,e){var r=Ct(t,n,e,!0);return r.a=function(t){return arguments.length>1&&void 0!==arguments[1]&&arguments[1]?t+Math.PI:t}(r.a)/m,r}function Lt(t){return!t.type||"corner"===t.type}function qt(t){return null!=t.start&&!Lt(t)}var Vt=new T;var Dt={f:function(t){return t?t.join(" "):""},i:function(t,n,r){if(0===t)return n;if(1===t)return r;var i=n.length;if(i!==r.length)return N(t,n,r);for(var u,o=new Array(i),a=0;a<i;a++){if((u=e(n[a]))!==e(r[a]))return N(t,n,r);if("number"===u)o[a]=C(t,n[a],r[a]);else{if(n[a]!==r[a])return N(t,n,r);o[a]=n[a]}}return o}},zt={f:null,i:Y,u:function(t,n){return function(e){var r=n(e);t.setAttribute("x1",ht(r[0])),t.setAttribute("y1",ht(r[1])),t.setAttribute("x2",ht(r[2])),t.setAttribute("y2",ht(r[3]))}}},Yt={f:ht,i:C},Gt={f:ht,i:L},Ut={f:function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:" ";return t&&t.length>0&&(t=t.map((function(t){return g(t,4)}))),vt(t,n)},i:function(t,n,e){var r,i,u,o=n.length,a=e.length;if(o!==a)if(0===o)n=G(o=a,0);else if(0===a)a=o,e=G(o,0);else{var l=(u=(r=o)*(i=a)/function(t,n){for(var e;n;)e=n,n=t%n,t=e;return t||1}(r,i))<0?-u:u;n=U(n,Math.floor(l/o)),e=U(e,Math.floor(l/a)),o=a=l}for(var s=[],f=0;f<o;f++)s.push(g(F(t,n[f],e[f])));return s}};function $t(t,n,e){return t.map((function(t){return function(t,n,e){var r=t.v;if(!r||"g"!==r.t||r.s||!r.v||!r.r)return t;var i=e.getElementById(r.r),u=i&&i.querySelectorAll("stop")||[];return r.s=r.v.map((function(t,n){var e=u[n]&&u[n].getAttribute("offset");return{c:t,o:e=g(parseInt(e)/100)}})),delete r.v,t}(t,0,e)}))}var Wt={gt:"gradientTransform",c:{x:"cx",y:"cy"},rd:"r",f:{x:"x1",y:"y1"},to:{x:"x2",y:"y2"}};function Ht(t,n,r,i,u,o,a,l){return $t(t,0,l),n=function(t,n,e){for(var r,i,u,o=t.length-1,a={},l=0;l<=o;l++)(r=t[l]).e&&(r.e=n(r.e)),r.v&&"g"===(i=r.v).t&&i.r&&(u=e.getElementById(i.r))&&(a[i.r]={e:u,s:u.querySelectorAll("stop")});return a}(t,i,l),function(i){var u=r(i,t,Qt);if(!u)return"none";if("c"===u.t)return yt(u.v);if("g"===u.t){if(!n[u.r])return gt(u.r);var o=n[u.r];return function(t,n){for(var e=t.s,r=e.length;r<n.length;r++){var i=e[e.length-1].cloneNode();i.id=Zt(i.id),t.e.appendChild(i),e=t.s=t.e.querySelectorAll("stop")}for(var u=0,o=e.length,a=n.length-1;u<o;u++)e[u].setAttribute("stop-color",yt(n[Math.min(u,a)].c)),e[u].setAttribute("offset",n[Math.min(u,a)].o)}(o,u.s),Object.keys(Wt).forEach((function(t){if(void 0!==u[t])if("object"!==e(Wt[t])){var n,r="gt"===t?(n=u[t],Array.isArray(n)?"matrix("+n.join(" ")+")":""):u[t],i=Wt[t];o.e.setAttribute(i,r)}else Object.keys(Wt[t]).forEach((function(n){if(void 0!==u[t][n]){var e=u[t][n],r=Wt[t][n];o.e.setAttribute(r,e)}}))})),gt(u.r)}return"none"}}function Qt(t,e,r){if(0===t)return e;if(1===t)return r;if(e&&r){var i=e.t;if(i===r.t)switch(e.t){case"c":return{t:i,v:z(t,e.v,r.v)};case"g":if(e.r===r.r){var u={t:i,s:Xt(t,e.s,r.s),r:e.r};return e.gt&&r.gt&&(u.gt=Y(t,e.gt,r.gt)),e.c?(u.c=q(t,e.c,r.c),u.rd=F(t,e.rd,r.rd)):e.f&&(u.f=q(t,e.f,r.f),u.to=q(t,e.to,r.to)),u}}if("c"===e.t&&"g"===r.t||"c"===r.t&&"g"===e.t){var o="c"===e.t?e:r,a="g"===e.t?n({},e):n({},r),l=a.s.map((function(t){return{c:o.v,o:t.o}}));return a.s="c"===e.t?Xt(t,l,a.s):Xt(t,a.s,l),a}}return N(t,e,r)}function Xt(t,n,e){if(n.length===e.length)return n.map((function(n,r){return Jt(t,n,e[r])}));for(var r=Math.max(n.length,e.length),i=[],u=0;u<r;u++){var o=Jt(t,n[Math.min(u,n.length-1)],e[Math.min(u,e.length-1)]);i.push(o)}return i}function Jt(t,n,e){return{o:L(t,n.o,e.o||0),c:z(t,n.c,e.c||{})}}function Zt(t){return t.replace(/-fill-([0-9]+)$/,(function(t,n){return"-fill-"+(+n+1)}))}var Kt={blur:V,brightness:F,contrast:F,"drop-shadow":function(t,n,e){return 0===t?n:1===t?e:{blur:V(t,n.blur,e.blur),offset:q(t,n.offset,e.offset),color:z(t,n.color,e.color)}},grayscale:F,"hue-rotate":C,invert:F,opacity:F,saturate:F,sepia:F};function tn(t,n,e){if(0===t)return n;if(1===t)return e;var r=n.length;if(r!==e.length)return N(t,n,e);for(var i,u=[],o=0;o<r;o++){if(n[o].type!==e[o].type)return n;if(!(i=Kt[n[o].type]))return N(t,n,e);u.push({type:n.type,value:i(t,n[o].value,e[o].value)})}return u}var nn={blur:function(t){return t?function(n){t.setAttribute("stdDeviation",dt(n))}:null},brightness:function(t,n,e){return(t=rn(e,n))?function(n){n=ht(n),t.map((function(t){return t.setAttribute("slope",n)}))}:null},contrast:function(t,n,e){return(t=rn(e,n))?function(n){var e=ht((1-n)/2);n=ht(n),t.map((function(t){t.setAttribute("slope",n),t.setAttribute("intercept",e)}))}:null},"drop-shadow":function(t,n,e){var r=e.getElementById(n+"-blur");if(!r)return null;var i=e.getElementById(n+"-offset");if(!i)return null;var u=e.getElementById(n+"-flood");return u?function(t){r.setAttribute("stdDeviation",dt(t.blur)),i.setAttribute("dx",ht(t.offset.x)),i.setAttribute("dy",ht(t.offset.y)),u.setAttribute("flood-color",yt(t.color))}:null},grayscale:function(t){return t?function(n){t.setAttribute("values",vt(function(t){return[.2126+.7874*(t=1-t),.7152-.7152*t,.0722-.0722*t,0,0,.2126-.2126*t,.7152+.2848*t,.0722-.0722*t,0,0,.2126-.2126*t,.7152-.7152*t,.0722+.9278*t,0,0,0,0,0,1,0]}(n)))}:null},"hue-rotate":function(t){return t?function(n){return t.setAttribute("values",ht(n))}:null},invert:function(t,n,e){return(t=rn(e,n))?function(n){n=ht(n)+" "+ht(1-n),t.map((function(t){return t.setAttribute("tableValues",n)}))}:null},opacity:function(t,n,e){return(t=e.getElementById(n+"-A"))?function(n){return t.setAttribute("tableValues","0 "+ht(n))}:null},saturate:function(t){return t?function(n){return t.setAttribute("values",ht(n))}:null},sepia:function(t){return t?function(n){return t.setAttribute("values",vt(function(t){return[.393+.607*(t=1-t),.769-.769*t,.189-.189*t,0,0,.349-.349*t,.686+.314*t,.168-.168*t,0,0,.272-.272*t,.534-.534*t,.131+.869*t,0,0,0,0,0,1,0]}(n)))}:null}};var en=["R","G","B"];function rn(t,n){var e=en.map((function(e){return t.getElementById(n+"-"+e)||null}));return-1!==e.indexOf(null)?null:e}var un={fill:Ht,"fill-opacity":Gt,stroke:Ht,"stroke-opacity":Gt,"stroke-width":Yt,"stroke-dashoffset":{f:ht,i:C},"stroke-dasharray":Ut,opacity:Gt,transform:function(t,n,r,i){if(!(t=function(t,n){if(!t||"object"!==e(t))return null;var r=!1;for(var i in t)t.hasOwnProperty(i)&&(t[i]&&t[i].length?(t[i].forEach((function(t){t.e&&(t.e=n(t.e))})),r=!0):delete t[i]);return r?t:null}(t,i)))return null;var u=function(e,i,u){var o=arguments.length>3&&void 0!==arguments[3]?arguments[3]:null;return t[e]?r(i,t[e],u):n&&n[e]?n[e]:o};return n&&n.a&&t.o?function(n){var e=r(n,t.o,Ft);return Vt.recomposeSelf(e,u("r",n,C,0)+e.a,u("k",n,q),u("s",n,q),u("t",n,q)).toString()}:function(t){return Vt.recomposeSelf(u("o",t,Ct,null),u("r",t,C,0),u("k",t,q),u("s",t,q),u("t",t,q)).toString()}},"#filter":function(t,n,e,r,i,u,o,a){if(!n.items||!t||!t.length)return null;var l=function(t,n){var e=(t=t.map((function(t){return t&&nn[t[0]]?(n.getElementById(t[1]),nn[t[0]](n.getElementById(t[1]),t[1],n)):null}))).length;return function(n){for(var r=0;r<e;r++)t[r]&&t[r](n[r].value)}}(n.items,a);return l?(t=function(t,n){return t.map((function(t){return t.e=n(t.e),t}))}(t,r),function(n){l(e(n,t,tn))}):null},"#line":zt,points:{f:vt,i:Y},d:Dt,r:Yt,"#size":mt,"#radius":pt,_:function(t,n){if(Array.isArray(t))for(var e=0;e<t.length;e++)this[t[e]]=n;else this[t]=n}},on=function(t){!function(t,n){if("function"!=typeof n&&null!==n)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(n&&n.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),n&&l(t,n)}(o,t);var n,e,i=(n=o,e=s(),function(){var t,r=a(n);if(e){var i=a(this).constructor;t=Reflect.construct(r,arguments,i)}else t=r.apply(this,arguments);return c(this,t)});function o(){return r(this,o),i.apply(this,arguments)}return u(o,null,[{key:"build",value:function(t){var n=h(a(o),"build",this).call(this,t,un);if(!n)return null;var e=n.el,r=n.options,i=n.player;return function(t,n,e){if("click"===e.start){var r=function(){switch(e.click){case"freeze":return!t._running&&t.reachedToEnd()&&(t.offset=0),t._running?t.pause():t.play();case"restart":return t.offset>0?t.restart():t.play();case"reverse":var n=!t._rollingBack&&t._running,r=t.reachedToEnd();return n||r&&1===t.fill?(t.pause(),r&&(t.offset=t.duration-1),t._rollback()):r?t.restart():t.play();case"none":default:return!t._running&&t.offset?t.restart():t.play()}};return void n.addEventListener("click",r)}if("hover"===e.start)return n.addEventListener("mouseenter",(function(){return t.reachedToEnd()?t.restart():t.play()})),void n.addEventListener("mouseleave",(function(){switch(e.hover){case"freeze":return t.pause();case"reset":return t.stop();case"reverse":return t.pause(),t._rollback();case"none":default:return}}));if("scroll"===e.start)return void new ct(n,e.scroll||25,(function(n){n?t.reachedToEnd()?t.restart():t.play():t.pause()}));t.play()}(i,e,r),i}}]),o}(st);return on.init(),on}));
											(function(s,i,o,w){w[o]=w[o]||{};w[o][s]=w[o][s]||[];w[o][s].push(i);})('91c80d77',{"root":"rocket","animations":[{"elements":{"rocket-star-1":{"transform":{"data":{"t":{"x":-572,"y":-388}},"keys":{"o":[{"t":0,"v":{"x":570.510064,"y":388.491854,"type":"corner"}},{"t":142.85714285714286,"v":{"x":570.510064,"y":654.569436,"type":"corner"}},{"t":1000,"v":{"x":570.510064,"y":122.414271,"type":"corner"}},{"t":1142.857142857143,"v":{"x":570.510064,"y":388.491854,"type":"corner"}}]}},"opacity":[{"t":71.42857142857143,"v":1},{"t":142.85714285714286,"v":0},{"t":1000,"v":0},{"t":1071.4285714285716,"v":1}]},"rocket-star-3":{"transform":{"keys":{"o":[{"t":0,"v":{"x":538.207717,"y":197.766579,"type":"corner"}},{"t":214.28571428571428,"v":{"x":538.207717,"y":596.882953,"type":"corner"}},{"t":1071.4285714285716,"v":{"x":538.207717,"y":64.727788,"type":"corner"}},{"t":1142.857142857143,"v":{"x":538.207717,"y":197.766579,"type":"corner"}}]}},"opacity":[{"t":0,"v":1},{"t":142.85714285714286,"v":1},{"t":214.28571428571428,"v":0},{"t":1071.4285714285716,"v":0},{"t":1142.857142857143,"v":1}]},"rocket-star-2":{"transform":{"keys":{"o":[{"t":0,"v":{"x":249.357545,"y":283.142574,"type":"corner"}},{"t":214.28571428571428,"v":{"x":249.357545,"y":682.258948,"type":"corner"}},{"t":1071.4285714285716,"v":{"x":249.357545,"y":150.103783,"type":"corner"}},{"t":1142.857142857143,"v":{"x":249.357545,"y":283.142574,"type":"corner"}}]}},"opacity":[{"t":0,"v":1},{"t":142.85714285714286,"v":1},{"t":214.28571428571428,"v":0},{"t":1071.4285714285716,"v":0},{"t":1142.857142857143,"v":1}]},"rocket-rocket":{"transform":{"data":{"t":{"x":-400.000015,"y":-401}},"keys":{"o":[{"t":0,"v":{"x":400.000015,"y":401,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":571.4285714285714,"v":{"x":400.000015,"y":381,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":1142.857142857143,"v":{"x":400.000015,"y":401,"type":"corner","start":{"x":400.000015,"y":401},"end":{"x":400.000015,"y":401}}}]}}},"rocket-big-flame":{"d":[{"t":0,"v":["M",430,530,"C",430,530,474.91,568.16,400,692,"C",325.09,568.16,370,530,370,530]},{"t":142.85714285714286,"v":["M",430,530,"C",430,530,490,600,400,692,"C",310,600,370,530,370,530]},{"t":285.7142857142857,"v":["M",430,530,"C",430,530,474.91,568.16,400,692,"C",325.09,568.16,370,530,370,530]},{"t":428.57142857142856,"v":["M",430,530,"C",430,530,490,600,400,692,"C",310,600,370,530,370,530]},{"t":571.4285714285714,"v":["M",430,530,"C",430,530,474.91,568.16,400,692,"C",325.09,568.16,370,530,370,530]},{"t":714.2857142857143,"v":["M",430,530,"C",430,530,490,600,400,692,"C",310,600,370,530,370,530]},{"t":857.1428571428571,"v":["M",430,530,"C",430,530,474.91,568.16,400,692,"C",325.09,568.16,370,530,370,530]},{"t":1000,"v":["M",430,530,"C",430,530,490,600,400,692,"C",310,600,370,530,370,530]},{"t":1142.857142857143,"v":["M",430,530,"C",430,530,474.91,568.16,400,692,"C",325.09,568.16,370,530,370,530]}]},"rocket-small-flame":{"d":[{"t":0,"v":["M",421.64,530,"C",421.64,530,452.41,573.39,400,660,"C",347.59,573.39,378.36,530,378.36,530]},{"t":142.85714285714286,"v":["M",421.64,530,"C",421.64,530,460,590,400.000001,650,"C",340,590,378.36,530,378.36,530]},{"t":285.7142857142857,"v":["M",421.64,530,"C",421.64,530,452.41,573.39,400,660,"C",347.59,573.39,378.36,530,378.36,530]},{"t":428.57142857142856,"v":["M",421.64,530,"C",421.64,530,460,590,400.000001,650,"C",340,590,378.36,530,378.36,530]},{"t":571.4285714285714,"v":["M",421.64,530,"C",421.64,530,452.41,573.39,400,660,"C",347.59,573.39,378.36,530,378.36,530]},{"t":714.2857142857143,"v":["M",421.64,530,"C",421.64,530,460,590,400.000001,650,"C",340,590,378.36,530,378.36,530]},{"t":857.1428571428571,"v":["M",421.64,530,"C",421.64,530,452.41,573.39,400,660,"C",347.59,573.39,378.36,530,378.36,530]},{"t":1000,"v":["M",421.64,530,"C",421.64,530,460,590,400.000001,650,"C",340,590,378.36,530,378.36,530]},{"t":1142.857142857143,"v":["M",421.64,530,"C",421.64,530,452.41,573.39,400,660,"C",347.59,573.39,378.36,530,378.36,530]}]},"rocket-line1":{"transform":{"keys":{"o":[{"t":0,"v":{"x":580.522499,"y":127.867351,"type":"corner"}},{"t":285.7142857142857,"v":{"x":580.522499,"y":660.022516,"type":"corner"}}]}},"opacity":[{"t":0,"v":0},{"t":71.42857142857143,"v":1},{"t":214.28571428571428,"v":1},{"t":285.7142857142857,"v":0}]},"rocket-line2":{"transform":{"keys":{"o":[{"t":571.4285714285714,"v":{"x":219.434259,"y":142.027675,"type":"corner"}},{"t":857.1428571428571,"v":{"x":219.434259,"y":674.18284,"type":"corner"}}]}},"opacity":[{"t":571.4285714285714,"v":0},{"t":642.8571428571429,"v":1},{"t":785.7142857142858,"v":1},{"t":857.1428571428571,"v":0}]}},"s":"MDRA2MjhiMzI3NEDg1ODI3MTg0ENzk3ZjdlMzID0YTQxNDE0NDOQyTjNlNDg0NTTQ3NDE0NDQyJNDhINDU0NzQCxNDQ0MzNjMzSI3NDc5ODI3NBTczODQ3OTdmFN2UzMjRhNDEKzYzMyNzk4NDTc1ODI3MTg0NJzk3ZjdlODMzTMjRhNDAzYzMDyNzY3OTdjN2XMzMjRhNDEzYP08zMjcxN2M4RNDc1ODI3ZTcYxODQ3NTMyNGSE3NjcxN2M4MSzc1TzNjMzJJFODM4MDc1NzUK3NDMyNGE0MTXNlQjQ0OGQ/"}],"options":"MDIAxMDhmMzY4NX1A4ODc1ODY4RODM2NGUzNjgTwODM3NVM3ODJM2OTE/"},'__SVGATOR_PLAYER__',window)]]>
										</script>
									</svg>
							
							
							<div class="rocket-start-bar">
								<div class="rocket-stage rocket-stage-1"></div>
								<div class="rocket-stage rocket-stage-2"></div>
								<div class="rocket-stage rocket-stage-3"></div>
								<div class="rocket-stage rocket-stage-4"></div>
								<div class="rocket-stage rocket-stage-5"></div>
							</div>
							
							
							<button class="btn btn-size-big"><span>Get Started</span></button>
						</div>
					</div>
				</div>
			</div>

		</div>

	</section>


<script>

( function( $ ) {
	$(".work-cycle-list .card").on('click', function(e) {
		
		if( $( this ).attr( "data-rocket" ) == 0 ){
			$( this ).attr( "data-rocket", 1 );
		}else{
			$( this ).attr( "data-rocket", 0 );
		}
		
		let StageStarted = 0;
		
		$(".work-cycle-list .card").each(function(i, obj) {
			if( $( obj ).attr( "data-rocket") == 1 ){
				StageStarted += 1;
			}
		});
		
		
		$(".rocket-start-bar .rocket-stage").each(function(i, obj) {
			if( StageStarted >= i+1 ){
				if( !($( obj ).hasClass( "active" )) ){
					$( obj ).addClass( "active" );
				}
			}else{
				$( obj ).removeClass( "active" );
			}

		});
		
		if(StageStarted >= 1){
			for( i = 1; StageStarted >= i; i++ ){
				if( !($( "#rocket" ).hasClass( "Stage-Started-" + i )) ){
					$( "#rocket" ).addClass( "Stage-Started-" + i );
				}
			}
			for( i = (StageStarted+1); i <= 5; i++ ){
				console.log(i);
				if( $( "#rocket" ).hasClass( "Stage-Started-" + i ) ){
					$( "#rocket" ).removeClass( "Stage-Started-" + i );
				}
			}
		}
		if(StageStarted == 0){
			if( $( "#rocket" ).hasClass( "Stage-Started-" + 1 ) ){
				$( "#rocket" ).removeClass( "Stage-Started-" + 1 );
			}			
		}
		if(StageStarted == 3){
			$("#rocket-rocket").css("transform", "");
		}
		if(StageStarted <= 2){
			$("#rocket-rocket").css("transform", "none");
		}
	});
}( jQuery ) );

</script>


	<section id="our-experts" class="container-section">
		<div class="container">
			<h2 class="title">Our Experts</h2>
		</div>
		<div class="container">
			<div class="best-list best-list-1">
				<div class="best-list-item">
					<img src="/wp-content/themes/clp-theme/images/Andrea.png" class="employee-img" alt="Andrea" />
					<p class="employee-information">
						<span class="employee-name">Andrea Bianchi</span>
						<span class="job-name">Full Stack Developer</span>
					</p>
				</div>
				<div class="best-list-item">
					<img src="/wp-content/themes/clp-theme/images/Ela.png" class="employee-img" alt="Ela" />
					<p class="employee-information">
						<span class="employee-name">Ela Compton</span>
						<span class="job-name">Designer</span>
					</p>
				</div>
				<div class="best-list-item">
					<img src="/wp-content/themes/clp-theme/images/Alex.png" class="employee-img" alt="Alex" />
					<p class="employee-information">
						<span class="employee-name">Alex Sg</span>
						<span class="job-name">Project Manager</span>
					</p>
				</div>
				<div class="best-list-item">
					<img src="/wp-content/themes/clp-theme/images/Johnny.png" class="employee-img" alt="Johnny" />
					<p class="employee-information">
						<span class="employee-name">Johnny Law</span>
						<span class="job-name">SEO</span>
					</p>
				</div>
			</div>
			<div class="best-list best-list-2">
				<div class="best-list-item">
					<img src="/wp-content/themes/clp-theme/images/Diana.png" class="employee-img" alt="Diana" />
					<p class="employee-information">
						<span class="employee-name">Diana Greer</span>
						<span class="job-name">Project Manager</span>
					</p>
				</div>
				<div class="best-list-item">
					<img src="/wp-content/themes/clp-theme/images/Akhil.png" class="employee-img" alt="Akhil" />
					<p class="employee-information">
						<span class="employee-name">Akhil Kale</span>
						<span class="job-name">Full Stack Developer</span>
					</p>
				</div>
				<div class="best-list-item">
					<img src="/wp-content/themes/clp-theme/images/Noële.png" class="employee-img" alt="Noële" />
					<p class="employee-information">
						<span class="employee-name">Noële Fay</span>
						<span class="job-name">HR Manager</span>
					</p>
				</div>
				<div class="best-list-item">
					<img src="/wp-content/themes/clp-theme/images/Anisa.png" class="employee-img" alt="Anisa" />
					<p class="employee-information">
						<span class="employee-name">Anisa Phelps</span>
						<span class="job-name">Designer</span>
					</p>
				</div>
			</div>
		</div>
	</section>


	<section id="l-p-examples" class="container-section">

		<div class="container">
		
			<h2 class="title">Landing Page Examples</h2>
		
			<div class="stacked-card-list owl-carousel owl-theme">
				
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/1.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/2.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/3.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/4.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/5.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/6.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/7.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/8.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/9.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/10.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/1.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/2.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/3.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/4.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/5.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/6.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/7.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/8.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/9.png" />
				</div>
				<div class="card item">
					<img src="/wp-content/themes/clp-theme/images/10.png" />
				</div>
			</div>
		</div>
	</section>

	<section id="block-contact" class="container-section">

		<div class="container">
			<h2 class="title"><?php _e('Write to us',''); ?></h3>
			<div class="contact-form">
				<div class="google-map">
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15994.231915294618!2d10.695065214111331!3d59.92751267008763!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46416dc536d1cbd9%3A0xc73d067bd668308a!2sEssendrops%20gate%203%2C%200368%20Oslo%2C%20Norway!5e0!3m2!1sen!2sru!4v1668250149420!5m2!1sen!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
				<div class="cf7">
					<h3 class="title"><?php _e('We will be happy to advise you',''); ?></h3>
					<?php echo do_shortcode('[contact-form-7 id="8" title="Contact form 1"]'); ?>
					<div class="wpcf7-response-output" aria-hidden="true"></div>
				</div>
			</div>
			
		</div>
		
	</section>


	</main>
<?php
get_footer();