<!doctype html>
<html lang="en">

<head>
    <title>PHP AJAX CRUD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        th,td{
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container ">
        <h1 class="text-primary text-center">AJAX CRUD OPERATION</h1>
        <!-- Modal trigger button -->
        <div class="d-flex  justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRec">
                Add Record
            </button>
        </div>
        
        <h2 class="text-danger">All Records</h2>
        <!-- For Displaying Records -->
        <div id="records"></div>

        <!-- Insert Modal -->
        <div class="modal fade" id="addRec" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">ADD RECORD</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" placeholder="Enter first name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" placeholder=" Enter last name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Enter email" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="addRecord">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">ADD RECORD</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="hiddenid" class="form-control">
                        <div class="form-group">
                            <label for="update_fname">First Name</label>
                            <input type="text" id="update_fname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="update_lname">Last Name</label>
                            <input type="text" id="update_lname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="update_email">Email</label>
                            <input type="email" id="update_email" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="updateRecord">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- AJAX JS -->
    <script src="ajax.js"></script>
</body>

</html>