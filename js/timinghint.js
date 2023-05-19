const teamHint = document.getElementById('input-team');
const timing = document.getElementById('timing');

let count = 0;

/**
 * issuance of a hint on the termfv of all games
 */
function checkCount() {
    let str = '';
    teamHint.addEventListener('input', function() {

        str = teamHint.value.trim();
        str = str.split(',');
        if (str[str.length - 1].length == 0 ) {
            str.pop();
        }
        if (str.length == 0 || str.length == 1) {
            timing.innerHTML = 'Введите хотя бы двух соперников';
        } else if (str.length == 2) {
            timing.innerHTML = 1;
        } else {
            timing.innerHTML = str.length * (str.length - 1);
        }
    });
}

/**
 * script initialization
 */
function init() {
    checkCount();
 }
 
 init();