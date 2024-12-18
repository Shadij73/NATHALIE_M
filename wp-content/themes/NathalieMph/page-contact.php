<?php
/* Template Name: Contact */
get_header();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form_nonce'])) {
    if (wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_action')) {
        $name    = sanitize_text_field($_POST['name']);
        $email   = sanitize_email($_POST['email']);
        $ref     = sanitize_text_field($_POST['ref']);
        $message = sanitize_textarea_field($_POST['message']);

        $to      = get_option('admin_email');
        $subject = 'Nouveau message de contact';
        $body    = "Nom: $name\nE-mail: $email\nRéf.: $ref\nMessage:\n$message";
        $headers = ['Content-Type: text/plain; charset=UTF-8'];

        if (wp_mail($to, $subject, $body, $headers)) {
            echo '<p style="color: green;">Votre message a bien été envoyé. Merci !</p>';
        } else {
            echo '<p style="color: red;">Une erreur est survenue, veuillez réessayer.</p>';
        }
    } else {
        echo '<p style="color: red;">Erreur de sécurité. Veuillez réessayer.</p>';
    }
}
?>

<main>
    <h1>Contactez-nous</h1>
    <form id="contact-form" action="" method="post">
        <?php wp_nonce_field('contact_form_action', 'contact_form_nonce'); ?>
        <input type="text" name="name" placeholder="Nom" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="text" name="ref" placeholder="Réf. Photo (optionnel)">
        <textarea name="message" placeholder="Message" required></textarea>
        <button type="submit">Envoyer</button>
    </form>
</main>

<?php get_footer(); ?>
