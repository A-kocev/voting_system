$(document).ready(function () {

    $.ajax({
        url: "../../Routes/Api/election.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            console.log(response.opened);
            if (response.opened) {
                $('#adminStart')[0].disabled = true;
                $('#adminEnd')[0].disabled = false;
                $('#votingStartAdmin').html('The voting is opened');
            } else {
                $('#votingStartAdmin').html('The voting is closed');
                $('#adminStart')[0].disabled = false;
                $('#adminEnd')[0].disabled = true;
            }

        }
    })
});