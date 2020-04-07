<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="reportProvModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Province Report</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-5">
              <button class="btn btn-success btn-sm" @click="daily()">Daily</button>
              <button class="btn btn-success btn-sm" @click="perBrgy()">Per Municipality</button>
              <button class="btn btn-success btn-sm" @click="charts()">Charts</button>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- </div> -->
  <!-- end modal -->
</template>
<style>
.card-body {
  padding: 5px !important;
}
.modal-header {
  padding: 5px !important;
}
.modal-footer {
  padding: unset !important;
}
</style>
 
<script>
export default {
  props: ["municipalities"],
  data() {
    return {};
  },
  mounted() {},
  methods: {
    daily() {
      window.open(
        "http://122.54.19.171:8080/jasperserver/flow.html?pp=u%3DJamshasadid%7Cr%3DManager%7Co%3DEMEA,Sales%7Cpa1%3DSweden&_flowId=viewReportFlow&ParentFolderUri=%2Freports&reportUnit=%2Freports%2Fprov_mun_daily&standAlone=true&decorate=no"
      );
    },
    perBrgy() {
      window.open(
        "http://122.54.19.171:8080/jasperserver/flow.html?pp=u%3DJamshasadid%7Cr%3DManager%7Co%3DEMEA,Sales%7Cpa1%3DSweden&_flowId=viewReportFlow&_flowId=viewReportFlow&ParentFolderUri=%2Freports&reportUnit=%2Freports%2Fprovince_mun&standAlone=true&decorate=no"
      );
    },
    charts() {
      window.open(
        "http://122.54.19.171:8080/jasperserver/flow.html?pp=u%3DJamshasadid%7Cr%3DManager%7Co%3DEMEA,Sales%7Cpa1%3DSweden&decorate=no&_flowId=viewReportFlow&ParentFolderUri=%2Freports&reportUnit=%2Freports%2Fprovince_chart&standAlone=true&decorate=no"
      );
    }
  }
};
</script>
