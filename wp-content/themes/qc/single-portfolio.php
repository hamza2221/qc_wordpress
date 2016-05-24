<?php get_header(); ?>

<div class="page_top"><div class="container">Project Detail</div></div>
<!-------------------bar end---->
<?php

           

            // The Loop
            if ( have_posts() ) {
               
                while ( have_posts() ) {
                   the_post();
                    
                        
                      
                       
                    ?>
<div class="container">
	<div class="text-center margin-bottom-25 project_title">
    	<h2><?php echo  get_the_title(); ?></h2>
        <hr>
    </div>
	<div class="row">
    	<div class="col-md-5 col-sm-5 margin-bottom-100">
        	<div id="myCarousel-3" class="carousel slide">
                <div class="cru_navigator">
                    <a class="navigate pre_nav" href="#myCarousel-3" data-slide="prev"><i class="fa fa-chevron-left fa-4"></i></a>
                    <a class="navigate next_nav" href="#myCarousel-3" data-slide="next"><i class="fa fa-chevron-right fa-4"></i></a>
                </div>
                <div class="carousel-inner">
                    <? $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                    <div class="item active"><img src="<?= $url ?>" width="100%"></div>
                    <?php $attachments=get_portfolio_images(get_the_id());
                        foreach($attachments as $i){
                     ?>
                    <div class="item"><img src="<?= $i?>" width="100%"></div>
                    <? } ?>
                </div>
                
            </div>
        </div>
        <div class="col-md-7 col-sm-7 margin-bottom-25">
        	<h4>Project <span>Description</span></h4>
            <p>
            	<?php echo  get_the_content(); ?>
            </p>
            <p class="margin-bottom-30">
            <?php 

                                        $url = get_field('project_url');
                                            
                                            if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
                                                
                                            } else {
                                                $url="#";
                                            } ?>
            	<a target="blank" href="<?=  $url ?>" class="buttons"><i class="fa fa-external-link"></i> Live Preview</a>
            </p>
            <div class="margin-bottom-30">
            	<h5>Technologies</h5>
                <?php 
                $technologies_used=get_field("technologies_used");
                if(!empty($technologies_used)){
                foreach($technologies_used as $i){ ?>
                <span class="padding-right-20 project_icons"><i class="fa fa-check-circle"></i> 
                    <?php print_r(get_term($i)->name)?></span>
                <?php  }}else{ ?>
                <span class="padding-right-20 project_icons">Not Specified</span>
                <? } ?>

            </div>
            
            <p>
            	<h5>Client</h5>
                -Herry-
            </p>
            <p>
                <h5>Category</h5>
                <?php print_r(get_term(get_field("portfolio_type"))->name)?>
            </p>
        </div>
    </div>
</div>
<?php 
    }
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>    
<!-------------------Detail end---->
<?php get_footer(); ?>