let chartBarOrders = document.getElementById("chartBarOrders").getContext("2d");
let chartLineOrders = document
    .getElementById("chartLineOrders")
    .getContext("2d");
let chartBarSales = document.getElementById("chartBarSales").getContext("2d");
let chartLineSales = document.getElementById("chartLineSales").getContext("2d");

// Global Options
Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;
Chart.defaults.global.defaultFontColor = "#777";

let barChartOrders = new Chart(chartBarOrders, {
    type: "bar", // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data: {
        labels: [
            "Febbraio 2021",
            "Marzo 2021",
            "Aprile 2021",
            "Maggio 2021",
            "Giugno 2021",
            "Luglio 2021",
            "Agosto 2021",
            "Settembre 2021",
            "Ottobre 2021",
            "Novembre 2021",
            "Dicembre 2021",
            "Gennaio 2022",
        ],
        datasets: [
            {
                label: "Ordini",
                data: [
                    // somma ciclo for
                    110505, 110000, 153060, 126519, 195162, 165072, 150594,
                    180045, 155060, 210519, 200535, 189899,
                ],
                backgroundColor: [
                    "rgba(255, 99, 132, 0.6)",
                    "rgba(54, 162, 235, 0.6)",
                    "rgba(255, 206, 86, 0.6)",
                    "rgba(75, 192, 192, 0.6)",
                    "rgba(153, 102, 255, 0.6)",
                    "rgba(255, 159, 64, 0.6)",
                    "rgba(255, 99, 132, 0.6)",
                    "rgba(255, 99, 132, 0.6)",
                    "rgba(54, 162, 235, 0.6)",
                    "rgba(255, 206, 86, 0.6)",
                    "rgba(75, 192, 192, 0.6)",
                    "rgba(153, 102, 255, 0.6)",
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
            text: "Le statistiche dei tuoi ordini negli ultimi 12 mesi",
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

let lineChartOrders = new Chart(chartLineOrders, {
    type: "line", // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data: {
        labels: [
            "Febbraio 2021",
            "Marzo 2021",
            "Aprile 2021",
            "Maggio 2021",
            "Giugno 2021",
            "Luglio 2021",
            "Agosto 2021",
            "Settembre 2021",
            "Ottobre 2021",
            "Novembre 2021",
            "Dicembre 2021",
            "Gennaio 2022",
        ],
        datasets: [
            {
                label: "Ordini",
                data: [
                    // somma ciclo for
                    110505, 110000, 153060, 126519, 195162, 165072, 150594,
                    180045, 155060, 210519, 200535, 189899,
                ],
                backgroundColor: ["rgba(54, 162, 235, 0.6)"],
                borderWidth: 1,
                borderColor: "red",
                hoverBorderWidth: 3,
                hoverBorderColor: "#000",
            },
        ],
    },
    options: {
        title: {
            display: true,
            text: "Le statistiche dei tuoi ordini negli ultimi 12 mesi",
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

let barChartSales = new Chart(chartBarSales, {
    type: "bar", // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data: {
        labels: [
            "Febbraio 2021",
            "Marzo 2021",
            "Aprile 2021",
            "Maggio 2021",
            "Giugno 2021",
            "Luglio 2021",
            "Agosto 2021",
            "Settembre 2021",
            "Ottobre 2021",
            "Novembre 2021",
            "Dicembre 2021",
            "Gennaio 2022",
        ],
        datasets: [
            {
                label: "Ricavato",
                data: [
                    // somma ciclo for
                    552525, 502520, 765300, 632595, 975810, 825360, 752970,
                    900225, 775300, 1052595, 1002675, 949495,
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
                    "rgba(255, 99, 132, 0.6)",
                    "rgba(54, 162, 235, 0.6)",
                    "rgba(255, 206, 86, 0.6)",
                    "rgba(75, 192, 192, 0.6)",
                    "rgba(153, 102, 255, 0.6)",
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
            text: "Le statistiche del tuo ricavato negli ultimi 12 mesi",
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

let lineChartSales = new Chart(chartLineSales, {
    type: "line", // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data: {
        labels: [
            "Febbraio 2021",
            "Marzo 2021",
            "Aprile 2021",
            "Maggio 2021",
            "Giugno 2021",
            "Luglio 2021",
            "Agosto 2021",
            "Settembre 2021",
            "Ottobre 2021",
            "Novembre 2021",
            "Dicembre 2021",
            "Gennaio 2022",
        ],
        datasets: [
            {
                label: "Ricavato",
                data: [
                    // somma ciclo for
                    552525, 502520, 765300, 632595, 975810, 825360, 752970,
                    900225, 775300, 1052595, 1002675, 949495,
                ],
                backgroundColor: ["rgba(54, 162, 235, 0.6)"],
                borderWidth: 1,
                borderColor: "red",
                hoverBorderWidth: 3,
                hoverBorderColor: "green",
            },
        ],
    },
    options: {
        title: {
            display: true,
            text: "Le statistiche del tuo ricavato negli ultimi 12 mesi",
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
