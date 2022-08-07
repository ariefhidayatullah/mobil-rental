@extends('template.layouts')

@section('content')
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Verifikasi</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Verifikasi</li>
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
                                <h4 class="mb-0 text-primary">Daftar Pemesanan</h4>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemesan</th>
                                            <th>Mobil</th>
                                            <th>Nama Sopir</th>
                                            <th>Pihak Menyetujui</th>
                                            <th>Status</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($rental as $key => $item)
                                        <tr>
                                            <td>{{$no ++}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->nama_mobil}}</td>
                                            <td>{{$item->nama_sopir}}</td>
                                            <td>{{$item->nama_manager}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>
                                                <a class="btn-detail" id="{{$item->id_rental}}" data-toggle="modal"
                                                    data-target="#exampleModal1"><i data-feather="check"></i></a>
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
    </div>
    <!--end page-content-wrapper-->
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card radius-15 border-lg-top-primary">
                            <div class="card-body p-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class='bx bxs-user mr-1 font-24 text-primary'></i>
                                    </div>
                                    <h4 class="mb-0 text-primary">Data Mobil</h4>
                                </div>
                                <hr />
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Nama Merk.</label>
                                            <input type="text" name="merk" id="nama_merk" class="form-control radius-30" disabled/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Mobil.</label>
                                            <input type="text" name="nama_mobil" id="nama_mobil" class="form-control radius-30" disabled/>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Warna Mobil</label>
                                                <input type="text" name="warna_mobil" id="warna_mobil" class="form-control radius-30" disabled/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Jumlah Kursi</label>
                                                <input type="text" name="jumlah_kursi" id="jumlah_kursi" class="form-control radius-30" disabled/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>No Polisi</label>
                                                <input type="text" name="no_polisi" id="no_polisi" class="form-control radius-30" disabled/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tahun Beli</label>
                                                <input type="text" name="tahun_beli" id="tahun_beli" class="form-control radius-30" disabled/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Bahan Bakar</label>
                                                <input type="text" name="bahan_bakar" id="bahan_bakar" class="form-control radius-30" disabled/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tanggal Service</label>
                                                <input type="date" name="tanggal" id="tanggal" class="form-control radius-30" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card border-lg-top-primary">
                            <div class="card-body p-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class='bx bxs-user mr-1 font-24 text-primary'></i>
                                    </div>
                                    <h4 class="mb-0 text-primary">Data Pemesan</h4>
                                </div>
                                <hr/>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Nama Pemesan.</label>
                                            <input type="text" name="nama" id="nama" class="form-control radius-30" disabled/>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin.</label>
                                            <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control radius-30" disabled/>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat.</label>
                                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" disabled></textarea>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form id="form_data" action="" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" id="id">
                <button type="submit" class="btn btn-primary">Terima Pengajuan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('content-js')
<script>
    $(document).ready(function () {
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
