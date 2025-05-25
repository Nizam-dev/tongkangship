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
                            @php($no2 = 1)
                            @forelse ($data->where('type_booking', 'beli') as $item)
                            <tr>
                                <td>{{ $no2++ }}</td>
                                <td>{{ $item->kode_booking }}</td>
                                <td>{{ $item->nama_kapal }}</td>
                                <td>@formatRupiah($item->total)</td>
                                <td>
                                     @if ($item->status == 'pembayaran diterima')
                                    <span class="badge bg-warning">Kapal Sedang Disiapkan</span>
                                    @elseif ($item->status == 'kapal sedang dikirim' || $item->status == 'selesai')
                                        <span class="badge bg-success">{{ $item->status }}</span>
                                    @elseif ($item->status == 'menunggu konfirmasi')
                                    <span class="badge bg-info">Menunggu Konfirmasi Pembayaran</span>
                                    <br>
                                    <a href="{{ url('images/bukti_pembayaran/'.$item->bukti_pembayaran) }}" class="text-primary">Lihat Pembayaran</a>
                                    @else
                                    <span class="badge bg-danger">{{ $item->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status == 'pembayaran')
                                    <a href="{{ url('pembayaran/'.$item->id) }}"
                                        class="btn btn-sm btn-warning">Pembayaran</a>
                                    @elseif($item->status == 'expired' || $item->status == 'pembayaran ditolak' || $item->status == 'menunggu konfirmasi')
                                    -
                                    @endif
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