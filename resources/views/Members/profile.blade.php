@extends('layout.app')
@section('content')
<div class="container-fluid">

  {{-- JOHN MARC CASQUIO  --}}

    <div class="card mb-3 p-5" style="">
        <div class="row g-2">
          <div class="col-lg-2 col-md-4 text-center">
            <img src="https://miro.medium.com/max/600/1*PiHoomzwh9Plr9_GA26JcA.png" alt="profile" class="img-thumbnail rounded-circle d-flex" id="imgProfile">
          </div>
          <div class="col-lg-10 col-md-8 mt-4">
            <div class="card-body">
              <h2 class="card-title">Ramon Gemana</h2>
              <h4 class="card-text">IT Supervisor</h4>
              <p class="card-text">Back End</p>
              <p class="card-text">
                <button class="btn btn-info text-white"><i class="fa-solid fa-print"></i></button>
                <button class="btn btn-danger text-white"><i class="fa-solid fa-pen-to-square"></i></button>
                <button class="btn btn-success text-white"><i class="fa-solid fa-key"></i></button>
              </p>
            </div>
          </div>
        </div>
    </div>
    <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="true">Contact Information</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="educational-tab" data-bs-toggle="tab" data-bs-target="#educational" type="button" role="tab" aria-controls="educational" aria-selected="false">Educational Background</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="employment-tab" data-bs-toggle="tab" data-bs-target="#employment" type="button" role="tab" aria-controls="employment" aria-selected="false">Employment Details</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="compliance-tab" data-bs-toggle="tab" data-bs-target="#compliance" type="button" role="tab" aria-controls="compliance" aria-selected="false">Compliance Document Data</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="E201-tab" data-bs-toggle="tab" data-bs-target="#E201" type="button" role="tab" aria-controls="E201" aria-selected="false">E201 Files</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card p-5">

                    <div class="card mb-3">
                      <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">
                                        <strong>Address</strong>
                                    </h6>
                                </div>
                                <div class="col-sm-9">
                                    B15 L4 LESSANDRA HOMES KAYPIAN CSJDM San Jose Del Monte Bulacan 3023 Philippines
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                  <h6 class="mb-0">
                                      <strong>Date of Birth</strong>
                                  </h6>
                              </div>
                              <div class="col-sm-9">
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
                              <div class="col-sm-9">
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
                              <div class="col-sm-9">
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
                              <div class="col-sm-9">
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
                              <div class="col-sm-9">
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
                              <div class="col-sm-9">
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
                              <div class="col-sm-9">
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
                              <div class="col-sm-9">
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
                              <div class="col-sm-9">
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
                              <div class="col-sm-9">
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
                              <div class="col-sm-9">
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
                              <div class="col-sm-9">
                                09364414116
                              </div>
                            </div>
                      </div>
                    </div>
                {{-- </div> --}}

            </div>
        </div>

        <div class="tab-pane fade" id="educational" role="tabpanel" aria-labelledby="educational-tab">

          <div class="card p-5">

            <div class="card mb-3">

              <div class="card-body">
                <table class="table table-responsive p-3">
                  <thead>
                    <tr>
                      <th scope="col" ></th>
                      <th scope="col" class="col-lg-3">School</th>
                      <th scope="col" class="col-lg-3">Year Started</th>
                      <th scope="col" class="col-lg-3">Year End</th>
                      <th scope="col" class="col-lg-3">School Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="col">Primary</td>
                      <td>OQUENDO NATIONAL ELEMENTARY SCHOOL 	</td>
                      <td>2000</td>
                      <td>2006</td>
                      <td>OQUENDO CALBAYOG CITY SAMAR</td>
                    </tr>

                    <tr>
                      <th scope="col">Secondary</td>
                      <td>OQUENDO NATIONAL HIGH SCHOOL</td>
                      <td>2006</td>
                      <td>2010</td>
                      <td>OQUENDO CALBAYOG CITY SAMAR</td>
                    </tr>

                    <tr>
                      <th scope="col">Tertiary</td>
                      <td>NORTHWEST SAMAR STATE UNIVERSITY</td>
                      <td>2010</td>
                      <td>2015</td>
                      <td>CALBAYOG CITY SAMAR</td>
                    </tr>

                  </tbody>
                </table>
              </div>

            </div>

          </div>
        </div>

        <div class="tab-pane fade" id="employment" role="tabpanel" aria-labelledby="employment-tab">

          <div class="card p-5">

            <div class="card mb-3">
              <div class="card-body">

                <div class="row">

                  <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="col-lg-12">
                      <i class="fa-solid fa-briefcase"></i><strong> IT Supervisor/ </strong><span class="text-secondary">Current</span>
                    </div>
                    <div class="col-lg-12">
                      <p class="text-secondary">
                        SysAd Department
                      </p>
                    </div>
                    <div class="col-lg-12">
                      <p class="text-secondary">
                        2021-02-19
                      </p>
                    </div>
                    <div class="col-lg-12">
                      <i class="fa-solid fa-briefcase"></i><strong> / </strong><span class="text-secondary">Current</span>
                    </div>

                  </div>

                  <div class="col-lg-8 col-md-8 col-sm-12">

                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">
                              <strong>Employee ID </strong>
                          </h6>
                      </div>
                      <div class="col-sm-9">
                          WeDoinc-0010
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">
                              <strong>HMO Number </strong>
                          </h6>
                      </div>
                      <div class="col-sm-9">
                          1
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">
                              <strong>HMO Provider </strong>
                          </h6>
                      </div>
                      <div class="col-sm-9">

                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">
                              <strong>Status </strong>
                          </h6>
                      </div>
                      <div class="col-sm-9">
                          Employed
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">
                              <strong>Classification</strong>
                          </h6>
                      </div>
                      <div class="col-sm-9">
                        Back-End
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">
                              <strong>Department</strong>
                          </h6>
                      </div>
                      <div class="col-sm-9">
                        SysAd Department
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">
                              <strong>Job Level</strong>
                          </h6>
                      </div>
                      <div class="col-sm-9">
                        Supervisory
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">
                              <strong>Position</strong>
                          </h6>
                      </div>
                      <div class="col-sm-9">
                        IT Supervisor
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">
                              <strong>Immediate</strong>
                          </h6>
                      </div>
                      <div class="col-sm-9">
                        Mark Reolester Ledesma Llapitan
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">
                              <strong>Date Hired</strong>
                          </h6>
                      </div>
                      <div class="col-sm-9">
                        2021-02-19
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">
                              <strong>Date Resigned</strong>
                          </h6>
                      </div>
                      <div class="col-sm-9">
                        2021-02-05
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">
                              <strong>Salary Details</strong>
                          </h6>
                      </div>
                      <div class="col-sm-9">
                        <button class="btn" id="btnShowSalary"><i class="fa-solid fa-arrow-down"></i></button>
                        <button class="btn d-none" id="btnHideSalary"><i class="fa-solid fa-arrow-up"></i></button>
                      </div>
                    </div>
                    <hr>
                    <div class="d-none" id="salaryDetails">
                      <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">
                                <strong>Basic</strong>
                            </h6>
                        </div>
                        <div class="col-sm-9">
                          222, 000.00
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">
                                <strong>Allowance</strong>
                            </h6>
                        </div>
                        <div class="col-sm-9">
                          0.00
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">
                                <strong>Hourly Rate</strong>
                            </h6>
                        </div>
                        <div class="col-sm-9">
                          0.00
                        </div>
                      </div>
                      <hr>
                    </div>

                    <div class="card-title"><strong class="text-danger mt-5">Work Schedule</strong></div>
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th scope="col">Monday</th>
                          <th scope="col">Tuesday</th>
                          <th scope="col">Wednesday</th>
                          <th scope="col">Thursday</th>
                          <th scope="col">Friday</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>08:00 AM-08:00 PM </td>
                          <td>08:00 AM-08:00 PM </td>
                          <td>08:00 AM-08:00 PM </td>
                          <td>08:00 AM-08:00 PM </td>
                          <td>Rest Day</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>


              </div>
            </div>

          </div>

        </div>

        <div class="tab-pane fade" id="compliance" role="tabpanel" aria-labelledby="compliance-tab">

          <div class="card p-5">
            <div class="card mb-3">
              <div class="card-body">

                <div class="row">
                  <div class="col-sm-3">
                      <h6 class="mb-0">
                          <strong>Passport Number</strong>
                      </h6>
                  </div>
                  <div class="col-sm-9">
                    P1721998A
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                      <h6 class="mb-0">
                          <strong>PAG-IBIG</strong>
                      </h6>
                  </div>
                  <div class="col-sm-9">
                    1211-503-3276-8
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                      <h6 class="mb-0">
                          <strong>PHILHEALTH</strong>
                      </h6>
                  </div>
                  <div class="col-sm-9">
                    0102-582-2305-0
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                      <h6 class="mb-0">
                          <strong>SSS Number</strong>
                      </h6>
                  </div>
                  <div class="col-sm-9">
                    3452-505-309
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                      <h6 class="mb-0">
                          <strong>TIN</strong>
                      </h6>
                  </div>
                  <div class="col-sm-9">
                    471-087-632-000
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                      <h6 class="mb-0">
                          <strong>UMID</strong>
                      </h6>
                  </div>
                  <div class="col-sm-9">
                    011189439287
                  </div>
                </div>
                <hr>

              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="E201" role="tabpanel" aria-labelledby="E201-tab">

          <div class="card p-5">
            <div class="card mb-3">
              <div class="card-body">
                <h3>EMPTY</h3>
              </div>
            </div>
          </div>
        </div>

      </div>

</div>

<script src="{{ asset('js/201.js') }}" defer></script>
<script>
  $(document).ready(function(){

    $(document).on('click', '#btnShowSalary', function(e){
      $('#salaryDetails').removeClass("d-none").addClass("d-block");
      $('#btnShowSalary').hide();
      $('#btnHideSalary').removeClass("d-none").addClass("d-block");
    });

    $(document).on('click', '#btnHideSalary', function(e){
      $('#salaryDetails').removeClass("d-block").addClass("d-none");
      $('#btnShowSalary').show();
      $('#btnHideSalary').removeClass("d-block").addClass("d-none");
    });

  })
</script>
@endsection
