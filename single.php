<?php
/**
 * The template for displaying posts
 *
 * @package kale
 */
?>
<?php get_header(); ?>

<?php
$kale_posts_meta_show = kale_get_option('kale_posts_meta_show');
$kale_posts_date_show = kale_get_option('kale_posts_date_show');
$kale_posts_category_show = kale_get_option('kale_posts_category_show');
$kale_posts_author_show = kale_get_option('kale_posts_author_show');
$kale_posts_tags_show = kale_get_option('kale_posts_tags_show');
$kale_posts_sidebar = kale_get_option('kale_posts_sidebar');
$kale_posts_featured_image_show = kale_get_option('kale_posts_featured_image_show');
$kale_sidebar_size = kale_get_option('kale_sidebar_size');
?>
<?php while ( have_posts() ) : the_post(); ?>
<!-- Two Columns -->
<div class="row two-columns">

    <!-- Main Column -->
    <?php if($kale_posts_sidebar == 1) { ?>
    <div class="main-column <?php if($kale_sidebar_size == 0) { ?> col-md-8 <?php } else { ?> col-md-9 <?php } ?>">
    <?php } else { ?>
    <div class="main-column col-md-12">
    <?php } ?>
    
        <!-- Post Content -->
        <div id="post-<?php the_ID(); ?>" <?php post_class('entry entry-post'); ?>>

             <?php $title = get_the_title(); ?>
            <?php if($title == '') { ?>
            <h1 class="entry-title"><?php esc_html_e('Post ID: ', 'kale'); the_ID(); ?></h1>
            <?php } else { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } ?>

            <div class="author-header-info">
                <div class="author-header-image-small">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
                </div> 
                <div class="author-header-name">
                    <h4>von <a href=""><?php the_author(); ?></a></h4>      
                </div>
            </div>


            <div class="entry-header">
				<?php if($kale_posts_meta_show == 1 && $kale_posts_date_show == 1) { ?>
                <div class="entry-meta">
                    <div class="entry-date"><?php the_date(); ?></div>

                    <?php
                $mycontent = $post->post_content; 
                $word = str_word_count(strip_tags($mycontent));
                $m = floor($word / 200);
                $s = floor($word % 200 / (200 / 60));
                $est = $m . ' Minuten';
                ?>

            <p class="entry-readingtime">Lesezeit ~ <?php echo $est; ?></p>

                </div>
				<?php } ?>
				<div class="clearfix"></div>
            </div>
            
               


           
            
            <?php 
            if($kale_posts_featured_image_show == 1) { 
                if(has_post_thumbnail()) { ?>
                <div class="entry-thumb"><?php the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class'=>'img-responsive' ) ); ?></div><?php } 
            } ?>
            
            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
            </div>
          





            <div class="author-footer-box">
                <div class="author-footer-image">
                          <div>
                            <a href="">
                            <picture>
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
                            </picture>
                            </a>
                          </div>
                </div>

                <div class="author-footer-text-box">
                    <div class="author-footer-name">
                          <a href=""><h3><?php the_author(); ?></h3></a>
                    </div>
                    <ul class="author-footer-social">



                        <li><a href="http://www.facebook.com/leighweingus" title="author facebook page" target="_blank"><img class=" lazyloaded" src="//res.mindbodygreen.com/img/web/author_fb.svgz" data-src="//res.mindbodygreen.com/img/web/author_fb.svgz"></a></li>
                        <li><a href="http://twitter.com/leighweingus" title="author twitter page" target="_blank"><img class=" lazyloaded" data-src="//res.mindbodygreen.com/img/web/author_twitter.svgz" src="//res.mindbodygreen.com/img/web/author_twitter.svgz"></a></li>
                        <li><a href="http://instagram.com/leighweingus" title="author instagram page" target="_blank"><img class=" lazyloaded" data-src="//res.mindbodygreen.com/img/web/author_instagram.svgz" src="//res.mindbodygreen.com/img/web/author_instagram.svgz"></a></li>
                    </ul>
                        <div class="clearfix"></div>
                    <div class="author-footer-description">
                        <?php echo get_the_author_meta('description'); ?>
                    </div>
                        <a class="author-footer-read-more">Read more</a>
                </div>
             </div>

           

        
        </div>
        <!-- /Post Content -->
        
        <hr />
        
        <div class="pagination-post">
            <div class="previous_post"><?php previous_post_link('%link','%title',true); ?></div>
            <div class="next_post"><?php next_post_link('%link','%title',true); ?></div>
        </div>
        
        <!-- Post Comments -->
        <?php if ( comments_open() ) : ?>
        <hr />
        <?php comments_template(); ?>
        <?php endif; ?>  
        <!-- /Post Comments -->
        
    </div>
    <!-- /Main Column -->
    
    
    <?php if($kale_posts_sidebar == 1)  get_sidebar();  ?>
    
</div>
<!-- /Two Columns -->
        
<?php endwhile; ?>
<hr />

<?php get_footer(); ?>