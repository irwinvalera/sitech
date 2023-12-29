<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( $related_products ) : ?>

    <section class="related products">
        <h2 class="related-products-title"><?php esc_html_e( 'Related Products', 'woocommerce' ); ?></h2>

        <?php woocommerce_product_loop_start(); ?>

        <?php foreach ( $related_products as $related_product ) : ?>

            <?php
            $post_object = get_post( $related_product->get_id() );
            setup_postdata( $GLOBALS['post'] =& $post_object );

            // Obtenemos la URL del producto
            $product_url = get_permalink();

            // Obtenemos la imagen principal
            $product_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

            // Obtenemos el contenido del producto
            $product_content = get_the_content();

            // Obtenemos el valor del campo personalizado "marca" con ACF
            $product_brand = get_field('nombre_de_marca');
            ?>

            <div class="related-product" style="">
                <div class="product-image" style="background: url('<?php echo esc_url( $product_image[0] ); ?>') center center no-repeat; background-size: cover; background-color: #F4F4F4; width: 100%; height: 180px;"></div>
                <div class="product-info" style="width: 100%; background: #fff; padding: 24px; text-align: left;">
                    <p class="product-brand" style="font-size: 14px; font-weight: 600; line-height: 30px; color: #686868;"><?php echo esc_html( $product_brand ); ?></p>
                    <h3 style="font-size: 16px; font-weight: 600; line-height: 32px; color: #000; margin-top:-10px"><?php echo get_the_title(); ?></h3>
                    <div class="product-content" style="font-size: 14px; font-weight: 400; line-height: 24px; color: #000;"><?php echo wp_trim_words( $product_content, 200 ); ?></div>
                    <div class="boton-content" style="text-align: center; margin-top: 30px; margin-bottom:25px">
                        <a href="<?php echo esc_url( $product_url ); ?>" style="display: inline-block; background: #fff; border: 1px solid #1D2EC5; border-radius: 100px; color: #1D2EC5; text-decoration: none; padding: 14px 40px;">
                            Más información 
                            <span class="icon" style="vertical-align: middle; display: inline-block; margin-left: 8px; color: #1D2EC5;">
                                <?php
                                    // Incluir el SVG como imagen
                                    $svg_path = '/wp-content/uploads/2023/12/chevron-right-1.svg'; // Reemplaza con la ruta correcta a tu archivo SVG
                                    echo '<img src="' . esc_url( $svg_path ) . '" alt="Icono" width="24" height="24">';
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

        <?php woocommerce_product_loop_end(); ?>

    </section>

<?php endif;

wp_reset_postdata();
?>
