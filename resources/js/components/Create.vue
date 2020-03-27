<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="exampleModal"
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
                        <form>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Municipality</label>
                                        <div class="col-8">
                                            <select
                                                id="municipality"
                                                class="form-control form-control-sm"
                                                name="municipality_id"
                                                required
                                            >
                                                <option valu></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Barangay</label>
                                        <div class="col-8">
                                            <select
                                                id="barangay"
                                                class="form-control form-control-sm"
                                                name="barangay_id"
                                                required
                                            ></select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 col-form-label">Date</label>
                                        <div class="col-8">
                                            <input
                                                type="date"
                                                class="form-control form-control-sm"
                                                name="date_updated"
                                                required
                                            />
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
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">New PUM</label>
                                                <div class="col-8">
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="brgy_pum"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label"
                                                >Completed Quarantine</label>
                                                <div class="col-8">
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="brgy_completed_quarantine"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label"
                                                >Referred to PUI</label>
                                                <div class="col-8">
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="brgy_referred_pui"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">PUM Death</label>
                                                <div class="col-8">
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="brgy_pum_death"
                                                    />
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
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="pui_brgy"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Severity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Mild</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_brgy_mild"
                                                            />
                                                        </div>
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Severe</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_brgy_severe"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Age Group</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Elderly</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_brgy_elderly"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Not</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_brgy_not_elderly"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Comorbidity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">With</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_brgy_with_comorbidity"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">No</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_brgy_no_comorbidity"
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
                                                <label
                                                    class="col-sm-4 col-form-label"
                                                >PUI Discharged</label>
                                                <div class="col-sm-8">
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="pui_brgy_discharged"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Severity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Mild</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_brgy_discharged_mild"
                                                            />
                                                        </div>
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Severe</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_brgy_discharged_severe"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Age Group</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Elderly</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_brgy_discharged_elderly"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Not</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_brgy_discharged_not_elderly"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Comorbidity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">With</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_brgy_discharged_with_comorbidity"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">No</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_brgy_discharged_no_comorbidity"
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
                                                <label class="col-sm-4 col-form-label">PUI Referred</label>
                                                <div class="col-sm-8">
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="pui_brgy_referred"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Severity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Mild</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_brgy_referred_mild"
                                                            />
                                                        </div>
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Severe</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_brgy_referred_severe"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Age Group</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Elderly</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_brgy_referred_elderly"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Not</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_brgy_referred_not_elderly"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Comorbidity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">With</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_brgy_referred_with_comorbidity"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">No</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_brgy_referred_no_comorbidity"
                                                            />
                                                        </div>
                                                    </div>
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
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="pui_brgy_deaths"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Severity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Mild</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_brgy_deaths_mild"
                                                            />
                                                        </div>
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Severe</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_brgy_deaths_severe"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Age Group</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Elderly</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_brgy_deaths_elderly"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Not</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_brgy_deaths_not_elderly"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Comorbidity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">With</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_brgy_deaths_with_comorbidity"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">No</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_brgy_deaths_no_comorbidity"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PUI in BRGY Deaths -->

                                    <!-- PHO TAB -->
                                </div>
                                <div
                                    class="tab-pane fade"
                                    id="profile"
                                    role="tabpanel"
                                    aria-labelledby="profile-tab"
                                >
                                    <!-- PUI Admitted -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">PUI Admitted</label>
                                                <div class="col-sm-8">
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="pui_admitted"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Age Group</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Elderly</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_admitted_elderly"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Not</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_admitted_not_elderly"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Comorbidity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">With</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_admitted_with_comorbidity"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">No</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_admitted_no_comorbidity"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PUI Admitted -->
                                    <!-- PUI Deaths not confirmed -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label"
                                                >PUI Death Not Confirmed</label>
                                                <div class="col-sm-8">
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="pui_deaths_nc"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Age Group</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Elderly</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_deaths_nc_elderly"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Not</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_deaths_nc_not_elderly"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Comorbidity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">With</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_deaths_nc_with_comorbidity"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">No</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_deaths_nc_no_comorbidity"
                                                            />
                                                        </div>
                                                    </div>
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
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="pui_negative"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Age Group</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Elderly</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_negative_elderly"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Not</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_negative_not_elderly"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Comorbidity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">With</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_negative_with_comorbidity"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">No</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_negative_no_comorbidity"
                                                            />
                                                        </div>
                                                    </div>
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
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="pui_recovered"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Age Group</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Elderly</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_recovered_elderly"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Not</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_recovered_not_elderly"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Comorbidity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">With</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_recovered_with_comorbidity"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">No</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_recovered_no_comorbidity"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PUI Recovered -->
                                    <!-- PUI Deaths negative -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label"
                                                >PUI Death Negative</label>
                                                <div class="col-sm-8">
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="pui_deaths_n"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Age Group</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Elderly</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_deaths_n_elderly"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Not</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_deaths_n_not_elderly"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Comorbidity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">With</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="pui_deaths_n_with_comorbidity"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">No</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="pui_deaths_n_no_comorbidity"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PUI Deths negative -->
                                    <!-- Covid positive -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label"
                                                >Covid Positive</label>
                                                <div class="col-sm-8">
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="covid_positive"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Age Group</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Elderly</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="covid_positive_elderly"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Not</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="covid_positive_not_elderly"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Comorbidity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">With</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="covid_positive_with_comorbidity"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">No</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="covid_positive_no_comorbidity"
                                                            />
                                                        </div>
                                                    </div>
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
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="covid_deaths"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Age Group</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Elderly</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="covid_deaths_elderly"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Not</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="covid_deaths_not_elderly"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Comorbidity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">With</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="covid_deaths_with_comorbidity"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">No</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="covid_deaths_no_comorbidity"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ENDCovid Deaths -->
                                    <!-- Covid discharged -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label"
                                                >Covid Discharged</label>
                                                <div class="col-sm-8">
                                                    <input
                                                        type="number"
                                                        class="form-control form-control-sm"
                                                        name="covid_discharged"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Age Group</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 col-form-label"
                                                        >Elderly</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="covid_discharged_elderly"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Not</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="covid_discharged_not_elderly"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Comorbidity</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">With</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm form-control-block"
                                                                name="covid_discharged_with_comorbidity"
                                                            />
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">No</label>
                                                        <div class="col-sm-3">
                                                            <input
                                                                type="number"
                                                                class="form-control form-control-sm"
                                                                name="covid_discharged_no_comorbidity"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ENDCovid discharged -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mr-auto">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
</template>
 
<script>
export default {
    mounted() {}
};
</script>
