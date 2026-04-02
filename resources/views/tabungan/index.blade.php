<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Tabungan Saya</h2>
                        <a href="{{ route('tabungan.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                            + Tambah Tabungan
                        </a>
                    </div>

                    <!-- Rekap -->
                    @if($saldo != 0)
                    <div class="grid grid-cols-3 gap-4 mb-8 p-4 bg-gray-50 rounded-lg">
                        <div>
                            <p class="text-sm text-gray-600">Masuk</p>
                            <p class="text-2xl font-bold text-green-600">Rp {{ number_format($masuk,0,',','.') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Keluar</p>
                            <p class="text-2xl font-bold text-red-600">Rp {{ number_format($keluar,0,',','.') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Saldo</p>
                            <p class="text-2xl font-bold {{ $saldo >= 0 ? 'text-green-600' : 'text-red-600' }}">Rp {{ number_format($saldo,0,',','.') }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Via</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($tabungans as $index => $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->tanggal->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->jenis == 'masuk' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $item->jenis == 'masuk' ? '+' : '-' }} Rp {{ number_format($item->nominal,0,',','.') }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $item->metode == 'cash' ? 'yellow' : 'blue' }}-100 text-{{ $item->metode == 'cash' ? 'yellow' : 'blue' }}-800">
                                                {{ ucfirst($item->metode) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 max-w-xs">{{ $item->keterangan ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('tabungan.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                                            <form method="POST" action="{{ route('tabungan.destroy', $item) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                            Belum ada data tabungan. <a href="{{ route('tabungan.create') }}" class="text-blue-600 hover:text-blue-900 font-semibold">Tambah sekarang!</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

