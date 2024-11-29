$(document).ready(function () {

    $.ajax({
        url: "../../Routes/Api/election.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            if (response.opened) {
                $('#votingStart').html('The voting is opened');
                $('#voteMsg').html('Show how much you appreciate your coworkers and vote them in some of the categories');
                if (localStorage.getItem("name")) {
                    $('#voteBtn')[0].disabled = false;
                } else {
                    $('#voteBtn')[0].disabled = true;
                }
            } else {
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

    $('#voteBtn').click(function () {
        $('#electionDiv').hide();
        $('#electionForm').show();
    })
    $('#cancelVoteBtn').click(function () {
        $('#electionForm').hide();
        $('#electionDiv').show();
    })
    if (location.search.includes('Vote')) {
        history.pushState({}, document.title, location.pathname);
        $(".container #firstRow").before(
            '<p class="position-absolute start-50 translate-middle alert alert-success w-25 text-center opacity-75">You have voted successufully</p>'
        );
        setTimeout(function () {
            $(".alert-success").slideUp();
        }, 2000);
    }
});