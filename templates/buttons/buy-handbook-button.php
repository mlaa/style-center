
<div class="handbook-ad">


	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/handbook-covers.png" class="handbook-ad--image" alt="MLA Handbook, 8th edition">
	<h2 class="handbook-ad--title" style="margin-bottom: 0;"><em>MLA Handbook</em>, 8th&nbsp;edition</h2>
	<p style="margin: 0; font-size: 0.8rem;">Available for fall 2020 and spring 2021 courses</p>

	<div class="button-group">
		<button class="button--slim button--left__dark" id="e-book-drop-down" role="button" aria-role="button" tabindex="0">Get the e-book <span class="rotate-90 select-handle dashicons dashicons-leftright"></span>
			<ul class="menu-hide" id="drop-down-menu">
				<li><a href="http://www.mla12.org/kindle" target="_blank" >Kindle <span class="rotate-45 ext-link dashicons dashicons-arrow-up-alt"></span></a></li>
				<li><a href="http://www.mla12.org/itunes" target="_blank" >Apple <span class="rotate-45 ext-link dashicons dashicons-arrow-up-alt"></span></a></li>
				<li><a href="http://www.mla12.org/kobo" target="_blank">Kobo <span class="rotate-45 ext-link dashicons dashicons-arrow-up-alt"></span></a></li>
				<li><a href="http://www.mla12.org/nook" target="_blank">Nook <span class="rotate-45 ext-link dashicons dashicons-arrow-up-alt"></span></a></li>
			</ul>

		</button>
		<a class="button--slim button--right__light" href="http://www.mla12.org/mla-bookstore">Order a print copy</a>
	</div>

	<script>

		const dropDownButton = jQuery('#e-book-drop-down')

		dropDownButton.on('mouseenter touchstart click', function() {
			jQuery(this).addClass('drop-down')
			jQuery('#drop-down-menu').addClass('drop-down-sub-menu')
		});

		dropDownButton.on('mouseleave touchmove click', function() {
			if ( !jQuery('#drop-down-menu').hasClass('clicked') ) {
				jQuery(this).removeClass('drop-down')
				jQuery('#drop-down-menu').removeClass('drop-down-sub-menu');
			}
		})

		dropDownButton.on('click', function(e) {

			jQuery('#drop-down-menu').toggleClass('clicked');
			if ( !jQuery('#drop-down-menu').is(':visible') ) { //|| dropDownButton.is(':hover') ) {
				jQuery('#drop-down-menu').addClass('drop-down-sub-menu')
			} else  {
				jQuery('#drop-down-menu').removeClass('drop-down-sub-menu')
			}
		})



	</script>

</div>
