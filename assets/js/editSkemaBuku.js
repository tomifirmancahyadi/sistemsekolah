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

    var editSkemaBukuForm = $("#editSkemabuku");

    var validator = editSkemaBukuForm.validate({

        rules: {
            stts_buku: { required: true },

        },
        messages: {
            stts_buku: { required: "This field is required" },
        }
    });
});
