@extends('layouts.app')

@section('content')
<div class="container">
<h1> <a href="{{ route('employees.index') }}"><img style="width: 1em;margin-right: 10px;" src="{{ asset('icons/arrowback-icon.webp') }}" alt=""></a> Agregar Empleado</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">Nombres</label>
            <input type="text" name="first_name" class="form-control" id="first_name" required>
        </div>
        
        <div class="mb-3">
            <label for="last_name" class="form-label">Apellidos</label>
            <input type="text" name="last_name" class="form-control" id="last_name" required>
        </div>

        <div class="mb-3">
            <label for="identification" class="form-label">Identificación</label>
            <input type="text" name="identification" class="form-control" id="identification" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Dirección</label>
            <input type="text" name="address" class="form-control" id="address" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" class="form-control" id="phone" required>
        </div>

        <div class="mb-3">
            <label for="country_id" class="form-label">País</label>
            <select name="country_id" class="form-control" id="country_id" required>
                <option value="">Seleccione un país</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->long_description }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" id="city-select" style="display: none;">
            <label for="city_id" class="form-label">Ciudad</label>
            <select name="city_id" class="form-control" id="city_id" required>
                <option value="">Seleccione una ciudad</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#country_id').change(function() {
            const countryId = $(this).val();
            //$('#city-select').hide();

            if (countryId) {

                console.log(countryId)
                $.ajax({
                    url: '/get-cities/' + countryId,
                    type: 'GET',
                    success: function(data) {
                        const citySelect = $('#city_id');
                        citySelect.empty();
                        citySelect.append('<option value="">Seleccione una ciudad</option>');

                        // rellena el select con las ciudades obtenidas
                        $.each(data, function(index, city) {
                            citySelect.append('<option value="' + city.id + '">' + city.name + '</option>');
                        });

                        // muestra el select de ciudades
                        $('#city-select').show();
                    },
                    error: function() {
                        alert('Error al obtener las ciudades.');
                    }
                });
            }
        });
    });
</script>
