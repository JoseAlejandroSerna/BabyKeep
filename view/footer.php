<footer id="footer" class="js-footer">
    <div id="footer-container-main" class="footer-container footer-style-1">
        <div class="container">

            <div class="row"></div>

            <div class="row">
                <div class="col-12  col-md-auto">
                    <div class="block block-footer block-toggle block-social-links js-block-toggle">
                        <h5 class="block-title">
                            <span><?php echo $menu["follow"]; ?></span>
                        </h5>
                        <div class="block-content">
                            <ul class="social-links _footer" itemscope="" itemtype="https://schema.org/Organization" itemid="#store-organization">
                                
                                <?php foreach($info_admin_socialNetworks as $socialNetworks) {?>

                                    <?php if($socialNetworks->vUrlFacebook != ""){?>
                                        <li class="facebook">
                                            <a itemprop="sameAs" href="<?php echo $socialNetworks->vUrlFacebook; ?>" target="_blank" rel="noreferrer noopener">
                                                <i class="fa fa-facebook fa-fw" aria-hidden="true"></i>
                                            </a>
                                        </li>  
                                    <?php }?>
                                    <?php if($socialNetworks->vUrlInstagram != ""){?>
                                        <li class="instagram">
                                            <a itemprop="sameAs" href="<?php echo $socialNetworks->vUrlInstagram; ?>" target="_blank" rel="noreferrer noopener">
                                                <i class="fa fa-instagram fa-fw" aria-hidden="true"></i>
                                            </a>
                                        </li>  
                                    <?php }?>
                                    <?php if($socialNetworks->vUrlTwitter != ""){?>
                                        <li class="twitter">
                                            <a itemprop="sameAs" href="<?php echo $socialNetworks->vUrlTwitter; ?>" target="_blank" rel="noreferrer noopener">
                                                <i class="fa fa-twitter fa-fw" aria-hidden="true"></i>
                                            </a>
                                        </li>  
                                    <?php }?>
                                    <?php if($socialNetworks->vUrlPinterest != ""){?>
                                        <li class="pinterest">
                                            <a itemprop="sameAs" href="<?php echo $socialNetworks->vUrlPinterest; ?>" target="_blank" rel="noreferrer noopener">
                                                <i class="fa fa-pinterest fa-fw" aria-hidden="true"></i>
                                            </a>
                                        </li>  
                                    <?php }?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>       
                </div>
            </div>
            
            <div class="row"></div>
        </div>
    </div>
</footer>