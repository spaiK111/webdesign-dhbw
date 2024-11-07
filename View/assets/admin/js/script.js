const allSideMenu = document.querySelectorAll('.sidebar .side-menu.top li a');
const config = document.getElementById('config');
const stats = document.getElementById('stats');
const blog = document.getElementById('new-blog');
const dashboard = document.getElementById('dashboard');
const divTable = document.querySelector('ul#box-info.box-info');
const tableData = document.querySelector('div#table-data.table-data');

const logOut = document.getElementById('log-out');

// Stats
const statsBlock = document.querySelector('div.statistics');

const carBlog = document.getElementById('new-blog-car');

const inputFields = document.querySelector('div.input-fields');

const blogNew = document.getElementById('new-blog-new');

const activeLink = document.querySelector('.breadcrumb .active');
const headingMain = document.querySelector('.left h1');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
			
		})
		li.classList.add('active');
	})
});

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

logOut.addEventListener('click', function () {
	emptyCookie('login');
	emptyCookie('password');
	window.location.href = 'http://localhost:3000/View/index.php';
	alert('Sie wurden erfolgreich ausgeloggt!');
})

function emptyCookie(name) {
	document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}


allSideMenu.forEach(item=> {
	item.addEventListener('click', function () {
		activeLink.innerHTML = item.innerHTML;
		headingMain.innerHTML = item.innerHTML;
	})
});


function updateSpanContent() {
    if (sidebar.classList.contains('hide')) {
        span.innerHTML = 'C'; // Replace with the desired content
    } else {
        span.innerHTML = 'CarBlog'; // Replace with the original content
    }
}


// TOGGLE SIDEBAR
const menuBar = document.querySelector('.content nav .bx.bx-menu');
const sidebar = document.querySelector('.sidebar');
const content = document.querySelector('.content');
const span = document.querySelector('.sidebar .brand .text')
console.log(span)

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
	content.classList.toggle('full');
})


const searchButton = document.querySelector('.content nav form .form-input button');
const searchButtonIcon = document.querySelector('.content nav form .form-input button .bx');
const searchForm = document.querySelector('.content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})

menuBar.addEventListener('click', function () {
	updateSpanContent();
})

function toggleSidebar() {
    if (window.innerWidth < 602) {
        sidebar.classList.add('hide');
		content.classList.add('full');
    } else {
        sidebar.classList.remove('hide');
		content.classList.remove('full');
    }
}

updateSpanContent();
toggleSidebar();

window.addEventListener('resize', toggleSidebar);


if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})