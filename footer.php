<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package factory
 */

?>

<!-- =============== footer ============== -->
<footer class="footer">
	<div class="footer-logo">
		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/img_logo.png" width="122" height="50" loading="lazy"></a>
	</div>
	<div class="footer-nav">
		<div class="inner">
			<ul class="footer-nav-list s-pc">
				<li><a href="#">HOME</a></li>
				<li><a href="#">Service</a></li>
				<li><a href="#">Case Study</a></li>
				<li><a href="#">Column</a></li>
				<li><a href="#">Operation Company</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="#">Privacy Policy</a></li>
				<li><a href="#">terms of service</a></li>
			</ul>
			<p>©2022 Roadmap inc.</p>
		</div>
	</div>
</footer>
<!-- ./footer -->
<?php wp_footer(); ?>
<!-- js -->
<script src="<?php print get_template_directory_uri(); ?>/assets/js/library/jquery.js"></script>
<script src="<?php print get_template_directory_uri(); ?>/assets/js/share.js"></script>

</body>

</html>