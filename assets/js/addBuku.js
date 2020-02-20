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

    var addBukuForm = $("#addBuku");

    var validator = addBukuForm.validate({

        rules: {

            nidn: { required: true },
            judul: { required: true },
            skemabuku: { required: true },
            penulis: { required: true },
            stts_terbit: { required: true },
            isbn: { required: true },
            unggah: { required: true },

        },
        messages: {

            nidn: { required: "This field is required" },
            judul: { required: "This field is required" },
            skemabuku: { required: "This field is required" },
            penulis: { required: "This field is required" },
            stts_terbit: { required: "This field is required" },
            isbn: { required: "This field is required" },
            unggah: { required: "This field is required" },


        }
    });
});
