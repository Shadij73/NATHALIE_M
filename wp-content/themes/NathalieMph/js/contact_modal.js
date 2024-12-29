document.addEventListener('DOMContentLoaded', () => {
    const openModalButton = document.getElementById('open-modal');
    const modal = document.getElementById('contact-modal');
    const closeModal = modal.querySelector('.modal-close');

    openModalButton.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });
});
