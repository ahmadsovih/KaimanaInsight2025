//Tombol Sidebar mengecil
// Ambil elemen yang diperlukan
const sidenav = document.querySelector("aside");
const sidenavTrigger = document.querySelector("[sidenav-trigger]");
const sidenavClose = document.querySelector("[sidenav-close]");
const burger = sidenavTrigger.querySelector("div");
const topBread = burger.children[0];
const bottomBread = burger.children[2];

// Fungsi toggle sidebar
function toggleSidenav() {
    sidenav.classList.toggle("translate-x-0");
    sidenav.classList.toggle("ml-6");
    sidenav.classList.toggle("shadow-xl");

    const expanded = sidenav.getAttribute("aria-expanded") === "true";
    sidenav.setAttribute("aria-expanded", !expanded);

    // animasi ikon burger
    topBread.classList.toggle("translate-x-[5px]");
    bottomBread.classList.toggle("translate-x-[5px]");
}

// Event klik hamburger
sidenavTrigger.addEventListener("click", toggleSidenav);

// Event klik tombol close
sidenavClose.addEventListener("click", toggleSidenav);

// Klik di luar sidenav untuk menutup
window.addEventListener("click", function (e) {
    if (
        !sidenav.contains(e.target) &&
        !sidenavTrigger.contains(e.target) &&
        sidenav.getAttribute("aria-expanded") === "true"
    ) {
        toggleSidenav();
    }
});

//efek pada navbar
const links = document.querySelectorAll(".nav-link");

links.forEach((link) => {
    link.addEventListener("click", function () {
        links.forEach((l) =>
            l.classList.remove("bg-slate-100", "text-blue-600", "font-semibold")
        );
        this.classList.add("bg-slate-100", "text-blue-600", "font-semibold");
    });
});

// ===========================
// Grafik Garis Kemiskinan
// ===========================
document.addEventListener("DOMContentLoaded", function () {
    const chartGKM = new ApexCharts(document.querySelector("#chartGKM"), {
        chart: { type: "line", height: 350 },
        series: [
            {
                name: "Garis Kemiskinan",
                data: [
                    251812, 278626, 292731, 309655, 327197, 336596, 342293,
                    363581, 386576, 412130, 438991, 450302, 511011, 609865,
                    682231,
                ],
            },
        ],
        xaxis: {
            categories: [
                2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019,
                2020, 2021, 2022, 2023, 2024,
            ],
            title: { text: "Tahun" },
        },
        yaxis: {
            title: { text: "Garis Kemiskinan (Rp)" },
            labels: {
                formatter: (val) => "Rp" + val.toLocaleString("id-ID"),
            },
        },
        tooltip: {
            y: {
                formatter: (val) => "Rp" + val.toLocaleString("id-ID"),
            },
        },
        colors: ["#1e3a8a"], // biru tua
    });
    chartGKM.render();
});

// ===========================
// Grafik Persentase Kemiskinan
// ===========================
const chartP0 = new ApexCharts(document.querySelector("#chartP0"), {
    chart: { type: "line", height: 300 },
    series: [
        {
            name: "TPT",
            data: [
                20.89, 20.84, 18.01, 18.6, 17.65, 17.79, 17.44, 17.22, 16.65,
                16.11, 15.5, 16.04, 15.29, 14.57, 14.41,
            ],
        },
    ],
    xaxis: {
        categories: [
            2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020,
            2021, 2022, 2023, 2024,
        ],
        title: { text: "Tahun" },
    },
    yaxis: {
        min: 8,
        max: 22,
        title: { text: "Persentase (%)" },
        labels: {
            formatter: (val) => val.toFixed(1) + "%",
        },
    },
    tooltip: {
        y: {
            formatter: (val) => val.toFixed(1) + "%",
        },
    },
    colors: ["#1d4ed8"], // biru medium
});
chartP0.render();
// Grafik Garis Kemiskinan x Persentase kemiskinan

const scatterData = [
    { x: 251812, y: 20.89 },
    { x: 278626, y: 20.84 },
    { x: 292731, y: 18.01 },
    { x: 309655, y: 18.6 },
    { x: 327197, y: 17.65 },
    { x: 336596, y: 17.79 },
    { x: 342293, y: 17.44 },
    { x: 363581, y: 17.22 },
    { x: 386576, y: 16.65 },
    { x: 412130, y: 16.11 },
    { x: 438991, y: 15.5 },
    { x: 450302, y: 16.04 },
    { x: 511011, y: 15.29 },
    { x: 609865, y: 14.57 },
    { x: 682231, y: 14.41 },
];

const chartScatter = new ApexCharts(document.querySelector("#chartGKM-P0"), {
    chart: {
        type: "scatter",
        height: 350,
        zoom: { enabled: true, type: "xy" },
    },
    series: [
        {
            name: "GKM vs Persentase Kemiskinan",
            data: scatterData,
        },
    ],
    xaxis: {
        title: { text: "Garis Kemiskinan (Rp)" },
        labels: {
            formatter: (val) => "Rp" + Number(val).toLocaleString("id-ID"),
        },
    },
    yaxis: {
        min: 8,
        max: 22,
        title: { text: "Persentase Kemiskinan (%)" },
        labels: {
            formatter: (val) => val.toFixed(2) + "%",
        },
    },
    tooltip: {
        x: {
            formatter: (val) => "Rp" + Number(val).toLocaleString("id-ID"),
        },
        y: {
            formatter: (val) => val.toFixed(2) + "%",
        },
    },
    colors: ["#1E3A8A"],
});

chartScatter.render();

// Grafik Kedalaman kemiskinan P1
const chartP1 = new ApexCharts(document.querySelector("#chartP1"), {
    chart: {
        type: "line",
        height: 350,
    },
    series: [
        {
            name: "Indeks Kedalaman Kemiskinan (P1)",
            data: [
                4.3, 3.26, 3.3, 2.41, 3.72, 2.99, 4.19, 2.35, 3.4, 4.02, 2.36,
                2.83, 3.32, 3.13, 3.17,
            ],
        },
    ],
    xaxis: {
        categories: [
            2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020,
            2021, 2022, 2023, 2024,
        ],
        title: { text: "Tahun" },
    },
    yaxis: {
        title: { text: "Indeks P1" },
        labels: {
            formatter: (val) => val.toFixed(2),
        },
        min: 0,
    },
    tooltip: {
        y: {
            formatter: (val) => val.toFixed(2),
        },
    },
    colors: ["#2563eb"], // biru tua
});

chartP1.render();

// Grafik Indeks Keparahan Kemiskinan P2

const chartP2 = new ApexCharts(document.querySelector("#chartP2"), {
    chart: {
        type: "line",
        height: 350,
    },
    series: [
        {
            name: "Indeks Keparahan Kemiskinan (P2)",
            data: [
                1.16, 0.69, 0.93, 0.46, 1.02, 0.75, 1.38, 0.48, 1.04, 1.42,
                0.59, 0.73, 1.0, 0.91, 1.01,
            ],
        },
    ],
    xaxis: {
        categories: [
            2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020,
            2021, 2022, 2023, 2024,
        ],
        title: { text: "Tahun" },
    },
    yaxis: {
        title: { text: "Indeks P2" },
        labels: {
            formatter: (val) => val.toFixed(2),
        },
        min: 0,
    },
    tooltip: {
        y: {
            formatter: (val) => val.toFixed(2),
        },
    },
    colors: ["#1e3a8a"], // biru navy tua
});

chartP2.render();

// Grafik Keparahan Kemiskinan Antar Kabkot
const dataP2 = [
    { daerah: "Sorong", nilai: 2.35 },
    { daerah: "Teluk Bintuni", nilai: 2.25 },
    { daerah: "Papua Barat Daya", nilai: 1.59 },
    { daerah: "Manokwari Selatan", nilai: 1.54 },
    { daerah: "Pegunungan Arfak", nilai: 1.38 },
    { daerah: "Fakfak", nilai: 1.35 },
    { daerah: "Papua Barat", nilai: 1.28 },
    { daerah: "Teluk Wondama", nilai: 1.15 },
    { daerah: "Tambrauw", nilai: 1.09 },
    { daerah: "Maybrat", nilai: 1.08 },
    { daerah: "Sorong Selatan", nilai: 1.07 },
    { daerah: "Kaimana", nilai: 1.01 },
    { daerah: "Kota Sorong", nilai: 1.01 },
    { daerah: "Raja Ampat", nilai: 0.87 },
    { daerah: "Manokwari", nilai: 0.82 },
];

// Urutkan dari nilai terendah ke tertinggi
dataP2.sort((a, b) => a.nilai - b.nilai);

// Ambil label dan nilai
const labels = dataP2.map((d) => d.daerah);
const values = dataP2.map((d) => d.nilai);
const colors = dataP2.map((d) =>
    d.daerah === "Kaimana" ? "#1e40af" : "#60a5fa"
);

new ApexCharts(document.querySelector("#chartP2b"), {
    chart: {
        type: "bar",
        height: 500,
    },
    series: [
        {
            name: "Indeks P2",
            data: values,
        },
    ],
    xaxis: {
        categories: labels,
        labels: {
            rotate: -45,
            style: { fontSize: "12px" },
        },
        title: { text: "Kabupaten/Kota" },
    },
    yaxis: {
        title: { text: "Indeks P2" },
        labels: {
            formatter: (val) => val.toFixed(2),
        },
        min: 0,
    },
    plotOptions: {
        bar: {
            borderRadius: 4,
            columnWidth: "55%",
            distributed: true,
            dataLabels: { position: "top" },
        },
    },
    dataLabels: {
        enabled: true,
        formatter: (val) => val.toFixed(2),
        offsetY: -16,
        style: {
            colors: ["#000000"],
            fontWeight: 400,
            fontSize: "10px",
        },
    },

    colors: colors,
    tooltip: {
        y: {
            formatter: (val) => val.toFixed(2),
        },
    },
    legend: { show: false },
}).render();

// ===========================
// Pengeluaran Susenas antar kabkot
// ===========================
const options = {
    chart: {
        type: "bar",
        height: 600,
    },
    series: [
        {
            name: "Pengeluaran per Kapita",
            data: [
                2220877, 1832856, 1832594, 1781795, 1696750, 1650516, 1643488,
                1642730, 1579707, 1511992, 1335871, 1295276, 1269717, 1172997,
                1015974,
            ],
        },
    ],
    xaxis: {
        categories: [
            "Maybrat",
            "Manokwari",
            "Teluk Bintuni",
            "Manokwari Selatan",
            "Kota Sorong",
            "Sorong",
            "Papua Barat",
            "Papua Barat Daya",
            "Kaimana",
            "Fakfak",
            "Raja Ampat",
            "Teluk Wondama",
            "Sorong Selatan",
            "Tambrauw",
            "Pegunungan Arfak",
        ],
    },
    plotOptions: {
        bar: {
            horizontal: true,
            dataLabels: {
                position: "outside",
            },
        },
    },
    dataLabels: {
        enabled: true,
        offsetX: 24,
        formatter: function (val) {
            return `Rp ${val.toLocaleString()}`;
        },
        style: {
            fontSize: "10px",
            colors: ["black"],
        },
    },

    tooltip: {
        y: {
            formatter: function (val) {
                return `Rp ${val.toLocaleString()}`;
            },
        },
    },
};

const chart = new ApexCharts(document.querySelector("#chartPengSus"), options);
chart.render();
// ===========================
// Fungsi Toggle Modal Metadata
// ===========================

function toggleModal(id) {
    const el = document.getElementById(id);
    el.classList.toggle("hidden");
    el.classList.toggle("flex");
}
