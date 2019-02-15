 
<div class="main">
<!--container of Brands-->
    <?php if($brands): ?>
    <div class="container">
    	<ul class="content-home">
            <?php foreach ($brands as $brand): ?>
            <li class="col-sm-4">
              <a href="single.html" class="item-link" title="">
                <div class="bannerBox">
                    <img src="images/<?= $brand->img;?>" class="item-img" title="" alt="" width="100%" height="100%">
                   <div class="item-html">
                      <h2><?= $brand->title; ?></h2>
                      <p><?= $brand->description;?></p>
                      <button>Shop now!</button>
                   </div>
                </div>
              </a>
            </li>
           <?php endforeach;?>
           <div class="clearfix"> </div>

       </ul>
    </div>
    <?php endif;?>
<!--product-begin-->
    <?php if($hits): ?>
    <?php $curr = \myshop\App::$registry->getProperty('currency')?>
        <div class="col-md-12 mens_right">
            <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid-custom">
                <div class="clearfix"></div>
		<ul>
                    <?php foreach ($hits as $hit):?>
                    <li class="simpleCart_shelfItem">
                        <a class="cbp-vm-image" href="product/<?= $hit->alias; ?>"> </a>
                            <div class="view view-first">
                                <a class="cbp-vm-image" href="product/<?= $hit->alias; ?>">  </a>
                                    <div class="inner_content clearfix">
                                        <a class="cbp-vm-image" href="product/<?= $hit->alias; ?>"> </a>
                                            <div class="product_image">
                                                <a class="cbp-vm-image" href="product/<?= $hit->alias; ?>">
                                                    <div class="mask1"><img src="images/<?= $hit->img; ?>" alt="image" class="img-responsive zoom-img"></div>
							<div class="mask">
                                                            <div class="info">Quick View</div>
					                </div>
					        </a>
                                                <div class="product_container">
                                                    <a class="cbp-vm-image" href="product/<?= $hit->alias; ?>">
							<h4><?= $hit->title; ?></h4>
							<p><?= $hit->description; ?></p>
							<div class="price mount item_price">
                                                            <?= $curr['symbol_left'];?>
                                                            <?= $hit->price * $curr['value']; ?>
                                                            <?= $curr['symbol_right'];?>
                                                            <?php if($hit->old_price):?>
                                                                <del><?= $curr['symbol_left'];?>
                                                                    <?= $hit->old_price * $curr['value']; ?>
                                                                    <?= $curr['symbol_right'];?>
                                                                </del>
                                                            <?php endif; ?>
                                                        </div>                                                        
                                                    </a>
                                                    <a data-id="<?= $hit->id; ?>" class="button add-to-cart-link cbp-vm-icon cbp-vm-add" href="cart/add?id=<?= $hit->id; ?>">Add to cart</a>
						</div>		
                                            </div>
			            </div>
                            </div>
		    </li>
                    <?php endforeach; ?>
		</ul>
            </div>
	</div>
    <?php endif; ?>
<!--product-end-->

<!-- Conteiner skoken baba -->
    <div class="middle_content">
    	<div class="container">
    		<h2>Welcome</h2>
    		<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
    	</div>
    </div>
   	<div class="content_middle_bottom">
   		<div class="header-left" id="home">
		      <section>
				<ul class="lb-album" >
					<li>
						<a href="#image-1">
							<img src="images/g1.jpg"  class="img-responsive" alt="image01"/>
							<span>Pointe</span>
						</a>
						<div class="lb-overlay" id="image-1">
							<a href="#page" class="lb-close">x Close</a>
							<img src="images/g1.jpg"  class="img-responsive" alt="image01"/>
							<div>
								<h3>pointe <span>/point/</span></h3>
								<p>Dance performed on the tips of the toes</p>
							</div>
						</div>
					</li>
					<li>
						<a href="#image-2">
							<img src="images/g2.jpg"  class="img-responsive" alt="image02"/>
							<span>Port de bras</span>
						</a>
						<div class="lb-overlay" id="image-2">
							<img src="images/g2.jpg"  class="img-responsive" alt="image02"/>
							<div>							
								<h3>port de bras <span>/ˌpôr də ˈbrä/</span></h3>
								<p>An exercise designed to develop graceful movement and disposition of the arms</p>
							</div>
							<a href="#page" class="lb-close">x Close</a>
						</div>
					</li>
					<li>
						<a href="#image-3">
							<img src="images/g3.jpg"  class="img-responsive" alt="image03"/>
							<span>Plié</span>
						</a>
						<div class="lb-overlay" id="image-3">
							<img src="images/g3.jpg"  class="img-responsive" alt="image03"/>
							<div>							
								<h3>pli·é <span>/plēˈā/</span></h3>
								<p>A movement in which a dancer bends the knees and straightens them again</p>
							</div>
							<a href="#page" class="lb-close">x Close</a>
						</div>
					</li>
					<li>
						<a href="#image-4">
							<img src="images/g4.jpg"  class="img-responsive" alt="image04"/>
							<span>Adagio</span>
						</a>
						<div class="lb-overlay" id="image-4">
							<img src="images/g4.jpg"  class="img-responsive" alt="image04"/>
							<div>							
								<h3>a·da·gio <span>/əˈdäjō/</span></h3>
								<p>A movement or composition marked to be played adagio</p>
							</div>
							<a href="#page" class="lb-close">x Close</a>
						</div>
					</li>
					<li>
						<a href="#image-5">
							<img src="images/g5.jpg"  class="img-responsive" alt="image05"/>
							<span>Frappé</span>
						</a>
						<div class="lb-overlay" id="image-5">
							<img src="images/g5.jpg"  class="img-responsive" alt="image05"/>
							<div>							
								<h3>frap·pé<span>/fraˈpā/</span></h3>
								<p>Involving a beating action of the toe of one foot against the ankle of the supporting leg</p>
							</div>
							<a href="#page" class="lb-close">x Close</a>
						</div>
					</li>
					<li>
						<a href="#image-6">
							<img src="images/g6.jpg"  class="img-responsive" alt="image06"/>
							<span>Glissade</span>
						</a>
						<div class="lb-overlay" id="image-6">
							<img src="images/g6.jpg"  class="img-responsive" alt="image06"/>
							<div>							
								<h3>glis·sade <span>/gliˈsäd/</span></h3>
								<p>One leg is brushed outward from the body, which then takes the weight while the second leg is brushed in to meet it</p>
							</div>
							<a href="#page" class="lb-close">x Close</a>
						</div>
					</li>
					<li>
						<a href="#image-7">
							<img src="images/g7.jpg"  class="img-responsive" alt="image07"/>
							<span>Jeté</span>
						</a>
						<div class="lb-overlay" id="image-7">
							<img src="images/g7.jpg"  class="img-responsive" alt="image07"/>
							<div>							
								<h3>je·té <span>/zhə-ˈtā/</span></h3>
								<p>A springing jump made from one foot to the other in any direction</p>
							</div>
							<a href="#page" class="lb-close">x Close</a>
						</div>
					</li>
					<li>
						<a href="#image-8">
							<img src="images/g8.jpg"  class="img-responsive" alt="image08"/>
							<span>Piqué</span>
						</a>
						<div class="lb-overlay" id="image-8">
							<img src="images/g8.jpg"  class="img-responsive" alt="image08"/>
							<div>							
								<h3>pi·qué <span>/pēˈkā/</span></h3>
								<p>Strongly pointed toe of the lifted and extended leg sharply lowers to hit the floor then immediately rebounds upward</p>
							</div>
							<a href="#page" class="lb-close">x Close</a>
						</div>
					</li>
					<div class="clearfix"></div>
				</ul>
			</section>
		</div>
	  </div>
   </div>