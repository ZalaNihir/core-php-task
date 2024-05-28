$(document).ready(function() {
    readrecord();
});
//View Record
function readrecord() {
    $.ajax({
        url: "display.php",
        type: "POST",
        success: function(data) {
            $("#records").html(data);
        }
    })
}

//Insert record
$("#addRecord").on("click", function() {
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var email = $("#email").val();

    $.ajax({
        // where to send data
        url: "insert.php",
        // when submit form how data pass by default GET
        type: "POST",
        //send data to php file
        data: {
            firstname: fname,
            lastname: lname,
            email: email
        },
        success: function(data) {
            readrecord();
            if (data == "Not insert") {
                alert('Add value to insert data');
            }
        }
    })
});

//Delete record
function deleterecord(deleteid) {
    var conf = confirm("Are you sure");
    if (conf == true) {
        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {
                id: deleteid
            },
            success: function(data) {
                if (data == 1) {
                    readrecord();
                } else {
                    alert('Something went wrong!');
                }
            }
        })
    }
}

//Edit record
function editrecord(id) {
    $("#hiddenid").val(id);
    $.post("edit.php", {
        id: id
    }, function(data) {
        var rec = JSON.parse(data);
        $("#update_fname").val(rec.fname);
        $("#update_lname").val(rec.lname);
        $("#update_email").val(rec.email);
    })
    $("#updateModal").modal("show");
}

//Update record
$("#updateRecord").click(function() {
    var id = $("#hiddenid").val();
    var fname = $("#update_fname").val();
    var lname = $("#update_lname").val();
    var email = $("#update_email").val();

    $.post("update.php", {
            id: id,
            firstname: fname,
            lastname: lname,
            email: email
        },
        function(data) {
            $("#updateModal").modal("hide");
            readrecord();
        }
    )
});

        