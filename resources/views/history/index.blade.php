@extends('template.layouts')

@section('content')
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">History</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar History</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-12">
                    <div class="card border-lg-top-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class='bx bxs-user mr-1 font-24 text-primary'></i>
                                </div>
                                <h4 class="mb-0 text-primary">Daftar History</h4>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemesan</th>
                                            <th>Mobil</th>
                                            <th>Nama Sopir</th>
                                            <th>Pihak Menyetujui</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($rental as $key => $item)
                                        <tr>
                                            <td>{{$no ++}}</td>
                                            <td>{{$item->nama_pengguna}}</td>
                                            <td>{{$item->nama_mobil}}</td>
                                            <td>{{$item->nama_sopir}}</td>
                                            <td>{{$item->nama_manager}}</td>
                                            <td>{{$item->status}}</td>
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
    </div>
    <!--end page-content-wrapper-->
</div>

@endsection
@push('content-js')
<script>
    $(document).ready(function () {

        var table = $('#example2').DataTable({
				lengthChange: false,
				buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
			});
			table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        $('.btn-delete').on('click', function (e) {
            $('#form_' + $(this).attr('id')).submit();
        });

        $('.btn-detail').click(function (e) { 
            
            $.ajax({
       url: `{{url('/verifikasi/get_data/`+ $(this).attr(`id`) +`')}}`,
       type: 'GET',
       dataType: 'JSON',
       success: function (data) {
        $('#form_data').attr('action', `{{url('verifikasi/`+ data.id_rental +`')}}`);
        $('#id').val(data.id_rental);
        $('#nama').val(data.nama);
        $('#jenis_kelamin').val(data.jenis_kelamin);
        $('#alamat').val(data.alamat);
        $('#nama_merk').val(data.nama_merk);
        $('#nama_mobil').val(data.nama_mobil);
        $('#warna_mobil').val(data.warna_mobil);
        $('#jumlah_kursi').val(data.jumlah_kursi);
        $('#no_polisi').val(data.no_polisi);
        $('#tahun_beli').val(data.tahun_beli);
        $('#bahan_bakar').val(data.bahan_bakar);
        $('#tanggal').val(data.tanggal_services);
       }
     });
            
        });
    });

</script>
@endpush
