<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ddslick.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script>
    var ddData = [];
    $('#myDropdown').ddslick({
        data: ddData,
        width: 90,
        selectText: "Select your preferred social network",
        imagePosition: "right",
        onSelected: function (data) {
            console.log(data.selectedIndex);
            // if(data.selectedIndex == 1 ){
            //     window.location = "{{url('/en')}}";
            // }else{
            //     window.location = "{{url('/tr')}}";
            // }
        }
    });
</script>
