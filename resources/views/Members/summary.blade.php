@extends('layout.app')
@section('content')
    <!--SHAIRA-->

    <div class="container-fluid">

        <div class="mb-2">
            <h4 class=" mb-0 text-gray-800">Summary of Applicant per Vacancy</h4>
            {{-- <button class=" mt-3 btn btn-danger radius-1" name="btnCreateEOModal" id="btnCreateEOModal" data-bs-toggle="modal" data-bs-target="#mdlEarlyOut"> <i class="fa fa-plus"></i> Early Out Form</button> --}}
        </div>

        <div class="row mb-2">
            <div class="col-auto">
                <!-- <h5 class=" mb-0 text-danger">Filter:</h5>    -->
                <form action="" id="frmUpdateEffect">
                    <div class="row mx-1 mb-1">
                        <div class="col-xl-4 col-lg-12 pl-2">
                            <div class="form-floating mb-1">
                                <input class="form-control" id="txtDateFrom" name="date" type="date"
                                    placeholder="-" />
                                <label class="form-check-label" for="txtDateFrom">Date From<label for=""
                                        class="text-danger">*</label></label>
                                <span class="text-danger small error-text effectivity_error"></span>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 pl-2">
                            <div class="form-floating mb-1">
                                <input class="form-control" id="txtDateto" name="date" type="date" placeholder="-" />
                                <label class="form-check-label" for="missionDesc">Date To<label for=""
                                        class="text-danger">*</label></label>
                                <span class="text-danger small error-text effectivity_error"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Content Row lilo -->
        <div class="row mt-2">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="table-responsive border-0">
                                <table class="table table-hover table-border-none" style="text-align: center">
                                    <thead class="bg-danger text-white">
                                        <tr>
                                            <th scope="col">Vacancy</th>
                                            <th scope="col">Total Applied</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tblEarlyOut">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
