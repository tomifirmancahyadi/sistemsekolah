/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Kishor Mali
 */

$(document).ready(function () {

    var editSkemaForm = $("#editSkema");

    var validator = editSkemaForm.validate({

        rules: {
            nama_skema: { required: true },

        },
        messages: {
            nama_skema: { required: "This field is required" },
        }
    });
});
