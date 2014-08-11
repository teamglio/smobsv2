<?php
class PanelWidget extends WP_Widget {

    function PanelWidget() {
            $widget_ops = array('description' => 'Branded title bar with content');
            $this->WP_Widget('PanelWidget', 'Panel Widget', $widget_ops);
    }

    function form( $instance ) {
        // Output admin widget options form
            $title = esc_attr($instance['title']);
            $style = esc_attr($instance['style']);
            $size = esc_attr($instance['size']);
            ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if (!empty ($title)) { echo $title; } ?>" />
                <label for="<?php echo $this->get_field_id('style'); ?>">Style:</label>
                <select class="widefat" id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>" type="number" value="<?php echo $style; ?>">
                    <option value="panel-default">Default</option>
                    <option value="panel-primary" <?php if ($style == 'panel-primary') { echo 'selected' ;} ?> >Primary</option>
                    <option value="panel-success" <?php if ($style == 'panel-success') { echo 'selected' ;} ?> >Success</option>
                    <option value="panel-info" <?php if ($style == 'panel-info') { echo 'selected' ;} ?> >Info</option>
                    <option value="panel-warning" <?php if ($style == 'panel-warning') { echo 'selected' ;} ?> >Warning</option>
                    <option value="panel-danger" <?php if ($style == 'panel-anger') { echo 'selected' ;} ?> >Danger</option>
                </select>
                <label for="<?php echo $this->get_field_id('size'); ?>">Size (000x000):</label>
                <input class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" type="text" value="<?php if (!empty ($size)) { echo $size; } ?>" />
            
            </p>
            <?php

    } //ending form creation

    function update( $new_instance, $old_instance ) {
        // Save widget options
            $instance = $old_instance;
            $instance['title'] = strip_tags($new_instance['title']);
            $instance['style'] = strip_tags($new_instance['style']);
            $instance['size'] = strip_tags($new_instance['size']);
            return $instance;
    } //ending update


    function widget( $args, $instance ){
        // Widget output
            extract($args, EXTR_SKIP);
            $title = $instance['title'];
            $panelstyle = $instance['style'];
            $imagesize = $instance['size'];
            if (empty ($imagesize)) {
                $imagesize = '300x200';
            }
            echo $before_widget;
            echo '<div class="panel ' . $panelstyle . '">';
            ?>
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
              </div>
              <div class="panel-body">
                <img src="http://fpoimg.com/<?php echo $imagesize; ?>?text=Placeholder" width="100%" class="img-rounded" />
              </div>     
            <?php
            echo "</div>";
            echo $after_widget;
    } //ending widget display

}
?>