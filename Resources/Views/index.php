<?php include "partials/header.php";




?>
<main>
    <div class="container mt-5">
        <div class="row pt-3" id="firstRow">
            <div class="col-8 pe-5">
                <h1 class="text-center mb-5">Elections <?= date("Y") ?></h1>

                <div class="row">
                    <div class="col-6">
                        <img src="../../Images/election.jpg" alt="election_image" class="img-fluid pr-5">
                    </div>
                    <div class="col-6" id="electionDiv">
                    <p class="alert alert-success text-center" style="display:none;" id="successVote">You have voted successufully</p>
                        <h2 id="votingStart" class="text-center"></h2>
                        <p class="fs-5" id="voteMsg"></p>
                        <div id="authMsg" class="mt-3 text-center alert alert-warning" style="display:none;">you need to be signed in to vote!</div>
                        <button class="btn btn-primary px-3 btn-lg" id="voteBtn">Vote</button>
                    </div>
                    <div class="col-6" id="electionForm" style="display:none; ">
                        <form action="../../Routes/Web/vote.php" method="post" id="voteForm">
                            <input type="text" name="voter" id="voter" hidden>
                            <div class="mb-3">
                                <label for="employee" class="form-label">Employee</label>
                                <select class="form-select" id="userSelect" name="nominee" required>
                                    <option value="" selected disabled>Choose an employee</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Choose categories</label>
                                <div id="categories">

                                </div>
                                <p id="categoriesError" class="text-danger"></p>
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea name="comment" id="comment" class="form-control" required></textarea>
                            </div>
                            <button class="btn btn-danger me-3" id="cancelVoteBtn" type="button">Cancel</button>
                            <button class="btn btn-primary" id="submitVoteBtn" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <h2 class="text center">Results of the last voting</h2>
                <h3 class="text-primary">Top Voters</h3>
                <div id="topVoters"></div>
                <h3 class="text-primary">Winners in each category</h3>
                <div id="winners"></div>
            </div>
        </div>
    </div>
</main>
<?php include "partials/footer.php"; ?>