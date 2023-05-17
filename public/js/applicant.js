$(document).ready(function () {
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
                    // $('#frmApplicant')[0].reset();
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

});

