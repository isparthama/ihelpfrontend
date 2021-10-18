<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="Iw0eY9IrDTpW5B3fmFriOqfAnlLIegXB948DtkKF">

        <title>IHelp</title>
        <!-- Fonts -->
        
        
        
   <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

    <link href="css/spacing.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-switch.css" rel="stylesheet" type="text/css" />
    <link href="css/toastr.min.css" rel="stylesheet" type="text/css" />
    <link href="css/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="css/datatables.min.css" rel="stylesheet" />
    <link href="css/datatables.bootstrap.css" rel="stylesheet" />
    <link href="css/ladda-themeless.min.css" rel="stylesheet" type="text/css" />
    <link href="css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/jquery.fileupload.css" rel="stylesheet" />
    <link href="css/jquery.fileupload.css" rel="stylesheet" />
    <link href="css/jquery.fileupload-ui.css" rel="stylesheet" />
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link href="css/todo-2.min.css" rel="stylesheet" />




    <link href="css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="css/blog.min.css" rel="stylesheet" type="text/css" />



    <link href="css/layout.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />



    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/navigation.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css">



    <style type="text/css">
        .modal-view-width-jun{
            width: 1000px;
        }

        .modal-body-special-jun{
            overflow: auto;
        }
        .table-special-jun{
            width: auto;
        }

        @media  screen and (max-width:600px) {
            .page-container {
                margin-top : 50px !important;
            }
            .modal-view-width-jun{
                width: auto;
            }
            .modal-body-special-jun{
                overflow: auto;
            }
            .table-special-jun{
                width: 600px;
            }
        }

        @media  screen and (min-width:430px) and (max-width:1100px){
            .page-container {
                margin-top : 100px !important;
            }
            .modal-view-width-jun{
                width: auto;
            }
            .modal-body-special-jun{
                overflow: auto;
            }
            .table-special-jun{
                width: 800px;
            }
        }

        #toast-container {
            margin-top: 70px !important;
        }

        #toast-container .toast{
            opacity: 1;
            background: no-repeat rgb(54, 198, 211);
            color: white;
            border-radius: 10px !important;
            box-shadow: #cccccc 0 0 5px 1px !important;
            background-position: left center !important;
            background-position-x: 10px !important;
        }

        table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
            font-size: 17px;
            font-family: 'Source Sans Pro', sans-serif;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
      <style type="text/css">
    .page-content{
      padding: 0px !important;
       min-height: 50vh !important;
    }
    .page-content .container:first-child{
      background: #d75748 !important;
    }
    .page-content .container .portlet {
      border-radius: 10px !important;
      background: background-color: #ffffff9c;
    }
    .portlet-body {
        max-height: 450px !important;
        overflow: auto;
    }
    .carousel-content {
        color:black;
        display:flex;
        align-items:center;
        max-height: 100px;
        flex-direction: column;
        align-items: flex-start;
    }
    .panel {
        border-color: #d75748;
    }
    .panel-heading{
      background: #d75748 !important;
      border:0;
    }
    #text-carousel {
      width: 100%;
      height: auto;
    }

    .tab-container{
      min-height: 300px !important;
      max-height: 300px !important;
      overflow: auto;
    }
    .note{
      border: 1px #e0e0e0 solid;
      border-radius: 10px !important;
    }

    .summary .box {
      height: 100px;
      border-radius: 10px !important;
    }
    .summary .box i {
      font-size: x-large;
    }
    #NewServicesBadge {
      cursor: pointer;
    }
  </style>
    <style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>
    <body>

  <?php include("header.php");?>                 

<style type="text/css">
  #account .accountInfo{
    padding: 0;
    font-family: cursive;;
  }
  #account .accountInfo ul{
      list-style-type: none;
      padding: 0;
      font-family: cursive;
  }
  #account .accountInfo li:first-child{
      text-decoration: underline;
  }
  #account .accountInfo li{
      padding-bottom: 5px;
      text-transform: capitalize;
      text-overflow : ellipsis;
      overflow      : hidden;
      white-space   : nowrap;
      width         : 130px;
    }
</style>
<script type="text/javascript">

  var dropdown = document.getElementsByClassName("side-dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }

  function AddNewNotif(data) {
    console.log(data);
    // console.log($('#header_inbox_bar span').html())
    var count = Number($('#header_inbox_bar span').html());
        count ++

    $('#header_inbox_bar .badge').removeClass('hidden');

    ChangeNotifCount(count);

    var notif = $('#notif_content .drop-content li.hidden').clone();
        notif.removeClass('hidden');
        notif.find('#content').attr('notif_id',data.id);
        notif.find('#content i').addClass("notif-"+data.id);
        notif.find('#content .title').text(data.title);
        notif.find('#content .body').text(data.note);
        notif.find('#content hr').removeClass('hidden');
        notif.find('#content .time').text(data.time);

    var side = $('#SideNotif .notif').clone();
        side.removeClass('hidden');
        side.find('i').addClass('notif-'+data.id);
        side.find('.title').text(data.title);
        side.find('p').text(data.note);
        side.find('.time').text(data.time);

    $("#notif_content .drop-content").prepend( notif );
    $("#SideNotif").prepend( side );

    toastr.info(data.note,data.title);
  }

  function ChangeNotifCount(CurrentNotif) {
    $('.notify-drop-title b').html(CurrentNotif);
    $('#notif_content .header b').html(CurrentNotif);
    $('#header_inbox_bar span').html(CurrentNotif);
  }

  function toogleNav() {
    var width = document.getElementById("mySidenav").style.width
    document.getElementById("mySidenav").style.width = width == '' || width == '0px' ? '100%' : "0"
  }

  function toogleNotif () {
    var width = document.getElementById("SideNotif").style.width
    document.getElementById("SideNotif").style.width = width == '' || width == '0px' ? '100%' : "0"
  }

  function changeResidentUnitSession(){
      unit_code = $('#unit_resident_set_session').val();
      $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: "backend/changesession",
          type: 'POST',
          data : 'unit_change='+unit_code,
          cache : false,
          processData: false,
          success: function (response) {
            if (response['response'] == "success") {
              location.reload();
            }
          }
      });
  }

  function changeUnitResident(){
    $('#change_unit_resident').modal('show');
  }

  function ReadNotif(elem) {
      var notif_id = $(elem).attr('notif_id');

      callApi('ReadNotif','post',{"id" : notif_id,"unit_code" : SessionUser.unit_code}).then(res => {
          if(res['response'] == 'success') {
              let CurrentNotif = parseInt($('.notify-drop-title b').text()) - 1;
              $('.notif-'+notif_id).addClass('read');
            ChangeNotifCount(CurrentNotif)
        }
    })
  }

  function ReadAllNotif() {
    getNotifId().then(arr => {
      console.log(arr);
      if(arr.length > 0) {
        callApi('ReadNotif','post',{"id" : arr,"unit_code" : SessionUser.unit_code}).then(res => {
           if(res['response'] == 'success') { 
            $('.drop-content > li > div').each(function () { 
             $(this).find('i').addClass('read');
            })
            ChangeNotifCount(0)
           }
        })
      }
    })
  }

  function getNotifId() {
    return new Promise( function (resolve) { 
       let arrNotif = [];
        $('.drop-content > li > div').each(function () {
          let notif_id = $(this).attr('notif_id');
          if(notif_id !== "") {
            arrNotif.push(notif_id);          
          }
        });
        resolve(arrNotif);
    });
  }



</script>
        

<div class="clearfix"> </div>
<div class="page-container">
 

<!-- Buat Content ditengah taro disini -->
          

</div>
</div>

            <script type="text/javascript">
        var pusher_app_id = "061db0fe2dd997567231";
    </script>

    <script src="js/jquery_002.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/helper.js" type="text/javascript"></script>
        <script src="js/js.js" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery_005.js" type="text/javascript"></script>
        <script src="js/bootstrap-switch.js" type="text/javascript"></script>
        <script src="js/datatables_002.js" type="text/javascript"></script>
        <script src="js/datatables.js" type="text/javascript"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="js/moment.js" type="text/javascript"></script>
        <script src="js/fullcalendar.js" type="text/javascript"></script>
        <script src="js/toastr.js" type="text/javascript"></script>
        <script src="js/bootstrap-datetimepicker.js" type="text/javascript"></script>
        <script src="js/select2.js" type="text/javascript"></script>
        <script src="js/jquery_004.js" type="text/javascript"></script>
        <script src="js/jquery_003.js" type="text/javascript"></script>
        <script src="js/jquery_006.js" type="text/javascript"></script>
        <script src="js/datatable.js" type="text/javascript"></script>
        <script src="js/components-pickers.js" type="text/javascript"></script>

        
        <script src="js/app.js" type="text/javascript"></script>
        <script src="js/ui-toastr.js" type="text/javascript"></script>
        <script src="js/components-date-time-pickers.js" type="text/javascript"></script>
        <script src="js/dashboard.js" type="text/javascript"></script>
        <script src="js/components-select2.js" type="text/javascript"></script>
        <script src="js/layout.js" type="text/javascript"></script>
        <script src="js/todo-2.js" type="text/javascript"></script>
        <script src="js/pusher.js"></script>

        <script type="text/javascript">
            const SessionUser = {"id":9,"user_id":17,"email":"syaifullah@cowellcommercial.com","unit_id":"00","unit_code":"00-9","building_code":"0","name":"IT Syaiful","supervisor_id":"00-1","folder":"profiles","profile_picture":"rhEMvJ5nZuHJk1gWcSa2H0KNGWTsuqXFH6wz0Qxo.jpeg","image_ttd":"signature\/UlAf1sjRHBfFRfNghB9SMFt5mXqktDH5EsSR5Ql2.png","staff_st":3,"role_access":1,"notif_access":3,"cell_ph":"12312312321","work_ph":"123213213123","aktif_st":1,"online_stats":1,"created_by":null,"updated_by":"00-9","deleted_by":null,"created_at":"2019-07-29 11:09:18","updated_at":"2021-04-19 12:52:22","staff_st_name":"Admin","level":"Admin","akun":{"id":17,"unit_code":"00-9","email":"syaifullah@cowellcommercial.com","user_category":2,"aktif_st":1,"emailver_rq":1,"gcm_number":"dd82e795-b4f8-4216-a012-eaee47cbd907","ip_address":"36.95.4.239","devices":{"manufacture":"samsung","model":"SM-A507FN","platform":"Android","serial":"unknown","uuid":"ad878665c580c7ce","version":"10"},"deleted_by":null,"updated_at":"2021-03-03 23:20:47"}};

            $( document ).ready(function() {
                toastr.options.showMethod           = 'slideDown';
                toastr.options.preventDuplicates    = true;
                toastr.options.progressBar          = true;
                toastr.options.timeOut              = 2000;

                $(window).scroll(function(e){
                    var aTop = $('.navbar-default').height();
                    if($(this).scrollTop() >= aTop){
                        $('.navbar').addClass('active');
                    }else{
                        $('.navbar').removeClass('active');
                    }
                  });

                InitPusherNotif();

            });

            function InitPusherNotif() {
                console.log('init');
                InitPusher('quicklink','new.notification',function (data) {
                    let notif = data.notif;

                    callApi('CheckNotification/'+notif.id,'GET').then(res => {
                        console.log(res);
                        if(res.status) {
                             AddNewNotif(notif);
                        }
                    })
                });
            }
        </script>

      <script src="js/chart.js" type="text/javascript"></script>
  <script src="js/ajax-interceptor.js" type="text/javascript"></script>
  

  <script type="text/javascript">

    var new_service = 0;
    window.onload = function() {
        callApi('DashboardGraph','GET').then(res => {
          DrawLine(res.line);
          DrawPie(res.circle);
        });
        FetchSummary();
        RepairSocket();

        $('#NewServicesBadge span').click( e => {
          window.location.reload();
          $('#NewServicesBadge').addClass('hidden');
        });
     };

    function RepairSocket() {
      InitPusher('quicklink','event.services.created',function (e) {
        // console.log(e);
         new_service += 1;
        $('#NewServicesBadge').removeClass('hidden');
        $('#NewServicesBadge b').text(new_service);
      });
    }

    function FetchSummary() {
      var unit_code = "00-9";
      callApi('DashboarSummary','GET',{unit_code : unit_code}).then(res => {
        // console.log(res);
        if(res.length > 0) {
          res.forEach(function (elem) {
            // console.log(elem);
            // console.log("#status_"+elem.status);
            $("#status_"+elem.status+" span > span").html('(' + elem.jumlah + ')');
          })
        }
      });
    }

    function DrawLine(res) {
      var ctx     = document.getElementById("canvas");
          ctx.style.backgroundColor = 'transparent';
      var label   = [];
      var data    = [];

      res.map(elem => {
          label.push(elem.date);
          data.push(elem.total);
      });

      var myChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels  : label,
              datasets: [{
                  // label: label.map(elem => elem + " ="),
                  data: data,
                  borderWidth: 3,
                  showLine : true,
                  pointBackgroundColor:"red"
              }]
          },
          options: {
              legend: {
                  display: false,
              },
              layout: {
                  padding: {
                      left: 0,
                      right: 0,
                      top: 0,
                      bottom: 0
                  }
              },
              scales: {
                  yAxes: [{
                      ticks: {
                          steps: 1,
                          min: 0,
                          suggestedMax: 10,
                          beginAtZero:false,
                          userCallback: function(label, index, labels) {
                               // when the floored value is the same as the value we have a whole number
                               if (Math.floor(label) === label) {
                                   return label;
                               }
                           },
                      }
                  }],
                  xAxes : [{
                      ticks : {
                      }
                  }]
              }
          }
      });
    }

    function DrawPie(res) {
      var ctx     = document.getElementById("canvas_pie");
          ctx.style.backgroundColor = 'transparent';

      var label   = [];
      var data    = [];

      res.map(elem => {
        label.push(elem.label);
        data.push(elem.total);
      });

      var options = {
                      type: 'pie',
                      data: {
                          labels  : label,
                          datasets: [{
                              label           : '#Category Repair',
                              data            : data,
                              backgroundColor : randomColor(data.length)
                          }]
                      },
                      options: {
                        layout: {
                            padding: {
                                left: 0,
                                right: 0,
                                top: 0,
                                bottom: 0
                            }
                        }
                      }
                    }
        var myDoughnutChart = new Chart(ctx, options);
      }

    function randomColor(length) {
      let color = [];
      for (let index = 0; index < length; index++) {
          let generate = '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
          color.push(generate);
      }
      // console.log(color);
      return color;
    }

    function showImageEvent(id_get){
      $.ajax({ 
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }, 
          url: "announcement/showdata", 
          type: 'POST', 
          data : 'id='+id_get, 
          cache : false, 
          processData: false, 
          success: function (response) {
            $('#pictureModalSet').empty();
            html_set = '<img src="/storage/'+response['image1']+'" width="820px" height="630px" style="display: block;margin-left: auto;margin-right: auto;margin-top: 20px;"> \
                        <br> \
                        <div class="modal-body"> \
                        <h3>'+response['title']+'</h3> \
                        <br> \
                        <p>'+nl2br(response['note'])+'</p>\
                        </div>';
            $('#pictureModalSet').html(html_set);
            $('#pict_modal').modal('show');
          } 
      });
    }

    function showImageMarketplace(id_get,picture){
      $.ajax({ 
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }, 
          url: "marketplace/showdata", 
          type: 'POST', 
          data : 'id='+id_get, 
          cache : false, 
          processData: false, 
          success: function (response) {
            $('#pictureModalSet').empty();
            html_set = '<img src="/storage/'+picture+'" width="820px" height="630px" style="display: block;margin-left: auto;margin-right: auto;margin-top: 20px;"> \
                        <br> \
                        <div class="modal-body"> \
                        <h3>'+response["data"][0]['market_name']+'</h3> \
                        <br> \
                        <p>'+nl2br(response["data"][0]['description'])+'</p>\
                        </div>';
            $('#pictureModalSet').html(html_set);
            $('#pict_modal').modal('show');
          } 
      });
    }

    function showImageNews(id_get){
      $.ajax({ 
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }, 
          url: "announcement/showdata", 
          type: 'POST', 
          data : 'id='+id_get, 
          cache : false, 
          processData: false, 
          success: function (response) {
            show_set = '';
            $('#pictureModalSet').empty();
            if (response['image1'] == null) {
              show_set = '';
            }
            else{
              show_set = '<a href="/storage/'+response['image1']+'" download="'+response['title']+' 1">Download</a>';
            }
            html_set = '<div class="modal-body"> \
                        <h3>'+response['title']+'</h3> \
                        <br> \
                        <p>'+nl2br(response['note'])+'</p>\
                        '+show_set+' \
                        </div>';
            $('#pictureModalSet').html(html_set);
            $('#pict_modal').modal('show');
          } 
      });
    }

    function nl2br (str, is_xhtml) {     
      var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br/>' : '<br>';      
      return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');  
    }  
  </script>

    
 <?php include("footer.php");?> 

</body></html>