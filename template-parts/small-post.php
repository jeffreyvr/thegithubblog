<article <?php post_class(); ?>>
    <header>
        <a href="<?php the_permalink(); ?>"><h2 class="text-2xl mb-8 font-medium"><?php the_title(); ?></h2></a>
    </header>

    <div class="flex items-center text-gray-600">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 40, null, null, array( 'class' => 'rounded-full mr-4' ) ); ?>

        <?php the_author(); ?>
    </div>
</article>