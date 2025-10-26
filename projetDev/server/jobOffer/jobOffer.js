$(document).ready(function () {
    let alert = document.getElementById("jobOffer-alert");
    $('#jobOffer').submit(function (e) {
        e.preventDefault(); // Prevent default form submission
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'), // URL from form's action attribute
            data: $(this).serialize(), // Serialize form data
            success: function (response, status, xhr) {
                // Handle response from the server
                console.log(response);
                if (response === "0") {
                    alert.style = "display: block !important;"
                    alert.classList.remove("alert-warning")
                    alert.classList.add("alert-success")
                    alert.innerHTML = "published"

                } else {
                    alert.style = "display: block !important;"
                    alert.classList.remove("alert-success")
                    alert.classList.add("alert-warning")
                    alert.innerHTML = "something went wrong"
                }

            },
            error: function (xhr, status, error) {
                // Handle errors
                console.error(error);
            }
        });

    });
});