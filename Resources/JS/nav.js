import * as functions from './functions.js';
$(document).ready(function () {
    if (localStorage.getItem("name")) {
        functions.logged();
    } else {
        functions.notLogged();
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
    $("#signUpForm").submit(function (e) {
        if ($("#password").val().length < 8) {
            e.preventDefault();
            $("#passwordMsg").html(
                '<p class="text-danger">Please enter password with minimal 8 characters</p>'
            );
            $("#password").removeClass("mb-3");
        }
    });
    // logout btn
    $("#logOutBtn").click(functions.logOut);
});
  // checking if a user is logged
  if (localStorage.getItem("name")) {
    functions.logged();
    if (location.search.includes("logged")) {
      history.pushState({}, document.title, location.pathname);
      $(".container #firstRow").before(
        '<p class="position-absolute start-50 translate-middle alert alert-success w-25 text-center opacity-75">You are logged successufully</p>'
      );
      setTimeout(function () {
        $(".alert-success").slideUp();
      }, 2000);
    }
  } else if (location.search) {
    switch (true) {
      case location.search.includes("Already"):
        const signUpModalAlready = new bootstrap.Modal(
          $("#signUpModal")[0]
        );
        signUpModalAlready.show();
        $("#passwordMsg").after(
          `<p class="alert alert-warning">${decodeURIComponent(
            location.search.substring(1)
          )}</p>`
        );
        break;
      case location.search.includes("Wrong"):
        const signInModalWrong = new bootstrap.Modal(
          $("#signInModal")[0]
        );
        signInModalWrong.show();
        $("#passwordSignIn").after(
          `<p class="alert alert-danger">${decodeURIComponent(
            location.search.substring(1)
          )}</p>`
        );
        break;
    }
    functions.notLogged();
  } else {
    functions.notLogged();
  }
// Addiotional functions and eventlisteners
$("#closeSignUpBtn,#closeSignInBtn, .btn-close").click(function () {
    history.pushState({}, document.title, location.pathname);
  });
  $("#closeSignUpBtn, #signUpModal .btn-close , #signInText").click(
    function () {
      if ($("#signUpModal .alert-warning").length) {
        $("#signUpModal .alert-warning").remove();
      }
    }
  );
  $("#closeSignInBtn, #signInModal .btn-close , #signUpText").click(
    function () {
      if ($("#signInModal .alert-danger").length) {
        $("#signInModal .alert-danger").remove();
      }
    }
  );

