<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/axios@0.27.0/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<style>
    h2 {
        color: #fff;
    }
</style>

<body class="p3 bg-gradient-danger">

    <div class="container-fluid p-3">
        <div class="mb-2">
            <h2 class="mb-3">Applicant Registration</h2>
        </div>

        <!-- Content Row dar -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card  mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
                        <form id="frmApplicant">
                            <div class="tab-content" id="myTabContent">
                                <!-- home general information -->
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                    aria-labelledby="home-tab" tabindex="0">
                                    <form action="">
                                        <div class="row">
                                            <label for="missionTitle" class="fs-6 fst-italic text-danger py-4">*General
                                                Information*</label>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-1">
                                                    <input class="form-control" id="fname" name="fname"
                                                        type="text" placeholder="First Name" />
                                                    <label for="missionDesc">First Name<label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text fname_error"></span>
                                                </div>

                                                <div class="form-floating mb-1">
                                                    <input class="form-control" id="mname" name="mname"
                                                        type="text" placeholder="Middle Name" />
                                                    <label for="missionDesc">Middle Name<label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text mname_error"></span>
                                                </div>

                                                <div class="form-floating mb-1">
                                                    <input class="form-control" id="lname" name="lname"
                                                        type="text" placeholder="Lastname" />
                                                    <label for="missionDesc">Last Name<label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text lname_error"></span>
                                                </div>
                                                <div class="form-floating mb-1">
                                                    <input class="form-control" id="suffix" name="suffix"
                                                        type="text" placeholder="Suffix" />
                                                    <label for="missionDesc">Suffix</label>
                                                    <span class="text-danger small error-text suffix_error"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 ">
                                                <div class="form-floating mb-1 fs-6">
                                                    <select class="form-control" name="gender" id="gender">
                                                        <option value="Female">Female</option>
                                                        <option value="Male">Male</option>
                                                    </select>
                                                    <label for="missionobjective" class="text-muted">Gender<label
                                                            for="" class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text cross_error"></span>
                                                </div>

                                                <div class="form-floating mb-1">
                                                    <input class="form-control" id="citizenship" name="citizenship"
                                                        type="text" placeholder="Citizenship" />
                                                    <label for="missionDesc">Citizenship<label for=""
                                                            class="text-danger">*</label></label>
                                                    <span
                                                        class="text-danger small error-text citizenship_error"></span>
                                                </div>

                                                <div class="form-floating mb-1">
                                                    <input class="form-control" id="religion" name="religion"
                                                        type="text" placeholder="Religion" />
                                                    <label for="missionDesc">Religion<label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text religion_error"></span>
                                                </div>
                                                <div class="form-floating mb-1">
                                                    <input class="form-control" id="birthdate" name="birthdate"
                                                        type="date" placeholder="Date of birth" />
                                                    <label for="missionDesc">Date of birth<label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text birthdate_error"></span>
                                                </div>
                                                {{-- <div class="form-floating mb-1">
                                                    <input class="form-control" id="txtHomePhone" name="homephone" type="number" placeholder="Home Phone number"/>
                                                    <label for="missionDesc">Home Phone number<label for="" class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text homephone_error"></span>
                                                </div> --}}
                                            </div>

                                            <div class="col-lg-4">


                                                <div class="form-floating mb-1 fs-6">
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Widowed">Widowed</option>
                                                    </select>
                                                    <label for="missionobjective" class="text-muted">Civil
                                                        Status<label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text status_error"></span>
                                                </div>

                                                <div class="form-floating mb-1">
                                                    <input class="form-control" id="mobile" name="mobile"
                                                        type="number" placeholder="Mobile Number" />
                                                    <label for="missionDesc">Mobile Number<label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text mobile_error"></span>
                                                </div>
                                                <div class="form-floating mb-1">
                                                    <input class="form-control" id="email" name="email"
                                                        type="email" placeholder="email" />
                                                    <label for="missionDesc">Email Address<label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text email_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="missionTitle"
                                                class="fs-6 fst-italic text-danger py-4">*Complete Mailing
                                                Address</label>
                                            <div class=" col-lg-4 form-floating mb-1">
                                                <div class="form-floating mb-1">
                                                    <select  class="form-control" name="province" id="province">
                                                    </select>
                                                    <label class="form-check-label" for="inlineCheckbox1">Select Province <label for="" class="text-danger">*</label>									</label>
                                                    <span class="text-danger small error-text province_error"></span>
                                                </div>
                                                <div class="form-floating mb-1">
                                                    <select  class="form-control" name="city" id="city">
                                                    </select>
                                                    <label class="form-check-label" for="inlineCheckbox1">Select City <label for="" class="text-danger">*</label>										</label>
                                                    <span class="text-danger small error-text city_error"></span>
                                                </div>
                                            </div>
                                            {{-- <div class=" col-lg-4 form-floating mb-1 fs-6">
                                                <select class="form-select" aria-label="Default select example"
                                                    id="province" name="province">
                                                    <option value="">-</option>
                                                    @if (count($resultPro) > 0)
                                                        @foreach ($resultPro as $resultPros)
                                                            <option value='{{ $resultPros->id }}'>
                                                                {{ $resultPros->provDesc }}</option>
                                                        @endforeach
                                                    @else
                                                    @endif
                                                </select>
                                                <label for="missionobjective" class="text-muted">Province<label
                                                        for="" class="text-danger">*</label></label>
                                                <span class="text-danger small error-text province_error"></span>
                                                <div class="form-floating mt-1">
                                                    <select class="form-select" aria-label="Default select example"
                                                        id="city" name="city">
                                                        <option value="">-</option>
                                                        @if (count($resultCity) > 0)
                                                            @foreach ($resultCity as $resultCitys)
                                                                <option value='{{ $resultCitys->id }}'>
                                                                    {{ $resultCitys->citymunDesc }}</option>
                                                            @endforeach
                                                        @else
                                                        @endif
                                                    </select>
                                                    <label for="missionDesc">City<label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text city_error"></span>
                                                </div>
                                            </div> --}}
                                            <div class="col-lg-4 ">
                                                <div class="form-floating mb-1">
                                                    <select  class="form-control" name="barangay" id="barangay">

                                                    </select>
                                                    <label class="form-check-label" for="inlineCheckbox1">Select Barangay <label for="" class="text-danger">*</label>									</label>
                                                    <span class="text-danger small error-text barangay_error"></span>
                                                </div>

                                                <div class="form-floating mb-1">
                                                    <input class="form-control" id="street" name="street"
                                                        type="text" placeholder="Street No/Name/Sub" />
                                                    <label for="missionDesc">Street No/Name/Sub</label>
                                                    <span class="text-danger small error-text street_error"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 ">
                                                <div class="form-floating mb-1">
                                                    <input class="form-control" id="zipcode" name="zipcode"
                                                        type="text" placeholder="Zipcode" />
                                                    <label for="missionDesc">Zipcode<label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text zipcode_error"></span>
                                                </div>

                                                <div class="form-floating mb-1">
                                                    <input class="form-control" id="country" name="country"
                                                        type="text" value="Philippines" placeholder="Country" />
                                                    <label for="missionDesc">Country<label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text country_error"></span>
                                                </div>

                                                {{-- <button class="btn btn-danger" id="next">Next</button> --}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-6">
                                                <form action="">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control form-control-lg" id="resume"
                                                            name="resume" type="file" required/>
                                                            <p id="errorMessage" style="color: red; display: none;">Please select a file.</p>
                                                        <label for="formFileLg" class="form-label mb-6">Upload
                                                            Resume</label>
                                                        <span class="text-danger small error-text file_error"></span>
                                                    </div>
                                                    <div class="form-floating mb-1 fs-6">
                                                        <select class="form-control" name="choose" id="choose">
                                                            <option>ALL</option>
                                                            @if (count($result) > 0)
                                                                @foreach ($result as $results)
                                                                    <option value='{{ $results->id }}'>
                                                                        {{ $results->pos }}</option>
                                                                @endforeach
                                                            @else
                                                            @endif
                                                        </select>
                                                        <label for="missionobjective" class="text-muted">Choose
                                                            Position To Apply<label for=""
                                                                class="text-danger">*</label></label>
                                                        <span class="text-danger small error-text choose_error"></span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><br>
                                    </form>
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                    <br>
                                    <button id="btnSubmit" type="button" class="btn btn-danger">Submit</button>
                                    <button id="btnCancel" type="button" onclick="history.back()"
                                        class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/applicant.js') }}" defer></script>
        <script>
            const submitButton = document.getElementById('btnSubmit');
            const errorMessage = document.getElementById('errorMessage');
            submitButton.addEventListener('click', function(event) {
                const fileInput = document.getElementById('resume');
                    if (fileInput.files.length === 0) {
                    errorMessage.style.display = 'block';
                } else {
                    const form = document.getElementById('myForm');
                    form.submit();
                }
            });
        </script>
    </div>

</body>

</html>
