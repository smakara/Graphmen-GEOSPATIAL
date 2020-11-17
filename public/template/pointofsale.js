$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


//========================Global Variables===========================
var studentNumber_empno = "";
var dependentArray = new Array();
var globalBalance = "";
var canteenmealid = "";
var canteenmealname = "";
var dynamicBalance = 0;
var currentBalance = 0;
var globalDate = "";

var baseURL = "http://localhost/hcp/public/";

$(document).on("click", ".browse", function () {
    var file = $(this).parents().find(".file");
    file.trigger("click");
});
$('input[type="file"]').change(function (e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});
$(document).ready(function () {
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
    var color = Chart.helpers.color;
    var barChartData = {
        labels: MONTHS,
        datasets: [{
                label: 'Payments',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    34,
                    56,
                    66,
                    37,
                    90,
                    78,
                    56
                ]
            }, {
                label: 'Claimes',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    20,
                    40,
                    30,
                    20,
                    45,
                    40,
                    25
                ]
            }]

    };

    window.onload = function () {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart'
                }
            }
        });

    };

//    document.getElementById('randomizeData').addEventListener('click', function () {
//        var zero = Math.random() < 0.2 ? true : false;
//        barChartData.datasets.forEach(function (dataset) {
//            dataset.data = dataset.data.map(function () {
//                return zero ? 0.0 : randomScalingFactor();
//            });
//
//        });
//        window.myBar.update();
//    });



});
$(document).ready(function () {

    $(document).on("click", ".browse", function () {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $('#btnlogin').on('click', function () {
        var username = $("#username").val();
        var pasword = $("#pasword").val();

        var loginform = $('#loginform').serializeArray();
        var url = $('#loginform').attr('action');
        loader('on');

        $.ajax({
            type: 'post',
            url: url,
            data: loginform,
            dataType: JSON,
            success: function (data) {
//                 loader('off');
                console.log("############ " + data);
                window.location = data.redirect;
            }, error: function (data) {

            }
        });
        alert(username);

    });

    $('#btnnewrequest').on('click', function () {
        $("#ModalLoginForm").modal('show');
    });

    $('#btn-adddependantOnReg').on('click', function () {

        var dependentObject = new Object();
        dependentObject.dname = $("#dname").val();
        dependentObject.dsurname = $("#dsurname").val();
        dependentObject.ddob = $("#ddob").val();
        dependentObject.dgender = $("#dgender").val();
        dependentObject.dbeneficiarytype = $("#dbeneficiarytype").val();

        console.log(dependentObject);
        dependentArray.push(dependentObject);
        console.log(dependentArray);
        $("#adddependantTbl td").remove();
        $.each(dependentArray, function (key, value) {
//            console.log(value.menuid + "  " + value.desc + " " + value.amount);
            $("#adddependantTbl").append("<tr></td><td>" + value.dname + "</td><td>" + value.dsurname + "</td><td>" + value.ddob + "</td><td>" + value.drelationship + "</td></tr>");
        });
    });


    var $w1finish = $('#w1').find('ul.pager li.finish'),
            $w1validator = $("#w1 form").validate({
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
            $(element).remove();
        },
        errorPlacement: function (error, element) {
            element.parent().append(error);
        }
    });

    $w1finish.on('click', function (ev) {
        ev.preventDefault();
        var validated = $('#w1 form').valid();




        var registrationformwizard = $('#registrationformwizard').serializeArray();



        var username = $('#w1-username').val();
        var fname = $('#w1-fname').val();
        var surname = $('#w1-surname').val();
        var natid = $('#w1-natid').val();

        var phone = $('#w1-phone').val();
        var email = $('#w1-email').val();
        var gender = $('#w1-gender').val();
        var dob = $('#w1-dob').val();

        var city = $('#w1-city').val();
        var city = $('#w1-city').val();
        var address = $('#w1-address').val();
        var product = $('input[name="product"]:checked').serialize();

        console.log($('input[name="product"]:checked').serialize());
//{"product":"product=hcp&product=fcp","address":"fff","city":"fff","fname":"ss","surname":"ss","natid":"ss","phone":"ss","email":"ss@gmail.com","gender":"1","dob":"2020-10-29"}
        if (product.length > 0) {
            $.ajax({
                type: 'POST',
                url: "registermemberAjax",
                data: {dependentArray: dependentArray, product: product, address: address, city: city, username: username, fname: fname, surname: surname, natid: natid, phone: phone, email: email, gender: gender, dob: dob},
                dataType: 'JSON',
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    if (data.principles > 0) {
                        alert("Record saved");
                        window.location = baseURL + "home";
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("error" + data);
                }
            });
        } else {
            $("#informationModal").modal('show');
        }

        // if ( validated ) {
        // new PNotify({
        // title: 'Congratulations',
        // text: 'You completed the wizard form.',
        // type: 'custom',
        // addclass: 'notification-success',
        // icon: 'fa fa-check'
        // });
        // }
    });




    $('#btnadduser').on('click', function () {
        var adduserform = $('#adduserform').serializeArray();
        $.ajax({

            type: 'POST',
            url: "adduser",
            data: adduserform,
            dataType: 'JSON',
            success: function (data, textStatus, jqXHR) {
                console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("error" + data);
            }
        });

    });

//
    $('#btnreport1').on('click', function () {


        var report1form = $('#report1form').serializeArray();
        $.ajax({

            type: 'POST',
            url: "report1form",
            data: report1form,
            dataType: 'JSON',
            success: function (data, textStatus, jqXHR) {
                console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("error" + data);
            }
        });

    });
    $('#btnaddtoexpensetable').on('click', function () {

        var expensecategory = $("#expensecategory").val();
        var km = $("#km").val();
        var descriptionexpense = $("#descriptionexpense").val();
        var estcost = $("#estcost").val();
        var createnewrequestform = $('#createnewrequestform').serializeArray();
        $('#tblexpense td').remove();

        $.ajax({
            type: 'POST',
            url: "addtoexpensetable",
            dataType: 'JSON',
            data: {expensecategory: expensecategory, km: km, descriptionexpense: descriptionexpense, estcost: estcost},
            success: function (data, textStatus, jqXHR) {
                console.log("############data " + data);
                console.log("############textStatus " + textStatus);
                console.log("############jqXHR " + jqXHR);

                $.each(data.exp, function (key, value) {
                    $("#tblexpense").append("<tr><td>" + value.ee_category + "</td><td>" + value.ee_km + "</td><td>" + value.ee_desc + "</td><td>" + value.ee_estcost + "</td></tr>");
                });
                $("#km").val(" ");
                $("#descriptionexpense").val(" ");
                $("#estcost").val(" ");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("############ jqXHR " + jqXHR);
                console.log("############textStatus " + textStatus);
                console.log("############ errorThrown " + errorThrown);
            }
        });
//  
    });


    $('#btncreatenewrequest').on('click', function () {

        var createnewrequestform = $('#createnewrequestform').serializeArray();

        $.ajax({
            type: 'POST',
            url: "createnewrequest",
            dataType: 'JSON',
            data: createnewrequestform,
            success: function (data, textStatus, jqXHR) {
                console.log("############data " + data);
                console.log("############textStatus " + textStatus);
                console.log("############jqXHR " + jqXHR);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("############ jqXHR " + jqXHR);
                console.log("############textStatus " + textStatus);
                console.log("############ errorThrown " + errorThrown);
            }
        });


    });



    $("#addEventLink").on('click', function () {

        $('#addEvent').modal('show');
        $("#example-modal").modal('hide');
    });
});

$("#btnsaveEvent").on('click', function () {


    var event = $('#event').val();
    var locale = $('#locale').val();


    alert(globalDate);
    $.ajax({
        type: 'POST',
        url: '/addEvents',
        dataType: 'JSON',
        data: {event: event, locale: locale, date: globalDate},
        success: function (data) {
            $('#addEvent').modal('hide');
//
        }
    });


});

$("#selectedEvent").on('change', function () {

    var selectedEvent = $('#selectedEvent').find(":selected").text();
    $("#selectedrace option").remove();
    $.ajax({
        type: 'POST',
        url: '/getraces',
        dataType: 'JSON',
        data: {selectedEvent: selectedEvent},
        success: function (data) {
            $.each(data.races, function (index, value) { // Iterates through a collection
                $('#selectedrace').append("<option>" + value.Description + "-" + value.adescription + "</option>");
                console.log(data);
            });


//
        }
    });


});



function deleteProduct(id) {

    alert('deleteProduct ' + id);
}


function editDependantByPrincipal(id) {

    $.ajax({
        type: 'POST',
        url: 'editDependantByPrincipal',
        dataType: 'JSON',
        data: {id: id},
        success: function (data) {

            $('#ename').val(data.g_beneficiaries.g_firstname);
            $('#esurname').val(data.g_beneficiaries.g_surname);
            var dateString = data.g_beneficiaries.g_birthdate.split(" ");
            $('#edob').val(dateString[0]);
            $("#egender").val(data.g_beneficiaries.g_male_female);
            $("#g_beneficiaryID").val(data.g_beneficiaries.g_beneficiaryID);

            $("#edbeneficiarytype").val(data.g_beneficiaries.g_beneficiary_typeID);
            $('#editDependant').modal('show');
        }
    });
}


function deleteDependantByPrincipal(id) {

    var global_principleID = $("#global_principleID").val();
    $.ajax({
        type: 'POST',
        url: 'deleteDependantByPrincipal',
        dataType: 'JSON',
        data: {id: id, global_principleID: principalprofile},
        success: function (data) {

            window.location = baseURL + "principalprofile/" + principalprofile;
        }
    });
}


function editAgent(id) {
    $.ajax({
        type: 'POST',
        url: 'editAgent',
        dataType: 'JSON',
        data: {id: id},
        success: function (data) {

            $("#eaname").val(data.agent.d_name);
            $("#eaphone").val(data.agent.d_mobile);
            $("#eaemail").val(data.agent.d_email);
            $("#eacity").val(data.agent.d_city_town);
            $("#d_agentID").val(id);
            
            $("#editagent").modal("show");
//            window.location = baseURL + "agents";
        }
    });
}

