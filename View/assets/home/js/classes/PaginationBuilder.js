export class PaginationBuilder {
    
    async getPagesCount() {
        try {
            const req = await fetch('http://localhost:5000/api/posts/count');
            const data = await req.json(); // Antwort in JSON umwandeln
            const count = data.count; // Auf das count-Feld zugreifen
            return Math.ceil(parseFloat(count) / 5); 
            
        } catch (error) {
            console.error('Error fetching pagination:', error);
        }
    }

    async buildPagination(count){
        const pageCount = await this.getPagesCount();
        const pagination = document.getElementById('pagination');
        const nextLi = document.createElement('li');
        const nextA = document.createElement('a');
        nextA.classList.add('bb')
        nextA.href = '#';
        nextA.id = 'back';
        nextA.textContent = '<';
        nextLi.appendChild(nextA);
        pagination.appendChild(nextLi);

        for (let i = 1; i <= pageCount; i++) {
            const li = document.createElement('li');
            const a = document.createElement('a');
            i == 1 ? a.classList.add('active') : null;
            a.classList.add(`page`);
            a.classList.add(`page_${i}`);
            a.href = '#';
            a.textContent = i;
            li.appendChild(a);
            pagination.appendChild(li);
        }

        const prevLi = document.createElement('li');
        const prevA = document.createElement('a');
        prevA.classList.add('ff');
        prevA.href = '#';
        prevA.id = 'forward';
        prevA.textContent = '>';
        prevLi.appendChild(prevA);
        pagination.appendChild(prevLi);
    }

    async setActivePage(pageNumber){
        const paginationItems = document.querySelectorAll('.pagination2 li');

                paginationItems.forEach(el => {
                    const pageLink = el.querySelector('a.page');
                    if (pageLink) {
                        pageLink.classList.remove('active');
                    }
                });

                const activePage = document.querySelector(`a.page.page_${pageNumber}`);

                if (activePage) {
                    activePage.classList.add('active');
                }
    }

    async changeActivePage(){
        const paginationItems = document.querySelectorAll('.pagination2 li');
        paginationItems.forEach(item => {
            item.addEventListener('click', function() {

                paginationItems.forEach(el => {
                    const pageLink = el.querySelector('a.page');
                    if (pageLink) {
                        pageLink.classList.remove('active');
                    }

                });

                const clickedLink = this.querySelector('a.page');
                if (clickedLink) {
                    clickedLink.classList.add('active');
                }
                
            });
        })
    }

    
} 