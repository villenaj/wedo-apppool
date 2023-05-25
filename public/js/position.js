$(document).ready(function () {
    // globals
    var skillID = 0;
    var jdID = 0;
    var gID = 0;
    var idPos = 0;

    get_all_position();
    get_sampple();
    posID = 0;
    jdSwitch = 0;
    skillPosID = 0;
    skillSwitch = 0;
    id_selection = 0;
    function get_sampple() {
        axios.get("/getAllPosition").then((response) => {
            var resultData = response.data.data;
            var emp = "";

            $(resultData).each(function (index, row) {
                emp +=
                    "<tr>" +
                    "<td class='text-lowercase'>" +
                    row.pos +
                    "</td>" +
                    "<td class='text-lowercase'>" +
                    row.vac +
                    "</td>";

                if (row.status == "Active") {
                    emp +=
                        " <td class='text-lowercase'> <div class='form-check form-switch'>";
                    emp +=
                        "<input class='form-check-input' type='checkbox' id='chkStatus' checked  value= '" +
                        row.id +
                        "'> ";
                    emp += "</div> </td>";
                } else {
                    emp +=
                        " <td class='text-lowercase'><div class='form-check form-switch'>";
                    emp +=
                        "<input class='form-check-input' type='checkbox' id='chkStatus' value= '" +
                        row.id +
                        "'>";
                    emp += "</div> </td>";
                }

                // emp += "<td class='text-lowercase'>" + row.status + "</td>" +
                emp +=
                    "<td>" +
                    "<button data-bs-toggle='modal' data-bs-target='#mdlViewModel' data-toggle='tooltip' data-placement='bottom' value= '" +
                    row.id +
                    "' id='view' title='View data'  type='button' class='btn btn-secondary btn-sm ml-1'> <i class='fa fa-eye'></i>  </button>" +
                    "<button data-bs-toggle='modal' data-bs-target='#jd' data-toggle='tooltip' data-placement='bottom' value= '" +
                    row.id +
                    "' id='btnjd' title='View JD'  type='button' class='btn btn-secondary btn-sm ml-1'> <i class='fas fa-shapes'></i>  </button>" +
                    "<button data-bs-toggle='modal' data-bs-target='#skill' data-toggle='tooltip' data-placement='bottom' value= '" +
                    row.id +
                    "' id='btnskill' title='View SKILL'  type='button' class='btn btn-secondary btn-sm ml-1'> <i class='fas fa-chalkboard'></i>  </button>    </td>";

                emp += "</tr>";
            });
            $("#tblDepartments").empty();
            $("#tblDepartments").append(emp);
        });
    }
    $(document).on("click", "#btnSave", function (e) {
        var datas = $("#frmPosition");
        var formData = new FormData($(datas)[0]);
        axios
            .post("/position/create", formData)
            .then(function (response) {
                //error response validtor
                if (response.data.status == 201) {
                    $.each(response.data.error, function (prefix, val) {
                        $("input[name=" + prefix + "]").addClass(
                            " border border-danger"
                        );
                        $("span." + prefix + "_error").text(val[0]);
                        swal("Error", "Please check required fields!", "error");
                    });
                }
                //success respose
                if (response.data.status == 200) {
                    $("span.error-text").text("");
                    $("input.border").removeClass("border border-danger");
                    $("#frmPosition")[0].reset();
                    swal("Good job!", response.data.msg, "success");
                    get_all_position();
                }
                //error
                if (response.data.status == 202) {
                    $("span.error-text").text("");
                    $("input.border").removeClass("border border-danger");
                    swal("Error!", response.data.msg, "error");
                }
            })
            .catch(function (error) {})
            .then(function () {});
    });

    //getposition
    $(document).on("click", "#view", function () {
        var id = $(this).val();
        // idPos=id;

        axios
            .get("/position/getposition", {
                params: {
                    id: id,
                },
            })
            .then(function (response) {
                var Vskils = "";
                var Jdesc = "";

                $(response.data.data).each(function (index, row) {
                    $("#posdis").val(row.pos);
                    $("#vacdis").val(row.vac);
                });
                // $(response.data.data1).each(function(index, row) {
                //     $("#skillsdis").val(row.skill_desc);
                // })

                $(response.data.data1).each(function (index, row) {
                    //SPECS
                    Vskils +=
                        "<label for=''> <i class='fa-solid fa-circle'></i> " +
                        row.skill_desc +
                        "</label><br>";
                });
                $(".Vskils").empty().html(Vskils);

                $(response.data.data2).each(function (index, row) {
                    //JD
                    Jdesc +=
                        "<label for=''> <i class='fa-solid fa-circle'></i> " +
                        row.desc +
                        "</label><br>";
                });
                $(".Jdesc").empty().html(Jdesc);

                // alert(response.data.data1)
            })

            .catch(function (error) {})
            .then(function () {});
    });

    //getapplicant
    $(document).on("click", "#mdlView", function () {
        var id = $(this).val();
        // idPos=id;

        axios
            .get("/mdlapplicant/getapplicant", {
                params: {
                    id: id,
                },
            })
            .then(function (response) {
                $(response.data.data).each(function (index, row) {
                    $("#fname").val(row.first);
                });
            })

            .catch(function (error) {})
            .then(function () {});
    });


    $(document).on("click", "#view", function (e) {
        var id = $(this).val();
        gID = id;
        axios
            .get("/position/edit", {
                params: {
                    id: id,
                },
            })
            .then(function (response) {
                var jd = 0;
                var skill = 0;

                $(response.data.data).each(function (index, row) {
                    $("#upos").val(row.pos);
                    $("#uvacancies").val(row.vac);
                });

                $(response.data.data2).each(function (index, row) {
                    if (jd == 0) {
                        jd = row.desc;
                    } else {
                        jd = jd + "." + row.desc + "\n";
                    }

                    if (jdID == 0) {
                        jdID = row.id;
                    } else {
                        jdID = jdID + "." + row.id;
                    }
                });

                $(response.data.data1).each(function (index, row) {
                    if (skill == 0) {
                        skill = row.skill_desc;
                    } else {
                        skill = skill + "." + row.skill_desc + "\n";
                    }

                    if (skillID == 0) {
                        skillID = row.id;
                    } else {
                        skillID = skillID + "." + row.id;
                    }
                });

                $("#updateSkill").empty().val(skill);
                $("#ujd").empty().val(jd);
            })
            .catch(function (error) {})
            .then(function () {});
    });

    $(document).on("click", "#btnupdate", function (e) {
        var datas = $("#frmPositionUpdate");
        var formData = new FormData($(datas)[0]);
        formData.append("skillID", skillID);
        formData.append("jdID", jdID);
        formData.append("id", gID);
        axios
            .post("/position/update", formData)
            .then(function (response) {
                skillID = 0;
                jdID = 0;
                gID = 0;
                if (response.data.status == 201) {
                    $("span.error-text").text("");
                    $("input.border").removeClass("border border-danger");
                    swal("Error!", response.data.msg, "error");
                }

                //success respose
                if (response.data.status == 200) {
                    $("span.error-text").text("");
                    $("input.border").removeClass("border border-danger");
                    $("#frmPosition")[0].reset();
                    swal("Good job!", response.data.msg, "success");
                    get_all_position();
                }

                //error response validtor
                if (response.data.status == 203) {
                    $.each(response.data.error, function (prefix, val) {
                        $("input[name=" + prefix + "]").addClass(
                            " border border-danger"
                        );
                        $("span." + prefix + "_error").text(val[0]);
                        swal("Error", "Please check required fields!", "error");
                    });
                }
            })
            .catch(function (error) {})
            .then(function () {});
    });

    function get_all_position() {
        axios
            .get("/getAllPosition")
            .then(function (response) {
                var resultData = response.data.data;
                var emp = "";

                $(resultData).each(function (index, row) {
                    emp +=
                        "<tr>" +
                        "<td class='text-lowercase'>" +
                        row.pos +
                        "</td>" +
                        "<td class='text-lowercase'>" +
                        row.vac +
                        "</td>";

                    if (row.status == "Active") {
                        emp +=
                            " <td class='text-lowercase'> <div class='form-check form-switch'>";
                        emp +=
                            "<input class='form-check-input' type='checkbox' id='chkStatus' checked  value= '" +
                            row.id +
                            "'> ";
                        emp += "</div> </td>";
                    } else {
                        emp +=
                            " <td class='text-lowercase'><div class='form-check form-switch'>";
                        emp +=
                            "<input class='form-check-input' type='checkbox' id='chkStatus' value= '" +
                            row.id +
                            "'>";
                        emp += "</div> </td>";
                    }

                    // emp += "<td class='text-lowercase'>" + row.status + "</td>" +
                    emp +=
                        "<td>" +
                        "<button data-bs-toggle='modal' data-bs-target='#mdlViewModel' data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='view' title='View data'  type='button' class='btn btn-secondary btn-sm ml-1'> <i class='fa fa-eye'></i>  </button>" +
                        "<button data-bs-toggle='modal' data-bs-target='#jd' data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='btnjd' title='View JD'  type='button' class='btn btn-secondary btn-sm ml-1'> <i class='fas fa-shapes'></i>  </button>" +
                        "<button data-bs-toggle='modal' data-bs-target='#skill' data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='btnskill' title='View SKILL'  type='button' class='btn btn-secondary btn-sm ml-1'> <i class='fas fa-chalkboard'></i>  </button>    </td>";

                    emp += "</tr>";
                });
                $("#tblDepartments").empty();
                $("#tblDepartments").append(emp);
            })
            .catch(function (error) {})
            .then(function () {});
    }

    //script for jobdiscription management
    $(document).on("click", "#addJD", function (e) {
        var id = $(this).val();

        var datas = $("#frmjd");
        var formData = new FormData($(datas)[0]);
        formData.append("posID", posID);
        formData.append("jdSwitch", jdSwitch);
        formData.append("id", id);

        axios
            .post("/jd/add", formData)
            .then(function (response) {
                //error response validtor
                if (response.data.status == 201) {
                    $.each(response.data.error, function (prefix, val) {
                        $("input[name=" + prefix + "]").addClass(
                            " border border-danger"
                        );
                        $("span." + prefix + "_error").text(val[0]);
                        swal("Error", "Please check required fields!", "error");
                    });
                }
                //success respose
                if (response.data.status == 200) {
                    $("span.error-text").text("");
                    $("input.border").removeClass("border border-danger");
                    $("#frmjd")[0].reset();
                    swal("Good job!", response.data.msg, "success");
                    $("#addJD").text("Add");
                    jdSwitch = 0;
                    get_jd(posID);
                }
                //error
                if (response.data.status == 202) {
                    $("span.error-text").text("");
                    $("input.border").removeClass("border border-danger");
                    swal("Error!", response.data.msg, "error");
                }
            })
            .catch(function (error) {})
            .then(function () {});
    });
    $(document).on("click", "#btnjd", function (e) {
        var id = $(this).val();
        posID = id;
        get_jd(posID);
    });
    $(document).on("click", "#delete", function (e) {
        var id = $(this).val();
        axios
            .get("/deleteJD", {
                params: {
                    id: id,
                },
            })
            .then(function (response) {
                //success respose
                if (response.data.status == 200) {
                    $("span.error-text").text("");
                    $("input.border").removeClass("border border-danger");
                    $("#frmPosition")[0].reset();
                    swal("Message!", response.data.msg, "success");
                    get_jd(posID);
                }
                //error
                if (response.data.status == 201) {
                    $("span.error-text").text("");
                    $("input.border").removeClass("border border-danger");
                    swal("Error!", response.data.msg, "error");
                }
            })
            .catch(function (error) {})
            .then(function () {});
    });
    function get_jd(posID) {
        axios
            .get("/getJD", {
                params: {
                    posID: posID,
                },
            })
            .then(function (response) {
                var resultData = response.data.data;
                var emp = "";

                $(resultData).each(function (index, row) {
                    emp +=
                        "<tr>" +
                        "<td class='text-lowercase'>" +
                        row.desc +
                        "</td>" +
                        "<td>" +
                        "<button  data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='delete' title='View data'  type='button' class='btn btn-danger btn-sm ml-1'> <i class='fa fa-trash'></i>  </button>" +
                        "<button data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='updatejd' title='edit'  type='button' class='btn btn-secondary btn-sm ml-1'> <i class='fas fa-edit'></i>  </button>    </td>";

                    emp += "</tr>";
                });
                $("#tbljd").empty();
                $("#tbljd").append(emp);
            })
            .catch(function (error) {})
            .then(function () {});
    }
    $(document).on("click", "#updatejd", function (e) {
        var id = $(this).val();
        // posID=id;
        $("#addJD").text("Update");
        $("#addJD").val(id);

        jdSwitch = 1;

        axios
            .get("/getSpecificJD", {
                params: {
                    id: id,
                },
            })
            .then(function (response) {
                var resultData = response.data.data;

                $(resultData).each(function (index, row) {
                    $("#jdRemark").val(row.desc);
                });
            })
            .catch(function (error) {})
            .then(function () {});
    });

    //script for skill management
    $(document).on("click", "#deleteSkill", function (e) {
        var id = $(this).val();
        axios
            .get("/deleteSkil", {
                params: {
                    id: id,
                },
            })
            .then(function (response) {
                //success respose
                if (response.data.status == 200) {
                    $("span.error-text").text("");
                    $("input.border").removeClass("border border-danger");
                    $("#frmPosition")[0].reset();
                    swal("Message!", response.data.msg, "success");
                    get_jd(posID);
                }
                //error
                if (response.data.status == 201) {
                    $("span.error-text").text("");
                    $("input.border").removeClass("border border-danger");
                    swal("Error!", response.data.msg, "error");
                }
            })
            .catch(function (error) {})
            .then(function () {});
    });
    function get_skill(skillPosID) {
        axios
            .get("/getskill", {
                params: {
                    skillPosID: skillPosID,
                },
            })
            .then(function (response) {
                var resultData = response.data.data;
                var emp = "";
                console.log(resultData);

                $(resultData).each(function (index, row) {
                    emp +=
                        "<tr>" +
                        "<td class='text-lowercase'>" +
                        row.skill_desc +
                        "</td>" +
                        "<td>" +
                        "<button  data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='deleteSkill' title='View data'  type='button' class='btn btn-danger btn-sm ml-1'> <i class='fa fa-trash'></i>  </button>" +
                        "<button data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='supdateskill' title='edit'  type='button' class='btn btn-secondary btn-sm ml-1'> <i class='fas fa-edit'></i>  </button>    </td>";
                    emp += "</tr>";
                });
                $("#tblskill").empty();
                $("#tblskill").append(emp);
            })
            .catch(function (error) {})
            .then(function () {});
    }
    $(document).on("click", "#btnskill", function (e) {
        var id = $(this).val();
        skillPosID = id;
        get_skill(skillPosID);
    });
    $(document).on("click", "#addSKill", function (e) {
        var id = $(this).val();

        var datas = $("#frmskill");
        var formData = new FormData($(datas)[0]);
        formData.append("skillPosID", skillPosID);
        formData.append("skillSwitch", skillSwitch);
        formData.append("id", id);

        axios
            .post("/skill/add", formData)
            .then(function (response) {
                //error response validtor
                if (response.data.status == 201) {
                    $.each(response.data.error, function (prefix, val) {
                        $("input[name=" + prefix + "]").addClass(
                            " border border-danger"
                        );
                        $("span." + prefix + "_error").text(val[0]);
                        swal("Error", "Please check required fields!", "error");
                    });
                }
                //success respose
                if (response.data.status == 200) {
                    $("span.error-text").text("");
                    $("input.border").removeClass("border border-danger");
                    $("#frmjd")[0].reset();
                    swal("Good job!", response.data.msg, "success");
                    $("#addSKill").text("Add");
                    skillSwitch = 0;
                    get_skill(skillPosID);
                }
                //error
                if (response.data.status == 202) {
                    $("span.error-text").text("");
                    $("input.border").removeClass("border border-danger");
                    swal("Error!", response.data.msg, "error");
                }
            })
            .catch(function (error) {})
            .then(function () {});
    });
    $(document).on("click", "#supdateskill", function (e) {
        var id = $(this).val();
        // posID=id;
        $("#addSKill").text("Update");
        $("#addSKill").val(id);

        skillSwitch = 1;
        axios
            .get("/getSpecificskill", {
                params: {
                    id: id,
                },
            })
            .then(function (response) {
                var resultData = response.data.data;
                $(resultData).each(function (index, row) {
                    $("#txtskill").val(row.skill_desc);
                });
            })
            .catch(function (error) {})
            .then(function () {});
    });
    //script to de activate and deactivate position hiring
    $(document).on("click", "#chkStatus", function (e) {
        var id = $(this).val();
        axios
            .get("/updatePositionStatus", {
                params: {
                    id: id,
                },
            })
            .then(function (response) {
                var msg = response.data.msg;
                swal("Good job!", msg, "success");
            })
            .catch(function (error) {})
            .then(function () {});
    });

    //script for applicant pool report

    get_applicant();

    function get_applicant() {
        axios
            .post("/get_applicant")
            .then(function (response) {
                var resultData = response.data.data;
                var emp = "";

                $(resultData).each(function (index, row) {
                    emp +=
                        "<tr>" +
                        "<td class='text-lowercase'>" +
                        row.first +
                        " " +
                        row.last +
                        "</td>" +
                        "<td class='text-lowercase'>" +
                        row.pos +
                        "</td>" +
                        "<td class='text-lowercase'>" +
                        row.ct +
                        ", " +
                        row.prov +
                        "</td>" +
                        "<td>" +
                        "<button data-bs-toggle='modal' data-bs-target='#mdlstat'  data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='btnviewStat' title='Update'  type='button' class='btn btn-danger btn-sm ml-1'> <i class='fa-solid fa-filter'></i>  </button>" +
                        "<button data-bs-toggle='modal' data-bs-target='#mdlRes'  data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='btnviewRes' title='View Resume'  type='button' class='btn btn-danger btn-sm ml-1'> <i class='fa-regular fa-file'></i>  </button>" +
                        "<button data-bs-toggle='modal' data-bs-target='#mdlView'  data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='btnview' title='View Sheet'  type='button' class='btn btn-danger btn-sm ml-1'> <i class='fa fa-eye'></i>  </button>" +
                        "<button data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='btnInvite' title='Invite for interview'  type='button' class='btn btn-success btn-sm ml-1 spin'> <i class='fa-solid fa-paper-plane'></i>  </button>    </td>" +
                        "<td class='text-lowercase'>" +
                        row.appstat +
                        "</td>";
                    emp += "</tr>";
                });
                $("#tblAppPool").empty();
                $("#tblAppPool").append(emp);
            })
            .catch(function (error) {})
            .then(function () {});
    }

    $(document).on("click", "#btnInvite", function (e) {
        on_invite();
        var id = $(this).val();
        axios
            .get("/inviteInterview", {
                params: {
                    id: id,
                },
            })
            .then(function (response) {
                var msg = response.data.msg;
                swal("Good job!", msg, "success");
                get_applicant();
            })
            .catch(function (error) {})
            .then(function () {
                on_done();
            });
    });

    function on_invite() {
        $(".spin").attr("disabled", "disabled");
        $(".spin").attr("data-btn-text", $(".spin").text());
        $(".spin").html(
            '<span class="spinner"><i class="fa fa-spinner fa-spin"></i></span> Sending.....'
        );
        $(".spin").addClass("active");
    }

    function on_done() {
        $(".spin").html($(".spin").attr("data-btn-text"));
        $(".spin").html(
            '<span ></span> <i class="fa-solid fa-paper-plane"></i>'
        );
        $(".spin").removeClass("active");
        $(".spin").removeAttr("disabled");
    }

    function get_selected_applicant(id_selection) {
        var dfrom = $("#txtDateFrom").val();
        var dto = $("#txtDateto").val();

        axios
            .get("/get_selected_applicant", {
                params: {
                    id: id_selection,
                    txtDateFrom: dfrom,
                    txtDateto: dto,
                },
            })
            .then(function (response) {
                var resultData = response.data.data;
                var emp = "";

                $(resultData).each(function (index, row) {
                    emp +=
                        "<tr>" +
                        "<td class='text-lowercase'>" +
                        row.first +
                        " " +
                        row.last +
                        "</td>" +
                        "<td class='text-lowercase'>" +
                        row.pos +
                        "</td>" +
                        "<td class='text-lowercase'>" +
                        row.ct +
                        ", " +
                        row.prov +
                        "</td>" +
                        "<td>" +
                        "<button data-bs-toggle='modal' data-bs-target='#mdlView'  data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='deleteSkill' title='View data'  type='button' class='btn btn-danger btn-sm ml-1'> <i class='fa fa-eye'></i>  </button>" +
                        "<button data-toggle='tooltip' data-placement='bottom' value= '" +
                        row.id +
                        "' id='btnInvite' title='Invite for interview'  type='button' class='btn btn-success btn-sm ml-1 spin'> <i class='fa-solid fa-paper-plane'></i>  </button>    </td>" +
                        "<td class='text-lowercase'>" +
                        row.appstat +
                        "</td>";
                    emp += "</tr>";
                });
                $("#tblAppPool").empty();
                $("#tblAppPool").append(emp);
            })
            .catch(function (error) {})
            .then(function () {});
    }

    $(document).on("change", "#posDD", function (e) {
        var id = $(this).val();
        id_selection = id;
        get_selected_applicant(id_selection);
    });



    //getposition
    $(document).on("click", "#btnview", function () {
        var id = $(this).val();
        idPos=id;

        axios
            .get("/getview_applicant", {
                params: {
                    id: idPos,
                },
            })
            .then(function (response) {
                $(response.data.data).each(function (index, row) {
                    $("#lbl_viewAppDate").empty().text(row.created_at);
                    $("#lbl_viewPosApp").empty().text(row.pos);
                    // $("#lbl_viewPosApp").val(row.pos);
                    $("#lbl_viewBdate").empty().text(row.bdate);
                    $("#lbl_viewCS").empty().text(row.stat);
                    $("#lbl_viewFn").empty().text(row.first);
                    $("#lbl_viewMn").empty().text(row.middle);
                    $("#lbl_viewLn").empty().text(row.last);
                    $("#lbl_viewSf").empty().text(row.suf);
                    $("#lbl_viewBrgy").empty().text(row.brgy);
                    $("#lbl_viewCt").empty().text(row.ct);
                    $("#lbl_viewProv").empty().text(row.prov);
                    $("#lbl_viewZip").empty().text(row.zip);
                    $("#lbl_viewContact").empty().text(row.mob);
                    $("#lbl_viewEmail").empty().text(row.eml);
                    $("#lbl_viewCitizen").empty().text(row.citizen);
                    $("#lbl_viewRel").empty().text(row.rel);
                });
            })
            .catch(function(error) {
            })
            .then(function() {});
    });

    //getposition
    $(document).on("click", "#btnviewRes", function () {
        var id = $(this).val();
        idPos=id;

        axios
            .get("/getview_applicant", {
                params: {
                    id: idPos,
                },
            })
            .then(function (response) {
                $(response.data.data).each(function (index, row) {
                    const modalPath = row.path || '';
                    const embedElement = document.getElementById('modalEmbed');
                    embedElement.src = modalPath;
                });
            })
            .catch(function(error) {
            })
            .then(function() {});
    });
});
