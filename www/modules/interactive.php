<div class="container menu menu-closed">
    <button class="btn-close mt-3" onclick="black_screen_close_all()"></button>
    <div class="col-12 mt-1 menu-title">
        <h3></h3>
    </div>
    <hr>
    <div class="col-12 mt-3 menu-content">
        <div class="deal-menu">


            <div class="form"  id="buy_form">
                <b>
                    Проверьте
                    <a href="https://steamcommunity.com/id/me/tradeoffers/privacy#trade_offer_access_url"
                       target="_blank">
                        ссылку на обмен
                    </a>
                </b>
                <div class="form-group mt-2">
                    <span>Trade url:</span>
                    <input type="url" name="trade_url" required value="<?= $_COOKIE['trade_url'] ?? '' ?>"
                           placeholder="Введите сюда ссылку на обмен" class="input-styled">
                </div>
                <div class="wallet mt-2">
                    <span>Куда вам удобнее отправить деньги</span>
                    <div class="wallet-btn-group mt-1">
                        <button class="btn card-btn" onclick="buy_card_pay()">
                            На карту
                        </button>
                        <button class="btn qiwi-btn" onclick="buy_qiwi_pay()">
                            на Qiwi
                        </button>
                    </div>
                </div>

                <div class="payment-form buy-payment-form mt-2">

                </div>

                <b class="mt-4">Укажите желаемое количество предметов</b>
                <input type="number" min="1" max="100" required name="keys_numb" class="mt-2 number-place"
                       placeholder="Укажите количество предметов"
                       autocomplete="off"
                       id="buy-number">
                <div class="result secondary-form-group mt-1">
                    <span>К оплате:</span>
                    <input type="text" name="total_price" readonly id="buy-result" placeholder="Итого ₽">
                    Рублей
                    <div>
                        <?php foreach ($B_prices as $B_price) { ?>
                            <span>Цена за шт: ₽</span>
                            <input type="text" readonly class="input-styled" id="buy-price"
                                   value="<?= $B_price["price"]; ?>">
                        <?php } ?>
                    </div>
                </div>
                <button class="btn-dark mt-4 p-1" onclick="buy_req_check()">Оформить заявку</button>
            </div>


            <div class="form" id="sell_form">
                <b>
                    Проверьте
                    <a href="https://steamcommunity.com/id/me/tradeoffers/privacy#trade_offer_access_url"
                       target="_blank">
                        ссылку на обмен
                    </a>
                </b>
                <div class="form-group mt-2">
                    <span>Trade url:</span>
                    <input type="text" name="trade_url" required value="<?= $_COOKIE['trade_url'] ?? '' ?>"
                           placeholder="Введите сюда ссылку на обмен" class="input-styled">
                </div>
                <div class="wallet mt-2">
                    <span>Куда вы хотите получить деньги?</span>
                    <div class="wallet-btn-group mt-1">
                        <button class="btn card-btn" onclick="sell_card_pay()">
                            На карту
                        </button>

                        <button class="btn qiwi-btn" onclick="sell_qiwi_pay()">
                            на Qiwi
                        </button>
                    </div>
                </div>
                <div class="payment-form sell-payment-form mt-2">

                </div>

                <b class="mt-4">Укажите желаемое количество предметов</b>
                <input type="number" min="1" max="100" required name="keys_numb" class="mt-2 number-place"
                       placeholder="Укажите количество предметов"
                       autocomplete="off"
                       id="sell-number">
                <div class="result secondary-form-group mt-1">
                    <span>Итоговая сумма:</span>
                    <input type="text" name="total_price" readonly id="sell-result" placeholder="Итого ₽">
                    Рублей
                    <div>
                        <?php foreach ($S_prices as $S_price) { ?>
                            <span>Цена за шт: ₽</span>
                            <input type="text" readonly class="input-styled" id="sell-price"
                                   value="<?= $S_price["price"]; ?>">
                        <?php } ?>
                    </div>
                </div>
                <button class="btn-dark mt-4 p-1" onclick="sell_req_check()">Оформить заявку</button>
            </div>
        </div>
    </div>
</div>

<div class="message message-success">
    <span>
        Заявка успешно оформлена
    </span>
</div>
<div class="message message-fail">
    <span>
        Все поля должны быть заполнены
    </span>
</div>
<button class="lang-panel-open-btn btn" onclick="open_lang_panel()">
    <span class="material-icons">language</span>
</button>
<div class="lang-panel lang-panel-closed">
    <button class="lang-panel-el btn lang-ru" id="ru"><img src="img/ru_flag.png" alt="ru_flag"></button>
    <button class="lang-panel-el btn lang-en" id="en"><img src="img/eng_flag.png" alt="eng_flag"></button>
</div>