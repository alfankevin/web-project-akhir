const signin = document.getElementById("signin");
const signup = document.getElementById("signup");
const forgot = document.getElementById("forgot");
const newest = document.getElementById("newest");
const popular = document.getElementById("popular");
const featured = document.getElementById("featured");

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
    featured.classList.add("checked__tabs");
    popular.classList.remove("checked__tabs");
    newest.classList.remove("checked__tabs");
}

function pop() {
    popular.classList.add("checked__tabs");
    featured.classList.remove("checked__tabs");
    newest.classList.remove("checked__tabs");
}

function news() {
    newest.classList.add("checked__tabs");
    featured.classList.remove("checked__tabs");
    popular.classList.remove("checked__tabs");
}