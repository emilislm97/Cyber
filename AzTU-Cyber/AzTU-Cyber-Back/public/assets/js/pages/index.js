!function () {
    function r(r, a) {
        for (var o = 0; o < a.length; o++) {
            var e = a[o];
            e.enumerable = e.enumerable || !1, e.configurable = !0, "value" in e && (e.writable = !0), Object.defineProperty(r, e.key, e)
        }
    }
    //Chart.js
    // var a = function () {
    //     function a() {
    //         !function (r, a) {
    //             if (!(r instanceof a)) throw new TypeError("Cannot call a class as a function")
    //         }(this, a)
    //     }
    //
    //     var o, e;
    //     return o = a, e = [{
    //         key: "initChartsBars", value: function () {
    //             Chart.defaults.global.defaultFontColor = "#495057", Chart.defaults.scale.gridLines.color = "transparent", Chart.defaults.scale.gridLines.zeroLineColor = "transparent", Chart.defaults.scale.ticks.beginAtZero = !0, Chart.defaults.global.elements.line.borderWidth = 1, Chart.defaults.global.legend.labels.boxWidth = 12;
    //             var r, a = jQuery(".js-chartjs-analytics-bars");
    //             r = {
    //                 labels: ["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"],
    //                 datasets: [{
    //                     label: "This Week",
    //                     fill: !0,
    //                     backgroundColor: "rgba(6, 101, 208, .6)",
    //                     borderColor: "transparent",
    //                     pointBackgroundColor: "rgba(6, 101, 208, 1)",
    //                     pointBorderColor: "#fff",
    //                     pointHoverBackgroundColor: "#fff",
    //                     pointHoverBorderColor: "rgba(6, 101, 208, 1)",
    //                     data: [73, 68, 69, 53, 60, 72, 82]
    //                 }, {
    //                     label: "Last Week",
    //                     fill: !0,
    //                     backgroundColor: "rgba(6, 101, 208, .2)",
    //                     borderColor: "transparent",
    //                     pointBackgroundColor: "rgba(6, 101, 208, .2)",
    //                     pointBorderColor: "#fff",
    //                     pointHoverBackgroundColor: "#fff",
    //                     pointHoverBorderColor: "rgba(6, 101, 208, .2)",
    //                     data: [62, 32, 59, 55, 52, 56, 73]
    //                 }]
    //             }, a.length && new Chart(a, {
    //                 type: "bar",
    //                 data: r,
    //                 options: {
    //                     tooltips: {
    //                         intersect: !1, callbacks: {
    //                             label: function (r, a) {
    //                                 return a.datasets[r.datasetIndex].label + ": " + r.yLabel + " Customers"
    //                             }
    //                         }
    //                     }
    //                 }
    //             })
    //         }
    //     }, {
    //         key: "init", value: function () {
    //             this.initChartsBars()
    //         }
    //     }], null && r(o.prototype, null), e && r(o, e), a
    // }();
    // jQuery((function () {
    //     a.init()
    // }))
}();
