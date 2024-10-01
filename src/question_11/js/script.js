$(function() {
    function setFieldInvalid(selector)
    {
        $(selector).siblings(".invalid-feedback").css("display", "block");
        $(selector).css("border-color", "#dc3545");
    }

    function setFieldValid(selector)
    {
        $(selector).siblings(".invalid-feedback").css("display", "none");
        $(selector).css("border-color", "#28a745");
    }

    function validatePhoneNumber(phoneNumber)
    {
        let prefixes = ["0817", "0895", "0896", "0897", "0898", "0905", "0906", "0907", "0908", "0909", "0910", "0912", "0915", "0916", "0917", "0918", "0919", "0920", "0921", "0922", "0923", "0924", "0925", "0926", "0927", "0928", "0929", "0930", "0931", "0932", "0933", "0934", "0935", "0936", "0937", "0938", "0939", "0940", "0941", "0942", "0943", "0945", "0946", "0947", "0948", "0949", "0950", "0951", "0953", "0954", "0955", "0956", "0961", "0965", "0966", "0967", "0973", "0974", "0975", "0976", "0977", "0978", "0979", "0991", "0992", "0993", "0994", "0995", "0996", "0997", "0998", "0999"];
        let isPrefixValid = [];
        let isPhoneNumberValid = [];
        let prefixLess = "";

        prefixes.forEach(prefix => {
            if (phoneNumber.startsWith(prefix)) {
                prefixLess = phoneNumber.substring(prefix.length, phoneNumber.length + prefix.length + 1);
                isPrefixValid.push(true);
            } else {
                isPrefixValid.push(false);
            }
        });

        if (isPrefixValid.includes(true)) {
            if (!isNaN(prefixLess) && !isNaN(parseFloat(prefixLess) && prefixLess.length == 7)) {
                isPhoneNumberValid.push(true);
            } else {
                isPhoneNumberValid.push(false);
            }
        } else {
            isPhoneNumberValid.push(false);
        }

        return isPhoneNumberValid.includes(true);
    }

    $("#birthDateField").datepicker({
        "dateFormat": "yy-mm-dd",
        "changeYear": true,
        "yearRange": "1964:2024",
        "onSelect": function (date) {
            let currentTimestamp = Date.now();
            let birthDateTimestamp = new Date(date).valueOf();
            let timestampDiff = (currentTimestamp - birthDateTimestamp) / 1000;
            timestampDiff = timestampDiff / 86400;
            $("#ageField").val(Math.abs(Math.round(timestampDiff / 365)));
        }
    });

    $("#profileForm").submit(function (e) {
        e.preventDefault();
        let isFormValid = [];

        if (!$("#fullNameField").val()) {
            isFormValid.push(false);
            setFieldInvalid("#fullNameField");
        } else {
            isFormValid.push(true);
            setFieldValid("#fullNameField");
        }

        if (!$("#emailField").val()) {
            isFormValid.push(false);
            setFieldInvalid("#emailField");
        } else {
            let emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

            if ($("#emailField").val().match(emailRegex)) {
                isFormValid.push(true);
                setFieldValid("#emailField");
            } else {
                isFormValid.push(false);
                setFieldInvalid("#emailField");
            }
        }

        if (!$("#phoneNumberField").val()) {
            isFormValid.push(false);
            setFieldInvalid("#phoneNumberField");
        } else {
            isFormValid.push(true);

            if (validatePhoneNumber($("#phoneNumberField").val())) {
                isFormValid.push(true);
                setFieldValid("#phoneNumberField");
            } else {
                isFormValid.push(false);
                setFieldInvalid("#phoneNumberField");
            }
        }

        if (!$("#birthDateField").val()) {
            isFormValid.push(false);
            setFieldInvalid("#birthDateField");
        } else {
            isFormValid.push(true);
            setFieldValid("#birthDateField");
        }

        if (!$("#ageField").val()) {
            isFormValid.push(false);
            setFieldInvalid("#ageField");
        } else {
            isFormValid.push(true);
            setFieldValid("#ageField");
        }

        if (!$("#genderField").val()) {
            isFormValid.push(false);
            setFieldInvalid("#genderField");
        } else {
            isFormValid.push(true);
            setFieldValid("#genderField");
        }
        
        if (isFormValid.includes(false)) {
            return false;
        } else {
            $.ajax({
                "type": "POST",
                "url": "ajax.php",
                "data": {
                    "full_name": $("#fullNameField").val(),
                    "email": $("#emailField").val(),
                    "phone_number": $("#phoneNumberField").val(),
                    "birth_date": $("#birthDateField").val(),
                    "age": $("#ageField").val(),
                    "gender": $("#genderField").val()
                },
                "success": function(data) {
                    if (data.status == 200) {
                        $("#greenAlert").text(data.messages);
                        $("#greenAlert").removeClass("d-none").addClass("d-block");
                        $("#redAlert").removeClass("d-block").addClass("d-none");
                    }
                },
                "error": function(data) {
                    if (data.status == 400 || data.status == 500) {
                        $("#greenAlert").text(data.messages);
                        $("#greenAlert").removeClass("d-block").addClass("d-none");
                        $("#redAlert").removeClass("d-none").addClass("d-block");
                    }
                }
            });
        }
    });
});