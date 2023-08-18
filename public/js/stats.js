function make_chart(div, stat, points)
{
    JSC.Chart(div, {
        type: "column",
        series: [
            {
            name: stat,
            points: points
            }
        ]
    }
    )
}

export function chart_gen(main_pointer, keys, sub_pointer, data){
    for (var i=2; i<=main_pointer; i++){
        const div=document.createElement("div");
        div.id=`chartDiv${i}`
        document.body.appendChild(div);

        const name=keys[i];
        var stats=[];

        for (var j=0; j<sub_pointer; j++){
            stats.push({x: `Game${j}`, y: data[j][name]});
        }

        console.log(stats);

        make_chart(`chartDiv${i}`, name, stats);
    }
}


