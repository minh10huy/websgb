/* ------------------------------------------------------------------------------
*
*  # Responsive extension for Datatables
*
*  Specific JS code additions for datatable_responsive.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        responsive: true,

        dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Tìm Kiếm:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });

  //  Basic responsive configuration

    $('.news-table').DataTable({
      "aoColumns": [
          {"mData": "ns0", "defaultContent": ""},
          {"mData": "ns1", "defaultContent": ""},
          {"mData": "ns2", "defaultContent": ""},
          {"mData": "ns3", "defaultContent": ""},
          {"mData": "ns4", "defaultContent": ""},
          {"mData": "ns5", "defaultContent": ""},
          {"mData": "ns6", "defaultContent": ""}
      ],

       columnDefs: [
           { width: 50, targets: 0 },
           { width: 100, targets: 1 },
           { width: 120, targets: 2 },
           { width: 120, targets: 3 },
           { width: 200, targets: 4 },
           { width: 300, targets: 5 },
           { width: 130, targets: 6 }
       ],
    });


    $('.depart-table').DataTable({
      "aoColumns": [
          {"mData": "dp0", "defaultContent": ""},
          {"mData": "dp1", "defaultContent": ""},
          {"mData": "dp2", "defaultContent": ""},
          {"mData": "dp3", "defaultContent": ""},
          {"mData": "dp4", "defaultContent": ""},
          {"mData": "dp5", "defaultContent": ""}
      ],

       columnDefs: [
           { width: 50, targets: 0 },
           { width: 130, targets: 1},
           { width: 200, targets: 2 },
           { width: 200, targets: 3 },
           { width: 700, targets: 4 },
           { width: 130, targets: 5 }
       ],
    });

    $('.album-table').DataTable({
      "aoColumns": [
          {"mData": "ab0", "defaultContent": ""},
          {"mData": "ab1", "defaultContent": ""},
          {"mData": "ab2", "defaultContent": ""},
          {"mData": "ab3", "defaultContent": ""},
          {"mData": "ab4", "defaultContent": ""},
          {"mData": "ab5", "defaultContent": ""}
      ],

       columnDefs: [
           { width: 50, targets: 0 },
           { width: 250, targets: 1 },
           { width: 300, targets: 2 },
           { width: 400, targets: 3 },
           { width: 200, targets: 4 },
           { width: 130, targets: 5 }
       ],
    });

    $('.photo-table').DataTable({
      "aoColumns": [
          {"mData": "pt0", "defaultContent": ""},
          {"mData": "pt1", "defaultContent": ""},
          {"mData": "pt2", "defaultContent": ""},
          {"mData": "pt3", "defaultContent": ""},
          {"mData": "pt4", "defaultContent": ""},
      ],

       columnDefs: [
           { width: 50, targets: 0 },
           { width: 300, targets: 1 },
           { width: 200, targets: 2 },
           { width: 300, targets: 3 },
           { width: 300, targets: 4 }
       ],
    });


      $('.member-table').DataTable({
        "aoColumns": [
            {"mData": "mb0", "defaultContent": ""},
            {"mData": "mb1", "defaultContent": ""},
            {"mData": "mb2", "defaultContent": ""},
            {"mData": "mb3", "defaultContent": ""},
            {"mData": "mb4", "defaultContent": ""},
            {"mData": "mb5", "defaultContent": ""},
            {"mData": "mb6", "defaultContent": ""},
            {"mData": "mb7", "defaultContent": ""},
            {"mData": "mb8", "defaultContent": ""},
            {"mData": "mb9", "defaultContent": ""},
            {"mData": "mb10", "defaultContent": ""},
        ],

         columnDefs: [
             { width: 30, targets: 0 },
             { width: 180, targets: 1 },
             { width: 300, targets: 2 },
             { width: 500, targets: 3 },
             { width: 300, targets: 4 },
             { width: 120, targets: 5 },
             { width: 250, targets: 6 },
             { width: 250, targets: 7 },
             { width: 300, targets: 8 },
             { width: 400, targets: 9 },
             { width: 200, targets: 10 }
         ],
      });


      $('.ques-table').DataTable({
        "aoColumns": [
            {"mData": "mb0", "defaultContent": ""},
            {"mData": "mb1", "defaultContent": ""},
            {"mData": "mb2", "defaultContent": ""},
            {"mData": "mb3", "defaultContent": ""},
        ],

         columnDefs: [
             { width: 50, targets: 0 },
             { width: 300, targets: 1 },
             { width: 300, targets: 2 },
             { width: 300, targets: 3 }
         ],
      });


      $('.ans-table').DataTable({
        "aoColumns": [
            {"mData": "ans0", "defaultContent": ""},
            {"mData": "ans1", "defaultContent": ""},
            {"mData": "ans2", "defaultContent": ""},
            {"mData": "ans3", "defaultContent": ""},
            {"mData": "ans4", "defaultContent": ""},
        ],

         columnDefs: [
             { width: 50, targets: 0 },
             { width: 300, targets: 1 },
             { width: 300, targets: 2 },
             { width: 300, targets: 3 },
             { width: 300, targets: 4 }
         ],
      });





    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Nhập thông tin...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

});
