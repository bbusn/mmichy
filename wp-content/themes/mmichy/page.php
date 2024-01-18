<?php get_header(); ?>
<?php $windows = get_field('windows');
    $count = 0;
    if ($windows) : ?>
        <?php foreach ($windows as $window) : ?>
            <?php 
                $count++;
                $isOpen = $window['status'] === 'open' ? 'open' : '';
                $isDraggable = $window['status'] === 'open' ? '1' : '0';
                $isDark = $window['theme'] === 'dark' ? 'dark' : 'light';
                $layouts = $window['content'];
                $size = $window['size_position']['size'];
                $posX = $window['size_position']['position']['pos_x'];
                $posY = $window['size_position']['position']['pos_y'];
            ?>
        <div class="program <?= $isOpen ?>" data-draggable=<?= $isDraggable ?> style="top:<?= $posY;?>%;left:<?= $posX;?>%;" id="<?php echo 'window_' . $count; ?>">
            <div class="program-container">
                <div class="window flex-start-center flex-column <?= $size ?> <?= $isDark ?>">
                    <div class="window-nav flex-between-center">
                        <div class="window-buttons flex-center-center">
                            <div class="window-button flex-center-center close">
                                <div></div>
                                <div></div>
                            </div>
                            <div class="window-button minimize"></div>
                            <div class="window-button maximize"></div>
                        </div>
                        <span class="window-line"></span>
                    </div>
                    <div class="window-content flex-center-center flex-column">
                        <div class="window-content-container flex-start-center flex-column">
                        <?php foreach ($layouts as $layout) : ?>
                            <?php   $layout_name = $layout['acf_fc_layout']; 
                            $layout_file = sprintf('%s/layouts/%s.php', get_template_directory(), $layout_name);
                            if (file_exists($layout_file)) : ?>
                            <div class="window-content-layout">
                                <?php include $layout_file; ?>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <button class="file <?= ($window['has_icon']) == '1' ? '' : 'hidden'; ?> flex-center-center flex-column">
                    <img class="no-select" src="<?= get_template_directory_uri(); ?>/assets/images/icons/<?= $window['icon'] ?>.svg" alt="file-icon" width="35" height="45">
                    <p><?= $window['name'] ?></p>
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
<?php get_footer(); ?>
