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

    var editProgramForm = $("#editPogram");

    var validator = editProgramForm.validate({

        rules: {


            nama_skema: { required: true },
            ket: { required: true },



        },
        messages: {


            nama_skema: { required: "This field is required" },
            ket: { required: "This field is required" },


        }
    });
});
