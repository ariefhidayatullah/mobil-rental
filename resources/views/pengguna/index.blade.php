@extends('template.layouts')

@section('content')
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Mobil</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Mobil</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card radius-15 border-lg-top-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class='bx bxs-user mr-1 font-24 text-primary'></i>
                                </div>
                                <h4 class="mb-0 text-primary">Tambah Mobil</h4>
                            </div>
                            <hr/>
                            @if (isset($pengguna_edit))
                            @else
                            <form action="{{url('pengguna')}}" method="post">
                            @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Nama Pemesan.</label>
                                        <input type="text" name="nama" class="form-control radius-30" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin.</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat.</label>
                                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary px-5 radius-30">Tambah</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card border-lg-top-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class='bx bxs-user mr-1 font-24 text-primary'></i>
                                </div>
                                <h4 class="mb-0 text-primary">Daftar Merk</h4>
                            </div>
                            <hr/>
                            <div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>nama</th>
                                            <th>jenis kelamin</th>
                                            <th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($pengguna as $key => $item)
										<tr>
											<td>{{$no ++}}</td>
											<td>{{$item->nama}}</td>
                                            <td>{{$item->jenis_kelamin}}</td>
                                            <td>{{$item->status}}</td>
											<td>
                                                <a class="btn-detail" id="{{$item->id}}" data-toggle="modal" data-target="#exampleModal1"><i data-feather="eye"></i></a>
                                                <a href="{{url('pengguna/') . '/' . Crypt::encrypt($item->id) . '/edit'}}"><i data-feather="edit"></i></a>
                                        <form id="form_{{$key}}" action="{{url('pengguna/'. Crypt::encrypt($item->id))}}" method="post" style="display: inline-block;" novalidate="false">
                                            @method('delete')
                                            @csrf
                                            <a href="#" class="btn-delete" id="{{$key}}"><i data-feather="trash-2"></i></a>
                                        </form>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"><div class="form-body">
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
                {{-- <button type="submit" class="btn btn-primary px-5 radius-30">Tambah</button> --}}
            </div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('content-js')
<script>
     
    
</script>
@endpush