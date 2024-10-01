<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Propelrr Question 11</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css" integrity="sha384-b+3kCkBF7JElwswpAsmVFMmrPhoYrpI5w68/JyidGsEYjaPuo0WDeg5Hx6YXxZqs" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styles.css" />
    <meta name="description" content="" />
    <meta name="theme-color" content="#fafafa" />
</head>
    <div class="container">
        <h1>Profile</h1>
        <div class="alert alert-danger d-none" id="redAlert"></div>
        <div class="alert alert-success d-none" id="greenAlert"></div>
        <form id="profileForm">
            <div class=" row mb-3">
                <label for="fullNameField" class="col-2 col-form-label">Full Name</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="fullNameField" />
                    <div class="valid-feedback">Valid full name</div>
                    <div class="invalid-feedback">Please enter full name</div>
                </div>
            </div>
            <div class=" row mb-3">
                <label for="emailField" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input type="email" class="form-control" id="emailField" />
                    <div class="valid-feedback">Valid email</div>
                    <div class="invalid-feedback">Please enter valid email</div>
                </div>
            </div>
            <div class=" row mb-3">
                <label for="phoneNumberField" class="col-2 col-form-label">Phone Number</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="phoneNumberField" />
                    <div class="valid-feedback">Valid phone number</div>
                    <div class="invalid-feedback">Please enter valid phone number</div>
                </div>
            </div>
            <div class=" row mb-3">
                <label for="birthDateField" class="col-2 col-form-label">Birth Date</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="birthDateField" />
                    <div class="valid-feedback">Valid birth date</div>
                    <div class="invalid-feedback">Please enter birth date</div>
                </div>
            </div>
            <div class=" row mb-3">
                <label for="ageField" class="col-2 col-form-label">Age</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="ageField" readonly />
                    <div class="valid-feedback">Valid age</div>
                    <div class="invalid-feedback">Please enter birth date</div>
                </div>
            </div>
            <div class=" row mb-3">
                <label for="genderField" class="col-2 col-form-label">Gender</label>
                <div class="col-10">
                    <select class="form-select" id="genderField">
                        <option selected value="">Please select gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <div class="valid-feedback">Valid gender</div>
                    <div class="invalid-feedback">Please select gender</div>
                </div>
            </div>
            <div class=" row mb-3">
                <div class="col-10 offset-2">
                    <button class="btn btn-primary btn-block" id="submitButton" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
<body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha384-1H217gwSVyLSIfaLxHbE7dRb3v4mYCKbpQvzx0cegeju1MVsGrX5xXxAvs/HgeFs" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.min.js" integrity="sha384-8EM386r8XMMzwGPUxfGNr6c1wIOYnPQBJ6VFxzKCZeklpQarHoZGB40kdNDA3gYr" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>