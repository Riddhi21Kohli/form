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
    alert("Form submitted successfully!");
    document.getElementById("healthReportForm").reset();
  .catch(error => {
    console.error("An error occurred while submitting the form.", error);
    alert("An error occurred while submitting the form.");
  });
});
