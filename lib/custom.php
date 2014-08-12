<?php
add_action( 'smallermobs_page_feature', 'set_page_feature', 10);
function set_page_feature() {
    global $ss_settings;
    if ( $ss_settings['site_style'] == 'boxed' ) {
        echo '<div class="container boxed-container">';
    } else {
        echo '<div>';
    };
    if ( is_front_page() ) {
        while ( have_posts() ) : the_post();
            $image_id = get_post_thumbnail_id();
            $image_src = wp_get_attachment_image_src($image_id,'full', true);
            $image_url = $image_src[0];
            ?>
            <div class="home-feature" style="background: url(<?php echo $image_url; ?>);">
                <div class="container">
                    <div class="home-tagline">
                        <?php echo get_bloginfo('description');?>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    } else if (is_archive()) {
        ?>
        <div class="page-feature">
            <div class="container">
                <h1><?php if (is_woocommerce()) { woocommerce_page_title(); } else { echo 'ARCHIVE TITLE'; } ?></h1>

            </div>
        </div>
        <?php
    } else {
        while ( have_posts() ) : the_post();
            $image_id = get_post_thumbnail_id();
            $image_src = wp_get_attachment_image_src($image_id,'full', true);
            $image_url = $image_src[0];
            ?>
            <div class="page-feature"
            <?php if ( has_post_thumbnail() ) {
                echo 'style="background: url(' . $image_url . ')"';
            }
            ?>
            > <!-- end of tag> -->

                <div class="container">
                    <?php
                    smallermobs_title_section();
                    echo '<div class="pull-right">';
                    do_action( 'smallermobs_entry_meta' );
                    echo "</div>";
                    ?>
                    <div class="page-tagline">
                        TAGLINE METABOX TO BE IMPLEMENTED.
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    };
    echo "</div>";
};
?>