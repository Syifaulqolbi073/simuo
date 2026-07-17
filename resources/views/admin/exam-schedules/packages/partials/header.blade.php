<x-ui.card>

    <div class="flex items-center justify-between">

        <div>

            <h2 class="text-2xl font-bold">

                {{ $package->package_name }}

            </h2>

            <p class="mt-2 text-sm text-slate-500">

                Kode Paket :
                <strong>{{ $package->package_code }}</strong>

            </p>

            <p class="text-sm text-slate-500">

                Jadwal :
                <strong>{{ $examSchedule->title }}</strong>

            </p>

            <p class="text-sm text-slate-500">

                Tanggal :
                {{ $examSchedule->exam_date->format('d M Y') }}
                &bull;
                {{ \Carbon\Carbon::parse($examSchedule->start_time)->format('H:i') }}

            </p>

            <p class="text-sm text-slate-500">

                Jumlah Soal :
                <strong>{{ $package->total_question }}</strong>

                &bull;

                Total Nilai :
                <strong>{{ $package->total_score }}</strong>

            </p>

        </div>

        <div class="text-right">

            @if($package->is_active)

                <x-ui.badge type="success">

                    Aktif

                </x-ui.badge>

            @else

                <x-ui.badge type="secondary">

                    Nonaktif

                </x-ui.badge>

            @endif

        </div>

    </div>

</x-ui.card>