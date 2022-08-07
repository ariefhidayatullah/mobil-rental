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
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 border-lg-top-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class='bx bxs-user mr-1 font-24 text-primary'></i>
                                </div>
                                <h4 class="mb-0 text-primary">Tambah Merk</h4>
                            </div>
                            <hr/>
                            @if (isset($merk_edit))
                            <form action="{{url('merk/'.$merk_edit->id)}}" method="post">
                                @csrf
                                @method('patch')
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Nama Merk.</label>
                                            <input type="hidden" name="id" value="{{$merk_edit->id}}" class="form-control radius-30" />
                                            <input type="text" name="merk" value="{{$merk_edit->merk}}" class="form-control radius-30" />
                                        </div>
                                        <button type="submit" class="btn btn-primary px-5 radius-30">Tambah</button>
                                    </div>
                                </form>
                            @else
                            <form action="{{url('merk')}}" method="post">
                            @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Nama Merk.</label>
                                        <input type="text" name="merk" class="form-control radius-30" />
                                    </div>
                                    <button type="submit" class="btn btn-primary px-5 radius-30">Tambah</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="card border-lg-top-danger">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class='bx bxs-user mr-1 font-24 text-danger'></i>
                                </div>
                                <h4 class="mb-0 text-danger">Daftar Merk</h4>
                            </div>
                            <hr/>
                            <div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Merk</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($merk as $key => $item)
										<tr>
											<td>{{$no ++}}</td>
											<td>{{$item->merk}}</td>
											<td>
                                                <a href="{{url('merk/') . '/' . Crypt::encrypt($item->id) . '/edit'}}"><i data-feather="edit"></i></a>
                                        {{-- <a class="reset" value="{{Crypt::encrypt($item->id)}}"><i data-feather="refresh-cw"></i></a> --}}
                                        <form id="form_{{$key}}" action="{{url('merk/'. Crypt::encrypt($item->id))}}" method="post" style="display: inline-block;" novalidate="false">
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
@endsection
@push('content-js')
<script>
    $(document).ready(function() {
        // $('table').DataTable();
        $('.btn-delete').on('click', function(e) {
            $('#form_' + $(this).attr('id')).submit();
        })
    });
</script>
@endpush