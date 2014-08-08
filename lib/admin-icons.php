<?php
function add_icons_styles(){
?>
<style>

#adminmenu .menu-icon-visual-form-builder div.wp-menu-image:before {
  content: '\f123';
}
span.add-form-buttons-icon {
display: inline-block;
width: 18px;
height: 18px;
vertical-align: text-top;
margin: 0 2px;
font: 400 18px/1 dashicons;
-webkit-font-smoothing: antialiased;
}
span.add-youtube-buttons-icon:before {
content: "\f236";
}
 span.add-youtube-buttons-icon {
background: 0 0;
}
span.add-youtube-buttons-icon {
display: inline-block;
width: 18px;
height: 18px;
vertical-align: text-top;
margin: 0 2px;
font: 400 18px/1 dashicons;
-webkit-font-smoothing: antialiased;
}
span.add-form-buttons-icon:before {
content: '\f123';
}
 span.add-form-buttons-icon {
background: 0 0;
}

.hide_meta {
    display: none;
}
</style>
 
<?php
}
add_action( 'admin_head', 'add_icons_styles' );
?>