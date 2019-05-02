/*-------------------------------------------------------------------
[Charts Custom JS] - [Table of contents]

1. CHARTJS - BAR CHART VERTICAL
2. CHARTJS - LINE CHART
    2.1. BITCOIN IN CIRCULATION (index.html)
    2.2. ETHEREUM IN CIRCULATION (index.html) 
    2.3. NEO IN CIRCULATION (index.html)
    2.4. BTN VS ETN VS NEO (index.html)
    2.5. BITCOIN POTENTIAL (dashboard-v2.html)
    2.6. BITCOIN VS ETHEREUM POTENTIAL (dashboard-v2.html)
    2.7. BTN VS ETN VS NEO (dashboard-v2.html)
    2.8. BITCOIN IN CIRCULATION (dashboard-v2.html)
    2.9. BTN VS ETH MARKET PRICE (USD) (dashboard-v2.html)
    2.10. EXCHANGE TRADE VOLUME (dashboard-v2.html)
    2.11. BITCOIN IN CIRCULATION (dashboard-light.html)
    2.12. ETHEREUM IN CIRCULATION (dashboard-light.html) 
    2.13. NEO IN CIRCULATION (dashboard-light.html)
    2.14. BTN VS ETN VS NEO (dashboard-light.html)
    2.15. BITCOIN POTENTIAL (dashboard-v2-light.html)
    2.16. BITCOIN VS ETHEREUM POTENTIAL (dashboard-v2-light.html)
    2.17. BTN VS ETN VS NEO (dashboard-v2-light.html)
    2.18. BITCOIN IN CIRCULATION (dashboard-v2-light.html)
    2.19. BTN VS ETH MARKET PRICE (USD) (dashboard-v2-light.html)
    2.20. EXCHANGE TRADE VOLUME (dashboard-v2-light.html)
3. CHARTJS - LINE POINT SIZES
4. CHARTJS - LINE STYLE CHART
5. Sparkline charts - mini charts
6. HIGHCHARTS
    6.1. EXCHANGE BTC
    6.2. DASHBOARD BTC CIRCULATION
    6.3. MARKET PRICE USD
    6.4. MARKET CAPITALIZATION
    6.5. USD EXCHANGE TRADE VOLUME
    6.6. BLOCKCHAIN SIZE
    6.7. AVERAGE BLOCK SIZE
    6.8. ORPHANED BLOCKS
    6.9. TRANSACTIONS PER BLOCK
    6.10. CHART LTC 
    6.11. CHART ETH 
    6.12. CHART NEO 
    6.13. CHART DASH
    6.14. CHART RIPPLE
------------------------------------------------------------------- */
/*---------------------------------------------*/
/*--- 1. CHARTJS - BAR CHART VERTICAL ---*/
/*---------------------------------------------*/
"use strict";
function cryptic_bar_chart_vertical() {
    var color = Chart.helpers.color;
    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: 'Dataset 1',
            labelColor:"#fff",
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
        }, {
            label: 'Dataset 2',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
        }]
    };

    var ctx = document.getElementById("bar_chart_vertical").getContext("2d");
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            legend: {
                position: 'top',
                labels: {
                    fontColor: "white"
                }
            },
            title: {
                display: true,
                text: 'Chart.js Bar Chart',
                fontColor:"#fff"
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      fontSize: 14,
                      fontWeight: "lighter"
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      fontSize: 14,
                      fontWeight: "lighter"
                    }
                }]
            }
        }
    });
}
if ($('#bar_chart_vertical').length) {
    cryptic_bar_chart_vertical();
} 

/*---------------------------------------------*/ 
/*--- 2. CHARTJS - LINE CHART ---*/ 
/*---------------------------------------------*/

/*---------------------------------------------*/ 
/*--- 2.1 CHARTJS - LINE CHART - BITCOIN IN CIRCULATION (index.html) ---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_btc_cir_new() {
    var config2g = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor:'#FFFFFF',
                backgroundColor: 'transparent',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2g = document.getElementById("bitcoin_cir_new").getContext("2d");
    window.chart2g = new Chart(ctx2g, config2g);
}
if ($('#bitcoin_cir_new').length) {
    cryptic_line_chart_btc_cir_new();
}
/*---------------------------------------------*/ 
/*--- 2.2 CHARTJS - LINE CHART - ETHEREUM IN CIRCULATION (index.html)---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_eth_cir() {
    var config2h = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Ethereum ",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: 'transparent',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#479cea", "#479cea", "#479cea", "#479cea", "#479cea", "#479cea"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        }, 
        options: {
            legend: {
                labels: {
                    fontColor: "white"
                }
            },
            scales: {
                legend: {
                    labels: {
                        fontColor: "white"
                    }
                },
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2h = document.getElementById("ethereum_cir").getContext("2d");
    window.chart2h = new Chart(ctx2h, config2h);
}
if ($('#ethereum_cir').length) {
    cryptic_line_chart_eth_cir();
}
/*---------------------------------------------*/ 
/*--- 2.3 CHARTJS - LINE CHART - NEO IN CIRCULATION (index.html)---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_neo_cir() {
    var config2i = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "NEO ",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: 'transparent',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#459aab", "#459aab", "#459aab", "#459aab", "#459aab", "#459aab"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2i = document.getElementById("neo_cir").getContext("2d");
    window.chart2i = new Chart(ctx2i, config2i);
}
if ($('#neo_cir').length) {
    cryptic_line_chart_neo_cir();
}
/*---------------------------------------------*/ 
/*--- 2.4 CHARTJS - LINE CHART - BTN VS ETN VS NEO (index.html) ---*/
/*---------------------------------------------*/
function cryptic_line_chart_btc_eth_neo_white() {
    var config2j = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: '#ffffff',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "Ethereum",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: '#ffffff',
                data: [0, 0.75, 1, 1.75, 2.5, 3],
                pointBackgroundColor: ["#479cea", "#479cea", "#479cea", "#479cea", "#479cea", "#479cea"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "NEO ",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: '#ffffff',
                data: [0, 2, 0.75, 1.5, 2, 4],
                pointBackgroundColor: ["#459aab", "#459aab", "#459aab", "#459aab", "#459aab", "#459aab"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                labels: {
                    fontColor: "white"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2j = document.getElementById("btn_etn_neo_white").getContext("2d");
    window.chart2j = new Chart(ctx2j, config2j);
}
if ($('#btn_etn_neo_white').length) {
    cryptic_line_chart_btc_eth_neo_white();
} 
/*---------------------------------------------*/ 
/*--- 2.5 CHARTJS - LINE CHART - BITCOIN POTENTIAL (dashboard-v2.html)---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_btc_pot() {
    var config2a = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: "transparent",
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2a = document.getElementById("bitcoin_potential").getContext("2d");
    window.chart2a = new Chart(ctx2a, config2a);
}
if ($('#bitcoin_potential').length) {
    cryptic_line_chart_btc_pot();
}
/*---------------------------------------------*/ 
/*--- 2.6 CHARTJS - LINE CHART - BITCOIN VS ETHEREUM POTENTIAL (dashboard-v2.html)---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_btc_eth() {
    var config2b = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: "transparent",
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "Ethereum",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: "transparent",
                data: [0, 0.75, 1, 1.75, 2.5, 3],
                pointBackgroundColor: ["#479cea", "#479cea", "#479cea", "#479cea", "#479cea", "#479cea"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2b = document.getElementById("bitcoin_ethereum").getContext("2d");
    window.chart2b = new Chart(ctx2b, config2b);
}
if ($('#bitcoin_ethereum').length) {
    cryptic_line_chart_btc_eth();
}
/*---------------------------------------------*/ 
/*--- 2.7 CHARTJS - LINE CHART - BTN VS ETN VS NEO (dashboard-v2.html)---*/
/*---------------------------------------------*/
function cryptic_line_chart_btc_eth_neo() {
    var config2c = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: "transparent",
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "Ethereum",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: "transparent",
                data: [0, 0.75, 1, 1.75, 2.5, 3],
                pointBackgroundColor: ["#479cea", "#479cea", "#479cea", "#479cea", "#479cea", "#479cea"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "NEO ",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: "transparent",
                data: [0, 2, 0.75, 1.5, 2, 4],
                pointBackgroundColor: ["#459aab", "#459aab", "#459aab", "#459aab", "#459aab", "#459aab"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2c = document.getElementById("btn_etn_neo").getContext("2d");
    window.chart2c = new Chart(ctx2c, config2c);
}
if ($('#btn_etn_neo').length) {
    cryptic_line_chart_btc_eth_neo();
}
/*---------------------------------------------*/ 
/*--- 2.8 CHARTJS - LINE CHART - BITCOIN IN CIRCULATION (dashboard-v2.html)---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_btc_cir() {
    var config2d = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: "transparent",
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2d = document.getElementById("bitcoin_cir").getContext("2d");
    window.chart2d = new Chart(ctx2d, config2d);
}
if ($('#bitcoin_cir').length) {
    cryptic_line_chart_btc_cir();
} 
/*---------------------------------------------*/ 
/*--- 2.9 CHARTJS - LINE CHART - BTN VS ETH MARKET PRICE (USD) (dashboard-v2.html)---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_btc_eth_mp() {
    var config2e = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: "transparent",
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "Ethereum",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: "transparent",
                data: [0, 0.75, 1, 1.75, 2.5, 3],
                pointBackgroundColor: ["#479cea", "#479cea", "#479cea", "#479cea", "#479cea", "#479cea"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2e = document.getElementById("bitcoin_ethereum_mp").getContext("2d");
    window.chart2e = new Chart(ctx2e, config2e);
}
if ($('#bitcoin_ethereum_mp').length) {
    cryptic_line_chart_btc_eth_mp();
} 
/*---------------------------------------------*/ 
/*--- 2.10 CHARTJS - LINE CHART - EXCHANGE TRADE VOLUME (dashboard-v2.html)---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_exc() {
    var config2f = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: "transparent",
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "Ethereum",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: "transparent",
                data: [0, 0.75, 1, 1.75, 2.5, 3],
                pointBackgroundColor: ["#479cea", "#479cea", "#479cea", "#479cea", "#479cea", "#479cea"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "NEO",
                fill: false,
                borderColor: '#ffffff',
                backgroundColor: "transparent",
                data: [0, 2, 0.75, 1.5, 2, 4],
                pointBackgroundColor: ["#459aab", "#459aab", "#459aab", "#459aab", "#459aab", "#459aab"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2f = document.getElementById("exchange_trade").getContext("2d");
    window.chart2f = new Chart(ctx2f, config2f);
}
if ($('#exchange_trade').length) {
    cryptic_line_chart_exc();
}
/*---------------------------------------------*/ 
/*--- 2.11 CHARTJS - LINE CHART - BITCOIN IN CIRCULATION (dashboard-light.html)  ---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_btc_cir_light() {
    var config2k = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor:'#202020',
                backgroundColor: 'transparent',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }],

        },
        options: {
            legend: {
                labels: {
                    fontColor: "#202020"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: '#fff'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(32,32,32,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2k = document.getElementById("bitcoin_cir_light").getContext("2d");
    window.chart2k = new Chart(ctx2k, config2k);
}
if ($('#bitcoin_cir_light').length) {
    cryptic_line_chart_btc_cir_light();
}
/*---------------------------------------------*/ 
/*--- 2.12 CHARTJS - LINE CHART - ETHERUM IN CIRCULATION (dashboard-light.html) ---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_eth_light() {
    var config2l = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Ethereum ",
                fill: false,
                borderColor: '#202020',
                backgroundColor: 'transparent',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#479cea", "#479cea", "#479cea", "#479cea", "#479cea", "#479cea"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        }, 
        options: {
            legend: {
                labels: {
                    fontColor: "#202020"
                }
            },
            scales: {
                legend: {
                    labels: {
                        fontColor: "#202020"
                    }
                },
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: '#ffffff'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(32,32,32,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2l = document.getElementById("ethereum_cir_light").getContext("2d");
    window.chart2l = new Chart(ctx2l, config2l);
}
if ($('#ethereum_cir_light').length) {
    cryptic_line_chart_eth_light();
} 
/*---------------------------------------------*/ 
/*--- 2.13 CHARTJS - LINE CHART - NEO IN CIRCULATION (dashboard-light.html) ---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_neo_light() {
    var config2m = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "NEO ",
                fill: false,
                borderColor: '#202020',
                backgroundColor: 'transparent',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#459aab", "#459aab", "#459aab", "#459aab", "#459aab", "#459aab"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "#202020"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: '#ffffff'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(32,32,32,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2m = document.getElementById("neo_cir_light").getContext("2d");
    window.chart2m = new Chart(ctx2m, config2m);
}
if ($('#neo_cir_light').length) {
    cryptic_line_chart_neo_light();
}
/*---------------------------------------------*/ 
/*--- 2.14 CHARTJS - LINE CHART - BTN VS ETN VS NEO (dashboard-light.html)---*/
/*---------------------------------------------*/
function cryptic_line_chart_btc_eth_neo_light() {
    var config2n = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#202020',
                backgroundColor: '#202020',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "Ethereum",
                fill: false,
                borderColor: '#202020',
                backgroundColor: '#202020',
                data: [0, 0.75, 1, 1.75, 2.5, 3],
                pointBackgroundColor: ["#479cea", "#479cea", "#479cea", "#479cea", "#479cea", "#479cea"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "NEO ",
                fill: false,
                borderColor: '#202020',
                backgroundColor: '#202020',
                data: [0, 2, 0.75, 1.5, 2, 4],
                pointBackgroundColor: ["#459aab", "#459aab", "#459aab", "#459aab", "#459aab", "#459aab"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                labels: {
                    fontColor: "#202020"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: '#ffffff'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(32,32,32,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2n = document.getElementById("btn_etn_neo_light").getContext("2d");
    window.chart2n = new Chart(ctx2n, config2n);
}
if ($('#btn_etn_neo_light').length) {
    cryptic_line_chart_btc_eth_neo_light();
}
/*---------------------------------------------*/ 
/*--- 2.15 CHARTJS - LINE CHART - BITCOIN IN POTENTIAL (dashboard-v2-light.html) ---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_btc_pot_light() {
    var config2o = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#202020',
                backgroundColor: "transparent",
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "#202020"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: '#ffffff'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(32,32,32,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2o = document.getElementById("bitcoin_potential_light").getContext("2d");
    window.chart2o = new Chart(ctx2o, config2o);
}
if ($('#bitcoin_potential_light').length) {
    cryptic_line_chart_btc_pot_light();
}
/*---------------------------------------------*/ 
/*--- 2.16 CHARTJS - LINE CHART - BTN VS ETH POTENTIAL (dashboard-v2-light.html) ---*/
/*---------------------------------------------*/
function cryptic_line_chart_btc_eth_light() {
    var config2p = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#202020',
                backgroundColor: 'transparent',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "Ethereum",
                fill: false,
                borderColor: '#202020',
                backgroundColor: 'transparent',
                data: [0, 0.75, 1, 1.75, 2.5, 3],
                pointBackgroundColor: ["#479cea", "#479cea", "#479cea", "#479cea", "#479cea", "#479cea"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "#202020"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: '#ffffff'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(32,32,32,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2p = document.getElementById("bitcoin_ethereum_light").getContext("2d");
    window.chart2p = new Chart(ctx2p, config2p);
}
if ($('#bitcoin_ethereum_light').length) {
    cryptic_line_chart_btc_eth_light();
}
/*---------------------------------------------*/ 
/*--- 2.17 CHARTJS - LINE CHART - BTN VS ETN VS NEO (dashboard-v2-light.html) ---*/
/*---------------------------------------------*/
function cryptic_line_chart_btc_eth_neo_white_new() {
    var config2r = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#202020',
                backgroundColor: 'transparent',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "Ethereum",
                fill: false,
                borderColor: '#202020',
                backgroundColor: 'transparent',
                data: [0, 0.75, 1, 1.75, 2.5, 3],
                pointBackgroundColor: ["#479cea", "#479cea", "#479cea", "#479cea", "#479cea", "#479cea"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "NEO ",
                fill: false,
                borderColor: '#202020',
                backgroundColor: 'transparent',
                data: [0, 2, 0.75, 1.5, 2, 4],
                pointBackgroundColor: ["#459aab", "#459aab", "#459aab", "#459aab", "#459aab", "#459aab"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "#202020"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: '#ffffff'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(32,32,32,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2r = document.getElementById("btn_etn_neo_light_new").getContext("2d");
    window.chart2r = new Chart(ctx2r, config2r);
}
if ($('#btn_etn_neo_light_new').length) {
    cryptic_line_chart_btc_eth_neo_white_new();
}
/*---------------------------------------------*/ 
/*--- 2.18 CHARTJS - LINE CHART - BITCOIN IN CIRCULATION (dashboard-v2-light.html) ---*/ 
/*---------------------------------------------*/
function cryptic_line_chart_btc_cir_light_v2() {
    var config2s = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor:'#202020',
                backgroundColor: 'transparent',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }],

        },
        options: {
            legend: {
                labels: {
                    fontColor: "#202020"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: '#fff'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(32,32,32,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2s = document.getElementById("bitcoin_cir_light_V2").getContext("2d");
    window.chart2s = new Chart(ctx2s, config2s);
}
if ($('#bitcoin_cir_light_V2').length) {
    cryptic_line_chart_btc_cir_light_v2();
}
/*---------------------------------------------*/ 
/*--- 2.19 CHARTJS - LINE CHART - BTN VS ETH MARKET PRICE (USD) (dashboard-v2-light.html)---*/
/*---------------------------------------------*/
function cryptic_line_chart_btc_eth_mp_light() {
    var config2t = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#202020',
                backgroundColor: 'transparent',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "Ethereum",
                fill: false,
                borderColor: '#202020',
                backgroundColor: 'transparent',
                data: [0, 0.75, 1, 1.75, 2.5, 3],
                pointBackgroundColor: ["#479cea", "#479cea", "#479cea", "#479cea", "#479cea", "#479cea"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "#202020"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: '#ffffff'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(32,32,32,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2t = document.getElementById("bitcoin_ethereum_mp_light").getContext("2d");
    window.chart2t = new Chart(ctx2t, config2t);
}
if ($('#bitcoin_ethereum_mp_light').length) {
    cryptic_line_chart_btc_eth_mp_light();
}
/*---------------------------------------------*/ 
/*--- 2.20 CHARTJS - LINE CHART - EXCHANGE TRADE (dashboard-v2-light.html) ---*/
/*---------------------------------------------*/
function cryptic_line_chart_exc_light() {
    var config2u = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor: '#202020',
                backgroundColor: 'transparent',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5", "#303bf5"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "Ethereum",
                fill: false,
                borderColor: '#202020',
                backgroundColor: 'transparent',
                data: [0, 0.75, 1, 1.75, 2.5, 3],
                pointBackgroundColor: ["#479cea", "#479cea", "#479cea", "#479cea", "#479cea", "#479cea"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }, {
                label: "NEO ",
                fill: false,
                borderColor: '#202020',
                backgroundColor: 'transparent',
                data: [0, 2, 0.75, 1.5, 2, 4],
                pointBackgroundColor: ["#459aab", "#459aab", "#459aab", "#459aab", "#459aab", "#459aab"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "#202020"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: '#ffffff'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(32,32,32,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(32,32,32,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2u = document.getElementById("exchange_trade_light_v2").getContext("2d");
    window.chart2u = new Chart(ctx2u, config2u);
}
if ($('#exchange_trade_light_v2').length) {
    cryptic_line_chart_exc_light();
}

function cryptic_line_chart() {
    var config2v = {
        type: 'line',
        data: {
            labels: ["2016", "2016", "2016", "2017", "2017", "2018"],
            datasets: [{
                label: "Bitcoin ",
                fill: false,
                borderColor:'#FFFFFF',
                backgroundColor: 'transparent',
                data: [0, 1.5, 2.5, 2, 3, 5],
                pointBackgroundColor: ["#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1", "#645bf1"],
                pointBorderColor: ["#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff", "#ffffff"]
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white"
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }],
                yAxes: [{
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    },
                    gridLines: {
                      color: 'rgba(255,255,255,0.3)'
                    }
                }]
            } 
        }
    };
    var ctx2v = document.getElementById("line_chart").getContext("2d");
    window.chart2v = new Chart(ctx2v, config2v);
}
if ($('#line_chart').length) {
    cryptic_line_chart();
}

/*---------------------------------------------*/ 
/*--- 3. CHARTJS - LINE POINT SIZES ---*/ 
/*---------------------------------------------*/
function cryptic_line_point_sizes() {
    var config = {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "dataset - big points",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                fill: false,
                borderDash: [5, 5],
                pointRadius: 15,
                pointHoverRadius: 10,
            }, {
                label: "dataset - individual point sizes",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                backgroundColor: window.chartColors.blue,
                borderColor: window.chartColors.blue,
                fill: false,
                borderDash: [5, 5],
                pointRadius: [2, 4, 6, 18, 0, 12, 20],
            }, {
                label: "dataset - large pointHoverRadius",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                backgroundColor: window.chartColors.green,
                borderColor: window.chartColors.green,
                fill: false,
                pointHoverRadius: 30,
            }, {
                label: "dataset - large pointHitRadius",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                backgroundColor: window.chartColors.yellow,
                borderColor: window.chartColors.yellow,
                fill: false,
                pointHitRadius: 20
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
                labels: {
                    fontColor: "white"
                }
            },
            hover: {
                mode: 'index'
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month',
                        fontColor: "#fff"
                    },
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value',
                        fontColor: "#fff"
                    },
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    }
                }]
            },
            title: {
                display: true,
                text: 'Chart.js Line Chart - Different point sizes',
                fontColor: "#fff"
            }
        }
    };
    var ctx = document.getElementById("line_point_sizes").getContext("2d");
    window.myLine = new Chart(ctx, config);
}
if ($('#line_point_sizes').length) {
    cryptic_line_point_sizes();
} 
/*---------------------------------------------*/ 
/*--- 4. CHARTJS - LINE STYLE CHART ---*/ 
/*---------------------------------------------*/
function cryptic_line_style_chart() {
    var config = {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "Unfilled",
                fill: false,
                backgroundColor: window.chartColors.blue,
                borderColor: window.chartColors.blue,
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
            }, {
                label: "Dashed",
                fill: false,
                backgroundColor: window.chartColors.green,
                borderColor: window.chartColors.green,
                borderDash: [5, 5],
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
            }, {
                label: "Filled",
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                fill: true,
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white"
                }
            },
            responsive: true,
            title: {
                display: true,
                text: 'Chart.js Line Chart',
                fontColor: "#fff"
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month',
                        fontColor: "#fff"
                    },
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value',
                        fontColor: "#fff"
                    },
                    ticks: {
                      fontColor: "rgba(255,255,255,0.8)", // this here
                      stepSize: 1,
                      fontSize: 14,
                      fontWeight: "lighter"
                    }
                }]
            }
        }
    };
    
    var ctx = document.getElementById("line_styles_chart").getContext("2d");
    window.myLine = new Chart(ctx, config);
}
if ($('#line_styles_chart').length) {
    cryptic_line_style_chart();
} 
/*---------------------------------------------*/ 
/*--- 5. Sparkline charts - mini charts ---*/ 
/*---------------------------------------------*/
function cryptic_sparkline_charts() {
    $('.sparklines').sparkline('html');
}
if ($('.sparklines').length) {
    cryptic_sparkline_charts();
} 
/*---------------------------------------------*/ 
/*--- 6. HIGHCHARTS ---*/ 
/*---------------------------------------------*/
/* EXCHANGE BTC */
function cryptic_highcharts_btc() {
    if ($('#chart_btc').length) {
        jQuery('#chart_btc').highcharts({
            title: {
                text: '',
                x: 0
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            chart: {
                spacingBottom: 0,
                spacingTop: 0,
                margin: [0, -20, 0, -20]
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                ticks: {
                    min: 0,
                    max: 85
                },
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                borderColor: '#FFDD90',
                borderRadius: '3',
                borderWidth: '1',
                backgroundColor: '#FFFAD3',
                formatter: function() {
                    return '<strong>' + this.y + '</strong>';
                }
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: '#5a54be',
                    lineWidth: 3,
                    marker: {
                        enabled: true,
                        fillColor: '#FFF',
                        lineColor: '#9a97d7',
                        lineWidth: 2
                    },
                    color: "#9a97d7",
                    shadow: false,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: '',
                type: 'area',
                color: '#9a97d7',
                data: [760, 760, 770, 780, 760, 780, 780, 790, 790, 790, 790, 820]
            }]
        });
    }
}
cryptic_highcharts_btc(); 
/* DASHBOARD BTC CIRCULATION */
function cryptic_bitcoin_circulation() {
    if ($('#bitcoin-circulation').length) {
        jQuery('#bitcoin-circulation').highcharts({
            title: {
                text: '',
                x: 0
            },
            tooltip: {
                enabled: false
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: 'rgba(48,157,245, 0.4)',
                    lineWidth: 3,
                    marker: {
                        enabled: false,
                        fillColor: 'transparent',
                        lineColor: '#F3CCA3',
                        lineWidth: 2
                    },
                    color: "#F3CCA3",
                    shadow: true,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: 'BTC',
                type: 'area',
                color: '#303bf5',
                data: [16200000, 16300000, 16400000, 16500000, 16600000, 16700000, 16800000, 16900000, 17000000, 17100000, 17200000, 17300000]
            }]
        });
    }
}
cryptic_bitcoin_circulation();
/* MARKET PRICE USD */
function cryptic_market_price_usd() {
    if ($('#market_price_usd').length) {
        jQuery('#market_price_usd').highcharts({
            title: {
                text: '',
                x: 0
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: 'rgba(48,157,245, 0.4)',
                    lineWidth: 3,
                    marker: {
                        enabled: false,
                        fillColor: '#FFF',
                        lineColor: '#F3CCA3',
                        lineWidth: 2
                    },
                    color: "#F3CCA3",
                    shadow: true,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: '',
                type: 'area',
                color: '#303bf5',
                data: [1012, 952, 1206, 1821, 2400, 2276, 2665, 2793, 2059, 2265, 3424, 4850, 3978, 5506, 5647, 7198, 5716, 7817, 9718, 16502, 14870.16808, 16679, 19290, 16048, 14119, 15999, 14640, 14717, 11345, 12951, 11504, 6839, 9335]
            }]
        });
    }
}
cryptic_market_price_usd();
/* MARKET CAPITALIZATION */
function cryptic_market_capitalization() {
    if ($('#market_capitalization').length) {
        jQuery('#market_capitalization').highcharts({
            title: {
                text: '',
                x: 0
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: 'rgba(48,157,245, 0.4)',
                    lineWidth: 3,
                    marker: {
                        enabled: false,
                        fillColor: '#FFF',
                        lineColor: '#F3CCA3',
                        lineWidth: 2
                    },
                    color: "#F3CCA3",
                    shadow: true,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: '',
                type: 'area',
                color: '#303bf5',
                data: [1012, 952, 1206, 1821, 2400, 2276, 2665, 2793, 2059, 2265, 3424, 4850, 3978, 5506, 5647, 7198, 5716, 7817, 9718, 16502, 14870.17808, 17679, 19290, 16048, 14119, 18999, 14640, 14717, 11345, 12951, 11504, 6839, 9335]
            }]
        });
    }
}
cryptic_market_capitalization();
/* USD EXCHANGE TRADE VOLUME */
function cryptic_usd_exchange_trade_volume() {
    if ($('#market_usd_exchange_trade_volume').length) {
        jQuery('#market_usd_exchange_trade_volume').highcharts({
            title: {
                text: '',
                x: 0
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: 'rgba(48,157,245, 0.4)',
                    lineWidth: 3,
                    marker: {
                        enabled: false,
                        fillColor: '#FFF',
                        lineColor: '#F3CCA3',
                        lineWidth: 2
                    },
                    color: "#F3CCA3",
                    shadow: true,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: '',
                type: 'area',
                color: '#303bf5',
                data: [1010, 950, 1020, 970, 2000, 970, 1800.900, 10000, 980, 15000, 1800, 5000, 900, 4000, 10000, 980, 11000, 800]
            }]
        });
    }
}
cryptic_usd_exchange_trade_volume();
/* BLOCKCHAIN SIZE */
function cryptic_blockchain_size() {
    if ($('#blockchain_size').length) {
        jQuery('#blockchain_size').highcharts({
            title: {
                text: '',
                x: 0
            },
            tooltip: {
                enabled: false
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: 'rgba(48,157,245, 0.4)',
                    lineWidth: 3,
                    marker: {
                        enabled: false,
                        fillColor: '#FFF',
                        lineColor: '#F3CCA3',
                        lineWidth: 2
                    },
                    color: "#F3CCA3",
                    shadow: true,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: 'BTC',
                type: 'area',
                color: '#303bf5',
                data: [16200000, 16300000, 16400000, 16500000, 16600000, 16700000, 16800000, 16900000, 17000000, 17100000, 17200000, 17300000]
            }]
        });
    }
}
cryptic_blockchain_size();
/* AVERAGE BLOCK SIZE */
function cryptic_average_block_size() {
    if ($('#average_block_size').length) {
        jQuery('#average_block_size').highcharts({
            title: {
                text: '',
                x: 0
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: 'rgba(48,157,245, 0.4)',
                    lineWidth: 3,
                    marker: {
                        enabled: false,
                        fillColor: '#FFF',
                        lineColor: '#F3CCA3',
                        lineWidth: 2
                    },
                    color: "#F3CCA3",
                    shadow: true,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: '',
                type: 'area',
                color: '#303bf5',
                data: [2000, 1950, 2000, 700, 2000, 1900, 1950, 2000, 1900, 1950, 200, 1800, 2100, 500, 2200, 1900, 2100, 1700, 1600, 2300, 2100, 2200, 1600, 2300, 2100, 2200, 1900, 2300]
            }]
        });
    }
}
cryptic_average_block_size();
/* ORPHANED BLOCKS */
function cryptic_orphaned_blocks() {
    if ($('#orphaned_blocks').length) {
        jQuery('#orphaned_blocks').highcharts({
            title: {
                text: '',
                x: 0
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: 'rgba(48,157,245, 0.4)',
                    lineWidth: 3,
                    marker: {
                        enabled: false,
                        fillColor: '#FFF',
                        lineColor: '#F3CCA3',
                        lineWidth: 2
                    },
                    color: "#F3CCA3",
                    shadow: true,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: '',
                type: 'area',
                color: '#303bf5',
                data: [500, 1500, 500, 1500, 500, 500, 1500, 500, 8000, 500, 500, 500, 5000, 500, 500, 500, 500, 1500, 500, 1500, 500, 500, 1500, 500, 10000, 500, 500, 500, 7000, 500, 500, 500, 500, 1500, 500, 1500, 500, 500, 1500, 1500, 500, 500, 500, 500, 500, 500, 1500, 500, 1500, 500, 500, 1500, 1500, 500, 500, 1500, 500, 7000, 500, 500, 500, 3000, 500, 500, 500]
            }]
        });
    }
}
cryptic_orphaned_blocks();
/* TRANSACTIONS PER BLOCK */
function cryptic_transactions_per_block() {
    if ($('#transactions_per_block').length) {
        jQuery('#transactions_per_block').highcharts({
            title: {
                text: '',
                x: 0
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: 'rgba(48,157,245, 0.4)',
                    lineWidth: 3,
                    marker: {
                        enabled: false,
                        fillColor: '#FFF',
                        lineColor: '#F3CCA3',
                        lineWidth: 2
                    },
                    color: "#F3CCA3",
                    shadow: true,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: '',
                type: 'area',
                color: '#303bf5',
                data: [2000, 1950, 2000, 700, 2000, 1900, 1950, 2000, 1900, 1950, 200, 2300, 2800, 500, 2200, 1900, 2100, 1700, 1600, 2300, 2100, 2200, 1600, 2300, 2100, 2200, 1900, 2300]
            }]
        });
    }
}
cryptic_transactions_per_block(); 
/* CHART LTC */
function cryptic_highcharts_ltc() {
    if ($('#chart_ltc').length) {
        jQuery('#chart_ltc').highcharts({
            title: {
                text: '',
                x: 0
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            chart: {
                spacingBottom: 0,
                spacingTop: 0,
                margin: [0, -20, 0, -20]
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                spacingLeft: 0
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }],
                spacingLeft: 0
            },
            tooltip: {
                borderColor: '#838383',
                borderRadius: '3',
                borderWidth: '1',
                backgroundColor: '#dddddd',
                formatter: function() {
                    return '<strong>' + this.y + '</strong>';
                },
                spacingLeft: 0
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: '#3b82c3',
                    lineWidth: 3,
                    marker: {
                        enabled: true,
                        fillColor: '#FFF',
                        lineColor: '#91b9dd',
                        lineWidth: 2
                    },
                    color: "#91b9dd",
                    shadow: false,
                    spacingLeft: 0,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: '',
                type: 'area',
                color: '#91b9dd',
                data: [760, 760, 770, 780, 760, 780, 800, 790, 790, 790, 790, 760]
            }]
        });
    }
}
cryptic_highcharts_ltc();
/* CHART ETH */
function cryptic_highcharts_eth() {
    if ($('#chart_eth').length) {
        jQuery('#chart_eth').highcharts({
            title: {
                text: '',
                x: 0
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            chart: {
                spacingBottom: 0,
                spacingTop: 0,
                margin: [0, -20, 0, -20]
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                borderColor: '#282828',
                borderRadius: '3',
                borderWidth: '1',
                backgroundColor: '#dbdbdb',
                formatter: function() {
                    return '<strong>' + this.y + '</strong>';
                }
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: '#5a54be',
                    lineWidth: 3,
                    marker: {
                        enabled: true,
                        fillColor: '#FFF',
                        lineColor: '#a9a6dd',
                        lineWidth: 2
                    },
                    color: "#a9a6dd",
                    shadow: false,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: '',
                type: 'area',
                color: '#a9a6dd',
                data: [760, 760, 770, 780, 760, 780, 800, 790, 790, 790, 790, 900]
            }]
        });
    }
}
cryptic_highcharts_eth();
/* CHART NEO */
function cryptic_highcharts_neo() {
    if ($('#chart_neo').length) {
        jQuery('#chart_neo').highcharts({
            title: {
                text: '',
                x: 0
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            chart: {
                spacingBottom: 0,
                spacingTop: 0,
                margin: [0, -20, 0, -20]
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                borderColor: '#58BF00',
                borderRadius: '3',
                borderWidth: '1',
                backgroundColor: '#f6ffef',
                formatter: function() {
                    return '<strong>' + this.y + '</strong>';
                }
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: '#3c8694',
                    lineWidth: 3,
                    marker: {
                        enabled: true,
                        fillColor: '#FFF',
                        lineColor: '#78bbc8',
                        lineWidth: 2
                    },
                    color: "#78bbc8",
                    shadow: false,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: '',
                type: 'area',
                color: '#78bbc8',
                data: [760, 760, 770, 780, 760, 780, 800, 790, 790, 790, 790, 760]
            }]
        });
    }
}
cryptic_highcharts_neo();
/* CHART DASH */
function cryptic_highcharts_dash() {
    if ($('#chart_dash').length) {
        jQuery('#chart_dash').highcharts({
            title: {
                text: '',
                x: 0
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            chart: {
                spacingBottom: 0,
                spacingTop: 0,
                margin: [0, -20, 0, -20]
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                borderColor: '#1c75bc',
                borderRadius: '3',
                borderWidth: '1',
                backgroundColor: '#f6fafd',
                formatter: function() {
                    return '<strong>' + this.y + '</strong>';
                }
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: '#2d3c51',
                    lineWidth: 3,
                    marker: {
                        enabled: true,
                        fillColor: '#FFF',
                        lineColor: '#526c92',
                        lineWidth: 2
                    },
                    color: "#526c92",
                    shadow: false,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: '',
                type: 'area',
                color: '#526c92',
                data: [760, 760, 770, 800, 760, 780, 800, 790, 790, 790, 850, 856, 870, 888]
            }]
        });
    }
}
cryptic_highcharts_dash();
/* CHART RIPPLE */
function cryptic_highcharts_ripple_xrp() {
    if ($('#chart_ripple_xrp').length) {
        jQuery('#chart_ripple_xrp').highcharts({
            title: {
                text: '',
                x: 0
            },
            subtitle: {
                text: '',
                x: 0
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            chart: {
                spacingBottom: 0,
                spacingTop: 0,
                margin: [0, -20, 0, -20]
            },
            xAxis: {
                visible: false,
                enabled: false,
                categories: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            yAxis: {
                visible: false,
                enabled: false,
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                borderColor: '#346AA9',
                borderRadius: '3',
                borderWidth: '1',
                backgroundColor: '#f3f7fb',
                formatter: function() {
                    return '<strong>' + this.y + '</strong>';
                }
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: '#3b82c3',
                    lineWidth: 3,
                    marker: {
                        enabled: true,
                        fillColor: '#FFF',
                        lineColor: '#91b9dd',
                        lineWidth: 2
                    },
                    color: "#91b9dd",
                    shadow: false,
                    states: {
                        hover: {
                            lineWidth: 3
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                name: '',
                type: 'area',
                color: '#91b9dd',
                data: [760, 760, 770, 800, 760, 780, 800, 790, 790, 790, 700, 690, 680]
            }]
        });
    }
}
cryptic_highcharts_ripple_xrp();