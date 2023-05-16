const team = document.getElementsByClassName('teams');
const match = document.getElementsByClassName('match');

/**
 * handle hover event on command name
 */
function findTeamMatches() {
    for (let i = 0; i < team.length; i++) {
    team[i].addEventListener('mouseover', function() {
        for (let k = 0; k < match.length; k++) {
            let str = match[k].innerHTML;
            str = str.split(' ');

            if (str[0] == team[i].innerHTML || str[2] == team[i].innerHTML) {
                match[k].style.background = 'red';
                team[i].addEventListener('mouseout', function() {
                    match[k].style.background = '';
                });
            }
        }
    });
}
}

/**
 * script initialization
 */
function init() {
   findTeamMatches();
}

init();