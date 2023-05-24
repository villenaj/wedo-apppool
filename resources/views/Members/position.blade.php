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
                                        <option>ALL</option>
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
        <div class="row print-container">
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
                    <div class="modal-header  bg-danger dragable_touch">
                        <h5 class="modal-title fst-italic text-white title" id="staticBackdropLabel">Personal Information
                        </h5>
                        <button type="button" class="btn-close text-white closereset_update" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="card mb-3 p-5" style="">
                                <div class="row g-2">
                                    <div class="col-lg-2 col-md-4 text-center">
                                        <img src="https://miro.medium.com/max/600/1*PiHoomzwh9Plr9_GA26JcA.png"
                                            alt="profile" class="img-thumbnail rounded-circle d-flex" id="imgProfile">
                                    </div>
                                    <div class="col-lg-10 col-md-8 mt-4">
                                        <div class="card-body">
                                            <h2 id="modalName" class="card-title">Sample</h2>
                                            <h4 id="modalFirstName" class="card-text">IT Supervisor</h4>
                                            <p id="modalFirstName" class="card-text">Back End</p>
                                            <p class="card-text">
                                                <button class="btn btn-info text-white"><i
                                                        class="fa-solid fa-print"></i></button>
                                                <button class="btn btn-danger text-white"><i
                                                        class="fa-solid fa-pen-to-square"></i></button>
                                                <button class="btn btn-success text-white"><i
                                                        class="fa-solid fa-key"></i></button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                        aria-selected="true">Contact Information</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="contact" role="tabpanel"
                                    aria-labelledby="contact-tab">
                                    <div class="card p-5">

                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Address</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalProvince" class="col-sm-9">
                                                        B15 L4 LESSANDRA HOMES KAYPIAN CSJDM San Jose Del Monte Bulacan 3023
                                                        Philippines
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Date of Birth</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalBirthdate" class="col-sm-9">
                                                        1993-11-02
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Age</strong>
                                                        </h6>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        28 Years Old
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Gender</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalGender" class="col-sm-9">
                                                        Male
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Civil Status</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalMaritalStatus" class="col-sm-9">
                                                        Single
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Email</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalEmail" class="col-sm-9">
                                                        gemanaramon@yahoo.com
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Home No</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalMobile" class="col-sm-9">
                                                        09352427713
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Contact No</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalMobile" class="col-sm-9">
                                                        N/A
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Citizenship</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalCitizenship" class="col-sm-9">
                                                        Filipino
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Religion</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalReligion" class="col-sm-9">
                                                        Roman Catholic
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="card-title text-center">
                                                        <h3><strong>IN CASE OF EMERGENCY</strong></h3>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Name</strong>
                                                        </h6>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        GENIVIVE OBONG
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Address</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalBarangay" class="col-sm-9">
                                                        B15 L4 LESSANDRA HOMES
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Relationship</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalMaritalStatus" class="col-sm-9">
                                                        Common Wife
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>ICE</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalChoice" class="col-sm-9">
                                                        Yes
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">
                                                            <strong>Contact Number</strong>
                                                        </h6>
                                                    </div>
                                                    <div id="modalMobile" class="col-sm-9">
                                                        09364414116
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- </div> --}}

                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pdf-tab" data-bs-toggle="tab"
                                        data-bs-target="#pdfview" type="button" role="tab" aria-controls="contact"
                                        aria-selected="true">Resume</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="pdfview" role="tabpanel"
                                    aria-labelledby="pdf-tab">
                                    <div class="card p-5">
                                        {{-- <embed src="https://drive.google.com/file/d/1-CBuAk8te_AJq3NXSWdHJOM_fmbBn7NK/preview" type="application/pdf" width="100%" height="600px" /> --}}
                                        <embed id="modalEmbed" type="application/pdf" width="100%" height="600px" />
                                        {{-- <embed src="{{ route('pdf.show', ['id' => $pdf->id]) }}" type="application/pdf" width="100%" height="600px" /> --}}
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="container-fluid">
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: end">
            <button class="btn btn-danger radius-1" name="btnPrintTbl" id="btnPrintTbl" type="button"> <i
                    class="fa-solid fa-print"></i> Print</button>
        </div>
    </div>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <script src="{{ asset('js/html2canvas.js') }}" defer></script>
    <script src="{{ asset('js/position.js') }}" defer></script>
@endsection
