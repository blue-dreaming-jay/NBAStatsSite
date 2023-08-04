import * as JSC from "https://code.jscharting.com/latest/jscharting.js";

const chart = new JSC.Chart("chartDiv", {
    type: "column",
    series: [
        {
        name: "Teams",
        points: [{ x: "A", y: 10 }, { x: "B", y: 5 }]
        }
    ]
})