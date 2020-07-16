<?php
/**
 * Cenote functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cenote
 */

if ( ! function_exists( 'cenote_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cenote_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cenote, use a find and replace
		 * to change 'cenote' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cenote', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Enable support for post formats
		 *
		 * @link https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'tg-menu-primary'    => esc_html__( 'Primary', 'cenote' ),
			'tg-menu-header-top' => esc_html__( 'Header Top', 'cenote' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'cenote_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_editor_style();
	}
endif;
add_action( 'after_setup_theme', 'cenote_setup' );

/**
 * Custom image sizes for theme.
 */
function cenote_image_sizes() {

	// Set default post thumbnail. 16:9.
	set_post_thumbnail_size( 768, 432, true );
	// Large full width image.
	add_image_size( 'cenote-full-width', 1160, 653, true );
	// 3:4.
	add_image_size( 'cenote-post', 600, 400, true );
	// Auto size.
	add_image_size( 'cenote-post-auto', 600, 9999, false );

}
add_action( 'after_setup_theme', 'cenote_image_sizes' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cenote_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cenote_content_width', 640 );
}

add_action( 'after_setup_theme', 'cenote_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cenote_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cenote' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cenote' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'cenote' ),
		'id'            => 'footer-sidebar-1',
		'description'   => esc_html__( 'Add widgets here to show on footer 1.', 'cenote' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'cenote' ),
		'id'            => 'footer-sidebar-2',
		'description'   => esc_html__( 'Add widgets here to show on footer 2.', 'cenote' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'cenote' ),
		'id'            => 'footer-sidebar-3',
		'description'   => esc_html__( 'Add widgets here to show on footer 3.', 'cenote' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'cenote' ),
		'id'            => 'footer-sidebar-4',
		'description'   => esc_html__( 'Add widgets here to show on footer 4.', 'cenote' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'cenote_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cenote_scripts() {
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'cenote-style', get_stylesheet_uri() );
	wp_enqueue_style( 'themegrill-icons', get_template_directory_uri() . '/assets/css/themegrill-icons' . $suffix . '.css', '1.0' );

	wp_enqueue_script( 'cenote-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $suffix . '.js', array(), '20151215', true );
	wp_enqueue_script( 'hammer', get_template_directory_uri() . '/assets/js/hammer' . $suffix . '.js', array(), '2.0.8', true );

	// Load Swiper on Gallery post format.
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper' . $suffix . '.js', array(), '4.2.0', true );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper' . $suffix . '.css', '4.2.0' );

	// Load headroom if sticky header is enabled.
	if ( true === get_theme_mod( 'cenote_header_sticky_option', true ) ) {
		wp_enqueue_script( 'headroom', get_template_directory_uri() . '/assets/js/headroom' . $suffix . '.js', array(), '0.9.4', true );
	}

	// Only load masonry script if enabled.
	if ( ( is_archive() || is_home() ) && 'tg-archive-style--masonry' === get_theme_mod( 'cenote_archive_style', 'tg-archive-style--masonry' ) ) {
		wp_enqueue_script( 'masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd' . $suffix . '.js', array(), '4.2.0', true );
		wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd' . $suffix . '.js', array(), '4.1.4', true );
	}

	wp_enqueue_script( 'cenote-custom', get_template_directory_uri() . '/assets/js/cenote-custom' . $suffix . '.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'cenote_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Meta boxes.
 */
require get_template_directory() . '/inc/meta-boxes.php';

/**
 * Widget for showing recent post
 */
require get_template_directory() . '/inc/widgets/class-cenote-widget-recent-posts.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Add Kirki customizer library file
 */
require get_template_directory() . '/inc/kirki/kirki.php';

/**
 * Add Kirki options file
 */
require get_template_directory() . '/inc/customizer/kirki-customizer.php';

/**
 * Add theme css class control file
 */
require get_template_directory() . '/inc/template-css-class.php';

/**
 * Load breadcrumb trail file if enabled.
 */
if ( true === get_theme_mod( 'cenote_breadcrumb', true ) ) {
	require get_template_directory() . '/inc/compatibility/class-breadcrumb-trail.php';
}

/**
 * Load Demo Importer Configs.
 */
if ( class_exists( 'TG_Demo_Importer' ) ) {
	require get_template_directory() . '/inc/demo-config.php';
}

/**
 * Load TGMPA Configs.
 */
require_once get_template_directory() . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/tgm-plugin-activation/tgmpa-cenote.php';


function create_product_post_type()
{
 
    /*
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
    $label = array(
        'name' => 'Items', //Tên post type dạng số nhiều
        'singular_name' => 'Items' //Tên post type dạng số ít
    );
 
    /*
     * Biến $args là những tham số quan trọng trong Post Type
     */
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Đăng sản phẩm', //Mô tả của post type
        'supports' => array(
            'title',
            'comments'

        ), //Các tính năng được hỗ trợ trong post type
        'taxonomies' => array( 'category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-products', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => false, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );
 
    register_post_type('item', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
 
}
/* Kích hoạt hàm tạo custom post type */
add_action('init', 'create_product_post_type');

function create_order_post_type()
{
 
    /*
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
    $label = array(
        'name' => 'Orders', //Tên post type dạng số nhiều
        'singular_name' => 'Orders' //Tên post type dạng số ít
    );
 
    /*
     * Biến $args là những tham số quan trọng trong Post Type
     */
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Đơn hàng', //Mô tả của post type
        'supports' => array(
            'title',
            'author'
        ), //Các tính năng được hỗ trợ trong post type
        'taxonomies' => array( 'category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-cart', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => false, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );
 
    register_post_type('bill', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
 
}
/* Kích hoạt hàm tạo custom post type */
add_action('init', 'create_order_post_type');

/* Kích hoạt hàm tạo custom post type */
add_action('init', 'create_product_post_type');

function create_brand_post_type()
{
 
    /*
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
    $label = array(
        'name' => 'Brand', //Tên post type dạng số nhiều
        'singular_name' => 'Brands' //Tên post type dạng số ít
    );
 
    /*
     * Biến $args là những tham số quan trọng trong Post Type
     */
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Thương hiệu', //Mô tả của post type
        'supports' => array(
            'title',
            'author'
        ), //Các tính năng được hỗ trợ trong post type
        'taxonomies' => array( 'category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-cart', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => false, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );
 
    register_post_type('brand', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
 
}
/* Kích hoạt hàm tạo custom post type */
add_action('init', 'create_brand_post_type');

function searchfilter($query) {
    $query->set('post_type',array('item'));
	return $query;
}
 
add_filter('pre_get_posts','searchfilter');

class Random_Post extends WP_Widget {
 
    function __construct() {
        parent::__construct(
            'random_post',
            'Bài ngẫu nhiên',
            array( 'description'  =>  'Widget hiển thị bài viết ngẫu nhiên' )
        );
    }
 
    function form( $instance ) {
 
        $default = array(
            'title' => 'Tiêu đề widget',
            'post_number' => 10
        );
        $instance = wp_parse_args( (array) $instance, $default );
        $title = esc_attr($instance['title']);
        $post_number = esc_attr($instance['post_number']);
 
        echo '<p>Nhập tiêu đề <input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$title.'"/></p>';
        echo '<p>Số lượng bài viết hiển thị <input type="number" class="widefat" name="'.$this->get_field_name('post_number').'" value="'.$post_number.'" placeholder="'.$post_number.'" max="30" /></p>';
 
    }
 
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['post_number'] = strip_tags($new_instance['post_number']);
        return $instance;
    }
 
    function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'] );
        $post_number = $instance['post_number'];
 
        echo $before_widget;
        echo $before_title.$title.$after_title;
        $random_query = new WP_Query('posts_per_page='.$post_number.'&orderby=rand');

        if ($random_query->have_posts()):
            echo "<ol>";
            while( $random_query->have_posts() ) :
                $random_query->the_post(); ?>
 
                <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
 
            <?php endwhile;
            echo "</ol>";
        endif;
        echo $after_widget;
 
    }
 
}
 
add_action( 'widgets_init', 'create_randompost_widget' );
function create_randompost_widget() {
    register_widget('Random_Post');
}