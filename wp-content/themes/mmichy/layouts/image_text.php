<?php 
$image_alt = $layout['image']['url'] !== '' ? $layout['image']['alt'] : 'image';
$isClickable = $layout['clickable'] == '1' ? 'true' : 'false';

if ($isClickable) : ?>
    <?php $openFile = $layout['action']['open_file'] == 'true' ? true : false;
        if ($openFile) {
            $fileOpened = $layout['action']['file'];
        } else {
            $url = $layout['action']['url'];
            $isOpenOnNewTab = $layout['action']['new_tab'] ? 'target=”_blank”' : '';
        }
    if ($openFile) : ?>
    <div class="window-content-layout-image-text flex-center-center">
    <?php if ($layout['first'] == 'text') : ?>
        <p><?= $layout['text']; ?></p>
        <button class="window-content-layout-image-text open-file flex-center-center no-translate" data-program="<?= $fileOpened; ?>">
            <img src="<?= $layout['image']['url']; ?>" alt="<?= $image_alt; ?>">
        </button>
    <?php else : ?>
        <button class="window-content-layout-image-text open-file flex-center-center no-translate" data-program="<?= $fileOpened; ?>">
            <img src="<?= $layout['image']['url']; ?>" alt="<?= $image_alt; ?>">
        </button>
        <p><?= $layout['text']; ?></p>
    <?php endif; ?>
    </div>
    <?php else : ?>
    <div class="window-content-layout-image-text flex-center-center">
        <?php if ($layout['first'] == 'text') : ?>
            <p><?= $layout['text']; ?></p>
            <a class="window-content-layout-image-text-link flex-center-center no-translate" href="<?= $url; ?>" <?= $isOpenOnNewTab ?>>
                <img src="<?= $layout['image']['url']; ?>" alt="<?= $image_alt; ?>">
            </a>
        <?php else : ?>
            <a class="window-content-layout-image-text-link flex-center-center no-translate" href="<?= $url; ?>" <?= $isOpenOnNewTab ?>>
                <img src="<?= $layout['image']['url']; ?>" alt="<?= $image_alt; ?>">
            </a>
            <p><?= $layout['text']; ?></p>
        <?php endif; ?>
    </div>
    <?php endif; ?>
<?php else : ?>
    <div class="window-content-layout-image-text flex-center-center">
    <?php if ($layout['first'] == 'text') : ?>
        <p><?= $layout['text']; ?></p>
        <img src="<?= $layout['image']['url']; ?>" alt="<?= $image_alt; ?>">
    <?php else : ?>
        <img src="<?= $layout['image']['url']; ?>" alt="<?= $image_alt; ?>">
        <p><?= $layout['text']; ?></p>
    <?php endif; ?>
    </div>
<?php endif; ?>
