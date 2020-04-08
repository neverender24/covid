<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="reportBrgyModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Barangay Report</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-3 col-form-label">Municipality</label>
            <div class="col-3">
              <select
                id="munName"
                class="form-control form-control-sm"
                v-model="municipality_id" 
                @change="getBarangays()"
              >
                <option
                  v-for="item in municipalities"
                  v-bind:value="item.recid"
                  v-bind:key="item.recid"
                >{{ item.munname }}</option>
              </select>
            </div>
            <div class="col-3">
                <select
                id="brgyName"
                  class="form-control form-control-sm"
                  v-model="barangay_id"
                  required
                >
                  <option
                    v-for="item in barangays"
                    v-bind:value="item.recid"
                    v-bind:key="item.recid"
                  >{{ item.brgyname }}</option>
                </select>
            </div>
            <div class="col-3">
              <button class="btn btn-success btn-sm" @click="daily()">Daily</button>
              <button class="btn btn-success btn-sm" @click="chart()">Chart</button>
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
      municipality_id: "",
      barangay_id: "",
      barangays: []
    };
  },
  mounted() {},
  methods: {
    daily() {
      if (this.municipality_id == "") {
        alert("select municipality");
        return false;
      }
      var munname = $("#munName option:selected").text();
      var brgyname = $("#brgyName option:selected").text();
      window.open(
        "http://122.54.19.171:8080/jasperserver/flow.html?pp=u%3DJamshasadid%7Cr%3DManager%7Co%3DEMEA,Sales%7Cpa1%3DSweden&_flowId=viewReportFlow&_flowId=viewReportFlow&_flowId=viewReportFlow&ParentFolderUri=%2Freports&reportUnit=%2Freports%2Fbrgy_daily&standAlone=true&decorate=no&municipality_id=" +
          this.municipality_id +
          "&munname=" + munname + 
          "&barangay_id=" + this.barangay_id +
          "&brgyname=" + brgyname
      );
    },
    chart() {
      if (this.municipality_id == "") {
        alert("select municipality");
        return false;
      }
      var munname = $("#munName option:selected").text();
      var brgyname = $("#brgyName option:selected").text();
      window.open(
        "http://122.54.19.171:8080/jasperserver/flow.html?pp=u%3DJamshasadid%7Cr%3DManager%7Co%3DEMEA,Sales%7Cpa1%3DSweden&_flowId=viewReportFlow&_flowId=viewReportFlow&_flowId=viewReportFlow&ParentFolderUri=%2Freports&reportUnit=%2Freports%2Fbrgy_chart&standAlone=true&decorate=no&municipality_id=" +
          this.municipality_id +
          "&munname=" + munname + 
          "&barangay_id=" + this.barangay_id +
          "&brgyname=" + brgyname
      );
    },
    getBarangays() {
      axios
        .post("get-barangays", {
          municipality_id: this.municipality_id
        })
        .then(response => {
          this.barangays = response.data;
        });
    }
  }
};
</script>
