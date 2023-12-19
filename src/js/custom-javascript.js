// Add your custom JS here.

jQuery(function($){
    // Scrollspy Elements
    $( window ).load(function() {
        $('.scroll-in').attr('uk-scrollspy', 'cls: uk-animation-slide-bottom-small; delay: 200');
        $('.fade-in').attr('uk-scrollspy', 'cls: uk-animation-fade; delay: 200');
        $('.scroll-in-children').attr('uk-scrollspy', 'target: > div; cls: uk-animation-slide-bottom-small; delay: 200');
    
        // Add classes to #gform_2 input fields
        $('#gform_2 input[type="text"], #gform_2 input[type="email"]').addClass('form-control px-3 rounded-5 bg-transparent border-secondary');
        $('#gform_2 input[type="submit"]').addClass('btn btn-secondary border-0 rounded-5 w-100 fw-600 text-uppercase');
    });
});


