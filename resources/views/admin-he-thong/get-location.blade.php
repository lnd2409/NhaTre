{{-- @include('admin.template.js') --}}
<script>
    $(document).ready(function() {
        var jsonFile = "{{ asset('admin-he-thong') }}"+"local.json";
        $("#driver").click(function(event){
            $.getJSON(jsonFile, function(jd) {
                console.log('jd');
            });
        });

    });
 </script>
