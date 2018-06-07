@extends('adminlte::page')

@section('content')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script  type="text/javascript">
  var resultados = {!! $propostas !!};
</script>
<script type="text/javascript">
  google.charts.load("current", {packages:['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var $data = [];
    $data.push(["Element", "Propostas", { role: "style" } ]);
    console.log($data);
    for (var resultado in resultados) {
      $data.push(resultados[resultado]);
    }
    var data = google.visualization.arrayToDataTable($data);

    var view = new google.visualization.DataView(data);
    view.setColumns([
        0,
        1, {
          calc: "stringify",
          sourceColumn: 1,
          type: "string",
          role: "annotation"
        }, 2
      ]
    );

    var options = {
      title: "Propostas Mensais",
      width: 600,
      height: 400,
      bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
    chart.draw(view, options);
}
</script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
@endsection