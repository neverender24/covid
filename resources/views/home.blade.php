@extends('layouts.app')

@section('content')

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