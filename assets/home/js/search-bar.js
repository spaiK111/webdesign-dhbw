function filterBlogItems() {
    const searchValue = document.querySelector('.search-input').value.toLowerCase(); // Hole den Suchwert
    const blogItems = document.querySelectorAll('.blog-item'); // Wähle alle Blogpost-Container aus

    blogItems.forEach(item => {
      const blogTextElement = item.querySelector('.blog-text'); // Wähle das .blog-text-Element innerhalb jedes blog-item
      const blogTextContent = blogTextElement.textContent.toLowerCase(); // Hole den gesamten Textinhalt des blog-text-Elements
      
      // Überprüfe, ob der Suchbegriff im Textinhalt vorhanden ist
      if (blogTextContent.includes(searchValue)) {
        item.style.display = ''; // Zeige den Blogpost an, wenn der Suchbegriff gefunden wurde
      } else {
        item.style.display = 'none'; // Verstecke den Blogpost, wenn der Suchbegriff nicht gefunden wurde
      }
    });
  }

  // Event Listener für die Eingabe im Suchfeld
  document.querySelector('.search-input').addEventListener('input', filterBlogItems);