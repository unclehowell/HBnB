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

class OMGF_DB
{
    /** @var QM_DB $wpdb */
    private $wpdb;

    /**
     * OMGF_DB constructor.
     */
    public function __construct()
    {
        global $wpdb;

        $this->wpdb = $wpdb;
    }

    /**
     * @param bool $clean
     *
     * @return array|Exception
     */
    public function get_downloaded_fonts($clean = false)
    {
        try {
            $fonts = $this->get_total_fonts();

            $downloaded = array_filter($fonts, function($font) {
                return $font['downloaded'] == 1;
            });

            if ($clean) {
                foreach ($downloaded as &$download) {
                    $download['font_family'] = str_replace('\'', '', $download['font_family']);
                }
            }

            return $downloaded;
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * @return array|Exception
     */
    public function get_preload_fonts()
    {
        try {
            $fonts = $this->get_total_fonts();

            $preload = array_filter($fonts, function($font) {
                return $font['preload'] == 1;
            });

            return $preload;
        } catch(\Exception $e) {
            return $e;
        }
    }

    /**
     * @return array
     */
    public function get_total_fonts()
    {
        return get_option(OMGF_Admin_Settings::OMGF_SETTING_FONTS) ?: [];
    }

    /**
     * @return array
     */
    public function get_subsets()
    {
        return get_option(OMGF_Admin_Settings::OMGF_SETTING_SUBSETS) ?: [];
    }

    /**
     * @return bool
     */
    public function clean_queue()
    {
        delete_option(OMGF_Admin_Settings::OMGF_SETTING_FONTS);
        delete_option(OMGF_Admin_Settings::OMGF_SETTING_SUBSETS);

        return true;
    }
}
