@extends('layouts.main')



@section('title', 'Data Pasien')


@section('content')


<div class="right_col" role="main">
          <div class="">
            <div class="row">
            <div class="top_tiles">

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  
                  <div class="count">{{ $pasiens }}</div>
                  <h3>Total Pasien</h3>
                  <p></p>
                </div>
              </div>
              
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  
                  <div class="count">{{ $rekamMedis }}</div>
                  <h3>Total Rekam Medis</h3>
                  <p></p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  
                  <div class="count">Rp. {{ $total }}</div>
                  <h3>Total Pemasukan</h3>
                  <p></p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-12 col-sm-12 " >
              <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Kunjungan<small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                        <div class="col-sm-12">
                          <div class="card-box table-responsive">
                            
                              <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Nama Hewan</th>
                                    <th>Nama Pemilik</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    </tr>
                                </thead>                          
                              </table>
                        
                          </div>
                        </div>
                    </div>
                    
                </div>
              </div>
        </div>
        
      </div>
    </div>
  </div>



<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<script>

    let table;

    

    $(function() {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('pasien.data') }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false,
                },
                {
                    data: 'nm_hewan'
                },
                
                {
                    data: 'nm_pemilik'
                },
                {
                    data: 'phone'
                },
                {
                    data: 'address'
                },
               
            ]
        });
        
    });

    
</script>

@endsection