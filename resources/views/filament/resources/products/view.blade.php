<x-filament-panels::page>
    @if ($this->hasInfolist())
        {{ $this->infolist }}
        <div id="qrcode" style="width:100px; height:100px; margin-top:15px;"></div>

    @else
        {{ $this->form }}
    @endif

    @php
        // Ambil nilai qrcode dari record
        $qrValue = $this->record->barcode ?? '';
    @endphp

</x-filament-panels::page>
<script src="{{ asset('js/qrcode.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var qrValue = @json($qrValue);
            
            if (qrValue && document.getElementById("qrcode")) {
                var qrcode = new QRCode(document.getElementById("qrcode"), {
                    width: 100,
                    height: 100
                });
                
                qrcode.makeCode(qrValue);
            }
        });
    </script>