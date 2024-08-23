<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\FA;
use App\Models\NFA;
use App\Models\Special;
use App\Models\StockTotal;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $data = Delivery::all();
        return view('pages.deliveries.index', compact('data'));
    }

    public function create()
    {
        $mutu =  FA::all();
        return view('pages.deliveries.create', compact('mutu'));
    }

    public function store(Request $request)
    {
        // Mengonversi format Rupiah ke integer
        $hargaPPn = $request->input('harga_ppn') ? str_replace(['Rp', '.', ' '], '', $request->input('harga_ppn')) : 0;
        $jumlahBayar = $request->input('jumlah_bayar') ? str_replace(['Rp', '.', ' '], '', $request->input('jumlah_bayar')) : 0;

        // if ($request->fa_nfa == 'FA') {
        //     $mutu = FA::where('mutu', $request->input('mutu_beton'))->first();

        //     $pasir = $mutu->pasir * $request->input('volume');
        //     $dust = $mutu->dust * $request->input('volume');
        //     $split = $mutu->split * $request->input('volume');
        //     $semen = $mutu->semen * $request->input('volume');
        //     $fly_ash = $mutu->fly_ash * $request->input('volume');

        //     if ($request->jarak_lokasi == 26 - 30 || $request->jarak_lokasi == 31 - 35) {
        //         $additive = $mutu->additive * $request->input('volume') + 1.1;
        //     } elseif ($request->jarak_lokasi == 36 - 40) {
        //         $additive = $mutu->additive * $request->input('volume') + 1.2;
        //     } elseif ($request->jarak_lokasi == 41 - 50) {
        //         $additive = $mutu->additive * $request->input('volume') + 1.3;
        //     } else {
        //         $additive = $mutu->additive * $request->input('volume');
        //     }

        //     $stock = Stock::orderBy('created_at', 'desc')->first();
        //     $stock->pasir_cilegon -= $pasir;
        //     $stock->abu_batu -= $dust;
        //     $stock->split_10_20 -= $split;
        //     $stock->fly_ash -= $fly_ash;
        //     $stock->semen_hc -= $semen;
        //     $stock->additive_sobute -= $additive;

        //     $stock->save();
        // } elseif ($request->fa_nfa == 'NFA') {
        //     $mutu = NFA::where('mutu', $request->input('mutu_beton'))->first();

        //     $pasir = $mutu->pasir * $request->input('volume');
        //     $dust = $mutu->dust * $request->input('volume');
        //     $split = $mutu->split * $request->input('volume');
        //     $semen = $mutu->semen * $request->input('volume');
        //     $fly_ash = $mutu->fly_ash * $request->input('volume');

        //     if ($request->jarak_lokasi == 26 - 30 || $request->jarak_lokasi == 31 - 35) {
        //         $additive = $mutu->additive * $request->input('volume') + 1.1;
        //     } elseif ($request->jarak_lokasi == 36 - 40) {
        //         $additive = $mutu->additive * $request->input('volume') + 1.2;
        //     } elseif ($request->jarak_lokasi == 41 - 50) {
        //         $additive = $mutu->additive * $request->input('volume') + 1.3;
        //     } else {
        //         $additive = $mutu->additive * $request->input('volume');
        //     }

        //     $stock = Stock::orderBy('created_at', 'desc')->first();
        //     $stock->pasir_cilegon -= $pasir;
        //     $stock->abu_batu -= $dust;
        //     $stock->split_10_20 -= $split;
        //     $stock->semen_hc -= $semen;
        //     $stock->additive_sobute -= $additive;

        //     $stock->save();
        // }

        Delivery::create([
            'kode_sales' => $request->kode_sales,
            'nama_sales' => $request->nama_sales,
            'nama_pelanggan' => $request->nama_pelanggan,
            'kontak_pelanggan' => $request->kontak_pelanggan,
            'pelanggan_baru_lama' => $request->pelanggan_baru_lama,
            'alamat_kirim' => $request->alamat_kirim,
            'tanggal_kirim' => $request->tanggal_kirim,
            'jam_kirim' => $request->jam_kirim,
            'mutu_beton' => $request->mutu_beton,
            'armada' => $request->armada,
            'fa_nfa' => $request->fa_nfa,
            'slump' => $request->slump,
            'harga_ppn' => $hargaPPn,
            'volume' => $request->volume,
            'metode_bongkar' => $request->metode_bongkar,
            'media_cor' => $request->media_cor,
            'cara_bayar' => $request->cara_bayar,
            'jumlah_bayar' => $jumlahBayar,
            'jarak_lokasi' => $request->jarak_lokasi,
            'titipan' => $request->titipan,
        ]);

        return redirect()->route('deliveries.index')->with('success', 'Delivery created successfully.');
    }

    public function create_actual($id)
    {
        $delivery = Delivery::find($id);
        return view('pages.deliveries.actual', compact('delivery'));
    }

    public function store_actual(Request $request, $id)
    {
        $delivery = Delivery::find($id);

        if (!is_null($delivery->aktual) && $delivery->aktual !== 0) {
            if ($delivery->fa_nfa == 'FA') {
                $mutu = FA::where('mutu', $delivery->mutu_beton)->first();

                $pasir = $mutu->pasir * $delivery->aktual;
                $dust = $mutu->dust * $delivery->aktual;
                $split = $mutu->split * $delivery->aktual;
                $semen = $mutu->semen * $delivery->aktual;
                $fly_ash = $mutu->fly_ash * $delivery->aktual;
                $air = $mutu->air * $delivery->aktual;

                if (!empty($mutu->additive_d)) {
                    if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                        $additive_d = $mutu->additive_d * $delivery->aktual + 1.1;
                    } elseif ($delivery->jarak_lokasi == 36 - 40) {
                        $additive_d = $mutu->additive_d * $delivery->aktual + 1.2;
                    } elseif ($delivery->jarak_lokasi == 41 - 50) {
                        $additive_d = $mutu->additive_d * $delivery->aktual + 1.3;
                    } else {
                        $additive_d = $mutu->additive_d * $delivery->aktual;
                    }
                } else {
                    $additive_d = 0;
                }

                if (!empty($mutu->additive_f)) {
                    if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                        $additive_f = $mutu->additive_f * $delivery->aktual + 1.1;
                    } elseif ($delivery->jarak_lokasi == 36 - 40) {
                        $additive_f = $mutu->additive_f * $delivery->aktual + 1.2;
                    } elseif ($delivery->jarak_lokasi == 41 - 50) {
                        $additive_f = $mutu->additive_f * $delivery->aktual + 1.3;
                    } else {
                        $additive_f = $mutu->additive_f * $delivery->aktual;
                    }
                } else {
                    $additive_f = 0;
                }

                if (!empty($mutu->additive_1g)) {
                    if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                        $additive_1g = $mutu->additive_1g * $delivery->aktual + 1.1;
                    } elseif ($delivery->jarak_lokasi == 36 - 40) {
                        $additive_1g = $mutu->additive_1g * $delivery->aktual + 1.2;
                    } elseif ($delivery->jarak_lokasi == 41 - 50) {
                        $additive_1g = $mutu->additive_1g * $delivery->aktual + 1.3;
                    } else {
                        $additive_1g = $mutu->additive_1g * $delivery->aktual;
                    }
                } else {
                    $additive_1g = 0;
                }

                if (!empty($mutu->additive_2g)) {
                    if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                        $additive_2g = $mutu->additive_2g * $delivery->aktual + 1.1;
                    } elseif ($delivery->jarak_lokasi == 36 - 40) {
                        $additive_2g = $mutu->additive_2g * $delivery->aktual + 1.2;
                    } elseif ($delivery->jarak_lokasi == 41 - 50) {
                        $additive_2g = $mutu->additive_2g * $delivery->aktual + 1.3;
                    } else {
                        $additive_2g = $mutu->additive_2g * $delivery->aktual;
                    }
                } else {
                    $additive_2g = 0;
                }
            } elseif ($delivery->fa_nfa == 'NFA') {
                $mutu = NFA::where('mutu', $delivery->mutu_beton)->first();

                $pasir = $mutu->pasir * $delivery->aktual;
                $dust = $mutu->dust * $delivery->aktual;
                $split = $mutu->split * $delivery->aktual;
                $semen = $mutu->semen * $delivery->aktual;
                $air = $mutu->air * $delivery->aktual;

                if (!empty($mutu->additive_d)) {
                    if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                        $additive_d = $mutu->additive_d * $delivery->aktual + 1.1;
                    } elseif ($delivery->jarak_lokasi == 36 - 40) {
                        $additive_d = $mutu->additive_d * $delivery->aktual + 1.2;
                    } elseif ($delivery->jarak_lokasi == 41 - 50) {
                        $additive_d = $mutu->additive_d * $delivery->aktual + 1.3;
                    } else {
                        $additive_d = $mutu->additive_d * $delivery->aktual;
                    }
                } else {
                    $additive_d = 0;
                }

                if (!empty($mutu->additive_f)) {
                    if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                        $additive_f = $mutu->additive_f * $delivery->aktual + 1.1;
                    } elseif ($delivery->jarak_lokasi == 36 - 40) {
                        $additive_f = $mutu->additive_f * $delivery->aktual + 1.2;
                    } elseif ($delivery->jarak_lokasi == 41 - 50) {
                        $additive_f = $mutu->additive_f * $delivery->aktual + 1.3;
                    } else {
                        $additive_f = $mutu->additive_f * $delivery->aktual;
                    }
                } else {
                    $additive_f = 0;
                }

                if (!empty($mutu->additive_1g)) {
                    if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                        $additive_1g = $mutu->additive_1g * $delivery->aktual + 1.1;
                    } elseif ($delivery->jarak_lokasi == 36 - 40) {
                        $additive_1g = $mutu->additive_1g * $delivery->aktual + 1.2;
                    } elseif ($delivery->jarak_lokasi == 41 - 50) {
                        $additive_1g = $mutu->additive_1g * $delivery->aktual + 1.3;
                    } else {
                        $additive_1g = $mutu->additive_1g * $delivery->aktual;
                    }
                } else {
                    $additive_1g = 0;
                }

                if (!empty($mutu->additive_2g)) {
                    if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                        $additive_2g = $mutu->additive_2g * $delivery->aktual + 1.1;
                    } elseif ($delivery->jarak_lokasi == 36 - 40) {
                        $additive_2g = $mutu->additive_2g * $delivery->aktual + 1.2;
                    } elseif ($delivery->jarak_lokasi == 41 - 50) {
                        $additive_2g = $mutu->additive_2g * $delivery->aktual + 1.3;
                    } else {
                        $additive_2g = $mutu->additive_2g * $delivery->aktual;
                    }
                } else {
                    $additive_2g = 0;
                }
            } elseif ($delivery->fa_nfa == 'Special') {
                $mutu = Special::where('mutu', $delivery->mutu_beton)->first();

                $pasir = $mutu->pasir * $delivery->aktual;
                $dust = $mutu->dust * $delivery->aktual;
                $split = $mutu->split * $delivery->aktual;
                $semen = $mutu->semen * $delivery->aktual;
                $air = $mutu->air * $delivery->aktual;
                if (!empty($mutu->fly_ash)) {
                    $fly_ash = $mutu->fly_ash * $delivery->aktual;
                } else {
                    $fly_ash = 0;
                }
                if (!empty($mutu->screening)) {
                    $screening = $mutu->screening * $delivery->aktual;
                } else {
                    $screening = 0;
                }

                if (!empty($mutu->additive_d)) {
                    if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                        $additive_d = $mutu->additive_d * $delivery->aktual + 1.1;
                    } elseif ($delivery->jarak_lokasi == 36 - 40) {
                        $additive_d = $mutu->additive_d * $delivery->aktual + 1.2;
                    } elseif ($delivery->jarak_lokasi == 41 - 50) {
                        $additive_d = $mutu->additive_d * $delivery->aktual + 1.3;
                    } else {
                        $additive_d = $mutu->additive_d * $delivery->aktual;
                    }
                } else {
                    $additive_d = 0;
                }

                if (!empty($mutu->additive_f)) {
                    if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                        $additive_f = $mutu->additive_f * $delivery->aktual + 1.1;
                    } elseif ($delivery->jarak_lokasi == 36 - 40) {
                        $additive_f = $mutu->additive_f * $delivery->aktual + 1.2;
                    } elseif ($delivery->jarak_lokasi == 41 - 50) {
                        $additive_f = $mutu->additive_f * $delivery->aktual + 1.3;
                    } else {
                        $additive_f = $mutu->additive_f * $delivery->aktual;
                    }
                } else {
                    $additive_f = 0;
                }

                if (!empty($mutu->additive_1g)) {
                    if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                        $additive_1g = $mutu->additive_1g * $delivery->aktual + 1.1;
                    } elseif ($delivery->jarak_lokasi == 36 - 40) {
                        $additive_1g = $mutu->additive_1g * $delivery->aktual + 1.2;
                    } elseif ($delivery->jarak_lokasi == 41 - 50) {
                        $additive_1g = $mutu->additive_1g * $delivery->aktual + 1.3;
                    } else {
                        $additive_1g = $mutu->additive_1g * $delivery->aktual;
                    }
                } else {
                    $additive_1g = 0;
                }

                if (!empty($mutu->additive_2g)) {
                    if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                        $additive_2g = $mutu->additive_2g * $delivery->aktual + 1.1;
                    } elseif ($delivery->jarak_lokasi == 36 - 40) {
                        $additive_2g = $mutu->additive_2g * $delivery->aktual + 1.2;
                    } elseif ($delivery->jarak_lokasi == 41 - 50) {
                        $additive_2g = $mutu->additive_2g * $delivery->aktual + 1.3;
                    } else {
                        $additive_2g = $mutu->additive_2g * $delivery->aktual;
                    }
                } else {
                    $additive_2g = 0;
                }
            }

            $stock = StockTotal::find(1);
            $stock->pasir_cilegon += $pasir;
            $stock->abu_batu += $dust;
            $stock->split_10_20 += $split;
            $stock->split_screening += $screening;
            $stock->fly_ash += $fly_ash;
            $stock->semen_hc += $semen;
            $stock->additive_d += $additive_d;
            $stock->additive_f += $additive_f;
            $stock->additive_1g += $additive_1g;
            $stock->additive_2g += $additive_2g;
            $stock->air += $air;

            $stock->save();
        }

        if ($delivery->fa_nfa == 'FA') {
            $mutu = FA::where('mutu', $delivery->mutu_beton)->first();

            $pasir = $mutu->pasir * $request->input('qty');
            $dust = $mutu->dust * $request->input('qty');
            $split = $mutu->split * $request->input('qty');
            $semen = $mutu->semen * $request->input('qty');
            $fly_ash = $mutu->fly_ash * $request->input('qty');
            $air = $mutu->air * $request->input('qty');

            if (!empty($mutu->additive_d)) {
                if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                    $additive_d = $mutu->additive_d * $request->input('qty') + 1.1;
                } elseif ($delivery->jarak_lokasi == 36 - 40) {
                    $additive_d = $mutu->additive_d * $request->input('qty') + 1.2;
                } elseif ($delivery->jarak_lokasi == 41 - 50) {
                    $additive_d = $mutu->additive_d * $request->input('qty') + 1.3;
                } else {
                    $additive_d = $mutu->additive_d * $request->input('qty');
                }
            } else {
                $additive_d = 0;
            }

            if (!empty($mutu->additive_f)) {
                if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                    $additive_f = $mutu->additive_f * $request->input('qty') + 1.1;
                } elseif ($delivery->jarak_lokasi == 36 - 40) {
                    $additive_f = $mutu->additive_f * $request->input('qty') + 1.2;
                } elseif ($delivery->jarak_lokasi == 41 - 50) {
                    $additive_f = $mutu->additive_f * $request->input('qty') + 1.3;
                } else {
                    $additive_f = $mutu->additive_f * $request->input('qty');
                }
            } else {
                $additive_f = 0;
            }

            if (!empty($mutu->additive_1g)) {
                if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                    $additive_1g = $mutu->additive_1g * $request->input('qty') + 1.1;
                } elseif ($delivery->jarak_lokasi == 36 - 40) {
                    $additive_1g = $mutu->additive_1g * $request->input('qty') + 1.2;
                } elseif ($delivery->jarak_lokasi == 41 - 50) {
                    $additive_1g = $mutu->additive_1g * $request->input('qty') + 1.3;
                } else {
                    $additive_1g = $mutu->additive_1g * $request->input('qty');
                }
            } else {
                $additive_1g = 0;
            }

            if (!empty($mutu->additive_2g)) {
                if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                    $additive_2g = $mutu->additive_2g * $request->input('qty') + 1.1;
                } elseif ($delivery->jarak_lokasi == 36 - 40) {
                    $additive_2g = $mutu->additive_2g * $request->input('qty') + 1.2;
                } elseif ($delivery->jarak_lokasi == 41 - 50) {
                    $additive_2g = $mutu->additive_2g * $request->input('qty') + 1.3;
                } else {
                    $additive_2g = $mutu->additive_2g * $request->input('qty');
                }
            } else {
                $additive_2g = 0;
            }
        } elseif ($delivery->fa_nfa == 'NFA') {
            $mutu = NFA::where('mutu', $delivery->mutu_beton)->first();

            $pasir = $mutu->pasir * $request->input('qty');
            $dust = $mutu->dust * $request->input('qty');
            $split = $mutu->split * $request->input('qty');
            $semen = $mutu->semen * $request->input('qty');
            $air = $mutu->air * $request->input('qty');

            if (!empty($mutu->additive_d)) {
                if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                    $additive_d = $mutu->additive_d * $request->input('qty') + 1.1;
                } elseif ($delivery->jarak_lokasi == 36 - 40) {
                    $additive_d = $mutu->additive_d * $request->input('qty') + 1.2;
                } elseif ($delivery->jarak_lokasi == 41 - 50) {
                    $additive_d = $mutu->additive_d * $request->input('qty') + 1.3;
                } else {
                    $additive_d = $mutu->additive_d * $request->input('qty');
                }
            } else {
                $additive_d = 0;
            }

            if (!empty($mutu->additive_f)) {
                if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                    $additive_f = $mutu->additive_f * $request->input('qty') + 1.1;
                } elseif ($delivery->jarak_lokasi == 36 - 40) {
                    $additive_f = $mutu->additive_f * $request->input('qty') + 1.2;
                } elseif ($delivery->jarak_lokasi == 41 - 50) {
                    $additive_f = $mutu->additive_f * $request->input('qty') + 1.3;
                } else {
                    $additive_f = $mutu->additive_f * $request->input('qty');
                }
            } else {
                $additive_f = 0;
            }

            if (!empty($mutu->additive_1g)) {
                if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                    $additive_1g = $mutu->additive_1g * $request->input('qty') + 1.1;
                } elseif ($delivery->jarak_lokasi == 36 - 40) {
                    $additive_1g = $mutu->additive_1g * $request->input('qty') + 1.2;
                } elseif ($delivery->jarak_lokasi == 41 - 50) {
                    $additive_1g = $mutu->additive_1g * $request->input('qty') + 1.3;
                } else {
                    $additive_1g = $mutu->additive_1g * $request->input('qty');
                }
            } else {
                $additive_1g = 0;
            }

            if (!empty($mutu->additive_2g)) {
                if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                    $additive_2g = $mutu->additive_2g * $request->input('qty') + 1.1;
                } elseif ($delivery->jarak_lokasi == 36 - 40) {
                    $additive_2g = $mutu->additive_2g * $request->input('qty') + 1.2;
                } elseif ($delivery->jarak_lokasi == 41 - 50) {
                    $additive_2g = $mutu->additive_2g * $request->input('qty') + 1.3;
                } else {
                    $additive_2g = $mutu->additive_2g * $request->input('qty');
                }
            } else {
                $additive_2g = 0;
            }
        } elseif ($delivery->fa_nfa == 'Special') {
            $mutu = Special::where('mutu', $delivery->mutu_beton)->first();

            $pasir = $mutu->pasir * $request->input('qty');
            $dust = $mutu->dust * $request->input('qty');
            $split = $mutu->split * $request->input('qty');
            $semen = $mutu->semen * $request->input('qty');
            $air = $mutu->air * $request->input('qty');
            if (!empty($mutu->fly_ash)) {
                $fly_ash = $mutu->fly_ash * $request->input('qty');
            } else {
                $fly_ash = 0;
            }
            if (!empty($mutu->screening)) {
                $screening = $mutu->screening * $request->input('qty');
            } else {
                $screening = 0;
            }

            if (!empty($mutu->additive_d)) {
                if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                    $additive_d = $mutu->additive_d * $request->input('qty') + 1.1;
                } elseif ($delivery->jarak_lokasi == 36 - 40) {
                    $additive_d = $mutu->additive_d * $request->input('qty') + 1.2;
                } elseif ($delivery->jarak_lokasi == 41 - 50) {
                    $additive_d = $mutu->additive_d * $request->input('qty') + 1.3;
                } else {
                    $additive_d = $mutu->additive_d * $request->input('qty');
                }
            } else {
                $additive_d = 0;
            }

            if (!empty($mutu->additive_f)) {
                if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                    $additive_f = $mutu->additive_f * $request->input('qty') + 1.1;
                } elseif ($delivery->jarak_lokasi == 36 - 40) {
                    $additive_f = $mutu->additive_f * $request->input('qty') + 1.2;
                } elseif ($delivery->jarak_lokasi == 41 - 50) {
                    $additive_f = $mutu->additive_f * $request->input('qty') + 1.3;
                } else {
                    $additive_f = $mutu->additive_f * $request->input('qty');
                }
            } else {
                $additive_f = 0;
            }

            if (!empty($mutu->additive_1g)) {
                if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                    $additive_1g = $mutu->additive_1g * $request->input('qty') + 1.1;
                } elseif ($delivery->jarak_lokasi == 36 - 40) {
                    $additive_1g = $mutu->additive_1g * $request->input('qty') + 1.2;
                } elseif ($delivery->jarak_lokasi == 41 - 50) {
                    $additive_1g = $mutu->additive_1g * $request->input('qty') + 1.3;
                } else {
                    $additive_1g = $mutu->additive_1g * $request->input('qty');
                }
            } else {
                $additive_1g = 0;
            }

            if (!empty($mutu->additive_2g)) {
                if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                    $additive_2g = $mutu->additive_2g * $request->input('qty') + 1.1;
                } elseif ($delivery->jarak_lokasi == 36 - 40) {
                    $additive_2g = $mutu->additive_2g * $request->input('qty') + 1.2;
                } elseif ($delivery->jarak_lokasi == 41 - 50) {
                    $additive_2g = $mutu->additive_2g * $request->input('qty') + 1.3;
                } else {
                    $additive_2g = $mutu->additive_2g * $request->input('qty');
                }
            } else {
                $additive_2g = 0;
            }
        }

        $stock = StockTotal::find(1);
        $stock->pasir_cilegon -= $pasir;
        $stock->abu_batu -= $dust;
        $stock->split_10_20 -= $split;
        $stock->split_screening -= $screening;
        $stock->semen_hc -= $semen;
        $stock->additive_d -= $additive_d;
        $stock->additive_f -= $additive_f;
        $stock->additive_1g -= $additive_1g;
        $stock->additive_2g -= $additive_2g;
        $stock->air -= $air;

        $delivery->aktual = $request->input('qty');
        $delivery->save();

        $stock->save();


        return redirect()->route('deliveries.index')->with('success', 'Delivery created successfully.');
    }


    public function edit($id)
    {
        $delivery = Delivery::find($id);
        return view('pages.deliveries.edit', compact('delivery'));
    }

    public function update(Request $request, $id)
    {
        $delivery = Delivery::find($id);

        //pengembalian stok
        // if ($delivery->fa_nfa == 'FA') {
        //     $mutu = FA::where('mutu', $delivery->mutu_beton)->first();

        //     $pasir = $mutu->pasir * $delivery->volume;
        //     $dust = $mutu->dust * $delivery->volume;
        //     $split = $mutu->split * $delivery->volume;
        //     $semen = $mutu->semen * $delivery->volume;
        //     $fly_ash = $mutu->fly_ash * $delivery->volume;

        //     if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
        //         $additive = $mutu->additive * $delivery->volume;
        //         +1.1;
        //     } elseif ($delivery->jarak_lokasi == 36 - 40) {
        //         $additive = $mutu->additive * $delivery->volume;
        //         +1.2;
        //     } elseif ($delivery->jarak_lokasi == 41 - 50) {
        //         $additive = $mutu->additive * $delivery->volume;
        //         +1.3;
        //     } else {
        //         $additive = $mutu->additive * $delivery->volume;
        //     }

        //     $stock = Stock::orderBy('created_at', 'desc')->first();
        //     $stock->pasir_cilegon += $pasir;
        //     $stock->abu_batu += $dust;
        //     $stock->split_10_20 += $split;
        //     $stock->fly_ash += $fly_ash;
        //     $stock->semen_hc += $semen;
        //     $stock->additive_sobute += $additive;

        //     $stock->save();
        // } elseif ($delivery == 'NFA') {
        //     $mutu = NFA::where('mutu', $delivery->mutu_beton)->first();

        //     $pasir = $mutu->pasir * $delivery->volume;
        //     $dust = $mutu->dust * $delivery->volume;
        //     $split = $mutu->split * $delivery->volume;
        //     $semen = $mutu->semen * $delivery->volume;

        //     if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
        //         $additive = $mutu->additive * $delivery->volume;
        //         +1.1;
        //     } elseif ($delivery->jarak_lokasi == 36 - 40) {
        //         $additive = $mutu->additive * $delivery->volume;
        //         +1.2;
        //     } elseif ($delivery->jarak_lokasi == 41 - 50) {
        //         $additive = $mutu->additive * $delivery->volume;
        //         +1.3;
        //     } else {
        //         $additive = $mutu->additive * $delivery->volume;
        //     }

        //     $stock = Stock::orderBy('created_at', 'desc')->first();
        //     $stock->pasir_cilegon += $pasir;
        //     $stock->abu_batu += $dust;
        //     $stock->split_10_20 += $split;
        //     $stock->semen_hc += $semen;
        //     $stock->additive_sobute += $additive;

        //     $stock->save();
        // }

        // //pengurangan stok
        // if ($request->fa_nfa == 'FA') {
        //     $mutu = FA::where('mutu', $request->input('mutu_beton'))->first();

        //     $pasir = $mutu->pasir * $request->input('volume');
        //     $dust = $mutu->dust * $request->input('volume');
        //     $split = $mutu->split * $request->input('volume');
        //     $semen = $mutu->semen * $request->input('volume');
        //     $fly_ash = $mutu->fly_ash * $request->input('volume');

        //     if ($request->jarak_lokasi == 26 - 30 || $request->jarak_lokasi == 31 - 35) {
        //         $additive = $mutu->additive * $request->input('volume') + 1.1;
        //     } elseif ($request->jarak_lokasi == 36 - 40) {
        //         $additive = $mutu->additive * $request->input('volume') + 1.2;
        //     } elseif ($request->jarak_lokasi == 41 - 50) {
        //         $additive = $mutu->additive * $request->input('volume') + 1.3;
        //     } else {
        //         $additive = $mutu->additive * $request->input('volume');
        //     }

        //     $stock = Stock::orderBy('created_at', 'desc')->first();
        //     $stock->pasir_cilegon -= $pasir;
        //     $stock->abu_batu -= $dust;
        //     $stock->split_10_20 -= $split;
        //     $stock->fly_ash -= $fly_ash;
        //     $stock->semen_hc -= $semen;
        //     $stock->additive_sobute -= $additive;

        //     $stock->save();
        // } elseif ($request->fa_nfa == 'NFA') {
        //     $mutu = NFA::where('mutu', $request->input('mutu_beton'))->first();

        //     $pasir = $mutu->pasir * $request->input('volume');
        //     $dust = $mutu->dust * $request->input('volume');
        //     $split = $mutu->split * $request->input('volume');
        //     $semen = $mutu->semen * $request->input('volume');

        //     if ($request->jarak_lokasi == 26 - 30 || $request->jarak_lokasi == 31 - 35) {
        //         $additive = $mutu->additive * $request->input('volume') + 1.1;
        //     } elseif ($request->jarak_lokasi == 36 - 40) {
        //         $additive = $mutu->additive * $request->input('volume') + 1.2;
        //     } elseif ($request->jarak_lokasi == 41 - 50) {
        //         $additive = $mutu->additive * $request->input('volume') + 1.3;
        //     } else {
        //         $additive = $mutu->additive * $request->input('volume');
        //     }

        //     $stock = Stock::orderBy('created_at', 'desc')->first();
        //     $stock->pasir_cilegon -= $pasir;
        //     $stock->abu_batu -= $dust;
        //     $stock->split_10_20 -= $split;
        //     $stock->semen_hc -= $semen;
        //     $stock->additive_sobute -= $additive;

        //     $stock->save();
        // }

        if (!$delivery) {
            return redirect()->route('deliveries.index')->with('error', 'Data not found.');
        }

        $delivery->kode_sales = $request->kode_sales;
        $delivery->nama_sales = $request->nama_sales;
        $delivery->nama_pelanggan = $request->nama_pelanggan;
        $delivery->kontak_pelanggan = $request->kontak_pelanggan;
        $delivery->pelanggan_baru_lama = $request->pelanggan_baru_lama;
        $delivery->alamat_kirim = $request->alamat_kirim;
        $delivery->tanggal_kirim = $request->tanggal_kirim;
        $delivery->jam_kirim = $request->jam_kirim;
        $delivery->mutu_beton = $request->mutu_beton;
        $delivery->armada = $request->armada;
        $delivery->fa_nfa = $request->fa_nfa;
        $delivery->slump = $request->slump;
        $delivery->harga_ppn = $hargaPPn = $request->input('harga_ppn') ? str_replace(['Rp', '.', ' '], '', $request->input('harga_ppn')) : 0;
        $delivery->volume = $request->volume;
        $delivery->metode_bongkar = $request->metode_bongkar;
        $delivery->media_cor = $request->media_cor;
        $delivery->cara_bayar = $request->cara_bayar;
        $delivery->jumlah_bayar = $request->input('jumlah_bayar') ? str_replace(['Rp', '.', ' '], '', $request->input('jumlah_bayar')) : 0;
        $delivery->jarak_lokasi = $request->jarak_lokasi;
        $delivery->titipan = $request->titipan;

        $delivery->save();

        return redirect()->route('deliveries.index')->with('success', 'Delivery data has been updated successfully.');
    }


    public function destroy($id)
    {
        $delivery = Delivery::find($id);

        //pengembalian stok
        if ($delivery->fa_nfa == 'FA') {
            $mutu = FA::where('mutu', $delivery->mutu_beton)->first();

            $pasir = $mutu->pasir * $delivery->volume;
            $dust = $mutu->dust * $delivery->volume;
            $split = $mutu->split * $delivery->volume;
            $semen = $mutu->semen * $delivery->volume;
            $fly_ash = $mutu->fly_ash * $delivery->volume;

            if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                $additive = $mutu->additive * $delivery->volume;
                +1.1;
            } elseif ($delivery->jarak_lokasi == 36 - 40) {
                $additive = $mutu->additive * $delivery->volume;
                +1.2;
            } elseif ($delivery->jarak_lokasi == 41 - 50) {
                $additive = $mutu->additive * $delivery->volume;
                +1.3;
            } else {
                $additive = $mutu->additive * $delivery->volume;
            }

            $stock = StockTotal::orderBy('created_at', 'desc')->first();
            $stock->pasir_cilegon += $pasir;
            $stock->abu_batu += $dust;
            $stock->split_10_20 += $split;
            $stock->fly_ash += $fly_ash;
            $stock->semen_hc += $semen;
            $stock->additive_sobute += $additive;

            $stock->save();
        } elseif ($delivery == 'NFA') {
            $mutu = NFA::where('mutu', $delivery->mutu_beton)->first();

            $pasir = $mutu->pasir * $delivery->volume;
            $dust = $mutu->dust * $delivery->volume;
            $split = $mutu->split * $delivery->volume;
            $semen = $mutu->semen * $delivery->volume;

            if ($delivery->jarak_lokasi == 26 - 30 || $delivery->jarak_lokasi == 31 - 35) {
                $additive = $mutu->additive * $delivery->volume;
                +1.1;
            } elseif ($delivery->jarak_lokasi == 36 - 40) {
                $additive = $mutu->additive * $delivery->volume;
                +1.2;
            } elseif ($delivery->jarak_lokasi == 41 - 50) {
                $additive = $mutu->additive * $delivery->volume;
                +1.3;
            } else {
                $additive = $mutu->additive * $delivery->volume;
            }

            $stock = StockTotal::orderBy('created_at', 'desc')->first();
            $stock->pasir_cilegon += $pasir;
            $stock->abu_batu += $dust;
            $stock->split_10_20 += $split;
            $stock->semen_hc += $semen;
            $stock->additive_sobute += $additive;

            $stock->save();
        }
        $delivery->delete();
        return redirect()->route('deliveries.pages.index')->with('success', 'Delivery deleted successfully.');
    }

    public function getMutuOptions(Request $request)
    {
        $faNfa = $request->query('fa_nfa');

        if ($faNfa === 'FA') {
            $mutuOptions = FA::all();
        } elseif ($faNfa === 'NFA') {
            $mutuOptions = NFA::all();
        } elseif ($faNfa === 'Special') {
            $mutuOptions = Special::all();
        }

        return response()->json($mutuOptions);
    }
}
