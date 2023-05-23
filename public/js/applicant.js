$(document).ready(function () {
    loadprovince()

    $(document).on('click', '#btnSubmit', function (e) {
        var datas = $('#frmApplicant');
        var formData = new FormData($(datas)[0]);

        axios.post('/applicant/create', formData)
            .then(function (response) {
                //error response validtor
                if (response.data.status == 201) {
                    $.each(response.data.error, function (prefix, val) {
                        $('input[name=' + prefix + ']').addClass(" border border-danger");
                        $('span.' + prefix + '_error').text(val[0]);
                        swal("Error", "Please check required fields!", "error");
                    });
                }
                //success respose
                if (response.data.status == 200) {
                    $('span.error-text').text("");
                    $('input.border').removeClass('border border-danger');
                    $('#frmApplicant')[0].reset();
                    swal("Good job!", response.data.msg, "success");
                }
                //error
                if (response.data.status == 202) {
                    $('span.error-text').text("");
                    $('input.border').removeClass('border border-danger');
                    swal("Error!", response.data.msg, "error");
                }
            })
            .catch(function (error) {

            })
            .then(function () { });
    });

    //JS
    //load province
    function loadprovince() {
        axios.get('/load_province')
            .then(function (response) {
                var htmlData = '';
                htmlData += ("<option value=0>-</option>");
                $(response.data.data).each(function (index, row) {
                    htmlData += ("<option value=" + row.provDesc + ">" + row.provDesc + "</option>");
                })
                // $("#tblHome").empty().append(htmlData);
                $("#province").empty();
                $("#province").append(htmlData);
            })
            .catch(function (error) {
                dialog.alert({
                    message: error
                });
            })
            .then(function () { });
    }

    // //province
    $(document).on('change', '#province ', function (e) {
        var provCode = $(this).val();

        $("#specsdsc_details").val('');
        $('span.error-text').text("");
        $('input.border').removeClass('border border-danger');
    })

    // PROVINCE
    $(document).on('change', '#province ', function (e) {
        var provCode = $(this).val();
        axios.get('/onselect_province_load_city', {
            params: {
                id: provCode
            }
        })
            // axios.get('/onselect_province_load_city')
            .then(function (response) {
                var htmlData = '';
                htmlData += ("<option value=0>-</option>");

                $(response.data.data).each(function (index, row) {
                    htmlData += ("<option value=" + row.citymunDesc + ">" + row.citymunDesc + "</option>");
                })
                // $("#tblHome").empty().append(htmlData);
                $("#city").empty();
                $("#city").append(htmlData);
            })
            .catch(function (error) {
                dialog.alert({
                    message: error
                });
            })
            .then(function () { });
    });

      // CITY
    $(document).on('change', '#city ', function(e) {
        var citycode = $(this).val();
        axios.get('/onselect_city_load_brgy', {
            params: {
                id: citycode
            }
        })
        // axios.get('/onselect_province_load_city')
        .then(function (response) {
            var htmlData='';
            htmlData += ("<option value=0>-</option>");

            $(response.data.data).each(function(index, row) {
                htmlData += ("<option value=" + row.brgyDesc + ">" + row.brgyDesc + "</option>");
            })
            // $("#tblHome").empty().append(htmlData);
            $("#barangay").empty();
            $("#barangay").append(htmlData);
        })
        .catch(function (error) {
            dialog.alert({
                message: error
            });
        })
        .then(function () {});
    });


});








// // CITY
// $(document).on('change', '#city ', function (e) {
//     var citycode = $(this).val();
//     axios.get('/onselect_city_load_brgy', {
//         params: {
//             id: citycode
//         }
//     })
//         // axios.get('/onselect_province_load_city')
//         .then(function (response) {
//             var htmlData = '';
//             htmlData += ("<option value=0>-</option>");

//             $(response.data.data).each(function (index, row) {
//                 htmlData += ("<option value=" + row.brgyCode + ">" + row.brgyDesc + "</option>");
//             })
//             // $("#tblHome").empty().append(htmlData);
//             $("#barangay").empty();
//             $("#barangay").append(htmlData);
//         })
//         .catch(function (error) {
//             dialog.alert({
//                 message: error
//             });
//         })
//         .then(function () { });
// });

