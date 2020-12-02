 (function ($) {
   $(document).ready(
     function () {
       addClasses();
     }
   );

   function addClasses() {
     $.each($('[udesly-add-class]'), function () {
       $(this).parent().addClass($(this).attr('udesly-add-class'));
       $(this).remove();
     })
   }

   function toggleModal() {
     var toggleButton = $('[data-node-type="commerce-cart-open-link"]');
     toggleButton.on('click', function(e) {
       var wrapper = $(this).closest('[data-node-type="commerce-cart-wrapper"]');
       if (wrapper) {
         const modal = wrapper.find('[data-node-type="commerce-cart-container-wrapper"]');
         if ($('[udesly-shopify-el="mini-cart-items"] li').length) {
           $('[data-node-type="commerce-cart-form"]').show();
         } else {
           $('[data-node-type="commerce-cart-form"]').hide();
         }
         modal.show();
       }

     });
     var body = $('body');

     body.on('click', '[data-node-type="commerce-cart-close-link"]', function(e) {
       var wrapper = $(this).closest('[data-node-type="commerce-cart-wrapper"]');
       if (wrapper) {
         const modal = wrapper.find('[data-node-type="commerce-cart-container-wrapper"]');
         modal.hide();
       }
     });
     body.on('click', '[data-node-type="commerce-cart-container-wrapper"]', function(e) {
       var wrapper = $(this).closest('[data-node-type="commerce-cart-wrapper"]');
       if (wrapper) {
         const modal = wrapper.find('[data-node-type="commerce-cart-container-wrapper"]');
         modal.hide();
       }
     });

   }

   $( function() {
     toggleModal();
   });
 })(jQuery);