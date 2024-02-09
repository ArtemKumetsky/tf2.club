<?php session_start(); ?>
<?php require 'steamauth/steamauth.php'; require 'steamauth/userInfo.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TF2.club</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/authorization.css">
    <link rel="stylesheet" href="css/cover.css">
    <link rel="stylesheet" href="css/market.css">
    <link rel="stylesheet" href="css/contacts.css">
    <link rel="stylesheet" href="css/work.css">
    <link rel="stylesheet" href="css/DLC.css">
    <link rel="stylesheet" href="css/adaptive.css">
    <link rel="stylesheet" href="css/additional_pages.css">
    <link rel="stylesheet" href="css/interactive.css">
    <script src="script/jQuery.js"></script>
    <script src="script/script.js"></script>
    <script src="script/translate.js"></script>
    <script src="script/interactive.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,700&display=swap">
    <?php if (isset($_SESSION['steamid'])) { ?>
        <div class="account-info">
            <button class="btn" onclick="personal_data()">
                <img src="img/account.png" alt="account_info">
            </button>
        </div>
        <div class="container user-data user-data-closed p-4">
            <div class="row">
                <button class="btn-close" onclick="personal_data()"></button>
                <div class="col-12 your-profile">
                    <span class="translatable-item" key="Profile_title">Ваш профиль</span>
                </div>
                <div class="col-6 m-2 user-data-account-info">
                    <span><?php echo $u ?></span>
                    <img src="<?php echo $a ?>" alt="profile-avatar"
                         style="border: 3px solid black;
                         border-radius: 3px;">
                </div>
                <div class="col-12 trade-url-title p-2">
                    <span><t class="translatable-item" key="UrlTitle0">Необходимо указать</t>
                        <a href="https://steamcommunity.com/id/me/tradeoffers/privacy#trade_offer_access_url" target="_blank" class="translatable-item" key="UrlTitleHref">
                            ссылку на обмен
                        </a>
                        <t class="translatable-item" key="UrlTitle1">и реквизиты для выплат (Qiwi или номер карты).</t>
                    </span>

                    <div class="form-container">
                        <form method="POST" action="/steamauth/tradeURL.php">
                            <div class="form-group mt-2">
                                <span>Trade url:</span>
                                <input type="url" name="trade_url"
                                       required value="<?= $_COOKIE['trade_url'] ?? '' ?>"
                                       placeholder="Введите сюда ссылку на обмен" class="input-styled">
                            </div>

                            <div class="form-group mt-2">
                                <span class="translatable-item" key="card">Номер карты:</span>
                                <input type="text" name="card_info" minlength="16" maxlength="16"
                                       value="<?= $_COOKIE['card_info'] ?? '' ?>"
                                       class="input-styled"
                                       placeholder="Реквизиты для выплат (только номер карты, на которую будут приходить деньги)">
                            </div>
                            <div class="form-group mt-2">
                                <span>Qiwi:</span>
                                <input type="text" name="qiwi_info"
                                       value="<?= $_COOKIE['qiwi_info'] ?? '' ?>"
                                       class="input-styled"
                                       placeholder="Ваш Qiwi номер">
                            </div>
                            <button type="submit" class="btn-dark mt-4 button-submit translatable-item" key="ProfileSaveBtn">Сохранить</button>
                        </form>


                    </div>
                </div>
                <div class="logout">
                    <a href="steamauth/logout.php" class="btn logout-btn">
                        Logout
                    </a>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo '<div class="account-info">
        <button class="btn" onclick="login()">
            <img src="img/login2.png" alt="account_info">
        </button>
    </div>';
        loginbutton();
    }

    ?>
    <? if (isset($_SESSION['action_status']) && $_SESSION['action_status'] == 'success') { ?>
        <script>
            personal_data();
        </script>
        <? unset($_SESSION['action_status']); } ?>
</head>