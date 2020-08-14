// Hook antes de calcular as taxas
add_action('woocommerce_cart_calculate_fees' , 'ganhe_um_produto');
 
/**
 * Adiciona descontos do tipo: Pague 3 e leve 4
 * O produto gratuito será o de menor preço
 */
 
function ganhe_um_produto( WC_Cart $cart ){
	
	// Define a quatidade de mínima de produtos no carrinho necessário para a promoção
	// Se for tipo "pague 3 e leve 4", a quantidade mínima de produtos será 4.
	$ItQuantidadeMinima = 4;
	
	// Preencha com o nome do cupom que você criou
	$StNomeCupom = 'Digite aqui o nome do cupom';
	
	$StDescricaoCupom = '';
 
    // Sai da função de não tiver a quantidade mínima de produtos
    if( $cart->cart_contents_count < $ItQuantidadeMinima ) return;
         
    $match = false;
    $applied_coupons = $cart->get_applied_coupons(); 
     
    // Verifica se está usando o cupom da promoção
    foreach ($applied_coupons as $coupon_code) {
        $coupon = get_page_by_title($coupon_code, OBJECT, 'shop_coupon');
        if ($coupon->post_title == $StNomeCupom) {
			$StDescricaoCupom = $coupon->post_excerpt;
            $match = true;
            break;
        }

    }
 
    // Sai da função se não encontrou o cupom da promoção
    if (!$match) return;
     
    // Percorra os itens no carrinho para encontrar o mais barato
    foreach ( $cart->get_cart() as $cart_item_key => $values ) {
        $_product = $values['data'];
         
        $price = $_product->get_price_including_tax();
        for ($i = 1; $i <= $values['quantity']; $i++) {
            $product_price[] = $price;
        }
    }
     
     
    sort($product_price, SORT_NUMERIC);
    $free_items = floor($cart->cart_contents_count/4);
 
    $discount_amount = 0;
    for ($i = 1; $i <= $free_items; $i++) {
        $discount_amount += array_shift($product_price);
    }
 
    $cart->add_fee( $StDescricaoCupom, -$discount_amount);
}
