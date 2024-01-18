<div class="flex-center-center">
<?php foreach ($layout['clickable_icon'] as $clickable) : ?>
    <?php 
    
    $clickable_alt = $clickable['image']['url'] !== '' ? $clickable['image']['alt'] : 'icon';
    $isOpenOnNewTab = $clickable['new_tab'] ? 'target=”_blank”' : ''; 
    $hasText = $clickable['text'] !== '' ? true : false;
    
    ?>
    <div class="clickable flex-start-center flex-column">
        <a href="<?= $clickable['url']; ?>" class="clickable-icon flex-center-center flex-column" <?= $isOpenOnNewTab ?>>
            <img src="<?= $clickable['image']['url']; ?>" alt="<?= $clickable_alt; ?>">
        </a>       
        <?php if ($hasText) : ?>
        <p><?= $clickable['text']; ?></p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
</div>