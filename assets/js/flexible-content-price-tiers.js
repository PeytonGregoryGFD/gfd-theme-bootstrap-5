// Price Tiers - Flexible Content - Pricing Toggle switch
jQuery(document).ready(function($) {
    $(document).ready(function() {
        $('#priceToggle').click(function(){
            $('.card-price-annual').toggleClass('d-none');
            $('.card-price-monthly').toggleClass('d-none');
        });   
    });
});