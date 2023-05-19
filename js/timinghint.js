const teamHint = document.getElementById('input-team');
const timing = document.getElementById('timing');
const dateStart = document.getElementById('dateStart');
const dateStop = document.getElementById('dateStop');
const submitBtn = document.getElementById('submitBtn');
let count = 0;
let term = 0;
let setTerm = 0;

/**
 * timing calculation
 * @param {number} date1 
 * @param {number} date2 
 * @returns number
 */
function timingCalculation(date1, date2) {
    let setTerm;
    setTerm = Math.ceil((Math.abs(date2.getTime() - date1.getTime()) / (1000 * 3600 * 24)) + 1);
    return setTerm;
}

/**
 * timing check
 * @param {number} term 
 * @param {number} setTerm 
 */
function timingCheck(term, setTerm) {
    if (term <= setTerm && term != 0) {
        submitBtn.disabled = false;
    } else {
        submitBtn.disabled = true;
    }
}

/**
 * set start date
 */
function setStartDate() {
    window.addEventListener('load', function() {
        let d = new Date();
        let day = d.getDate(); 
        if (day < 10) day='0' + day;
        let month = d.getMonth() + 1; 
        if (month < 10) month='0' + month;
        let year = d.getFullYear();
        dateStart.value = year + '-' + month + '-' + day;
        if(term == 0) {
            submitBtn.disabled = true;
        }
    });
}

/**
 * issuance of a hint on the term of all games
 */
function checkCountTeams() {
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
            term = 1;
            timing.innerHTML = 1;
            if (typeof(date2) != 'undefined') {
                setTerm = timingCalculation(date1, date2);
                timingCheck(term, setTerm);
            }
        } else {
            term = str.length * (str.length - 1);
            timing.innerHTML = str.length * (str.length - 1);
            if (typeof(date2) != 'undefined') {
                timingCheck(term, setTerm);
            }
        }
    });
    let date1;
    let date2;
    date1 = new Date();

    dateStart.addEventListener('input', function() {
        date1 = new Date(dateStart.value);
        if (typeof(date2) != 'undefined') {
            setTerm = timingCalculation(date1, date2);
            timingCheck(term, setTerm);
        }
    });
    dateStop.addEventListener('input', function() {
        date2 = new Date(dateStop.value);
        setTerm = timingCalculation(date1, date2);
        timingCheck(term, setTerm);
    });
}

/**
 * script initialization
 */
function init() {
    setStartDate();
    checkCountTeams();
 }
 
 init();