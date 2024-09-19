<!-- bootstrap js -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>

<!-- plugins -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

<!-- plugins -->
<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/metismenu/metisMenu.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/index2.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<!-- apex chart -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<script>
var options = {
    series: [{
            name: 'Neurotoxins',
            type: 'line',
            data: [50000, 75000, 100000, 125000, 150000, 175000, 200000],
            color: '#FF5C45'
        },
        {
            name: 'Dermal Fillers',
            type: 'line',
            data: [20000, 60000, 85000, 110000, 135000, 160000, 185000],
            color: '#5096FF'
        },
        {
            name: 'Total Inventory',
            type: 'line',
            data: [1000, 25000, 50000, 75000, 100000, 125000, 150000],
            color: '#FFF200'
        },
        {
            name: 'Others',
            type: 'line',
            data: [0, 20000, 20000, 65000, 80000, 115000, 140000],
            color: '#693C6B'
        },
    ],
    chart: {
        height: 350,
        type: 'line',
        stacked: false,
        toolbar: {
            show: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: 3,
        curve: 'smooth'
    },
    xaxis: {
        categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        labels: {
            style: {
                paddingLeft: '20px' // Adjust the padding as needed
            }
        }
    },
    yaxis: {
        show: false,
        labels: {
            formatter: function(val) {
                return "$" + val;
            }
        }
    },
    tooltip: {
        enabled: false

    },

};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();


// pie chart
var optionsp = {
    series: [50000, 75000, 20000], // Example data

    colors: ['#FF5C45', '#FFF200', '#5096FF'],
    chart: {
        width: 240,
        type: 'donut',
        radius: ['40%', '70%']
    },
    legend: {
        show: false
    },
    dataLabels: {
        enabled: false // Hide data labels
    },
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },

        }
    }]
};

var chartpie = new ApexCharts(document.querySelector("#chartpie"), optionsp);
chartpie.render();
</script>
<script>
let dateselects = document.getElementsByClassName("date-selection"); // Get all elements with class "date-selection"
let dates = document.getElementsByClassName('date'); // Get all elements with class "date"
let btnRefreshes = document.getElementsByClassName('btnRefresh'); // Get all elements with class "btnRefresh"

// Loop through all elements with class "date-selection"
for (let dateselect of dateselects) {
    console.log("dateselect", dateselect)
    dateselect.addEventListener('change', () => {
        if (dateselect.value === "Custom") {
            console.log('click');
            dateselect.classList.add('d-none');
            for (let date of dates) {
                date.classList.remove('d-none');
            }
        }
    });
}

// Loop through all elements with class "btnRefresh"
for (let btnRefresh of btnRefreshes) {
    btnRefresh.addEventListener('click', () => {
        for (let dateselect of dateselects) {

            dateselect.classList.remove('d-none');
            dateselect.value = "Today";
        }
        for (let date of dates) {
            date.classList.add('d-none');
        }
    });
}
</script>