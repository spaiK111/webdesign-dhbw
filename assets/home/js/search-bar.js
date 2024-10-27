function filterBlogItems() {
    const searchValue = document.querySelector('.search-input').value.toLowerCase(); 
    const blogItems = document.querySelectorAll('.blog-item');

    blogItems.forEach(item => {
      const blogTextElement = item.querySelector('.blog-text'); 
      const blogTextContent = blogTextElement.textContent.toLowerCase(); 
      

      if (blogTextContent.includes(searchValue)) {
        item.style.display = '';
      } else {
        item.style.display = 'none'; 
      }
    });
  }

  document.querySelector('.search-input').addEventListener('input', filterBlogItems);