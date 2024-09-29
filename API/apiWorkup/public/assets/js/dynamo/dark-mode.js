const $html = document.querySelector('html')
const $button = document.querySelector('#darkmode')

$button.onclick = () => {
    $html.classList.toggle('dark-mode');
};