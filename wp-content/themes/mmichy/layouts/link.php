<?php 
    $openFile = $layout['action']['open_file'] == 'true' ? true : false;
    if ($openFile) {
        $fileOpened = $layout['action']['file'];
    } else {
        $url = $layout['action']['url'];
        $isOpenOnNewTab = $layout['action']['new_tab'] ? 'target=”_blank”' : '';
    }

    $isAbsolute = $layout['absolute'] ? true : false;
    if ($isAbsolute) {
        $link_posX = $layout['position']['pos_x'];
        $link_posY = $layout['position']['pos_y'];
    }

if ($openFile) : ?>
<button class="<?= $layout['theme']; ?>-link flex-center-center open-file <?php if (!$isAbsolute) : ?>no-translate<?php endif; ?>" data-program="<?= $fileOpened; ?>" <?php if ($isAbsolute) : ?>style="position:absolute;top:<?= $link_posY;?>%;left:<?= $link_posX;?>%;"<?php endif; ?>>
    <?= $layout['text']; ?>
</button>  
<?php else : ?>
<a href="<?= $url; ?>" class="<?= $layout['theme']; ?>-link flex-center-center <?php if (!$isAbsolute) : ?>no-translate<?php endif; ?>" <?= $isOpenOnNewTab ?> <?php if ($isAbsolute) : ?>style="transform:translate(-50%, -50%);position:absolute;top:<?= $link_posY;?>%;left:<?= $link_posX;?>%;"<?php endif; ?>>
    <?= $layout['text']; ?>
</a> 
<?php endif; ?>