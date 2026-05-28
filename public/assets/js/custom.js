$(document).ready(function() {

    // Initialize validator for ALL forms
    $("form").each(function () {
        $(this).validate({
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorElement: 'div',

            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');

                if (element.closest('.form-group').length) {
                    error.appendTo(element.closest('.form-group'));
                } else {
                    error.insertAfter(element);
                }
            },

            highlight: function (element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },

            unhighlight: function (element) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            }
        });
    });

    $(document).on('click', '.save_ajax_form', function(){
        let btn = $(this);
        let originalText = btn.html();
        let form = btn.closest('form');
        let url = form.attr('action');
        let method = form.attr('method')||'POST';
        let data = new FormData(form[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // ✅ Apply rules BEFORE validation check
        applyValidationRules(form);
        if(!form.valid()) {
            return false; // Stop if form is invalid
        }
        $.ajax({
            url: url,
            method: method,
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function() {    
                btn.prop('disabled', true);
                btn.html(`
                    <span class="spinner-border spinner-border-sm me-2"></span>
                    Please wait...
                `);
            },
            success: function(response) {
                console.log(response);
                if(response.status === true) {
                    toastr.success(response.message);
                    if(response.redirect_url) {
                        window.location.href = response.redirect_url;
                    }
                } else {
                    toastr.error(response.message || 'An error occurred. Please try again.');
                    btn.prop('disabled', false);
                    btn.html(originalText);
                }
            },
            error: function(xhr, status, error) {
                toastr.error('An error occurred. Please try again.');
                btn.prop('disabled', false);
                btn.html(originalText);
            },
            complete: function() {
                btn.prop('disabled', false);
                btn.html(originalText);
            }
        });
    })

    // logout functionality
    $(document).on('click', '.logout_system', function(e){
        e.preventDefault();

        let url = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to logout!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Logout'
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'POST',

                    success: function(response) {
                        
                        if(response.status === true) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                                timer: 1500,
                                showConfirmButton: false
                            });

                            if(response.redirect_url) {
                                setTimeout(() => {
                                    window.location.href = response.redirect_url;
                                }, 1500);
                            }

                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'An error occurred. Please try again.'
                            });

                        }
                    },

                    error: function(xhr, status, error) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred. Please try again.'
                        });

                    }
                });
            }
        });
    });
});

function applyValidationRules(form) {

    form.find('[data-validate]').each(function () {

        let $el = $(this);
        let rules = {};
        let messages = {};

        let types = $el.data('validate').toString().split('|');
        // Example:
        // data-validate="required|email|min-8|max-20|regex-^[a-zA-Z]+$"

        types.forEach(type => {

            // REQUIRED
            if (type === "required") {
                rules.required = true;
                messages.required = "This field is required.";
            }

            // EMAIL
            if (type === "email") {
                rules.email = true;
                messages.email = "Enter a valid email address.";
            }

            // NUMBER (digits only)
            if (type === "number") {
                rules.digits = true;
                messages.digits = "Only digits are allowed.";
            }

            // NUMERIC (decimal allowed)
            if (type === "numeric") {
                rules.number = true;
                messages.number = "Only numeric values allowed.";
            }

            // MIN LENGTH
            if (type.startsWith("min-")) {
                let val = type.split('-')[1];
                rules.minlength = parseInt(val);
                messages.minlength = `Minimum ${val} characters required.`;
            }

            // MAX LENGTH
            if (type.startsWith("max-")) {
                let val = type.split('-')[1];
                rules.maxlength = parseInt(val);
                messages.maxlength = `Maximum ${val} characters allowed.`;
            }

            // EXACT LENGTH
            if (type.startsWith("length-")) {
                let val = type.split('-')[1];
                rules.minlength = parseInt(val);
                rules.maxlength = parseInt(val);
                messages.minlength = `Must be exactly ${val} characters.`;
                messages.maxlength = `Must be exactly ${val} characters.`;
            }

            // MIN VALUE
            if (type.startsWith("minval-")) {
                let val = type.split('-')[1];
                rules.min = parseFloat(val);
                messages.min = `Minimum value is ${val}.`;
            }

            // MAX VALUE
            if (type.startsWith("maxval-")) {
                let val = type.split('-')[1];
                rules.max = parseFloat(val);
                messages.max = `Maximum value is ${val}.`;
            }

            // URL
            if (type === "url") {
                rules.url = true;
                messages.url = "Enter a valid URL.";
            }

            // DATE
            if (type === "date") {
                rules.date = true;
                messages.date = "Enter a valid date.";
            }

            // SELECT DROPDOWN
            if (type === "select") {
                rules.required = true;
                messages.required = "Please select an option.";
            }

            // FILE EXTENSION
            if (type.startsWith("ext-")) {
                let val = type.split('-')[1]; // jpg,png,pdf
                rules.extension = val;
                messages.extension = `Allowed file types: ${val}`;
            }

            // REGEX (CUSTOM)
            if (type.startsWith("regex-")) {
                let pattern = type.replace('regex-', '');
                let regex = new RegExp(pattern);

                $.validator.addMethod("customRegex", function (value, element) {
                    return this.optional(element) || regex.test(value);
                });

                rules.customRegex = true;
                messages.customRegex = "Invalid format.";
            }

            // PASSWORD STRONG
            if (type === "strong-password") {
                $.validator.addMethod("strongPassword", function (value) {
                    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test(value);
                });

                rules.strongPassword = true;
                messages.strongPassword = "Password must contain uppercase, lowercase, number and min 8 chars.";
            }

            // CONFIRM PASSWORD
            if (type.startsWith("match-")) {
                let target = type.split('-')[1]; // field name

                rules.equalTo = `[name="${target}"]`;
                messages.equalTo = "Values do not match.";
            }

        });

        // APPLY RULES
        $el.rules("add", {
            ...rules,
            messages: messages
        });

    });
}