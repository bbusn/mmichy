<?php 
    $isOpenOnNewTab = $layout['new_tab'] ? 'target=”_blank”' : '';
    $link_posX = $layout['position']['pos_x'];
    $link_posY = $layout['position']['pos_y'];
?>
<a href="<?= $layout['url']; ?>" class="<?= $layout['theme']; ?>-link flex-center-center" <?= $isOpenOnNewTab ?> style="position:absolute;top:<?= $link_posY;?>%;left:<?= $link_posX;?>%;">
    <?= $layout['text']; ?>
</a> 