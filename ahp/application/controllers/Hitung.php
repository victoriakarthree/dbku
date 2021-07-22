<?php
class Hitung extends CI_Controller
{

    protected $crips = array();
    protected $alternatif = array();
    protected $kriteria = array();
    protected $matriks = array();
    protected $normal = array();
    protected $hasil = array();
    protected $total = array();
    protected $rank = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('hitung_model');
        $this->load->model('kriteria_model');
        $this->load->model('alternatif_model');
    }

    public function index()
    {
        //echo '<pre>' . print_r($data['rel_kriteria'], 1) . '</pre>';

        $data['title'] = 'Perhitungan';
        $data['ALTERNATIF'] = $this->get_alternatif();
        $data['KRITERIA'] = $this->get_kriteria();

        //AHP
        $data['rel_kriteria'] = get_relkriteria();
        $data['total'] = get_total_kolom($data['rel_kriteria']);
        $data['ahp_normal'] = normalize($data['rel_kriteria'], $data['total']);
        $data['rata'] = get_rata($data['ahp_normal']);
        $data['cm'] = consistency_measure($data['rel_kriteria'], $data['rata']);

        //AHP ALTERNATIF
        $data['rel_alternatif'] = get_relalternatif();
        $data['total_alternatif'] = get_total_kolom_alternatif($data['rel_alternatif']);
        $data['ahp_normal_alternatif'] = normalize_alternatif($data['rel_alternatif'], $data['total_alternatif']);
        $data['rata_alternatif'] = get_rata_alternatif($data['ahp_normal_alternatif']);

        //tabel nilai ratio index
        $data['nRI'] = array(
            1 => 0,
            2 => 0,
            3 => 0.58,
            4 => 0.9,
            5 => 1.12,
            6 => 1.24,
            7 => 1.32,
            8 => 1.41,
            9 => 1.46,
            10 => 1.49
        );

        load_view('hitung', $data);
    }

    public function cetak($ID = NULL)
    {
        $data['title'] = 'Perhitungan';
        $data['ALTERNATIF'] = $this->get_alternatif();
        $data['KRITERIA'] = $this->get_kriteria();

        //AHP
        $data['rel_kriteria'] = get_relkriteria();
        $data['total'] = get_total_kolom($data['rel_kriteria']);
        $data['ahp_normal'] = normalize($data['rel_kriteria'], $data['total']);
        $data['rata'] = get_rata($data['ahp_normal']);
        $data['cm'] = consistency_measure($data['rel_kriteria'], $data['rata']);

        

        //tabel nilai ratio index
        $data['nRI'] = array(
            1 => 0,
            2 => 0,
            3 => 0.58,
            4 => 0.9,
            5 => 1.12,
            6 => 1.24,
            7 => 1.32,
            8 => 1.41,
            9 => 1.46,
            10 => 1.49
        );

        load_view_cetak('hitung_cetak', $data);
    }

    function get_rank($array)
    {
        $data = $array;
        arsort($data);
        $no = 1;
        $new = array();
        foreach ($data as $key => $value) {
            $new[$key] = $no++;
        }
        return $new;
    }

    function get_net_flow($leaving = array(), $entering = array())
    {
        $arr = array();
        foreach ($leaving as $key => $val) {
            $arr[$key] = $val - $entering[$key];
        }
        return $arr;
    }

    function get_entering($matriks = array(), $total_kolom = array())
    {
        $arr = array();
        foreach ($matriks as $key => $val) {
            $arr[$key] = $total_kolom[$key] / (count($val) - 1);
        }
        return $arr;
    }

    function get_leaving($matriks = array(), $total_baris = array())
    {
        $arr = array();
        foreach ($matriks as $key => $val) {
            $arr[$key] = $total_baris[$key] / (count($val) - 1);
        }
        return $arr;
    }

    function get_total_baris($matriks = array())
    {
        $arr = array();
        foreach ($matriks as $key => $val) {
            $arr[$key] = 0;
            foreach ($val as $k => $v) {
                $arr[$key] += $v;
            }
        }
        return $arr;
    }

    function get_total_kolom($matriks = array())
    {
        $arr = array();
        foreach ($matriks as $key => $val) {
            foreach ($val as $k => $v) {
                if (!isset($arr[$k]))
                    $arr[$k] = 0;
                $arr[$k] += $v;
            }
        }
        return $arr;
    }

    function get_matriks($komposisi = array(), $total_index_pref = array(), $ALTERNATIF)
    {
        $arr = array();
        foreach ($ALTERNATIF as $key => $val) {
            foreach ($ALTERNATIF as $k => $v) {
                $arr[$key][$k] = 0;
            }
        }

        foreach ($komposisi as $key => $val) {
            $arr[$val[0]][$val[1]] = $total_index_pref[$key];
        }
        return $arr;
    }

    function get_total_indeks_pref($index_pref = array())
    {
        $arr = array();
        foreach ($index_pref as $key => $val) {
            foreach ($val as $k => $v) {
                if (!isset($arr[$k]))
                    $arr[$k] = 0;

                $arr[$k] += $v;
            }
        }
        return $arr;
    }

    function get_index_pref($preferensi = array(), $bobot = array())
    {
        $arr = array();
        foreach ($preferensi as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$key][$k] = $v * $bobot[$key];
            }
        }
        return $arr;
    }

    function hitung_pref($tipe, $q, $p, $minmax, $jarak, $s)
    {
        $minmax = strtolower($minmax);
        if ($minmax == 'minimasi' && $jarak > 0)
            return 0;
        if ($minmax == 'maksimasi' && $jarak < 0)
            return 0;

        if ($tipe == 6) {
            return 1 - (exp(- ($jarak * $jarak) / (2 * $s * $s)));
        } else if ($tipe == 5) {
            if (abs($jarak) <= $q)
                return 0;
            if (abs($jarak) > $q && abs($jarak) <= $p)
                return (abs($jarak) - $q) / ($p - $q);
            if ($p < abs($jarak))
                return 1;
            return -1;
        } else if ($tipe == 4) {
            if (abs($jarak) <= $q)
                return 0;
            if (abs($jarak) > $q && abs($jarak) <= $p)
                return 0.5;
            if ($p < abs($jarak))
                return 1;
            return -1;
        } else if ($tipe == 3) {
            if ($jarak >= $p * -1 && $jarak <= $p)
                return $jarak / $p;
            if ($jarak < $p * -1 || $jarak >= $p)
                return 1;
            return -1;
        } else if ($tipe == 2) {
            if ($jarak >= $q * -1 && $jarak <= $q)
                return 0;
            if ($jarak < $q * -1 || $jarak >= $q)
                return 1;
            return -1;
        } else if ($tipe == 1) {
            if ($jarak == 0)
                return 0;
            elseif ($jarak != 0)
                return 1;

            return -1;
        } else {
            return -1;
        }
    }

    function get_preferensi($selisih = array(), $KRITERIA)
    {
        foreach ($selisih as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$key][$k] = $this->hitung_pref($KRITERIA[$key]->tipe, $KRITERIA[$key]->par_q, $KRITERIA[$key]->par_p, $KRITERIA[$key]->minmax, $v, $KRITERIA[$key]->par_s);
            }
        }
        return $arr;
    }

    function get_selisih($data = array(), $normal = array())
    {
        $arr = array();

        foreach ($normal as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$key][$k] = $data[$v[0]][$key] - $data[$v[1]][$key];
            }
        }
        return $arr;
    }

    function get_normal($data = array(), $komposisi = array(), $KRITERIA)
    {
        $arr = array();
        foreach ($KRITERIA as $key => $val) {
            foreach ($komposisi as $k => $v) {
                $arr[$key][] = array($v[0], $v[1]);
            }
        }
        return $arr;
    }

    function get_komposisi($ALTERNATIF)
    {
        $arr = array();
        $keys = array_keys($ALTERNATIF);

        foreach ($keys as $key) {
            foreach ($keys as $k) {
                if ($key != $k)
                    $arr[$key][$k] = 1;
            }
        }

        $result = array();
        foreach ($arr as $key => $val) {
            foreach ($val as $k => $v) {
                $result[] = array($key, $k);
            }
        }

        return $result;
    }

    function get_data()
    {
        $rows = $this->hitung_model->get_data();
        $data = array();
        foreach ($rows as $row) {
            $data[$row->kode_alternatif][$row->kode_kriteria] = $row->nilai;
        }
        return $data;
    }

    public function get_kriteria()
    {
        $rows = $this->kriteria_model->tampil();
        foreach ($rows as $row) {
            $this->kriteria[$row->kode_kriteria] = $row;
        }
        return $this->kriteria;
    }

    public function get_alternatif()
    {
        $rows = $this->alternatif_model->tampil();
        foreach ($rows as $row) {
            $this->alternatif[$row->kode_alternatif] = $row;
        }
        return $this->alternatif;
    }
}
