@extends('layout.app')
@section('content')
    <!--SHAIRA-->

    <div class="container-fluid">
        <div class="mb-2">
            <h4 class="text-gray-800 mb-3">Vacancy Management</h4>
        </div>
        <div class="row mb-2">
            <div class="col-xl-4 col-lg-12">
                <button class=" mt-3 btn btn-danger radius-1" name="department" id="btnaddVacancy" data-bs-toggle="modal"
                    data-bs-target="#mdlVacancy"> <i class="fa fa-plus"></i> Position Management</button>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-xl-4 col-lg-12">
                <button class=" mt-3 btn btn-danger radius-1" name="department" id="btnaddVacancy" data-bs-toggle="modal"
                    data-bs-target="#mdlVacancy"> <i class="fa fa-plus"></i> Add Vacancy</button>
            </div>
        </div><br>
        <div class="mb-2">
            <h5 class="text-gray-800 mb-3">Position List</h5>
        </div>
        <!-- Content Row dar -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="table-responsive">
                                <table class="table table-hover table-stripe">
                                    <thead class="bg-danger text-white">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Vacancy</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tblDepartments">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row dar -->

        <div class="modal fade" id="mdlVacancy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: rgb(249 200 200 / 17%);">
            <div class="modal-dialog   modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-danger dragable_touch">
                        <h5 class="modal-title fst-italic text-white title" id="staticBackdropLabel"><label for="">
                                Add Vacancy </label></h5>
                        <button type="button" class="btn-close text-white closereset_update" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="card  mb-3 rounded">
                            <div class="card-body ">
                                <form action="" id="frmPosition">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="position" name="position" type="text"
                                                    placeholder="Position" />
                                                <label for="txtPosition">Position <label for=""
                                                        class="text-danger">*</label></label>
                                                <span class="text-danger small error-text position_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-1">
                                                <input class="form-control" name="vacancies" id="vacancies" type="text"
                                                    placeholder="JobLevel">
                                                <label for="selJobLevel" class="text-muted">Vacancies<label for=""
                                                        class="text-danger">*</label></label>
                                                <span class="text-danger small error-text vacancies_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnSave" type="button" class="btn btn-secondary ">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row dar -->

        <div class="modal fade" id="skill" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: rgb(249 200 200 / 17%);">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-danger dragable_touch">
                        <h5 class="modal-title fst-italic text-white title" id="staticBackdropLabel"><label for="">
                                Manage Skill </label></h5>
                        <button type="button" class="btn-close text-white closereset_update" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="card  mb-3 rounded">
                            <div class="card-body ">
                                <form action="" id="frmskill">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtskill" name="txtskill"
                                                    type="text" placeholder="Position" />
                                                <label for="txtPosition">Skill <label for=""
                                                        class="text-danger">*</label></label>
                                                <span class="text-danger small error-text txtskill_error"></span>

                                            </div>

                                        </div>
                                        <div class="col-lg-2 pt-2">
                                            <button class="btn btn-danger " type="button" id="addSKill"> <i
                                                    class='fa fa-plus'></i> </button>
                                        </div>
                                        <div class="col-xl-12 col-lg-12" style="overflow-y:auto;">
                                            <div class="card mb-4">
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div class="chart-area">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-stripe">
                                                                <thead class="bg-danger text-white">
                                                                    <tr>
                                                                        <th scope="col">Description</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tblskill">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="jd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: rgb(249 200 200 / 17%);">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-danger dragable_touch">
                        <h5 class="modal-title fst-italic text-white title" id="staticBackdropLabel"><label
                                for="">
                                Manage Job Description </label></h5>
                        <button type="button" class="btn-close text-white closereset_update" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="card  mb-3 rounded">
                            <div class="card-body ">
                                <form action="" id="frmjd">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="jdRemark" name="jdRemark"
                                                    type="text" placeholder="Position" />
                                                <label for="txtPosition">Job Description <label for=""
                                                        class="text-danger">*</label></label>
                                                <span class="text-danger small error-text jdRemark_error"></span>

                                            </div>
                                        </div>
                                        <div class="col-lg-2 pt-2">
                                            <button type="button" class=" pt-2 btn btn-danger radius-1"
                                                name="department" id="addJD"> <i class="fa fa-plus"></i> Add
                                            </button>

                                        </div>

                                        <div class="col-xl-12 col-lg-12">
                                            <div class="card mb-4">
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div class="chart-area">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-stripe">
                                                                <thead class="bg-danger text-white">
                                                                    <tr>
                                                                        <th scope="col">Description</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tbljd">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button id="btnupdate" type="button" class="btn btn-secondary ">Update</button> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="mdlViewModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: rgb(249 200 200 / 17%);">
            <div class="modal-dialog   modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-danger dragable_touch">
                        <h5 class="modal-title fst-italic text-white title" id="staticBackdropLabel"><label
                                for="">
                                Overview </label></h5>
                        <button type="button" class="btn-close text-white closereset_update" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="card  mb-3 rounded">
                            <div class="card-body ">
                                <form action="" id="frmPosition">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="posdis" name="posdis" type="text"
                                                    placeholder="Position" />
                                                <label for="txtPosition">Position</label>
                                                <span class="text-danger small error-text posdis_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-1">
                                                <input class="form-control" name="vacdis" id="vacdis" type="text"
                                                    placeholder="JobLevel">
                                                <label for="selJobLevel" class="text-muted">Vacancies</label>
                                                <span class="text-danger small error-text vacdis_error"></span>
                                            </div>
                                        </div>

                                        {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label class="form-check-label" for="skills"> Skills Required <label for="" class="text-danger"></label></label>
                                                <textarea class="form-control" id="skillsdis" name="skillsdis" rows="4" placeholder=""></textarea>
                                                <span class="text-danger small error-text skillsdis_error"></span>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="row">
                                        <h5>JOB DESCRIPTION</h5>
                                        <div class="col-lg-6 Jdesc mb-2">

                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <h5>SKILLS</h5>
                                        <div class="col-lg-6 Vskils mb-2">

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnClose" data-bs-dismiss="modal" type="button"
                            class="btn btn-secondary ">Close</button>
                    </div>
                </div>
            </div>
        </div>





    </div>

    {{-- <script src="{{ asset('js/empscheduler.js') }}" deffer></script> --}}
    <script src="{{ asset('js/position.js') }}" defer></script>
@endsection
