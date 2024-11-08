const carBlog = document.getElementById('new-blog-car');
const stats = document.getElementById('stats');
const blog = document.getElementById('new-blog');
const dashboard = document.getElementById('dashboard');

document.addEventListener('DOMContentLoaded', async () => {

    carBlog.addEventListener('click', function () {
        divTable.style.display = 'none';
        tableData.style.display = 'none';
        inputFields.style.display = 'none';
        blogNew.style.display = 'block';
        statsBlock.style.display = 'none';
    }) 
    
    stats.addEventListener('click', function () {
        divTable.style.display = 'none';
        tableData.style.display = 'none';
        inputFields.style.display = 'none';
        blogNew.style.display = 'none';
        statsBlock.style.display = 'block';
        statsBlock.style.width = '800px';
        statsBlock.style.height = '400px';
    })
    
    
    blog.addEventListener('click', function () {
        divTable.style.display = 'none';
        tableData.style.display = 'none';
        inputFields.style.display = 'block';
        blogNew.style.display = 'none';
        statsBlock.style.display = 'none';
        }
    )
    
    dashboard.addEventListener('click', function () {
        divTable.style.display = 'grid';
        tableData.style.display = 'flex';
        inputFields.style.display = 'none';
        blogNew.style.display = 'none';
        statsBlock.style.display = 'none';
    })

})