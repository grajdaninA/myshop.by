<div class="men">
    <div class="container">
        
<!--breadcrumbs-->
        <div class="breadcrumb">
            <ul class="breadcrumbs">
                <?= $breadcrumbs; ?>
            </ul>
            <div class="clearfix"></div>
        </div>
        
<!--single product-->
        <div class="col-md-9 single_top">
            <div class="single_left">
                <div class="labout span_1_of_a1">
                    <?php if($gallery):?>
                    <div class="flexslider">
                        <ul class="slides">
                            <?php foreach ($gallery as $item):?>
                            <li data-thumb="images/<?= $item->img;?>">
                                <img src="images/<?= $item->img;?>" />
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <?php else: ?>
                    <div>
                        <img src="images/<?=$product->img;?>" alt="">
                    </div>
                    <?php endif;?>
                    <div class="clearfix"></div>
                    <ul class="single_social">
                            <li><a href="#"><i class="fb1"> </i> </a></li>
                            <li><a href="#"><i class="tw1"> </i> </a></li>
                            <li><a href="#"><i class="g1"> </i> </a></li>
                            <li><a href="#"><i class="linked"> </i> </a></li>
                    </ul>
                </div>
                <?php $curr = \myshop\App::$registry->getProperty('currency')?>
                <?php $cats = \myshop\App::$registry->getProperty('cats')?>
                <div class="cont1 span_2_of_a1 simpleCart_shelfItem">
                    <h1><?=$product->title;?></h1>
                    <p class="availability">Availability: <span class="color">In stock</span></p>
                    <span class="availability">Category: </span>
                    <span> 
                        <a href="category/<?=$cats[$product->category_id]['alias'];?>"><?=$cats[$product->category_id]['title'];?></a>
                    </span>
                    <div class="price_single">
                        <span class="reducedfrom">
                            <?php if($product->old_price):?>
                                <?= $curr['symbol_left'];?>
                                <?= $product->old_price * $curr['value']; ?>
                                <?= $curr['symbol_right'];?>
                            <?php endif; ?>
                        </span>
                        <span id="base-price" data-base="<?= $product->price * $curr['value']; ?>" class="amount item_price actual">
                            <?= $curr['symbol_left'];?>
                            <?= $product->price * $curr['value']; ?>
                            <?= $curr['symbol_right'];?>
                        </span>
                        <a href="#">click for offer</a>
                    </div>
                    <h2 class="quick">Quick Overview:</h2>
                    <p class="quick_desc"><?=$product->content;?></p>
                    <div class="wish-list">
                        <ul>
                            <li class="wish">
                                <a href="#">Add to Wishlist</a>
                            </li>
                            <li class="compare">
                                <a href="#">Add to Compare</a>
                            </li>
                        </ul>
                    </div>
<!--modifications-->
                    
                    <div class="quantity_box">
                        <ul class="product-qty">
                            <div class="add-mod" style="float: left; width: 150px;">
                                <?php if ($mods):?>
                                <span>Color:</span>
                                <select id="mods">
                                    <option>Choose color</option>
                                    <?php foreach ($mods as $mod):?>
                                    <option data-title="<?=$mod->title;?>"
                                            data-price="<?=$mod->price * $curr['value'];?>"
                                            value="<?=$mod->id;?>"><?=$mod->title;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php endif; ?>
                            </div>
                            <div class="add-qty" style="float: left; width: 150px;">
                                <span>Quantity:</span>
                                <input type="number" size="4" value="1" name="quantity" min="1" step="1">
                            </div>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <a data-id="<?=$product->id;?>" id="productAdd" href="cart/add?id=<?=$product->id;?>" class="btn btn-primary btn-normal btn-inline btn_form button item_add item_1 add-to-cart-link" target="_self">Add to cart</a>
                </div>    
                <div class="clearfix"> </div>
            </div>
            <div class="sap_tabs">
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                    <ul class="resp-tabs-list">
                        <li class="resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab"><span>Product Description</span></li>
                        <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Additional Information</span></li>
                        <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Reviews</span></li>
                    </ul>
                    <div class="resp-tabs-container">
                        <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Product Description</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
                            <div class="facts">
                            <ul class="tab_list">
                                <li><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</a></li>
                                <li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigatione</a></li>
                                <li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica</a></li>
                                <li><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</a></li>
                            </ul>
                            </div>
                        </div>
                        <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>Additional Information</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                            <div class="facts">
                                <ul class="tab_list">
                                    <li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigatione</a></li>
                                    <li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica</a></li>
                                    <li><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</a></li>
                                </ul>
                            </div>
                        </div>
                        <h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span>Reviews</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                            <div class="facts">
                                <ul class="tab_list">
                                    <li><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</a></li>
                                    <li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigatione</a></li>
                                    <li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores leg</a></li>
                                    <li><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--related product-->
<?php //session_destroy();?>
        <?php if($related):?>
        <div class="col-md-3 tabs">
        
            <h3 class="m_1">Related Products</h3>
            <?php foreach ($related as $v):?>
            <ul class="product">
                <li class="product_img"><img src="images/<?=$v['img']?>" class="img-responsive" alt=""></li>
                <li class="product_desc">
                    <h4><a href="product/<?=$v['alias']?>"><?=$v['title']?></a></h4>
                    <p>
                        <?php if($v['old_price']):?>
                        <del>
                            <?= $curr['symbol_left'];?>
                            <?= $v['old_price'] * $curr['value']; ?>
                            <?= $curr['symbol_right'];?>
                        </del>
                        <?php endif; ?>
                    </p>
                    <p class="single_price">
                        <?= $curr['symbol_left'];?>
                        <?=$v['price'] * $curr['value'];?>
                        <?= $curr['symbol_right'];?>
                    </p>
                    <a href="#" class="link-cart">Add to Wishlist</a>
                    <a href="cart/add?id=<?=$v['id'];?>" data-id="<?=$v['id'];?>" class="button cbp-vm-icon cbp-vm-add add-to-cart-link">Add to Cart</a>
                </li>
                <div class="clearfix"> </div>
            </ul>
            <?php endforeach;?>
        </div>
        <?php endif;?>
<!--recently viewed-->
        <?php if($recentlyViewed):?>
        <div class="col-md-3 tabs">        
            <h3 class="m_1">Recently Viewed Products</h3>
            <?php foreach ($recentlyViewed as $v):?>
            <ul class="product">
                <li class="product_img"><img src="images/<?=$v['img']?>" class="img-responsive" alt=""></li>
                <li class="product_desc">
                    <h4><a href="product/<?=$v['alias']?>"><?=$v['title']?></a></h4>
                    <p>
                        <?php if($v['old_price']):?>
                        <del>
                            <?= $curr['symbol_left'];?>
                            <?= $v['old_price'] * $curr['value']; ?>
                            <?= $curr['symbol_right'];?>
                        </del>
                        <?php endif; ?>
                    </p>
                    <p class="single_price">
                        <?= $curr['symbol_left'];?>
                        <?=$v['price'] * $curr['value'];?>
                        <?= $curr['symbol_right'];?>
                    </p>
                    <a href="#" class="link-cart">Add to Wishlist</a>
                    <a href="cart/add?id=<?=$v['id'];?>" data-id="<?=$v['id'];?>" class="button cbp-vm-icon cbp-vm-add add-to-cart-link">Add to Cart</a>
                </li>
                <div class="clearfix"> </div>
            </ul>
            <?php endforeach;?>
        </div>
        <?php endif;?>
    </div>
</div>
<div class="clearfix"> </div>

	