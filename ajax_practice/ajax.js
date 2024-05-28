$(document).ready(function () {
  display();
});

// View Records
function display() {
  $.ajax({
    url: "display.php",
    type: "POST",
    success: function (view) {
      if (view == "Not") {
        var tab = document.getElementById("tab");
        tab.style.overflowY = "hidden";
        tab.style.overflowX = "hidden";
      } else {
        var tab = document.getElementById("tab");
        $("#tabel_data").html(view);
        tab.style.overflowY = "scroll";
      }
    },
  });
}

//For insert data
$("#submit").click(function () {
  var name = $("#name").val();
  var email = $("#email").val();
  var phone = $("#phone").val();
  var password = $("#password").val();

  if (name !== "" && email !=="" && phone !=="" && password !=="") {
    $.ajax({
      url: "crud.php",
      type: "POST",
      data: { name: name, email: email, phone: phone, password: password },
      success: function (data) {
        if (data == "inserted") {
          $("#msg").html(
            "<h4 align=center style='color:yellow'>Data inserted successfully</h4>"
          );
          display();
          $("#name").val("");
          $("#email").val("");
          $("#phone").val("");
          $("#password").val("");
        } else {
          $("#msg").html("<h4 align=center style='color:red'>Try again!</h4>");
        }
      },
    });
  }
  else{
    $("#name").attr('placeholder', 'Enter Name');
    $("#email").attr('placeholder', 'Enter Email');
    $("#phone").attr('placeholder', 'Enter Phone');
    $("#password").attr('placeholder', 'Enter Password');
  }
});

// For delete
function deleterecord(deleteid) {
  var conf = confirm("Are you sure");
  if (conf == true) {
    $.ajax({
      url: "crud.php",
      type: "POST",
      data: { delid: deleteid },
      success: function (del) {
        if (del == "delete") {
          $("#msg").html(
            "<h4 align=center style='color:red'>Record Deleted!</h4>"
          );
          display();
        } else {
          $("#msg").html("<h4 align=center style='color:red'>Try again!</h4>");
        }
      },
    });
  }
}

//For Edit record
function editrecord(updateid) {
  var id = $("#id").val(updateid);
  $.ajax({
    url: "crud.php",
    type: "POST",
    data: { edit: updateid },
    success: function (data) {
      $("#modal-body").html(data);
    },
  });
  $("#editmodal").modal("show");
}

//Update Records
$("#updateRecord").click(function () {
  var updateid = $("#update_id").val();
  var updatename = $("#update_name").val();
  var updateemail = $("#update_email").val();
  var updatephone = $("#update_phone").val();
  var updatepassword = $("#update_password").val();

  $.ajax({
    url: "crud.php",
    type: "POST",
    data: {
      updateid: updateid,
      updatename: updatename,
      updateemail: updateemail,
      updatephone: updatephone,
      updatepassword: updatepassword,
    },
    success: function (data) {
      if (data == "update") {
        $("#msg").html(
          "<h4 align=center style='color:yellow'>Record Update successfully</h4>"
        );
      } else {
        $("#msg").html("<h4 align=center style='color:red'>Try again!</h4>");
      }
      display();
    },
  });
});
