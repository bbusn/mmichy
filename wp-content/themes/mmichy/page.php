<?php get_header(); ?>
<?php $windows = get_field('windows');
    $count = 0;
    if ($windows) : ?>
        <?php foreach ($windows as $window) : ?>
            <?php 
                $count++;
                $isOpen = $window['status'] === 'open' ? 'open' : '';
                $isDraggable = $window['status'] === 'open' ? '1' : '0';
                $layout = $window['content'];
                $size = $window['size_position']['size'];
                $posX = $window['size_position']['position']['pos_x'];
                $posY = $window['size_position']['position']['pos_y'];
                $layout_name = $layout[0]['acf_fc_layout'];
                $layout_file = sprintf('%s/layouts/%s.php', get_template_directory(), $layout_name);
            ?>
        <div class="program <?php echo $count ?> <?php echo $isOpen ?>" data-draggable=<?php echo $isDraggable ?> style="top:<?= $posY;?>%;left:<?= $posX;?>%;">
            <div class="program-container">
                <div class="window flex-start-center flex-column <?php echo $size ?>">
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
                    <div class="window-content flex-center-center light-theme">
                        <?php if (file_exists($layout_file)) : ?>
                            <?php include $layout_file; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <button class="file flex-center-center flex-column">
                    <img class="no-select" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/<?php echo $window['icon'] ?>.svg" alt="file-icon" width="35" height="45">
                    <p><?php echo $window['name'] ?></p>
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
<?php get_footer(); ?>
