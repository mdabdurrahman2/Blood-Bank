function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");

  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "inline-block";
    hide_eye.style.display = "none";
  } else {
    x.type = "password";
    show_eye.style.display = "none";
    hide_eye.style.display = "inline-block";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");

  show_eye.style.display = "none";
  hide_eye.style.display = "inline-block";
});

function fetchDonors() {
  var selectedCity = $("#city").val();
  var selectedblood = $("#blood_group").val();

  $.ajax({
    url: "donor.php", 
    type: "POST",
    data: { city: selectedCity, blood_group:selectedblood },
    success: function (data) {
      $("#donorsContainer").html(data);
    },
    error: function () {
      alert("Error fetching data");
    },
  });
}
