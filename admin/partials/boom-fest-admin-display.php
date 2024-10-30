<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.ibsofts.com
 * @since      2.1.0
 *
 * @package    Boom_Fest
 * @subpackage Boom_Fest/admin/partials
 */
 
 $args = array(
    'sort_order' => 'asc',
    'sort_column' => 'post_title',
    'hierarchical' => 1,
    'exclude' => '',
    'include' => '',
    'meta_key' => '',
    'meta_value' => '',
    'authors' => '',
    'child_of' => 0,
    'parent' => -1,
    'exclude_tree' => '',
    'number' => '',
    'offset' => 0,
    'post_type' => 'page',
    'post_status' => 'publish'
);
$pages = get_pages($args);
global $wpdb;
$table=$wpdb->prefix.'boom_festive_data';
$table2=$wpdb->prefix.'boom_festive_activated';

// Checking for activated data
$checkdata=$wpdb->get_results("SELECT * FROM $table2 WHERE id=1");
if(!empty($checkdata)){
    $festival = $checkdata[0]->festival;
    $celebration_type = $checkdata[0]->celebration_type;
    $decoration_image = $checkdata[0]->decoration_image;
    $font_style = $checkdata[0]->font_style;
    $selected_pages=json_decode($checkdata[0]->pages);
}

// Checking and setting data's according to festivals
$fest_list_ny = $wpdb->get_results("SELECT decorations FROM $table WHERE festival='new-year';");
$fest_list_s = $wpdb->get_results("SELECT decorations FROM $table WHERE festival='spring';");
$fest_list_h = $wpdb->get_results("SELECT decorations FROM $table WHERE festival='halloween';");
$fest_list_bf = $wpdb->get_results("SELECT decorations FROM $table WHERE festival='black-friday';");
$fest_list_c = $wpdb->get_results("SELECT decorations FROM $table WHERE festival='christmas';");

$decorations_ny = json_decode($fest_list_ny[0]->decorations);
$celebration_types_ny = $decorations_ny->celebration_type;
$decoration_image_ny = $decorations_ny->decoration_image;
$fonts_style_ny = $decorations_ny->font_style;

$decorations_s = json_decode($fest_list_s[0]->decorations);
$celebration_types_s = $decorations_s->celebration_type;
$decoration_image_s = $decorations_s->decoration_image;
$fonts_style_s = $decorations_s->font_style;

$decorations_h = json_decode($fest_list_h[0]->decorations);
$celebration_types_h = $decorations_h->celebration_type;
$decoration_image_h = $decorations_h->decoration_image;
$fonts_style_h = $decorations_h->font_style;

$decorations_bf = json_decode($fest_list_bf[0]->decorations);
$celebration_types_bf = $decorations_bf->celebration_type;
$decoration_image_bf = $decorations_bf->decoration_image;
$fonts_style_bf = $decorations_bf->font_style;

$decorations_c = json_decode($fest_list_c[0]->decorations);
$celebration_types_c = $decorations_c->celebration_type;
$decoration_image_c = $decorations_c->decoration_image;
$fonts_style_c = $decorations_c->font_style;

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="bf-container">
    <div id="bf-header">
        <img id="boom-fest-icon" src="<?php echo BOOM_FEST_URL.'uploads/boom-fest-icon.png'; ?>" alt="" />
        <b>Boom Fest</b>
    </div>
    <div class="alert alert-success alert-dismissible fade show bf-alert mb-3 w-100 notification" role="alert">
        <strong>Saved Successfully.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div id="bf-body">
        <div class="bf-body-child">
            <div>
                <form id="bf-festival-dropdown" class="mb-2">
                    <label for="festival">Festival:</label>
                    <select name="festival" id="festival">
                        <option value="">Select Festival</option>
                        <option value="new-year" <?php echo esc_attr((isset($festival) && $festival=='new-year') ? "selected" : ""); ?>>New year</option>
                        <option value="spring" <?php echo esc_attr((isset($festival) && $festival=='spring') ? "selected" : ""); ?>>Spring</option>
                        <option value="halloween" <?php echo esc_attr((isset($festival) && $festival=='halloween') ? "selected" : ""); ?>>Halloween</option>
                        <option value="black-friday" <?php echo esc_attr((isset($festival) && $festival=='black-friday') ? "selected" : ""); ?>>Black Friday</option>
                        <option value="christmas" <?php echo esc_attr((isset($festival) && $festival=='christmas') ? "selected" : ""); ?>>Christmas</option>
                    </select>
                </form>
                <small>** Select festival from above to choose and apply decoration effects.</small>
                <hr class="mt-1">
            </div>
            <div id="bf-festive-checkbox">
                <form id="bf-festive-new-year">
                    <div class="ib-form-sec">
                        <label for="celebration_type">Celebration Animation:</label>
                        <select name="celebration_type" id="celebration_type" class="form-select">
                            <option value="">Select Animation</option>
                            <?php if(isset($celebration_types_ny)){
                                    foreach ($celebration_types_ny as $ct) {?>
                                        <option class="fest-anime new-year" value="<?php echo esc_attr($ct); ?>" <?php echo esc_attr((isset($celebration_type) && $celebration_type==$ct) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($ct); ?></option>
                            <?php } } ?>
                            <?php if(isset($celebration_types_s)){
                                    foreach ($celebration_types_s as $ct) {?>
                                        <option class="fest-anime spring" value="<?php echo esc_attr($ct); ?>" <?php echo esc_attr((isset($celebration_type) && $celebration_type==$ct) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($ct); ?></option>
                            <?php } } ?>
                            <?php if(isset($celebration_types_h)){
                                    foreach ($celebration_types_h as $ct) {?>
                                        <option class="fest-anime halloween" value="<?php echo esc_attr($ct); ?>" <?php echo esc_attr((isset($celebration_type) && $celebration_type==$ct) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($ct); ?></option>
                            <?php } } ?>
                            <?php if(isset($celebration_types_bf)){
                                    foreach ($celebration_types_bf as $ct) {?>
                                        <option class="fest-anime black-friday" value="<?php echo esc_attr($ct); ?>" <?php echo esc_attr((isset($celebration_type) && $celebration_type==$ct) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($ct); ?></option>
                            <?php } } ?>
                            <?php if(isset($celebration_types_c)){
                                    foreach ($celebration_types_c as $ct) {?>
                                        <option class="fest-anime christmas" value="<?php echo esc_attr($ct); ?>" <?php echo esc_attr((isset($celebration_type) && $celebration_type==$ct) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($ct); ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="ib-form-sec">
                                <label for="decoration_image">Decorate Image:</label>
                                <select name="decoration_image" id="decoration_image" class="form-select">
                                    <option value="">Select decoration Image</option>
                                    <?php if(isset($decoration_image_ny)){
                                            foreach ($decoration_image_ny as $di) {?>
                                                <option class="fest-decor new-year" value="<?php echo esc_attr($di); ?>" <?php echo esc_attr((isset($decoration_image) && $decoration_image==$di) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($di); ?></option>
                                    <?php } } ?>
                                    <?php if(isset($decoration_image_s)){
                                            foreach ($decoration_image_s as $di) {?>
                                                <option class="fest-decor spring" value="<?php echo esc_attr($di); ?>" <?php echo esc_attr((isset($decoration_image) && $decoration_image==$di) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($di); ?></option>
                                    <?php } } ?>
                                    <?php if(isset($decoration_image_h)){
                                            foreach ($decoration_image_h as $di) {?>
                                                <option class="fest-decor halloween" value="<?php echo esc_attr($di); ?>" <?php echo esc_attr((isset($decoration_image) && $decoration_image==$di) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($di); ?></option>
                                    <?php } } ?>
                                    <?php if(isset($decoration_image_bf)){
                                            foreach ($decoration_image_bf as $di) {?>
                                                <option class="fest-decor black-friday" value="<?php echo esc_attr($di); ?>" <?php echo esc_attr((isset($decoration_image) && $decoration_image==$di) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($di); ?></option>
                                    <?php } } ?>
                                    <?php if(isset($decoration_image_c)){
                                            foreach ($decoration_image_c as $di) {?>
                                                <option class="fest-decor christmas" value="<?php echo esc_attr($di); ?>" <?php echo esc_attr((isset($decoration_image) && $decoration_image==$di) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($di); ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="ib-form-sec">
                                <label for="font_style">Font Style:</label>
                                <select name="font_style" id="font_style" class="form-select">
                                    <option value="">Select Font Style</option>
                                    <?php if(isset($fonts_style_ny)){
                                            foreach ($fonts_style_ny as $fs) {?>
                                                <option class="fest-font new-year" value="<?php echo esc_attr($fs); ?>" <?php echo esc_attr((isset($font_style) && $font_style==$fs) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($fs); ?></option>
                                    <?php } } ?>
                                    <?php if(isset($fonts_style_s)){
                                            foreach ($fonts_style_s as $fs) {?>
                                                <option class="fest-font spring" value="<?php echo esc_attr($fs); ?>" <?php echo esc_attr((isset($font_style) && $font_style==$fs) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($fs); ?></option>
                                    <?php } } ?>
                                    <?php if(isset($fonts_style_h)){
                                            foreach ($fonts_style_h as $fs) {?>
                                                <option class="fest-font halloween" value="<?php echo esc_attr($fs); ?>" <?php echo esc_attr((isset($font_style) && $font_style==$fs) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($fs); ?></option>
                                    <?php } } ?>
                                    <?php if(isset($fonts_style_bf)){
                                            foreach ($fonts_style_bf as $fs) {?>
                                                <option class="fest-font black-friday" value="<?php echo esc_attr($fs); ?>" <?php echo esc_attr((isset($font_style) && $font_style==$fs) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($fs); ?></option>
                                    <?php } } ?>
                                    <?php if(isset($fonts_style_c)){
                                            foreach ($fonts_style_c as $fs) {?>
                                                <option class="fest-font christmas" value="<?php echo esc_attr($fs); ?>" <?php echo esc_attr((isset($font_style) && $font_style==$fs) ? "selected" : ""); ?> style="display:none"><?php echo esc_html($fs); ?></option>
                                    <?php } } ?>
                                </select>                    
                            </div>
                        </div>
                    </div>
                    <div class="ib-form-sec">
                        <label for="Pages"> Select pages to apply settings :</label>
                        <select name="pages" id="pages" multiple>
                            <option value="all"
                                <?php echo esc_attr((!empty($selected_pages)) && ($selected_pages[0]=='all') ? "selected" : ""); ?>>
                                All
                            </option>
                            <?php foreach($pages as $page) { ?>
                                <option class="options" value="<?php echo $page->post_title; ?>"
                                    <?php echo esc_attr((!empty($selected_pages)) && (in_array($page->post_title,$selected_pages)) ? "selected" : ""); ?>>
                                    <?php echo esc_html($page->post_title); ?>
                                </option>   
                            <?php } ?>
                        </select>
                    </div> 

                    <div><input type="submit" value="Submit"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#pages').chosen();
</script>