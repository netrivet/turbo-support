<ul id="site-header-cart" class="site-header-cart menu">
    <li class="current-menu-item">
    <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
        <?php echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?>
        <span class="count"> <?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
    </a>
    </li>
    <li>
        <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
    </li>
</ul>
