<?php
    require_once('data.php');
?>

<div class="entry-block"> 
    <div class="entry-block__content">
        <div class="entry-block__title">
            <h1>ВСЕ ВИДЫ РАБОТ.</h1>
            <h2>ПРЕМИАЛЬНОЕ КАЧЕСТВО ПО ДОСТУПНЫМ ЦЕНАМ.</h2>
        </div>

        <div class="entry-block__feedback">
            <form <?= $_COOKIE['banner_block'] ? '' : "action='send.php' method='POST'" ?> >
                <input type="hidden" name="theme" value="Обратный звонок">
                <input type="hidden" name="banner_block" value="banner_block">
                <input type="hidden" value="Баннер" name="name">
                <div>
                    <input id="phone_entry_block" type="tel" placeholder="+7 (___) - __ -  __" name="phone">
                    <label for="phone_entry_block"></label>
                    <?php if($_SESSION['errors_form'] && $_SESSION['errors_form']['phone'] && $_COOKIE['banner_block']): ?>
                        <div class="popup-feedback__error"><?= $_SESSION['errors_form']['phone'] ?></div>
                    <?php endif; ?>
                </div>
                <?php if($_COOKIE['banner_block'] && !isset($_SESSION['errors_form']['phone'])): ?>
                    <input class="button-feedback" style="background: #0FB551" value="Отправлено" readonly />
                <?php else: ?>
                    <button class="button-feedback" type="submit">Обратный звонок</button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<div class="availability-goods">
    <h3>Модели в наличии</h3>

    <div class="availability-goods__cards-list">
        <?php foreach($cars as $car): ?>
            <div class="availability-goods__one-card">
                <div class="availability-goods__one-card-header">
                    <h4><?= $car['title'] ?></h4>
                    <div class="availability-goods__availability-quantity-card">
                        <div>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1_415)">
                                <path d="M18.504 8.99105L17.9887 6.93006C18.1296 6.90014 18.2353 6.77516 18.2353 6.62543V6.29313C18.2353 5.57163 17.6483 4.98468 16.9269 4.98468H14.58V4.29925C14.58 3.94421 14.2911 3.6554 13.9361 3.6554H1.97305C1.61802 3.6554 1.3292 3.94421 1.3292 4.29925V9.94847C1.3292 10.1205 1.46868 10.26 1.64075 10.26C1.81279 10.26 1.9523 10.1205 1.9523 9.94847V4.29925C1.9523 4.28778 1.96159 4.27849 1.97305 4.27849H13.9361C13.9475 4.27849 13.9568 4.28778 13.9568 4.29925V9.94855C13.9568 10.1206 14.0963 10.2601 14.2684 10.2601C14.4404 10.2601 14.5799 10.1206 14.5799 9.94855V9.59538H18.255C18.2553 9.59538 18.2555 9.59546 18.2558 9.59546C18.2561 9.59546 18.2564 9.59542 18.2566 9.59542C18.7089 9.59573 19.0929 9.89255 19.2247 10.3016H18.256C18.084 10.3016 17.9445 10.441 17.9445 10.6131V11.2777C17.9445 11.816 18.3824 12.2539 18.9206 12.2539H19.2737V13.6246H18.4591C18.1915 12.8519 17.457 12.2954 16.5945 12.2954C15.732 12.2954 14.9974 12.8519 14.7298 13.6246H14.5798V11.2777C14.5798 11.1056 14.4404 10.9661 14.2683 10.9661C14.0963 10.9661 13.9567 11.1056 13.9567 11.2777V13.6245H7.49307C7.22547 12.8519 6.49096 12.2953 5.62844 12.2953C4.76592 12.2953 4.03137 12.8519 3.76381 13.6245H1.97305C1.96159 13.6245 1.9523 13.6152 1.9523 13.6038V12.9184H3.30229C3.47433 12.9184 3.61384 12.7789 3.61384 12.6068C3.61384 12.4348 3.47437 12.2953 3.30229 12.2953H0.311549C0.139511 12.2953 0 12.4348 0 12.6068C0 12.7789 0.139472 12.9184 0.311549 12.9184H1.32924V13.6038C1.32924 13.9588 1.61806 14.2476 1.97309 14.2476H3.65593C3.65585 14.2545 3.65539 14.2614 3.65539 14.2684C3.65539 15.3563 4.54052 16.2414 5.62844 16.2414C6.71635 16.2414 7.60149 15.3563 7.60149 14.2684C7.60149 14.2614 7.60102 14.2545 7.60095 14.2476H14.622C14.6219 14.2545 14.6214 14.2614 14.6214 14.2684C14.6214 15.3563 15.5066 16.2414 16.5945 16.2414C17.6824 16.2414 18.5675 15.3563 18.5675 14.2684C18.5675 14.2614 18.5671 14.2545 18.567 14.2476H19.5853C19.7573 14.2476 19.8968 14.1082 19.8968 13.9361V10.613C19.8968 9.7926 19.2915 9.11094 18.504 8.99105ZM14.58 5.60773H16.9269C17.3048 5.60773 17.6122 5.9152 17.6122 6.29313V6.31388H14.58V5.60773ZM14.58 8.97232V6.93694H17.3482L17.8571 8.97232H14.58ZM5.62844 15.6185C4.88405 15.6185 4.27844 15.0129 4.27844 14.2685C4.27844 13.524 4.88405 12.9185 5.62844 12.9185C6.37282 12.9185 6.97843 13.524 6.97843 14.2685C6.97843 15.0129 6.37282 15.6185 5.62844 15.6185ZM16.5946 15.6185C15.8502 15.6185 15.2446 15.0129 15.2446 14.2685C15.2446 13.524 15.8502 12.9185 16.5946 12.9185C17.3389 12.9185 17.9445 13.524 17.9445 14.2685C17.9445 15.0129 17.3389 15.6185 16.5946 15.6185ZM19.2738 11.6308H18.9207C18.726 11.6308 18.5676 11.4724 18.5676 11.2777V10.9246H19.2738V11.6308H19.2738Z" fill="#EC2830"/>
                                <path d="M5.62847 13.6246C5.27343 13.6246 4.98462 13.9134 4.98462 14.2685C4.98462 14.6235 5.27343 14.9123 5.62847 14.9123C5.9835 14.9123 6.27232 14.6235 6.27232 14.2685C6.27232 13.9134 5.9835 13.6246 5.62847 13.6246Z" fill="#EC2830"/>
                                <path d="M16.5946 13.6246C16.2395 13.6246 15.9507 13.9134 15.9507 14.2685C15.9507 14.6235 16.2395 14.9123 16.5946 14.9123C16.9496 14.9123 17.2384 14.6235 17.2384 14.2685C17.2384 13.9134 16.9496 13.6246 16.5946 13.6246Z" fill="#EC2830"/>
                                <path d="M12.9392 12.2954H8.28692C8.11488 12.2954 7.97537 12.4349 7.97537 12.607C7.97537 12.779 8.11484 12.9185 8.28692 12.9185H12.9392C13.1112 12.9185 13.2508 12.779 13.2508 12.607C13.2508 12.4349 13.1113 12.2954 12.9392 12.2954Z" fill="#EC2830"/>
                                <path d="M10.8334 6.73734C10.7117 6.6157 10.5144 6.6157 10.3928 6.73738L7.62232 9.50782L6.18108 8.06658C6.05941 7.94491 5.86215 7.94491 5.74052 8.06658C5.61884 8.18825 5.61884 8.38547 5.74052 8.50715L7.40206 10.1687C7.46288 10.2295 7.54262 10.2599 7.62232 10.2599C7.70203 10.2599 7.78181 10.2295 7.84259 10.1687L10.8333 7.17795C10.955 7.05623 10.955 6.85901 10.8334 6.73734Z" fill="#EC2830"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_1_415">
                                        <rect width="19.8968" height="19.8968" rx="9.94842" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>    
                            <h5>10 А/М В НАЛИЧИИ</h5>                            
                        </div>
                        <div>
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">  
                                <image id="image0" width="20" height="20" x="0" y="0"
                                href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                                AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACHFBMVEUAAADsJi/sKC7rKC/s
                                Jy/rKC/qKDDrKSnvKTHsKTDtKC/tKDHtKDDrKDDtKS/tJzHqKC/tKDDvKDDsJzHuKTDrKC/zJDHt
                                KjDvKi/tKTHtKDHsJzDsKDH/AADtKDHrKTDfIEDlMzPoFy7jHDnuIjPsKDDsKjHtJy/tKTHtKi/t
                                JCTvIDDuKC3uKC/uIiLuIjPrJyfyKC3tJzDsKC/rJy/nJDHrJzDsKDDtJDfxKiryKCjrJzHsKDDo
                                Jy7wLS3xJjHtJzHsKDD/AADxJzLqKTDxKjnyKDbtKDDrKS/sKTH/AEDsJzDsKC/sJjDyJjPrKC3s
                                JzHrJTDuKTDuKC7sKDDtIyzsKDDsKDDwJCz/AIDrKDDtKTHqKirrKC/sKDDuKC/rJzHsJzHrJzDq
                                KTHsKDHrJzT/MzPqJy/uKC7oLi7vMDDrKC//KirtJC7sJy/tKTDlGTPrJzvtKDHsJy/rKDDnJC//
                                JCTtKTDtJzHpKC7fICrbJEnfMDDtKTDvJjHlJjPqKi/rKTDrHzPpLDLsKC/sKTDtKC/bJCTjOTnu
                                JzHrKDDrKDDwJy7/JCTsKDDsKTDtKDDsJjP/JEntJTDrKDD/LS3rKTDsKTD/QEDqJC/rJy/sKC/t
                                KDHrKTDuKC/sJzDrJzDsKTDrJy/fICDrJy/sJjHsKTDsKS/tJzDsKTD/GTPuMzPtKDDrJzHUKir/
                                Li7sKTHnKDD/gID///+IcdIUAAAAs3RSTlMANnmOkZlgGR+vgVOAgHFih38gbrBMFVUxY5FPkQGY
                                jwgKCwkewEOcfSsOEC14Dw8NOauSQRWjsw4SE07TIRFJg54CSGsSE6aclwR7bWsUWtJLS02fHa6G
                                IwJ/gwxnxmdoadA+wCcFYXkLEIwGHIibCg2no8QrB7R9UxgHELsvFDG0GS6HoXMHCWhAWiEOhYSZ
                                KAdFpRGKUAQxwmxyo5KwW2uJCJySo6NvagoPdBoGC0QgAuZLLXwAAAABYktHRLPabf9+AAAACXBI
                                WXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH5wUFDwwjPSWHmwAAAUZJREFUGNNjYMANGJmYWVjZ2JGF
                                ODi5uHl4+fgFBBFiQszCIqJi4hKSUtIysjAxOS55BUUlJUVlFVU1HqioOq+Gppa2jq6evoGhkbEJ
                                WNTUzNxC39LK2sbW0k7f3sHRCSTq7KLr6mZpZ+duCQT6Hp5eIEFvH18/Kzt9/4DAoOCQ0LDwiEig
                                IE9UtKW2QUxsXHxCYlJySnhqGlBpenyGdoyiYkxMZoxFlmV2iGIOUDA3L9+gQFkhs9CgMFSwqLik
                                tAwomFleUVlVrZBpoV9TW1dv2tDYBDQzrbmltS2nvaNQq7PLst60u4cH5NDe+L7+CRMnTS6coj+1
                                ftp0fW2Q4Ay7mbNmz1GfO2++3oKFiywXQ/yZY2cRu2Sp2bLlK/RX2q2CBdMMi9UxMQYG+t5r1q5D
                                CtGc9XZ2WZZ6Gzaihr3spk2wsGQAAGlVVjKcZQgzAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIzLTA1
                                LTA1VDE1OjEyOjM1KzAwOjAw6NvuwgAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMy0wNS0wNVQxNTox
                                MjozNSswMDowMJmGVn4AAAAASUVORK5CYII=" />
                            </svg>
                            <h5>ЛИЗИНГ А/М</h5>
                        </div>
                    </div>
                </div>
                <div class="availability-goods__card-description">
                    <img src="<?= $car['image'] ?>" alt="first-car">
                    <div> <?= $car['description'] ?> </div>
                </div>
                <div class="availability-goods__buttons">
                    <input type="button" value="Получить спец. цену">
                    <input type="button" value="Спец. условия по лизингу">
                    <input type="button" value="Подобрать автомобиль">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="more-questions">
    <div class="more-questions__content">
        <div class="more-questions__title">
            <div>Есть вопросы?</div>
            <div>Мы перезвоним вам и ответим на любой вопрос</div>
        </div>
        <div class="more-questions__feedback">
            <form <?= $_COOKIE['questions_block'] ? '' : "action='send.php' method='POST'" ?>>
                <input type="hidden" name="theme" value="Обратный звонок">
                <input type="hidden" name="questions_block" value="questions_block">
                <div class="more-questions__inputs">
                    <div>
                        <input id="name_questions_block" type="text" placeholder="Ваше имя" name="name">
                        <label for="name_questions_block"></label>
                        <?php if($_SESSION['errors_form'] && $_SESSION['errors_form']['name'] && $_COOKIE['questions_block']): ?>
                            <div class="popup-feedback__error"><?= $_SESSION['errors_form']['name'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <input id="phone_questions_block" type="tel" placeholder="+7 (___) ___-__-__" name="phone">
                        <label for="phone_questions_block"></label>
                        <?php if($_SESSION['errors_form'] && $_SESSION['errors_form']['phone'] && $_COOKIE['questions_block']): ?>
                            <div class="popup-feedback__error"><?= $_SESSION['errors_form']['phone'] ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($_COOKIE['questions_block'] && !isset($_SESSION['errors_form'])): ?>
                    <input class="button-feedback" style="background: #0FB551" value="Отправлено" readonly />
                <?php else: ?>
                    <button class="button-feedback" type="submit">Обратный звонок</button>
                <?php endif; ?>
            </form>
        </div>
        <p class="more-questions__consent">Нажимая кнопку я подтверждаю свое ознакомление с порядком обработки персональных данных со стороны КОМПАНИИ и даю свободное и осознанное согласие на их обработку, на получение информации по каналам связи, в том числе в рекламных целях. <a href="#">Подробно тут</a></p>
    </div>              
</div>

<div id="map">
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A4648acc59527cb5e564c072344ec412c95002d47f89ebcbe520d0dd0e67d5f32&amp;source=constructor" width="100%" height="600" frameborder="0"></iframe>
</div>