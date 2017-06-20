<?php

class BWGViewTags_bwg {
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
    $order_by = (isset($_POST['order_by']) ? esc_html(stripslashes($_POST['order_by'])) : 'A.term_id');
    $order_class = 'manage-column column-title sorted ' . $asc_or_desc;
    $ids_string = '';
    $per_page = $this->model->per_page();
	$pager = 0;
    $query_url = wp_nonce_url( admin_url('admin-ajax.php'), '', 'bwg_nonce' );
    $query_url = add_query_arg(array('action' => ''), $query_url);
    ?>
    <script>
      var ajax_url = "<?php echo $query_url; ?>"
    </script>
    <div style="clear: both; float: left; width: 99%;">
      <div style="float:left; font-size: 14px; font-weight: bold;">
        <?php _e("This section allows you to create, edit and delete tags.", 'bwg_back'); ?>
        <a style="color: blue; text-decoration: none;" target="_blank" href="https://web-dorado.com/wordpress-gallery/creating-editing-tag.html"><?php _e("Read More in User Manual", 'bwg_back'); ?></a>
      </div>
      <div style="float: right; text-align: right;">
        <a style="text-decoration: none;" target="_blank" href="https://web-dorado.com/files/fromPhotoGallery.php">
          <img width="215" border="0" alt="web-dorado.com" src="<?php echo WD_BWG_URL . '/images/logo.png'; ?>" />
        </a>
      </div>
    </div>
    <div id="wordpress_message_1" style="width:99%;display:none"><div id="wordpress_message_2" class="updated"><p><strong><?php _e("Item Succesfully Saved.", 'bwg_back'); ?></strong></p></div></div>
    <form class="wrap bwg_form" id="tags_form" method="post" action="admin.php?page=tags_bwg" style="float:left; width: 99%;">
      <?php wp_nonce_field( 'tags_bwg', 'bwg_nonce' ); ?>
      <span class="tag_icon"></span>
      <h2><?php _e("Tags", 'bwg_back'); ?></h2>
      <div class="buttons_div">
        <input class="button-secondary" type="submit" value="<?php echo addslashes(__("Save", 'bwg_back')); ?>" onclick="if (confirm('Do you want to save items?')){
                                                                    spider_set_input_value('task', 'edit_tags');
                                                                  } else {
                                                                    return false;
                                                                  }" />
        <input class="button-secondary" type="submit" value="<?php echo addslashes(__("Delete", 'bwg_back')); ?>" onclick="if (confirm('Do you want to delete selected items?')) {
                                                                      spider_set_input_value('task', 'delete_all');
                                                                    } else {
                                                                      return false;
                                                                    }" />
      </div>
      <div class="tablenav top">
        <?php
        WDWLibrary::search(__("Name", 'bwg_back'), $search_value, 'tags_form');
        WDWLibrary::html_page_nav($page_nav['total'], $pager++, $page_nav['limit'], 'tags_form', $per_page);
        ?>
      </div>
      <table class="wp-list-table widefat fixed pages">
        <thead>
          <tr>
            <th class="manage-column column-cb check-column table_small_col"><input id="check_all" type="checkbox" style="margin:0;" /></th>
            <th class="table_small_col <?php if ($order_by == 'A.term_id') {echo $order_class;} ?>">
              <a onclick="spider_set_input_value('task', '');
                          spider_set_input_value('order_by', 'A.term_id');
                          spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html(stripslashes($_POST['order_by'])) == 'A.term_id') && esc_html(stripslashes($_POST['asc_or_desc'])) == 'asc') ? 'desc' : 'asc'); ?>');
                          spider_form_submit(event, 'tags_form')" href="">
                <span>ID</span><span class="sorting-indicator"></span></th>
              </a>
            <th class="<?php if ($order_by == 'A.name') {echo $order_class;} ?>">
              <a onclick="spider_set_input_value('task', '');
                          spider_set_input_value('order_by', 'A.name');
                          spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html(stripslashes($_POST['order_by'])) == 'A.name') && esc_html(stripslashes($_POST['asc_or_desc'])) == 'asc') ? 'desc' : 'asc'); ?>');
                          spider_form_submit(event, 'tags_form')" href="">
                <span><?php _e("Name", 'bwg_back'); ?></span><span class="sorting-indicator"></span>
              </a>
            </th>
            <th class="<?php if ($order_by == 'A.slug') {echo $order_class;} ?>">
              <a onclick="spider_set_input_value('task', '');
                          spider_set_input_value('order_by', 'A.slug');
                          spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html(stripslashes($_POST['order_by'])) == 'A.slug') && esc_html(stripslashes($_POST['asc_or_desc'])) == 'asc') ? 'desc' : 'asc'); ?>');
                          spider_form_submit(event, 'tags_form')" href="">
                <span><?php _e("Slug", 'bwg_back'); ?></span><span class="sorting-indicator"></span>
              </a>
            </th>
            <th class="<?php if ($order_by == 'B.count') {echo $order_class;} ?> table_big_col ">
              <a onclick="spider_set_input_value('task', '');
                          spider_set_input_value('order_by', 'B.count');
                          spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html(stripslashes($_POST['order_by'])) == 'B.count') && esc_html(stripslashes($_POST['asc_or_desc'])) == 'asc') ? 'desc' : 'asc'); ?>');
                          spider_form_submit(event, 'tags_form')" href="">
                <span><?php _e("Count", 'bwg_back'); ?></span><span class="sorting-indicator"></span>
              </a>
            </th>
            <th class="table_big_col"><?php _e("Edit", 'bwg_back'); ?></th>
            <th class="table_big_col"><?php _e("Delete", 'bwg_back'); ?></th>
          </tr>		  
          <tr id="tr">
            <th></th>
            <th></th>
            <th class="edit_input">
              <input class="input_th" name="tagname" type="text" value="">
            </th>
            <th class="edit_input">
              <input class="input_th" name="slug" type="text" value="">
            </th>
            <th></th>
            <th class="table_big_col">
              <a class="add_tag_th button-primary button button-small" onclick="spider_set_input_value('task', 'save');
                                                                                spider_set_input_value('current_id', '');
                                                                                spider_form_submit(event, 'tags_form')" href=""><?php _e("Add Tag", 'bwg_back'); ?> </a>
            </th>
            <th></th>
          </tr>
        </thead>
        <tbody id="tbody_arr">
          <?php
          if ($rows_data) {
            foreach ($rows_data as $row_data) {
              $alternate = (!isset($alternate) || $alternate == 'class="alternate"') ? '' : 'class="alternate"';
              ?>
              <tr id="tr_<?php echo $row_data->term_id; ?>" <?php echo $alternate; ?>>
                <td class="table_small_col check-column" id="td_check_<?php echo $row_data->term_id; ?>" ><input id="check_<?php echo $row_data->term_id; ?>" name="check_<?php echo $row_data->term_id; ?>" type="checkbox" /></td>
                <td class="table_small_col" id="td_id_<?php echo $row_data->term_id; ?>" ><?php echo $row_data->term_id; ?></td>
                <td id="td_name_<?php echo $row_data->term_id; ?>" >
                  <a class="pointer" id="name<?php echo $row_data->term_id; ?>"
                     onclick="edit_tag(<?php echo $row_data->term_id; ?>)" 
                     title="<?php _e("Edit", 'bwg_back'); ?>"><?php echo $row_data->name; ?></a>
                </td>
                <td id="td_slug_<?php echo $row_data->term_id; ?>">
                  <a class="pointer"
                     id="slug<?php echo $row_data->term_id; ?>"
                     onclick="edit_tag(<?php echo $row_data->term_id; ?>)" 
                     title="<?php _e("Edit", 'bwg_back'); ?>"><?php echo $row_data->slug; ?></a>
                </td>
                <td class="table_big_col" id="td_count_<?php echo $row_data->term_id; ?>" >
                  <a class="pointer"
                     id="count<?php echo $row_data->term_id; ?>"
                     onclick="edit_tag(<?php echo $row_data->term_id; ?>)"
                     title="<?php _e("Edit", 'bwg_back'); ?>"><?php echo $this->model->get_count_of_images($row_data->term_id); ?></a>
                </td>
                <td class="table_big_col" id="td_edit_<?php echo $row_data->term_id; ?>">
                  <a onclick="edit_tag(<?php echo $row_data->term_id; ?>)"><?php _e("Edit", 'bwg_back'); ?></a>
                </td>
                <td class="table_big_col" id="td_delete_<?php echo $row_data->term_id; ?>">
                  <a onclick="spider_set_input_value('task', 'delete');
                              spider_set_input_value('current_id', <?php echo $row_data->term_id; ?>);
                              spider_form_submit(event, 'tags_form')" href=""><?php _e("Delete", 'bwg_back'); ?></a>
                </td>
              </tr>
              <?php
              $ids_string .= $row_data->term_id . ',';
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
      <input id="task" name="task" type="hidden" value="" />
      <input id="current_id" name="current_id" type="hidden" value="" />
      <input id="ids_string" name="ids_string" type="hidden" value="<?php echo $ids_string; ?>" />
      <input id="asc_or_desc" name="asc_or_desc" type="hidden" value="<?php echo $asc_or_desc; ?>" />
      <input id="order_by" name="order_by" type="hidden" value="<?php echo $order_by; ?>" />
    </form>
    <?php
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