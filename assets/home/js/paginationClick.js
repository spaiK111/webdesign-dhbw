document.addEventListener('DOMContentLoaded', () => {
    const paginationItems = document.querySelectorAll('.pagination2 li');

    paginationItems.forEach(item => {
        item.addEventListener('click', function() {
            // Entferne die 'active' Klasse von allen 'li' Elementen
            paginationItems.forEach(el => el.querySelector('a').classList.remove('active'));

            // Füge die 'active' Klasse zum angeklickten 'li' Element hinzu
            this.querySelector('a').classList.add('active');
        });
    });
});
