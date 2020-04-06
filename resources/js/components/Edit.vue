<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="editModal"
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label class="col-sm">
                        Municipality
                        <select
                          class="form-control form-control-sm"
                          v-model="list.municipality_id"
                          @change="getBarangays()"
                          required
                        >
                          <option
                            v-for="item in municipalities"
                            v-bind:value="item.recid"
                            v-bind:key="item.recid"
                          >{{ item.munname }}</option>
                        </select>
                      </label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="col-sm">
                        Barangay
                        <select
                          class="form-control form-control-sm"
                          v-model="list.barangay_id"
                          required
                        >
                          <option
                            v-for="item in barangays"
                            v-bind:value="item.recid"
                            v-bind:key="item.recid"
                          >{{ item.brgyname }}</option>
                        </select>
                      </label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="col-sm">
                        Date
                        <input
                          type="date"
                          class="form-control form-control-sm"
                          v-model="list.date_updated"
                          required
                        />
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a
                  class="nav-link active"
                  id="home-tab"
                  data-toggle="tab"
                  href="#home"
                  role="tab"
                  aria-controls="home"
                  aria-selected="true"
                >LGU</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  id="profile-tab"
                  data-toggle="tab"
                  href="#profile"
                  role="tab"
                  aria-controls="profile"
                  aria-selected="false"
                >PHO</a>
              </li>
            </ul>
            <div class="tab-content pt-3" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="home"
                role="tabpanel"
                aria-labelledby="home-tab"
              >
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group row">
                          <label class="col-6 col-form-label">New PUM</label>
                          <div class="col-6">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model="list.pum_brgy"
                            />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">Completed Quarantine</label>
                          <div class="col-6">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model="list.pum_brgy_completed_quarantine"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">Referred to PUI</label>
                          <div class="col-6">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model="list.pum_brgy_referred_pui"
                            />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">PUM Death</label>
                          <div class="col-6">
                            <input type="number" class="form-control form-control-sm" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-center">
                        Mild with Co-morbidity
                      </label>
                      <label class="col-sm-3 col-form-label text-center">
                        Severe with Co-morbidity
                      </label>
                      <label class="col-sm-3 col-form-label text-center">
                        Mild w/o Co-morbidity
                      </label>
                      <label class="col-sm-3 col-form-label text-center">
                        Sever w/o Co-morbidity
                      </label>
                    </div>
                  </div>
                </div>
                <!-- PUI in BRGY -->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Elderly</label>
                      <div class="col-sm-9">
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">A</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_brgy_mild_elderly_wcom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">B</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_brgy_severe_elderly_wcom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">C</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_brgy_mild_elderly_ncom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">D</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_brgy_severe_elderly_ncom"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Not Elderly</label>
                      <div class="col-sm-9">
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">E</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_brgy_mild_notelderly_wcom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">F</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_brgy_severe_notelderly_wcom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">G</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_brgy_mild_notelderly_ncom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">H</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_brgy_severe_notelderly_ncom"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">PUI</label>
                      <div class="col-sm-9">
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model="list.pui_brgy"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUI in BRGY -->
                <!-- PUI in BRGY Discharged -->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Elderly</label>
                      <div class="col-sm-9">
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">A</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_dis_mild_elderly_wcom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">B</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_dis_severe_elderly_wcom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">C</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_dis_mild_elderly_ncom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">D</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_dis_severe_elderly_ncom"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Not Elderly</label>
                      <div class="col-sm-9">
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">E</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_dis_mild_notelderly_wcom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">F</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_dis_severe_notelderly_wcom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">G</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_dis_mild_notelderly_ncom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">H</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_dis_severe_notelderly_ncom"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Discharged PUI</label>
                      <div class="col-sm-9">
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model="list.pui_dis"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUI in BRGY Discharged -->
                <!-- PUI in BRGY Referred to hospital-->
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Elderly</label>
                      <div class="col-sm-9">
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">A</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_ref_mild_elderly_wcom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">B</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_ref_severe_elderly_wcom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">C</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_ref_mild_elderly_ncom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">D</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_ref_severe_elderly_ncom"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Not Elderly</label>
                      <div class="col-sm-9">
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">E</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_ref_mild_notelderly_wcom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">F</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_ref_severe_notelderly_wcom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">G</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_ref_mild_notelderly_ncom"
                              />
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">H</span>
                              </div>
                              <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model="list.pui_ref_severe_notelderly_ncom"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Referred PUI</label>
                      <div class="col-sm-9">
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model="list.pui_ref"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUI in BRGY Referred to hospital -->
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-auto" @click="deleteRecord()">Delete</button>
          <button type="button" class="btn btn-primary mr-auto" @click="save()">Save</button>
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
.modal-body{
    padding: 5px 0 !important;
}
.modal-footer {
    padding: unset !important;
}
</style>
<script>
export default {
  props: ["list"],
  data() {
    return {
      municipalities: [],
      barangays: [],
    };
  },
  mounted() {
    axios.get("get-municipalities").then(response => {
      this.municipalities = response.data;
    });
  },
  watch: {
        "list.municipality_id": function() {
            var self = this;
           axios
        .post("get-barangays", { municipality_id: this.list.municipality_id })
        .then(response => {
          this.barangays = response.data;
        });
        }
    },
  methods: {
    getBarangays() {
      axios
        .post("get-barangays", { municipality_id: this.list.municipality_id })
        .then(response => {
          this.barangays = response.data;
        });
    },
    save() {
      axios.patch("tally/" + this.list.recid, this.list).then(response => {
        this.$snotify.success("Updated successfully", "Done");
        this.$emit("refresh");
      });
    },

    deleteRecord() {
            this.$snotify.confirm(
                "Are you sure you want to delete?",
                "Deletion",
                {
                    position: "centerCenter",
                    backdrop: 0.4,
                    buttons: [
                        {
                            text: "Yes",
                            action: toast => {
                                axios
                                    .delete("tally/" + this.list.recid)
                                    .then(response => {
                                        $("#editModal").modal("hide");
                                        this.$emit("refresh");
                                        this.$snotify.success(
                                            "Deleted successfully",
                                            "Done"
                                        );
                                        this.$snotify.remove(toast.id);
                                    });
                            }
                        },
                        {
                            text: "No",
                            action: toast => {
                                this.$snotify.remove(toast.id);
                            },
                            bold: true
                        }
                    ]
                }
            );
        }
  }
};
</script>
