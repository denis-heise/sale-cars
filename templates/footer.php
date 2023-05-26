    <footer class="footer">
        <div>Политика АО «КОМПАНИЯ» в области обработки и обеспечения безопасности персональных данных</div>
        <div>ИНН: 99999999999 ОГРН: 9999999999999</div>
        <div>ООО «КОМПАНИЯ»</div>
    </footer>

    <div class="popup-wrapper <?= $popup_data['popup'] && $_COOKIE['popup'] ? 'open-popap' : '' ?>">
        <div class="popup-feedback">
            <svg class="popup-feedback__icon-close <?= $popup_data['show_block'] ? '' : 'hidden' ?>" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.6812 18.8879L1.11221 3.3189C0.482039 2.68873 0.478247 1.72872 1.10346 1.10351C1.72868 0.47829 2.68869 0.482082 3.31886 1.11226L18.8879 16.6813C19.5181 17.3115 19.5219 18.2715 18.8966 18.8967C18.2714 19.5219 17.3114 19.5181 16.6812 18.8879Z" fill="black"/>
                <path d="M18.888 3.3187L3.31896 18.8877C2.68879 19.5179 1.72878 19.5217 1.10357 18.8965C0.478351 18.2713 0.482143 17.3113 1.11232 16.6811L16.6813 1.11205C17.3115 0.481874 18.2715 0.478082 18.8967 1.1033C19.522 1.72851 19.5182 2.68852 18.888 3.3187Z" fill="black"/>
            </svg>
            <div class="popup-feedback__title"><?= $popup_data['title']; ?></div>
            <div class="popup-feedback__subtitle"><?= $popup_data['description']; ?></div>
            <div class="more-questions__feedback">
                <form action="send.php" method="POST">
                    <input type="hidden" value="theme" class="popup-feedback__theme" name="theme">
                    <input type="hidden" value="popup" name="popup">
                    <div class="more-questions__inputs <?= $popup_data['show_block'] ? '' : 'hidden' ?>">
                        <div>
                            <input id="name_feedback_block" type="text" placeholder="Ваше имя" name="name">
                            <label for="name_feedback_block"></label>
                            <?php if($_SESSION['errors_form'] && $_SESSION['errors_form']['name']): ?>
                                <div class="popup-feedback__error"><?= $_SESSION['errors_form']['name'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <input id="phone_feedback_block" type="tel" placeholder="+7 (___) ___-__-__" name="phone">
                            <label for="phone_feedback_block"></label>
                            <?php if($_SESSION['errors_form'] && $_SESSION['errors_form']['phone']): ?>
                                <div class="popup-feedback__error"><?= $_SESSION['errors_form']['phone'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($popup_data['button'] !== 'На главную') : ?>
                        <button class="button-feedback <?= $popup_data['show_block'] ? '' : 'button-feedback_narrow' ?> <?= $_SESSION['error_send'] === 1 ? 'button-feedback_repeat' : ''?>" type="submit">
                            <span>
                                <?= $popup_data['button']; ?>
                            </span>
                        </button>
                    <?php endif; ?>
                    <?php if($popup_data['button'] === 'На главную') : ?>
                        <a class="button-feedback button-feedback_narrow" href="/">
                            <span>
                                <?= $popup_data['button']; ?>
                            </span>
                        </a>
                    <?php endif; ?>
                </form>
            </div>
            <p class="<?= $popup_data['show_block'] ? '' : 'hidden' ?>">Нажимая кнопку я подтверждаю свое ознакомление с порядком обработки персональных данных со стороны КОМПАНИИ и даю свободное и осознанное согласие на их обработку, на получение информации по каналам связи, в том числе в рекламных целях. <a href="#">Подробно тут</a></p>
        </div>
    </div>

    <script src="./index.js"></script>
</body>
</html>