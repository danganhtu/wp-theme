<?php 

/**
@ khai báo hằng giá trị
	@ THEME_URL = lấy đường dẫn thư mục theme
	@ CORE = lấy đường dẫn thư mục /core
**/

define( 'THEME_URL', get_stylesheet_directory_uri() );
define( 'CORE', THEME_URL . "/core" );

/**
@ nhúng fine /core/init.php
**/

require_once( CORE . "/init.php" );

/** 
@ thiết lập chiều rộng nội dung
**/

if ( !isset($content_width) ){
	$content_width = 620;
}

/**
@ khai báo chức năng trong theme
**/

if ( !function_exists('thachpham_theme_setup') ){
	function thachpham_theme_setup(){

		/** thiết lập textdomain **/
		$language_folder = THEME_URL . '/languages';
		load_theme_textdomain( 'thachpham', $language_folder );
		
		/** Tự động thêm link RSS lên <head> **/
		add_theme_support( 'automatic-feed-links'); 

		/**Theme post thumbnail**/
		add_theme_support( 'post-thumbnails' );

		/** Post format */
		add_theme_support('post-formats', array(
			'image',
			'video',
			'gallery',
			'quote',
			'link'
			));

		/** Them title-tag  */
		add_theme_support('title-tag');

		/**Theme custom background **/
		$default_background = array(
			'default-color' => '#e8e8e8'
			);
		add_theme_support('custom-background',$default_background);

		/**Theme menu*/
		register_nav_menu('primary-menu',__('Primary Menu','thachpham'));

		/**Tao sidebar */
		$sidebar = array(
			'name' => __('Main Sidebar','thachpham'),
			'id' => 'main-sidebar', 
			'description' => __('Default sidebar'),
			'class' => 'main-sidebar',  
			'before_title' => '<h3 class="widgettitle">',  
			'after_title' => '</h3>'
			);
		register_sidebar($sidebar);

	}
	add_action( 'init' ,'thachpham_theme_setup' );
}

/*-----------
Template Function */
if ( !function_exists('thachpham_header')){
	function thachpham_header(){ ?>
		 <div class="site-name">
			<?php
			if ( is_home()){
				printf('<h1><a href="%1$s" title="%2$s">%3$s</h1>',
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename')
					);
			} else {
				printf('<p><a href="%1$s" title="%2$s">%3$s</p>',
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename')
					);
			}

			?>
		</div>
		<div class="site-description"><?php bloginfo('description'); ?></div><?php 
	}
}

/** Thiet lap menu **/
if (!function_exists('thachpham_menu')){
	function thachpham_menu($menu){
		$menu= array(
			'theme_location' => $menu,
			'container' => 'nav',
			'container_class' => $menu
			);
		wp_nav_menu($menu);
	}
}


/** Ham Tao phan trang **/
if (!function_exists('thachpham_pagination')){
	function thachpham_pagination(){
		if ($GLOBALS['wp_query']->max_num_pages < 2){
			return '';
		}?>
		<nav class="pagination" role="navigation">
			<?php if (get_next_post_link() ) : ?>
				<div class="prev"><?php next_posts_link( __('Older Posts','thachpham')); ?></div>
			<?php endif;?>
			<?php if (get_previous_posts_link()) :?>
				<div class="next"><?php previous_posts_link(__('Newest Posts','thachpham'));?></div>
			<?php endif; ?>
		</nav>
		<?php
	}
}


/**Ham hien thi thumbnail**/

if( !function_exists('thachpham_thumbnail')){
	function thachpham_thumbnail($size) {
		if (!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')) : ?>
		<figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure>
	<?php endif; ?>
	<?php }
}

/**thachpham_entry_header = hien thi tieu de post**/

if (!function_exists('thachpham_entry_header')){
	function thachpham_entry_header(){ ?>

	<?php if (is_single()) : ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"  title="<?php the_title();?>"><?php the_title(); ?></a></h1>
	<?php else: ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"  title="<?php the_title();?>"><?php the_title(); ?></a></h2>

	<?php endif; }
}

/**thachpham_entry_meta = lay du lieu post **/

if (!function_exists('thachpham_entry_meta')) {
	function thachpham_entry_meta(){?>
		<?php if (!is_page()): ?>
			<div class="entry-meta">
				<?php
					printf( __('<span class="author"> Posted by %1$s', 'thachpham'),
						get_the_author());

						printf(__('<span class="date-published"> at %1$s', 'thachpham'),
							get_the_date());
						printf(__('<span class="category"> in %1$s ', 'thachpham'),
							get_the_category_list( ','));

						/*if ( comment_open()):
							echo '<span class="meta-reply">';
								comments_popup_link(
									__('Leave a comment', 'thachpham'),
									__('One comment', 'thachpham'),
									__('% comments', 'thachpham'),
									__('Read all comments', 'thachpham')
									);
								echo '</span>';
						endif; */
				?>
			</div>
		<?php endif; ?>
	<?php }
}

/**thachphan_entry_content**/
if (!function_exists('thachpham_entry_content')){
	function thachpham_entry_content(){
		if(!is_single()){
			the_excerpt();
		}else{
			the_content();
			/*phan trang trong single*/
			$link_pages = array(
				'before'=>__('<p>Page: ','thachpham'),
				'after' => '</p>',  
				'nextpagelink' => __('Next Page', 'thachpham'),  
				'previouspagelink' => __('Previous Page','thachpham')
				);
			wp_link_pages($link_pages);
		}
	}
}

/* read more */
function thachpham_readmore(){
	return '<a class="readmore" href="'.get_permalink(get_the_ID()).'">'.__('...[Read More]','thachpham').'</a>';
}

add_filter('excerpt_more', 'thachpham_readmore');


/*thachpham_entry_tag*/
if(!function_exists('thachpham_entry_tag')){
	function thachpham_entry_tag(){
		if(has_tag()):
			echo '<div class="entry-tag">';
			printf(__('Tagged in %1$s','thachpham' ), get_the_tag_list('',','));
			echo '</div>';
		endif; 
	}
}