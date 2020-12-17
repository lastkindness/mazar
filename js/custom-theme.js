(function ($) {

	checkCookie() ;

	$('.switchbox').on('click', function(){
		
		$.removeCookie( "themecolor" ) ;

		if( $('body').hasClass( "dark-theme" ) ) {
			$.cookie("themecolor", "dark", { expires : 1, path : '/' });
		}else{
			$.cookie("themecolor", "light", { expires : 1, path : '/' });
		}

	})

	function checkCookie() {

		var themecolor = $.cookie("themecolor") ;

		if( themecolor == "dark" && themecolor != "" ){

			$('body').addClass('dark-theme') ;

		}else{

			$('body').addClass('light-theme') ; 

		}
	  
	}


	$('.product-holder').each(function(){

		let $productItem = $(this) ;

		let capacity = $productItem.find('.capacity_select').val() ;
		let taste = $productItem.find('.taste .taste_select:checked').val() ;
		let quantity = $productItem.find('.input-number .quantity_number').val() ;
		let productId = $productItem.find('.ajax-add-card').attr('data-product-id') ;

		ajax_change_price( capacity, taste, quantity, productId ) ;
		ajax_change_product_image( capacity, taste, productId ) ;

		$productItem.find('.ajax-add-card').on('click', function(){

			let capacity = $productItem.find('.capacity_select').val() ;
			let taste = $productItem.find('.taste .taste_select:checked').val() ;
			let quantity = $productItem.find('.input-number .quantity_number').val() ;
			let productId = $productItem.find('.ajax-add-card').attr('data-product-id') ;

			ajax_add_to_cart( capacity, taste, quantity, productId ) ;

			$productItem.find('.ajax-add-card .d-66-icon-wrapper').show();
			setTimeout(function(){ $productItem.find('.ajax-add-card .d-66-icon-wrapper').hide(); }, 1000);

		})

		$productItem.find('.capacity_select').change(function(){

			let capacity = $productItem.find('.capacity_select').val() ;
			let taste = $productItem.find('.taste .taste_select:checked').val() ;
			let quantity = $productItem.find('.input-number .quantity_number').val() ;
			let productId = $productItem.find('.ajax-add-card').attr('data-product-id') ;

			ajax_change_price( capacity, taste, quantity, productId ) ;
			ajax_change_product_image( capacity, taste, productId ) ;

		})

		$productItem.find('.input-number .quantity_number').change(function(){

			let capacity = $productItem.find('.capacity_select').val() ;
			let taste = $productItem.find('.taste .taste_select:checked').val() ;
			let quantity = $productItem.find('.input-number .quantity_number').val() ;
			let productId = $productItem.find('.ajax-add-card').attr('data-product-id') ;

			ajax_change_price( capacity, taste, quantity, productId ) ;

		})

		$productItem.find('.taste .taste_select').change(function(){

			let capacity = $productItem.find('.capacity_select').val() ;
			let taste = $productItem.find('.taste .taste_select:checked').val() ;
			let quantity = $productItem.find('.input-number .quantity_number').val() ;
			let productId = $productItem.find('.ajax-add-card').attr('data-product-id') ;

			ajax_change_price( capacity, taste, quantity, productId ) ;
			ajax_change_product_image( capacity, taste, productId ) ;

		})
		
	})

	function ajax_change_price( capacity, taste, quantity, productId ){

		var priceData = {
			'action' : 'changeprice',
			'security': filter_params.ajax_nonce,
			'capacity' : capacity,
			'taste' : taste,
			'quantity' : quantity,
			'productId' : productId
		}

		$.ajax({
			url: filter_params.ajaxurl,
			data: priceData,
			type: 'POST',
			success: function(data) {
				if (data) {

					$('.product-holder .block-buy .price[data-price-id='+productId+']').html(data) ;

				}
			}
		});

	}

	function ajax_change_product_image( capacity, taste, productId ){

		var imageData = {
			'action' : 'changeimage',
			'security': filter_params.ajax_nonce,
			'capacity' : capacity,
			'taste' : taste,
			'productId' : productId
		}

		$.ajax({
			url: filter_params.ajaxurl,
			data: imageData,
			type: 'POST',
			success: function(data) {
				if (data) {

					$('.product-holder .product-image[data-image-id='+productId+']').attr("src", data) ;

				}
			}
		});

	}

	function ajax_add_to_cart( capacity, taste, quantity, productId ){

		var productData = {
			'action' : 'addtocart',
			'security': filter_params.ajax_nonce,
			'capacity' : capacity,
			'taste' : taste,
			'quantity' : quantity,
			'productId' : productId
		}

		$.ajax({
			url: filter_params.ajaxurl,
			data: productData,
			type: 'POST',
			success: function(data) {
				if (data) { 
					console.log('Added to cart') ; 
					cart_product_number() ;
				}
			}
		});

	}

	function cart_product_number(){

		var cartData = {
			'action' : 'cartnumber',
			'security': filter_params.ajax_nonce,
		}

		$.ajax({
			url: filter_params.ajaxurl,
			data: cartData,
			type: 'POST',
			success: function(data) {
				if (data) { 
					var dataArray = JSON.parse( data ) ;
					$('.w-commerce-commercecartopenlink').attr( "href", dataArray['link'] ) ;
					$('.w-commerce-commercecartcontainerwrapper--cartType-modal').remove() ;
					$('.w-commerce-commercecartopenlink .cart-quantity').css('display','block') ;
					$('.w-commerce-commercecartopenlink .cart-quantity').text(dataArray['number']) ;
				}
			}
		});

	}

	$('.btn--load-photo').on('click',function(){

		$('.image-file-input').trigger( "click" );

	})

	$('.image-file-input').change(function(e){

		readImg(this);

	});

	function readImg(input){
		if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('.render-img').css('background-image', 'url(' + e.target.result + ')');
	            $('.popup-content .photo').css('display', 'block');
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$('.btn-feedback').on('click', function(){

		let name = $('.popup-content #name-review').val() ;
		let country = $('.popup-content #name-country').val() ;
		let score = $('.popup-content input[name=rating3]:checked').val() ;
		let text = $('.popup-content #text-review').val() ;
		let prodId = $('.product-holder').attr('data-prod-id') ;

		let nameValid = false, scoreValid = false, textValid = false ;

		if( score == 0 ){
			$('.popup-content .rating-group').addClass('feedback-err-star') ;
		}else{
			$('.popup-content .rating-group').removeClass('feedback-err-star') ;
			scoreValid = true ;
		}

		if( name == '' ){
			$('.popup-content #name-review').addClass('feedback-err') ;
		}else{
			$('.popup-content #name-review').removeClass('feedback-err') ;
			nameValid = true ;
		}

		if( text == '' ){
			$('.popup-content #text-review').addClass('feedback-err') ;
		}else{
			$('.popup-content #text-review').removeClass('feedback-err') ;
			textValid = true ;
		}

		if( scoreValid && nameValid && textValid ){

			var fd = new FormData(document.getElementById("feedback-form"));

    		fd.append( "action", 'setreview'); 
    		fd.append( "security", filter_params.ajax_nonce); 
    		fd.append( "name", name);
    		fd.append( "country", country);
    		fd.append( "score", score); 
    		fd.append( "text", text); 
    		fd.append( "prod_id", prodId); 
			fd.append( "main_image", $('.image-file-input')[0].files[0]);

			$.ajax({
				url: filter_params.ajaxurl,
				type: 'POST',
				data: fd,
				success: function(data) {
					if (data) { 
						
						console.log( data ) ;

						$('.review-success-hide').hide() ;
						$('.form-review--success').show() ;

					}
				},
				contentType : false,
				processData: false
			});

		}

	});

})(jQuery);