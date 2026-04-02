<x-guest-layout>
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-center mb-6">Tambah Tabungan Baru</h2>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('tabungan.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis</label>
                            <select name="jenis" id="jenis" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
                                <option value="">Pilih Jenis</option>
                                <option value="masuk" {{ old('jenis') == 'masuk' ? 'selected' : '' }}>Masuk</option>
                                <option value="keluar" {{ old('jenis') == 'keluar' ? 'selected' : '' }}>Keluar</option>
                            </select>
                            @error('jenis')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nominal (Rp)</label>
                            <input type="number" name="nominal" value="{{ old('nominal') }}" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required min="1">
                            @error('nominal')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                            <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
                            @error('tanggal')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Via</label>
                            <select name="metode" id="metode" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
                                <option value="">Pilih Via</option>
                                <option value="cash" {{ old('metode') == 'cash' ? 'selected' : '' }}>Cash</option>
                                <option value="transfer" {{ old('metode') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                            </select>
                            @error('metode')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan (Opsional)</label>
                            <textarea name="keterangan" rows="3" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex space-x-4">
                            <button type="submit" class="flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-md transition duration-200">
                                Simpan
                            </button>
                            <a href="{{ route('tabungan.index') }}" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-md text-center transition duration-200">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

