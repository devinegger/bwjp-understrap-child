<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

if(!empty($_POST['email'])) {
	$user_email = $_POST['email'];

	create_verification($user_email);
}

if(!empty($_POST['code'])) {
	$verification_code = $_POST['code'];

	echo $verification_code;

	$verification_id = $_COOKIE["Verification_ID"];

	echo '<br/>' . $verification_id;

	verify_code($verification_id, $verification_code);

}

// get this current section(category)s ID
$current_section = get_queried_object();
$current_section_id = $current_section->term_id;

$image_arr = get_field('section_image','category_'.$current_section_id);
$image_ID = $image_arr['ID']; 
$image_URL = $image_arr['url']; 
$image_alt = $image_arr['alt']; 
$image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'img-fluid', 'alt'=>$image_alt) );

?>

<main class="site-main resource-sections" id="main" style="background-color: #000F9F;">
	
	<?php if(check_verification() === "unsent") : ?>
	
	<div class="container">
		<div class="row -5 justify-content-center text-white">
			<div class="col">
				<p>The resources on this site require email verification in order to view them.</p>  
				<p>Submit your email below and we will send you a verification code.</p>
				<p>Once you've received the email copy and paste it back here to get access.</p>
				<form method="post">
					<label for="email-for-verification">Your Email</label>
					<input type="text" id="email-for-verification" name="email">
					<input type="submit" value="submit">
				</form>
			</div>
		</div>
	</div>

	<?php elseif(check_verification() === "sent" || check_verification() === "unverified" ): ?>

		<div class="container">
			<div class="row p-5 justify-content-center text-white">
				<div class="col">
					<p>The resources on this site require email verification in order to view them.</p>  
					<p>Submit email verification code below: </p>
					<form method="post">
						<label for="verification-code">Verification Code</label>
						<input type="text" id="verification-code" name="code">
						<input type="submit" value="submit">
					</form>
				</div>
			</div>
		</div>

	<?php elseif(check_verification() === "verified"): ?>

	<div class="container-fluid" id="content">
		<div class="row pt-5 justify-content-center text-white">
			<div class="col-md-7 p-0">
				<?= $image; ?>
			</div>
			<div class="col-md-5 px-5">
				<h2 class="text-uppercase"><?php echo single_cat_title('' , true ); ?></h2>
				<?php echo category_description(); ?>
			</div>
		</div>
		<div class="row">
			<?php get_template_part('sidebar-templates/sections','sidebar'); ?>
			<div class="col-md-9 bg-white">
				<div class="row">
					<?php if(have_posts()) : ?>
						<?php while(have_posts()): the_post(); ?>
							<div class="col-md-6 p-3">
								<div class="section-resources text-info p-3" style="background-color: #C6D2DB;">
									<h3 class="text-uppercase"><a class="text-info text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<?php understrap_posted_on(); ?>
									<p><?= wp_trim_words(get_the_content(), 20); ?></p>
									<?php $resource_tags = get_the_tags(); ?>
									<span class="text-uppercase">TAGS: 
										<?php foreach($resource_tags as $tag): ?>
											<?= '#' . $tag->name . ' ' ?>
										<?php endforeach; ?>
									</span>
								</div>
							</div>
						<?php endwhile; ?>
						<?php understrap_pagination(); ?>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- .row -->
	</div><!-- #content -->

	<?php endif; ?>

</main><!-- #main -->

<?php
get_footer();
