<div  class="p-4 bg-white shadow-lg" id="linechartClients"></div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var populationClients = <?php echo $populationClients; ?>;
    console.log(populationClients);
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(lineChart);

    function lineChart() {
        var data = google.visualization.arrayToDataTable(populationClients);
        var options = {
            title: 'Clients',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('linechartClients'));
        chart.draw(data, options);
    }
</script>
