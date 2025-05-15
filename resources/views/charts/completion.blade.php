<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                <script type="text/javascript">
                    var options1 = {
                        chart: {
                            height: 280,
                            type: "radialBar",
                        },
                        series: [{{ $completedRate }}],
                        colors: ["#20E647"],
                        plotOptions: {
                            radialBar: {
                                startAngle: -90,
                                endAngle: 90,
                                track: {
                                    background: '#333',
                                    startAngle: -135,
                                    endAngle: 135,
                                },
                                dataLabels: {
                                    name: {
                                        show: false,
                                    },
                                    value: {
                                        fontSize: "30px",
                                        show: true
                                    }
                                }
                            }
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                shade: "dark",
                                type: "horizontal",
                                gradientToColors: ["#87D4F9"],
                                stops: [0, 100]
                            }
                        },
                        stroke: {
                            lineCap: "butt"
                        },
                        labels: ["Progress"]
                    };

                    new ApexCharts(document.querySelector("#chart1"), options1).render();
                </script>