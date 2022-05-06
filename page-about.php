<?php get_header(); ?>

<main id="main" class="grid-container grid-y">

    <h2 class="cell text-center medium-text-right"><?php echo the_field('heading') ?></h2>

    <i class="fi-pencil"></i>

    <section class="grid-x p-left">

        <h3 class="cell medium-order-2 small-12 medium-5 medium-text-center"><?php echo the_field('section_heading_1') ?></h4>

        <p class="cell medium-order-1 medium-text-left small-12 medium-7"><?php echo the_field('section_paragraph_1') ?></p>

    </section>

    <section class="grid-x p-right">

        <h3 class="cell text-right small-12 medium-5 medium-text-center"><?php echo the_field('section_heading_2') ?></h4>

        <p class="cell text-right small-12 medium-7"><?php echo the_field('section_paragraph_2') ?></p>

    </section>

    <section class="grid-x align-center stack-for-small
    media-object">

    <div class="cell medium-5 large-6 align-self-middle
        media-object-section">

            <?php
            $image = get_field('media');
            if (!empty($image)) { ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php } ?>

        </div>

        <div class="cell medium-7 large-6 grid-x align-justify
        media-object-section">

            <h3 class="cell text-center medium-text-left small-12"><?php echo the_field('media_heading') ?></h3>
            <p class="cell small-12"><?php echo the_field('media_paragraph') ?></p>

            <div class="grid-x align-bottom">

                <p class="cell medium-text-right medium-order-2 small-7 medium-6"><?php echo the_field('media_paragraph_1') ?></p>
                <h4 class="cell text-center medium-order-1 subheader align-self-middle medium-text-left small-5 medium-6"><?php echo the_field('media_heading_1') ?></h4>
                <p class="cell small-7 medium-6"><?php echo the_field('media_paragraph_2') ?></p>
                <h4 class="cell text-center subheader align-self-middle medium-text-right small-5 medium-6"><?php echo the_field('media_heading_2') ?></h4>

            </div>

        </div>

     

    </section>

    <div class="grid-x">

        <div class="cell text-center medium-order-2 small-12 medium-5 large-6" data-sticky-container>
            <div class="sticky" data-sticky data-anchor="stick-1">
                <?php
                $image = get_field('sticky_image_1');
                if (!empty($image)) { ?>
                    <img class="thumbnail" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php } ?>
            </div>
        </div>

        <div id="stick-1" class="cell text-center medium-order-1 medium-text-left small-12 medium-7 large-6">

            <?php echo the_field('biography_1') ?>

        </div>

    </div>

    <div class="grid-x">

        <div class="cell text-center small-12 medium-5 large-6" data-sticky-container>
            <div class="sticky" data-sticky data-anchor="stick-2">
                <?php
                $image = get_field('sticky_image_2');
                if (!empty($image)) { ?>
                    <img class="thumbnail" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php } ?>
            </div>
        </div>

        <div id="stick-2" class="cell text-center medium-text-right small-12 medium-7 large-6">

            <?php echo the_field('biography_2') ?>

        </div>

    </div>

    <section class="grid-x align-center">

        <div class="cell small-12 medium-7 large-5 card">

            <div class="card-divider">
                <?php echo the_field('card_title') ?>
            </div>

            <?php
            $image = get_field('portrait');
            if (!empty($image)) { ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php } ?>

            <div class="card-section">

                <h5> <?php echo the_field('card_heading') ?></h5>
                <p> <?php echo the_field('card_paragraph') ?> </p>

            </div>

        </div>

    </section>

</main>

<?php get_footer(); ?>