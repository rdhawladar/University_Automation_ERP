(function ($) {
	$('.pw-gallery').each(function() {
		var instance = this;
		var imgIdInput = $('.pw-gallary-value', instance);
		$('button', instance).click(function(event){
			event.preventDefault();
			var idList = imgIdInput.val();
			var gallerysc = '[gallery ids="' +idList+ '"]';
  			wp.media.gallery.edit(gallerysc).on('update', function(g){
				var id_array = [];
				// var marginCountCheck = 12;
				var marginCount = 0;
				$.each(g.models, function(id, img) { ++marginCount; /*if( marginCountCheck > marginCount )*/ id_array.push(img.id); });
				 // if( marginCount > marginCountCheck ) alert("message");
				imgIdInput.val(id_array.join(","));
			});
  			if(idList==' ' || idList=='' ){
  				$('.media-frame-menu .media-menu-item').eq(2).click();
  			}
		});
	});
}(jQuery));