document.getElementById("healthReportForm").addEventListener("submit", function(event) {
  event.preventDefault(); 

  var formData = new FormData(this);

  fetch("insert.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    console.log(data);
    alert("YOUR DATA IS SUBMITTED SUCCESSFULLY");
    document.getElementById("healthReportForm").reset();
  .catch(error => {
    console.error("SORRY!!! THE FORM CANNOT BE SUBMITTED", error);
    alert("SORRY!!! THE FORM CANNOT BE SUBMITTED.");
  });
});
