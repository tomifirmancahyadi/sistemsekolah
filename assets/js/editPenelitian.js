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

    var editPenelitianForm = $("#editPenelitian");

    var validator = editPenelitianForm.validate({

        rules: {

            nidn: { required: true },
            judul: { required: true },
            id_skema: { required: true },
            dana: { required: true },
            unggah: { required: true },


        },
        messages: {

            nidn: { required: "This field is required" },
            judul: { required: "This field is required" },
            id_skema: { required: "This field is required" },
            dana: { required: "This field is required" },
            unggah: { required: "This field is required" },

        }
    });
});
