jQuery('document').ready(function($) {

	$('.cart-status').find('.items').css({display: 'none'});
	$('.cart-status').find('.handler').click(function(){
		$(this).next('.items').toggle();
	});

	$('#changeAddress').click(function(){
		$(this).closest('#addressInfo').hide();
		$('.submitform').find('.input-append').show();
	});

	$('#saveAddress').click(function(){
		$('.submitform .input-append').hide();
		$('#deliveryAddress').text($('#textAddress').val());
		$('#addressInfo').show();
	})

	$(".jcarousel").jCarouselLite({
      btnNext: ".next",
      btnPrev: ".prev"
  });
});

 $(window).load(function() {
    $('.banner').flexslider({
    	'directionNav' : false,
    	'animation' : 'slide'
    });

	  $('.single').flexslider({
	    animation: "slide",
	    animationLoop: false,
	    itemWidth: 80,
	    itemMargin: 20,
	    directionNav: false
	  });
});
