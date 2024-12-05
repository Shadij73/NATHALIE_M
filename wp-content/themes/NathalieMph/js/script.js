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
