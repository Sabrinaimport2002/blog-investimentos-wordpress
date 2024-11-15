<?php
get_header();
?>

<main>
    <h1>Últimas publicações</h1>

    <div id="post-grid-container">
        <?php
        // Obtem posts de "Investimentos"
        $args = array(
            'post_type' => 'investimentos',
            'posts_per_page' => 6,
            'paged' => 1
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            echo '<div class="post-grid">'; // Grid
            while ($query->have_posts()) : $query->the_post();
        ?>

                <div class="post-item">
                    <!-- Imagem Destacada -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="info">
                        <!-- Categoria -->
                        <div class="post-category">
                            <?php
                            $categoria = get_field('categoria');
                            if ($categoria) {
                                echo esc_html($categoria);
                            }
                            ?>
                        </div>

                        <!-- Título -->
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <!-- Data -->
                        <div class="post-date">
                            <?php echo get_the_date('d/m/Y'); ?>
                        </div>

                        <!-- Leia agora -->
                        <a href="<?php the_permalink(); ?>" class="read-now-btn">
                            Leia agora
                            <span class="material-symbols-outlined">
                                east
                            </span>
                        </a>
                    </div>
                </div>

            <?php
            endwhile;
            echo '</div>';
            ?>

            <!-- Botão "Carregar mais posts" -->
            <button
                id="load-more">
                Carregar mais posts
            </button>
        <?php
        else :
            echo '<p>Nenhum investimento encontrado.</p>';
        endif;

        wp_reset_postdata();
        ?>
    </div>
</main>