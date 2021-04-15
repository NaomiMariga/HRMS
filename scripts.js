// modal functionality 
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})

var home = document.getElementById('nav-home');
var profile = document.getElementById('nav-profile');
var courses = document.getElementById('nav-courses');
//var homeButton = document.getElementById('nav-home-tab');
//var profileButton = document.getElementById('nav-profile-tab');
//var coursesButton = document.getElementById('nav-courses-tab');

function showCourses(){

home.classlist.remove('show');
profile.classlist.remove('show');
courses.classlist.add('show');

}

function showHome() {
	home.classlist.add('show');
	profile.classlist.remove('show');
	courses.classlist.remove('show');
}

function showProfile(){
	home.classlist.remove('show');
	profile.classlist.add('show');
	courses.classlist.remove('show');
}

