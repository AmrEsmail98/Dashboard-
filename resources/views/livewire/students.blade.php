<div>
    @include('livewire.create');
    @include('livewire.update')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-11">
                    @if(session()->has('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3> ALL Students

                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#addStudentModal">
                                    Add new Student
                                </button>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> First Name </th>
                                        <th> Second Name </th>
                                        <th> Email </th>
                                        <th> Phone </th>
                                        <th> Location </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->firstname }}</td>
                                            <td>{{ $student->lastname }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ $student->location }}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateStudentModal"  wire:click.prevent="edit({{$student->id}})">
                                                    Edit
                                                  </button>
 <button type="button" class="btn btn-outline-danger" wire:click.prevent="delete({{$student->id}})">Delete</button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

</head>
<div>
    <header class="bg-white-700">
        <div class="ml-4 py-6 px-4">

            {{-- {{ $header }} --}}
        </div>
    </header>
    <x-slot name="header">
        <ul>
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                <li style=" display: inline;
            list-style-type: none;
            padding-right: 20px;
            float: left; ">
                    <a class="nav-link" style="color:black"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
        </ul> <br><br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Livewire CRUD

        </h2>

    </x-slot>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
