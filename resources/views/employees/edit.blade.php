@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empleado</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="first_name" class="form-label">Nombres</label>
            <input type="text" name="first_name" class="form-control" id="first_name" value="{{ $employee->first_name }}" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Apellidos</label>
            <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $employee->last_name }}" required>
        </div>
        <div class="mb-3">
            <label for="identification" class="form-label">Identificación</label>
            <input type="text" name="identification" class="form-control" id="identification" value="{{ $employee->identification }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Dirección</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ $employee->address }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ $employee->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="country_id" class="form-label">País</label>
            <select name="country_id" class="form-control" id="country_id" required>
                <option value="">Seleccione un país</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ $country->id == $employee->country_id ? 'selected' : '' }}>
                        {{ $country->long_description }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" id="city-select" style="display: none;">
            <label for="city_id" class="form-label">Ciudad</label>
            <select name="city_id" class="form-control" id="city_id" required>
                <option value="">Seleccione una ciudad</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const selectedCountryId = "{{ $employee->country_id }}";
        const selectedCityId = "{{ $employee->city_id }}";

        if (selectedCountryId) {
            $('#country_id').val(selectedCountryId).change();

            if (selectedCityId) {
                $('#city-select').show();
            }
        }

        $('#country_id').change(function() {
            const countryId = $(this).val();
            const citySelect = $('#city_id');

            if (countryId) {
                $.ajax({
                    url: '/get-cities/' + countryId,
                    type: 'GET',
                    success: function(data) {
                        citySelect.empty();
                        citySelect.append('<option value="">Seleccione una ciudad</option>');

                        $.each(data, function(index, city) {
                            citySelect.append('<option value="' + city.id + '">' + city.name + '</option>');
                        });

                        if (selectedCityId) {
                            citySelect.val(selectedCityId);
                        }

                        $('#city-select').show();
                    },
                    error: function() {
                        alert('Error al obtener las ciudades.');
                    }
                });
            } else {
                $('#city-select').hide();
            }
        });

        if (selectedCityId) {
            $('#city-select').show();
        }
    });
</script>