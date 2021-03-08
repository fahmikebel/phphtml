const hamburger = document.querySelector(".hamburger");
const navlink = document.querySelector(".nav-link");
const link = document.querySelectorAll(".nav-link li");
const masukan = document.querySelectorAll("input");

hamburger.addEventListener("click", () => {
    navlink.classList.toggle("open");
    link.forEach(link => {
        link.classList.toggle("fade");
    })
});

document.getElementById("login").addEventListener("click", function () {
    document.querySelector(".popup").style.display = "flex";
})

document.querySelector(".close").addEventListener("click", function () {
    document.querySelector(".popup").style.display = "none";
    masukan.forEach(input => input.value = "")

})

function fungsihide() {
    var x = document.getElementById("inpw");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");

    if (x.type === 'password') {
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
    } else {
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
    }
}