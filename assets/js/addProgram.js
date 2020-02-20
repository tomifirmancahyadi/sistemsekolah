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

    var addProgramForm = $("#addProgram");

    var validator = addProgramForm.validate({

        rules: {


            nama_program: { required: true },
            ket: { required: true },

        },
        messages: {

            nama_program: { required: "This field is required" },
            ket: { required: "This field is required" },



        }
    });
});
