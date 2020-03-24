@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card">
        <div class="card-header">Forms</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <form action="{{ route('tally.store') }}" method="POST">
            @csrf
            {{-- @method('patch') --}}

            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Municipality</label>
              <div class="col-8">
                <select id="municipality" class="form-control form-control-sm" name="municipality_id" required>
                  <option value=""></option>
                  @foreach ($municipalities as $item)
                  <option value="{{ $item->id}}">{{ $item->munname}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Barangay</label>
              <div class="col-8">
                <select id="barangay" class="form-control form-control-sm" name="barangay_id" required>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-4 col-form-label">Date</label>
              <div class="col-8">
                <input type="date" class="form-control form-control-sm" name="date_updated" value="0" required>
              </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">LGU</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">PHO</a>
              </li>
            </ul>
            <div class="tab-content pt-3" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-4 col-form-label">New PUM</label>
                      <div class="col-8">
                        <input type="number" class="form-control form-control-sm" name="brgy_pum" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Completed Quarantine</label>
                      <div class="col-8">
                        <input type="number" class="form-control form-control-sm" name="brgy_completed_quarantine" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Referred to PUI</label>
                      <div class="col-8">
                        <input type="number" class="form-control form-control-sm" name="brgy_referred_pui" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">PUM Death</label>
                      <div class="col-8">
                        <input type="number" class="form-control form-control-sm" name="brgy_pum_death" value="0">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PUI in BRGY -->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">PUI</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="pui_brgy" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Severity</label>
                      <div class="col-sm-8">
                        <select name="pui_brgy_severe" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Severe">Severe</option>
                          <option value="Milde">Mild</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="pui_brgy_elderly" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="pui_brgy_comorbidity" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUI in BRGY -->
                <!-- PUI in BRGY Discharged -->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">PUI Discharged</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="pui_brgy_discharged" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Severity</label>
                      <div class="col-sm-8">
                        <select name="pui_brgy_discharged_severe" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Severe">Severe</option>
                          <option value="Milde">Mild</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="pui_brgy_discharged_elderly" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="pui_brgy_discharged_comorbidity" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUI in BRGY Discharged -->
                <!-- PUI in BRGY Referred to hospital-->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">PUI Referred</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="pui_brgy_referred" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Severity</label>
                      <div class="col-sm-8">
                        <select name="pui_brgy_referred_severe" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Severe">Severe</option>
                          <option value="Milde">Mild</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="pui_brgy_referred_elderly" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="pui_brgy_referred_comorbidity" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUI in BRGY Referred to hospital -->
                <!-- PUI in BRGY Deaths-->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">PUI Deaths</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="pui_brgy_deaths" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Severity</label>
                      <div class="col-sm-8">
                        <select name="pui_brgy_deaths_severe" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Severe">Severe</option>
                          <option value="Milde">Mild</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="pui_brgy_deaths_elderly" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="pui_brgy_deaths_comorbidity" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUI in BRGY Deaths -->

                <!-- PHO TAB -->
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <!-- PUI Admitted -->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">PUI Admitted</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="pui_admitted" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="pui_admitted_elderly" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="pui_admitted_comorbidity" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUI Admitted -->
                <!-- PUI Deaths not confirmed -->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">PUI Death Not Confirmed</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="pui_deaths_nc" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="pui_deaths_nc_elderly" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="pui_deaths_nc_comorbidity" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUI Deths not confirmed -->
                <!-- PUI negative -->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">PUI Negetive</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="pui_negative" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="pui_negative_elderly" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="pui_negative_comorbidity" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUInegative -->
                <!-- PUI Recovered -->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">PUI Recovered</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="pui_recovered" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="pui_recovered_elderly" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="pui_recovered_comorbidity" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUI Recovered -->
                <!-- PUI Deaths negative -->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">PUI Death Negative</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="pui_deaths_n" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="pui_deaths_n_elderly" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="pui_deaths_n_comorbidity" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUI Deths negative -->
                <!-- Covid positive -->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Covid Positive</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="covid_positive" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="covid_positive_elderly" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="covid_positive_comorbidity" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ENDCovid positive -->
                <!-- Covid Deaths -->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Covid Deaths</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="covid_deaths" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="covid_deaths_elderly" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="covid_deaths_comorbidity" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ENDCovid Deaths -->
                <!-- Covid discharged -->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Covid Positive</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="covid_discharged" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="covid_discharged_elderly" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="covid_discharged_comorbidity" id="" class="form-control form-control-sm">
                          <option value="-"></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ENDCovid discharged -->
              </div>
            </div>
            <div class="form-group row pt-2">
              <div class="col-4 offset-4">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-3">
        <div class="card-header">Summary</div>

        <div class="card-body">
          <table class="table table-hover table-sm">
            <tr>
              <td>#PUM to Date:</td>
              <td>{{ $pumToDate}}</td>
            </tr>
            <tr>
              <td>#PUM completed Quarantine:</td>
              <td>{{ $completedQuarantine}}</td>
            </tr>
            <tr>
              <td>#PUI in BIU:</td>
              <td>{{ $puiInBiu}}</td>
            </tr>
            <tr>
              <td>#PUI in Hospitals:</td>
              <td>{{ $puiInHospitals}}</td>
            </tr>
            <tr>
              <td>#PUI Discharged:</td>
              <td>{{ $puiDischarged}}</td>
            </tr>
            <tr>
              <td>#PUIs:</td>
              <td>{{ $puis}}</td>
            </tr>
            <tr>
              <td>#Confirmed Covid:</td>
              <td>{{ $covidPositive}}</td>
            </tr>
            <tr>
              <td>#Confirmed Covid Deaths:</td>
              <td>{{ $covidPositiveDeaths}}</td>
            </tr>
            <tr>
              <td>#PUI Deaths:</td>
              <td>{{ $puiDeaths}}</td>
            </tr>
            <tr>
              <td>#PUM Deaths:</td>
              <td>{{ $pumDeaths}}</td>
            </tr>
          </table>
        </div>
      </div>

      <div class="card">
        <div class="card-header">Filter</div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Municipality</label>
            <div class="col-8">
              <select id="municipality_filter" class="form-control form-control-sm" name="municipality_id">
                <option value=""></option>
                @foreach ($municipalities as $item)
                <option value="{{ $item->id}}">{{ $item->munname}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Municipality Report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Barangay</th>
                  <th>PUI</th>
                  <th>PUM</th>
                  <th>Confirmed</th>
                  <th>Death</th>
                  <th>Recovered</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('footer_scripts')
  <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#municipality').on('change', function(e) {
        var draw_id = e.target.value;
        $.get('get-barangays?municipality_id=' + draw_id, function(data) {
          $('#barangay').empty();
          $.each(data, function(index, subCatObj) {
            $('#barangay').append('<option value="' + subCatObj.id + '">' + subCatObj.brgyname + '</option>');
          });
        });
      });

      $('#municipality_filter').on('change', function(e) {
        $('.modal').modal('show')

        $('.modal-title').text('Municipality of ' + e.target.selectedOptions[0].text + ' Report')
        var draw_id = e.target.value;
        $.get('get-totals?municipality_id=' + draw_id, function(data) {
          $('tbody').empty();
          var pui = 0
          var pum = 0
          var confirmed = 0
          var death = 0
          var recovered = 0

          $.each(data, function(index, subCatObj) {
            pui += parseInt(subCatObj.pui)
            pum += parseInt(subCatObj.pum)
            confirmed += parseInt(subCatObj.confirmed)
            death += parseInt(subCatObj.death)
            recovered += parseInt(subCatObj.recovered)
            $('tbody').append(
              '<tr>' +
              '<td>' + subCatObj.brgyname + '</td>' +
              '<td>' + subCatObj.pui + '</td>' +
              '<td>' + subCatObj.pum + '</td>' +
              '<td>' + subCatObj.confirmed + '</td>' +
              '<td>' + subCatObj.death + '</td>' +
              '<td>' + subCatObj.recovered + '</td>' +
              '</tr>');
          });

          $('tbody').prepend(
            '<tr class="table-secondary font-weight-bold">' +
            '<td>Total</td>' +
            '<td>' + pui + '</td>' +
            '<td>' + pum + '</td>' +
            '<td>' + confirmed + '</td>' +
            '<td>' + death + '</td>' +
            '<td>' + recovered + '</td>' +
            '</tr>');

          $('tbody').append(
            '<tr class="table-secondary font-weight-bold">' +
            '<td>Total</td>' +
            '<td>' + pui + '</td>' +
            '<td>' + pum + '</td>' +
            '<td>' + confirmed + '</td>' +
            '<td>' + death + '</td>' +
            '<td>' + recovered + '</td>' +
            '</tr>');



        });
      });
    });
  </script>
  @endsection