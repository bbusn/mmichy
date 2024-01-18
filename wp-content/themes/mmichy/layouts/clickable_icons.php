<div class="flex-center-center">
<?php foreach ($layout['clickable_icon'] as $clickable) : ?>
    <?php $openFile = $clickable['action']['open_file'] == 'true' ? true : false;
        if ($openFile) {
            $fileOpened = $clickable['action']['file'];
        } else {
            $url = $clickable['action']['url'];
            $isOpenOnNewTab = $clickable['action']['new_tab'] ? 'target=”_blank”' : '';
        }
    $clickable_alt = $clickable['image']['alt'] !== '' ? $clickable['image']['alt'] : 'icon';
    $hasText = $clickable['text'] !== '' ? true : false;

    if ($openFile) : ?>
    <div class="clickable flex-start-center flex-column">
        <button class="clickable-icon open-file flex-center-center flex-column no-translate" data-program="<?= $fileOpened; ?>">
            <img src="<?= $clickable['image']['url']; ?>" alt="<?= $clickable_alt; ?>">
        </button>       
        <?php if ($hasText) : ?>
        <p><?= $clickable['text']; ?></p>
        <?php endif; ?>
    </div>
    <?php else : ?>
    <div class="clickable flex-start-center flex-column">
        <a href="<?= $url; ?>" class="clickable-icon flex-center-center flex-column no-translate" <?= $isOpenOnNewTab ?>>
            <img src="<?= $clickable['image']['url']; ?>" alt="<?= $clickable_alt; ?>">
        </a>       
        <?php if ($hasText) : ?>
        <p><?= $clickable['text']; ?></p>
        <?php endif; ?>
    </div>
    <?php endif; ?>
<?php endforeach; ?>
</div>