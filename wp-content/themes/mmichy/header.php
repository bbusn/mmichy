<!DOCTYPE html>
<html lang="fr-FR">
<head>
<?php 
    $theme_preference = isset($_COOKIE['mmichy_theme']) ? $_COOKIE['mmichy_theme'] : 'dark';
    $body_classes = $theme_preference === 'dark' ? 'dark' : 'light'; ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class($body_classes); ?>>

<header class="flex-between-center no-select">
    <a class="header-logo no-select" href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="logo" height="70" width="70">
    </a>
    <nav class="flex-center-center no-select">
        <?php wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'items_wrap' => '<ul class="flex-center-center">%3$s</ul>',
                'depth' => 1,
            )
        ) ?>
        <label class="theme-switch no-select">
            <input type="checkbox" <?php echo $theme_preference == 'light' ? 'checked' : ''; ?>>
            <span class="theme-switch-slider"></span>
            <span class="theme-switch-background"></span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/moon.svg" alt="dark-theme-icon" class="theme-switch-dark-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sun.svg" alt="light-theme-icon" class="theme-switch-light-icon">
        </label>
        <div class="hover"></div>
    </nav>
    <button class="flex-center-center flex-column no-select" id="menu-button" accesskey="m">
        <span></span>
        <span></span>
    </button>
</header>
