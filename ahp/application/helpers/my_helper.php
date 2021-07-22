<?php

/**
 * PERHITUNGAN AHP
 */
function get_relkriteria()
{
    $CI = &get_instance();
    $data = array();
    $rows = $CI->db->query("SELECT k.nama_kriteria, rk.ID1, rk.ID2, nilai 
        FROM tb_rel_kriteria rk INNER JOIN tb_kriteria k ON k.kode_kriteria=rk.ID1 
        ORDER BY ID1, ID2")->result();
    foreach ($rows as $row) {
        $data[$row->ID1][$row->ID2] = $row->nilai;
    }
    return $data;
}

function get_relalternatif()
{
    $CI = &get_instance();
    $data = array();
    $rows = $CI->db->query("SELECT * 
        FROM tb_rel_alternatif
        ORDER BY kode_kriteria,kode1, kode2")->result();
    foreach ($rows as $row) {
        $data[$row->kode_kriteria][$row->kode1][$row->kode2] = $row->nilai;
    }
    return $data;
}

function get_total_kolom($matriks = array())
{
    $total = array();
    foreach ($matriks as $key => $val) {
        foreach ($val as $k => $v) {
            if (!isset($total[$k]))
                $total[$k] = 0;
            $total[$k] += $v;
        }
    }
    return $total;
}

function get_total_kolom_alternatif($matriks = array())
{
    $total = array();
    foreach ($matriks as $key => $val) {

        foreach ($val as $k => $v) {
            foreach ($v as $ka => $va) {
              if (!isset($total[$key][$ka]))
                $total[$key][$ka] = 0;
            $total[$key][$ka] += $va;
        }

    }
}
return $total;
}
function normalize_alternatif($matriks = array(), $total = array())
{

    foreach ($matriks as $key => $val) {
        foreach ($val as $k => $v) {
            foreach ($v as $ka => $va) {
                $matriks[$key][$k][$ka] = $matriks[$key][$k][$ka] / $total[$key][$ka];
            }
        }
    }
    return $matriks;
}

function normalize($matriks = array(), $total = array())
{

    foreach ($matriks as $key => $val) {
        foreach ($val as $k => $v) {
            $matriks[$key][$k] = $matriks[$key][$k] / $total[$k];
        }
    }
    return $matriks;
}
function mmult($matriks = array(), $rata = array())
{
    $data = array();

    $rata = array_values($rata);

    foreach ($matriks as $key => $val) {
        $no = 0;
        foreach ($val as $k => $v) {

            if (!isset($data[$key]))
                $data[$key] = 0;
            $data[$key] += $v * $rata[$no];
            $no++;
        }
    }

    return $data;
}
function consistency_measure($matriks, $rata)
{
    $matriks = mmult($matriks, $rata);
    foreach ($matriks as $key => $val) {
        $data[$key] = $val / $rata[$key];
    }
    return $data;
}

function get_rata($normal)
{
    $rata = array();
    foreach ($normal as $key => $val) {
        $rata[$key] = array_sum($val) / count($val);
    }
    return $rata;
}

function get_rata_alternatif($normal)
{
    $rata = array();
    foreach ($normal as $key => $val) {
        foreach ($val as $k => $v) {
             $rata[$key][$k] = array_sum($v) / count($v);
        }
       
    }
    return $rata;
}
global $TIPE;
$TIPE = array(
    1 => 'Tipe Biasa (Usual Criterion)',
    2 => 'Tipe Quasi (Quasi Criterion atau U-Shape)',
    3 => 'Tipe Linier (Linear Criterion atau V-Shape)',
    4 => 'Tipe Tingkatan (Level Criterion)',
    5 => 'Tipe Linear Quasi (Linear Criterion with Indifference)',
    6 => 'Tipe Gaussian',
);

function nama_tipe($tipe)
{
    global $TIPE;
    return $TIPE[$tipe];
}

/**
 * menampilkan nilai perbandingan untuk matriks ke dalam combobox
 */
function get_nilai_option($selected = '')
{
    $nilai = array(
        '1' => 'Sama penting dengan',
        '2' => 'Mendekati sedikit lebih penting dari',
        '3' => 'Sedikit lebih penting dari',
        '4' => 'Mendekati lebih penting dari',
        '5' => 'Lebih penting dari',
        '6' => 'Mendekati sangat penting dari',
        '7' => 'Sangat penting dari',
        '8' => 'Mendekati mutlak dari',
        '9' => 'Mutlak sangat penting dari',
    );
    foreach ($nilai as $key => $value) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$key - $value</option>";
        else
            $a .= "<option value='$key'>$key - $value</option>";
    }
    return $a;
}
/**
 * FUNGSI UMUM
 */

function load_view($view, $data = array())
{
    $CI = &get_instance();
    $CI->load->view('header', $data);
    $CI->load->view($view, $data);
    $CI->load->view('footer', $data);
}

function load_view_cetak($view, $data = array())
{
    $CI = &get_instance();
    $CI->load->view('header_cetak', $data);
    $CI->load->view($view, $data);
    $CI->load->view('footer_cetak', $data);
}

function load_message($message = '', $type = 'danger')
{
    if ($type == 'danger') {
        $data['title'] = 'Error';
    } else {
        $data['title'] = 'Success';
    }

    $data['class'] = $type;
    $data['message'] = $message;

    load_view('message', $data);
}

function kode_oto($field, $table, $prefix, $length)
{
    $CI = &get_instance();
    $query = $CI->db->query("SELECT $field AS kode FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    $row = $query->row_object();

    if ($row) {
        return $prefix . substr(str_repeat('0', $length) . (substr($row->kode, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function get_kriteria_option($selected = '')
{
    $CI = &get_instance();
    $rows = $CI->kriteria_model->tampil();

    $a = '';
    foreach ($rows as $row) {
        if ($selected == $row->kode_kriteria)
            $a .= "<option value='$row->kode_kriteria' selected>$row->nama_kriteria</option>";
        else
            $a .= "<option value='$row->kode_kriteria'>$row->nama_kriteria</option>";
    }
    return $a;
}

function get_alternatif_option($selected = '')
{
    $CI = &get_instance();
    $CI->load->model('alternatif_model');
    $rows = $CI->alternatif_model->tampil();

    $a = '';
    foreach ($rows as $row) {
        if ($selected == $row->kode_alternatif)
            $a .= "<option value='$row->kode_alternatif' selected>[$row->kode_alternatif] $row->nama_alternatif</option>";
        else
            $a .= "<option value='$row->kode_alternatif'>[$row->kode_alternatif] $row->nama_alternatif</option>";
    }
    return $a;
}

function print_error()
{
    return validation_errors('<div class="alert alert-danger" alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
}
