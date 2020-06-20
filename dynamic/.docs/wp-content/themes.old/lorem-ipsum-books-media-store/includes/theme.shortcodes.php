<?php
if (!function_exists('lorem_ipsum_books_media_store_theme_shortcodes_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_theme_shortcodes_setup', 1 );
	function lorem_ipsum_books_media_store_theme_shortcodes_setup() {
		add_filter('lorem_ipsum_books_media_store_filter_googlemap_styles', 'lorem_ipsum_books_media_store_theme_shortcodes_googlemap_styles');
	}
}

if (!function_exists('lorem_ipsum_books_media_store_wp_theme_setup_fix')) {
    add_action('lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_wp_theme_setup_fix' );
    function lorem_ipsum_books_media_store_wp_theme_setup_fix() {
        add_filter('get_calendar', 'lorem_ipsum_books_media_store_get_calendar');
    }
}

// Get modified calendar layout
if (!function_exists('lorem_ipsum_books_media_store_get_calendar')) {
    function lorem_ipsum_books_media_store_get_calendar($onlyFirstLetter = false, $get_month = 0, $get_year = 0, $opt=array()) {
        global $m, $monthnum, $year, $wp_locale;

        if ( isset($_GET['w']) ) $w = '' . intval($_GET['w']);

        // week_begins = 0 stands for Sunday
        $week_begins = intval(get_option('start_of_week'));

        // Let's figure out when we are
        if ( !empty($get_month) && !empty($get_year) ) {
            $thismonth = ''.zeroise(intval($get_month), 2);
            $thisyear = ''.intval($get_year);
        } else if ( !empty($monthnum) && !empty($year) ) {
            $thismonth = ''.zeroise(intval($monthnum), 2);
            $thisyear = ''.intval($year);
        } elseif ( !empty($w) ) {
            $thisyear = ''.intval(substr($m, 0, 4));
            $thismonth = strtotime("+{$w} weeks", "{$thisyear}-01-01");
        } elseif ( !empty($m) ) {
            $thisyear = ''.intval(substr($m, 0, 4));
            if ( strlen($m) < 6 )
                $thismonth = '01';
            else
                $thismonth = ''.zeroise(intval(substr($m, 4, 2)), 2);
        } else {
            $thisyear = gmdate('Y', current_time('timestamp'));
            $thismonth = gmdate('m', current_time('timestamp'));
        }
        $unixmonth = mktime(0, 0 , 0, $thismonth, 1, $thisyear);
        $last_day = date('t', $unixmonth);

        // Post types in array
        $posts_types = explode(',', !empty($opt['post_type']) ? $opt['post_type'] : 'post');

        // Translators: Calendar caption: 1: month name, 2: 4-digit year
        $calendar_caption = '%1$s %2$s';
        $calendar_output = '<table id="wp-calendar-'.str_replace('.', '', mt_rand()).'" class="wp-calendar"><thead><tr>';

        // Get the previous month and year with at least one post
        $prev = apply_filters('lorem_ipsum_books_media_store_filter_calendar_get_prev_month', array(), array(
                'posts_types' => $posts_types,
                'year' => $thisyear,
                'month' => $thismonth,
                'last_day' => $last_day
            )
        );
        $prev_month = !empty($prev) ? $prev['month'] : 0;
        $prev_year = !empty($prev) ? $prev['year'] : 0;

        // Get days with posts
        $posts = apply_filters('lorem_ipsum_books_media_store_filter_calendar_get_curr_month_posts', array(), array(
                'posts_types' => $posts_types,
                'year' => $thisyear,
                'month' => $thismonth,
                'last_day' => $last_day
            )
        );
        if (count($posts) > (!empty($posts['done']) ? 1 : 0)) {
            // Get the current month and year
            $link = apply_filters('lorem_ipsum_books_media_store_filter_calendar_get_month_link', '', array(
                    'posts_types' => $posts_types,
                    'year' => $thisyear,
                    'month' => $thismonth,
                    'last_day' => $last_day
                )
            );
        } else
            $link = '';
        //$calendar_output .= '<th class="month_cur" colspan="7">' . ($link ? '<a href="' . esc_url($link) . '" title="' . esc_attr( sprintf(esc_html__('View posts for %1$s %2$s', 'lorem-ipsum-books-media-store'), $wp_locale->get_month($thismonth), date('Y', mktime(0, 0, 0, $thismonth, 1, $thisyear)))) . '">' : '') . sprintf($calendar_caption, $wp_locale->get_month($thismonth), '<span>'.date('Y', $unixmonth).'</span>') . ($link ? '</a>' : '') . '</th>';

        // Get the next month and year with at least one post
        $next = apply_filters('lorem_ipsum_books_media_store_filter_calendar_get_next_month', array(), array(
                'posts_types' => $posts_types,
                'year' => $thisyear,
                'month' => $thismonth,
                'last_day' => $last_day
            )
        );
        $next_month = !empty($next) ? $next['month'] : 0;
        $next_year = !empty($next) ? $next['year'] : 0;
        //$calendar_output .= '</tr><tr>';

        // Show Week days
        $myweek = array();

        for ( $wdcount=0; $wdcount<=6; $wdcount++ ) {
            $myweek[] = $wp_locale->get_weekday(($wdcount+$week_begins)%7);
        }

        if (is_array($myweek) && count($myweek) > 0) {
            foreach ($myweek as $wd) {
                $day_name = $wp_locale->get_weekday_abbrev($wd);
                $wd = esc_attr($wd);
                $calendar_output .= "<th class=\"weekday\" scope=\"col\" title=\"$wd\">$day_name</th>";
            }
        }

        $calendar_output .= '</tr></thead><tbody><tr>';

        // See how much we should pad in the beginning
        $pad = calendar_week_mod(date('w', $unixmonth)-$week_begins);

        $some = ($thismonth == 1 ? cal_days_in_month(CAL_GREGORIAN, 12, $thisyear-1) : cal_days_in_month(CAL_GREGORIAN, $thismonth - 1, $thisyear));

        if ( $pad != 0 ) {
            for ( $day = $some - $pad + 1; $day <= $some; ++$day ) {
                $calendar_output .= '<td class="day"><span class="day_wrap disable">' . esc_html($day) .'</span></td>';
            }
        };

        $daysinmonth = intval(date('t', $unixmonth));
        for ( $day = 1; $day <= $daysinmonth; ++$day ) {
            if ( isset($newrow) && $newrow )
                $calendar_output .= "</tr><tr>";
            $newrow = false;
            if ( $day == gmdate('j', current_time('timestamp')) && $thismonth == gmdate('m', current_time('timestamp')) && $thisyear == gmdate('Y', current_time('timestamp')) )
                $calendar_output .= '<td class="today">';
            else
                $calendar_output .= '<td class="day">';
            if ( !empty($posts[$day]) )
                $calendar_output .= '<a class="day_wrap" href="' . esc_url(!empty($posts[$day]['link']) ? $posts[$day]['link'] : get_day_link($thisyear, $thismonth, $day)) . '" title="' . esc_attr( is_int($posts[$day]['titles']) ? $posts[$day]['titles'].' '.esc_html__('items', 'lorem-ipsum-books-media-store') : $posts[$day]['titles'] ) . "\">$day</a>";
            else
                $calendar_output .= '<span class="day_wrap">'.($day).'</span>';
            $calendar_output .= '</td>';

            if ( 6 == calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins) )
                $newrow = true;
        }

        $pad = 7 - calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins);
        if ( $pad != 0 && $pad != 7 )
        {
            for ( $day = 1; $day <= $pad; ++$day ) {
                $calendar_output .= '<td class="day"><span class="day_wrap disable">' . esc_html($day) .'</span></td>';
            }

        };

        $calendar_output .= '</tr><tr><td class="month_prev" colspan="3">';
        if ( $prev_year+$prev_month > 0 ) {
            $calendar_output .= '<a href="#" data-type="'.esc_attr(join(',', $posts_types)).'" data-year="' . esc_attr($prev_year) . '" data-month="' . esc_attr($prev_month) . '" data-letter="' . esc_attr($onlyFirstLetter ? 1 : 0) . '" title="' . esc_attr( sprintf(esc_html__('View posts for %1$s %2$s', 'lorem-ipsum-books-media-store'), $wp_locale->get_month($prev_month), date('Y', mktime(0, 0, 0, $prev_month, 1, $prev_year)))) . '">'
                . ($wp_locale->get_month_abbrev($wp_locale->get_month($prev_month)))
                . '</a>';
        } else {
            $calendar_output .= '';
        }

        $calendar_output .= '<td class="month_next" colspan="4">';
        if ( $next_year+$next_month > 0 ) {
            $calendar_output .= '<a href="#" data-type="'.esc_attr(join(',', $posts_types)).'" data-year="' . esc_attr($next_year) . '" data-month="' . esc_attr($next_month) . '" data-letter="' . esc_attr($onlyFirstLetter ? 1 : 0) . '" title="' . esc_attr( sprintf(esc_html__('View posts for %1$s %2$s', 'lorem-ipsum-books-media-store'), $wp_locale->get_month($next_month), date('Y', mktime(0, 0 , 0, $next_month, 1, $next_year))) ) . '">'
                . ($wp_locale->get_month_abbrev($wp_locale->get_month($next_month)))
                . '</a>';
        } else {
            $calendar_output .= '&nbsp;';
        }

        $calendar_output .= "</td></tr></tbody></table>";

        return $calendar_output;
    }
}

// Calendar change month
if ( !function_exists( 'lorem_ipsum_books_media_store_callback_calendar_change_month' ) ) {
    function lorem_ipsum_books_media_store_callback_calendar_change_month() {

        if ( !wp_verify_nonce( lorem_ipsum_books_media_store_get_value_gp('nonce'), admin_url('admin-ajax.php') ) )
            die();

        $m = (int) $_REQUEST['month'];
        $y = (int) $_REQUEST['year'];
        $l = (int) $_REQUEST['letter'] > 0;
        $pt = $_REQUEST['post_type'];

        $response = array('error'=>'', 'data'=>lorem_ipsum_books_media_store_get_calendar($l, $m, $y, array('post_type'=>$pt)));

        echo json_encode($response);
        die();
    }
}

// Add theme-specific Google map styles
if ( !function_exists( 'lorem_ipsum_books_media_store_theme_shortcodes_googlemap_styles' ) ) {
	function lorem_ipsum_books_media_store_theme_shortcodes_googlemap_styles($list) {
		$list['simple']		= esc_html__('Simple', 'lorem-ipsum-books-media-store');
		$list['greyscale']	= esc_html__('Greyscale', 'lorem-ipsum-books-media-store');
		$list['inverse']	= esc_html__('Inverse', 'lorem-ipsum-books-media-store');
		$list['apple']		= esc_html__('Apple', 'lorem-ipsum-books-media-store');
		return $list;
	}
}
?>