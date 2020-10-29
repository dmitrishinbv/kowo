const elements = document.querySelectorAll('.rule-description');
elements.forEach(x => {
    if (x.innerText === '' && document.body.clientWidth >= 1300) {
        x.previousElementSibling.classList.add('pt-04');
    }

    if (x.innerText === '' && document.body.clientWidth < 1300) {
        x.previousElementSibling.classList.add('pt-02');
    }
});