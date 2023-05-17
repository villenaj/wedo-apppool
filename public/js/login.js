$(document).ready(function(){
    $(document).on('click', '#btnLogin', function(e){

        var user = $('#username').val();
        var pass = $('#password').val();

        // alert(user + " " + pass);

        axios.get('authCheck', {
            params: {
                username : user,
                password : pass,
            }
        })
        .then(function(res){
            // var stat = response.data.status;
            // var alerts = response.data.message;

            // if(stat == 0 ){
            //     alert(alerts);
            // }
            // else{
            //     alert(alerts);
            // }
            if (res.data.status== 200) {
                $('span.error-text').text("");
                 $('input.border').removeClass('border border-danger');
                //  swal({
                //     title: "Message",
                //     text: res.data.msg,
                //     icon: "success",
                //     button: "close",
                //   });

                window.location.href="members/summary";
            }

            //202 error
            if (res.data.status== 202) {
                $('span.error-text').text("");
                    $('input.border').removeClass('border border-danger');
                    swal({
                        title: "Message",
                        text: res.data.msg,
                        icon: "error",
                        button: "close",
                      });

            }


              //0 error
              if (res.data.status== 0) {
                $('span.error-text').text("");
                    $('input.border').removeClass('border border-danger');
                    swal({
                        title: "Message",
                        text: res.data.msg,
                        icon: "error",
                        button: "close",
                      });
            }
        })
        .catch(function(error){
            alert(error);
        })
        .then(function(){})
    });

    // function test(){
    //     axios.get('loaddata')
    //     .then(function(response){

    //         var stat = response.data.status;
    //         var resultdata = response.data.data;

    //         $(resultdata).each(function(index, row){
    //             alert(row.id + " " + row.username + " " + row.password);
    //         })
    //     })
    //     .catch(function(error){
    //         alert(error);
    //     })
    //     .then(function(){})
    // }
});
