<?php
/**
 * Footer
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

?>
		</main>

		<?php do_action( 'get_footer' ); ?>

		<div class="mailing-list">

			<form>

				<h2 class="icon-inline-tag icon-mail">Join Our Mailing List</h2>
				<p>Be the first to read new posts and updates about MLA Style.</p>

				<fieldset>
					<input name="first_name" type="text" value="" placeholder="First name">
					<input name="last_name" type="text" value="" placeholder="Last name">
					<input name="email" type="text" value="" placeholder="E-mail address">
					<button class="button">Subscribe</button>
				</fieldset>

			</form>

		</div>

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

			<p><span class="print-remove"><a href="/terms-of-service/">Terms of Service</a> ● </span>© 2016 Modern Language Association of America</p>

		</footer>

		<?php wp_footer(); ?>

	</body>

</html>
