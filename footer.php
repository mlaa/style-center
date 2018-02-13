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

			<div class="mailing-list-inner">

				<h2 class="icon-inline-tag icon-mail">Get MLA Style News from <em>The Source</em></h2>
				<p>Be the first to read new posts and updates about MLA style.</p>

				<?php
					echo do_shortcode("[formassembly formid=4649903]");
				?>

			</div>

		</div>

		<footer>

			<ul class="nav nav-pills">
				<li><a href="/about-the-mla-style-center">About The MLA Style Center</a></li>
				<li><a href="https://www.mla.org/About-Us/Support/Donate-to-the-MLA">Donate</a></li>
				<li><a href="/contact-us">Contact</a></li>
			</ul>

			<ul class="nav nav-social">
				<li class="item-1"><a class="social-pill-facebook" href="https://www.facebook.com/modernlanguageassociation/"></a></li>
				<li class="item-2"><a class="social-pill-linkedin" href="https://www.linkedin.com/company/modern-language-association"></a></li>
				<li class="item-3"><a class="social-pill-twitter" href="https://twitter.com/mlastyle"></a></li>
			</ul>

			<p><span class="print-remove"><a href="/terms/">Terms of Service</a> ● </span>© <?php echo date("Y"); ?> Modern Language Association of America</p>

		</footer>

		<?php wp_footer(); ?>

	</body>

</html>
