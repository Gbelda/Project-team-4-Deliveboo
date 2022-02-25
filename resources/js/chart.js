let myChartBar = document.getElementById("myChartBar").getContext("2d");
let myChartLine = document.getElementById("myChartLine").getContext("2d");

// Global Options
Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;
Chart.defaults.global.defaultFontColor = "#777";

let barChart = new Chart(myChartBar, {
    type: "bar", // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data: {
        labels: [
            "Gennaio",
            "Febbario",
            "Marzo",
            "Aprile",
            "Maggio",
            "Giugno",
            "Luglio",
            "Agosto",
            "Settembre",
            "Ottobre",
            "Novembre",
            "Dicembre",
        ],
        datasets: [
            {
                label: "Ordini",
                data: [
                    // somma ciclo for
                    417594, 181045, 173060, 186519, 205162, 195072, 200594,
                    280045, 450060, 290519, 179162, 300702,
                ],
                //backgroundColor:'green',
                backgroundColor: [
                    "rgba(255, 99, 132, 0.6)",
                    "rgba(54, 162, 235, 0.6)",
                    "rgba(255, 206, 86, 0.6)",
                    "rgba(75, 192, 192, 0.6)",
                    "rgba(153, 102, 255, 0.6)",
                    "rgba(255, 159, 64, 0.6)",
                    "rgba(255, 99, 132, 0.6)",
                    "rgba(54, 162, 235, 0.6)",
                    "rgba(255, 206, 86, 0.6)",
                    "rgba(75, 192, 192, 0.6)",
                    "rgba(153, 102, 255, 0.6)",
                    "rgba(255, 159, 64, 0.6)",
                ],
                borderWidth: 1,
                borderColor: "#777",
                hoverBorderWidth: 3,
                hoverBorderColor: "#000",
            },
        ],
    },
    options: {
        title: {
            display: true,
            text: "Le statistiche dei tuoi ordini nell'anno corrente",
            fontSize: 25,
        },
        legend: {
            display: true,
            position: "right",
            labels: {
                fontColor: "#000",
            },
        },
        layout: {
            padding: {
                left: 50,
                right: 0,
                bottom: 0,
                top: 0,
            },
        },
        tooltips: {
            enabled: true,
        },
    },
});

let lineChart = new Chart(myChartLine, {
    type: "line", // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data: {
        labels: [
            "2011",
            "2012",
            "2013",
            "2014",
            "2015",
            "2016",
            "2017",
            "2018",
            "2019",
            "2020",
            "2021",
            "2022",
        ],
        datasets: [
            {
                label: "Ordini",
                data: [
                    // somma ciclo for
                    617594, 181045, 153060, 106519, 105162, 95072, 67594,
                    980045, 850060, 190519, 79162, 950702,
                ],
                backgroundColor: "rgba(255, 159, 64, 0.6)",
                borderWidth: 1,
                borderColor: "rgba(54, 162, 235, 0.6)",
                hoverBorderWidth: 3,
                hoverBorderColor: "#000",
            },
        ],
    },
    options: {
        title: {
            display: true,
            text: "Le statistiche dei tuoi ordini negli ultimi 10 anni",
            fontSize: 25,
        },
        legend: {
            display: true,
            position: "right",
            labels: {
                fontColor: "#000",
            },
        },
        layout: {
            padding: {
                left: 50,
                right: 0,
                bottom: 0,
                top: 0,
            },
        },
        tooltips: {
            enabled: true,
        },
    },
});
