/*server side analogue is function display_embed in WDWLibraryEmbed*/
/*params
  embed_type: string , one of predefined accepted types
  embed_id: string, id of media in corresponding host, or url if no unique id system is defined for host
  attrs: object with html attributes and values format e.g. {width:'100px', style:"display:inline;"}
*/

function spider_display_embed(embed_type, embed_id, attrs){

  var html_to_insert = '';
  
  switch(embed_type) {
    case 'EMBED_OEMBED_YOUTUBE_VIDEO':
      var oembed_youtube_html ='<iframe ';
      if(embed_id!=''){
        oembed_youtube_html += ' src="' + '//www.youtube.com/embed/'+embed_id + '?enablejsapi=1&wmode=transparent"';
      }
      for (attr in attrs) {
        if(!(/src/i).test(attr)){
          if(attr != '' && attrs[attr] != ''){
            oembed_youtube_html += ' '+ attr + '="'+ attrs[attr] + '"';
          }
        }
      }
      oembed_youtube_html += " ></iframe>";
      html_to_insert += oembed_youtube_html;
            
      break;
    case 'EMBED_OEMBED_VIMEO_VIDEO':
      var oembed_vimeo_html ='<iframe ';
      if(embed_id!=''){
        oembed_vimeo_html += ' src="' + '//player.vimeo.com/video/'+embed_id + '?enablejsapi=1"';
      }
      for (attr in attrs) {
        if(!(/src/i).test(attr)){
          if(attr != '' && attrs[attr] != ''){
            oembed_vimeo_html += ' '+ attr + '="'+ attrs[attr] + '"';
          }
        }
      }
      oembed_vimeo_html += " ></iframe>";
      html_to_insert += oembed_vimeo_html;
            
      break;
    case 'EMBED_OEMBED_FLICKR_IMAGE':

        var oembed_flickr_html ='<div ';     
        for (attr in attrs) {
        if(!(/src/i).test(attr)){
          if(attr != '' && attrs[attr] != ''){
            oembed_flickr_html += ' '+ attr + '="'+ attrs[attr] + '"';
          }
        }
      }
        oembed_flickr_html += " >";
        if(embed_id!=''){
        
        oembed_flickr_html += '<img src="'+embed_id+'"'+ 
        ' style="'+
        'max-width:'+'100%'+" !important"+
        '; max-height:'+'100%'+" !important"+
        '; width:'+'auto !important'+
        '; height:'+ 'auto !important' + 
        ';">';
        

        }

        oembed_flickr_html +="</div>";

        html_to_insert += oembed_flickr_html;
        break;
      case 'EMBED_OEMBED_FLICKR_VIDEO':
        /* code...*/
        break;

    case 'EMBED_OEMBED_INSTAGRAM_VIDEO':
      var oembed_instagram_html ='<div ';     
        for (attr in attrs) {
        if(!(/src/i).test(attr)){
          if(attr != '' && attrs[attr] != ''){
            oembed_instagram_html += ' '+ attr + '="'+ attrs[attr] + '"';
          }
        }
      }
      oembed_instagram_html += " >";
        if(embed_id!=''){

        /*oembed_instagram_html += '<iframe src="'+embed_id+'"'+ 
        ' style="'+
        'max-width:'+'100%'+" !important"+
        '; max-height:'+'100%'+" !important"+
        '; width:'+'auto'+
        '; height:'+ '100%' + " "+
        '; margin:0;"'+
        'frameborder="0" scrolling="no" allowtransparency="false"></iframe>';
        */
        oembed_instagram_html += '<video style="width:auto !important; height:auto !important; max-width:100% !important; max-height:100% !important; margin:0 !important;" controls>'+
        '<source src="'+embed_id+
        '" type="video/mp4"> Your browser does not support the video tag. </video>';

        }
        
        
        oembed_instagram_html +="</div>";

        html_to_insert += oembed_instagram_html;

        break;

    case 'EMBED_OEMBED_INSTAGRAM_IMAGE':
      var oembed_instagram_html ='<div ';     
        for (attr in attrs) {
        if(!(/src/i).test(attr)){
          if(attr != '' && attrs[attr] != ''){
            oembed_instagram_html += ' '+ attr + '="'+ attrs[attr] + '"';
          }
        }
      }
      oembed_instagram_html += " >";
        if(embed_id!=''){

        oembed_instagram_html += '<img src="//instagram.com/p/'+embed_id+'/media/?size=l"'+ 
        ' style=" '+
        'max-width:'+'100%'+" !important"+
        '; max-height:'+'100%'+" !important"+
        '; width:'+'auto'+
        '; height:'+ '100%' +
        ';">';
        }
        oembed_instagram_html +="</div>";

        html_to_insert += oembed_instagram_html;

        break;
    case 'EMBED_OEMBED_INSTAGRAM_POST':
      var oembed_instagram_html ='<div '; 
      var id = '';
        for (attr in attrs) {
        if(!(/src/i).test(attr)){
          if(attr != '' && attrs[attr] != ''){
            oembed_instagram_html += ' '+ attr + '="'+ attrs[attr] + '"';
            if(attr == 'CLASS' || attr =='class' || attr =='Class'){
              obj_class = attrs[attr];
            }
          }
        }
      }
      oembed_instagram_html += " >";
        if(embed_id!=''){

        oembed_instagram_html += '<iframe class="inner_instagram_iframe_'+obj_class+'" src="//instagr.am/p/'+embed_id+'/embed/?enablejsapi=1"'+ 
        ' style="'+
        'max-width:'+'100%'+" !important"+
        '; max-height:'+'100%'+" !important"+
        '; width:'+'100%'+
        '; height:'+ '100%' + 
        '; margin:0'+
        '; display:table-cell; vertical-align:middle;"'+
        'frameborder="0" scrolling="no" allowtransparency="false" allowfullscreen'+
        '></iframe>';
        }

        oembed_instagram_html +="</div>";

        html_to_insert += oembed_instagram_html;

        break;    
        
    case 'EMBED_OEMBED_DAILYMOTION_VIDEO':
      var oembed_dailymotion_html ='<iframe ';
      if(embed_id!=''){
        oembed_dailymotion_html += ' src="' + '//www.dailymotion.com/embed/video/'+embed_id + '?api=postMessage"';
      }
      for (attr in attrs) {
        if(!(/src/i).test(attr)){
          if(attr != '' && attrs[attr] != ''){
            oembed_dailymotion_html += ' '+ attr + '="'+ attrs[attr] + '"';
          }
        }
      }
      oembed_dailymotion_html += " ></iframe>";
      html_to_insert += oembed_dailymotion_html;
            
      break;
    case 'EMBED_OEMBED_IMGUR':
    /*not working yet*/
      var oembed_imgur_html ='<div ';     
        for (attr in attrs) {
        if(!(/src/i).test(attr)){
          if(attr != '' && attrs[attr] != ''){
            oembed_instagram_html += ' '+ attr + '="'+ attrs[attr] + '"';
          }
        }
      }
      oembed_imgur_html += " >";
        if(embed_id!=''){

        oembed_imgur_html += '<img src="'+embed_id+'"'+ 
        ' style="'+
        'max-width:'+'100%'+" !important"+
        '; max-height:'+'100%'+" !important"+
        '; width:'+'auto'+
        '; height:'+ 'auto' + " !important"+
        ';">';
        }
        oembed_imgur_html +="</div>";

        html_to_insert += oembed_imgur_html;

        break;              
    default:
      ;
  }
  
  return html_to_insert;

}