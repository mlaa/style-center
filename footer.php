<?php
/**
 * Footer
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

use \do_action;
use \dynamic_sidebar;
use \wp_footer;

?>
		</main>

		<?php do_action( 'get_footer' ); ?>

		<footer>

			<ul class="nav nav-pills">
				<li><a href="https://www.mla.org/About-Us/About-the-MLA">About the MLA</a></li>
				<li><a href="https://www.mla.org/About-Us/Support/Donate-to-the-MLA">Donate</a></li>
				<li><a href="https://www.mla.org/About-Us/Contact">Contact</a></li>
			</ul>

			<ul class="nav nav-social">
				<li class="item-1"><a class="social-pill-facebook" href="https://www.facebook.com/modernlanguageassociation/"></a></li>
				<li class="item-2"><a class="social-pill-linkedin" href="https://www.linkedin.com/company/modern-language-association"></a></li>
				<li class="item-3"><a class="social-pill-twitter" href="https://twitter.com/mlanews"></a></li>
			</ul>

			<p><a href="/terms-of-service/">Terms of Service</a> ● © 2016 Modern Language Association of America</p>

		</footer>

		<?php wp_footer(); ?>

	</body>

</html>
