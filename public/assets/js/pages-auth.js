"use strict";
const formAuthentication = document.querySelector("#formAuthentication");
document.addEventListener("DOMContentLoaded", function (e) {
    {
        formAuthentication && FormValidation.formValidation(formAuthentication, {
            fields: {
                name: {
                    validators: {
                        notEmpty: {message: "يرجى ادخال اسم المستخدم"},
                        stringLength: {min: 6, message: "اسم المستخدم يجب ان يكون اكبر من 6 احرف"}
                    }
                },
                email: {
                    validators: {
                        notEmpty: {message: "يرجى ادخال بريدك الالكتروني"},
                        emailAddress: {message: "يرجى ادخال بريد الكتروني صالح"}
                    }
                },
                "email-username": {
                    validators: {
                        notEmpty: {message: "Please enter email / username"},
                        stringLength: {min: 6, message: "Username must be more than 6 characters"}
                    }
                },
                password: {
                    validators: {
                        notEmpty: {message: "يرجى ادخال كلمة المرور"},
                        stringLength: {min: 6, message: "كلمة المرور يجب ان تكون اكبر من 6 احرف"}
                    }
                },
                "password_confirmation": {
                    validators: {
                        notEmpty: {message: "يرجى تأكيد كلمة المرور"},
                        identical: {
                            compare: function () {
                                return formAuthentication.querySelector('[name="password"]').value
                            }, message: "تأكيد كلمة المرور غير متطابقة"
                        },
                        // stringLength: {min: 6, message: "كلمة المرور يجب ان تكون اكبر من 6 احرف"}
                    }
                },
                terms: {validators: {notEmpty: {message: "يرجى الموافقة على السياسات و الشروط"}}}
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger,
                bootstrap5: new FormValidation.plugins.Bootstrap5({eleValidClass: "", rowSelector: ".mb-3"}),
                submitButton: new FormValidation.plugins.SubmitButton,
                defaultSubmit: new FormValidation.plugins.DefaultSubmit,
                autoFocus: new FormValidation.plugins.AutoFocus
            },
            init: e => {
                e.on("plugins.message.placed", function (e) {
                    e.element.parentElement.classList.contains("input-group") && e.element.parentElement.insertAdjacentElement("afterend", e.messageElement)
                })
            }
        });
        const t = document.querySelectorAll(".numeral-mask");
        return void (t.length && t.forEach(e => {
            new Cleave(e, {numeral: !0})
        }))
    }
});
