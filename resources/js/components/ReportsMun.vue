<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="reportMunModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Municipality Report</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-2 col-form-label">Municipality</label>
            <div class="col-5">
              <select
                id="filterMunicipality"
                class="form-control form-control-sm"
                v-model="municipality_id"
              >
                <option
                  v-for="item in municipalities"
                  v-bind:value="item.recid"
                  v-bind:key="item.recid"
                >{{ item.munname }}</option>
              </select>
            </div>
            <div class="col-5">
              <button class="btn btn-success btn-sm" @click="daily()">Daily</button>
              <button class="btn btn-success btn-sm" @click="perBrgy()">Per Barangay</button>
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
    return {
      date_updated: "",
      municipality_id: ""
    };
  },
  mounted() {},
  methods: {
    daily() {
      if (this.municipality_id == "") {
        alert("select municipality");
        return false;
      }
      var munname = $("#filterMunicipality option:selected").text();
      window.open(
        "http://122.54.19.171:8080/jasperserver/flow.html?pp=u%3DJamshasadid%7Cr%3DManager%7Co%3DEMEA,Sales%7Cpa1%3DSweden&_flowId=viewReportFlow&_flowId=viewReportFlow&ParentFolderUri=%2Freports&reportUnit=%2Freports%2Fcovid_1&standAlone=true&decorate=no&municipality_id=" +
          this.municipality_id +
          "&munname=" +
          munname
      );
    },
    perBrgy() {
      if (this.municipality_id == "") {
        alert("select municipality");
        return false;
      }
      var munname = $("#filterMunicipality option:selected").text();
      window.open(
        "http://122.54.19.171:8080/jasperserver/flow.html?pp=u%3DJamshasadid%7Cr%3DManager%7Co%3DEMEA,Sales%7Cpa1%3DSweden&_flowId=viewReportFlow&_flowId=viewReportFlow&_flowId=viewReportFlow&ParentFolderUri=%2Freports&reportUnit=%2Freports%2Fmun_brgy&standAlone=true&decorate=no&municipality_id=" +
          this.municipality_id +
          "&munname=" +
          munname
      );
    },
  }
};
</script>
