<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="Website Icon" type="png" href="../../Images/logo.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script
      src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
      crossorigin="anonymous"
    ></script>
</head>
<body>
    <header>
        <div class="container-fluid p-0">
            <nav class="navbar e bg-primary-subtle py-3 px-2    ">
                <div class="container-fluid d-flex justify-content-between">
                    <div>
                        <a class="navbar-brand fs-3 text-dark fw-semibold" href="#">Pabau voting system</a>
                    </div>
                    <div id="userLog" class="d-flex align-items-center"></div>
                </div>
            </nav>
        </div>
        <?php
        include("./partials/signUpModal.html");
        include("./partials/signInModal.html");
        ?>
    </header>