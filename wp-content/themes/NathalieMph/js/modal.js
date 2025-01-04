jQuery(document).ready(function ($) {
    // Open Modal from any trigger
    $(document).on('click', '#open-modal, #menu-item-110', function (e) {
        e.preventDefault(); // Prevent default action
        e.stopPropagation(); // Stop event bubbling
        $('.modal').fadeIn();
        $('body').css('overflow', 'hidden'); // Prevent background scrolling
    });

    // Close Modal from close button or clicking outside content
    $(document).on('click', '.modal-close, .modal', function (e) {
        if ($(e.target).is('.modal') || $(e.target).is('.modal-close')) {
            e.stopPropagation(); // Stop event bubbling
            $('.modal').fadeOut();
            $('body').css('overflow', ''); // Restore background scrolling
        }
    });

    // Prevent closing modal when clicking inside modal content
    $('.modal-content').on('click', function (e) {
        e.stopPropagation(); // Stop event bubbling
    });
});
