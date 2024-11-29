$(document).ready(function () {

    $.ajax({
        url: "../../Routes/Api/election.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            console.log(response.opened);
            if (response.opened) {
                // $('#adminStart')[0].disabled = true;
                // $('#adminEnd')[0].disabled = false;
                $('#votingStart').html('The voting is opened');
                $('#voteMsg').html('Show how much you appreciate your coworkers and vote them in some of the categories');
                if (localStorage.getItem("name")) {
                    $('#voteBtn')[0].disabled = false;
                }else{
                    $('#voteBtn')[0].disabled = true;
                }
            } else {
                // $('#adminStart')[0].disabled = false;
                // $('#adminEnd')[0].disabled = true;
                $('#votingStart').html('The voting is closed');
                $('#voteBtn')[0].disabled = true;
                $('#voteMsg').html('You can vote when your manager starts the voting');
            }

        }
    })
    if (!localStorage.getItem("name")) {
        $("#authMsg").show();
    } else {
        $("#authMsg").hide();

    }
    console.log(localStorage.getItem("role"));
});