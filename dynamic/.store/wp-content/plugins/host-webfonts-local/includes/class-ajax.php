<?php
/* * * * * * * * * * * * * * * * * * * * *
 *
 *  ██████╗ ███╗   ███╗ ██████╗ ███████╗
 * ██╔═══██╗████╗ ████║██╔════╝ ██╔════╝
 * ██║   ██║██╔████╔██║██║  ███╗█████╗
 * ██║   ██║██║╚██╔╝██║██║   ██║██╔══╝
 * ╚██████╔╝██║ ╚═╝ ██║╚██████╔╝██║
 *  ╚═════╝ ╚═╝     ╚═╝ ╚═════╝ ╚═╝
 *
 * @package  : OMGF
 * @author   : Daan van den Bergh
 * @copyright: (c) 2020 Daan van den Bergh
 * @url      : https://daan.dev
 * * * * * * * * * * * * * * * * * * * */

defined('ABSPATH') || exit;

class OMGF_AJAX
{
    protected $db;

    /**
     * OMGF_AJAX constructor.
     */
    public function __construct()
    {
        $this->db = new OMGF_DB();

        // @formatter:off
        add_action('wp_ajax_omgf_ajax_search_font_subsets', array($this, 'search_font_subsets'));
        add_action('wp_ajax_omgf_ajax_enable_auto_detect', [$this, 'enable_auto_detect']);
        add_action('wp_ajax_omgf_ajax_search_google_fonts', array($this, 'search_fonts'));
        add_action('wp_ajax_omgf_ajax_process_font_styles_queue', [$this, 'process_font_styles_queue']);
        add_action('wp_ajax_omgf_ajax_download_fonts', array($this, 'download_fonts'));
        add_action('wp_ajax_omgf_ajax_generate_styles', array($this, 'generate_styles'));
        add_action('wp_ajax_omgf_ajax_empty_dir', array($this, 'empty_directory'));
        // @formatter:on
    }

    /**
     * Search the API for the requested fonts and return the available subsets.
     */
    public function search_font_subsets()
    {
        $option_subsets = get_option(OMGF_Admin_Settings::OMGF_SETTING_SUBSETS) ?: [];

        delete_option(OMGF_Admin_Settings::OMGF_SETTING_SUBSETS);


        if (!($query = $_POST['search_query'])) {
            OMGF_Admin_Notice::set_notice(__('Search query not found.', 'host-webfonts-local'), true, 'warning');
        }

        $query         = strtolower(str_replace(', ', ',', $query));
        $query         = str_replace(' ', '-', $query);
        $searchQueries = explode(',', sanitize_text_field($query));

        foreach ($searchQueries as $searchQuery) {
            $api = new OMGF_API();

            $subsets = $api->get_subsets($searchQuery);

            // If subset search comes back empty. Add a notice and skip to the next one.
            if (empty($subsets)) {
                OMGF_Admin_Notice::set_notice(sprintf(__('Font %s not found. Are you sure it\'s a Google Font?', 'host-webfonts-local'), $searchQuery), false, 'error');

                continue;
            }

            $response[$subsets['subset_font']] = $subsets;
        }

        $option_subsets = array_merge($option_subsets, $response);

        update_option(OMGF_Admin_Settings::OMGF_SETTING_SUBSETS, $option_subsets);

        OMGF_Admin_Notice::set_notice(__('Subset search complete. Select subsets to generate a list of available font styles.', 'host-webfonts-local'));
    }

    /**
     * Enable Auto Detect
     */
    public function enable_auto_detect()
    {
        update_option(OMGF_Admin_Settings::OMGF_SETTING_AUTO_DETECTION_ENABLED, true);

        $url = get_permalink(get_posts()[0]->ID);

        OMGF_Admin_Notice::set_notice(__("Auto Detect enabled. Open any page on your frontend (e.g. your <a href='$url' target='_blank'>latest post</a>). After the page is fully loaded, return here and <a href='javascript:location.reload()'>click here</a> to refresh this page.", "host-webfonts-local"));
    }

    /**
     * Return the available fonts for the selected subset(s) from the API.
     */
    public function search_fonts()
    {
        if (!isset($_POST['search_google_fonts'])) {
            delete_option(OMGF_Admin_Settings::OMGF_SETTING_FONTS);

            OMGF_Admin_Notice::set_notice(__('Search query not found. Did you select any subsets? If so, try again.'), true, 'warning');
        }

        $search_google_fonts = $_POST['search_google_fonts'];

        foreach ($search_google_fonts as $index => $google_font) {
            $search_google_fonts[$google_font['subset_font']] = $google_font;
            unset($search_google_fonts[$index]);
        }

        $subsets = get_option(OMGF_Admin_Settings::OMGF_SETTING_SUBSETS);

        // Unset subsets which were checked before, but aren't now.
        foreach ($subsets as $index => &$font) {
            if (!in_array($index, array_keys($search_google_fonts))) {
                $font['selected_subsets'] = [];
            }
        }

        // Overwrite current selected subsets in settings with new values.
        $subsets = array_replace_recursive($subsets, $search_google_fonts);

        update_option(OMGF_Admin_Settings::OMGF_SETTING_SUBSETS, $subsets);

        // Retrieve available font styles.
        foreach ($search_google_fonts as $font) {
            $selected_subsets = implode(',', $font['selected_subsets']);
            $api              = new OMGF_API();
            $fonts[]          = $api->get_font_styles($font['subset_font'], $selected_subsets);
        }

        // Create font styles list.
        $fonts = array_merge(...$fonts);

        update_option(OMGF_Admin_Settings::OMGF_SETTING_FONTS, $fonts);

        OMGF_Admin_Notice::set_notice(count($fonts) . ' ' . __('font styles found. Trim the list to your needs and click <strong>Download Fonts</strong>.', 'host-webfonts-local'));
    }

    /**
     * Update options with font styles selected for preloading.
     */
    public function process_font_styles_queue()
    {
        $current_fonts   = get_option(OMGF_Admin_Settings::OMGF_SETTING_FONTS);
        $selected_fonts  = $_POST['font_styles'];
        $to_be_preloaded = $_POST['preload_font_styles'];

        $selected_fonts = array_filter($current_fonts, function ($font_style) use ($selected_fonts) {
            return in_array($font_style['font_id'], $selected_fonts);
        });

        foreach ($selected_fonts as &$font) {
            if (in_array($font['font_id'], $to_be_preloaded)) {
                $font['preload'] = 1;
            } else {
                $font['preload'] = 0;
            }
        }

        update_option(OMGF_Admin_Settings::OMGF_SETTING_FONTS, $selected_fonts);

        OMGF_Admin_Notice::set_notice(count($current_fonts) - count($selected_fonts) . ' ' . __('fonts removed from list and', 'host-webfonts-local') . ' ' . count($to_be_preloaded) . ' ' . __('fonts set to preload. If you haven\'t already, you can now <strong>download</strong> the <strong>fonts</strong>. Otherwise, just (re-)<strong>generate</strong> the <strong>stylesheet</strong>.', 'host-webfonts-local'), false);
    }

    /**
     * @return OMGF_AJAX_Download
     */
    public function download_fonts()
    {
        return new OMGF_AJAX_Download();
    }

    /**
     * @return OMGF_AJAX_Generate
     */
    public function generate_styles()
    {
        return new OMGF_AJAX_Generate();
    }

    /**
     * Empty cache directory.
     */
    public function empty_directory()
    {
        try {
            delete_option(OMGF_Admin_Settings::OMGF_SETTING_SUBSETS);
            delete_option(OMGF_Admin_Settings::OMGF_SETTING_FONTS);

            array_map('unlink', array_filter((array) glob(OMGF_FONTS_DIR . '/*')));

            OMGF_Admin_Notice::set_notice(__('Cache directory successfully emptied.', 'host-webfonts-local'));
        } catch (\Exception $e) {
            OMGF_Admin_Notice::set_notice(__('Something went wrong while emptying the cache directory: ', 'host-webfonts-local') . $e->getMessage(), true, 'error', $e->getCode());
        }
    }
}
