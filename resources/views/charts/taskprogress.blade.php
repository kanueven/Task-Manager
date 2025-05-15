<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript">
    var options1 = {
        chart: {
            height: 280,
            type: "donut",
        },
        labels: ["Completed", "Pending", "In Progress"],
        series: [{{ $completedTasks ?? 0 }}, {{ $pendingTasks ?? 0 }}, {{ $inProgressTasks ?? 0 }}],
        colors: ["#20E647", "#FF8C00", "#007BFF"],

        legend: {
            position: 'bottom'
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 300
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    new ApexCharts(document.querySelector("#chart1"), options1).render();
</script>
