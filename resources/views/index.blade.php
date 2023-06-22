<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
</head>

<body>

    <div class="w-25">
        <form action="">
            {{-- country --}}
            <div>
                <label>Country</labels=>
                <select name="" id="country">
                    <option>Select the country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- state --}}
            <div>
                <select name="" id="state"></select>
            </div>
            {{-- city --}}
            <div>
                <select name="" id="city"></select>
            </div>
        </form>
    </div>




    <script src="{{ asset('ui/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            //state
            $('#country').change(function(){
                var id_country = this.value
                $('#state').html('')
                $.ajax({
                    url: "{{ url('api/fetch-state') }}",
                    type: "POST",
                    dataType: "json",
                    data: {country_id: id_country, _token: "{{ csrf_token() }}"},
                    success: function(response) {
                        $('#state').html('<option>Select the state</option>')
                        $.each(response.states, function(index, val){
                            $('#state').append('<option value="'+ val.id +'">'+ val.name +'</option>');
                        });
                        $('#city').html('<option>Select the city</option>')
                    }
                })
            })
            //city
            $('#state').change(function(){
                var id_state = this.value
                $('#city').html('')
                $.ajax({
                    url: "{{ url('api/fetch-city') }}",
                    type: "POST",
                    dataType: "json",
                    data: {state_id: id_state, _token: "{{ csrf_token() }}"},
                    success: function(response) {
                        $('#city').html('<option>Select the city</option>')
                        $.each(response.cities, function(index, val){
                            $('#city').append('<option value="'+ val.id +'">'+ val.name +'</option>');
                        });
                    }
                })
            })
        })
    </script>

</body>

</html>
