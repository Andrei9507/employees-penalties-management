$(document).ready(function(){
   $('.ui.dropdown').dropdown();
});

// ------------ employee -----------------------

function myModal(id){
        console.log(id);
    
        $('.employee_'+id)
            .modal('show')
    

};

function ValidationFieldsForEmployeePenalty() {

    var comment = $('#comment').val();
    var behavior = $('#behavior').val();
    var date = $('#expire').val();

    var i = 0;

    if (comment == null || comment == 0 || comment == '') {
        $('#check-comment').text("Comment is required");
        i++;
    }

    if (behavior == null || behavior == 0 || behavior == '') {
        $('#check-behavior').text("Behavior is required");
        i++;
    }

    if (date == null || date == 0 || date == '') {
        $('#check-date').text("Date is required");
        i++;
    }

    if (i != 0) {
        return false;
    }
    return true;
}

function removeWarningForBehaviorPenalty(){

    if ($("input[name$='behavior_id']")) {
        return $('#check-penalty').text("");
    }

}

function removeWarningForComment(){

    if ($("input[name$='comment']")) {
        return $('#check-comment').text("");
    }

}

function removeWarningForDate(){

    if ($("input[name$='expire']")) {
        return $('#check-date').text("");
    }

}

function ValidationFieldsForEmployee() {

    
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var adress = $('#adress').val();
    var phone = $('#phone').val();
    var i = 0;

    if (firstname == null || firstname == 0 || firstname == '') {
        $('#check-firstname').text("Firstname is required");
        i++;
    }

    if (lastname == null || lastname == 0 || lastname == '') {
        $('#check-lastname').text("Lastname is required");
        i++;
    }

    if (adress == null || adress == 0 || adress == '') {
        $('#check-adress').text("Adress is required");
        i++;
    }

    if (phone == null || phone == 0 || phone == '') {
        $('#check-phone').text("Phone is required");
        i++;
    }

    if (i != 0) {
        return false;
    }
    return true;
}

function removeWarningForFirstname() {
    if ($("input[name$='firstname']")) {
        return $('#check-firstname').text("");
    }
}

function removeWarningForLastname() {
    if ($("input[name$='lastname']")) {
        return $('#check-lastname').text("");
    }
}

function removeWarningForAdress() {
    if ($("input[name$='adress']")) {
        return $('#check-adress').text("");
    }
}

function removeWarningForPhone() {
    if ($("input[name$='phone']")) {
        return $('#check-phone').text("");
    }
}

function getPenalty(e) {
    
        var penalty_id = $(e.target).val();
        $.ajax({
            url: "/get-penalty/"+penalty_id,
            method: "get",
            data: {penalty_id:penalty_id},
            success: function(data){
            	
                $("#penalty_id").val(data.id);
                $("#penalty_name").html(data.penalty);
            }
        })
    
}

function getEmployee(e) {
    
        var employee_id = $(e.target).val();
      
        $('#jsAddPenalty').attr('href', '/employees/' + employee_id + '/penalty');
          
}

function getPieChart(behaviors) {

    // Build the chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Statistics of employees behaviors  '
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Employees',
            colorByPoint: true,
            data: behaviors
        }]
    });
}


function getTopFive(employees){
Highcharts.chart('cont', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Top penalized employees'
    },
    subtitle: {
      
    },
    xAxis: {
        categories: employees.names,
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Penalties',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' '
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'penalties',
        data: employees.values
    }]
});

}

function initDate(){
    $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();
}

// ------------ behavior -----------------------
function ValidationFieldsForBehavior() {

    var behavior = $('#behavior').val();
    var penalty = $('#penalty').val();
    var i = 0;

    if (behavior == null || behavior == 0 || behavior == '') {
        $('#check-behavior').text("Behavior is required");
        i++;
    }

    if (penalty == null || penalty == 0 || penalty == '') {
        $('#check-penalty').text("Penalty is required");
        i++;
    }

    if (i != 0) {
        return false;
    }
    return true;
}

function removeWarningForPenalty() {
    if ($("input[name$='penalty']")) {
        return $('#check-penalty').text("");
    }
}

function removeWarningForBehavior() {

    if ($("input[name$='penalty']")) {
        return $('#check-penalty').text("");
    }
    
}


// ------------ penalty -----------------------
function ValidationFieldsForPenalty() {

    var penalty = $('#penalty').val();
    var i = 0;

    if (penalty == null || penalty == 0 || penalty == '') {
        $('#check-penalty').text("Penalty is required");
        i++;
    }

    if (i != 0) {
        return false;
    }
    return true;
}
