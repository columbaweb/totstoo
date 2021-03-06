<?php get_header(); ?>

<div class="wrap">
     <div class="row">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
               <div class="span12">
                    <div class="container category-hotel">
                         <?php //include('bookbutton.php'); ?>
                         <?php include('sliderbox.php'); ?>
                         <?php //include('scoop.php'); ?>
                    </div>
               </div>
     </div> <!--row end -->
     
     <div class="row">
          <div class="span12">




<div id="tabbed-content" class="rows"> 
         <div class="tabs">
              <div id="sidetabs">
                    <ul>
                         <li><a href="#about" class="about-tab">ABOUT THE HOTEL</a></li>
                         <li><a href="#family" class="family-tab">FAMILY FACTS</a></li>
                         <li><a href="#reviews" class="reviews-tab">REVIEWS</a></li>
                         <li><a href="#ask" class="ask-tab">ASK &amp; BOOK</a></li>
                         <li><a href="#offers" class="offers-tab">OFFERS</a></li>
                    </ul>
                   <?php include('sidebar-5.php'); ?>
              </div>
              <div id="about" class="tab">
                   <h2>About The Hotel</h2>
                   <?php the_content(); ?>
              </div>          
              <div id="family" class="tab">   
              <h2><strong>Family Facts</strong></h2> 
               <?php if (get_field('cots') <>"") {  ?>
                    <div class="family-fact">
                         <img src="<?php bloginfo('template_url'); ?>/img/icons/icon_cot_availability.png" alt="" width="25" />
                         <p><?php the_field('cots'); ?></p>
                    </div>
               <?php } ?>
               <?php if (get_field('babysitting') <>"") { ?>
                    <div class="family-fact">
                         <img src="<?php bloginfo('template_url'); ?>/img/icons/icon_baby_sitting.png" alt="" width="25" />
                         <p><?php the_field('babysitting'); ?></p>
                    </div>
               <?php } ?>
               <?php if (get_field('creche_nanny') <>"") { ?>
                    <div class="family-fact">
                         <img src="<?php bloginfo('template_url'); ?>/img/icons/icon_creche.png" alt="" width="25" />
                         <p><?php the_field('creche_nanny'); ?></p>
                    </div>
               <?php } ?>
               <?php if (get_field('kids_club') <>"") { ?>
                    <div class="family-fact">
                         <img src="<?php bloginfo('template_url'); ?>/img/icons/icon_kids_club.png" alt="" width="25" />
                         <p><?php the_field('kids_club'); ?></p>
                    </div>
               <?php } ?>
               <?php if (get_field('pushchair_friendly') <>"") { ?>
                    <div class="family-fact">
                         <img src="<?php bloginfo('template_url'); ?>/img/icons/icon_pushchairs.png" alt="" width="25" />
                         <p><?php the_field('pushchair_friendly'); ?></p>
                    </div>     
               <?php } ?>
               <?php if (get_field('distance_airport') <>"") { ?>
                    <div class="family-fact">
                         <img src="<?php bloginfo('template_url'); ?>/img/icons/icon_distance_from_airport.png" alt="" width="25" />
                         <p><?php the_field('distance_airport'); ?></p>
                    </div>
               <?php } ?>
               <?php if (get_field('distance_medical') <>"") { ?>
                    <div class="family-fact">
                         <img src="<?php bloginfo('template_url'); ?>/img/icons/icon_distance_from_medical.png" alt="" width="25" />
                         <p><?php the_field('distance_medical'); ?></p>
                    </div>     
               <?php } ?>
               <?php if (get_field('childrens_pool') <>"") { ?>
                    <div class="family-fact">
                         <img src="<?php bloginfo('template_url'); ?>/img/icons/icon_childrens_pool.png" alt="" width="25" />
                         <p><?php the_field('childrens_pool'); ?></p>
                    </div>     
               <?php } ?>
               <?php if (get_field('baby_bottle') <>"") { ?>
                    <div class="family-fact">
                         <img src="<?php bloginfo('template_url'); ?>/img/icons/icon_baby_bottles.png" alt="" width="25" />
                         <p><?php the_field('baby_bottle'); ?></p>
                    </div>     
               <?php } ?>
               <?php if (get_field('infant_seats_airport') <>"") { ?>
                    <div class="family-fact">
                         <img src="<?php bloginfo('template_url'); ?>/img/icons/icon_infant_car_seats.png" alt="" width="25" />
                         <p><?php the_field('infant_seats_airport'); ?></p>
                    </div>
               <?php } ?>
               <?php if (get_field('activities_teens') <>"") { ?>
                    <div class="family-fact">
                         <img src="<?php bloginfo('template_url'); ?>/img/icons/icon_activities_teens.png" alt="" width="25" />
                         <p><?php the_field('activities_teens'); ?></p>
                    </div>     
               <?php } ?>
               <div style="height:20px;"></div>
               <?php the_field('facts_content'); ?>
               <div style="height:10px;"></div>
               <?php the_field('for_the_kids'); ?>    
              </div> <!-- family facts tab end -->              

              <div id="reviews"> 
              <h2>Reviews</h2> 
                    <ul>
                         <?php 
                         $repeater = get_field('reviews');
                         $rows = get_field('reviews');
                         if($rows)
                         {
                         foreach( $repeater as $key => $row )
                         {
                         $column_id[ $key ] = $row['date_added'];
                         }
                         array_multisort( $column_id, SORT_DESC, $repeater );
                         foreach( $repeater as $row )
                         { ?>
                         <li>
                              <strong><?php echo $row['reviewer_name']; ?></strong>   
                              <strong class="review-date"><?php $date = date_create_from_format('Ymd', $row['date_added']); echo $date->format('d F Y'); ?></strong>   
                              <span class="stars"><?php include('starrating.php'); ?></span>   
                              <?php echo $row['review_content']; ?>
                         </li>
                    <?php } ?>
                    </ul>
                    <?php } else { echo "Please ask our team for the latest reviews, or email your review to us.";} ?>               
               </div>
               <div id="ask">
               <h2>Ask &amp; Book</h2>              
               <p>Tell us what you're looking for and we'll reply with ideas and suggestions.</p> 
               <p>We protect your <a href="/data-protection">private data</a>.</p>
               <form action="<?php bloginfo('url'); ?>/contact-thank-you" method="get" id="booking" >
                    <input name="hotellist" type="hidden" value="<?php the_ID(); ?>" />
                    <input name="hotel_sent" type="hidden" value="<?php the_title(); ?>" />
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                         <tr>
                              <td>DEPARTURE DATE*</td>
                         </tr>
                         <tr class="leftcolumn1">
                              <td class="td-departure"><label for="departure_date"></label>
                                   <span id="sprytextfield1">
                                        <input type="text" name="departure_date" id="departure_date" class="forminput1"  />
                                        <span class="textfieldRequiredMsg">Required.</span>
                                   </span>
                              </td>
                         </tr> 
                         <tr class="tr-leftcolumn2">
                              <td></td>
                         </tr> 
                         <tr>
                              <td>
                                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                             <td>FLEXIBLE</td>
                                             <td>NUMBER OF NIGHTS*</td>
                                        </tr>
                                        <tr>
                                             <td>
                                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                       <tr>
                                                            <td class="td-leftcolumn1">Yes</td>
                                                            <td>
                                                                 <input name="flexible" type="radio" id="flexible" value="yes" checked="checked" />
                                                                 <label for="flexible"></label>
                                                            </td>
                                                            <td class="td-leftcolumn1">No</td>
                                                            <td><input type="radio" name="flexible" id="flexible2" value="no" /></td>
                                                       </tr>
                                                  </table>
                                             </td>
                                             <td>
                                                  <label for="nights"></label>
                                                  <span id="sprytextfield2">
                                                       <input type="text" name="nights" id="nights" class="forminput3" />
                                                       <span class="textfieldRequiredMsg">Required.</span>
                                                  </span>
                                             </td>
                                        </tr>
                                   </table>
                              </td>
                         </tr> 
                         <tr class="tr-leftcolumn2">
                              <td></td>
                         </tr>
                         <tr>
                              <td>PREFERRED DESTINATIONS</td>
                         </tr>
                         <tr class="tr-leftcolumn1">
                              <td><label for="destinations"></label>
                              <input type="text" name="destinations" id="preferred_destinations" value="<?php echo $_GET['list'];?>" class="forminput2"/></td>
                         </tr>  
                         <tr class="tr-leftcolumn2">
                              <td></td>
                         </tr>
                         <tr class="tr-leftcolumn3">
                              <td class="td-border"></td>
                         </tr>
                         <tr class="tr-leftcolumn2">
                              <td></td>
                         </tr> 
                         <tr>
                              <td>NUMBER OF PASSENGERS</td>
                         </tr>
                         <tr>
                              <td>
                                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                             <td class="td-leftcolumn3">Adults</td>
                                             <td class="td-leftcolumn5"><label for="adults"></label>
                                                  <select name="adults" size="1" id="adults">
                                                       <option value="1">1</option>
                                                       <option value="2">2</option>
                                                       <option value="3">3</option>
                                                       <option value="4">4</option>
                                                       <option value="5">5</option>
                                                       <option value="5">5</option>
                                                       <option value="6">6</option>
                                                       <option value="7">7</option>
                                                       <option value="8">8</option>
                                                  </select>
                                             </td>
                                             <td class="td-leftcolumn4">Children</td>
                                             <td class="td-leftcolumn5">
                                                  <select name="children" size="1" id="children">
                                                       <option value="0">0</option>
                                                       <option value="1">1</option>
                                                       <option value="2">2</option>
                                                       <option value="3">3</option>
                                                       <option value="4">4</option>
                                                       <option value="5">5</option>
                                                       <option value="5">5</option>
                                                       <option value="6">6</option>
                                                       <option value="7">7</option>
                                                       <option value="8">8</option>
                                                  </select>
                                             </td>
                                             <td class="td-leftcolumn5">Infants &lt;2</td>
                                             <td>
                                                  <select name="infants" size="1" id="infants">
                                                       <option value="0">0</option>
                                                       <option value="1">1</option>
                                                       <option value="2">2</option>
                                                       <option value="3">3</option>
                                                       <option value="4">4</option>
                                                       <option value="5">5</option>
                                                       <option value="5">5</option>
                                                       <option value="6">6</option>
                                                       <option value="7">7</option>
                                                       <option value="8">8</option>
                                                  </select>
                                             </td>
                                        </tr>
                                   </table>
                              </td>
                         </tr>
                         <tr> 
                              <tr class="tr-leftcolumn4">
                                   <td></td>
                              </tr> 
                              <td>
                                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                             <td class="td-leftcolumn2">NUMBER OF ROOMS PREFERRED</td>
                                             <td>
                                                  <select name="rooms" size="1" id="rooms">
                                                       <option value="1">1</option>
                                                       <option value="2">2</option>
                                                       <option value="3">3</option>
                                                       <option value="4">4</option>
                                                       <option value="5">5</option>
                                                       <option value="5">5</option>
                                                       <option value="6">6</option>
                                                       <option value="7">7</option>
                                                       <option value="8">8</option>
                                                  </select>
                                             </td>
                                        </tr>
                                   </table>
                              </td>
                         </tr>     
                         <tr class="tr-leftcolumn2">
                              <td></td>
                         </tr>
                         <tr class="tr-leftcolumn3">
                              <td style="background:#97d8bf;"></td>
                         </tr>
                         <tr class="tr-leftcolumn5">
                              <td></td>
                         </tr> 
                         <tr>
                              <td>
                                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr height="45">
                                             <td width="210">&quot;I WANT TO SPEND AROUND...&quot;* &pound;<br><span style="font-size:9px;">-This helps us make suitable suggestions</span></td>
                                             <td valign="top"><label for="spend"></label>
                                                  <span id="sprytextfield3">
                                                       <input type="text" name="spend" id="spend" class="forminput1" value=""  />
                                                       <span class="textfieldRequiredMsg">Required.</span>
                                                  </span>
                                             </td>
                                        </tr>
                                   </table>
                              </td>
                         </tr> 
                         <tr class="tr-leftcolumn2">
                              <td></td>
                         </tr>
                         <tr class="tr-leftcolumn3">
                              <td style="background:#97d8bf;"></td>
                         </tr>
                         <tr class="tr-leftcolumn2">
                              <td></td>
                         </tr>  
                         <tr>
                              <td>
                                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr class="tr-leftcolumn1">
                                             <td width="150">FIRST NAME*</td>
                                             <td><label for="firstname"></label>
                                                  <span id="sprytextfield4">
                                                       <input type="text" name="firstname" id="firstname" class="forminput1" style="width:350px;" />
                                                       <span class="textfieldRequiredMsg">Required.</span>
                                                  </span>
                                             </td>
                                        </tr>
                                        <tr class="tr-leftcolumn1">
                                             <td>SURNAME*</td>
                                             <td>
                                                  <span id="sprytextfield5">
                                                       <input type="text" name="surname" id="surname" class="forminput1" />
                                                       <span class="textfieldRequiredMsg">Required.</span>
                                                  </span>
                                             </td>
                                        </tr>
                                        <tr class="tr-leftcolumn1">
                                             <td>EMAIL*</td>
                                             <td><label for="email"></label>
                                                  <span id="sprytextfield6">
                                                       <input type="email" name="email" class="forminput1" style="width:350px;" />
                                                       <span class="textfieldRequiredMsg">Required.</span><span class="textfieldInvalidFormatMsg">Invalid email.</span>
                                                  </span>
                                             </td>
                                        </tr>
                                        <tr class="tr-leftcolumn1">
                                             <td>PHONE*</td>
                                             <td><label for="phone"></label>
                                                  <span id="sprytextfield7">
                                                       <input type="text" name="phone" id="phone" class="forminput1" style="width:350px;" />
                                                       <span class="textfieldRequiredMsg">Required.</span>
                                                  </span>
                                             </td>
                                        </tr>
                                   </table>
                              </td>
                         </tr> 
                         <tr class="tr-leftcolumn2">
                              <td></td>
                         </tr>
                         <tr class="tr-leftcolumn3">
                              <td class="td-border"></td>
                         </tr>
                         <tr class="tr-leftcolumn2">
                              <td></td>
                         </tr> 
                         <tr>
                              <td>
                                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                             <td class="td-leftcolumn6">EXISTING CLIENT?</td>
                                             <td class="td-leftcolumn1">Yes</td>
                                             <td class="td-leftcolumn7"><input type="radio" name="client" id="client" value="yes" checked="checked"/><label for="brochure"></label></td>
                                             <td class="td-leftcolumn1">No</td>
                                             <td><input type="radio" name="client" id="client2" value="no" /></td>
                                        </tr>
                                   </table>
                              </td>
                         </tr>  
                         <tr class="tr-leftcolumn4">
                              <td></td>
                         </tr> 
                         <tr>
                              <td>SPECIAL REQUESTS</td>
                         </tr>
                         <tr>
                              <td><label for="requests"></label>
                                   <textarea name="requests" id="requests" cols="45" rows="5" class="forminput2" style="height:150px;"></textarea>
                              </td>
                         </tr>
                         <tr class="tr-leftcolumn4">
                              <td></td>
                         </tr> 
                         <tr class="tr-leftcolumn4">
                              <td></td>
                         </tr> 
                         <tr>
                              <td>HOW DID YOU HEAR ABOUT US?*</td>
                         </tr>
                         <tr>
                              <td><label for="heard"></label>
                                   <span id="sprytextfield8">
                                        <input type="text" name="heard" id="heard" class="forminput1" style="width:350px;"/>
                                        <span class="textfieldRequiredMsg">Required.</span>
                                   </span>
                              </td>
                         </td>
                         </tr>
                         <tr class="tr-leftcolumn4">
                              <td>
                                   <p class="antispam">Leave this empty:<br /><input name="url" /></p>           
                              </td>
                         </tr> 
                         <tr>
                              <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
                         </tr>
                    </table>
               </form>             
              </div>
              <div id="offers">
              <h2>Offers</h2>
                    <?php $rows = get_field('offers');
                         if ($rows) {
                         foreach ($rows as $row) { ?>                
                         <?php if ($row['offer_end'] > date("Ymd")) { ?>
                         <div class="hotelofferholder">
                              <p<?php echo $row['offer_heading'];?></p>
                              <p><?php echo $row['offer_content'];?></p>
                              <?php if ($row['valid_in_school_holidays']<>"") {?>
                                   <p><strong>Valid in school holidays.</strong></p>
                              <?php }?>
                              <?php if ($row['minimum_stay']<>"") {?>
                                   <p><strong>Minimum stay:</strong><?php echo $row['minimum_stay']; ?></p>
                              <?php }?>
                              <?php if ($row['valid_for_stays_during_from']<>"") {?>
                                   <p><strong>Valid during:</strong>
                                        <?php $date = date_create_from_format('Ymd', $row['valid_for_stays_during_from']); echo $date->format('d F Y'); ?>
                                        -
                                        <?php $date = date_create_from_format('Ymd', $row['valid_for_stays_during_to']); echo $date->format('d F Y'); ?>
                                   </p>
                                   <?php }?>
                              <?php if ($row['excluded_stay_periods_from']<>"") {?>
                                   <p><strong>Excluded stay periods:</strong>
                                        <?php $date = date_create_from_format('Ymd', $row['excluded_stay_periods_from']); echo $date->format('d F Y'); ?>
                                        -
                                        <?php $date = date_create_from_format('Ymd', $row['excluded_stay_periods_to']); echo $date->format('d F Y'); ?>
                                   </p>
                              <?php }?>
                              <?php if ($row['room_type']<>"") {?>
                                   <p><strong>Room type:</strong><?php echo $row['room_type']; ?></p>
                              <?php } ?>
                              <?php if ($row['book_by_date']<>"") {?>
                                   <p><strong>Book by:</strong> 
                                        <?php $date = date_create_from_format('Ymd', $row['book_by_date']); echo $date->format('d F Y'); ?>
                                   </p>
                              <?php }?>
                              <?php if ($row['combinable_with_other_offers']<>"") {?>
                                   <p><strong>Combinable with:</strong><?php echo $row['combinable_with_other_offers']; ?></p>
                              <?php } ?>
                         </div>
                         <?php }
                         }
                         } else { echo "Please ask our team for the best offers.";} ?>           
              </div>
              <div class="hotel-social"><?php include('socialmedia.php'); ?></div>
         </div>   
     </div>
          
          
          <?php endwhile; endif; wp_reset_query(); ?>
          </div> <!-- span12 end -->
     </div> <!-- row end -->
      
</div> <!-- page wrap end -->
 
 
 
<?php 
function getWeatherRSS($weatherLink){     
  if ($fp = fopen($weatherLink, 'c')) { 
    $content = '';         
  while ($line = fread($fp, 1024)) { 
    $content .= $line; 
    } 
  } 
  return $content;   
} 
function processWeather($wurl){     
    $wrss = getWeatherRSS($wurl); 
    $temp  = '-'; 
    $tempu = ''; 
    $city  = '';     
  if (strlen($wrss)>100){ 
    $spos = strpos($wrss,'yweather:units temperature="') 
  + strlen('yweather:units temperature="'); 
    $epos = strpos($wrss,'"',$spos); 
  if ($epos>$spos){ 
    $tempu = substr($wrss,$spos,$epos-$spos); 
  }  
    $spos = strpos($wrss,'yweather:wind chill="') 
  + strlen('yweather:wind chill="'); 
    $epos = strpos($wrss,'"',$spos); 
  if ($epos>$spos){ 
    $temp += substr($wrss,$spos,$epos-$spos); 
  } else { 
    $temp = '-'; 
  } 
    $spos = strpos($wrss,'yweather:location city="') 
  + strlen('yweather:location city="'); 
    $epos = strpos($wrss,'"',$spos); 
  if ($epos>$spos){ 
    $city = substr($wrss,$spos,$epos-$spos); 
  }  
}      
  return $temp."&deg;".$tempu;     
} 
?>  
 
<?php get_footer(); ?>
