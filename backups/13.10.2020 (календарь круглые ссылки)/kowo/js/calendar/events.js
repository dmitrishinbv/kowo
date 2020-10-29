jQuery(document).ready(function ($) {
    $('#datepicker tbody tr td').off();
});

const data = JSON.parse(eventsData);
let targetNode = null;
document.addEventListener('DOMContentLoaded', function () {
    targetNode = document.querySelector('#datepicker');
    const MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
    const myObserver = new MutationObserver(mutationHandler);
    const obsConfig = {childList: true, characterData: true, attributes: true, subtree: true};
    myObserver.observe(targetNode, obsConfig);
    dataEvents();
});

let noEventTitle = '';
let noEventTitleToday = '';
if (lang === 'ua') {
    noEventTitle = 'немає запланованих подій';
    noEventTitleToday = 'на сьогодні немає запланованих подій';
}
if (lang === 'ru') {
    noEventTitle = 'нет запланированных мероприятий';
    noEventTitleToday = 'на сегодня нет запланированных мероприятий';
}

if (lang === 'en') {
    noEventTitle = 'no scheduled events';
    noEventTitleToday = 'there are no scheduled events for today';
}


function mutationHandler(mutationRecords) {
    mutationRecords.forEach(function () {
        const calendar = document.querySelectorAll('#datepicker .ui-datepicker-header a');
        calendar.forEach(x => {
            x.onclick = function () {
                dataEvents();
            }
        });
    });
}


function dataEvents() {
    jQuery(document).ready(function ($) {
        $('#datepicker tbody tr td').off();
    });
    const calendarCells = document.querySelectorAll('#datepicker tbody tr td a');
    calendarCells.forEach(cell => {
        cell.setAttribute('href', '');
        cell.setAttribute('title', noEventTitle);
    });

    const calendarTodayCell = document.querySelector('#datepicker tbody tr .ui-datepicker-today a');
    if (calendarTodayCell) {
        calendarTodayCell.setAttribute('title', noEventTitleToday);
    }

    data.forEach(event => {
            const date_year = event['date_start'].split('-')[0];
            let date_month = event['date_start'].split('-')[1];
            if (date_month.substr(0, 1) === '0') {
                date_month = date_month.substr(1);
            }
            let day = event['date_start'].split('-')[2];

            if (day.substr(0, 1) === '0') {
                day = day.substr(1);
            }
            setEventLinks(event, date_year, date_month, day);

            if (event['date_finish'] !== '') {
                const date_year = event['date_finish'].split('-')[0];
                let date_month_finish = event['date_finish'].split('-')[1];
                if (date_month_finish.substr(0, 1) === '0') {
                    date_month_finish = date_month_finish.substr(1);
                }
                let day_finish = event['date_finish'].split('-')[2];

                if (day_finish.substr(0, 1) === '0') {
                    day_finish = day_finish.substr(1);
                }

                if (date_month === date_month_finish) {
                    while (Number(day) !== Number(day_finish)) {
                        day = Number(day) + 1;
                        setEventLinks(event, date_year, date_month_finish, day);
                    }
                }
                if (Number(date_month) < Number(date_month_finish)) {
                    const displayMonth = document.querySelectorAll('#datepicker tbody tr td a')[0].parentElement.getAttribute('data-month');
                    let dayEnd = 32;
                    if (Number(displayMonth) + 1 < Number(date_month_finish) &&
                        Number(displayMonth) + 1 >= Number(date_month)) {
                        day = (Number(displayMonth) + 1 === Number(date_month)) ? day : 1;
                        while (day < dayEnd) {
                            setEventLinks(event, date_year, Number(displayMonth) + 1, day);
                            day = Number(day) + 1;
                        }
                    } else if (Number(displayMonth) + 1 === Number(date_month_finish)) {
                        day = 1;
                        dayEnd = Number(day_finish) + 1;
                        while (day < dayEnd) {
                            setEventLinks(event, date_year, Number(displayMonth) + 1, day);
                            day = Number(day) + 1;
                        }
                    }
                }
            }
        }
    )
}

function setEventLinks(event, date_year, date_month, day) {
    const findEl = Array.from(document.querySelectorAll('#datepicker tbody tr ' +
        'td[data-month=' + '"' + --date_month + '"' + '][data-year=' + '"' + date_year + '"' + '] a')).find
    (el => el.textContent === '' + day + '');
    if (findEl) {
        findEl.classList.add('has-event');
        findEl.classList.remove('ui-state-default');
        findEl.href = event['link'];
        findEl.title = event['title'];
    }
}