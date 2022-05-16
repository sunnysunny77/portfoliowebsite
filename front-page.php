<?php get_header();
$disclaimer = get_field('disclaimer');

?>

<main id="main" class="grid-y">

    <section class="cell grid-container grid-x align-right text-center medium-text-right">

        <h2 class="cell"><?php echo the_field('heading') ?></h2>

        <?php
        $image = get_field('heading_image');
        if (!empty($image)) { ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php } ?>

    </section>

    <ul class="cell hover grid-x grid-container text-center menu align-center" data-tabs id="tabs">

        <li class="cell small-6 medium-4 tabs-title is-active">
            <a aria-label="FILM" class="goto" href="#panel1">
                <figure class="hover-box">
                    <?php
                    $image = get_field('film');
                    if (!empty($image)) { ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php } ?>
                    <figcaption>
                        <h3>FILM</h3>
                    </figcaption>
                </figure>
            </a>
        </li>
        <li class="cell small-6 medium-4 tabs-title">
            <a aria-label="THEATRE" class="goto" data-tabs-target="panel2" href="#panel2">
                <figure class="hover-box">
                    <?php
                    $image = get_field('theatre');
                    if (!empty($image)) { ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php } ?>
                    <figcaption>
                        <h3>THEATRE</h3>
                    </figcaption>
                </figure>
            </a>
        </li>
        <li class="cell small-6 medium-4 tabs-title">
            <a aria-label="DESIGN" class="goto" data-tabs-target="panel3" href="#panel3">
                <figure class="hover-box">
                    <?php
                    $image = get_field('design');
                    if (!empty($image)) { ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php } ?>
                    <figcaption>
                        <h3>DESIGN</h3>
                    </figcaption>
                </figure>
            </a>
        </li>
        <li class="cell small-6 medium-4 tabs-title">
            <a aria-label="POETRY" class="goto" data-tabs-target="panel4" href="#panel4">
                <figure class="hover-box">
                    <?php
                    $image = get_field('poetry');
                    if (!empty($image)) { ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php } ?>
                    <figcaption>
                        <h3>POETRY</h3>
                    </figcaption>
                </figure>
            </a>
        </li>
        <li class="cell small-6 medium-4 tabs-title">
            <a aria-label="SCULPUTRES" class="goto" data-tabs-target="panel5" href="#panel5">
                <figure class="hover-box">
                    <?php
                    $image = get_field('sculptures');
                    if (!empty($image)) { ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php } ?>
                    <figcaption>
                        <h3>SCULPUTRES</h3>
                    </figcaption>
                </figure>
            </a>
        </li>
        <li class="cell small-6 medium-4 tabs-title">
            <a aria-label="ILLUSTRATIONS" class="goto" data-tabs-target="panel6" href="#panel6">
                <figure class="hover-box">
                    <?php
                    $image = get_field('illustrations');
                    if (!empty($image)) { ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php } ?>
                    <figcaption>
                        <h3>ILLUSTRATIONS</h3>
                    </figcaption>
                </figure>
            </a>
        </li>

    </ul>

    <div class="tabs-content text-center" id="goto" data-tabs-content="tabs">

        <div class="tabs-panel is-active" id="panel1">

            <div class="grid-x align-right">

                <ul class="cell sticky-ul grid-x small-12 medium-4 large-3 text-left
                    vertical menu
                    align-top">
                    <li> <i class="fi-thumbnails"></i></li>
                    <li>Film:
                        <ul class="nested vertical menu">
                            <li><i class="fi-list"></i><a href="#storyboard">Storyboarding</a></li>
                            <li><i class="fi-list"></i><a href="#concept">Concept art</a></li>
                        </ul>
                    </li>
                    <li><i class="fi-list"></i><a href="#independent">Independent
                            creations</a></li>
                    <li class="cell small-8 medium-10  last"><?php echo $disclaimer ?></li>
                    <li class="show-for-medium">
                                <a href="#main"><br/>
                                    <i class="fi-eject"></i>
                                    Return to menu
                                </a>
                            </li>
                </ul>

                <div class="cell small-12 medium-8 large-9 grid-x
                    text-center align-center">

                    <section class="cell grid-x
                        text-center align-center">

                        <h4 id="storyboard" class="cell text-right">Storyboarding</h4>
                        <a aria-label="Go to top" class="cell top-link show-for-small-only
                            text-right" href="#main"><i class="fi-eject"></i></a>

                        <?php
                        $loop = new WP_Query(array('post_type' => 'storyboarding_films', 'posts_per_page' => -1));

                        while ($loop->have_posts()) {
                            $loop->the_post();

                        ?>

                            <?php
                            $image = get_field('storyboarding_films');
                            if (!empty($image)) : ?>
                                <img class="gallery" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>

                        <?php }
                        wp_reset_query(); ?>

                    </section>

                    <section class="cell grid-x
                        text-center align-center">

                        <h4 id="concept" class="cell text-right">Concept
                            art</h4>

                        <a aria-label="Go to top" class="cell top-link show-for-small-only
                            text-right" href="#main"><i class="fi-eject"></i></a>

                        <?php
                        $loop = new WP_Query(array('post_type' => 'concepts_films', 'posts_per_page' => -1));

                        while ($loop->have_posts()) {
                            $loop->the_post();

                        ?>

                            <?php
                            $image = get_field('concepts_films');
                            if (!empty($image)) : ?>
                                <img class="gallery" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>

                        <?php }
                        wp_reset_query(); ?>

                    </section>

                    <section class="cell grid-x
                        text-center
                        align-center">

                        <h4 id="independent" class="cell text-right">Independent
                            creations</h4>

                        <a aria-label="Go to top" class="cell top-link show-for-small-only
                            text-right" href="#main"><i class="fi-eject"></i></a>

                        <?php
                        $loop = new WP_Query(array('post_type' => 'independent_films', 'posts_per_page' => -1));

                        while ($loop->have_posts()) {
                            $loop->the_post();

                        ?>

                            <?php
                            $image = get_field('independent_films');
                            if (!empty($image)) : ?>
                                <img class="gallery" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>

                        <?php }
                        wp_reset_query(); ?>

                    </section>

                </div>

            </div>

        </div>

        <div class="tabs-panel" id="panel2">

            <div class="grid-x align-right">

                <ul class="cell sticky-ul grid-x small-12 medium-4 large-3 text-left
                    vertical menu
                    align-top">
                    <li> <i class="fi-thumbnails"></i></li>
                    <li>Theatre:</li>
                    <li class="cell small-8 medium-10  last"><?php echo $disclaimer ?></li>
                    <li class="show-for-medium">
                                <a href="#main"><br/>
                                    <i class="fi-eject"></i>
                                    Return to menu
                                </a>
                            </li>
                </ul>

                <section class="cell small-12 medium-8 large-9 grid-x
                    text-center align-center">

                    <h4 class="cell text-right"> Theatre</h4>

                    <a aria-label="Go to top" class="cell top-link show-for-small-only
                        text-right" href="#main"><i class="fi-eject"></i></a>

                    <?php
                    $loop = new WP_Query(array('post_type' => 'theatre', 'posts_per_page' => -1));

                    while ($loop->have_posts()) {
                        $loop->the_post();

                    ?>

                        <?php
                        $image = get_field('theatre');
                        if (!empty($image)) : ?>
                            <img class="gallery" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>

                    <?php }
                    wp_reset_query(); ?>

                </section>

            </div>

        </div>

        <div class="tabs-panel" id="panel3">

            <div class="grid-x align-right">

                <ul class="cell sticky-ul grid-x small-12 medium-4 large-3 text-left
                    vertical menu
                    align-top">
                    <li> <i class="fi-thumbnails"></i></li>
                    <li>Design:</li>
                    <li class="cell small-8 medium-10  last"><?php echo $disclaimer ?></li>
                    <li class="show-for-medium">
                                <a href="#main"><br/>
                                    <i class="fi-eject"></i>
                                    Return to menu
                                </a>
                            </li>
                </ul>

                <section class="cell small-12 medium-8 large-9 grid-x
                    text-center align-center">

                    <h4 class="cell text-right">Design</h4>

                    <a aria-label="Go to top" class="cell top-link show-for-small-only
                        text-right" href="#main"><i class="fi-eject"></i></a>

                    <?php
                    $loop = new WP_Query(array('post_type' => 'designs', 'posts_per_page' => -1));

                    while ($loop->have_posts()) {
                        $loop->the_post();

                    ?>

                        <?php
                        $image = get_field('designs');
                        if (!empty($image)) : ?>
                            <img class="gallery" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>

                    <?php }
                    wp_reset_query(); ?>

                </section>

            </div>

        </div>

        <div class="tabs-panel" id="panel4">

            <div class="grid-x align-right">

                <ul class="cell sticky-ul grid-x small-12 medium-4 large-3 text-left
                    vertical menu
                    align-top">
                    <li> <i class="fi-thumbnails"></i></li>
                    <li>Poetry:
                        <ul class="nested vertical menu">
                            <li><i class="fi-list"></i><a href="#poetry">Poems</a></li>
                            <li><i class="fi-list"></i><a href="#illustrated-poetry">Illustrated
                                    Poetry</a></li>
                        </ul>
                    </li>
                    <li class="cell small-8 medium-10  last"><?php echo $disclaimer ?></li>
                    <li class="show-for-medium">
                                <a href="#main"><br/>
                                    <i class="fi-eject"></i>
                                    Return to menu
                                </a>
                            </li>
                </ul>

                <div class="cell small-12 medium-8 large-9 grid-x
                    text-center align-center">

                    <section class="cell grid-x
                        text-center align-center">

                        <h4 id="poetry" class="cell text-right">Poems</h4>
                        <a aria-label="Go to top" class="cell top-link show-for-small-only
                            text-right" href="#main"><i class="fi-eject"></i></a>

                        <?php
                        $loop = new WP_Query(array('post_type' => 'poems_poetry', 'posts_per_page' => -1));

                        while ($loop->have_posts()) {
                            $loop->the_post();

                        ?>

                            <?php
                            $image = get_field('poems_poetry');
                            if (!empty($image)) : ?>
                                <img class="gallery" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>

                        <?php }
                        wp_reset_query(); ?>

                    </section>

                    <section class="cell grid-x
                        text-center align-center">

                        <h4 id="illustrated-poetry" class="cell
                            text-right">Illustrated
                            Poetry</h4>

                        <a aria-label="Go to top" class="cell top-link show-for-small-only
                            text-right" href="#main"><i class="fi-eject"></i></a>

                        <?php
                        $loop = new WP_Query(array('post_type' => 'illustrated_poetry', 'posts_per_page' => -1));

                        while ($loop->have_posts()) {
                            $loop->the_post();

                        ?>

                            <?php
                            $image = get_field('illustrated_poetry');
                            if (!empty($image)) : ?>
                                <img class="gallery" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>

                        <?php }
                        wp_reset_query(); ?>

                    </section>

                </div>

            </div>

        </div>

        <div class="tabs-panel" id="panel5">

            <div class="grid-x align-right">

                <ul class="cell sticky-ul grid-x small-12 medium-4 large-3 text-left
                    vertical menu
                    align-top">
                    <li> <i class="fi-thumbnails"></i></li>
                    <li>Sculptures:</li>
                    <li class="cell small-8 medium-10  last"><?php echo $disclaimer ?></li>
                    <li class="show-for-medium">
                                <a href="#main"><br/>
                                    <i class="fi-eject"></i>
                                    Return to menu
                                </a>
                            </li>
                </ul>

                <section class="cell small-12 medium-8 large-9 grid-x
                    text-center align-center">

                    <h4 class="cell text-right">Sculptures</h4>

                    <a aria-label="Go to top" class="cell top-link show-for-small-only
                        text-right" href="#main"><i class="fi-eject"></i></a>

                    <?php
                    $loop = new WP_Query(array('post_type' => 'sculptures', 'posts_per_page' => -1));

                    while ($loop->have_posts()) {
                        $loop->the_post();

                    ?>

                        <?php
                        $image = get_field('sculptures');
                        if (!empty($image)) : ?>
                            <img class="gallery" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>

                    <?php }
                    wp_reset_query(); ?>

                </section>

            </div>

        </div>

        <div class="tabs-panel" id="panel6">

            <div class="grid-x align-right">

                <ul class="cell sticky-ul grid-x small-12 medium-4 large-3 text-left
                    vertical menu
                    align-top">
                    <li> <i class="fi-thumbnails"></i></li>
                    <li>Illustrations:</li>
                    <li class="cell small-8 medium-10  last"><?php echo $disclaimer ?></li>
                    <li class="show-for-medium">
                                <a href="#main"><br/>
                                    <i class="fi-eject"></i>
                                    Return to menu
                                </a>
                            </li>
                </ul>

                <section class="cell small-12 medium-8 large-9 grid-x
                    text-center align-center">

                    <h4 class="cell text-right">Illustrations</h4>
                    <a aria-label="Go to top" class="cell
                        top-link show-for-small-only
                        text-right" href="#main"><i class="fi-eject"></i></a>

                    <?php
                    $loop = new WP_Query(array('post_type' => 'illustrations', 'posts_per_page' => -1));

                    while ($loop->have_posts()) {
                        $loop->the_post();

                    ?>

                        <?php
                        $image = get_field('illustrations');
                        if (!empty($image)) : ?>
                            <img class="gallery" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>

                    <?php }
                    wp_reset_query(); ?>

                </section>

            </div>

        </div>

    </div>

</main>

<?php get_footer(); ?>