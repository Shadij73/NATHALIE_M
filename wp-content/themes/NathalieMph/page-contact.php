<?php
/* Template Name: Contact */
get_header(); ?>
<main>
    <h1>Contactez-nous</h1>
    <form id="contact-form">
        <input type="text" name="name" placeholder="Nom" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="text" name="ref" placeholder="Réf. Photo (optionnel)">
        <textarea name="message" placeholder="Message"></textarea>
        <button type="submit">Envoyer</button>
    </form>
</main>
<?php get_footer(); ?>
