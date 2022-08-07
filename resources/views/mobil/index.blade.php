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
                            @if (isset($mobil_edit))
                            <form action="{{url('mobil/'.$mobil_edit->id)}}" method="post">
                                @csrf
                                @method('patch')
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Nama Merk.</label>
                                            <select name="merk" id="merk" class="form-control">
                                                @foreach ($merk as $item)
                                                @if($item->id == $mobil_edit->id_merk)
                                                <option value="{{$item->id}}" selected>{{$item->merk}}</option>
                                                @else
                                                <option value="{{$item->id}}">{{$item->merk}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Mobil.</label>
                                            <input type="text" name="nama_mobil" value="{{$mobil_edit->nama_mobil}}" class="form-control radius-30" />
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Warna Mobil</label>
                                                <input type="text" name="warna_mobil" value="{{$mobil_edit->warna_mobil}}" class="form-control radius-30" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Jumlah Kursi</label>
                                                <input type="text" name="jumlah_kursi" value="{{$mobil_edit->jumlah_kursi}}" class="form-control radius-30" />
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>No Polisi</label>
                                                <input type="text" name="no_polisi" value="{{$mobil_edit->no_polisi}}" class="form-control radius-30" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tahun Beli</label>
                                                <input type="text" name="tahun_beli" value="{{$mobil_edit->tahun_beli}}" class="form-control radius-30" />
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Bahan Bakar</label>
                                                <input type="text" name="bahan_bakar" value="{{$mobil_edit->bahan_bakar}}" class="form-control radius-30" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tanggal Service</label>
                                                <input type="date" name="tanggal" value="{{$mobil_edit->tanggal_services}}" class="form-control radius-30" />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary px-5 radius-30">Update</button>
                                    </div>
                                </form>
                            @else
                            <form action="{{url('mobil')}}" method="post">
                            @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Nama Merk.</label>
                                        <select name="merk" id="merk" class="form-control">
                                            @foreach ($merk as $item)
                                            <option value="{{$item->id}}">{{$item->merk}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Mobil.</label>
                                        <input type="text" name="nama_mobil" class="form-control radius-30" />
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Warna Mobil</label>
                                            <input type="text" name="warna_mobil" class="form-control radius-30" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Jumlah Kursi</label>
                                            <input type="text" name="jumlah_kursi" class="form-control radius-30" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>No Polisi</label>
                                            <input type="text" name="no_polisi" class="form-control radius-30" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tahun Beli</label>
                                            <input type="text" name="tahun_beli" class="form-control radius-30" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Bahan Bakar</label>
                                            <input type="text" name="bahan_bakar" class="form-control radius-30" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Service</label>
                                            <input type="date" name="tanggal" class="form-control radius-30" />
                                        </div>
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
											<th>Merk</th>
                                            <th>Mobil</th>
                                            <th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($mobil as $key => $item)
										<tr>
											<td>{{$no ++}}</td>
											<td>{{$item->merk}}</td>
                                            <td>{{$item->nama_mobil}}</td>
											<td></td>
											<td>
                                                <a class="btn-detail" id="{{$item->id}}" data-toggle="modal" data-target="#exampleModal1"><i data-feather="eye"></i></a>
                                                <a href="{{url('mobil/') . '/' . Crypt::encrypt($item->id) . '/edit'}}"><i data-feather="edit"></i></a>
                                        <form id="form_{{$key}}" action="{{url('mobil/'. Crypt::encrypt($item->id))}}" method="post" style="display: inline-block;" novalidate="false">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('content-js')
<script>
     $(document).ready(function () {
        $('.btn-delete').on('click', function(e) {
            $('#form_' + $(this).attr('id')).submit();
        })
        $('.btn-detail').click(function (e) { 
            $.ajax({
       url: `{{url('/mobil/get_data/`+ $(this).attr(`id`) +`')}}`,
       type: 'GET',
       dataType: 'JSON',
       success: function (data) {
        console.log(data)
        $('#nama_merk').val(data.merk);
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