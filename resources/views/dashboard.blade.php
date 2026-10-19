@extends('layout')

@section('title', 'Halaman Utama - Nusa Iklim')

@section('content')
@php
    /**
     * DUMMY / SIMULATED DATA FOR NUSA IKLIM DASHBOARD
     * Ready for backend API / Database integration.
     * If a Controller passes $summary, it will override this default structure.
     */
    $summary = $summary ?? [
        'status_badge' => 'WASPADA TINGGI',
        'metrics' => [
            'suhu' => [
                'title'       => 'SUHU MAKSIMUM',
                'value'       => '35,7',
                'unit'        => '°C',
                'location'    => 'Bekasi · pukul 15.00',
                'change'      => '+2,4°',
                'type'        => 'temperature',
                'icon'        => 'bi-thermometer-sun',
                'icon_bg'     => '#fff1ec',
                'icon_color'  => '#ea580c',
                'badge_color' => '#ea580c'
            ],
            'banjir' => [
                'title'       => 'PROBABILITAS BANJIR',
                'value'       => '82',
                'unit'        => '%',
                'location'    => 'Jakarta Utara · 6 jam',
                'change'      => '+12%',
                'type'        => 'flood',
                'icon'        => 'bi-water',
                'icon_bg'     => '#e0f2fe',
                'icon_color'  => '#0284c7',
                'badge_color' => '#0284c7'
            ],
            'curah_hujan' => [
                'title'       => 'CURAH HUJAN PUNCAK',
                'value'       => '64',
                'unit'        => 'mm/jam',
                'location'    => 'Intensitas sangat lebat',
                'change'      => '+18 mm',
                'type'        => 'rain',
                'icon'        => 'bi-cloud-drizzle',
                'icon_bg'     => '#ecfeff',
                'icon_color'  => '#0891b2',
                'badge_color' => '#0891b2'
            ]
        ],
        'temp_chart' => [
            'peak_badge' => 'PUNCAK 15.00',
            'peak_temp'  => '35,7°C'
        ],
        'rain_chart' => [
            'probability' => 'Probabilitas 78%',
            'peak_value'  => '64 mm'
        ],
        'vulnerable_regions' => [
            [
                'score'       => 92,
                'name'        => 'Penjaringan',
                'region'      => 'Jakarta Utara',
                'hazard'      => 'Banjir',
                'bar_color'   => '#2563eb',
                'score_bg'    => '#e0f2fe',
                'score_color' => '#0284c7',
                'tag_color'   => '#0284c7',
                'severity'    => 'tinggi'
            ],
            [
                'score'       => 86,
                'name'        => 'Cilincing',
                'region'      => 'Jakarta Utara',
                'hazard'      => 'Banjir',
                'bar_color'   => '#2563eb',
                'score_bg'    => '#e0f2fe',
                'score_color' => '#0284c7',
                'tag_color'   => '#0284c7',
                'severity'    => 'tinggi'
            ],
            [
                'score'       => 81,
                'name'        => 'Bekasi Timur',
                'region'      => 'Kota Bekasi',
                'hazard'      => 'Panas',
                'bar_color'   => '#ea580c',
                'score_bg'    => '#ffedd5',
                'score_color' => '#ea580c',
                'tag_color'   => '#ea580c',
                'severity'    => 'tinggi'
            ]
        ]
    ];
@endphp

<div class="dashboard-wrapper">
    <!-- ================================================================
         SECTION 1: HEADER & 3 METRIC CARDS
         ================================================================ -->
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-2">
        <div>
            <h2 class="fw-bold mb-1 text-dark tracking-tight" style="font-size: 1.85rem;">Risiko Regional</h2>
            <p class="text-secondary mb-0" style="font-size: 0.92rem;">
                Pantauan prediktif cuaca ekstrem dan dampaknya untuk 24 jam ke depan.
            </p>
        </div>
        <div>
            <span class="badge rounded-pill px-3 py-2 fw-semibold d-inline-flex align-items-center gap-1" 
                  style="background-color: #fefce8; color: #ca8a04; border: 1px solid #fef08a; font-size: 0.75rem; letter-spacing: 0.5px;">
                <i class="bi bi-shield-exclamation text-warning fs-6"></i> {{ $summary['status_badge'] }}
            </span>
        </div>
    </div>

    <!-- 3 Metrics Cards -->
    <div class="row g-3 mb-4">
        @foreach ($summary['metrics'] as $key => $metric)
            <div class="col-12 col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 p-xl-4 bg-white metric-card">
                    <div class="d-flex align-items-start gap-3">
                        <!-- Icon Box -->
                        <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width: 48px; height: 48px; background-color: {{ $metric['icon_bg'] }}; color: {{ $metric['icon_color'] }};">
                            <i class="bi {{ $metric['icon'] }} fs-4"></i>
                        </div>

                        <!-- Card Content -->
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.4px; color: #64748b;">
                                    {{ $metric['title'] }}
                                </span>
                                <span class="fw-bold" style="color: {{ $metric['badge_color'] }}; font-size: 0.85rem;">
                                    {{ $metric['change'] }}
                                </span>
                            </div>

                            <div class="fw-bold text-dark mt-1" style="font-size: 2.1rem; line-height: 1.1;">
                                {{ $metric['value'] }}
                                <span class="fw-normal text-secondary" style="font-size: 1rem;">
                                    {{ $metric['unit'] }}
                                </span>
                            </div>

                            <div class="text-secondary mt-1" style="font-size: 0.78rem;">
                                {{ $metric['location'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- ================================================================
         SECTION 2: CHARTS ROW (2 COLUMNS)
         ================================================================ -->
    <div class="row g-3 mb-4">
        <!-- Col 1: Prakiraan Suhu (Line Chart Style) -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 bg-white chart-card">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div>
                        <h5 class="fw-bold text-dark mb-1" style="font-size: 1.05rem;">Prakiraan suhu</h5>
                        <p class="text-secondary small mb-0">Suhu permukaan per jam · °C</p>
                    </div>
                    <div>
                        <span class="badge rounded-pill fw-bold" 
                              style="background-color: #ffedd5; color: #ea580c; font-size: 0.7rem; padding: 6px 12px; letter-spacing: 0.3px;">
                            {{ $summary['temp_chart']['peak_badge'] }}
                        </span>
                    </div>
                </div>

                <!-- SVG Line Chart Visual -->
                <div class="chart-container position-relative mt-2">
                    <svg viewBox="0 0 500 230" class="w-100" style="overflow: visible;" preserveAspectRatio="none">
                        <defs>
                            <!-- Gradient Area Under Curve -->
                            <linearGradient id="tempGradient" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#ea580c" stop-opacity="0.22" />
                                <stop offset="100%" stop-color="#ea580c" stop-opacity="0.0" />
                            </linearGradient>
                        </defs>

                        <!-- Horizontal Grid Lines & Y-Axis Labels -->
                        <!-- 38° -->
                        <line x1="45" y1="35" x2="490" y2="35" stroke="#f1f5f9" stroke-width="1.5" />
                        <text x="35" y="39" text-anchor="end" font-size="11" fill="#94a3b8" font-family="sans-serif">38°</text>

                        <!-- 34° -->
                        <line x1="45" y1="85" x2="490" y2="85" stroke="#f1f5f9" stroke-width="1.5" />
                        <text x="35" y="89" text-anchor="end" font-size="11" fill="#94a3b8" font-family="sans-serif">34°</text>

                        <!-- 30° -->
                        <line x1="45" y1="135" x2="490" y2="135" stroke="#f1f5f9" stroke-width="1.5" />
                        <text x="35" y="139" text-anchor="end" font-size="11" fill="#94a3b8" font-family="sans-serif">30°</text>

                        <!-- 26° -->
                        <line x1="45" y1="185" x2="490" y2="185" stroke="#f1f5f9" stroke-width="1.5" />
                        <text x="35" y="189" text-anchor="end" font-size="11" fill="#94a3b8" font-family="sans-serif">26°</text>

                        <!-- Gradient Fill Area -->
                        <path d="M 50 178 
                                 C 100 168, 130 162, 175 162 
                                 C 215 162, 255 130, 300 115 
                                 C 335 102, 355 58, 385 58 
                                 C 415 58, 440 120, 485 142 
                                 L 485 185 L 50 185 Z" 
                              fill="url(#tempGradient)" />

                        <!-- Temperature Line Curve -->
                        <path d="M 50 178 
                                 C 100 168, 130 162, 175 162 
                                 C 215 162, 255 130, 300 115 
                                 C 335 102, 355 58, 385 58 
                                 C 415 58, 440 120, 485 142" 
                              fill="none" 
                              stroke="#ea580c" 
                              stroke-width="3.2" 
                              stroke-linecap="round" />

                        <!-- Peak Dot Marker -->
                        <circle cx="385" cy="85" r="3.5" fill="#ea580c" />

                        <!-- Peak Tooltip Badge (35,7°C) -->
                        <g transform="translate(385, 45)">
                            <rect x="-24" y="-18" width="48" height="22" rx="6" fill="#ea580c" />
                            <text x="0" y="-3.5" text-anchor="middle" font-size="11" font-weight="bold" fill="#ffffff" font-family="sans-serif">
                                {{ $summary['temp_chart']['peak_temp'] }}
                            </text>
                        </g>

                        <!-- X-Axis Labels -->
                        <text x="65" y="214" text-anchor="middle" font-size="11" fill="#94a3b8" font-family="sans-serif">09.00</text>
                        <text x="175" y="214" text-anchor="middle" font-size="11" fill="#94a3b8" font-family="sans-serif">12.00</text>
                        <text x="285" y="214" text-anchor="middle" font-size="11" fill="#94a3b8" font-family="sans-serif">15.00</text>
                        <text x="395" y="214" text-anchor="middle" font-size="11" fill="#94a3b8" font-family="sans-serif">18.00</text>
                        <text x="480" y="214" text-anchor="middle" font-size="11" fill="#94a3b8" font-family="sans-serif">21.00</text>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Col 2: Prakiraan Curah Hujan (Bar Chart Style) -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 bg-white chart-card">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div>
                        <h5 class="fw-bold text-dark mb-1" style="font-size: 1.05rem;">Prakiraan curah hujan</h5>
                        <p class="text-secondary small mb-0">Akumulasi per jam · mm</p>
                    </div>
                    <div>
                        <span class="small fw-semibold d-inline-flex align-items-center gap-1" style="color: #64748b; font-size: 0.78rem;">
                            <span class="rounded-circle" style="width: 8px; height: 8px; background-color: #2563eb; display: inline-block;"></span> 
                            {{ $summary['rain_chart']['probability'] }}
                        </span>
                    </div>
                </div>

                <!-- SVG Bar Chart Visual -->
                <div class="chart-container position-relative mt-2">
                    <svg viewBox="0 0 500 230" class="w-100" style="overflow: visible;" preserveAspectRatio="none">
                        <!-- Horizontal Grid Lines & Y-Axis Labels -->
                        <!-- 80 -->
                        <line x1="45" y1="35" x2="490" y2="35" stroke="#f1f5f9" stroke-width="1.5" />
                        <text x="35" y="39" text-anchor="end" font-size="11" fill="#94a3b8" font-family="sans-serif">80</text>

                        <!-- 60 -->
                        <line x1="45" y1="85" x2="490" y2="85" stroke="#f1f5f9" stroke-width="1.5" />
                        <text x="35" y="89" text-anchor="end" font-size="11" fill="#94a3b8" font-family="sans-serif">60</text>

                        <!-- 40 -->
                        <line x1="45" y1="135" x2="490" y2="135" stroke="#f1f5f9" stroke-width="1.5" />
                        <text x="35" y="139" text-anchor="end" font-size="11" fill="#94a3b8" font-family="sans-serif">40</text>

                        <!-- 20 -->
                        <line x1="45" y1="185" x2="490" y2="185" stroke="#f1f5f9" stroke-width="1.5" />
                        <text x="35" y="189" text-anchor="end" font-size="11" fill="#94a3b8" font-family="sans-serif">20</text>

                        <!-- Bars -->
                        <!-- Bar 1 (09.00) -->
                        <rect x="52" y="152" width="46" height="33" rx="4" fill="#7ba8e8" />

                        <!-- Bar 2 (11.00) -->
                        <rect x="110" y="140" width="46" height="45" rx="4" fill="#7ba8e8" />

                        <!-- Bar 3 (12.30) -->
                        <rect x="168" y="105" width="46" height="80" rx="4" fill="#7ba8e8" />

                        <!-- Bar 4 - PEAK BAR (14.00-15.00) -->
                        <rect x="226" y="55" width="46" height="130" rx="4" fill="#0f4c81" />

                        <!-- Peak Bar Tooltip Badge (64 mm) -->
                        <g transform="translate(249, 44)">
                            <rect x="-24" y="-18" width="48" height="20" rx="5" fill="#0f4c81" />
                            <text x="0" y="-4" text-anchor="middle" font-size="11" font-weight="bold" fill="#ffffff" font-family="sans-serif">
                                {{ $summary['rain_chart']['peak_value'] }}
                            </text>
                        </g>

                        <!-- Bar 5 (15.30) -->
                        <rect x="284" y="85" width="46" height="100" rx="4" fill="#7ba8e8" />

                        <!-- Bar 6 (17.00) -->
                        <rect x="342" y="125" width="46" height="60" rx="4" fill="#7ba8e8" />

                        <!-- Bar 7 (18.30) -->
                        <rect x="400" y="148" width="46" height="37" rx="4" fill="#7ba8e8" />

                        <!-- Bar 8 (20.30) -->
                        <rect x="456" y="160" width="36" height="25" rx="4" fill="#7ba8e8" />

                        <!-- X-Axis Labels -->
                        <text x="75" y="214" text-anchor="middle" font-size="11" fill="#94a3b8" font-family="sans-serif">09.00</text>
                        <text x="180" y="214" text-anchor="middle" font-size="11" fill="#94a3b8" font-family="sans-serif">12.00</text>
                        <text x="285" y="214" text-anchor="middle" font-size="11" fill="#94a3b8" font-family="sans-serif">15.00</text>
                        <text x="390" y="214" text-anchor="middle" font-size="11" fill="#94a3b8" font-family="sans-serif">18.00</text>
                        <text x="475" y="214" text-anchor="middle" font-size="11" fill="#94a3b8" font-family="sans-serif">21.00</text>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================================================
         SECTION 3: "LAPORAN WARGA" BANNER
         ================================================================ -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden" 
         style="background: linear-gradient(90deg, #6091c8 0%, #4f80b8 100%);">
        <div class="card-body p-3 p-md-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div class="d-flex align-items-center gap-2">
                <span class="fw-bold text-white text-uppercase" style="letter-spacing: 0.8px; font-size: 0.95rem;">
                    LAPORAN WARGA
                </span>
            </div>
            <div>
                <a href="{{ route('laporan') }}" 
                   class="btn btn-light rounded-pill px-4 py-2 fw-semibold shadow-sm d-inline-flex align-items-center gap-2"
                   style="color: #2563eb !important; font-size: 0.88rem; transition: transform 0.15s ease;">
                    Lihat Laporan <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- ================================================================
         SECTION 4: "WILAYAH PALING RENTAN" LIST
         ================================================================ -->
    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h5 class="fw-bold text-dark mb-1" style="font-size: 1.1rem;">Wilayah paling rentan</h5>
                <p class="text-secondary small mb-0">Indeks paparan gabungan · 0–100</p>
            </div>
            <div>
                <a href="{{ route('peta') }}" 
                   class="text-primary text-decoration-none fw-semibold d-inline-flex align-items-center gap-1 small">
                    Lihat peta <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Vulnerable Region Items List -->
        <div class="vulnerable-list d-flex flex-direction-column flex-column gap-3">
            @foreach ($summary['vulnerable_regions'] as $region)
                <div class="vulnerable-item py-2">
                    <div class="row align-items-center g-3">
                        <!-- Score Circle -->
                        <div class="col-auto">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                 style="width: 44px; height: 44px; background-color: {{ $region['score_bg'] }}; color: {{ $region['score_color'] }}; font-size: 0.95rem;">
                                {{ $region['score'] }}
                            </div>
                        </div>

                        <!-- Region Name & Regency -->
                        <div class="col-4 col-sm-3 col-md-2">
                            <div class="fw-bold text-dark" style="font-size: 0.92rem;">
                                {{ $region['name'] }}
                            </div>
                            <div class="text-secondary" style="font-size: 0.78rem;">
                                {{ $region['region'] }}
                            </div>
                        </div>

                        <!-- Hazard Tag -->
                        <div class="col-3 col-sm-2 col-md-1">
                            <span class="fw-bold" style="color: {{ $region['tag_color'] }}; font-size: 0.82rem;">
                                {{ $region['hazard'] }}
                            </span>
                        </div>

                        <!-- Range / Progress Bar -->
                        <div class="col col-md-6 col-lg-7">
                            <div class="progress" style="height: 6px; background-color: #f1f5f9; border-radius: 999px;">
                                <div class="progress-bar rounded-pill" 
                                     role="progressbar" 
                                     style="width: {{ $region['score'] }}%; background-color: {{ $region['bar_color'] }};" 
                                     aria-valuenow="{{ $region['score'] }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                        </div>

                        <!-- Severity Status -->
                        <div class="col-auto text-end">
                            <span class="text-secondary" style="font-size: 0.8rem;">
                                {{ $region['severity'] }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    /* Clean micro-animations and styling */
    .metric-card, .chart-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .metric-card:hover, .chart-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06) !important;
    }
    .vulnerable-item {
        border-bottom: 1px solid #f8fafc;
    }
    .vulnerable-item:last-child {
        border-bottom: none;
    }
</style>
@endsection