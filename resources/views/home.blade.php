@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
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
                              <select id="municipality" class="form-control form-control-sm" name="municipality_id">
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
                              <select id="barangay" class="form-control form-control-sm" name="barangay_id">
                              </select>
                            </div>
                          </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PUI</label>
                            <div class="col-8">
                              <input type="number" class="form-control form-control-sm" name="pui" value="0">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-4 col-form-label">PUM</label>
                            <div class="col-8">
                              <input type="number" class="form-control form-control-sm" name="pum" value="0">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Confirmed</label>
                            <div class="col-sm-8">
                              <input type="number" class="form-control form-control-sm" name="confirmed" value="0">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Death</label>
                            <div class="col-sm-8">
                              <input type="number" class="form-control form-control-sm" name="death" value="0">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Recovered</label>
                            <div class="col-sm-8">
                              <input type="number" class="form-control form-control-sm" name="recovered" value="0">
                            </div>
                          </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
            <div class="card-header">Tally as of <strong>{{ $as_of->updated_at}}</strong></div>

                <div class="card-body">
                    <p>Total PUI: {{$count_pui}} </p>
                    <p>Total PUM: {{$count_pum}} </p>
                    <p>Total Confirmed: {{$count_confirmed}} </p>
                    <p>Total Death: {{$count_death}} </p>
                    <p>Total Recovered: {{$count_recovered}} </p>
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
        $( document ).ready(function() {
            $('#municipality').on('change', function(e){
                var draw_id = e.target.value;
                $.get('get-barangays?municipality_id=' + draw_id, function(data) {
                    $('#barangay').empty();
                    $.each(data, function(index,subCatObj){
                        $('#barangay').append('<option value="'+subCatObj.id+'">'+subCatObj.brgyname+'</option>');
                    });
                });
            });

            $('#municipality_filter').on('change', function(e){
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

                    $.each(data, function(index,subCatObj){
                        pui += parseInt(subCatObj.pui)
                        pum += parseInt(subCatObj.pum)
                        confirmed += parseInt(subCatObj.confirmed)
                        death += parseInt(subCatObj.death)
                        recovered += parseInt(subCatObj.recovered)
                        $('tbody').append(
                                '<tr>'+
                                '<td>'+ subCatObj.brgyname+'</td>'+
                                '<td>'+ subCatObj.pui+'</td>'+
                                '<td>'+ subCatObj.pum+'</td>'+
                                '<td>'+ subCatObj.confirmed+'</td>'+
                                '<td>'+ subCatObj.death+'</td>'+
                                '<td>'+ subCatObj.recovered+'</td>'+
                                '</tr>');
                    });

                    $('tbody').prepend(
                                '<tr class="table-secondary font-weight-bold">'+
                                '<td>Total</td>'+
                                '<td>'+ pui+'</td>'+
                                '<td>'+ pum+'</td>'+
                                '<td>'+ confirmed+'</td>'+
                                '<td>'+ death+'</td>'+
                                '<td>'+ recovered+'</td>'+
                                '</tr>');

                    $('tbody').append(
                                '<tr class="table-secondary font-weight-bold">'+
                                '<td>Total</td>'+
                                '<td>'+ pui+'</td>'+
                                '<td>'+ pum+'</td>'+
                                '<td>'+ confirmed+'</td>'+
                                '<td>'+ death+'</td>'+
                                '<td>'+ recovered+'</td>'+
                                '</tr>');

                                

                });
            });
    });
    </script>
@endsection
