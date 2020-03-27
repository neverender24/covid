<template>
    <div class="container">
        <div class="row justify-content-center">
            <Create v-if="false"></Create>
            <line-chart :chart-data="datacollection" :options="options"></line-chart>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">Summary</div>
                    <Summary></Summary>
                </div>
            </div>

            <create></create>
        </div>
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        Records
                        <button class="btn btn-primary btn-sm float-right" @click="create_record()">Add</button>
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import LineChart from "./charts/LineChart.js";

import Summary from "./Summary";
import Create from "./Create";

export default {
    components: {
        Summary,
        Create,
        LineChart
    },
    async mounted() {
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
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)"
                ],
                borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)"],
                borderWidth: 1,
                data: [65, 50, 35, 67, 21, 55, 21, 66, 33, 76, 22]
            }
        ];

        this.fillDataMunicipality(municipalityChart, municipalityLabels);
    },
    data() {
        return {
            data: {},
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    xAxes: [{ ticks: { beginAtZero: true } }]
                }
            },
            datacollection: {}
        };
    },
    methods: {
        fillDataMunicipality(chart, labels) {
            return (this.datacollection = {
                labels: labels,
                datasets: chart,
                tooltips: false
            });
        },
        create_record() {
            $('.modal').modal('show')
        }
    }
};
</script>
