<style>
	.centered {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		height: 67vh;
		font-size: 30px;
		font-weight: bold;
		margin-top: 25px;
 	}

	 .entry-summary {
		margin-bottom: 20px;
	}

	#link_text {
		color: black;
		text-decoration: none;
	}

	#link_text:hover {
		color: #006309;
	}

	#read_more_button {
		border-color: #235787;
		color: #235787;
		display: inline-block;
		line-height: 1;
		border: 1px solid #235787;
		border-top-color: rgb(35, 87, 135);
		border-right-color: rgb(35, 87, 135);
		border-bottom-color: rgb(35, 87, 135);
		border-left-color: rgb(35, 87, 135);
		color: #235787;
		border-radius: 2px;
		cursor: pointer;
		padding: 7px 17px;
		font-size: 13px;
		text-transform: uppercase;
		letter-spacing: .5px;
		transition: transform .18s,border .18s,background .18s,box-shadow .18s,opacity .18s,color .18s;
		font-weight: 500;
	}

	#read_more_button:hover {
		background-color: #235787;
		color: white;
	}

	#read_more_button:active {
		background-color: #235787;
		color: white;
	}
	.mouse-img {
		max-height: 200px;
	}

	.page-content {
		display: flex;
		flex-direction: column;
		width: 100%;
		min-height: 45vh;

	}

	.page-content article {
		border-bottom: 1px solid #ddd; /* Add a 1px solid line at the bottom */
		padding-bottom: 20px; /* Add some padding to create some space between articles */
	}

	.article-card {
		display: flex;
		flex-flow: column nowrap;
		word-wrap: break-word;
		overflow-wrap: break-word;
	}

	.entry-title {
		word-wrap: break-word;
		overflow-wrap: break-word;
	}
	@media screen and (min-width: 768px) {
		.centered {
			height: 70vh;
			font-size: 38px;
		}
		img {
			max-height: 400px;
		}
		.article-card {
			display: flex;
			flex-flow: column nowrap;
			margin: 20px;
			word-wrap: break-word;
			overflow-wrap: break-word;
		}
	}

</style>
<?php
/**
 * The template for displaying search results.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<main id="content" class="site-main" role="main">
	<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
		<header class="page-header">
			<h1 class="entry-title">
				<?php esc_html_e( 'Search results for: ', 'hello-elementor' ); ?>
				<span><?php echo get_search_query(); ?></span>
			</h1>
		</header>
	<?php endif; ?>
	<div class="page-content">
		<?php
			// Get the search query from the user input
			$search_query = sanitize_text_field(trim(get_search_query()));
			$args_ids = array();
			$args_ids_testimonials = array();
			$first_value = $search_query;
			$second_value = $search_query;

			if (!empty($search_query)) {
				if (strpos($search_query, ' ') !== false) {
					$search_seperate_query = explode(' ', $search_query);
					$first_value = $search_seperate_query[0];
					$second_value = $search_seperate_query[1];
				}
				$args_ids = array(
					'post_type' => 'person',
					'fields' => 'ids',
					'meta_query' => array(
						'relation' => 'OR',
						array(
							'key' => 'person_first_name',
							'value' => $search_query,
							'compare' => 'LIKE'
						),
						array(
							'key' => 'person_last_name',
							'value' => $search_query,
							'compare' => 'LIKE'
						),
						array(
							'relation' => 'AND',
							array(
								'key' => 'person_first_name',
								'value' => $first_value,
								'compare' => 'LIKE'
							),
							array(
								'key' => 'person_last_name',
								'value' => $second_value,
								'compare' => 'LIKE'
							),
						),
						array(
							'key' => 'person_email',
							'value' => $search_query,
							'compare' => 'LIKE'
						),
						array(
							'key' => 'person_organization',
							'value' => $search_query,
							'compare' => 'LIKE'
						),
						array(
							'key' => 'person_personal_website',
							'value' => $search_query,
							'compare' => 'LIKE'
						),
					),
				);
			}

			$query_ids = new WP_Query( $args_ids );
			$ids = $query_ids->posts;

			if (!$ids) {
				$ids = array('dskfjasldkfjkbfjlkdjhljfdag;lafgjafgjfgoirwetret');
			}

			if (!empty($search_query)) {
				$args_ids_testimonials = array(
					'post_type' => 'testimonial',
					'sentence' => true,
					'fields' => 'ids',
					'meta_query' => array(
						'relation' => 'OR',
						array(
							'key' => 'testimonial_person',
							'value' => $ids,
							'compare' => 'IN',
						),
						array(
							'key' => 'testimonial_statement',
							'value' => $search_query,
							'compare' => 'LIKE',
						)
					),
				);
			}

			$query_ids_testimonials = new WP_Query( $args_ids_testimonials );
			$ids_testimonials = $query_ids_testimonials->posts;

			if (!$ids_testimonials) {
				$ids_testimonials = array('dskfjasldkfjkbfjlkdjhljfdag;lafgjafgjfgoirwetret');
			}

			$args_without_meta_query = array(
				'post_type' => array('project'), // Set the post type to search in\
				's' => $search_query,
				'meta_query' => array(
					array(
						'key' => 'show_in_dropdown',
						'value' => true,
						'compare' => 'LIKE',
					)
				)
			);

			$args_news = array(
				'post_type' => array('news'),
				'post_status'	=> 'publish',
				's' => $search_query,
			);

			$project_query_post_content = new WP_Query( $args_without_meta_query );

			$args = array(
				'post_type' => 'project', // Set the post type to search in\
				'meta_query' => array( // Set the meta query to search for the year and semester
					'relation' => 'AND',
					array(
						'relation' => 'OR',
						array(
							'key' => 'project_semester',
							'value' => $search_query,
							'compare' => 'LIKE'
						),
						array(
							'key' => 'project_year',
							'value' => $search_query,
							'compare' => 'LIKE'
						),
						array(
							'relation' => 'AND',
							array(
								'key' => 'project_semester',
								'value' => $first_value,
								'compare' => 'LIKE'
							),
							array(
								'key' => 'project_year',
								'value' => $second_value,
								'compare' => 'LIKE'
							),
						),
						array(
							'key' => 'project_sponsor',
							'value' => $ids,
							'compare' => 'IN',
						),
						array(
							'key' => 'project_instructor',
							'value' => $ids,
							'compare' => 'IN',
						),
						array(
							'key' => 'project_students',
							'value' => implode(' ', $ids),
							'compare' => 'LIKE',
						),
						array(
							'key' => 'project_testimonials',
							'value' => implode(',', $ids_testimonials),
							'compare' => 'LIKE',
						),
					),
					array(
						'key' => 'show_in_dropdown',
						'value' => true,
						'compare' => 'LIKE',
					),
				),
			);

			$taxonomy_args = array (
				'post_type' => 'project',
				'tax_query' => array(
					array(
						'taxonomy' => 'tech-stack',
						'field' => 'slug',
						'terms' => $search_query,
					)
				),
			);

			// Start the search query for the project content type
			$project_query = new WP_Query( $args );
			$taxonomy_query = new WP_Query( $taxonomy_args );
			$news_query = new WP_Query( $args_news );
			$new_query = new WP_Query();
			$final_query = new WP_Query();
			$new_query_with_news = new WP_Query();
			$new_query->posts = array_merge($project_query->posts, $project_query_post_content->posts);
			$new_query_with_news->posts = array_merge($new_query->posts, $news_query->posts);
			$merged_posts = array_merge(
				array_filter($new_query_with_news->posts),
				array_filter($taxonomy_query->posts)
			);
			$unique_posts = array_unique($merged_posts, SORT_REGULAR);
			$final_query->posts = array_values($unique_posts);
			//populate post_count count for the loop to work correctly
			$final_query->post_count = $project_query->post_count + $project_query_post_content->post_count + $taxonomy_query->post_count;
		?>
		<?php if ( count($final_query->posts) > 0 ) : ?>
			<?php for ( $i = 0; $i < count( $final_query->posts ); $i++ ) : ?>
				<article class="article-card">
					<?php
						$final_query->the_post();
						$indropdown = get_post_meta( get_the_ID(), 'show_in_dropdown', true ); // added true parameter to get a single value
						if ( get_post_type() == "news" ) :
					?>
					<h2><a id="link_text" href="<?php the_permalink(); ?>"><?php the_title();?> &#32; | News</a></h2>
						<div class="entry-summary"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></div>
						<a style="width: 113.5px;" href="<?php echo esc_url( get_permalink() ); ?>" >
							<div id="read_more_button" type="button">
								Read More &rarr;
							</div>
						</a>
					<?php else: ?>
						<h2>
							<a id="link_text" href="<?php echo esc_url( get_permalink() ); ?>" >
								<?php echo esc_html( get_the_title() ); ?>
							</a>
						</h2>
						<?php
							$excerpt = get_the_excerpt();
							$excerpt = wp_trim_words( $excerpt, 30, '...' );
							printf("<div class='entry-summary'>%s</div>", $excerpt);
						?>
						<a style="width: 113.5px;" href="<?php echo esc_url( get_permalink() ); ?>" >
							<div id="read_more_button" type="button">
								Read More &rarr;
							</div>
						</a>
					<?php endif; ?>
				</article>
			<?php endfor; ?>
		<?php else : ?>
			<div class="centered">
				<p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for.', 'hello-elementor' ); ?></p>
				<img class="mouse-image" src="https://cdn-icons-png.flaticon.com/512/2683/2683099.png"/>
			</div>
		<?php endif; ?>
	</div>

	<?php wp_link_pages(); ?>

	<?php
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) :
		?>
		<nav class="pagination"  role="navigation">
			<?php /* Translators: HTML arrow */ ?>
			<div class="nav-previous"><?php next_posts_link( sprintf( __( '%s older', 'hello-elementor' ), '<span class="meta-nav" style="color: black;">&larr;</span>' ) ); ?></div>
			<?php /* Translators: HTML arrow */ ?>
			<div class="nav-next"><?php previous_posts_link( sprintf( __( 'newer %s', 'hello-elementor' ), '<span class="meta-nav" style="color: black;">&rarr;</span>' ) ); ?></div>
		</nav>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
</main>
