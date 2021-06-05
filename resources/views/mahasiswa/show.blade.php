<x-app-layout>
    <x-slot name="css">
        <link rel="stylesheet"
              href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    </x-slot>
    <x-slot name="title">
        {{$title}}
    </x-slot>

    <div class="content-wrapper">
        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show"
             role="alert">
            {{ Session::get('success') }}
            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-9">
                <h3>{{ $student->name }}</h3>
                <p>Semester: {{ $student->semester }}</p>
                <hr>
                <h4>Sisa yang harus dibayar : <span
                          class="text-danger">{{ "Rp" . number_format($remaining,0,',','.') }}</span></h4>
            </div>
            <div class="col-3 text-right">
                <a href="{{ route('dashboard.mahasiswa.create', $student->npm) }}"
                   class="btn btn-primary btn-sm">Tambah</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped"
                                   id="myTable">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td class="py-1">{{ $payment->created_at }}</td>
                                        <td>{{ "Rp". number_format($payment->amount,0,',','.') }}</td>
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