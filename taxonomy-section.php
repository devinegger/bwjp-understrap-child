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


// if making any edits to the function of verification below, or resourse template you must make those same edits to archive.php
// it should be made known here that this level of unfinishedness is from direction of Anja Harris @ Whittier - DGE

// user has not been sent verification yet
$verification_sent = false;

if(!empty($_POST['email']) && $_POST['email']!== '') {
	$user_email = $_POST['email'];
	create_verification($user_email);

	// change value of email to 'sent' to help with forms before cookies are available
	$_POST['email'] = 'sent'; 
}

if(!empty($_POST['code'])) {
	$verification_code = $_POST['code'];
	$verification_id = $_COOKIE["bwjpVID"];

 	if(verify_code($verification_id, $verification_code)) {
		$_POST['code'] = 'verified'; // clear post data
	} else {
		$_POST['code'] = 'unverified'; // clear post data
	};
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

	<?php if(!isset($_COOKIE['bwjpVS']) && $_POST['email']!== 'sent') : 
	// if cookie is not set, email has not yet been submitted, show email form 
	// cookie is not set at page refresh, so also checking to $_POST 'email' variables ?>

	
		<div class="container-fluid bg-success text-info">
			<div class="row py-5 text-white">
				<div class="col text-center text-info fs-5">
					<p class="fw-bold fs-4">The resources on this site require email verification in order to view them.</p>  
					<p>Submit your email below and we will send you a verification code.</p>
					<p>Once you've received the email copy and paste it back here to get access.</p>
					<form method="post" action="#">
						<label for="email-for-verification" class="screen-reader-text">Your Email</label>
						<input type="text" id="email-for-verification" name="email" size="60" placeholder="EMAIL ADDRESS">
						<input class="btn d-block text-center m-auto mt-3" type="submit" value="submit" role="button">
					</form>
				</div>
			</div>
		</div>

	<?php elseif(($_COOKIE['bwjpVS'] === '0' && $_POST['code'] !== 'verified') || $_POST['email'] === 'sent' ): 
	// if cookie is set, but not set to 0, user has not been verified yet 
	// cookie is not set at page refresh, so also checking $_POST 'code' and $_POST 'email' variables ?>

		<div class="container-fluid bg-success text-info">
			<div class="row py-5 justify-content-center text-white">
				<div class="col text-center text-info fs-5">
					<p class="fw-bold fs-4">We've sent a verification code to the email address you submitted.</p>
					<p>Be sure to check the spam folder.  If you're having trouble accessing your code, please contact us for help.</p>
					<p>Submit email verification code below: </p>
					<form method="post">
						<label for="verification-code" class="screen-reader-text">Verification Code</label>
						<input type="text" id="verification-code" name="code" size="60" placeholder="VERIFICATION CODE">
						<input class="btn d-block text-center m-auto mt-3" type="submit" value="submit" role="button">
					</form>
				</div>
			</div>
		</div>

	<?php elseif($_COOKIE['bwjpVS'] === '1' || $_POST['code']==='verified'): // user is verified, show content ?>

		<div class="container-fluid" id="content">
			<div class="row justify-content-center text-white">
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
								<div class="col-md-6 p-3 h-100">
									<div class="section-resources text-info p-3 h-100" style="background-color: #C6D2DB;">
										<h3 class="text-uppercase fs-6"><a class="text-info text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<?php understrap_posted_on(); ?>
										<p><?= wp_trim_words(get_the_content(), 20); ?></p>
										<?php $resource_terms = get_the_terms(get_the_ID(), 'class'); ?>
										<span class="text-uppercase">CLASS: 
											<?php foreach($resource_terms as $term): ?>
												<a href="/?class=<?= $term->slug ?>"> <?= '#' . $term->name . ' ' ?></a><?= ", "?>
											<?php endforeach;  ?>
										</span>
									</div>
								</div>
							<?php endwhile; ?>
							<?php understrap_pagination(); ?>
						<? else: ?>
							<p class="p-5 text-info">No resources found.</p>
						<?php endif; ?>
					</div>
				</div>
			</div><!-- .row -->
		</div><!-- #content -->

	<?php elseif($_POST['code'] === 'unverified') : ?>

		<div class="container">
			<div class="row p-5 justify-content-center text-white">
				<div class="col">
					<p>The code you enterred is not valid, please refresh the page and try again</p>
				</div>
			</div>
		</div>

	<?php else : ?>

		<div class="container">
			<div class="row p-5 justify-content-center text-white">
				<div class="col">
					<p>Something went wrong, please close the browser and try again. </p>
				</div>
			</div>
		</div>

	<?php endif; ?>

</main><!-- #main -->

<?php
get_footer();
