<?php get_header(); ?>

<main class="journal-page">

    <!-- =========================================
         JOURNAL INTRO
    ========================================= -->

    <section class="journal-intro">

        <div class="journal-intro-inner">

            <div class="journal-intro-left">

                <span class="journal-kicker">
                    Sugandhwale Journal
                </span>

                <h1>
                    The art of
                    <em>scent.</em>
                </h1>

            </div>


            <div class="journal-intro-right">

                <p>
                    Stories, rituals, craftsmanship and the memories
                    that live within fragrance.
                </p>

                <span class="journal-scroll">
                    Explore the journal
                    <span>↓</span>
                </span>

            </div>

        </div>

    </section>


    <!-- =========================================
         STORIES
    ========================================= -->

    <section class="journal-stories">

        <div class="journal-container">

            <?php if (have_posts()) : ?>

                <?php
                $post_count = 0;
                ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php $post_count++; ?>


                    <?php if ($post_count === 1) : ?>

                        <!-- =================================
                             FEATURED STORY
                        ================================= -->

                        <article class="journal-featured">

                            <a
                                href="<?php the_permalink(); ?>"
                                class="journal-featured-image"
                            >

                                <?php if (has_post_thumbnail()) : ?>

                                    <?php
                                    the_post_thumbnail(
                                        'large',
                                        array(
                                            'loading' => 'eager'
                                        )
                                    );
                                    ?>

                                <?php else : ?>

                                    <div class="journal-image-placeholder"></div>

                                <?php endif; ?>

                            </a>


                            <div class="journal-featured-content">

                                <div class="journal-story-meta">

                                    <?php
                                    $categories = get_the_category();

                                    if (!empty($categories)) :
                                    ?>

                                        <span class="journal-category">
                                            <?php
                                            echo esc_html(
                                                $categories[0]->name
                                            );
                                            ?>
                                        </span>

                                    <?php endif; ?>

                                    <span class="journal-meta-line"></span>

                                    <span>
                                        <?php
                                        echo esc_html(
                                            get_the_date('F j, Y')
                                        );
                                        ?>
                                    </span>

                                </div>


                                <h2>

                                    <a href="<?php the_permalink(); ?>">

                                        <?php the_title(); ?>

                                    </a>

                                </h2>


                                <p class="journal-featured-excerpt">

                                    <?php
                                    echo esc_html(
                                        wp_trim_words(
                                            get_the_excerpt(),
                                            34,
                                            '...'
                                        )
                                    );
                                    ?>

                                </p>


                                <div class="journal-featured-bottom">

                                    <span class="journal-reading-time">

                                        <?php
                                        echo esc_html(
                                            sugandhwale_reading_time()
                                        );
                                        ?>

                                    </span>


                                    <a
                                        href="<?php the_permalink(); ?>"
                                        class="journal-read"
                                    >

                                        <span>Read story</span>

                                        <strong>↗</strong>

                                    </a>

                                </div>

                            </div>

                        </article>


                    <?php else : ?>


                        <!-- =================================
                             STANDARD STORY
                        ================================= -->

                        <article class="journal-card">

                            <a
                                href="<?php the_permalink(); ?>"
                                class="journal-card-image"
                            >

                                <?php if (has_post_thumbnail()) : ?>

                                    <?php
                                    the_post_thumbnail(
                                        'medium_large'
                                    );
                                    ?>

                                <?php else : ?>

                                    <div class="journal-image-placeholder"></div>

                                <?php endif; ?>

                            </a>


                            <div class="journal-card-content">

                                <div class="journal-card-meta">

                                    <?php
                                    $categories = get_the_category();

                                    if (!empty($categories)) :
                                    ?>

                                        <span>
                                            <?php
                                            echo esc_html(
                                                $categories[0]->name
                                            );
                                            ?>
                                        </span>

                                    <?php endif; ?>

                                    <span class="journal-meta-dot"></span>

                                    <span>
                                        <?php
                                        echo esc_html(
                                            get_the_date('F j, Y')
                                        );
                                        ?>
                                    </span>

                                </div>


                                <h2>

                                    <a href="<?php the_permalink(); ?>">

                                        <?php the_title(); ?>

                                    </a>

                                </h2>


                                <p>

                                    <?php
                                    echo esc_html(
                                        wp_trim_words(
                                            get_the_excerpt(),
                                            22,
                                            '...'
                                        )
                                    );
                                    ?>

                                </p>


                                <a
                                    href="<?php the_permalink(); ?>"
                                    class="journal-card-link"
                                >

                                    Read story

                                    <span>↗</span>

                                </a>

                            </div>

                        </article>


                    <?php endif; ?>

                <?php endwhile; ?>


                <!-- =========================================
                     PAGINATION
                ========================================== -->

                <?php

                $pagination = paginate_links(
                    array(
                        'type'      => 'list',
                        'prev_text' => '←',
                        'next_text' => '→',
                    )
                );

                if ($pagination) :
                ?>

                    <nav class="journal-pagination">

                        <?php echo $pagination; ?>

                    </nav>

                <?php endif; ?>


            <?php else : ?>


                <!-- =========================================
                     EMPTY STATE
                ========================================== -->

                <div class="journal-empty">

                    <span class="journal-kicker">
                        The Journal
                    </span>

                    <h2>
                        Stories are coming.
                    </h2>

                    <p>
                        The world of Sugandhwale is still being written.
                        Check back soon.
                    </p>

                </div>


            <?php endif; ?>

        </div>

    </section>

</main>

<?php get_footer(); ?>