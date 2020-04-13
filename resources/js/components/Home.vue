<template>
    <div class="container">
        <div class="row justify-content-center">
            <report-prov></report-prov>
            <report-mun :municipalities="municipalities"></report-mun>
            <report-brgy :municipalities="municipalities"></report-brgy>
        </div>
        <section class="">
            <div class="container text-center">
                <span class="hero-banner-icon">
                    <i class="flaticon-sing"></i>
                </span>
                <p>Get the Latest Report</p>
                <h1>COVID-19 TRACKER</h1>
                <a class="button button-header" href="#" @click="reportProvince()">Provincial</a>
                <a class="button button-header" href="#" @click="reportMunicipality()">Municipal</a>
                <a class="button button-header" href="#" @click="reportBrgy()">Barangay</a>
            </div>
        </section>
    </div>
</template>


<script>
import ReportMun from "./ReportsMun";
import ReportProv from "./ReportsProv";
import ReportBrgy from "./ReportsBrgy";
export default {
    components: {
        ReportMun,
        ReportProv,
        ReportBrgy
    },
    data() {
        return {
                  municipalities: [],
      barangays: []
        }
    },
    mounted() {
        axios.get("get-municipalities").then(response => {
            this.municipalities = response.data;
        });
    },

    methods: {
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
        }
    }
};
</script>
