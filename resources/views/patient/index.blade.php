@extends('home')

@section('dashboard')
<div class="row justify-content-center">
    <div class="col-3 text-center">
        <label for="hospital">Filter Rumah Sakit:</label>
        <select class="form-control text-center" name="hospital" id="hospital">
            <option value="" selected>Semua Rumah Sakit</option>
            @foreach ($hospitals as $hospital)
                <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row justify-content-center mt-3">
    <div class="col">
        <table class="table">
            <tr>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Rumah Sakit Terdaftar</th>
                <th></th>
            </tr>
            <tbody id="content"></tbody>
        </table>
        <span id="pages"></span>
    </div>
</div>

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script>
$(() => {
    let data = retrieveData();
    renderTable(data.data);
    pagination(hospital='', data.last_page);

    
    $.each(data.data, (index, data) => {
        $(`#delete_${data.id}`).on('click', (e) => {
            deleteData(data.id)
            $(`#hospital_${data.id}`).remove();
        })
    })

    $('#hospital').on('change', (e) => {
        console.log($('#hospital').val())
        let hospital = $('#hospital').val()
        $('#content').empty()
        $('#pages').empty()
        data = retrieveData(hospital)
        renderTable(data.data)
        pagination(hospital, data.last_page)
    })

    function pagination(hospital='', last_page) {
        $.each(new Array(last_page), (n) => {
            $('#pages').append(`
                <button id="page_${n+1}" class="btn btn-outline-primary">${n+1}</button>
            `)

            $(`#page_${n+1}`).on('click', (e) => {
                $('#content').html('');

                data = retrieveData(hospital, n+1);
                renderTable(data.data);
            })
        })

    }

    function renderTable(data) {
        $.each(data, (index, patient) => {
            $('#content').append(`
                <tr id="hospital_${patient.id}">
                    <td>${patient.name}</td>    
                    <td>${patient.address}</td>   
                    <td>${patient.phone}</td>   
                    <td>${patient.hospital?.name ?? '-'}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="/patients/${patient.id}" class="btn btn-outline-primary"><i class="fa-solid fa-up-right-from-square"></i></a>   
                            <a href="/patients/${patient.id}/edit" class="btn btn-outline-primary"><i class="fa-solid fa-pen"></i></a> 
                            <a id="delete_${patient.id}" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </td> 
                </tr>
            `);
        });
    }
    
    function retrieveData(hospital='', page=1) {
        let response = false;

        $.get({
            url: `/api/patients?page=${page}&hospital=${hospital}`,
            async: false,
            success: (result) => {
                response = result.data;
            },
            error: (error) => {
                response = error;
            }
        });

        return response;
    }

    function deleteData(id) {
        let response = false;

        $.ajax({
            url: `/api/patients/${id}`,
            type: 'DELETE',
            async: false,
            success: (result) => {
                response = result.message;
            },
            error: (error) => {
                response = error;
            }
        });

        return response;
    }
});
</script>
@endsection