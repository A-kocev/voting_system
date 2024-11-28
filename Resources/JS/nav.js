$(document).ready(function () {
    if (localStorage.getItem("name")) {
        logged();
    } else {
        notLogged();
    }
    // handling the Sign in
    $("#signInForm").on("input", function () {
        if (
            $("#emailSignIn").val() != "" &&
            $("#passwordSignIn").val().length >= 8
        ) {
            $("#signInBtn")[0].disabled = false;
        } else {
            $("#signInBtn")[0].disabled = true;
        }
    });
    // handling the Sign up
    $("#signUpForm").on("input", function () {
        if (
            $("#email").val() != "" &&
            $("#password").val().length >= 8 && $('#name').val() != ""
        ) {
            $("#signUpBtn")[0].disabled = false;
        } else {
            $("#signUpBtn")[0].disabled = true;
        }
    });
});
function logged() {
    $("#userLog").html(
        `<p class="text-primary d-inline-block mx-2 text-capitalize mb-0">${localStorage.getItem(
            "name"
        )} ${localStorage.getItem(
            "lastName"
        )}</p><button class="btn btn-outline-primary mx-2" onclick="logOut()">Log out</button>`
    );
}
function notLogged() {
    $("#userLog").html(`<button
              class="btn  mx-2 btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#signUpModal"
            >
              Sign Up
            </button>
            <button
              class="btn  mx-2 btn-outline-primary"
              data-bs-toggle="modal"
              data-bs-target="#signInModal"
            >
              Sign In
            </button>`);
}
console.log('ace');

