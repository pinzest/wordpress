<?php
/**
 * Slider template
 *
 * @package banjaar
 */

//Slider template
if ( ! function_exists( 'banjaar_slider_template' ) ) :
function banjaar_slider_template() {

		if((get_theme_mod('front_header_type','slider') == 'slider' && is_front_page()))
		{
			?>
			<div class="bg-content">
				<div class="container">
    				<div class="row">
      					<div class="span12">
        					<div class="flexslider">
					          <ul class="slides">
					            <li> <img src="<?= get_template_directory_uri().'/img/slide-2.jpg'; ?>" alt=""> </li>
					            <li> <img src="<?= get_template_directory_uri().'/img/slide-1.jpg'; ?>" alt=""> </li>
					            <li> <img src="<?= get_template_directory_uri().'/img/slide-3.jpg'; ?>" alt=""> </li>
					            <li> <img src="<?= get_template_directory_uri().'/img/slide-4.jpg'; ?>" alt=""> </li>
					            <li> <img src="<?= get_template_directory_uri().'/img/slide-5.jpg'; ?>" alt=""> </li>
					           
					          </ul>
        					</div>
        					<span id="responsiveFlag"></span>
    					<?php banjaar_slogan_block(); ?>
    					</div>
    				</div>
    			</div>
    		</div>





		<?php 
		extra_container();
		}
		

}

endif;

function banjaar_slogan_block()
{

?>


		<div class="block-slogan">
          <h2>Welcome!</h2>
          <div>
            <p><a href="#" class="link-1">Click here</a> for more info about this free website template created by TemplateMonster.com. This is a Bootstrap template that goes with several layout options (for desktop, tablet, smartphone landscape and portrait) to fit all popular screen resolutions. The PSD source files of this template are available for free for the registered members of TemplateMonster.com. Feel free to get them!</p>
          </div>
        </div>





<?php
}

function extra_container()
{
?>


		<div id="content" class="content-extra">
    <div class="row-1">
      <div class="container">
        <div class="row">
          <ul class="thumbnails thumbnails-1">
            <li class="span3">
              <div class="thumbnail thumbnail-1">
                <h3>Fashion</h3>
                <img src="<?= get_template_directory_uri().'/img/page1-img1.jpg'; ?>" alt="">
                <section> <strong>At vero eos et accusamus et iusto </strong>
                  <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p>
                  <a href="#" class="btn btn-1">Read More</a> </section>
              </div>
            </li>
            <li class="span3">
              <div class="thumbnail thumbnail-1">
                <h3>Nature</h3>
                <img src="<?= get_template_directory_uri().'/img/page1-img2.jpg'; ?>" alt="">
                <section> <strong>Deleniti atque corrupti quos</strong>
                  <p>Dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                  <a href="#" class="btn btn-1">Read More</a> </section>
              </div>
            </li>
            <li class="span3">
              <div class="thumbnail thumbnail-1">
                <h3>Love story</h3>
                <img src="<?= get_template_directory_uri().'/img/page1-img3.jpg'; ?>" alt="">
                <section> <strong>Similique sunt in culpa qui officia </strong>
                  <p>Deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                  <a href="#" class="btn btn-1">Read More</a> </section>
              </div>
            </li>
            <li class="span3">
              <div class="thumbnail thumbnail-1">
                <h3 class="title-1 extra">Fine art</h3>
              	<img src="<?= get_template_directory_uri().'/img/page1-img4.jpg'; ?>" alt="">
                <section> <strong>Similique sunt in culpa qui officia</strong>
                  <p>Deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                  <a href="#" class="btn btn-1">Read More</a> </section>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="bg-content">
    	<div class="container">
      <div class="row">
        <article class="span6">
          <h3>Shortly about me</h3>
          <div class="wrapper">
            <figure class="img-indent">   <img src="<?= get_template_directory_uri().'/img/page1-img5.jpg'; ?>" alt=""></figure>
            <div class="inner-1 overflow extra">
              <div class="txt-1">Sed ut perspictis unde omnis natus error volupatem accusantium doloue laudantium, totam rem.</div>
              Aperiam, eaque ipsa quae ab illo  veritatis et beatae vitae dicta sunt explicabo nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
              <div class="border-horiz"></div>
              <div class="overflow">
                <ul class="list list-pad">
                  <li><a href="#">Campaigns</a></li>
                  <li><a href="#">Portraits</a></li>
                  <li><a href="#">Fashion</a></li>
                  <li><a href="#">Fine Art</a></li>
                </ul>
                <ul class="list">
                  <li><a href="#">Advertising</a></li>
                  <li><a href="#">Lifestyle</a></li>
                  <li><a href="#">Love story</a></li>
                  <li><a href="#">Landscapes</a></li>
                </ul>
              </div>
            </div>
          </div>
        </article>
        <article class="span6">
          <h3>Latest photoshoots</h3>
          <ul class="list-photo">
            <li>
            	<a href="<?= get_template_directory_uri().'/img/image-blank.png'; ?>" class="magnifier">
            	<img src="<?= get_template_directory_uri().'/img/page1-img6.jpg'; ?>" alt="">
            	</a>
            </li>
            <li><a href="img/image-blank.png" class="magnifier"><img src="img/page1-img7.jpg" alt=""></a></li>
            <li><a href="img/image-blank.png" class="magnifier"><img src="img/page1-img8.jpg" alt=""></a></li>
            <li class="last"><a href="img/image-blank.png" class="magnifier"><img src="img/page1-img9.jpg" alt=""></a></li>
            <li><a href="img/image-blank.png" class="magnifier"><img src="img/page1-img10.jpg" alt=""></a></li>
            <li><a href="img/image-blank.png" class="magnifier"><img src="img/page1-img11.jpg" alt=""></a></li>
            <li><a href="img/image-blank.png" class="magnifier"><img src="img/page1-img12.jpg" alt=""></a></li>
            <li class="last"><a href="img/image-blank.png" class="magnifier"><img src="img/page1-img13.jpg" alt=""></a></li>
            <li><a href="img/image-blank.png" class="magnifier"><img src="img/page1-img14.jpg" alt=""></a></li>
            <li><a href="img/image-blank.png" class="magnifier"><img src="img/page1-img15.jpg" alt=""></a></li>
            <li><a href="img/image-blank.png" class="magnifier"><img src="img/page1-img16.jpg" alt=""></a></li>
            <li class="last"><a href="img/image-blank.png" class="magnifier"><img src="img/page1-img17.jpg" alt=""></a></li>
          </ul>
        </article>
      </div>
    </div>
  </div>
  </div>

<?php
}

?>
