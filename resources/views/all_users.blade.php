@extends('layouts.admindash')

@section('content')

<div class="sf-bs-data-table">
    <div class="table-responsive">
             <table class="table table-striped table-bordered example-dt-table" style="width:100%">
                 <thead>
                     <tr>
                         <th>Name</th>
                         <th>email</th>
                         <th>Phone Number</th>
                         <th>Address</th>
                         <th>State</th>
                         <th>Gender</th>
                         <th>Age</th>
                         <th>Type</th>
                     </tr>
                 </thead>
                 <tbody>
                    @foreach ($users as $user)

                    <tr>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->email }} </td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->state }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->type }}</td>
                    </tr>


                    @endforeach
                 </tbody>

             </table>
    </div>
</div>



@endsection
