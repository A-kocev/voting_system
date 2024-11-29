$(document).ready(function () {
    $.ajax({
        url: "../../Routes/Api/topVoters.php",
        method: "GET",
        dataType: 'json',
        success: function (response) {
            $.each(response, function (index, value) {
                $('#topVoters').append(`<p><span>${value.voter_name}</span> ->  Times voted: <span>${value.total_votes}</span> </p>`);
            });
        }
    })
    $.ajax({
        url: "../../Routes/Api/winners.php",
        method: "GET",
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $.each(response, function (index, value) {
                $('#winners').append(`<p>Winner in "<span>${value.category_name}</span>" is <span>${value.nominee_name}</span> with <span>${value.total_votes}</span> votes </p>`);
            });
        }
    })
})