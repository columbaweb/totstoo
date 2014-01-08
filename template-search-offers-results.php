<?php 
/* Template Name: Search Offers Results */
get_header(); ?>
<?php
$keywords = $_REQUEST['keywords'];
$flight1 = $_REQUEST['flight1'];
$threeyears = $_REQUEST['threeyears'];
$board1 = $_GET['board1'];
$board2 = $_GET['board2'];
$board3 = $_GET['board3'];
$board4 = $_GET['board4'];
$board5 = $_GET['board5'];
$board6 = $_GET['board6'];
$school = $_REQUEST['school'];
?>
<?php
if ($keywords <> "NOT WHAT YOU ARE LOOKING FOR?") {
$arg1 = 'tag='.str_replace( ' ', '-', $keywords ).'&';
} else {
$arg1 = ''; 
}
if ($flight1==1) {
$arg2 = 'meta_key=short_haul&meta_value=1&';
}
if ($flight1==2) {
$arg2 = 'meta_key=medium_haul&meta_value=1&';
}
if ($flight1==3) {
$arg2 = 'meta_key=long_haul&meta_value=1&';
}
if ($flight1==4) {
$arg2 = '';
} ?>
<?php
if ($threeyears =="yes") {
$arg3 = 'meta_key=under_three&meta_value=1&';
} else {
$arg3 = ''; 
}
if ($school =="yes") {
$arg3school = 'meta_key=school&meta_value=1&';
} else {
$arg3school = ''; 
} ?>
<?php
if ($board1 == "1") {
$arg4 = 'meta_key=board_options&meta_value='.$board1."&";
} else {
$arg4 = ''; 
} ?>
<?php
if ($board2 == "2") {
$arg5 = 'meta_key=board_options&meta_value='.$board2."&";
} else {
$arg5 = ''; 
} ?>
<?php
if ($board3 == "3") {
$arg6 = 'meta_key=full_board&meta_value=1';
} else {
$arg6 = ''; 
} ?>
<?php
if ($board4 == "4") {
$arg7 = 'meta_key=any_board&meta_value=1&';
} else {
$arg7 = ''; 
} ?>
<?php
if ($board5 == "5") {
$arg8 = 'meta_key=board_options&meta_value='.$board5."&";
} else {
$arg8 = ''; 
} ?>
<?php
if ($board6 == "6") {
$arg9 = 'meta_key=own_kitchen&meta_value=1';
} else {
$arg9 = ''; 
} ?>
<div class="bookbuttonsearch">
  <a href="/contact"><img src="<?php bloginfo('template_url'); ?>/img/askbutton.png" alt="" width="35" /></a>
</div>
<div id="container">
     <div class="destinationholder">
          <div class="topheading">SEARCH RESULTS</div>
          <div class="searchleft"><?php include('sidebar-3.php'); ?></div>
          <div class="searchrightholder">
               <div class="searchright">
                    <?php 
                    query_posts($arg1.$arg2); ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post();?>
                    <?php
                    if ($board4 =="4") {
                    $any_board = get_post_meta( get_the_ID(), 'any_board', true );
                    if( ! empty( $any_board ) ) {
                    $showme_any_board="yes";
                    }else{
                    $showme_any_board="no";
                    }
                    }else{
                    $showme_any_board="yes";
                    }
                    if ($board3 =="3") {
                    $full_board = get_post_meta( get_the_ID(), 'full_board', true );
                    if( ! empty( $full_board ) ) {
                    $showme_full_board="yes";
                    }else{
                    $showme_full_board="no";
                    }
                    }else{
                    $showme_full_board="yes";
                    }
                    if ($board6 =="6") {
                    $own_kitchen = get_post_meta( get_the_ID(), 'own_kitchen', true );
                    if( ! empty( $own_kitchen ) ) {
                    $showme_own_kitchen="yes";
                    }else{
                    $showme_own_kitchen="no";
                    }
                    }else{
                    $showme_own_kitchen="yes";
                    }
                    if ($school =="yes") {
                    $school_offers = get_post_meta( get_the_ID(), 'offers', true );
                    if( ! empty( $school_offers ) ) {
                    $showme_school_offers="yes";
                    }else{
                    $showme_school_offers="no";
                    }
                    }else{
                    $showme_school_offers="yes";
                    }
                    if ($threeyears =="yes") {
                    $key_1_value = get_post_meta( get_the_ID(), 'under_three', true );
                    if( ! empty( $key_1_value ) ) {
                    $showme="yes";
                    }else{
                    $showme="no";
                    }
                    }else{
                    $showme="yes";
                    }
                    if($showme=="yes"&&$showme_school_offers=="yes"&&$showme_own_kitchen=="yes"&&$showme_full_board=="yes"&&$showme_any_board=="yes"){
                    ?>
                    <div class="destinationlistholder">
                         <?php $rows = get_field('offers');
                         if ($rows) {
                         foreach ($rows as $row) { ?>
                         <div style="height:140px;">
                              <div class="destinationslistimage">
                                   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                              </div>
                              <div class="destinationlisttext">
                                   <div class="destinationlisttext1"><?php echo $row['offer_heading']; ?></div>
                                   <div class="destinationlisttext2"><?php the_title(); ?></div>
                                   <div class="destinationlisttext2"><?php the_field('destination'); ?></div>
                                        <a href="<?php the_permalink(); ?>" class="morelink">FIND OUT MORE</a>
                              </div>
                         </div>          
                         <?php break; } } ?>
                         <div class="clearleft"></div>
                    </div>
                    <?php } ?>
                    <?php endwhile; ?>
                    <?php 
                    else :
                    echo wpautop( 'Sorry, no results were found' );
                    endif; ?>
               </div>
               <?php include('monthpicks.php'); ?>
               <div class="clearleft"></div>
          </div>
     </div>
</div>
<?php get_footer(); ?>
