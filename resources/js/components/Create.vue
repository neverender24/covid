<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createModal"
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
                          v-model.trim="$v.list.municipality_id.$model"
                          :class="{ 'is-invalid': $v.list.municipality_id.$error }"
                          @change="getBarangays()"
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
                          v-model.trim="$v.list.barangay_id.$model"
                          :class="{ 'is-invalid': $v.list.barangay_id.$error }"
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
                          v-model.trim="$v.list.date_updated.$model"
                          :class="{ 'is-invalid': $v.list.date_updated.$error }"
                          @input="checkIfBarangayEncoded(list.date_updated)"
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
                  v-if="userRole=='Province'"
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
                              v-model.number="list.pum_brgy_completed_quarantine"
                              min="0"
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
                      <label class="col-sm-3 col-form-label text-center">Mild with Co-morbidity</label>
                      <label class="col-sm-3 col-form-label text-center">Severe with Co-morbidity</label>
                      <label class="col-sm-3 col-form-label text-center">Mild w/o Co-morbidity</label>
                      <label class="col-sm-3 col-form-label text-center">Sever w/o Co-morbidity</label>
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
                                @input="compute_pui()"
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
                                @input="compute_pui()"
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
                                @input="compute_pui()"
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
                                @input="compute_pui()"
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
                                @input="compute_pui()"
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
                                @input="compute_pui()"
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
                                @input="compute_pui()"
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
                                @input="compute_pui()"
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
                              readonly
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
                                @input="compute_dis_pui()"
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
                                @input="compute_dis_pui()"
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
                                @input="compute_dis_pui()"
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
                                @input="compute_dis_pui()"
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
                                @input="compute_dis_pui()"
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
                                @input="compute_dis_pui()"
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
                                @input="compute_dis_pui()"
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
                                @input="compute_dis_pui()"
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
                              readonly
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
                                @input="compute_ref_pui()"
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
                                @input="compute_ref_pui()"
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
                                @input="compute_ref_pui()"
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
                                @input="compute_ref_pui()"
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
                                @input="compute_ref_pui()"
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
                                @input="compute_ref_pui()"
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
                                @input="compute_ref_pui()"
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
                                @input="compute_ref_pui()"
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
                              readonly
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PUI in BRGY Referred to hospital -->
              </div>
              <!-- 
  PHO TAB:
              -->
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group row">
                          <label class="col-6 col-form-label">PUI Admitted</label>
                          <div class="col-6">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model="list.pui_admitted"
                            />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">PUI Negative</label>
                          <div class="col-6">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model.number="list.pui_negative"
                              min="0"
                            />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">PUI Recovered</label>
                          <div class="col-6">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model.number="list.pui_recovered"
                              min="0"
                            />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">PUI Deaths</label>
                          <div class="col-6">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model.number="list.pui_deaths"
                              min="0"
                            />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">PUI Probable</label>
                          <div class="col-6">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model.number="list.pui_probable"
                              min="0"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">Covid Positive</label>
                          <div class="col-6">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model="list.covid_positive"
                            />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">Covid Discharged</label>
                          <div class="col-6">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model="list.covid_discharged"
                            />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">Covid Deaths</label>
                          <div class="col-6">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              v-model.number="list.covid_deaths"
                              min="0"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- 
                END PHO TAB
              -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
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
.modal-body {
  padding: 5px 0 !important;
}
.modal-footer {
  padding: unset !important;
}
</style>
 
<script>
import { required } from "vuelidate/lib/validators";

export default {
  props: ['userRole'],
  data() {
    return {
      list: {},
      municipalities: [],
      barangays: []
    };
  },
  mounted() {
    axios.get("get-municipalities").then(response => {
      this.municipalities = response.data;
    });
  },
  methods: {
    getBarangays() {
      console.log();
      axios
        .post("get-barangays", { municipality_id: this.list.municipality_id })
        .then(response => {
          this.barangays = response.data;
        });
    },
    save() {
      this.$v.$touch();
      if (this.$v.$invalid) {
        return false;
      }

      if (
        this.municipality_id == "" ||
        this.barangay_id == "" ||
        this.date_updated == ""
      ) {
        return false;
      }

      axios
        .post("tally", this.list)
        .then(response => {
          this.$snotify.success("Save successfully", "Done");
          this.list = {};
          this.$emit("refresh");
        })
        .catch(error => {
          this.$snotify.error(error.response.data.error, "Error");
        });
    },
    compute_pui() {
      this.list.pui_brgy = 0;
      this.list.pui_brgy = _.sum([
        parseInt(this.list.pui_brgy_mild_elderly_wcom) | 0,
        parseInt(this.list.pui_brgy_mild_elderly_ncom) | 0,
        parseInt(this.list.pui_brgy_mild_notelderly_wcom) | 0,
        parseInt(this.list.pui_brgy_mild_notelderly_ncom) | 0,
        parseInt(this.list.pui_brgy_severe_elderly_wcom) | 0,
        parseInt(this.list.pui_brgy_severe_elderly_ncom) | 0,
        parseInt(this.list.pui_brgy_severe_notelderly_wcom) | 0,
        parseInt(this.list.pui_brgy_severe_notelderly_ncom) | 0
      ]);
    },
    checkIfBarangayEncoded(date) {
      axios
        .post("check-barangay-encoded", {
          date_updated: this.list.date_updated,
          municipality_id: this.list.municipality_id,
          barangay_id: this.list.barangay_id
        })
        .then(response => {
          if (response.data > 0) {
            this.$snotify.error("You already added data to this date", "Error");
          }
        });
    },
    compute_dis_pui() {
      this.list.pui_dis = 0;
      this.list.pui_dis = _.sum([
        parseInt(this.list.pui_dis_mild_elderly_wcom) | 0,
        parseInt(this.list.pui_dis_mild_elderly_ncom) | 0,
        parseInt(this.list.pui_dis_mild_notelderly_wcom) | 0,
        parseInt(this.list.pui_dis_mild_notelderly_ncom) | 0,
        parseInt(this.list.pui_dis_severe_elderly_wcom) | 0,
        parseInt(this.list.pui_dis_severe_elderly_ncom) | 0,
        parseInt(this.list.pui_dis_severe_notelderly_wcom) | 0,
        parseInt(this.list.pui_dis_severe_notelderly_ncom) | 0
      ]);
    },
    compute_ref_pui() {
      this.list.pui_ref = 0;
      this.list.pui_ref = _.sum([
        parseInt(this.list.pui_ref_mild_elderly_wcom) | 0,
        parseInt(this.list.pui_ref_mild_elderly_ncom) | 0,
        parseInt(this.list.pui_ref_mild_notelderly_wcom) | 0,
        parseInt(this.list.pui_ref_mild_notelderly_ncom) | 0,
        parseInt(this.list.pui_ref_severe_elderly_wcom) | 0,
        parseInt(this.list.pui_ref_severe_elderly_ncom) | 0,
        parseInt(this.list.pui_ref_severe_notelderly_wcom) | 0,
        parseInt(this.list.pui_ref_severe_notelderly_ncom) | 0
      ]);
    }
  },
  validations: {
    list: {
      municipality_id: {
        required
      },
      barangay_id: {
        required
      },
      date_updated: {
        required
      }
    }
  }
};
</script>
