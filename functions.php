<?php
include(TEMPLATEPATH.'/widgets.php');
add_theme_support('post-thumbnails');
set_post_thumbnail_size('137', '137', true);
function copy_date($date) {
	if($date == date('Y')) {
		echo $date;
	} else {
		echo $date.' - '.date('Y');
	}
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2>',
		'after_title' => '</h2><div class="widget_wrap">',
	));
}

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
}
 
$key = "Page";  
$meta_boxes = array(  
		
	"Newsletter" => array(  
		"name" => "newsletter",  
		"title" => "Do you want newsletter form on this page?",
		"type" => "checkbox")
);  
  
function create_meta_box() {  
global $key;  
  
if( function_exists( 'add_meta_box' ) ) {  
add_meta_box( 'new-meta-boxes', ucfirst( $key ) . ' options', 'display_meta_box', 'page', 'normal', 'high' );  
}  
}  
  
function display_meta_box() {  
global $post, $meta_boxes, $key;  
?>  
  
<div class="form-wrap">  
  
<?php  
wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );
  
foreach($meta_boxes as $meta_box) {
$data = get_post_meta($post->ID, $key, true);
switch($meta_box['type']) {

	case "text":
?>

	<div class="form-field form-required">
		<label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
		<input type="text" name="<?php echo $meta_box[ 'name' ]; ?>" value="<?php echo htmlspecialchars( $data[ $meta_box[ 'name' ] ] ); ?>" />
		<p><?php echo $meta_box[ 'description' ]; ?></p>
	</div>
<?php break;
	case "textarea": ?>
	
	<div class="form-field form-required">
		<label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
		<textarea name="<?php echo $meta_box[ 'name' ]; ?>"><?php echo htmlspecialchars( $data[ $meta_box[ 'name' ] ] ); ?></textarea>
		<p><?php echo $meta_box[ 'description' ]; ?></p>
	</div>
	 
<?php break;
	case "image": ?>
	
	<?php if($data[$meta_box['name']]) { ?>
	<div class="form-field form-required">
		<label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
		<div style="float: left; width: 75%;">
			<input type="text" name="<?php echo $meta_box[ 'name' ]; ?>" value="<?php echo htmlspecialchars( $data[ $meta_box[ 'name' ] ] ); ?>" />
				<p><?php echo $meta_box[ 'description' ]; ?></p>
			</div>
			<a href="<?php echo $data[$meta_box['name']]; ?>" target="_blank"><img src="<?php echo $data[$meta_box['name']]; ?>" width="15%" style="float: left; border: 1px solid #DFDFDF; padding: 3px; margin: 0 0 0 10px; display: inline;" alt=""/></a>
		<div style="clear:both"></div>
	</div>
	<?php } else { ?>
		<div class="form-field form-required">
			<label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
			<input type="text" name="<?php echo $meta_box[ 'name' ]; ?>" value="<?php echo htmlspecialchars( $data[ $meta_box[ 'name' ] ] ); ?>" />
			<p><?php echo $meta_box[ 'description' ]; ?></p>
		</div>
	<?php } ?>
	
<?php break; 
	case "checkbox":?>
	
	<div class="inside form-required">
		<p class="meta-options">
			<label class="selectit" for="<?php echo $meta_box[ 'name' ]; ?>">
				<input <?php if($data[$meta_box['name']]) { echo "checked=\"checked\""; } ?> type="checkbox" name="<?php echo $meta_box[ 'name' ]; ?>" value="1" />
				<?php echo $meta_box[ 'title' ]; ?>
			</label>
		</p>
		<p><?php echo $meta_box[ 'description' ]; ?></p>
	</div>
	
<?php break;
	case "select":?>
	
	<div class="form-field form-required">
		<label for="<?php echo $meta_box['name']; ?>"><?php echo $meta_box['title']; ?></label>
		<select style="width:240px;" name="<?php echo $meta_box['name']; ?>" id="<?php echo $meta_box['name']; ?>">
			<?php foreach ($meta_box['options'] as $option) { ?>
			<option <?php echo "value='".$option['ID']."'"; ?><?php if ($data[$meta_box['name']] == $option['ID']) { echo ' selected="selected"'; }?>><?php echo $option['name']; ?></option><?php } ?>
		</select>
		<p><?php echo $meta_box[ 'description' ]; ?></p>
	</div>
	
<?php break;?>
<?php }} ?>  
  
</div>  
<?php  
}  
  
function save_meta_box( $post_id ) {  
global $post, $meta_boxes, $key;  
  
foreach( $meta_boxes as $meta_box ) {  
$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];  
}  
  
if ( !wp_verify_nonce( $_POST[ $key . '_wpnonce' ], plugin_basename(__FILE__) ) )  
return $post_id;  
  
if ( !current_user_can( 'edit_post', $post_id ))  
return $post_id;  
  
update_post_meta( $post_id, $key, $data );  
}  
  
add_action( 'admin_menu', 'create_meta_box' );  
add_action( 'save_post', 'save_meta_box' );  
?>