<x-app-layout>
    <x-slot name="css">
        <link rel="stylesheet"
              href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    </x-slot>
    <x-slot name="title">
        {{$title}}
    </x-slot>

    <div class="content-wrapper">
        <div class="row my-3">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dashboard.mahasiswa.store', request()->segment('3')) }}"
                              method="post">
                            @method('post')
                            @csrf
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number"
                                       name="amount"
                                       class="form-control">
                            </div>
                            <input type="submit"
                                   value="Tambah"
                                   class="btn btn-primary btn-sm">
                        </form>
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