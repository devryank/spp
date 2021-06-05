<x-app-layout>
    <x-slot name="css">
        <link rel="stylesheet"
              href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    </x-slot>
    <x-slot name="title">
        {{$title}}
    </x-slot>

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped"
                                   id="myTable">
                                <thead>
                                    <tr>
                                        <th>NPM</th>
                                        <th>Nama</th>
                                        <th>Prodi</th>
                                        <th>Semester</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <td class="py-1">{{ $student->npm }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->program_faculty->program->name }}</td>
                                        <td>{{ $student->semester }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.mahasiswa.show', $student->npm) }}"
                                               class="btn btn-primary btn-sm"><i class="ti-zoom-in"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script type="text/javascript"
                src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        {{-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> --}}
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        
        </script>
    </x-slot>
</x-app-layout>