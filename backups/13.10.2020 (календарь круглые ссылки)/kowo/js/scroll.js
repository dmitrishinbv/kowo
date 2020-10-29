jQuery(document).ready(function ($) {
    $('#scrollToTop').click(function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, 1500);
        $('html, body').on("mousewheel", function () {
            $(this).stop();
        });
    });
});


goContacts();

function goContacts() {
    const button = document.querySelector('#scrollToTop');
    button.onclick = function () {
        const target = document.querySelector('#contacts');
        if (target) {
            const topOffset = target.offsetHeight;
            const elementPosition = target.getBoundingClientRect().top;
            const offsetPosition = elementPosition - topOffset;
            window.scrollBy({
                top: offsetPosition,
                behavior: 'smooth'
            });

        } else {
            const host_url = document.querySelector('#site_url').value;
            const part_url = document.location.pathname.split('/');
            const btn = document.querySelectorAll('.menu [href="#contacts"]');
            btn[0].onclick = function () {
                if (part_url.includes('ru')) {
                    window.location.href = host_url + '/ru/#contacts';
                } else if (part_url.includes('en')) {
                    window.location.href = host_url + '/en/#contacts';
                } else {
                    window.location.href = host_url + '/#contacts';
                }
            }
        }
    }
}