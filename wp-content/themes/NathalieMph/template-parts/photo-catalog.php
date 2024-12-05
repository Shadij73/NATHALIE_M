<section id="photo-catalog" class="photo-catalog">
    <?php
    $photos = get_photos(); // Replace with your logic
    foreach ($photos as $photo) : ?>
        <div class="photo-item">
            <img src="<?= $photo['src']; ?>" alt="<?= $photo['alt']; ?>">
            <div class="overlay">
                <i class="icon-eye"></i>
                <i class="icon-fullscreen"></i>
            </div>
        </div>
    <?php endforeach; ?>
</section>
