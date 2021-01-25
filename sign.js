var pass1 = document.querySelectorAll(".sign-up-htm .group #pass1");
var pass2 = document.querySelectorAll(".sign-up-htm .group #pass2");
var Submit = document.querySelectorAll(".sign .group1 .btn");
var passinput = document.querySelectorAll(".sign-up-htm .group #pass2");

console.log(Submit);
Submit[0].addEventListener("click", () => {
 
    if (pass1[0].value !== pass2[0].value) {
        passinput[0].setCustomValidity("Check Password Again");
        console.log(passinput[0]);
        console.log("t");
    } else {
        passinput[0].setCustomValidity("");
        console.log("f");
    }
});