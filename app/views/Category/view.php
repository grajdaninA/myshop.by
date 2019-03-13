

<div class="men">
    <div class="container">
<!--breadcrumbs-->
        <div class="breadcrumb">
            <ul class="breadcrumbs">
                <?= $breadcrumbs;?>
            </ul>
            <div class="clearfix"></div>
        </div>
        
<!--single product-->


<!--product-begin-->
    <?php if($products): ?>
    <?php $curr = \myshop\App::$registry->getProperty('currency')?>
        <div class="col-md-12 mens_right">
            <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid-custom">
                <div class="clearfix"></div>
		<ul>
                    <?php foreach ($products as $hit):?>
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
        <div class="text-center">
            <?php if($pagination->countPages > 1):?>
            <?=$pagination;?>
            <?php endif;?>
        </div>
    <?php else:?>
        <div class="col-md-12 mens_right">
            Budgets not found
        </div>
    <?php endif; ?>
<!--product-end-->
    </div>
</div>

