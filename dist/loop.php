<?php
if (is_single()) {
?>
	<div class="max-w-2xl mx-auto">
		<div class="text-center mb-6">
			<span class="text-base md:text-lg">
				<?php
				$catagories  = get_the_category();
				foreach ($catagories as $cat) {
				?>
					<a href="<?php echo get_category_link($cat->cat_ID) ?>">
						<span class="inline-block py-1 px-3 text-xs font-semibold bg-blue-100 text-blue-600 rounded-xl mr-3"><?php echo $cat->name ?></span>
					</a>
				<?php
				}
				?>
				<span class="text-blueGray-500 text-sm"><?php echo get_the_date() ?></span>
			</span>
			<h2 class="text-4xl md:text-5xl mt-4 font-bold font-heading">
				<?php the_title(); ?>
			</h2>
		</div>
	</div>
	<div class="my-4">
		<?php the_post_thumbnail($size = 'post-thumbnail', array("class" => "w-full object-cover rounded")); ?>
	</div>
	<div class="content">
		<?php
		the_content(
			sprintf(
				/* translators: %s: post title */
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			)
		);
		?>
	</div>

	<div class="w-full">
		<div class="px-6 py-10 bg-white shadow rounded hover-up-5 wow animate__ animate__fadeIn  border border-gray-100 hover:border-gray-200 animated animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s;">
			<div class="flex items-center mb-4">
				<div class="flex-shrink-0 mr-3 inline-block">
					<?php
					echo get_avatar($post->post_author, $size = '60', $default = '', $alt = '', $args = array('class' => 'mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10'));
					?>
				</div>
				<div class="pl-4"><strong class="mt-6 mb-1 text-md"><?php echo get_the_author_meta("display_name", $post->post_author); ?></strong>
					<p class="text-xs mt-3"><?php echo get_the_author_meta("description", $post->post_author); ?></p>
				</div>
			</div>
		</div>
	</div>

<?php
} else {
?>
	<div class="pt-4 grid grid-cols-2 md:grid-cols-3">
		<?php 
		while (have_posts()) {
			the_post(); 
			?>
			<div class="px-3 mb-12 border m-1 border-gray-200">
				<a href="<?php the_permalink() ?>">
					<?php the_post_thumbnail($size = 'post-thumbnail', array("class" => "h-80 w-full object-cover rounded")); ?>
				</a>
				<p class="mt-6 text-sm text-blue-400">
					<?php
					$catagories  = get_the_category();
					foreach ($catagories as $cat) {
						?>
							<a href="<?php echo get_category_link($cat->cat_ID) ?>">
								<span class="inline-block py-1 px-3 text-xs font-semibold bg-blue-100 text-blue-600 rounded-xl mr-3"><?php echo $cat->name ?></span>
							</a>
						<?php
						}
					?>

					<span class="text-blueGray-400 text-xs"><?php echo get_the_date() ?></span>
				</p>
				<h3 class="my-2 text-2xl font-bold font-heading"><a class="hover:text-blue-500" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<p class="text-blueGray-400 leading-loose"><?php the_excerpt(); ?></p>
			</div>
		<?php } ?>
	</div>

<?php
}
