statuss = false;
$(document).ready(function () {
    $('#client-form').submit(function (e) {
        e.preventDefault(); // Prevent default form submission
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'), // URL from form's action attribute
            data: $(this).serialize(), // Serialize form data
            success: function (response, status, xhr) {
                // Handle response from the server
                if (response === "0") {
                    document.getElementById("client_alert").style = "display: none !important;"
                    document.getElementById("client_alert").innerHTML = ""
                    setTimeout(function() {
                        window.location.href = "./profCand.php";
                    },700);

                } else if (response === "1") {
                    document.getElementById("client_alert").style = "display: block !important;"
                    document.getElementById("client_alert").innerHTML = "Password incorrect"
                } else if (response === "2") {
                    document.getElementById("client_alert").style = "display: block !important;"
                    document.getElementById("client_alert").innerHTML = "User not found"
                }else{
                    console.log(response)
                    console.log(xhr.status);
                    console.log("erorrrrrrrrrrrrrrr")
                }
                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth' // Optional: adds smooth scrolling behavior
                });

            },
            error: function (xhr, status, error) {
                // Handle errors
                console.error(error);
            }
        });

    });
    $('#HR-form').submit(function (e) {
        e.preventDefault(); // Prevent default form submission
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'), // URL from form's action attribute
            data: $(this).serialize(), // Serialize form data
            success: function (response) {
                // Handle response from the server
                console.log(response);
                if (response === "0") {
                    document.getElementById("HR_alert").style = "display: none !important;"
                    document.getElementById("HR_alert").innerHTML = ""
                    setTimeout(function() {
                        window.location.href = "./profRH.php";
                    },700);
                } else if (response === "1") {
                    document.getElementById("HR_alert").style = "display: block !important;"
                    document.getElementById("HR_alert").innerHTML = "Password incorrect"
                } else if (response === "2") {
                    document.getElementById("HR_alert").style = "display: block !important;"
                    document.getElementById("HR_alert").innerHTML = "User not found"
                }else{
                    console.log(response)
                    console.log(xhr.status);
                    console.log("erorrrrrrrrrrrrrrr")
                }
                console.log("logged in : well")
            },
            error: function (xhr, status, error) {
                // Handle errors
                console.error(error);
            }
        });
    });
});
