<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Jerry Verschoor's portfolio website">
    <meta name="keywords" content="Film, Theatre, Design, Poetry, Sculptures, Illustrations">
    <meta name="author" content="D.C">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_title('', false); ?>
    <?php wp_head(); ?>
</head>

<body>

    <span id="top"></span>

    <a class="hide" href="#main" accesskey="S"> Skip navigation </a>

    <div class="title-bar grid-x" data-responsive-toggle="responsive-menu" data-hide-for="medium">

        <div data-toggle="responsive-menu"  class="cell title-bar-title">

            <span role="img" aria-label="Small Logo Verschoor Vision Imagi/enation" id="my-svg-m" ></span>
            <i class="fi-list">
                <span class="hide">menu</span>
            </i>
            
        </div>

    </div>

    <header data-animate="slide-in-down slide-out-up" class="top-bar" id="responsive-menu">

        <div class="top-bar-left show-for-medium">

            <span role="img" aria-label="Full Logo Verschoor Vision Imagi/enation" id="my-svg"></span>

        </div>

        <nav class="grid-x top-bar-right">

            <?php

            include get_template_directory() . '/inc/walker.php';

            wp_nav_menu(array(
                'menu' => 'Main Navigation',
                'menu_class' => 'cell grid-x align-spaced dropdown menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
                'walker' => new F6_TOPBAR_MENU_WALKER(),
                'container' => false,
            ));
            ?>

        </nav>

    </header>