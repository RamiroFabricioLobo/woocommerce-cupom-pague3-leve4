# WooCommerce - Cupom do tipo Pague 3 e leve 4

## Passo 1
Crie um cupom no WooCommerce, selecione "Desconto fixo de carrinho" em "Tipo de desconto" e deixe "Valor do cupom" com 0.

Na descrição do cupom, coloque o texto que deseja que apreceça na página de carrinho e ckeckout. Exemplo: Promoção: Pague 3 e leve 4.

![Criando o cupom](https://raw.githubusercontent.com/RamiroFabricioLobo/woocommerce-cupom-pague3-leve4/master/cupom-page3-leve4.jpg)

Os outros dados do cupom você pode configurar da forma que desejar.

## Passo 2
Copie o código disponível no arquivo code.php deste repositório e cole dentro do arquivo functions.php do seu tema ativo.

![Copiar código](https://raw.githubusercontent.com/RamiroFabricioLobo/woocommerce-cupom-pague3-leve4/master/cupom-codigo.jpg)

## Passo 3

### Altere a variável $ItQuantidadeMinima
Define a quatidade mínima de produto carrinho necessário para a promoção. Se for do tipo "pague 3 e leve 4", a quantidade mínima de produtos será 4.

### Altere a variável $StNomeCupom
Preencha com o nome do cupom que você criou.

![functions.php](https://raw.githubusercontent.com/RamiroFabricioLobo/woocommerce-cupom-pague3-leve4/master/cupom-functions.jpg)
