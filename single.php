<?php get_header(); ?>
<div id="single_post">
<?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="entry-header">
<?php if(has_post_thumbnail()) { $thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} else { $thumb_url=catch_that_image();} 
$post_title=the_title(' ',' ',false);
$thePostID=$post->ID;
$bloginfo_url=get_bloginfo('url');
$shortlink=$bloginfo_url."/?p=".$thePostID; 
$perm_link=get_permalink(); ?>

<?php if (current_user_can('edit_posts' )){?><a id="post-edit" href="/wp-admin/post.php?post=<?php echo $thePostID; ?>&action=edit" target="_blank" ></a><?php } ?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>	

<a id="single_short_link" href="<?php echo $shortlink; ?>">[short_link]</a>





</header><!-- .entry-header -->


<div class="i-post-info">
<div class="i-post-cat"><?php the_category(' '); ?></div><!-- .i-post-cat -->    
   
   
 <?php   $post_date=get_post_meta($thePostID, '_no_postdate', true ); 
 if ($post_date=="1"){ } else {
 ?>  
    
<div class="i-post-date">
<?php
    //the_time('y.m.d');
    $post_date=get_the_time('Y-m-d h:i:s', $thePostID); ?>

    <?php
 //$pdate=parsidate("l  Y/m/d [h:i a]", $post_date, "en");
  $pdate=parsidate("l  Y/m/d ", $post_date, "en");

 echo $pdate;
 
?>
    <?php if (current_user_can('edit_posts' )){?>
<span>[ <?php echo esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ) . ' پیش'; ?> ]</span>
<?php } ?>

</div><!-- .i-post-date -->
<?php } ?>

<?php comments_popup_link('بدون دیدگاه', 'یک دیدگاه','% دیدگاه', 'i-loop-comm', '-'); ?><!-- .i-loop-comm -->

</div><!-- i-post-info -->
<div class="entry-content">
  
<?php $post_summary=get_post_meta($thePostID, 'wk_summary', true ); 
if(!empty($post_summary)){ ?>
    
<div id="post-excerpt">
<img id="post_excerpt_thumb" src="<?php echo $thumb_url; ?>">   
<div id="post_summary"><?= $post_summary; ?></div><!-- post_summary -->

</div> <!-- post-excerpt -->      
    
<?php } else {  ?>  


  
  
  
<?php if (has_excerpt()) : ?>
<div id="post-excerpt">
<img id="post_excerpt_thumb" src="<?php echo $thumb_url; ?>">   
<div id="excerpt_txt"><?php  the_excerpt(); ?></div><!-- excerpt_txt -->

</div> <!-- post-excerpt -->  
<?php endif; } ?>
   

    
 
    
    
    
<?php	the_content( );	?>
</div><!-- .entry-content -->
	


<?php $file_link=get_post_meta( get_the_ID(), 'file_link', true );
if (!empty($file_link)) : ?>
<style>
#download_box{width:100%;padding:15px;margin:15px auto;text-align:center;height:auto;;overflow:hidden;background:#f1f2f3;} 
#download_details{width:480px;height:auto;display:block;margin:10px auto;background:#c6ddf0;padding:10px;border-radius:7px;}
    
    
</style>

<div id="download_box">

<?php


if($_GET["status"]="1" && !empty($_GET["token"])){
    
  include_once("payment/verify.php");  
    
}
else {
if($_POST['paydl']){
include_once("payment/functions.php");
$api = '0a052d83af13ffde0e4d230787eaeabb';
$amount = "10010";
$mobile = "09359556950";
$factorNumber = "1122334433";
$description = "توضیحات";
$redirect = 'https://wordpresskar.com/?p='.get_the_ID();
$result = send($api, $amount, $redirect, $mobile, $factorNumber, $description);
$result = json_decode($result);
if($result->status) {
	$go = "https://pay.ir/pg/$result->token";
	header("Location: $go");
} else {
	echo $result->errorMessage;
}
}    
    
    
    
    
    
}





 ?>




<div id="download_details">
    
 <?php  echo $file_title=get_post_meta( get_the_ID(), 'file_title', true ); ?><br>
 <?php  echo $file_price=get_post_meta( get_the_ID(), 'file_price', true ); ?><br>
 <?php  echo $file_size=get_post_meta( get_the_ID(), 'file_size', true ); ?><br>

<form action="" method="post" name="pay">
    
    
<input type="submit" value="پرداخت و دانلود"  name="paydl">    
</form>







  <center>Download</center> 
  
  <center>دانلود با تمام کارت های عضو شتاب امکان پذیر می باشد</center>
    
    
</div><!-- download_details -->




</div><!-- download_box  -->

<?php endif; ?>




</article><!-- #post-## -->


<?php  if (comments_open()){
echo '<div id="comment_container">';
comments_template('', true);
echo '</div><!-- comment_container -->';

} ?>

<div id="nex_prv_post">

<?php
$next_post = get_next_post();
if (!empty( $next_post )): ?>
<div id="i_next_post"	>
 <a href="<?php echo esc_url( get_permalink($next_post->ID)); ?>"> « <?php echo esc_attr($next_post->post_title ); ?></a>
</div><!-- i_next_post -->
<?php endif; ?>

<?php
$prev_post = get_previous_post();
if (!empty( $prev_post )): ?>
<div id="i_prev_post"	>
 <a href="<?php echo $prev_post->guid ?>"> <?php echo $prev_post->post_title ?> » </a>
</div><!-- i_prev_post -->
<?php endif ?>
	
	
</div><!-- #nex_prv_post -->	



<?php  endwhile; endif; ?>
</div><!--  #single_post -->
<?php get_sidebar(); ?>    

 

 <?php get_footer(); ?>