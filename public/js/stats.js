
function make_chart(stat, )
{
    JSC.Chart("chartDiv", {
        type: "column",
        series: [
            {
            name: "Teams",
            points: [{ x: "A", y: 10 }, { x: "B", y: 5 }]
            }
        ]
    }
    )
}

