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

    async buildPagination(){
        const pageCount = await this.getPagesCount();
        const pagination = document.getElementById('pagination');
        
        for (let i = 1; i <= pageCount; i++) {
            const li = document.createElement('li');
            const a = document.createElement('a');
            i == 1 ? a.classList.add('active') : null;
            a.href = '#';
            a.textContent = i;
            li.appendChild(a);
            pagination.appendChild(li);
        }
    }

    async changeActivePage(){
        const paginationItems = document.querySelectorAll('.pagination2 li');
        paginationItems.forEach(item => {
            item.addEventListener('click', function() {

                



                paginationItems.forEach(el => el.querySelector('a').classList.remove('active'));
                this.querySelector('a').classList.add('active');
            });
        })
    }

    
}