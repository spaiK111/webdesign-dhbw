const allSideMenu = document.querySelectorAll('.sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});

function updateSpanContent() {
    if (sidebar.classList.contains('hide')) {
        span.innerHTML = 'C'; // Replace with the desired content
		console.log("test1")
    } else {
        span.innerHTML = 'CarBlog'; // Replace with the original content
		console.log("test2")
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