@extends('layouts.admindash')

@section('content')

<div class="sf-bs-data-table">
    <div class="table-responsive">
             <table class="table table-striped table-bordered example-dt-table" style="width:100%">
                 <thead>
                     <tr>
                         <th>Name</th>
                         <th>Manufacturer</th>
                         <th>Model </th>
                         <th>Year</th>
                         <th>Plate_Number</th>
                         <th>Colour</th>
                     </tr>
                 </thead>
                 <tbody>
                    @foreach ($vehicle as $vehicles)

                    <tr>
                        <td>{{ $vehicles->user->name }} </td>
                        <td>{{ $vehicles->manufacturer }} </td>
                        <td>{{ $vehicles->model }} </td>
                        <td>{{ $vehicles->year }}</td>
                        <td>{{ $vehicles->plate_number }}</td>
                        <td>{{ $vehicles->colour }}</td>
                    </tr>


                    @endforeach
                 </tbody>

             </table>
    </div>
</div>



@endsection
