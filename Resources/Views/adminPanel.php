<?php include "partials/header.php"; ?>
<script>
    if(localStorage.getItem("role") !=1 ){
        location.href="index.php"
    }
</script>
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
                        <h2 id="votingStartAdmin" class="text-center"></h2>
                        <div class="d-flex justify-content-between mt-5 px-5">
                            <button class="btn btn-success" id="adminStart">Start Vote</button>
                            <button class="btn btn-danger" id="adminEnd">End Vote</button>
                        </div>
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