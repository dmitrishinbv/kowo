jQuery(document).ready(function ($) {
    $('#datepicker tbody tr td').off();
});

const data = JSON.parse(eventsData);
let targetNode = null;
let eventNumber = 0;
let hiddenBlock = document.createElement('div');
hiddenBlock.classList.add('hidden-block');

document.addEventListener('DOMContentLoaded', function () {
    targetNode = document.querySelector('#datepicker');
    const MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
    const myObserver = new MutationObserver(mutationHandler);
    const obsConfig = {childList: true, characterData: true, attributes: true, subtree: true};
    myObserver.observe(targetNode, obsConfig);
    dataEvents();
    addResponsiveBlockClicks();
});


function mutationHandler(mutationRecords) {
    mutationRecords.forEach(function () {
        const calendar = document.querySelectorAll('#datepicker .ui-datepicker-header a');
        calendar.forEach(x => {
            x.onclick = function () {
                eventNumber = 0;
                dataEvents();
                addResponsiveBlockClicks();
            }
        });
    });
}


function dataEvents() {
    jQuery(document).ready(function ($) {
        $('#datepicker tbody tr td').off();
    });
    let displayMonth = document.querySelectorAll('#datepicker tbody tr td a')[0].parentElement.getAttribute('data-month');
    if (Number(displayMonth) <= 10) {
        displayMonth = '0' + (Number(displayMonth));
    }

    displayMonth = Number(displayMonth) + 1;
    const selectEvents = data.filter(el =>
        el['date_start'].split('-')[1] === displayMonth + '' || el['date_finish'].split('-')[1] === displayMonth + ''
        || (Number(el['date_start'].split('-')[1]) <= Number(displayMonth)
        && (Number(el['date_finish'].split('-')[1]) >= Number(displayMonth)))
    );

    selectEvents.sort(function (a, b) {
        return new Date(a['date_start']) - new Date(b['date_start']);
    });

    let weeks = document.querySelectorAll('#datepicker tbody tr');
    selectEvents.forEach(function (event, eventNumber) {

        let eventMonth = event['date_start'].split('-')[1];
        let eventDay = event['date_start'].split('-')[2];
        const eventTime = event['time'];
        if (eventMonth.substr(0, 1) === '0') {
            eventMonth = eventMonth.substr(1);
        }
        if (eventDay.substr(0, 1) === '0') {
            eventDay = eventDay.substr(1);
        }

        const dayStart = eventDay;

        weeks.forEach(week => {
            const weekDays = week.querySelectorAll('td a');
            weekDays.forEach(function (day, index) {
                if (event['date_finish'] === '' && day.textContent === eventDay) {
                    const eventDayTime = '📆 ' + dayStart + '.' + eventMonth + '\n 🕛 ' + eventTime;
                    addEvent(event, day, eventDayTime, '', '', eventNumber);
                }

                if (event['date_finish'] !== '') {
                    let eventMonthFinish = event['date_finish'].split('-')[1];
                    if (eventMonthFinish.substr(0, 1) === '0') {
                        eventMonthFinish = eventMonthFinish.substr(1);
                    }
                    let eventDayFinish = event['date_finish'].split('-')[2];

                    if (eventDayFinish.substr(0, 1) === '0') {
                        eventDayFinish = eventDayFinish.substr(1);
                    }

                    const eventDayTime = '📆 ' + dayStart + '.' + eventMonth + ' - '
                        + eventDayFinish + '.' + eventMonthFinish + '\n 🕛  ' + eventTime;
                    const calendarDays = document.querySelectorAll('#datepicker tbody tr td a');
                    let startMonth = false;

                    if (eventMonth !== eventMonthFinish) {
                        if (displayMonth <= eventMonthFinish) {
                            if (Number(displayMonth) === Number(eventMonth) &&
                                Number(displayMonth) < Number(eventMonthFinish)) {
                                startMonth = true;
                                eventDayFinish = calendarDays[calendarDays.length - 1].innerText;
                            }
                            if (Number(displayMonth) > Number(eventMonth)
                                && Number(displayMonth) < Number(eventMonthFinish)) {
                                eventDay = 1;
                                eventDayFinish = calendarDays[calendarDays.length - 1].innerText;

                            }
                            if (Number(displayMonth) === Number(eventMonthFinish)) {
                                eventDay = 1;
                            }
                        }
                    }

                    if (day.textContent === eventDay) {
                        if (eventMonth === eventMonthFinish || startMonth) {
                            let eventLengthInDays = Number(eventDayFinish) - Number(eventDay);
                            let cellsLeft = 1;
                            const calendarNextCell = day.parentNode.nextSibling;
                            if (calendarNextCell) {
                                let nextCell = calendarNextCell;
                                while (nextCell.nextSibling) {
                                    nextCell = nextCell.nextSibling;
                                    cellsLeft++;
                                }
                            }
                            addEvent(event, day, eventDayTime, eventLengthInDays, cellsLeft, eventNumber);
                        }
                    }


                    if (Number(day.textContent) <= Number(eventDayFinish) &&
                        Number(day.textContent) >= Number(eventDay)) {
                        const diff = Number(eventDayFinish) - Number(day.textContent);
                        let cellsLeft = 1;
                        const calendarNextCell = day.parentNode.nextSibling;

                        if (calendarNextCell) {
                            let nextCell = calendarNextCell;

                            while (nextCell.nextSibling) {
                                nextCell = nextCell.nextSibling;
                                cellsLeft++;
                            }
                        }

                        if (diff <= 7 && index === 0) {
                            addEvent(event, day, eventDayTime, diff, cellsLeft, eventNumber);
                        }
                        if (diff > 7 && index === 0 && cellsLeft === 6) {
                            addEvent(event, day, eventDayTime, 6, 6, eventNumber);
                        }
                        if (diff > cellsLeft && index === 0 && cellsLeft < 6) {

                            addEvent(event, day, eventDayTime, cellsLeft, cellsLeft, eventNumber);
                        }
                    }
                }
            });
        });
    });

    eventsBlockVerticalPosition();
}


function addEvent(event, day, eventDayTime, eventLengthInDays, cellsLeft, eventNumber) {


    eventNumber = Number(eventNumber) + 1;
    if (eventNumber > 5) {
        eventNumber = 1;
    }

    const eventBlock = document.createElement('div');
    eventBlock.classList.add('event-block');
    eventBlock.classList.add('event-' + eventNumber);
    const link = document.createElement('a');
    link.innerText = event['calendar_title'];
    link.setAttribute('href', event['link']);
    link.setAttribute('target', '_blank');
    eventBlock.appendChild(link);
    addResponsiveList(event, day, day.parentNode, eventNumber, eventDayTime);

    const calendarNextCell = day.parentNode.nextSibling;
    if (eventLengthInDays && calendarNextCell) {
        if (cellsLeft >= eventLengthInDays) {
            const w = calendarNextCell.getBoundingClientRect().width * (eventLengthInDays + 1) - 10;
            eventBlock.style.width = w + 'px';
            window.addEventListener('resize', function () {
                const w = calendarNextCell.getBoundingClientRect().width * (eventLengthInDays + 1) - 10;
                eventBlock.style.width = w + 'px';
            });

            let counter = eventLengthInDays;
            let tableCell = day.parentNode;

            while (counter !== 0) {
                tableCell = tableCell.nextSibling;
                addResponsiveList(event, day, tableCell, eventNumber, eventDayTime);
                counter--;
            }

        } else {
            let counter = cellsLeft;
            let tableCell = day.parentNode;
            while (counter !== 0) {
                tableCell = tableCell.nextSibling;
                addResponsiveList(event, day, tableCell, eventNumber, eventDayTime);
                counter--;
            }

            const w = (calendarNextCell.getBoundingClientRect().width * (cellsLeft + 1)) - 10;
            eventBlock.style.width = w + 'px';
            window.addEventListener('resize', function () {
                const w = (calendarNextCell.getBoundingClientRect().width * (cellsLeft + 1)) - 10;
                eventBlock.style.width = w + 'px';
            });
        }
    }

    const eventDetail = document.createElement('div');
    eventDetail.innerText = event['title'];
    eventDetail.classList.add('event-detail');
    eventDetail.classList.add('hidden');
    eventBlock.addEventListener('mouseover', function () {
        eventDetail.classList.remove('hidden');
        eventDetail.style.width = eventBlock.getBoundingClientRect + 'px';
    });
    eventBlock.addEventListener('mouseout', function () {
        eventDetail.classList.add('hidden');
    });

    const eventDetailText = document.createElement('p');
    eventDetailText.innerText = eventDayTime;
    eventDetail.appendChild(eventDetailText);
    day.parentNode.appendChild(eventBlock);
    day.parentNode.appendChild(eventDetail);
}


function eventsBlockVerticalPosition() {
    const weeks = document.querySelectorAll('#datepicker tbody tr');

    weeks.forEach(week => {
        let containsEvent = false;
        let eventIndex = [];
        let eventBlockList;
        const weekDays = week.querySelectorAll('td a');

        weekDays.forEach(day => {
            if (!containsEvent && day.parentNode.classList.contains('event-block')) {
                eventBlockList = day.parentNode.parentNode.querySelectorAll('.event-block');
                containsEvent = true;
                eventIndex.push(day.parentNode.parentNode.querySelector('a.ui-state-default').innerText);
            }

            if (containsEvent && day.parentNode.classList.contains('event-block')) {
                if (!eventIndex.includes(day.parentNode.parentNode.querySelector('a.ui-state-default').innerText)) {
                    eventIndex.push(day.parentNode.parentNode.querySelector('a.ui-state-default').innerText);
                    let height = 0;
                    eventBlockList.forEach(el => {
                        height += el.offsetHeight;
                    });
                    day.parentNode.style.marginTop = height * 1.55 + 'px';
                    containsEvent = false;
                }
            }
        });
    });
}


function addResponsiveList(event, day, tableCell, eventNumber, eventDayTime) {
    let responsiveEventBlockList = tableCell.querySelector('.responsive-event-block-list');
    if (!responsiveEventBlockList) {
        responsiveEventBlockList = document.createElement('div');
        responsiveEventBlockList.classList.add('responsive-event-block-list');
        day.parentNode.appendChild(responsiveEventBlockList);
    }
    const responsiveEventBlock = document.createElement('div');
    responsiveEventBlock.classList.add('responsive-event-block');
    responsiveEventBlock.classList.add('event-' + eventNumber);
    responsiveEventBlock.setAttribute('color', 'event-' + eventNumber);
    const responsivelink = document.createElement('a');
    responsivelink.setAttribute('data-title', event['calendar_title']);
    responsivelink.setAttribute('data-link', event['link']);
    responsivelink.setAttribute('data-time', eventDayTime);
    responsiveEventBlock.appendChild(responsivelink);
    responsiveEventBlockList.appendChild(responsiveEventBlock);
    tableCell.appendChild(responsiveEventBlockList);
}


function addResponsiveBlockClicks() {
    const responsiveEventBlockList = document.querySelectorAll('#datepicker .ui-datepicker td .responsive-event-block-list');
    responsiveEventBlockList.forEach(x => {
        x.addEventListener('click', function () {
            const anotherList = document.querySelector('.responsive-detail-block');
            if (anotherList) {
                anotherList.remove();
            }
            const detailsBlock = document.createElement('div');
            detailsBlock.classList.add('responsive-detail-block');
            detailsBlock.classList.add('container');
            const eventsList = x.querySelectorAll('.responsive-event-block a');

            eventsList.forEach(el => {
                const detailBlockLink = document.createElement('a');
                detailBlockLink.classList.add(el.parentNode.getAttribute('color'));
                detailBlockLink.setAttribute('href', el.getAttribute('data-link'));
                detailBlockLink.innerText = el.getAttribute('data-title') + '  ' + el.getAttribute('data-time');
                const br = detailBlockLink.querySelector('br');
                if (br) {
                    br.remove();
                }
                detailsBlock.appendChild(detailBlockLink);

            });
            document.querySelector('#datepicker').parentNode.appendChild(detailsBlock);
        })
    });
}


document.onclick = function (e) {
    if (!e.target.closest('#datepicker') && !e.target.closest('.responsive-detail-block')) {
        const block = document.querySelector('.responsive-detail-block');
        if (block) {
            block.remove();
        }
    }
};

window.addEventListener('resize', function () {
    const target = document.querySelector('.responsive-detail-block');
    if (document.body.clientWidth > 980 && target) {
        target.remove();
    }
});