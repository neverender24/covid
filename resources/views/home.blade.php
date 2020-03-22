@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
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
                    <input type="date" class="form-control form-control-sm" name="date_updated" value="0">
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
                <div class="form-group row">
                  <label class="col-4 col-form-label">PUM</label>
                  <div class="col-8">
                    <input type="number" class="form-control form-control-sm" name="pum" value="0">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Completed Quarantine</label>
                  <div class="col-8">
                    <input type="number" class="form-control form-control-sm" name="completed_quarantine" value="0">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Referred to PUI</label>
                  <div class="col-8">
                    <input type="number" class="form-control form-control-sm" name="referred_pui" value="0">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Referred to Hospital</label>
                  <div class="col-8">
                    <input type="number" class="form-control form-control-sm" name="referred_hospital" value="0">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">PUI</label>
                  <div class="col-8">
                    <input type="number" class="form-control form-control-sm" name="pui_mlgu" value="0">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-4 col-form-label">Discharged</label>
                  <div class="col-8">
                    <input type="number" class="form-control form-control-sm" name="discharged_mlgu" value="0">
                  </div>
                </div>


              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Confirmed</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="confirmed" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Severity</label>
                      <div class="col-sm-8">
                        <select name="confirmed_severe" id="" class="form-control form-control-sm">
                          <option value=""></option>
                          <option value="Severe">Severe</option>
                          <option value="Milde">Mild</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="confirmed_elderly" id="" class="form-control form-control-sm">
                          <option value=""></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="confirmed_comorbidity" id="" class="form-control form-control-sm">
                          <option value=""></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Death</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="death" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Severity</label>
                      <div class="col-sm-8">
                        <select name="death_severe" id="" class="form-control form-control-sm">
                          <option value=""></option>
                          <option value="Severe">Severe</option>
                          <option value="Milde">Mild</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Age Group</label>
                      <div class="col-sm-8">
                        <select name="death_elderly" id="" class="form-control form-control-sm">
                          <option value=""></option>
                          <option value="Elderly">Elderly</option>
                          <option value="Elderly">Non-Elderly</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Comorbidity</label>
                      <div class="col-sm-8">
                        <select name="death_comorbidity" id="" class="form-control form-control-sm">
                          <option value=""></option>
                          <option value="With Comorbidity">With Comorbidity</option>
                          <option value="Without Comorbidity">Without Comorbidity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Recovered</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control form-control-sm" name="recovered" value="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-4 col-form-label">Discharged</label>
                      <div class="col-8">
                        <input type="number" class="form-control form-control-sm" name="discharged_pho" value="0">
                      </div>
                    </div>
                  </div>
                </div>
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
      <div class="card">
        <div class="card-header">Summary</div>

        <div class="card-body">
          Some easy stat here...
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