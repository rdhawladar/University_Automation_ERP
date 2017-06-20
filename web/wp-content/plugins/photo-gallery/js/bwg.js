function edit_tag(m) {
  var name, slug, tr;
  name = jQuery("#name" + m).html();
  slug = jQuery("#slug" + m).html();
  tr = ' <td id="td_check_'+m+'" ></td> <td id="td_id_'+m+'" ></td> <td id="td_name_'+m+'" class="edit_input"><input id="edit_tagname" name="tagname'+m+'" class="input_th2" type="text" value="'+name+'"></td> <td id="td_slug_'+m+'" class="edit_input"><input id="edit_slug" class="input_th2"  name="slug'+m+'" type="text" value="'+slug+'"></td> <td id="td_count_'+m+'" ></td> <td id="td_edit_'+m+'" class="table_big_col"><a class="button-primary button button-small" onclick="save_tag('+m+')" >Save Tag </a></td><td id="td_delete_'+m+'" class="table_big_col" ></td> ';
  jQuery("#tr_" + m).html(tr);
  jQuery("#td_id_" + m).attr('class', 'table_big_col');
}

function save_tag(tag_id) {
  var tagname=jQuery('input[name=tagname'+tag_id+']').val();
  var slug = jQuery('input[name=slug'+tag_id+']').val();
  var datas = "tagname="+tagname+"&"+"slug="+slug+"&"+"tag_id="+tag_id;
  var td_check,td_name,td_slug,td_count,td_edit,td_delete,massege;
  
  jQuery.ajax({
    type: "POST",  
    url: ajax_url + "=bwg_edit_tag",  
    data: datas,  
    success: function(html) {
      var tagname_slug=html;		
      var array = tagname_slug.split(".");
      if (array[0] == "The slug must be unique.") {
        massege = array[0];
      }
      else {
        massege = bwg_objectL10B.saved;
        jQuery("#td_check_" + tag_id).attr('class', 'table_small_col check-column');
        td_check='<input id="check_'+tag_id+'" name="check_'+tag_id+'" type="checkbox" />';
        jQuery("#td_check_" + tag_id).html(td_check);
        jQuery("#td_id_" + tag_id).attr('class', 'table_small_col');
        jQuery("#td_id_" + tag_id).html(tag_id);
        jQuery("#td_name_" + tag_id).removeClass();
        td_name='<a class="pointer" id="name'+tag_id+'" onclick="edit_tag('+tag_id+')"  title="Edit">'+array[0]+'</a>';
        jQuery("#td_name_" + tag_id).html(td_name); 
        jQuery("#td_slug_" + tag_id).removeClass();
        td_slug='<a class="pointer" id="slug'+tag_id+'" onclick="edit_tag('+tag_id+')"  title="Edit">'+array[1]+'</a>';
        jQuery("#td_slug_" + tag_id).html(td_slug);
        jQuery("#td_count_" + tag_id).attr('class', 'table_big_col');
        td_count='<a class="pointer" id="count'+tag_id+'" onclick="edit_tag('+tag_id+')"  title="Edit">'+array[2]+'</a>';
        jQuery("#td_count_" + tag_id).html(td_count);
        td_edit='<a class="pointer" onclick="edit_tag('+tag_id+')" >Edit</a>';
        jQuery("#td_edit_" + tag_id).html(td_edit);

        var func1="spider_set_input_value('task', 'delete');";
        var func2="spider_set_input_value('current_id', "+tag_id+");";
        var func3="spider_form_submit('event', 'tags_form')";
        td_delete='<a class="pointer" onclick="'+func1+func2+func3+'" >Delete</a>';
        jQuery("#td_delete_" + tag_id).html(td_delete);
      }
      if ((jQuery( ".updated" ) && jQuery( ".updated" ).attr("id")!='wordpress_message_2' ) || (jQuery( ".error" ) && jQuery( ".error" ).css("display")=="block")) {
        if (jQuery( ".updated" ) && jQuery( ".updated" ).attr("id")!='wordpress_message_2' ){
          jQuery(".updated").html("<strong><p>"+massege+"</p></strong>"); 
        }
        else {
          jQuery(".error").html("<strong><p>"+massege+"</p></strong>"); 
          jQuery(".error").attr('class', 'updated');
        }
      }
      else {
        jQuery("#wordpress_message_1").css("display", "block");
      }
    }  
  });
}
var bwg_save_count = 50;
function spider_ajax_save(form_id, tr_group) {
  var ajax_task = jQuery("#ajax_task").val();
  if (!tr_group) {
    var tr_group = 1;
  }
  else if (ajax_task == 'ajax_apply' || ajax_task == 'ajax_save') {
    ajax_task = '';
  }
  var bwg_nonce = jQuery("#bwg_nonce").val();
  var name = jQuery("#name").val();
  var slug = jQuery("#slug").val();

  if ((typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden() && tinyMCE.activeEditor.getContent) {
    var description = tinyMCE.activeEditor.getContent();
  }
  else {
    var description = jQuery("#description").val();
  }
  var preview_image = jQuery("#preview_image").val();
  var published = jQuery("input[name=published]:checked").val();
  var search_value = jQuery("#search_value").val();
  var current_id = jQuery("#current_id").val();
  var page_number = jQuery("#page_number").val();
  var search_or_not = jQuery("#search_or_not").val();
  var ids_string = jQuery("#ids_string").val();
  var image_order_by = jQuery("#image_order_by").val();
  var asc_or_desc = jQuery("#asc_or_desc").val();
  var image_asc_or_desc = jQuery("#image_asc_or_desc").val();
  // Set cookie for image ordering in admin.
  document.cookie = 'bwg_image_asc_or_desc=' + image_asc_or_desc;
  document.cookie = 'bwg_image_order_by=' + image_order_by;
  
  var image_current_id = jQuery("#image_current_id").val();
  ids_array = ids_string.split(",");
  var tr_count = ids_array.length;
  if (tr_count > bwg_save_count) {
    // Remove items form begin and end of array.
    ids_array.splice(tr_group * bwg_save_count, ids_array.length);
    ids_array.splice(0, (tr_group - 1) * bwg_save_count);
    ids_string = ids_array.join(",");
  }

  var post_data = {};
  post_data["bwg_nonce"] = bwg_nonce;
  post_data["name"] = name;
  post_data["slug"] = slug;

  post_data["description"] = description;
  post_data["preview_image"] = preview_image;
  post_data["published"] = published;
  post_data["search_value"] = search_value;
  post_data["current_id"] = current_id;
  post_data["page_number"] = page_number;
  post_data["image_order_by"] = image_order_by;
  post_data["asc_or_desc"] = asc_or_desc;
  post_data["image_asc_or_desc"] = image_asc_or_desc;
  post_data["ids_string"] = ids_string;
  post_data["task"] = "ajax_search";
  post_data["ajax_task"] = ajax_task;
  post_data["image_current_id"] = image_current_id;
  post_data["image_width"] = jQuery("#image_width").val();
  post_data["image_height"] = jQuery("#image_height").val();
  var flag = false;
  if (jQuery("#check_all_items").attr('checked') == 'checked') {
    post_data["check_all_items"] = jQuery("#check_all_items").val();
    post_data["added_tags_select_all"] = jQuery("#added_tags_select_all").val();
    flag = true;
    jQuery('#check_all_items').attr('checked', false);
  }
  for (var i in ids_array) {
    if (ids_array.hasOwnProperty(i) && ids_array[i]) {
      if (jQuery("#check_" + ids_array[i]).attr('checked') == 'checked') {
        post_data["check_" + ids_array[i]] = jQuery("#check_" + ids_array[i]).val();
        flag = true;
      }
      post_data["input_filename_" + ids_array[i]] = jQuery("#input_filename_" + ids_array[i]).val();
      post_data["image_url_" + ids_array[i]] = jQuery("#image_url_" + ids_array[i]).val();
      post_data["thumb_url_" + ids_array[i]] = jQuery("#thumb_url_" + ids_array[i]).val();
      post_data["image_description_" + ids_array[i]] = jQuery("#image_description_" + ids_array[i]).val();
      post_data["image_alt_text_" + ids_array[i]] = jQuery("#image_alt_text_" + ids_array[i]).val();
      post_data["redirect_url_" + ids_array[i]] = jQuery("#redirect_url_" + ids_array[i]).val();
      post_data["input_date_modified_" + ids_array[i]] = jQuery("#input_date_modified_" + ids_array[i]).val();
      post_data["input_size_" + ids_array[i]] = jQuery("#input_size_" + ids_array[i]).val();
      post_data["input_filetype_" + ids_array[i]] = jQuery("#input_filetype_" + ids_array[i]).val();
      post_data["input_resolution_" + ids_array[i]] = jQuery("#input_resolution_" + ids_array[i]).val();
      post_data["input_crop_" + ids_array[i]] = jQuery("#input_crop_" + ids_array[i]).val();
      post_data["order_input_" + ids_array[i]] = jQuery("#order_input_" + ids_array[i]).val();
      post_data["tags_" + ids_array[i]] = jQuery("#tags_" + ids_array[i]).val();
    }
  }
  // Loading.
  jQuery('#opacity_div').show();
  jQuery('#loading_div').show();

  jQuery.post(
    jQuery('#' + form_id).attr('action'),
    post_data,

    function (data) {
      var str = jQuery(data).find("#current_id").val();
      jQuery("#current_id").val(str);
    }
  ).success(function (data, textStatus, errorThrown) {
    if (tr_count > bwg_save_count * tr_group) {
      spider_ajax_save(form_id, ++tr_group);
      return;
    }
    else {
      var str = jQuery(data).find('#images_table').html();
      jQuery('#images_table').html(str);
      var str = jQuery(data).find('.tablenav.top').html();
      jQuery('.tablenav.top').html(str);
      var str = jQuery(data).find('.tablenav.bottom').html();
      jQuery('.tablenav.bottom').html(str);
      jQuery("#show_hide_weights").val("Hide order column");
      spider_show_hide_weights();
      spider_run_checkbox();

      if (ajax_task == 'ajax_apply') {
        jQuery('#message_div').html("<strong><p>" + bwg_objectL10B.saved + "</p></strong>");
        jQuery('#message_div').show();
      }
      else if (ajax_task == 'recover') {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.recoverd + "</p></strong>");
        jQuery('#draganddrop').show();
      }
      else if (ajax_task == 'image_publish') {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.published + ".</p></strong>");
        jQuery('#draganddrop').show();
      }
      else if (ajax_task == 'image_unpublish') {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.unpublished + "</p></strong>");
        jQuery('#draganddrop').show();
      }
      else if (ajax_task == 'image_delete') {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.deleted + "</p></strong>");
        jQuery('#draganddrop').show();
      }
      else if (!flag && ((ajax_task == 'image_publish_all') || (ajax_task == 'image_unpublish_all') || (ajax_task == 'image_delete_all') || (ajax_task == 'image_set_watermark') || (ajax_task == 'image_recover_all') || (ajax_task == 'image_resize') || (ajax_task == 'resize_image_thumb'))) {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.one_item + "</p></strong>");
        jQuery('#draganddrop').show();
      }
      else if (ajax_task == 'image_publish_all') {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.published + "</p></strong>");
        jQuery('#draganddrop').show();
      }
      else if (ajax_task == 'image_unpublish_all') {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.unpublished + "</p></strong>");
        jQuery('#draganddrop').show();
      }
      else if (ajax_task == 'image_delete_all') {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.deleted + "</p></strong>");
        jQuery('#draganddrop').show();
      }
      else if (ajax_task == 'resize_image_thumb') {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.resized + "</p></strong>");
        jQuery('#draganddrop').show();
      }
      else if (ajax_task == 'image_set_watermark') {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.watermark_set + "</p></strong>");
        jQuery('#draganddrop').show();
      }
      else if (ajax_task == 'image_resize') {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.resized + "</p></strong>");
        jQuery('#draganddrop').show();
      }
      else if (ajax_task == 'image_recover_all') {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.reset + "</p></strong>");
        jQuery('#draganddrop').show();
      }
      else if (ajax_task == 'search') {
        jQuery('#message_div').html("");
        jQuery('#message_div').hide();
       
      }
      else {
        jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.saved + "</p></strong>");
        jQuery('#draganddrop').show();
      }
      if (ajax_task == "ajax_save") {
        
        var $form = jQuery('#' + form_id),
          formAction = $form.attr( "action" );
          
        if ( formAction.indexOf( "?" ) != -1 ) {
          formAction += "&show_pointer=true";
        }
        else {
          formAction += "?show_pointer=true";
        }
        
        $form.attr( "action", formAction );
        
        $form.submit();
      }
      jQuery('#opacity_div').hide();
      jQuery('#loading_div').hide();
    }
  });
  // if (event.preventDefault) {
  // event.preventDefault();
  // }
  // else {
  // event.returnValue = false;
  // }
  return false;
}

function spider_run_checkbox() {
  jQuery("tbody").children().children(".check-column").find(":checkbox").click(function (l) {
    if ("undefined" == l.shiftKey) {
      return true
    }
    if (l.shiftKey) {
      if (!i) {
        return true
      }
      d = jQuery(i).closest("form").find(":checkbox");
      f = d.index(i);
      j = d.index(this);
      h = jQuery(this).prop("checked");
      if (0 < f && 0 < j && f != j) {
        d.slice(f, j).prop("checked", function () {
          if (jQuery(this).closest("tr").is(":visible")) {
            return h
          }
          return false
        })
      }
    }
    i = this;
    var k = jQuery(this).closest("tbody").find(":checkbox").filter(":visible").not(":checked");
    jQuery(this).closest("table").children("thead, tfoot").find(":checkbox").prop("checked", function () {
      return(0 == k.length)
    });
    return true
  });
  jQuery("thead, tfoot").find(".check-column :checkbox").click(function (m) {
    var n = jQuery(this).prop("checked"), l = "undefined" == typeof toggleWithKeyboard ? false : toggleWithKeyboard, k = m.shiftKey || l;
    jQuery(this).closest("table").children("tbody").filter(":visible").children().children(".check-column").find(":checkbox").prop("checked", function () {
      if (jQuery(this).is(":hidden")) {
        return false
      }
      if (k) {
        return jQuery(this).prop("checked")
      } else {
        if (n) {
          return true
        }
      }
      return false
    });
    jQuery(this).closest("table").children("thead,  tfoot").filter(":visible").children().children(".check-column").find(":checkbox").prop("checked", function () {
      if (k) {
        return false
      } else {
        if (n) {
          return true
        }
      }
      return false
    })
  });
}

// Set value by id.
function spider_set_input_value(input_id, input_value) {
  if (document.getElementById(input_id)) {
    document.getElementById(input_id).value = input_value;
  }
}

// Submit form by id.
function spider_form_submit(event, form_id) {
  if (document.getElementById(form_id)) {
    document.getElementById(form_id).submit();
  }
  if (event.preventDefault) {
    event.preventDefault();
  }
  else {
    event.returnValue = false;
  }
}

// Check if required field is empty.
function spider_check_required(id, name) {
  if (jQuery('#' + id).val() == '') {
    alert(name + '* ' + bwg_objectL10B.bwg_field_required);
    jQuery('#' + id).attr('style', 'border-color: #FF0000;');
    jQuery('#' + id).focus();
    jQuery('html, body').animate({
      scrollTop:jQuery('#' + id).offset().top - 200
    }, 500);
    return true;
  }
  else {
    return false;
  }
}

// Show/hide order column and drag and drop column.
function spider_show_hide_weights() {
  if (jQuery("#show_hide_weights").val() == bwg_objectL10B.bwg_show_order) {
    jQuery(".connectedSortable").css("cursor", "default");
    jQuery("#tbody_arr").find(".handle").hide(0);
    jQuery("#th_order").show(0);
    jQuery("#tbody_arr").find(".spider_order").show(0);
    jQuery("#show_hide_weights").val(bwg_objectL10B.bwg_hide_order);
    if (jQuery("#tbody_arr").sortable()) {
      jQuery("#tbody_arr").sortable("disable");
    }
  }
  else {
    jQuery(".connectedSortable").css("cursor", "move");
    var page_number;
    if (jQuery("#page_number") && jQuery("#page_number").val() != '' && jQuery("#page_number").val() != 1) {
      page_number = (jQuery("#page_number").val() - 1) * 20 + 1;
    }
    else {
      page_number = 1;
    }
    jQuery("#tbody_arr").sortable({
      handle:".connectedSortable",
      connectWith:".connectedSortable",
      update:function (event, tr) {
        jQuery("#draganddrop").attr("style", "");
        jQuery("#draganddrop").html("<strong><p>Changes made in this table should be saved.</p></strong>");
        var i = page_number;
        jQuery('.spider_order').each(function (e) {
          if (jQuery(this).find('input').val()) {
            jQuery(this).find('input').val(i++);
          }
        });
      }
    });//.disableSelection();
    jQuery("#tbody_arr").sortable("enable");
    jQuery("#tbody_arr").find(".handle").show(0);
    jQuery("#tbody_arr").find(".handle").attr('class', 'handle connectedSortable');
    jQuery("#th_order").hide(0);
    jQuery("#tbody_arr").find(".spider_order").hide(0);
    jQuery("#show_hide_weights").val(bwg_objectL10B.bwg_show_order);
  }
}

// Check all items.
function spider_check_all_items() {
  spider_check_all_items_checkbox();
  // if (!jQuery('#check_all').attr('checked')) {
    jQuery('#check_all').trigger('click');
  // }
}
function spider_check_all_items_checkbox() {
  if (jQuery('#check_all_items').attr('checked')) {
    jQuery('#check_all_items').attr('checked', false);
    jQuery('#draganddrop').hide();
  }
  else {
    var saved_items = (parseInt(jQuery(".displaying-num").html()) ? parseInt(jQuery(".displaying-num").html()) : 0);
    var added_items = (jQuery('input[id^="check_pr_"]').length ? parseInt(jQuery('input[id^="check_pr_"]').length) : 0);
    var items_count = added_items + saved_items;
    jQuery('#check_all_items').attr('checked', true);
    if (items_count) {
      jQuery('#draganddrop').html("<strong><p>" + bwg_objectL10B.selected + ' ' + items_count + ' ' + bwg_objectL10B.item + (items_count > 1 ? "s" : "") + ".</p></strong>");
      jQuery('#draganddrop').show();
    }
  }
}

function spider_check_all(current) {
  if (!jQuery(current).attr('checked')) {
    jQuery('#check_all_items').attr('checked', false);
    jQuery('#draganddrop').hide();
  }
}

// Set uploader to button class.
function spider_uploader(button_id, input_id, delete_id, img_id) {
  if (typeof img_id == 'undefined') {
    img_id = '';
  }
  jQuery(function () {
    var formfield = null;
    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function (html) {
      if (formfield) {
        var fileurl = jQuery('img', html).attr('src');
        if (!fileurl) {
          var exploded_html;
          var exploded_html_askofen;
          exploded_html = html.split('"');
          for (i = 0; i < exploded_html.length; i++) {
            exploded_html_askofen = exploded_html[i].split("'");
          }
          for (i = 0; i < exploded_html.length; i++) {
            for (j = 0; j < exploded_html_askofen.length; j++) {
              if (exploded_html_askofen[j].search("href")) {
                fileurl = exploded_html_askofen[i + 1];
                break;
              }
            }
          }
          if (img_id != '') {
            alert(bwg_objectL10B.bwg_select_image);
            tb_remove();
            return;
          }
          window.parent.document.getElementById(input_id).value = fileurl;
          window.parent.document.getElementById(button_id).style.display = "none";
          window.parent.document.getElementById(input_id).style.display = "inline-block";
          window.parent.document.getElementById(delete_id).style.display = "inline-block";
        }
        else {
          if (img_id == '') {
            alert(bwg_objectL10B.bwg_field_required);
            tb_remove();
            return;
          }
          window.parent.document.getElementById(input_id).value = fileurl;
          window.parent.document.getElementById(button_id).style.display = "none";
          window.parent.document.getElementById(delete_id).style.display = "inline-block";
          if ((img_id != '') && window.parent.document.getElementById(img_id)) {
            window.parent.document.getElementById(img_id).src = fileurl;
            window.parent.document.getElementById(img_id).style.display = "inline-block";
          }
        }
        formfield.val(fileurl);
        tb_remove();
      }
      else {
        window.original_send_to_editor(html);
      }
      formfield = null;
    };
    formfield = jQuery(this).parent().parent().find(".url_input");
    tb_show('', 'media-upload.php?type=image&TB_iframe=true');
    jQuery('#TB_overlay,#TB_closeWindowButton').bind("click", function () {
      formfield = null;
    });
    return false;
  });
}

// Remove uploaded file.
function spider_remove_url(button_id, input_id, delete_id, img_id) {
  if (typeof img_id == 'undefined') {
    img_id = '';
  }
  if (document.getElementById(button_id)) {
    document.getElementById(button_id).style.display = '';
  }
  if (document.getElementById(input_id)) {
    document.getElementById(input_id).value = '';
    document.getElementById(input_id).style.display = 'none';
  }
  if (document.getElementById(delete_id)) {
    document.getElementById(delete_id).style.display = 'none';
  }
  if ((img_id != '') && window.parent.document.getElementById(img_id)) {
    document.getElementById(img_id).src = '';
    document.getElementById(img_id).style.display = 'none';
  }
}

function spider_reorder_items(tbody_id) {
  jQuery("#" + tbody_id).sortable({
    handle:".connectedSortable",
    connectWith:".connectedSortable",
    update:function (event, tr) {
      spider_sortt(tbody_id);
    }
  });
}

function spider_sortt(tbody_id) {
  var str = "";
  var counter = 0;
  jQuery("#" + tbody_id).children().each(function () {
    str += ((jQuery(this).attr("id")).substr(3) + ",");
    counter++;
  });
  jQuery("#albums_galleries").val(str);
  if (!counter) {
    document.getElementById("table_albums_galleries").style.display = "none";
  }
}

function spider_remove_row(tbody_id, event, obj) {
  var span = obj;
  var tr = jQuery(span).closest("tr");
  jQuery(tr).remove();
  spider_sortt(tbody_id);
}

function spider_jslider(idtaginp) {
  jQuery(function () {
    var inpvalue = jQuery("#" + idtaginp).val();
    if (inpvalue == "") {
      inpvalue = 50;
    }
    jQuery("#slider-" + idtaginp).slider({
      range:"min",
      value:inpvalue,
      min:1,
      max:100,
      slide:function (event, ui) {
        jQuery("#" + idtaginp).val("" + ui.value);
      }
    });
    jQuery("#" + idtaginp).val("" + jQuery("#slider-" + idtaginp).slider("value"));
  });
}

function spider_get_items(e) {
  if (e.preventDefault) {
    e.preventDefault();
  }
  else {
    e.returnValue = false;
  }
  var trackIds = [];
  var titles = [];
  var types = [];
  var tbody = document.getElementById('tbody_albums_galleries');
  var trs = tbody.getElementsByTagName('tr');
  for (j = 0; j < trs.length; j++) {
    i = trs[j].getAttribute('id').substr(3);
    if (document.getElementById('check_' + i).checked) {
      trackIds.push(document.getElementById("id_" + i).innerHTML);
      titles.push(document.getElementById("a_" + i).innerHTML);
      types.push(document.getElementById("url_" + i).innerHTML == "Album" ? 1 : 0);
    }
  }
  window.parent.bwg_add_items(trackIds, titles, types);
}

function bwg_check_checkboxes() { 
  var flag = false;
  var ids_string = jQuery("#ids_string").val();
  ids_array = ids_string.split(",");
  for (var i in ids_array) {
    if (ids_array.hasOwnProperty(i) && ids_array[i]) {
      if (jQuery("#check_" + ids_array[i]).attr('checked') == 'checked') {
        flag = true;
      }
	}
  }
  if(flag) {
    if(jQuery(".buttons_div_right").find("a").hasClass( "thickbox" )) {       
      return true; 
	}
	else { 
	  jQuery(".buttons_div_right").find("a").addClass( "thickbox thickbox-preview" );
	  jQuery('#draganddrop').hide();
	  return true;
	}
  } 
  else { 
	jQuery(".buttons_div_right").find("a").removeClass( "thickbox thickbox-preview" );
    jQuery('#draganddrop').html("<strong><p>You must select at least one item.</p></strong>");
    jQuery('#draganddrop').show();
	return false;
  }  
}


function bwg_get_tags(image_id, e) { 
  if (e.preventDefault) {
    e.preventDefault();
  }
  else {
    e.returnValue = false;
  }
  var tagIds = [];
  var titles = [];
  var tbody = document.getElementById('tbody_arr');
  var trs = tbody.getElementsByTagName('tr');
  for (j = 0; j < trs.length; j++) {
    i = trs[j].getAttribute('id').substr(3);
    if (document.getElementById('check_' + i).checked) {
      tagIds.push(i);
      titles.push(document.getElementById("a_" + i).innerHTML);
    }
  }
  window.parent.bwg_add_tag(image_id, tagIds, titles);
}

function bwg_add_tag(image_id, tagIds, titles) {
  if (image_id == '0') {
    var flag = false;
    var ids_string = jQuery("#ids_string").val();
    ids_array = ids_string.split(",");
    if (jQuery("#check_all_items").attr("checked")) {
      var added_tags = '';
      for (i = 0; i < tagIds.length; i++) {
        added_tags = added_tags + tagIds[i] + ',';
      }
      jQuery("#added_tags_select_all").val(added_tags);
    }
  }
  else {
    image_id = image_id + ','; 
    ids_array = image_id.split(",");
    var flag = true;
  }
  for (var i in ids_array) {
    if (ids_array.hasOwnProperty(i) && ids_array[i]) {
      if (jQuery("#check_" + ids_array[i]).attr('checked') == 'checked' || flag) {
        image_id = ids_array[i];
        var tag_ids = document.getElementById('tags_' + image_id).value;
        tags_array = tag_ids.split(',');
        var div = document.getElementById('tags_div_' + image_id);
        var counter = 0;
        for (i = 0; i < tagIds.length; i++) {
          if (tags_array.indexOf(tagIds[i]) == -1) {
            tag_ids = tag_ids + tagIds[i] + ',';
            var tag_div = document.createElement('div');
            tag_div.setAttribute('id', image_id + "_tag_" + tagIds[i]);
            tag_div.setAttribute('class', "tag_div");
            div.appendChild(tag_div);
            var tag_name_span = document.createElement('span');
            tag_name_span.setAttribute('class', "tag_name");
            tag_name_span.innerHTML = titles[i];
            tag_div.appendChild(tag_name_span);
            var tag_delete_span = document.createElement('span');
            tag_delete_span.setAttribute('class', "spider_delete_img_small");
            tag_delete_span.setAttribute('onclick', "bwg_remove_tag('" + tagIds[i] + "', '" + image_id + "')");
            tag_delete_span.setAttribute('style', "float:right;");
            tag_div.appendChild(tag_delete_span);
            counter++;
          }
        }
        document.getElementById('tags_' + image_id).value = tag_ids;
        if (counter) {
          div.style.display = "block";
        }
      }
	  }
  }
  tb_remove();
}

function bwg_remove_tag(tag_id, image_id) {
  if (jQuery('#' + image_id + '_tag_' + tag_id)) {
    jQuery('#' + image_id + '_tag_' + tag_id).remove();
    var tag_ids_string = jQuery("#tags_" + image_id).val();
    tag_ids_string = tag_ids_string.replace(tag_id + ',', '');
    jQuery("#tags_" + image_id).val(tag_ids_string);
    if (jQuery("#tags_" + image_id).val() == '') {
      jQuery("#tags_div_" + image_id).hide();
    }
  }
}

function preview_watermark() {
  setTimeout(function() {
    watermark_type = window.parent.document.getElementById('watermark_type_text').checked;
    if (watermark_type) {
      watermark_text = document.getElementById('watermark_text').value;
      watermark_link = document.getElementById('watermark_link').value;
      watermark_font_size = document.getElementById('watermark_font_size').value;
      watermark_font = document.getElementById('watermark_font').value;
      watermark_color = document.getElementById('watermark_color').value;
      watermark_opacity = document.getElementById('watermark_opacity').value;
      watermark_position = jQuery("input[name=watermark_position]:checked").val().split('-');
      document.getElementById("preview_watermark").style.verticalAlign = watermark_position[0];
      document.getElementById("preview_watermark").style.textAlign = watermark_position[1];
      stringHTML = (watermark_link ? '<a href="' + watermark_link + '" target="_blank" style="text-decoration: none;' : '<span style="cursor:default;') + 'margin:4px;font-size:' + watermark_font_size + 'px;font-family:' + watermark_font + ';color:#' + watermark_color + ';opacity:' + (watermark_opacity / 100) + ';" class="non_selectable">' + watermark_text + (watermark_link ? '</a>' : '</span>');
      document.getElementById("preview_watermark").innerHTML = stringHTML;
    }
    watermark_type = window.parent.document.getElementById('watermark_type_image').checked;
    if (watermark_type) {
      watermark_url = document.getElementById('watermark_url').value;
      watermark_link = document.getElementById('watermark_link').value;
      watermark_width = document.getElementById('watermark_width').value;
      watermark_height = document.getElementById('watermark_height').value;
      watermark_opacity = document.getElementById('watermark_opacity').value;
      watermark_position = jQuery("input[name=watermark_position]:checked").val().split('-');
      document.getElementById("preview_watermark").style.verticalAlign = watermark_position[0];
      document.getElementById("preview_watermark").style.textAlign = watermark_position[1];
      stringHTML = (watermark_link ? '<a href="' + watermark_link + '" target="_blank">' : '') + '<img class="non_selectable" src="' + watermark_url + '" style="margin:0 4px 0 4px;max-width:' + watermark_width + 'px;max-height:' + watermark_height + 'px;opacity:' + (watermark_opacity / 100) + ';" />' + (watermark_link ? '</a>' : '');
      document.getElementById("preview_watermark").innerHTML = stringHTML;
    }
  }, 50);
}

function preview_built_in_watermark() {
  setTimeout(function(){
  watermark_type = window.parent.document.getElementById('built_in_watermark_type_text').checked;
  if (watermark_type) {
    watermark_text = document.getElementById('built_in_watermark_text').value;
    watermark_font_size = document.getElementById('built_in_watermark_font_size').value * 400 / 500;
    watermark_font = 'bwg_' + document.getElementById('built_in_watermark_font').value.replace('.TTF', '').replace('.ttf', '');
    watermark_color = document.getElementById('built_in_watermark_color').value;
    watermark_opacity = document.getElementById('built_in_watermark_opacity').value;
    watermark_position = jQuery("input[name=built_in_watermark_position]:checked").val().split('-');
    document.getElementById("preview_built_in_watermark").style.verticalAlign = watermark_position[0];
    document.getElementById("preview_built_in_watermark").style.textAlign = watermark_position[1];
    stringHTML = '<span style="cursor:default;margin:4px;font-size:' + watermark_font_size + 'px;font-family:' + watermark_font + ';color:#' + watermark_color + ';opacity:' + (watermark_opacity / 100) + ';" class="non_selectable">' + watermark_text + '</span>';
    document.getElementById("preview_built_in_watermark").innerHTML = stringHTML;
  }
  watermark_type = window.parent.document.getElementById('built_in_watermark_type_image').checked;
  if (watermark_type) {
    watermark_url = document.getElementById('built_in_watermark_url').value;
    watermark_size = document.getElementById('built_in_watermark_size').value;
    watermark_position = jQuery("input[name=built_in_watermark_position]:checked").val().split('-');
    document.getElementById("preview_built_in_watermark").style.verticalAlign = watermark_position[0];
    document.getElementById("preview_built_in_watermark").style.textAlign = watermark_position[1];
    stringHTML = '<img class="non_selectable" src="' + watermark_url + '" style="margin:0 4px 0 4px;max-width:95%;width:' + watermark_size + '%;" />';
    document.getElementById("preview_built_in_watermark").innerHTML = stringHTML;
  }
  }, 50);
}

function bwg_watermark(watermark_type) {
  jQuery("#" + watermark_type).attr('checked', 'checked');
  jQuery("#tr_watermark_url").css('display', 'none');
  jQuery("#tr_watermark_width_height").css('display', 'none');
  jQuery("#tr_watermark_opacity").css('display', 'none');
  jQuery("#tr_watermark_text").css('display', 'none');
  jQuery("#tr_watermark_link").css('display', 'none');
  jQuery("#tr_watermark_font_size").css('display', 'none');
  jQuery("#tr_watermark_font").css('display', 'none');
  jQuery("#tr_watermark_color").css('display', 'none');
  jQuery("#tr_watermark_position").css('display', 'none');
  jQuery("#tr_watermark_preview").css('display', 'none');
  jQuery("#preview_watermark").css('display', 'none');
  switch (watermark_type) {
    case 'watermark_type_text':
    {
      jQuery("#tr_watermark_opacity").css('display', '');
      jQuery("#tr_watermark_text").css('display', '');
      jQuery("#tr_watermark_link").css('display', '');
      jQuery("#tr_watermark_font_size").css('display', '');
      jQuery("#tr_watermark_font").css('display', '');
      jQuery("#tr_watermark_color").css('display', '');
      jQuery("#tr_watermark_position").css('display', '');
      jQuery("#tr_watermark_preview").css('display', '');
      jQuery("#preview_watermark").css('display', 'table-cell');
      break;
    }
    case 'watermark_type_image':
    {
      jQuery("#tr_watermark_url").css('display', '');
      jQuery("#tr_watermark_link").css('display', '');
      jQuery("#tr_watermark_width_height").css('display', '');
      jQuery("#tr_watermark_opacity").css('display', '');
      jQuery("#tr_watermark_position").css('display', '');
      jQuery("#tr_watermark_preview").css('display', '');
      jQuery("#preview_watermark").css('display', 'table-cell');
      break;
    }
  }
}

function bwg_built_in_watermark(watermark_type) {
  jQuery("#built_in_" + watermark_type).attr('checked', 'checked');
  jQuery("#tr_built_in_watermark_url").css('display', 'none');
  jQuery("#tr_built_in_watermark_size").css('display', 'none');
  jQuery("#tr_built_in_watermark_opacity").css('display', 'none');
  jQuery("#tr_built_in_watermark_text").css('display', 'none');
  jQuery("#tr_built_in_watermark_font_size").css('display', 'none');
  jQuery("#tr_built_in_watermark_font").css('display', 'none');
  jQuery("#tr_built_in_watermark_color").css('display', 'none');
  jQuery("#tr_built_in_watermark_position").css('display', 'none');
  jQuery("#tr_built_in_watermark_preview").css('display', 'none');
  jQuery("#preview_built_in_watermark").css('display', 'none');
  switch (watermark_type) {
    case 'watermark_type_text':
    {
      jQuery("#tr_built_in_watermark_opacity").css('display', '');
      jQuery("#tr_built_in_watermark_text").css('display', '');
      jQuery("#tr_built_in_watermark_font_size").css('display', '');
      jQuery("#tr_built_in_watermark_font").css('display', '');
      jQuery("#tr_built_in_watermark_color").css('display', '');
      jQuery("#tr_built_in_watermark_position").css('display', '');
      jQuery("#tr_built_in_watermark_preview").css('display', '');
      jQuery("#preview_built_in_watermark").css('display', 'table-cell');
      break;
    }
    case 'watermark_type_image':
    {
      jQuery("#tr_built_in_watermark_url").css('display', '');
      jQuery("#tr_built_in_watermark_size").css('display', '');
      jQuery("#tr_built_in_watermark_position").css('display', '');
      jQuery("#tr_built_in_watermark_preview").css('display', '');
      jQuery("#preview_built_in_watermark").css('display', 'table-cell');
      break;
    }
  }
}

function bwg_change_option_type(type) {
  type = (type == '' ? 1 : type);
  document.getElementById('type').value = type;
  for (var i = 1; i <= 10; i++) {
    if (i == type) {
      document.getElementById('div_content_' + i).style.display = 'block';
      document.getElementById('div_' + i).style.background = '#C5C5C5';
    }
    else {
      document.getElementById('div_content_' + i).style.display = 'none';
      document.getElementById('div_' + i).style.background = '#F4F4F4';
    }
  }
  document.getElementById('display_panel').style.display = 'inline-block';
}

function bwg_inputs() {
  jQuery(".spider_int_input").keypress(function (event) {
    var chCode1 = event.which || event.paramlist_keyCode;
    if (chCode1 > 31 && (chCode1 < 48 || chCode1 > 57) && (chCode1 != 46) && (chCode1 != 45)) {
      return false;
    }
    return true;
  });
}

function bwg_enable_disable(display, id, current) {
  jQuery("#" + current).attr('checked', 'checked');
  jQuery("#" + id).css('display', display);
  if(id == 'tr_slideshow_title_position') {
    jQuery("#tr_slideshow_full_width_title").css('display', display);
  }
}

function bwg_popup_fullscreen(num) {
  if (num) {
    jQuery("#tr_popup_dimensions").css('display', 'none');
  }
  else {
    jQuery("#tr_popup_dimensions").css('display', '');
  }
}

function bwg_change_album_view_type(type) {
  if (type == 'thumbnail') {
    jQuery("#album_thumb_dimensions").html('Album thumb dimensions: ');
	jQuery("#album_thumb_dimensions_x").css('display', '');
	jQuery("#album_thumb_height").css('display', '');
  }
  else {
    jQuery("#album_thumb_dimensions").html('Album thumb width: '); 
    jQuery("#album_thumb_dimensions_x").css('display', 'none');
	jQuery("#album_thumb_height").css('display', 'none');
  }
}

function spider_check_isnum(e) {
  var chCode1 = e.which || e.paramlist_keyCode;
  if (chCode1 > 31 && (chCode1 < 48 || chCode1 > 57) && (chCode1 != 46) && (chCode1 != 45)) {
    return false;
  }
  return true;
}

function bwg_change_theme_type(type) {
  var button_name = jQuery("#button_name").val();
  jQuery("#Thumbnail").hide();
  jQuery("#Masonry").hide();
  jQuery("#Mosaic").hide();
  jQuery("#Slideshow").hide();
  jQuery("#Compact_album").hide();
  jQuery("#Extended_album").hide();
  jQuery("#Masonry_album").hide();
  jQuery("#Image_browser").hide();
  jQuery("#Blog_style").hide();
  jQuery("#Carousel").hide();
  jQuery("#Lightbox").hide();
  jQuery("#Navigation").hide();
  jQuery("#" + type).show();
  jQuery("#type_menu").show();
  jQuery(".spider_fieldset").show();
  jQuery("#current_type").val(type);

  jQuery("#type_Thumbnail").attr("style", "background-color: #F4F4F4;");
  jQuery("#type_Masonry").attr("style", "background-color: #F4F4F4; opacity: 0.4; filter: Alpha(opacity=40);");
  jQuery("#type_Mosaic").attr("style", "background-color: #F4F4F4; opacity: 0.4; filter: Alpha(opacity=40);");
  jQuery("#type_Slideshow").attr("style", "background-color: #F4F4F4;");
  jQuery("#type_Compact_album").attr("style", "background-color: #F4F4F4;");
  jQuery("#type_Extended_album").attr("style", "background-color: #F4F4F4;");
  jQuery("#type_Masonry_album").attr("style", "background-color: #F4F4F4; opacity: 0.4; filter: Alpha(opacity=40);");
  jQuery("#type_Image_browser").attr("style", "background-color: #F4F4F4;");
  jQuery("#type_Blog_style").attr("style", "background-color: #F4F4F4; opacity: 0.4; filter: Alpha(opacity=40);");
  jQuery("#type_Carousel").attr("style", "background-color: #F4F4F4; opacity: 0.4; filter: Alpha(opacity=40);");
  jQuery("#type_Lightbox").attr("style", "background-color: #F4F4F4;");
  jQuery("#type_Navigation").attr("style", "background-color: #F4F4F4;");
  jQuery("#type_" + type).attr("style", "background-color: #CFCBCB;");
}

function bwg_gallery_type() {
  var response = true;
  var value = jQuery('#gallery_type').val();
  response = bwg_change_gallery_type(value, 'change');
  return response;
}

/*returns false if user cancels or impossible to do.*/
/*
   type_to_set:'' or 'instagram'
*/
function bwg_change_gallery_type(type_to_set, warning_type) {
  
  warning_type = (typeof warning_type === "undefined") ? "default" : warning_type;

  if(type_to_set == 'instagram'){
    jQuery('#gallery_type').val('instagram');
    jQuery('#tr_instagram_post_gallery').show();
    jQuery('#tr_gallery_source').show();
    jQuery('#tr_update_flag').show();
    jQuery('#tr_autogallery_image_number').show();
    jQuery('#tr_instagram_gallery_add_button').show();

    /*hide features of only standard gallery*/   
    jQuery('.spider_delete_button').hide();
    jQuery('#spider_setwatermark_button').hide();
    jQuery('#spider_resize_button').hide();
    jQuery('#spider_reset_button').hide();
    jQuery('#content-add_media').hide();
    jQuery('#show_add_embed').hide();
    jQuery('#show_bulk_embed').hide();
    
  }
  else{

    var ids_string = jQuery("#ids_string").val();
    ids_array = ids_string.split(",");
    var tr_count = ids_array[0]=='' ? 0: ids_array.length;  
    if(tr_count != 0){
      switch(warning_type) {
        case 'default':
          var allowed = confirm("This action will reset gallery type to standard and will save that choice. You cannot undo it.");
          break;
        case 'change':
          var allowed = confirm("After pressing save/apply buttons, you cannot change gallery type back to Instagram!");
          break;
        default:
          var allowed = confirm("This action will reset gallery type to standard and will save that choice. You cannot undo it.");
      }/*endof switch*/

      if (allowed == false) {
        jQuery('#gallery_type').val('instagram');
        return false;
      }
    }
  
    jQuery('#gallery_type').val('');
    jQuery('#tr_instagram_post_gallery').hide();
    jQuery('#tr_gallery_source').hide();

    jQuery('#tr_update_flag').hide();
    jQuery('#tr_autogallery_image_number').hide();
    jQuery('#tr_instagram_gallery_add_button').hide();

    /*show features of only standard gallery*/
    jQuery('.spider_delete_button').show();
    jQuery('#spider_setwatermark_button').show();
    jQuery('#spider_resize_button').show();
    jQuery('#spider_reset_button').show();
    jQuery('#content-add_media').show();
    jQuery('#show_add_embed').show();
    jQuery('#show_bulk_embed').show();    
    
  }
  return true;
}

function bwg_is_instagram_gallery() {

  var value = jQuery('#gallery_type').val();
  if(value == 'instagram'){
    return true;
  }
  else{
    return false;
  }
}


/**
 *  
 *  @param reset:bool true if reset to standard in case of not empty
 *  @param message:bool true if to alert that not empty
 *  @return true if empty, false if not empty
 */

function bwg_convert_seconds(seconds) {
  var sec_num = parseInt(seconds, 10);
  var hours   = Math.floor(sec_num / 3600);
  var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
  var seconds = sec_num - (hours * 3600) - (minutes * 60);

  if (minutes < 10 && hours != 0) {minutes = "0" + minutes;}
  if (seconds < 10) {seconds = "0" + seconds;}
  var time    = (hours != 0 ? hours + ':' : '') + minutes + ':' + seconds;
  return time;
}

function bwg_convert_date(date, separator) {
  var m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  date = date.split(separator);
  var dateArray = date[0].split("-");
  return dateArray[2] + " " + m_names[dateArray[1] - 1] + " " + dateArray[0] + ", " + date[1].substring(0, 5);
}

/* EMBED handling */
function bwg_get_embed_info(input_id) {
  jQuery('#opacity_div').show();
  jQuery('#loading_div').show();


  var url = encodeURI(jQuery("#" + input_id).val());  
  if (!url) {
    alert(bwg_objectL10B.bwg_enter_url);
    return '';
  }
  var filesValid = [];
  var data = {
    'action': 'addEmbed',
    'URL_to_embed': url,
    'async':true
  };


   // get from the server data for the url. Here we use the server as a proxy, since Cross-Origin Resource Sharing AJAX is forbidden.
  jQuery.post(ajax_url, data, function(response) {
    if(response == false){
      alert(bwg_objectL10B.bwg_cannot_response);
      jQuery('#opacity_div').hide();
      jQuery('#loading_div').hide();
      return '';
    }
    else{  

      var index_start = response.indexOf("WD_delimiter_start");
      var index_end = response.indexOf("WD_delimiter_end");
      if(index_start == -1 || index_end == -1){
        alert(bwg_objectL10B.bwg_something_wrong);
        jQuery('#opacity_div').hide();
        jQuery('#loading_div').hide();
      
        return '';
      }

      /*filter out other echoed characters*/
      /*18 is the length of "wd_delimiter_start"*/
      response = response.substring(index_start+18,index_end);  
      

      response_JSON = jQuery.parseJSON(response);
        /*if indexed array, it means there is error*/
      if(typeof response_JSON[0] !== 'undefined'){
        alert(bwg_objectL10B.bwg_error + jQuery.parseJSON(response)[1]);
        jQuery('#opacity_div').hide();
        jQuery('#loading_div').hide();
        return '';
      }
      else{
        fileData = response_JSON;
        filesValid.push(fileData);
        bwg_add_image(filesValid);
        document.getElementById(input_id).value = '';
        jQuery('#opacity_div').hide();
        jQuery('#loading_div').hide();
        return 'ok';
      }
    }
    return ''; 
   
  });
  return 'ok'; 
   
}