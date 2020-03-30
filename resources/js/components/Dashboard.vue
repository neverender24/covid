<template>
  <div class="container">
    <div class="row justify-content-center">
      <create @refresh="getData()"></create>
      <edit :list="editData" @refresh="getData()"></edit>
    </div>
    <div class="row">
      <div class="col-8">
          <div class="card">
          <div class="card-header">
            Records
            <button
              class="btn btn-success btn-sm float-right"
              @click="filter= !filter"
            >Filter</button>
            <button class="btn btn-primary btn-sm float-right mr-1" @click="create_record()">Add</button>
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
                  <button class="btn btn-primary btn-sm btn-block" @click="getData()">Go</button>
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
                <tr v-for="item in data" :key="item.id">
                  <td>{{ item.date_updated }}</td>
                  <td>{{ item.barangay.municipality.munname }}</td>
                  <td>{{ item.barangay.brgyname }}</td>
                  <td>
                    <span class="custom_view" @click="edit(item.recid)">Edit</span>
                  </td>
                </tr>
              </tbody>
            </datatable>
            <div class="py-3 d-flex flex-row align-items-center justify-content-between">
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
      <div class="col-4">
        <div class="card mb-3">
          <div class="card-header">Summary</div>
          <Summary></Summary>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
                <line-chart :chart-data="datacollection" :options="options"></line-chart>
      </div>
    </div>
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
.filtercol{
    padding-right: 5px !important;
    padding-left: 5px !important;
}
</style>
<script>
import LineChart from "./charts/LineChart.js";
import Datatable from "../helpers/datatable";
import Pagination from "../helpers/pagination";

import Summary from "./Summary";
import Create from "./Create";
import Edit from "./Edit";

export default {
  components: {
    Summary,
    Create,
    LineChart,
    Datatable,
    Pagination,
    Edit
  },
  data() {
    let sortOrders = {};
    let columns = [
      { width: "25%", label: "Date", name: "date" },
      { width: "35%", label: "Municipality", name: "municipality" },
      { width: "32%", label: "Barangay", name: "barangay" },
      { width: "3%", label: "", name: "action" }
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
        length: 5,
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
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          xAxes: [{ ticks: { beginAtZero: true } }]
        }
      },
      datacollection: {},
      editData: [],
      selectedMun: 0,
      selectedBrgy: 0,
      municipalities: [],
      barangays: [],
      filter: false
    };
  },
  async mounted() {
    this.getData();

    axios.get("get-municipalities").then(response => {
      this.municipalities = response.data;
    });

    var dynamicColors = function() {
      var r = Math.floor(Math.random() * 255);
      var g = Math.floor(Math.random() * 255);
      var b = Math.floor(Math.random() * 255);
      return "rgb(" + r + "," + g + "," + b + ")";
    };

    var municipalityLabels = [
      "Compostela",
      "Monkayo",
      "Maragusan",
      "Mabini",
      "Maco",
      "Nabunturan",
      "Pantukan",
      "Laak",
      "Montevista",
      "New Bataan",
      "Mawab"
    ];
    var municipalityChart = [
      {
        label: "Demography",
        backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(54, 162, 235, 0.2)"],
        borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)"],
        borderWidth: 1,
        data: [65, 50, 35, 67, 21, 55, 21, 66, 33, 76, 22]
      }
    ];

    this.fillDataMunicipality(municipalityChart, municipalityLabels);
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
    fillDataMunicipality(chart, labels) {
      return (this.datacollection = {
        labels: labels,
        datasets: chart,
        tooltips: false
      });
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
    }
  }
};
</script>
