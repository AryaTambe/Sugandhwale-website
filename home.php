<?php get_header(); ?>

<main class="blog-page">

    <!-- BLOG HERO -->
    <section class="blog-hero">

        <span class="blog-eyebrow">
            The World of Sugandhwale
        </span>

        <h1>
            Stories, Fragrance <br>
            <em>&amp; Tradition</em>
        </h1>

        <p>
            Explore the stories behind fragrance, Indian traditions,
            rituals, memories and the world of Sugandhwale.
        </p>

    </section>


    <!-- BLOG POSTS -->

    <section class="blog-posts">

        <div class="blog-posts-container">

            <?php if (have_posts()) : ?>

                <?php
                $post_count = 0;
                ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php $post_count++; ?>


                    <?php if ($post_count === 1) : ?>

                        <!-- FEATURED POST -->

                        <article class="blog-featured-post">

                            <a href="<?php the_permalink(); ?>" class="featured-image">

                                <?php if (has_post_thumbnail()) : ?>

                                    <?php the_post_thumbnail('large'); ?>

                                <?php endif; ?>

                            </a>


                            <div class="featured-content">

                                <div class="post-category">

                                    <?php
                                    $categories = get_the_category();

                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>

                                </div>


                                <h2>

                                    <a href="<?php the_permalink(); ?>">

                                        <?php the_title(); ?>

                                    </a>

                                </h2>


                                <p>

                                    <?php
                                    echo wp_trim_words(
                                        get_the_excerpt(),
                                        30,
                                        '...'
                                    );
                                    ?>

                                </p>


                                <div class="featured-meta">

                                    <span>
                                        <?php echo get_the_date('F j, Y'); ?>
                                    </span>

                                    <span class="meta-dot"></span>

                                    <span>
                                        <?php echo sugandhwale_reading_time(); ?>
                                    </span>

                                </div>


                                <a
                                    href="<?php the_permalink(); ?>"
                                    class="read-story"
                                >

                                    Read Story
                                    <span>→</span>

                                </a>

                            </div>

                        </article>


                    <?php else : ?>


                        <!-- NORMAL POST CARD -->

                        <article class="blog-card">

                            <a href="<?php the_permalink(); ?>" class="blog-card-image">

                                <?php if (has_post_thumbnail()) : ?>

                                    <?php the_post_thumbnail('medium_large'); ?>

                                <?php endif; ?>

                            </a>


                            <div class="blog-card-content">

                                <div class="post-category">

                                    <?php
                                    $categories = get_the_category();

                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>

                                </div>


                                <h2>

                                    <a href="<?php the_permalink(); ?>">

                                        <?php the_title(); ?>

                                    </a>

                                </h2>


                                <p>

                                    <?php
                                    echo wp_trim_words(
                                        get_the_excerpt(),
                                        20,
                                        '...'
                                    );
                                    ?>

                                </p>


                                <a
                                    href="<?php the_permalink(); ?>"
                                    class="read-story"
                                >

                                    Read Story
                                    <span>→</span>

                                </a>

                            </div>

                        </article>


                    <?php endif; ?>


                <?php endwhile; ?>


            <?php else : ?>

                <div class="no-posts">

                    <h2>No stories yet.</h2>

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