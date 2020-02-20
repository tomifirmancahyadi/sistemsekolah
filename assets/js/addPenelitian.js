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

    var addPenelitianForm = $("#addPenelitian");

    var validator = addPenelitianForm.validate({

        rules: {

            nidn: { required: true },
            skema: { required: true },
            dana: { required: true },
            unggah: { required: true },

        },
        messages: {

            nidn: { required: "This field is required" },
            skema: { required: "This field is required" },
            dana: { required: "This field is required" },
            unggah: { required: "This field is required" },


        }
    });
});
