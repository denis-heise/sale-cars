const bodyPage = document.querySelector('body');
const buttonsFeedback = document.querySelectorAll('input[type="button"]');
const popupWrapper = document.querySelector('.popup-wrapper');
const popupFeedback = popupWrapper.querySelector('.popup-feedback');
const formpopup = popupFeedback.querySelector('form');
const titleForm = popupFeedback.querySelector('.popup-feedback__title');
const subtitleForm = popupFeedback.querySelector('.popup-feedback__subtitle');
const themeForm = popupFeedback.querySelector('.popup-feedback__theme');
const buttonClosePopup = popupFeedback.querySelector('.popup-feedback__icon-close');
const mainButtonForm = popupFeedback.querySelector('.button-feedback');

const inputName = popupFeedback.querySelector('#name_feedback_block');
const inputPhone = popupFeedback.querySelector('#phone_feedback_block');

buttonsFeedback.forEach(item => {
    item.addEventListener("click", function (){
        bodyPage.classList.add('lock');
        popupWrapper.classList.add('open-popap');
        titleForm.textContent = item['value'];
        themeForm['value'] = item['value'];
    });
});
buttonClosePopup.addEventListener("click", function(){
    bodyPage.classList.remove('lock');
    popupWrapper.classList.remove('open-popap');
    themeForm['value'] = '';
});
mainButtonForm.addEventListener("click", function(evt){
    const target = evt.target;

    if(target.classList.contains('button-feedback_repeat')){
        const hiddenBlocks = popupFeedback.querySelectorAll('.hidden');
        evt.preventDefault();
        titleForm.textContent = 'Заголовок формы';
        subtitleForm.textContent = 'Мы перезвоним вам и ответим на любой вопрос';
        target.textContent = 'Отправить заявку';
        target.classList.remove('button-feedback_narrow');
        target.classList.remove('button-feedback_repeat');

        hiddenBlocks.forEach(item => {
            item.classList.remove('hidden')
        });

        inputName.value = getCookie('name').replace('+', ' ');
        inputPhone.value = getCookie('phone');
    };
});

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : '';
};
