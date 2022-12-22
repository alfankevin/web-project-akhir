const signin = document.getElementById("signin");
const signup = document.getElementById("signup");
const forgot = document.getElementById("forgot");
const newest = document.getElementById("newest");
const popular = document.getElementById("popular");
const featured = document.getElementById("featured");
const newbtn = document.getElementById("newbtn");
const popbtn = document.getElementById("popbtn");
const featbtn = document.getElementById("featbtn");
const comment = document.getElementById("comment");
const review = document.getElementById("review");
const combtn = document.getElementById("combtn");
const revbtn = document.getElementById("revbtn");
var navbar = document.getElementById("navbar__details");

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
    if(prevScrollpos > currentScrollPos) {
        navbar.style.top = "0";
    } else {
        navbar.style.top = "-100px";
    }
    prevScrollpos = currentScrollPos;
}

function login() {
    signin.style.display = "unset";
    signup.style.display = "none";
}

function regist() {
    signup.style.display = "unset";
    signin.style.display = "none";
}

function forget() {
    forgot.style.display = "unset";
    signin.style.display = "none";
}

function exit() {
    signin.style.display = "none";
    signup.style.display = "none";
    forgot.style.display = "none";
}

function back() {
    forgot.style.display = "none";
    signin.style.display = "unset";
}

function feat() {
    featbtn.classList.add("checked__tabs");
    popbtn.classList.remove("checked__tabs");
    newbtn.classList.remove("checked__tabs");
    featured.style.display = "unset";
    popular.style.display = "none";
    newest.style.display = "none";
}

function pop() {
    popbtn.classList.add("checked__tabs");
    featbtn.classList.remove("checked__tabs");
    newbtn.classList.remove("checked__tabs");
    popular.style.display = "unset";
    featured.style.display = "none";
    newest.style.display = "none";
}

function news() {
    newbtn.classList.add("checked__tabs");
    featbtn.classList.remove("checked__tabs");
    popbtn.classList.remove("checked__tabs");
    newest.style.display = "unset";
    featured.style.display = "none";
    popular.style.display = "none";
}

function com() {
    combtn.classList.add("title__active");
    revbtn.classList.remove("title__active");
    comment.style.display = "unset";
    review.style.display = "none";
}

function rev() {
    revbtn.classList.add("title__active");
    combtn.classList.remove("title__active");
    review.style.display = "unset";
    comment.style.display = "none";
}