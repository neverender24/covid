<template>
    <div class="container">
        <div class="row justify-content-center">
            <create @refresh="getData()" :userRole="userRole"></create>
            <edit :list="editData" @refresh="getData()" :userRole="userRole"></edit>
            <report-prov></report-prov>
            <report-mun :municipalities="municipalities"></report-mun>
            <report-brgy :municipalities="municipalities"></report-brgy>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Records
                        <button
                            class="btn btn-success btn-sm float-right"
                            @click="toggleFilter()"
                        >Filter</button>
                        <button
                            class="btn btn-primary btn-sm float-right mr-1"
                            @click="create_record()"
                        >Add</button>
                        <div class="dropdown float-right mr-1">
                            <button
                                class="btn btn-secondary dropdown-toggle btn-sm"
                                type="button"
                                id="dropdownMenuButton"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Reports</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" @click="reportProvince()">Province</a>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                    @click="reportMunicipality()"
                                >Municipality</a>
                                <a class="dropdown-item" href="#" @click="reportBrgy()">Barangay</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div v-if="filter" class="row mb-2">
                            <div class="col-3 filtercol">
                                <div class="form-group">
                                    <input
                                        type="date"
                                        class="form-control form-control-sm"
                                        v-model="tableData.date_updated"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-3 filtercol">
                                <select
                                    id="filterMunicipality"
                                    class="form-control form-control-sm"
                                    v-model="tableData.municipality_id"
                                    @change="getBarangays()"
                                    required
                                >
                                    <option
                                        v-for="item in municipalities"
                                        v-bind:value="item.recid"
                                        v-bind:key="item.recid"
                                    >{{ item.munname }}</option>
                                </select>
                            </div>
                            <div class="col-3 filtercol">
                                <div class="form-group">
                                    <select
                                        class="form-control form-control-sm"
                                        v-model="tableData.barangay_id"
                                        required
                                    >
                                        <option
                                            v-for="item in barangays"
                                            v-bind:value="item.recid"
                                            v-bind:key="item.recid"
                                        >{{ item.brgyname }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2 filtercol">
                                <div class="form-group">
                                    <button
                                        class="btn btn-primary btn-sm btn-block"
                                        @click="getData()"
                                    >Filter</button>
                                </div>
                            </div>
                        </div>
                        <datatable
                            :columns="columns"
                            :sortKey="sortKey"
                            :sortOrders="sortOrders"
                            @sort="sortBy"
                        >
                            <tbody>
                                <tr v-for="item in data" :key="item.recid">
                                    <td> 
                                        <div class="custom-control custom-checkbox">
                                            <input
                                                type="checkbox"
                                                class="custom-control-input"
                                                :id="'customCheck1'+ item.recid"
                                                :value="item.date_posted!=null"
                                                v-model="selectedTallies"
                                            />
                                            <label class="custom-control-label" :for="'customCheck1'+item.recid"></label>
                                        </div>
                                    </td>
                                    <td>{{ item.date_updated }}</td>
                                    <td>{{ item.barangay.municipality.munname }}</td>
                                    <td>{{ item.barangay.brgyname }}</td>
                                    <td>
                                        <span class="custom_view" @click="edit(item.recid)">Edit</span>
                                    </td>
                                </tr>
                            </tbody>
                        </datatable>
                        <div
                            class="py-3 d-flex flex-row align-items-center justify-content-between"
                        >
                            <pagination
                                :pagination="pagination"
                                @prev="getData(pagination.prevPageUrl)"
                                @next="getData(pagination.nextPageUrl)"
                            ></pagination>
                            <p>{{ pagination.from }} to {{pagination.to}} of {{ pagination.total }} entries</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
      <div class="col-6">
        <bar-chart :chart-data="datacollection" :options="options" :height="200"></bar-chart>
      </div>
      <div class="col-6">
        <bar-chart :chart-data="datacollectionPUI" :options="options" :height="200"></bar-chart>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <line-chart :chart-data="datacollectionDaily" :options="optionsDaily" :height="200"></line-chart>
      </div>
      <div class="col-6">
        <line-chart :chart-data="datacollectionDailyPUI" :options="optionsDaily" :height="200"></line-chart>
      </div>
        </div>-->
    </div>
</template>

<style>
.custom_view {
    display: none;
    cursor: pointer;
}
tr:hover .custom_view {
    display: unset;
}
.create_new {
    cursor: pointer;
    font-weight: bold;
}
.create_new:hover {
    text-decoration: underline;
}
.filtercol {
    padding-right: 5px !important;
    padding-left: 5px !important;
}
</style>
<script>
import LineChart from "./charts/LineChart.js";
import BarChart from "./charts/BarChart.js";
import Datatable from "../helpers/datatable";
import Pagination from "../helpers/pagination";

import Summary from "./Summary";
import Create from "./Create";
import ReportMun from "./ReportsMun";
import ReportProv from "./ReportsProv";
import ReportBrgy from "./ReportsBrgy";
import Edit from "./Edit";

export default {
    components: {
        Summary,
        Create,
        LineChart,
        BarChart,
        Datatable,
        Pagination,
        Edit,
        ReportMun,
        ReportProv,
        ReportBrgy
    },
    data() {
        let sortOrders = {};
        let columns = [
            { width: "10%", name: "check" },
            { width: "20%", name: "date" },
            { width: "20%", name: "municipality" },
            { width: "20%", name: "barangay" },
            { width: "6%",  name: "action" }
        ];
        columns.forEach(column => {
            sortOrders[column.name] = -1;
        });

        return {
            columns: columns,
            sortKey: "id",
            sortOrders: sortOrders,
            tableData: {
                draw: 0,
                length: 10,
                search: "",
                column: 0,
                dir: "desc",
                municipality_id: 0,
                barangay_id: 0,
                date_updated: ""
            },
            pagination: {
                lastPage: "",
                currentPage: "",
                total: "",
                lastPageUrl: "",
                nextPageUrl: "",
                prevPageUrl: "",
                from: "",
                to: ""
            },
            data: {},
            options: {
                reverse: true,
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    xAxes: [{ ticks: { beginAtZero: true } }]
                }
            },
            optionsDaily: {
                reverse: true,
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    xAxes: [{ ticks: { beginAtZero: true, display: false } }]
                }
            },
            datacollection: {},
            datacollectionPUI: {},
            editData: [],
            selectedMun: 0,
            selectedBrgy: 0,
            municipalities: [],
            barangays: [],
            filter: false,
            municipalityLabels: [],
            municipalityLabels2: [],
            municipalityChart1: [
                {
                    label: "PUI Province",
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)"
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)"
                    ],
                    borderWidth: 1,
                    data: []
                }
            ],
            municipalityChart2: [
                {
                    label: "PUM Province",
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)"
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)"
                    ],
                    borderWidth: 1,
                    data: []
                }
            ],

            datacollectionDaily: {},
            datacollectionDailyPUI: {},
            dailyLabels: [],
            dailyLabels2: [],
            dailyChart2: [
                {
                    label: "PUM Daily",
                    backgroundColor: ["rgba(255, 99, 132, 0.2)"],
                    data: []
                }
            ],
            dailyChart1: [
                {
                    label: "PUI Daily",
                    backgroundColor: ["rgba(255, 99, 132, 0.2)"],
                    borderWidth: 1,
                    data: []
                }
            ],
            userRole: "",
            selectedTallies: []
        };
    },
    async mounted() {
        this.getData();
        this.getUser();

        axios.get("get-municipalities").then(response => {
            this.municipalities = response.data;
        });

        var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
        };

        this.processDataMuncipalPUM();
        this.processDataMuncipalPUI();

        this.processDataDailyPUM();
        this.processDataDailyPUI();
    },

    methods: {
        configPagination(data) {
            this.pagination.lastPage = data.last_page;
            this.pagination.currentPage = data.current_page;
            this.pagination.total = data.total;
            this.pagination.lastPageUrl = data.last_page_url;
            this.pagination.prevPageUrl = data.prev_page_url;
            this.pagination.nextPageUrl = data.next_page_url;
            this.pagination.from = data.from;
            this.pagination.to = data.to;
        },
        sortBy(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
            this.tableData.column = this.getIndex(this.columns, "name", key);
            this.tableData.dir = this.sortOrders[key] === 1 ? "asc" : "desc";
            this.getData();
        },
        getIndex(array, key, value) {
            return array.findIndex(i => i[key] == value);
        },
        getData(url = "tally") {
            this.loading = !this.loading;
            axios.get(url, { params: this.tableData }).then(response => {
                let data = response.data;
                if (this.tableData.draw == data.draw) {
                    this.data = data.data.data;
                    this.configPagination(data.data);
                }
                this.loading = !this.loading;
            });
        },
        processDataMuncipalPUM() {
            axios.get("charts-province").then(response => {
                var self = this;
                var groups = _.groupBy(response.data, "mun");
                var result = _.map(groups, function(value, key) {
                    self.municipalityLabels.push(value[0].mun);
                    return {
                        munname: key,
                        total_pum: _.reduce(
                            value,
                            function(total, o) {
                                return (
                                    parseInt(total) + parseInt(o.remaining_pum)
                                );
                            },
                            0
                        )
                    };
                });
                _.forEach(result, function(e) {
                    self.municipalityChart1[0].data.push(e.total_pum);
                });
                this.fillDataMunicipality(
                    this.municipalityChart1,
                    this.municipalityLabels
                );
            });
        },
        processDataMuncipalPUI() {
            axios.get("charts-province").then(response => {
                var self = this;
                var groups = _.groupBy(response.data, "mun");
                var result = _.map(groups, function(value, key) {
                    self.municipalityLabels2.push(value[0].mun);
                    return {
                        munname: key,
                        total_pui: _.reduce(
                            value,
                            function(total, o) {
                                return (
                                    parseInt(total) + parseInt(o.remaining_pui)
                                );
                            },
                            0
                        )
                    };
                });
                _.forEach(result, function(e) {
                    self.municipalityChart2[0].data.push(e.total_pui);
                });
                this.fillDataMunicipalityPUI(
                    this.municipalityChart2,
                    this.municipalityLabels2
                );
            });
        },
        fillDataMunicipality(chart, labels) {
            return (this.datacollection = {
                labels: labels,
                datasets: chart,
                tooltips: false
            });
        },
        fillDataMunicipalityPUI(chart, labels) {
            return (this.datacollectionPUI = {
                labels: labels,
                datasets: chart,
                tooltips: false
            });
        },

        processDataDailyPUI() {
            axios.get("charts-daily").then(response => {
                var self = this;
                var groups = _.groupBy(response.data, "date_updated");
                var result = _.map(groups, function(value, key) {
                    self.dailyLabels.push(value[0].date_updated);
                    return {
                        total_pum: _.reduce(
                            value,
                            function(total, o) {
                                return (
                                    parseInt(total) + parseInt(o.remaining_pum)
                                );
                            },
                            0
                        )
                    };
                });
                self.dailyChart1[0].data = [];
                _.forEach(result, function(e) {
                    self.dailyChart1[0].data.push(e.total_pum);
                });

                this.fillDataDaily(self.dailyChart1, self.dailyLabels);
            });
        },
        processDataDailyPUM() {
            axios.get("charts-daily").then(response => {
                var self = this;
                var groups = _.groupBy(response.data, "date_updated");
                var result = _.map(groups, function(value, key) {
                    self.dailyLabels2.push(value[0].date_updated);
                    return {
                        munname: key,
                        total_pui: _.reduce(
                            value,
                            function(total, o) {
                                return (
                                    parseInt(total) + parseInt(o.remaining_pui)
                                );
                            },
                            0
                        )
                    };
                });
                _.forEach(result, function(e) {
                    self.dailyChart2[0].data.push(e.total_pui);
                });
                this.fillDataDailyPUI(this.dailyChart2, this.dailyLabels2);
            });
        },
        fillDataDaily(chart, labels) {
            return (this.datacollectionDaily = {
                labels: labels,
                datasets: chart,
                tooltips: false
            });
        },
        fillDataDailyPUI(chart, labels) {
            return (this.datacollectionDailyPUI = {
                labels: labels,
                datasets: chart,
                tooltips: false
            });
        },

        reportProvince() {
            $("#reportProvModal").modal("show");
        },

        reportMunicipality() {
            $("#reportMunModal").modal("show");
        },

        reportBrgy() {
            $("#reportBrgyModal").modal("show");
        },

        create_record() {
            $("#createModal").modal("show");
        },
        edit(id) {
            $("#editModal").modal("show");

            axios.get("tally/" + id + "/edit").then(response => {
                this.editData = response.data;
            });
        },
        getBarangays() {
            axios
                .post("get-barangays", {
                    municipality_id: this.tableData.municipality_id
                })
                .then(response => {
                    this.barangays = response.data;
                });
        },
        toggleFilter() {
            this.filter = !this.filter;
            this.tableData.municipality_id = "";
            this.tableData.barangay_id = "";
            this.tableData.date_updated = "";
            this.getData();
        },
        getUser() {
            axios.post("get-user").then(response => {
                this.userRole = response.data;
            });
        }
    }
};
</script>
