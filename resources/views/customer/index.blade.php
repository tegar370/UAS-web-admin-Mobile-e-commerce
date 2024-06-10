@extends('template.index')

@section('content')

<style>
    #bulan-filter {
        max-width: 200px;
    }
</style>

<div class="container">
    <h3 class="text-center text-secondary">DATA CUSTOMER
    </h3>
    @if ($messege = Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_add'))
    <div class="alert alert-success alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('failed_add'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_edit'))
    <div class="alert alert-warning alert-dismissible text-white" role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible text-white" role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h1 class="text-center">TABEL CUSTOMER</h1>

            <!-- <div class="text-right">
                <a class="btn btn-primary" href="/customer/create-index">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div> -->

        </div>


        <div class="card-body">


            <div class="table-responsive">
                <table class="table table-striped" id="example2">
                    <thead class="text-center">
                        <tr>
                            <th>Nomor</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Photo Profile</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data_customer as $dtc )
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$dtc->first_name}} {{$dtc->last_name}}</td>
                            <td>{{$dtc->user->email}}</td>
                            <td>{{$dtc->phone_number}}</td>
                            <td>{{$dtc->address}}</td>
                            <td><img width="50px" src="{{$dtc->user->photo_profile_url}}" alt=""></td>
                            <td>
                                <a href="/customer/delete/{{$dtc->user->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
<script>
    var bulanArray = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    ];

    const getBulanFilter = document.getElementById("bulan-filter");

    bulanArray.map((data) => {
        getBulanFilter.innerHTML += ` <option value="${data}">${data}</option>`
    })

    getBulanFilter.addEventListener("change", function() {
        var selectedMonth = this.value;
        var tableRows = document.querySelectorAll("#example2 tbody tr");

        if (selectedMonth === "all") {
            tableRows.forEach(function(row) {
                row.style.display = "table-row";
            });
        } else {
            tableRows.forEach(function(row) {
                var monthCell = row.querySelectorAll("td")[3].innerText; // Kolom ke-4 berisi bulan
                if (monthCell === selectedMonth) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        }
    });
</script>


</div>
@endsection