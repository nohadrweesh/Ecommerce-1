/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});

$(document).on('change','#attribute-size_select',function(e){
		var price=$(this).find(":checked").attr("data-price");
		var stock=$(this).find(":checked").attr("data-stock");
		//alert(stock);
		console.log(price);
		$('#product-price').text("US $"+price);
		if(stock <=0){
			//alert("hhh")
			$('#stock_availabilty').text("Not Available");
			$('#add_to_cart').prop('disabled', true);
		}
		else{
			$('#stock_availabilty').text("In Stock");
			$('#add_to_cart').prop('disabled', false);
		}
});

$(document).on('click','.image-item img',function(e){
	//console.log($(this).parent());
	$('.main-image img').attr('src',e.target.src);
	$('.image-item').each(function(i, obj) {
		//console.log(obj);
   		$(obj).removeClass('image-active');
	});
	$(this).parent().addClass('image-active');
	//console.log(e.target.src);
    //console.log($('.main-image img').attr('src',e.target.src));
});

});
