$(document).ready(function() {
    $('#client-form').submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        var formData = new FormData(this); // Create FormData object from the form
        
        // Append file data to FormData object
        var cvFile = $('#cv')[0].files[0]; // Get the file input element
        console.log(cvFile); // Log the file object to check if it's valid
        formData.append('cv', cvFile); // Append the file to FormData

        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'), // URL from form's action attribute
            data: formData, // Use FormData object
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting contentType
            success: function(response) {
                // Handle response from the server
                var clientAlert = document.getElementById("client-alert");
                console.log(response);
                if(response === "0"){
                    clientAlert.style="display:block !important;"
                    clientAlert.classList.remove("alert-warning");
                    // Add the 'alert-success' class
                    clientAlert.classList.add("alert-success");
                    document.getElementById("client-alert-head").innerHTML = "Success";
                    document.getElementById("client-alert-par").innerHTML = "User created successfully";

                    setTimeout(function() {
                        window.location.href = "signin-page.php";
                    },700);

                }else if(response === "1"){
                    clientAlert.style="display:block !important;"
                    clientAlert.classList.remove("alert-success");
                    // Add the 'alert-success' class
                    clientAlert.classList.add("alert-warning");                    
                    document.getElementById("client-alert-head").innerHTML = "Alert!!";
                    document.getElementById("client-alert-par").innerHTML = "Username already used";
                }else if(response === "2"){
                    clientAlert.style="display:block !important;";
                    clientAlert.classList.remove("alert-success");
                    // Add the 'alert-success' class
                    clientAlert.classList.add("alert-warning");                    
                    document.getElementById("client-alert-head").innerHTML = "Alert!!";
                    document.getElementById("client-alert-par").innerHTML = "Email already used";
                }
                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth' // Optional: adds smooth scrolling behavior
                });
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(error);
            }
        });
    });
    $('#HR-form').submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'), // URL from form's action attribute
            data: $(this).serialize(), // Serialize form data
            success: function(response) {
                // Handle response from the server
                console.log(response);
                if(response == "0"){
                    document.getElementById("HR-alert").style="display:block !important;"
                    document.getElementById("HR-alert").classList.remove("alert-warning");
                    document.getElementById("HR-alert").classList.add("alert-success");
                    document.getElementById("HR-alert-head").innerHTML = "Success";
                    document.getElementById("HR-alert-par").innerHTML = "User created successfully";
                    setTimeout(function() {
                        window.location.href = "signin-page.php";
                    },700);
                }else if(response == "1"){
                    document.getElementById("HR-alert").style="display:block !important;"
                    document.getElementById("HR-alert").classList.remove("alert-success");
                    document.getElementById("HR-alert").classList.add("alert-warning");
                    document.getElementById("HR-alert-head").innerHTML = "Alert!!";
                    document.getElementById("HR-alert-par").innerHTML = "Email already used";
                }else if(response == "2"){
                    document.getElementById("HR-alert").style="display:block !important;"
                    document.getElementById("HR-alert").classList.remove("alert-success");
                    document.getElementById("HR-alert").classList.add("alert-warning");
                    document.getElementById("HR-alert-head").innerHTML = "Alert!!";
                    document.getElementById("HR-alert-par").innerHTML = "Societe already exists";
                }
                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth' // Optional: adds smooth scrolling behavior
                });
                
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(error);
            }
        });
    });
});