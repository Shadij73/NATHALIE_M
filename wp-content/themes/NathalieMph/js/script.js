jQuery(document).ready(function ($) {
    // Filter and sort photos without page reload
    $('#filter-form').on('change', function () {
        let filters = $(this).serialize();
        $.get('/wp-json/nathalie-mota/v1/filter-photos', filters, function (data) {
            $('#photo-catalog').html(data.html);
        }).fail(function () {
            console.error('Failed to fetch filtered photos.');
        });
    });

    // Lightbox functionality
    $(document).on('click', '.lightbox-trigger', function () {
        let src = $(this).data('src');
        $('#lightbox img').attr('src', src);
        $('#lightbox').fadeIn();
    });

    $('#lightbox').on('click', function () {
        $(this).fadeOut();
    });

  // Modal functionality
$(document).ready(function() {
    $('#open-modal, #menu-item-110').on('click', function () {
        $('.modal').fadeIn();
        $('body').css('overflow', 'hidden'); // Prevent background scrolling
    });

    $(document).on('click', '.modal-close, .modal', function (e) {
        if ($(e.target).is('.modal') || $(e.target).is('.modal-close')) {
            $('.modal').fadeOut();
            $('body').css('overflow', ''); // Restore background scrolling
        }
    });
});

    // Load more photos
    let page = 2; // Next page for loading more photos
    $('#load-more').on('click', function () {
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'load_more_photos',
                page: page
            },
            success: function (data) {
                $('.photo-gallery').append(data);
                page++;
            },
            error: function () {
                console.error('Failed to load more photos.');
            }
        });
    });
});
