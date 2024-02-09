<div class="container-xxl market page-element " id="market">
    <div class="row mt-5 pt-5">
        <div class="col-12 mt-5 el-title">
            <div class="col-12">
                <h2 class="translatable-item" key="shop">Магазин</h2>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 market-el market-buy">
            <div class="market-item-block p-5">
                <div class="market-item-image">
                    <img src="img/tf2-key.png" alt="sell-keys" class="w-100 tf2key-img">
                </div>
                <?php foreach ($B_prices

                as $B_price) { ?>
                <div class="col-12 market-buy-text">
                    <div class="market-item-title translatable-item" key="buyKeys">
                        Купить ключи
                    </div>
                    <div class="market-item-price">
                        <t class="translatable-item" key="Price">Цена:</t>
                        <span class="buy-price">
                             <?= $B_price["price"]; ?> ₽
                        </span>
                    </div>
                    <div class="market-item-stock">
                        <t class="translatable-item" key="Stock">В наличии:</t>
                        <span>
                           <?= $B_price["number"]; ?> <t class="translatable-item" key="StockNumb">Шт</t>
                        </span>
                    </div>
                </div>
                <div class="col-12 market-btn-place mt-4">
                    <button onclick="deal_menu_buy()" class="btn market-btn market-btn-buy">
                        <span class="material-icons">
                            add_shopping_cart
                        </span>
                        <t class="translatable-item" key="BuyBtn">Купить</t>
                    </button>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php foreach ($S_prices as $S_price) { ?>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 market-el market-sell">
                <div class="market-item-block p-5">
                    <div class="market-item-image">
                        <img src="img/tf2-key.png" alt="sell-keys" class="w-100 tf2key-img">
                    </div>
                    <div class="col-12 market-buy-text">
                        <div class="market-item-title translatable-item" key="sellKeys">
                            Продать ключи
                        </div>
                        <div class="market-item-price">
                            <t class="translatable-item" key="Price">Цена:</t>
                            <span class="sell-price">
                                <?= $S_price["price"]; ?> ₽
                            </span>
                        </div>
                        <div class="market-item-stock">
                            <t class="translatable-item" key="Stock">В наличии:</t>
                            <span>
                                <?= $S_price["number"]; ?> <t class="translatable-item" key="StockNumb">Шт</t>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 market-btn-place mt-4">
                        <button onclick="deal_menu_sell()" class="btn market-btn market-btn-sell">
                            <span class="material-icons">
                                shopping_cart
                            </span>
                            <t class="translatable-item" key="SellBtn">Продать</t>
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
<!--Тега "t" не существует и он ничего не далает, здесь он только для перевода текста на другие языки-->
    </div>
</div>