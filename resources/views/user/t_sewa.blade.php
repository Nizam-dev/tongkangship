  <div class="table-responsive">
      <table class="table table-hover table-stripped">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama Kapal</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
              @php($no1 = 1)
              @forelse ($data->where('type_booking', 'sewa') as $item)
              <tr>
                  <td>{{ $no1++ }}</td>
                  <td>{{ $item->kode_booking }}</td>
                  <td>{{ $item->nama_kapal }}</td>
                  <td>@formatRupiah($item->total+$item->operational)</td>
                  <td>
                      @if ($item->status == 'pembayaran diterima')
                    <span class="badge bg-warning">Kapal Sedang Disiapkan</span>
                      @elseif ($item->status == 'kapal sedang dikirim' || $item->status == 'selesai')
                      <span class="badge bg-success">{{ $item->status }}</span>
                      @elseif ($item->status == 'menunggu konfirmasi')
                      <span class="badge bg-info">Menunggu Konfirmasi Pembayaran</span>
                      <br>
                      <a href="{{ url('images/bukti_pembayaran/'.$item->bukti_pembayaran) }}" class="text-primary">Lihat
                          Pembayaran</a>
                      @else
                      <span class="badge bg-danger">{{ $item->status }}</span>
                      @endif
                  </td>
                  <td>
                      @if($item->status == 'pembayaran')
                      <a href="{{ url('pembayaran/'.$item->id) }}" class="btn btn-sm btn-warning">Pembayaran</a>
                      @elseif($item->status == 'expired' || $item->status == 'pembayaran ditolak' || $item->status ==
                      'menunggu konfirmasi')
                      -
                      @else
                      <a href="#" data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}"
                          class="btn btn-sm btn-primary">Detail</a>
                        <a href="{{ url('tracking/'.$item->id) }}" class="btn btn-sm btn-warning">
                            Tracking
                        </a>
                      @endif
                      <!-- <a href="{{ url('user/transaksi/'.$item->id) }}"
                                        class="btn btn-sm btn-primary">Detail</a> -->
                  </td>
              </tr>
              @empty
              <tr>
                  <td colspan="6" class="text-center">Tidak Ada Data</td>
              </tr>
              @endforelse
          </tbody>
      </table>
  </div>


    @foreach ($data->where('type_booking', 'sewa') as $item)
  <!-- MOdal Detal -->
  <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <table class="table table-hover table-stripped table-bordered">
                      <tr>
                          <td>Kode Booking</td>
                          <td>: {{ $item->kode_booking }}</td>
                      </tr>
                      <tr>
                          <td>Nama Kapal</td>
                          <td>: {{ $item->nama_kapal }}</td>
                      </tr>
                      <tr>
                          <td>Kategori</td>
                          <td>: {{ $item->kategori }}</td>
                      </tr>
                      <tr>
                          <td>Harga</td>
                          <td>: @formatRupiah($item->total)</td>
                      </tr>
                      <tr>
                          <td>Tanggal</td>
                          <td>: {{ date('d M Y', strtotime($item->tanggal_mulai)) }} Sampai {{ date('d M Y', strtotime($item->tanggal_selesai)) }}</td>
                      </tr>

                      <tr>
                          <td>Nama</td>
                          <td>: {{ $item->nama }}</td>
                      </tr>
                      <tr>
                          <td>Email</td>
                          <td>: {{ $item->email }}</td>
                      </tr>
                      <tr>
                          <td>No Hp</td>
                          <td>: {{ $item->no_hp }}</td>
                      </tr>
                      <tr>
                          <td>Alamat</td>
                          <td>: {{ $item->alamat }}</td>
                      </tr>
                    <tr>
                        <td>Pelabuhan Asal</td>
                        <td>: {{ $item->pelabuhan_asal }}</td>
                      </tr>
                    <tr>
                        <td>Pelabuhan Tujuan</td>
                        <td>: {{ $item->pelabuhan_tujuan . ' - ' . $item->lokasi_pelabuhan }}</td>
                      </tr>
                      @if($item->bukti_pembayaran != null)
                      <tr>
                          <td>Bukti Pembayaran</td>
                          <td>
                              <a href="{{ url('images/bukti_pembayaran/'.$item->bukti_pembayaran) }}" class="text-primary">Lihat Pembayaran</a>
                          </td>
                      </tr>
                      @endif

                  </table>
              </div>
          </div>
      </div>
  </div>
  @endforeach