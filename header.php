<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
		
		<title>
			<?php if (is_home()) { echo bloginfo('name');
			} elseif (is_404()) {
			echo '404 Not Found';
			} elseif (is_category()) {
			echo 'Category:'; wp_title('');
			} elseif (is_search()) {
			echo 'Search Results';
			} elseif ( is_day() || is_month() || is_year() ) {
			echo 'Archives:'; wp_title('');
			} else {
			echo wp_title('');
			}
			?>
		</title>
		<meta name="description" content="<?php bloginfo('description') ?>" />
		<?php if(is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" /> 
	    <?php }?>
	
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<script src="<?php bloginfo('template_url');?>/js/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php bloginfo('template_url');?>/js/script.js" type="text/javascript" charset="utf-8"></script>
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
		
	</head>
	<body>
		<div id="header">
			<div class="wrapper">
				
				
				<ul id="navigation">
					<?php //wp_list_pages("link_before=<span>&link_after=</span>&title_li=");
	
					  $pages = get_pages(); 
					  foreach ( $pages as $pagg ) {
						 $superlargetitle = 'WHITE SHARK MEDIA OCTOPUS DEPARTMENT WORKING PROCEDURES';
						 
						$option = '<li><a href="' . get_page_link( $pagg->ID ) . '">';
						if(str_replace(' ','', strtolower($pagg->post_title)) == str_replace(' ','', strtolower($superlargetitle)) )
							$option .= 'WHITE SHARK<br/>MEDIA OCTOPUS<br/>DEPARTMENT<br/>WORKING<br/>PROCEDURES';
						else
							$option .= str_replace('and<br/>','and<br/>', str_replace(' ','<br/>',$pagg->post_title));
						$option .= '</a></li>';
						echo $option;
					  }
					?>
				</ul><!-- /navigation-->
                
                <h1 id="logo">
					<a href="<?php bloginfo('url');?>" alt="Kosttilskud" title="Go to the Front Page">
					<img src="<?php bloginfo('template_url');?>/images/logo.png" alt="<?php bloginfo('name');?>" title="<?php bloginfo('description');?>" />	
					</a>
				</h1>
				
				<br class="clear" />
			</div><!-- /wrapper-->
		</div><!-- /header-->
		
		<div class="wrapper">
        	<div id="supcontainer">
	            
                
                <? $t = get_the_title();
					if($t == ''){
						$t = 'Home';
					}
					$cwords = count(explode(' ',$t));
					$strlen = strlen($t);
					$div = 1;
					if($strlen > 4 && $strlen< 24){
						$div = 2.2;
					}else if($strlen > 24 && $strlen < 50){
						$div = 2.7;
					}else if($strlen > 50){
						$div = 3.4;
					}
					$titsize = 3.4/$div;
					$titsize = (round($titsize*10))/10
				?>
            	<div>
					<div id="top_izq">                
	                    <div id="main_title"><h1 style="font-size:<?=$titsize?>em;"><?=$t?></h1></div>
    	                <div id="submitquestion"></div>
					</div>
                
                    <div id="questionform">
                        <form method="get" action="<?php bloginfo('url');?>">
                            <input type="submit" value="" id="qfbtn" />
                            <input type="text" name="s" id="qfinput" />
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
			<div id="container">
            
            