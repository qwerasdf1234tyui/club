<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iuu.duguilan.mn</title>
    <link rel="stylesheet" type="text/css" href="stylee.css">
    
    <script>
    function validateForm() {
        var studentID = document.forms["registrationForm"]["ocode"].value;
        var regex = /^[a-zA-Z]{2}\d{2}[a-zA-Z]\d{3}$/;
        var errorMessageElement = document.getElementById("studentIDErrorMessage");

        if (!regex.test(studentID)) {
            errorMessageElement.innerText = "Incorrect student ID format. Please check and try again.";
            errorMessageElement.style.display = "block";
            return false;
        } else {
            errorMessageElement.style.display = "none";
        }

        var password = document.forms["registrationForm"]["p"].value;
        var confirmPassword = document.forms["registrationForm"]["cp"].value;

        if (password !== confirmPassword) {
            alert("Password and Confirm Password must match");
            return false;
        }

        // Add additional password strength checks if needed

        return true;
    }

    function confirmCancel() {
        return confirm("Are you sure you want to cancel registration?");
    }
</script>
</head>

<body style="background-color:#BB8FCE;">
    <div class="container">
        <h2>Registration Club</h2>
        <div class="form-container">
            <form name="registrationForm" action="burtgeh2.php" method="post" onsubmit="return validateForm()">
                <div class="input-name">
                    <input type="text" name="cname" placeholder="Club name" class="name">
                </div>

                <div class="input-name">
                    <input type="text" name="location" placeholder="Location" class="name">
                </div>


    

                <div class="input-name">
                    <input type="text" name="phone" placeholder="Phone" class="text-name">
                </div>

                <div class="input-name">
                    <input type="text" name="date" id="cp" placeholder="Date" class="text-name">
                </div>

                <div class="input-name">
                    <input type="text" name="time" id="tim" placeholder="Time" class="text-name">
                </div>

                <div class="input-name">
                    <input type="file" name="image" id="cp" placeholder="Image" class="text-name">
                </div>

                <div class="input-name">
                    <input type="text" name="about" id="cp" placeholder="About" class="text-name">
                </div>

                <div class="input-name">
                    <input type="text" name="text" id="cp" placeholder="Text" class="text-name">
                </div>

                <div class="input-name">
                    <input type="file" name="ac_image" id="cp" placeholder="Activity image" class="text-name">
                </div>

                <div class="input-name">
                    <input type="submit" name="submit" value="Add" class="button">
                    <input type="button" value="Cancel" onclick="location.href='../nomin/admin_home.php';" class="button">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
