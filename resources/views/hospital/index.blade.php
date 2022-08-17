@extends('home')

@section('dashboard')

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <th>Nama Rumah Sakit</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th class="text-center">Jumlah Pasien</th>
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

    $.each(new Array(data.last_page), (n) => {
        $('#pages').append(`
            <button id="page_${n+1}" class="btn btn-outline-primary">${n+1}</button>
        `)

        $(`#page_${n+1}`).on('click', (e) => {
            $('#content').html('');

            data = retrieveData(n+1);
            renderTable(data.data);
        })
    })

    $.each(data.data, (index, data) => {
        $(`#delete_${data.id}`).on('click', (e) => {
            deleteData(data.id)
            $(`#hospital_${data.id}`).remove();
        })
    })

    function renderTable(data) {
        $.each(data, (index, hospital) => {
            $('#content').append(`
                <tr id="hospital_${hospital.id}">
                    <td>${hospital.name}</td>    
                    <td>${hospital.address}</td>    
                    <td>${hospital.email}</td>    
                    <td>${hospital.phone}</td>   
                    <td class="text-center">${hospital.patients_count}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="/hospitals/${hospital.id}" class="btn btn-outline-primary"><i class="fa-solid fa-up-right-from-square"></i></a>   
                            <a href="/hospitals/${hospital.id}/edit" class="btn btn-outline-primary"><i class="fa-solid fa-pen"></i></a> 
                            <a id="delete_${hospital.id}" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </td> 
                </tr>
            `);
        });
    }
    
    function retrieveData(page=1) {
        let response = false;

        $.get({
            url: `/api/hospitals?page=${page}`,
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
            url: `/api/hospitals/${id}`,
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