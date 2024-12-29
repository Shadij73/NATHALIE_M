jQuery(document).ready(function ($) {
    // Filter and sort photos without page reload
    $('#filter-form').on('change', function () {
        let filters = $(this).serialize();
        $.get('/wp-json/nathalie-mota/v1/filter-photos', filters, function (data) {
            $('#photo-catalog').html(data.html);
        });
    });

    // Lightbox functionality
    $('.lightbox-trigger').on('click', function () {
        let src = $(this).data('src');
        $('#lightbox img').attr('src', src);
        $('#lightbox').fadeIn();
    });

    $('#lightbox').on('click', function () {
        $(this).fadeOut();
    });
});


jQuery(document).ready(function($) {
    $('#open-modal').on('click', function() {
        $('.modal').fadeIn();
    });
    $('.modal-close, .modal').on('click', function() {
        $('.modal').fadeOut();
    });
});

jQuery(document).ready(function($) {
    let page = 2; // Next page
    $('#load-more').click(function() {
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'load_more_photos',
                page: page
            },
            success: function(data) {
                $('.photo-gallery').append(data);
                page++;
            }
        });
    });
});
