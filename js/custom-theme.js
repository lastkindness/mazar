(function ($) {

	$('.product-holder').each(function(){

		let $productItem = $(this) ;

		let capacity = $productItem.find('.capacity_select').val() ;
		let taste = $productItem.find('.taste .taste_select:checked').val() ;
		let quantity = $productItem.find('.input-number .quantity_number').val() ;
		let productId = $productItem.find('.ajax-add-card').attr('data-product-id') ;

		ajax_change_price( capacity, taste, quantity, productId ) ;

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
				if (data) { console.log('Added to cart') ; }
			}
		});

	}

})(jQuery);