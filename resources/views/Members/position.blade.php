@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="mb-2">
            <h4 class="text-gray-800 mb-3">Applicant Pool Report</h4>
            {{-- <button class=" mt-3 btn btn-danger radius-1" id="btnAddPosition" data-bs-toggle="modal" data-bs-target="#mdlPosition"> <i class="fa fa-plus"></i> Add Position</button> --}}
        </div>
        <div class="row">
            <div class="col-12">
                <!-- <h5 class=" mb-0 text-danger">Filter:</h5>    -->
                <form action="" id="frmUpdateEffect">
                    <div class="row mx-1 mb-1">
                        <div class="col-xl-2 col-lg-12 pl-2">
                            <div class="form-floating mb-1">
                                <input class="form-control" id="txtDateFrom" name="txtDateFrom" type="date"
                                    placeholder="-" />
                                <label class="form-check-label" for="txtDateFrom">Date From<label for=""
                                        class="text-danger">*</label></label>
                                <span class="text-danger small error-text effectivity_error"></span>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-12 pl-2">
                            <div class="form-floating mb-1">
                                <input class="form-control" id="txtDateto" name="txtDateto" type="date"
                                    placeholder="-" />
                                <label class="form-check-label" for="missionDesc">Date To<label for=""
                                        class="text-danger">*</label></label>
                                <span class="text-danger small error-text effectivity_error"></span>
                            </div>
                        </div>

                        <div class="col-lg-2 pl-2">
                            <div class="form">
                                <div class="form-floating mb-1">
                                    <select class="form-control" name="posDD" id="posDD">
                                        <option>-</option>
                                        @if (count($result) > 0)
                                            @foreach ($result as $results)
                                                <option value='{{ $results->id }}'>{{ $results->pos }}</option>
                                            @endforeach
                                        @else
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <style>
            @media print {
                body {
                    visibility: hidden;
                    width: 1000px;
                    margin: 0 auto;
                    display: inline;
                }

                .print-container {
                    visibility: visible;
                }

                .print-container {
                    position: absolute;
                    left: 0px;
                    top: 0px;
                    right: 0px;
                }
            }
        </style>
        <!-- Content Row dar -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card   mb-4">
                    <!-- Card Body -->
                    <div class="card-body" style="overflow-y:auto;">
                        <div class="chart-area">
                            <div class="table-responsive">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tblAppPool">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="mdlView" data-bs-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <div class="modal-body ">
                        <div class="card shadow text-dark ">
                            <div class="card-body print-container">
                                <div id="ThisPrintTSDR" class="">
                                    <form action=""><br><br><br>
                                        <div class="col-lg-12 borderblck textblck">
                                            <div class="row-lg-12">
                                                <div class="col-lg-12">
                                                    <div class="row d-flex justify-content-end">
                                                        <div class="col-lg-6">
                                                            <img class=""style="height:auto; width:50%"
                                                                src="{{ asset('img/wlogo.png') }}" alt="WeDo BPO Inc.">
                                                        </div>
                                                        <div class="col-lg-6 pt-4">
                                                            <div class="row d-flex text-end">
                                                                <label class="fs4 fw-bold pt-4">Personal Information
                                                                    Sheet</label>
                                                                <label class="fs4 fw-bold">Information Update Sheet</label>
                                                                <label class="fs4 fw-bold">Version 1/2019</label>
                                                                <label class="fs4 fw-bold">Page 1 of 1</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 border border-dark">
                                                    <h6 class="fs fw-bold">APPLICATION DATE</h6>
                                                </div>
                                                <div class="col-lg-6 border border-dark">
                                                    <h6 class="fs fw-bold">POSITION APPLIED FOR</h6>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-6 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for="" class="d-none rptAppDate fw-semibold"></label>
                                                        <p class="" name="lbl_viewAppDate" id="lbl_viewAppDate">

                                                        </p>
                                                        {{-- <input class="form-control lbl_viewAppDate border-0" name="lbl_viewAppDate" id="lbl_viewAppDate" type="text" placeholder="-" disabled/> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewPosApp" id="lbl_viewPosApp">

                                                        </p>
                                                        {{-- <input class="form-control lbl_tsdrAccountD border-0"
                                                            name="lbl_tsdrAccountD" id="lbl_tsdrAccountD" type="text"
                                                            placeholder="-" /> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">FIRST NAME(S)</h6>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <h6 class="fs fw-bold">MIDDLE NAME</h6>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">FAMILY NAME </h6>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <h6 class="fs fw-bold">SUFFIX</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewFn" id="lbl_viewFn">

                                                        </p>
                                                        {{-- <input class="form-control lbl_tsdrAccountD border-0"
                                                            name="fname" id="fname" type="text"
                                                            placeholder="-" /> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewMn" id="lbl_viewMn">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewLn" id="lbl_viewLn">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewSf" id="lbl_viewSf">

                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-lg-12 border border-dark">
                                                    <h6 class="fs fw-bold">COMPLETE ADDRESS</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <input class="form-control lbl_tsdrAccountD border-0"
                                                            name="lbl_tsdrAccountD" id="lbl_tsdrAccountD" type="text"
                                                            placeholder="-" />
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="row">
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">BARANGAY</h6>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">CITY</h6>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <h6 class="fs fw-bold">PROVINCE</h6>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <h6 class="fs fw-bold">ZIP CODE</h6>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewBrgy" id="lbl_viewBrgy">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewCt" id="lbl_viewCt">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewProv" id="lbl_viewProv">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewZip" id="lbl_viewZip">

                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 border border-dark">
                                                    <h6 class="fs fw-bold">DATE OF BIRTH</h6>
                                                </div>
                                                <div class="col-lg-6 border border-dark">
                                                    <h6 class="fs fw-bold">CIVIL STATUS</h6>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-6 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewBdate" id="lbl_viewBdate">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewCS" id="lbl_viewCS">

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 border border-dark">
                                                    <h6 class="fs fw-bold">MOBILE NUMBER</h6>
                                                </div>
                                                <div class="col-lg-6 border border-dark">
                                                    <h6 class="fs fw-bold">E-MAIL ADDRESS</h6>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-6 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewContact" id="lbl_viewContact">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewEmail" id="lbl_viewEmail">

                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 border border-dark">
                                                    <h6 class="fs fw-bold">CITIZENSHIP</h6>
                                                </div>
                                                <div class="col-lg-6 border border-dark">
                                                    <h6 class="fs fw-bold">RELIGION</h6>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-6 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewCitizen" id="lbl_viewCitizen">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_viewRel" id="lbl_viewRel">

                                                        </p>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <p style="text-align: start"><a class="fs fw-bold text-black">IMPORTANT
                                                    NOTICE</a>: It is important that you provide your updated information
                                                and correct contact details. Should there be a need for the company to
                                                contact you, you will be contracted through the information you have
                                                provided herein. It is your duty to ensure that all information are correct.
                                            </p>
                                            <p style="text-align: start">
                                                You guarantee that the e-mail address you have provided is your personal
                                                e-mail. You guarantee further that you will recieve all correspondences sent
                                                to the e-mail address you have provided.
                                            </p>
                                            <p style="text-align: start">
                                                Delivery of correspondence is deemed complete as soon as correspondence
                                                leaves the WeDo e-mail outbox.
                                            </p><br>

                                            <div class="row">
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">TAX IDENTIFICATION NUMBER</h6>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">SSS NUMBER</h6>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">HDMF (PAG-IBIG) NUMBER</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">VALID ID 1 TYPE</h6>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">VALID ID NUMBER</h6>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <h6 class="fs fw-bold">ISSUED DATE</h6>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <h6 class="fs fw-bold">EXPIRY DATE</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">VALID ID 2 TYPE</h6>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">VALID ID NUMBER</h6>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <h6 class="fs fw-bold">ISSUED DATE</h6>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <h6 class="fs fw-bold">EXPIRY DATE</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">ICE NAME</h6>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">RELATIONSHIP</h6>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <h6 class="fs fw-bold">CONTACT NUMBER</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 border border-dark">
                                                    <div class="form-group m-0 p-0">
                                                        <label for=""
                                                            class="d-none rptAccountD fs4 fw-semibold"></label>
                                                        <p class="" name="lbl_view" id="lbl_view">

                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-1">

                        <button type="button" id="btnTSDR" name="btnTSDR" class="btn btn-warning mr-2">
                            <i class="fa-solid fa-print"></i>
                        </button>

                        <button type="button" id="btnTSDRclose" name="btnTSDRclose" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="mdlRes" data-bs-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header  bg-danger dragable_touch">
                        <h5 class="modal-title fst-italic text-white title" id="staticBackdropLabel">Personal Information
                        </h5>
                        <button type="button" class="btn-close text-white closereset_update" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pdf-tab" data-bs-toggle="tab"
                                        data-bs-target="#pdfview" type="button" role="tab" aria-controls="contact"
                                        aria-selected="true">Resume</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="pdfview" role="tabpanel" aria-labelledby="pdf-tab">
                                    <div class="card p-5">
                                        <embed id="modalEmbed" type="application/pdf" width="100%" height="600px" />
                                    </div>
                                </div>
                                
                                <script>
                                    const modalEmbed = document.getElementById('modalEmbed');
                                    
                                    const filePath = modalEmbed.getAttribute('src');
                                
                                    const extension = getFileExtension(filePath);
                                
                                    if (extension === 'pdf') {
                                        renderPDF(filePath);
                                    } else if (extension === 'jpg' || extension === 'jpeg' || extension === 'png') {
                                        renderImage(filePath);
                                    } else if (extension === 'doc' || extension === 'docx') {
                                        renderDocument(filePath);
                                    } else {
                                        console.error('Unsupported file format');
                                    }
                                
                                    function getFileExtension(filename) {
                                        return filename.split('.').pop().toLowerCase();
                                    }
                                
                                    function renderPDF(filePath) {
                                        modalEmbed.setAttribute('type', 'application/pdf');
                                        modalEmbed.setAttribute('src', filePath);
                                        modalEmbed.style.display = 'block';
                                    }
                                
                                    function renderImage(filePath) {
                                        modalEmbed.setAttribute('src', filePath);
                                        modalEmbed.style.display = 'block';
                                    }
                                
                                    function renderDocument(filePath) {
                                        mammoth.extractRawText({ path: filePath })
                                            .then(function(result) {
                                            const html = result.value;
                                            modalEmbed.setAttribute('src', 'data:text/html;charset=utf-8,' + encodeURIComponent(html));
                                            modalEmbed.style.display = 'block';
                                        })
                                        .catch(function(error) {
                                            console.error('Error converting document to HTML:', error);
                                        });
                                    }

                                </script>
                                
                            </div>

                        </div>
                        <div class="container-fluid">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- //Mdl for Update Status --}}
        <div class="modal fade" id="mdlstat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: rgb(249 200 200 / 17%);">
            <div class="modal-dialog   modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-danger dragable_touch">
                        <h5 class="modal-title fst-italic text-white title" id="staticBackdropLabel"><label
                                for="">
                                STATUS </label></h5>
                        <button type="button" class="btn-close text-white closereset_update" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="card  mb-3 rounded">
                            <div class="card-body ">
                                <form action="" id="frmPosition">
                                    <div class="row">
                                        <div class="form-floating mb-1 fs-6">
                                            <select class="form-control" name="status" id="status">
                                                <option value="PASSED">PASSED</option>
                                                <option value="FAILED">FAILED</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnUp" type="button" class="btn btn-secondary ">Update</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: end">
            <button onclick="window.print()" class="btn btn-danger radius-1" name="btnPrintTbl" id="btnPrintTbl" type="button"> <i
                    class="fa-solid fa-print"></i> Print</button>
        </div> --}}
    </div>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <script src="{{ asset('js/html2canvas.js') }}" defer></script>
    <script src="{{ asset('js/position.js') }}" defer></script>
@endsection
