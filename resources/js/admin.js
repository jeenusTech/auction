
require('./bootstrap');
window.$ = require('jquery');
require('../../node_modules/jquery/dist/jquery.min.js');

window.bsCustomFileInput=require('../../node_modules/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js');
window.toastr=require('../../node_modules/admin-lte/plugins/toastr/toastr.min.js');
// for data table
require('../../node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js');
require('../../node_modules/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
require('../../node_modules/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js');
require('../../node_modules/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');
require('../../node_modules/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js');
require('../../node_modules/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js');
// require('../../node_modules/admin-lte/plugins/jszip/jszip.min.js');
// require('../../node_modules/admin-lte/plugins/pdfmake/pdfmake.min.js');
// require('../../node_modules/admin-lte/plugins/pdfmake/vfs_fonts.js');
require('../../node_modules/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js');
require('../../node_modules/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js');
require('../../node_modules/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js');
require('../../node_modules/admin-lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js');
// require('../vendor/datatables/jquery.dataTables.min.js');
// require('../vendor/datatables/dataTables.bootstrap4.min.js');

require('./admin/custom.js');
require('./admin/sweetalert.js');
require('lightbox2');

// for forms and other uis
// <!-- Select2 -->
require('../../node_modules/admin-lte/plugins/select2/js/select2.full.min.js');
// <!-- Bootstrap4 Duallistbox -->
// require('../../node_modules/admin-lte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js');
// <!-- InputMask -->
// window.moment =require('../../node_modules/admin-lte/plugins/moment/moment.min.js');
window.moment = require('moment');
//require('../../node_modules/admin-lte/plugins/inputmask/jquery.inputmask.min.js');
// <!-- date-range-picker -->
require('../../node_modules/admin-lte/plugins/daterangepicker/daterangepicker.js');
// <!-- bootstrap color picker -->

// <!-- Tempusdominus Bootstrap 4 -->
require('../../node_modules/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');
// <!-- Bootstrap Switch -->
require('../../node_modules/admin-lte/plugins/dropzone/min/dropzone.min.js');
// for summer note
require('../../node_modules/admin-lte/plugins/summernote/summernote-bs4.min.js');


 $('document').ready(function () {
    $('#categorytable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true
    });
  });
// delete category
$('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    const id = $(this).attr('data-id');
    swal({
        title: 'Are you sure?',
        text: 'Would you like to proceed with your current action!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            $('#deletecat'+id).submit();
        }
    });
});
// block user
$('.block-user').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const id = $(this).attr('data-id');
        swal({
            title: 'Are you sure?',
            text: 'Would you like to proceed with your current action!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                $('#block'+id).submit();
            }
        });
    });
// block seller
$('.block-seller').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const id = $(this).attr('data-id');
        swal({
            title: 'Are you sure?',
            text: 'Would you like to proceed with your current action!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                $('#block'+id).submit();
            }
        });
    });

// block seller
$('.approve-seller').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const id = $(this).attr('data-id');
        swal({
            title: 'Are you sure?',
            text: 'Would you like to proceed with your current action!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                $('#approve'+id).submit();
            }
        });
    });

// enable disable auction

$('.auction_status').click(function() {
        
        var id = $(this).data('id'); 
         
        $('#status'+id).submit();
    })
// close the lot
$('.lot_closed').click(function() {
        
        var id = $(this).data('id'); 
         
        $('#closed'+id).submit();
    })
$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

// for testing the ui elements
 $(function () {
    // for summer note
    $('#summernote').summernote({
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'italic', 'underline', 'clear']],
          ['fontsize', ['fontsize']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          // ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']],
          ['height', ['height']]
        ]
    })
    //Initialize Select2 Elements
    // $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    // Date picker
    $('#startdate').datetimepicker({
        format: 'yyyy-MM-DD'
        // useCurrent: false,
        // format: 'yyyy-MM-DD',
        // minDate: moment()

    });
    $('#enddate').datetimepicker({
        format: 'yyyy-MM-DD'
        // useCurrent: false,
        // format: 'yyyy-MM-DD',
        // minDate: moment()+1
    });


    //Date range picker
    $('#reservation').daterangepicker()

    //Timepicker
    $('#starttime').datetimepicker({
      format: 'HH:mm:ss'
    })
     $('#endtime').datetimepicker({
      format: 'HH:mm:ss'
    })



  })


