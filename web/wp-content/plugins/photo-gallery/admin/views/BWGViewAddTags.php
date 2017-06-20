<?php

class BWGViewAddTags {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  private $model;


  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct($model) {
    $this->model = $model;
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function display() {
    $rows_data = $this->model->get_rows_data();
    $page_nav = $this->model->page_nav();
    $search_value = ((isset($_POST['search_value'])) ? esc_html(stripslashes($_POST['search_value'])) : '');
    $asc_or_desc = ((isset($_POST['asc_or_desc'])) ? esc_html(stripslashes($_POST['asc_or_desc'])) : 'asc');
    $order_by = (isset($_POST['order_by']) ? esc_html(stripslashes($_POST['order_by'])) : 'name');
    $image_id = ((isset($_GET['image_id'])) ? esc_html($_GET['image_id']) : ((isset($_POST['image_id'])) ? esc_html($_POST['image_id']) : '0'));
    $order_class = 'manage-column column-title sorted ' . $asc_or_desc;
    $per_page = $this->model->per_page();
	$pager = 0;
    wp_print_scripts('jquery');
    wp_print_styles('admin-bar');
    wp_print_styles('wp-admin');
    wp_print_styles('dashicons');
    wp_print_styles('buttons');
    wp_print_styles('wp-auth-check');
    if (get_bloginfo('version') < '3.9') { ?>
    <link media="all" type="text/css" href="<?php echo get_admin_url(); ?>css/colors<?php echo ((get_bloginfo('version') < '3.8') ? '-fresh' : ''); ?>.min.css" id="colors-css" rel="stylesheet">
    <?php } ?>
    <link media="all" type="text/css" href="<?php echo WD_BWG_URL . '/css/bwg_tables.css?ver='.wd_bwg_version(); ?>" id="bwg_tables-css" rel="stylesheet">
    <script src="<?php echo WD_BWG_URL . '/js/bwg.js?ver='.wd_bwg_version(); ?>" type="text/javascript"></script>
    <form class="wrap wp-core-ui bwg_form" id="tags_form" method="post" action="<?php echo add_query_arg(array('action' => 'addTags', 'width' => '650', 'height' => '500', 'bwg_items_per_page'=>$per_page , 'TB_iframe' => '1'), admin_url('admin-ajax.php')); ?>" style="width:99%; margin: 0 auto;">
      <?php wp_nonce_field( 'addTags', 'bwg_nonce' ); ?>
      <h2 style="width:200px; float:left;"><?php _e("Tags", 'bwg_back'); ?></h2>
      <a href="" class="thickbox thickbox-preview" id="content-add_media" title="Add Tag" onclick="bwg_get_tags('<?php echo $image_id; ?>', event);" style="float:right; padding: 9px 0px 4px 0">
        <img src="<?php echo WD_BWG_URL . '/images/add_but.png'; ?>" style="border:none;" />
      </a>
      <div class="tablenav top">
        <?php
        WDWLibrary::search(__('Name', 'bwg_back'), $search_value, 'tags_form');
        WDWLibrary::html_page_nav($page_nav['total'], $pager++, $page_nav['limit'], 'tags_form', $per_page);
        ?>
      </div>
      <table class="wp-list-table widefat fixed pages">
        <thead>
          <th class="manage-column column-cb check-column table_small_col"><input id="check_all" type="checkbox" style="margin:0;" /></th>
          <th class="table_small_col <?php if ($order_by == 'term_id') {echo $order_class;} ?>">
            <a onclick="spider_set_input_value('order_by', 'term_id');
                        spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html(stripslashes($_POST['order_by'])) == 'term_id') && esc_html(stripslashes($_POST['asc_or_desc'])) == 'asc') ? 'desc' : 'asc'); ?>');
                        spider_form_submit(event, 'tags_form')" href="">
              <span>ID</span><span class="sorting-indicator"></span></th>
            </a>
          <th class="<?php if ($order_by == 'name') {echo $order_class;} ?>">
            <a onclick="spider_set_input_value('order_by', 'name');
                        spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html(stripslashes($_POST['order_by'])) == 'name') && esc_html(stripslashes($_POST['asc_or_desc'])) == 'asc') ? 'desc' : 'asc'); ?>');
                        spider_form_submit(event, 'tags_form')" href="">
              <span><?php _e("Name", 'bwg_back'); ?></span><span class="sorting-indicator"></span>
            </a>
          </th>
          <th class="<?php if ($order_by == 'slug') {echo $order_class;} ?>">
            <a onclick="spider_set_input_value('order_by', 'slug');
                        spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html(stripslashes($_POST['order_by'])) == 'slug') && esc_html(stripslashes($_POST['asc_or_desc'])) == 'asc') ? 'desc' : 'asc'); ?>');
                        spider_form_submit(event, 'tags_form')" href="">
              <span><?php _e("Slug", 'bwg_back'); ?></span><span class="sorting-indicator"></span>
            </a>
          </th>
        </thead>
        <tbody id="tbody_arr">
          <?php
          if ($rows_data) {
            foreach ($rows_data as $row_data) {
              $alternate = (!isset($alternate) || $alternate == 'class="alternate"') ? '' : 'class="alternate"';
              ?>
              <tr id="tr_<?php echo $row_data->term_id; ?>" <?php echo $alternate; ?>>
                <td class="table_small_col check-column"><input id="check_<?php echo $row_data->term_id; ?>" name="check_<?php echo $row_data->term_id; ?>" type="checkbox" /></td>
                <td class="table_small_col"><?php echo $row_data->term_id; ?></td>
                <td><a onclick="window.parent.bwg_add_tag('<?php echo $image_id; ?>', ['<?php echo $row_data->term_id; ?>'],['<?php echo htmlspecialchars(addslashes($row_data->name))?>'])" id="a_<?php echo $row_data->term_id; ?>" style="cursor:pointer;"><?php echo $row_data->name; ?></a></td> 
                <td id="slug_<?php echo $row_data->term_id; ?>"><?php echo (($row_data->slug) ? $row_data->slug : '&nbsp;'); ?></td> 
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
      <div class="tablenav bottom">
        <?php
        WDWLibrary::html_page_nav($page_nav['total'], $pager++, $page_nav['limit'], 'tags_form', $per_page);
        ?>
      </div>
      <input id="asc_or_desc" name="asc_or_desc" type="hidden" value="asc" />
      <input id="order_by" name="order_by" type="hidden" value="<?php echo $order_by; ?>" />
      <input id="image_id" name="image_id" type="hidden" value="<?php echo $image_id; ?>" />
    </form>
    <script src="<?php echo get_admin_url(); ?>load-scripts.php?c=1&load%5B%5D=common,admin-bar" type="text/javascript"></script>
    <?php
    die();
  }
  
  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}