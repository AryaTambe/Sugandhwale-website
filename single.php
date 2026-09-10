<?php get_header(); ?>

<main class="blog-post">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <!-- BLOG HERO -->

            <section class="blog-hero">

                <div class="blog-hero-inner">

                    <?php
                    $categories = get_the_category();

                    if (!empty($categories)) :
                    ?>

                        <span class="blog-category">
                            <?php echo esc_html($categories[0]->name); ?>
                        </span>

                    <?php endif; ?>

                    <h1 class="blog-title">
                        <?php the_title(); ?>
                    </h1>

                    <div class="blog-meta">

                        <span>
                            By <?php the_author(); ?>
                        </span>

                        <span class="meta-dot"></span>

                        <span>
                            <?php echo get_the_date('F j, Y'); ?>
                        </span>

                        <span class="meta-dot"></span>

                        <span>
                            <?php echo ceil(str_word_count(strip_tags(get_the_content())) / 200); ?> min read
                        </span>

                    </div>

                </div>

            </section>


            <!-- FEATURED IMAGE -->

            <?php if (has_post_thumbnail()) : ?>

                <section class="blog-featured-image">

                    <?php the_post_thumbnail('full'); ?>

                </section>

            <?php endif; ?>


            <!-- BLOG CONTENT -->

            <section class="blog-content-wrapper">

                <article class="blog-content">

                    <?php the_content(); ?>

                </article>

            </section>


            <!-- BLOG END / CTA -->

            <section class="blog-end">

                <div class="blog-end-inner">

                    <span class="blog-end-label">
                        THE WORLD OF SUGANDHWALE
                    </span>

                    <h2>
                        Every fragrance has a story.
                    </h2>

                    <p>
                        Explore fragrances inspired by tradition,
                        memories, rituals and everyday moments.
                    </p>

                    <a href="<?php echo esc_url(home_url('/products/')); ?>">
                        Explore Collection →
                    </a>

                </div>

            </section>

        <?php endwhile; ?>

    <?php endif; ?>

</main>

<?php get_footer(); ?>