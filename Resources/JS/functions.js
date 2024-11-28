export function logged() {
    $("#userLog").html(
        `<p class="text-primary d-inline-block mx-2 text-capitalize mb-0">${localStorage.getItem(
            "name"
        )}</p><button class="btn btn-outline-primary mx-2" id="logOutBtn">Log out</button>`
    );
}
export function notLogged() {
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
export function logOut() {
  localStorage.clear();
  history.pushState({}, document.title, window.location.pathname);
  location.reload();
}
