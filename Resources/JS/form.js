$(document).ready(function () {
    // Getting all the users
    $.ajax({
        url: "../../Routes/Api/users.php",
        method: "GET",
        dataType: "json",
        data: {
            userId: localStorage.getItem("userId"),
        },
        success: function (response) {
            $.each(response, function (index, value) {
                $('#userSelect').append(`<option value="${value.id}">${value.name}</option>`);
            })
        }
    })
    // Getting all the categories
    $.ajax({
        url: "../../Routes/Api/categories.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            $.each(response, function (index, value) {
                $('#categories').append(`<div class="form-check">
                <input class="form-check-input" type="checkbox" value="${value.id}" id="${value.id}" name="categories[]">
                <label class="form-check-label" for="${value.id}">
                     ${value.name}
                 </label>
             </div>`)
            });
        }
    })
    // adding the voter id
    $('#voter').val(localStorage.getItem("userId"));

    // making sure at least one of the categories is selected
    $('#voteForm').on('submit', function (e) {
        const checkboxes = $('input[name="categories[]"]:checked');
        if (checkboxes.length === 0) {
            e.preventDefault();
            $('#categoriesError').html('At least one cateogory is required');
        }
    })
})