@extends('layouts.base', ['title' => 'Dashboard - Administrator - Laravel 9'])

@section('content')
@include('layouts.header', ['title' => 'Dashboard', 'action' => 'Dashboard'])
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @elseif (Session::has('errors'))
            <div class="alert alert-danger">
                {{ Session::get('errors') }}
            </div>
            @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body col-lg">
                            <h4 class="card-title">FORM TAMBAH DATA AGEN</h4>
                            {{-- <form action="{{ route('tambah.agen') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3  mt-3 mt-lg-0">
                                            <label for="nama_kota">kota</label>
										    <select class="form-control" id="kota_id" name="kota_id" required>
											<option value="">Pilih kota</option>
											@foreach ($kota as $kt)
												<option value="{{ $kt['id'] }}"> {{ $kt['nama_kota'] }}</option>
											@endforeach
										</select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3  mt-3 mt-lg-0">
                                            <label class="form-label" for="tempat_agen">Masukkan Data</label>
                                            <input class="form-control" name="tempat_agen" id="tempat_agen">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success w-md">Tambah Agen</i></button>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title my-2">Data Agen</h4>
                          

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>


@endsection