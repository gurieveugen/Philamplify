<?php
class GCOptionsPage{
    //                          __              __      
    //   _________  ____  _____/ /_____ _____  / /______
    //  / ___/ __ \/ __ \/ ___/ __/ __ `/ __ \/ __/ ___/
    // / /__/ /_/ / / / (__  ) /_/ /_/ / / / / /_(__  ) 
    // \___/\____/_/ /_/____/\__/\__,_/_/ /_/\__/____/  
    const PARENT_PAGE = 'themes.php';

    //                __  _                 
    //   ____  ____  / /_(_)___  ____  _____
    //  / __ \/ __ \/ __/ / __ \/ __ \/ ___/
    // / /_/ / /_/ / /_/ / /_/ / / / (__  ) 
    // \____/ .___/\__/_/\____/_/ /_/____/  
    //     /_/                              
    private $options;

    //                    __  __              __    
    //    ____ ___  ___  / /_/ /_  ____  ____/ /____
    //   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
    //  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
    // /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        add_submenu_page(self::PARENT_PAGE, __('Theme options'), __('Theme options'), 'administrator', __FILE__, array($this, 'create_admin_page'), 'favicon.ico'); 
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        $this->options = $this->getAll();       

        ?>
        <div class="wrap">
            <?php screen_icon(); ?>                 
            <form method="post" action="options.php">
            <?php                
                settings_fields('gc_options_page');   
                do_settings_sections(__FILE__);
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Get all options
     */
    public function getAll()
    {
        return get_option('gcoptions');
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting('gc_options_page', 'gcoptions', array($this, 'sanitize'));
        add_settings_section('default_settings', __('Options'), null, __FILE__); 

        add_settings_field('facebook_url', __('Facebook URL'), array($this, 'facebook_url_callback'), __FILE__, 'default_settings');
        add_settings_field('twitter_url', __('Twitter URL'), array($this, 'twitter_url_callback'), __FILE__, 'default_settings');
        add_settings_field('youtube_url', __('YouTube URL'), array($this, 'youtube_url_callback'), __FILE__, 'default_settings');
        add_settings_field('rss_url', __('RSS URL'), array($this, 'rss_url_callback'), __FILE__, 'default_settings');
        add_settings_field('donate_url', __('Donate URL'), array($this, 'donate_url_callback'), __FILE__, 'default_settings');
        add_settings_field('ncrp_url', __('NCRP URL'), array($this, 'ncrp_url_callback'), __FILE__, 'default_settings');
        
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        $new_input = array();     

        if(isset($input['facebook_url'])) $new_input['facebook_url'] = strip_tags($input['facebook_url']);
        if(isset($input['twitter_url'])) $new_input['twitter_url']   = strip_tags($input['twitter_url']);
        if(isset($input['youtube_url'])) $new_input['youtube_url']   = strip_tags($input['youtube_url']);
        if(isset($input['rss_url'])) $new_input['rss_url']           = strip_tags($input['rss_url']);
        if(isset($input['donate_url'])) $new_input['donate_url']     = strip_tags($input['donate_url']);
        if(isset($input['ncrp_url'])) $new_input['ncrp_url']         = strip_tags($input['ncrp_url']);

        return $new_input;
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function facebook_url_callback()
    {
        printf('<input type="text" class="regular-text" id="facebook_url" name="gcoptions[facebook_url]" value="%s" />', isset($this->options['facebook_url']) ? esc_attr($this->options['facebook_url']) : '');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function twitter_url_callback()
    {
        printf('<input type="text" class="regular-text" id="twitter_url" name="gcoptions[twitter_url]" value="%s" />', isset($this->options['twitter_url']) ? esc_attr($this->options['twitter_url']) : '');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function youtube_url_callback()
    {
        printf('<input type="text" class="regular-text" id="youtube_url" name="gcoptions[youtube_url]" value="%s" />', isset($this->options['youtube_url']) ? esc_attr($this->options['youtube_url']) : '');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function rss_url_callback()
    {
        printf('<input type="text" class="regular-text" id="rss_url" name="gcoptions[rss_url]" value="%s" />', isset($this->options['rss_url']) ? esc_attr($this->options['rss_url']) : '');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function donate_url_callback()
    {
        printf('<input type="text" class="regular-text" id="donate_url" name="gcoptions[donate_url]" value="%s" />', isset($this->options['donate_url']) ? esc_attr($this->options['donate_url']) : '');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function ncrp_url_callback()
    {
        printf('<input type="text" class="regular-text" id="ncrp_url" name="gcoptions[ncrp_url]" value="%s" />', isset($this->options['ncrp_url']) ? esc_attr($this->options['ncrp_url']) : '');
    }
    
}
// =========================================================
// LAUNCH
// =========================================================
$GLOBALS['gcoptions'] = new GCOptionsPage();