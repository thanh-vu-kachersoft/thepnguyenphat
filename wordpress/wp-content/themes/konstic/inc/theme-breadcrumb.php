<?php
/**
 * Theme Breadcrumb 
 * @package konstic
 * @since 1.0.0
 */

class Konstic_Breadcrumb {
	/**
	 * Array of bread Konstic_Breadcrumb
	 *
	 * @var array
	 */
	protected $breadcrumbs = [];

	/**
	 * Default options
	 *
	 * @var array
	 */
	protected $defaults = [
		'home'      => 'Home',
		'blog'      => 'Blog',
		'blog_url'  => '',
		'seperator' => false,
		'class'     => 'page-list',
		'element'   => 'ul'
	];

	/**
	 * The options array
	 *
	 * @var array
	 */
	protected $options = [];

	/**
	 * Constructor
	 *
	 * @param array $options
	 */
	public function __construct( array $options = [] ) {
		// Determine if the front page is blog archive or page.
		if ( get_option( 'show_on_front' ) == 'page' ) {
			$this->defaults['blog_url'] = get_permalink( get_option( 'page_for_posts' ) );
		} else {
			$this->defaults['blog_url'] = esc_url( home_url() );
		}
		$this->defaults['home'] = esc_html__('Home','konstic');
		$this->defaults['blog'] = esc_html__('Blog','konstic');

		// Merge defaults with user passed options.
		$this->options = array_replace_recursive( $this->defaults, $options );

		// Build breadcrumbs.
		$this->doBreadcrumbs();
	}

	/**
	 * Create and display the breadcrumbs
	 *
	 * @return string
	 */
	public function theBreadcrumbs() {
		$breadcrumbs = $this->getBreadcrumbs();
		$count       = count( $breadcrumbs );
		$i           = 1;
		$el          = $this->options['element'];

		// Start the element
		$html = sprintf( '<%s class="%s">', $el, esc_attr($this->options['class']) );

		foreach ( $breadcrumbs as $crumb ) {
			// if a list wrap each item in a <li>
			if ( $el === 'ul' || $el === 'ol' ) {
				$html .= '<li>';
			}

			// If crumb has a url make a link
			if ( $crumb['url'] ) {
				$html .= sprintf( '<a href="%s">%s</a>', esc_url($crumb['url']), esc_html($crumb['title']) );

				// Otherwise make a span
			} else {
                $html .= sprintf( '<span>%s</span>', wp_kses($crumb['title'],konstic()->kses_allowed_html('all')) );
			}

			// Add seperators
			if ( $i < $count && ! empty( $this->options['seperator'] ) ) {
				$html .= sprintf( '<span class="sep">%s</span>', esc_html($this->options['seperator']) );
			}

			// if list, close <li> tag
			if ( $el === 'ul' || $el === 'ol' ) {
				$html .= '</li>';
			}

			$i ++;
		}

		// close the element
		$html .= sprintf( '</%s>', $el );

		echo wp_kses($html,konstic()->kses_allowed_html('all'));
	}

	/**
	 * Create and return the breadcrumbs array
	 *
	 * @return array
	 */
	public function getBreadcrumbs() {
		$breadcrumbs = $this->breadcrumbs;
		$breadcrumbs = apply_filters( 'konstic_get_breadcrumbs', $breadcrumbs );

		return $breadcrumbs;
	}

	/**
	 * Add breadcrumb to the array
	 *
	 * @param string $title
	 * @param string $url
	 */
	public function addBreadcrumb( string $title, string $url = null ) {
		$this->breadcrumbs[] = [
			'title' => $title,
			'url'   => empty( $url ) ? false : $url,
		];
	}

	/**
	 * Generate the breadcrumbs
	 *
	 * @package konstic
	 */
	public function doBreadcrumbs() {
		// Generate front page breadcrumb.
		if ( ! is_front_page() ) {
			$this->addBreadcrumb( $this->options['home'], home_url( '/' ) );
		}

		// Generate page breadcrumbs
		if ( is_page() && ! is_front_page() ) {
			// Get ancestors and add them to the trail.
			$ancestors = get_ancestors( get_the_ID(), 'page' );

			// Reverse for correct breadcrumb order.
			$ancestors = array_reverse( $ancestors );

			if ( count( $ancestors ) > 0 ) {
				foreach ( $ancestors as $page_id ) {
					$this->addBreadcrumb( get_the_title( $page_id ), get_permalink( $page_id ) );
				}
			}

			// Add breadcrumb for the current page.
			$this->addBreadcrumb( get_the_title() );
		}

		// Generate blog archive breadcrumb.
		if ( is_home() ) {
			$this->addBreadcrumb( $this->options['blog'] );
		}

		// Generate category archive breadcrumb.
		if ( is_category() ) {
			$this->addBreadcrumb( $this->options['blog'], $this->options['blog_url'] );

			// Add the category breadcrumb.
			$cat      = get_the_category();
			$cat      = $cat[0];
			$cat_link = esc_url( get_category_link( $cat->term_id ) );

			$this->addBreadcrumb( single_cat_title( '', false ) );
		}

		// Generate tag archive breadcrumb.
		if ( is_tag() ) {
			$tag_id = get_query_var( 'tag_id' );
			$url    = get_tag_link( $tag_id );

			$this->addBreadcrumb( single_tag_title( '', false ) );
		}

		// Generate date archive breadcrumbs.
		if ( is_date() ) {
			$this->addBreadcrumb( $this->options['blog'], $this->options['blog_url'] );

			// for day
			if ( is_day() ) {
				$this->addBreadcrumb( get_the_date() );
			}

			// for month
			if ( is_month() ) {
				$this->addBreadcrumb( get_the_date( 'F Y' ) );
			}

			// for year
			if ( is_year() ) {
				$this->addBreadcrumb( get_the_date( 'Y' ) );
			}
		}

		// Generate breadcrumb for single post.
		if ( is_singular( 'post' ) ) {
			// add the archive to breadcrumbs
			$this->addBreadcrumb( $this->options['blog'], $this->options['blog_url'] );
			$this->addBreadcrumb( get_the_title() );
		}

		// Generate post type archive breadcrumbs.
		if ( ! is_singular( 'page' ) && ! is_singular( 'post' ) ) {
			if ( is_post_type_archive() ) {
				$this->addBreadcrumb( post_type_archive_title( '', false ) );
			}

			if ( is_tax() ) {
				$taxonomy = get_query_var( 'taxonomy' );
				$term     = get_term_by( 'slug', get_query_var( $taxonomy ), $taxonomy );
				$tax_name = $term->name;

				$this->addBreadcrumb( $tax_name );
			}

			if ( is_singular() ) {
				$post_type = get_post_type( get_the_ID() );
				$obj       = get_post_type_object( $post_type );
				$this->addBreadcrumb( $obj->labels->name, get_post_type_archive_link( $post_type ) );
				$this->addBreadcrumb( get_the_title() );
			}
		}
	}
}

/**
 * Template Functions.
 */
if ( ! function_exists( 'konstic_breadcrumb' ) ) {
	/**
	 * Generate and display the breadcrumbs.
	 *
	 * @param array $options
	 *
	 * @package konstic
	 */
	function konstic_breadcrumb( $options = [] ) {
		$Crumbs = new Konstic_Breadcrumb( $options );
		$Crumbs->theBreadcrumbs();
	}
}

if ( ! function_exists( 'konstic_get_breadcrumbs' ) ) {
	/**
	 * Generate and return the breadcrumbs.
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function konstic_get_breadcrumbs( $options = [] ) {
		$Crumbs = new Konstic_Breadcrumb( $options );

		return $Crumbs->getBreadcrumbs();
	}
}

/**
 * Utility functions
 */
if ( ! function_exists( 'konstic_breadcrumb_array_insert' ) ) {
	/**
	 * Insert element to a specific index of the array.
	 *
	 * @param array $array
	 * @param mixed $element
	 * @param int $position
	 *
	 * @return array
	 */
	function konstic_breadcrumb_array_insert( array $array, $element, int $position ) {
		// if the array is empty just add the element to it
		if ( empty( $array ) ) {
			$array[] = $element;

			// if the position is a negative number
		} elseif ( is_numeric( $position ) && $position < 0 ) {
			// if negative position after count
			if ( count( $array ) + $position < 0 ) {
				$position = 0;
			} else {
				$position = count( $array ) + $position;
			}

			// try again with a positive position
			$array = array_insert( $array, $element, $position );

			// if array position already set
		} elseif ( isset( $array[ $position ] ) ) {
			// split array into two parts
			$split1 = array_slice( $array, 0, $position, true );
			$split2 = array_slice( $array, $position, null, true );

			// add new array element at between two parts
			$array = array_merge( $split1, array( $position => $element ), $split2 );

			// if position not set add to end of array
		} elseif ( is_null( $position ) ) {
			$array[] = $element;

			// if the position is not set
		} elseif ( ! isset( $array[ $position ] ) ) {
			$array[ $position ] = $element;
		}

		// clean up indexes
		$array = array_values( $array );

		return $array;
	}
}

