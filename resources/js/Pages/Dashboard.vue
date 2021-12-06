<template>
    <admin-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-1">
            <div class="mx-auto sm:px-0 lg:px-0 row">
                <div class="bg-white pb-1 overflow-hidden shadow-xl sm:rounded-lg col-7">
                    <Apexchart class="pt-1 pl-2" width="740" type="line" :options="chartOptions" :series="series"></Apexchart>
                </div>
                <div class="bg-white width-100 ml-3 pt-5 pb-0 pl-3 overflow-hidden shadow-xl sm:rounded-lg col-4">
                    <Apexchart class="pb-0" type="donut" width="420" :options="pieChartOptions" :series="pieSeries"></Apexchart>
                </div>
            </div>
            <div class="mx-auto mt-3 sm:px-0 lg:px-0 row">
                <div class="bg-white pb-1 overflow-hidden shadow-xl sm:rounded-lg col-7">
                    <Apexchart class="pt-2 pl-2" type="bar" width="740" :options="stackChartOptions" :series="stackSeries"></Apexchart>
                </div>
                <div class="bg-white width-100 ml-3 pt-5 overflow-hidden shadow-xl sm:rounded-lg col-4">
                    <Apexchart class="pt-3" type="area" width="450" :options="areaChartOptions" :series="areaSeries"></Apexchart>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
import Apexchart from "vue3-apexcharts";
import AppLayout from './../Layouts/AppLayout'
import Welcome from './../Jetstream/Welcome'
import AdminLayout from "../Layouts/AdminLayout";

export default {
    props: ['line_data', 'line_series', 'pie_data'],
    components: {
        AdminLayout,
        Apexchart,
        AppLayout,
        Welcome
    },
    data() {
        return {
            series: [{
                name: "Requests",
                data: this.line_series
            }],
            chartOptions: {
                chart: {
                    height: 400,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                title: {
                    text: 'Product Trends by Month',
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: this.line_data,
                }
            },

            pieSeries: this.pie_data,
            pieChartOptions: {
                labels: ["Requested URLs", "Remaning requests"],
                chart: {
                    width: 580,
                    type: 'donut',
                },
                dataLabels: {
                    enabled: false
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            show: false
                        }
                    }
                }],
                legend: {
                    position: 'right',
                    offsetY: 0,
                    height: 230,
                }
            },

            stackSeries: [{
                name: 'Inflation',
                data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
            }],
            stackChartOptions: {
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        dataLabels: {
                            position: 'top', // top, center, bottom
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return val + "%";
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                },

                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    position: 'top',
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        formatter: function (val) {
                            return val + "%";
                        }
                    }

                },
                title: {
                    text: '',
                    floating: true,
                    offsetY: 330,
                    align: 'center',
                    style: {
                        color: '#444'
                    }
                }
            },

            areaSeries: [{
                name: 'series1',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'series2',
                data: [11, 32, 45, 32, 34, 52, 41]
            }],
            areaChartOptions: {
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'datetime',
                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                },
            },

        }
    },
    mounted() {
        console.log(this.pie_data)
    }
}
</script>
