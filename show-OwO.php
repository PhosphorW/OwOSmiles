<?php
/**
 * 评论窗显示表情：Show OwO - By Phower
 */

function smiley_trans() {
	global $wpsmiliestrans;
	global $s_filedata;
	$s_path = ABSPATH.'wp-content/themes/akina/OwO/alu/';
	$s_filedata     = glob( $s_path."*.png" );

	if ( ! isset( $wpsmiliestrans ) ) {
		$wpsmiliestrans = array();
		foreach ( $s_filedata as $s_id ) {
			$s_name                                = str_replace( "$s_path", "", $s_id ); //文件名
			$s_tage                                = str_replace( ".png", "", $s_name );  //标志
			$wpsmiliestrans[ ":" . $s_tage . ":" ] = $s_name;
		}
	}
}
add_action('init','smiley_trans', 3); // 优先级应小于5

//修改评论表情调用路径
function custom_smilies_src ($img_src, $img, $siteurl){
	return get_bloginfo('template_url').'/OwO/alu/'.$img;
}
add_filter('smilies_src','custom_smilies_src',1,10);

//评论表情显示
function mytheme_smilies() {
	global $wpsmiliestrans;
	global $s_filedata;
	$smilies_dir = get_bloginfo('template_url').'/OwO/alu/';
	echo '<div id="comment-smiley-label">有好玩的哦2333</div>';
	echo '<div id="comment-smiley">';
	foreach ($wpsmiliestrans as $s_tage => $s_name) {
		echo "<img data-smiley='".$s_tage."'src=".$smilies_dir . $s_name . " alt=" . $s_tage . " /></a>";
	}
	echo '</div>';

}
add_filter( 'comment_form_before_fields', 'mytheme_smilies' );
add_filter('comment_form_logged_in_after','mytheme_smilies');

?>