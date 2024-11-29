<?php include "partials/header.php"; ?>
<main>
    <div class="container mt-5">
        <div class="row pt-3"  id="firstRow">
            <div class="col-8 pe-5">
                <h1 class="text-center mb-5">Elections <?= date("Y") ?></h1>

                <div class="row">
                    <div class="col-6">
                        <img src="../../Images/election.jpg" alt="election_image" class="img-fluid pr-5">
                    </div>
                    <div class="col-6   ">
                        <h2 id="votingStart" class="text-center"></h2>
                        <p class="fs-5" id="voteMsg"></p>
                        <div id="authMsg" class="mt-3 text-center alert alert-warning" style="display:none;">you need to be signed in to vote!</div>
                        <button class="btn btn-primary px-3 btn-lg" id="voteBtn">Vote</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <h2 class="text center">Results of the last voting</h2>
            </div>
        </div>
    </div>
</main>
<?php include "partials/footer.php"; ?>