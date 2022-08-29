<?php
function getCombinations(...$arrays)
{
    $result = [[]];
    foreach ($arrays as $property => $property_values) {
        $temp = [];
        foreach ($result as $result_item) {
            foreach ($property_values as $property_value) {
                $temp[] = array_merge($result_item, [$property => $property_value]);
            }
        }
        $result = $temp;
    }
    return $result;
}
//array yang di store setelah if
$array1 = [$hm1, $hm2, $hm3, $hm4, $hm5, $hm6, $hm7];
$array2 = [$utk1, $utk2, $utk3, $utk4, $utk5, $utk6, $utk7];
$array3 = [$wp1, $wp2, $wp3, $wp4, $wp5, $wp6, $wp7];
$array4 = [$jn1, $jn2, $jn3, $jn4, $jn5, $jn6, $jn7];
$array5 = [$jp1, $jp2, $jp3, $jp4, $jp5, $jp6, $jp7];
// var_dump($array3);
// die();

// bersihin string

$result1 = array_values(array_filter($array1));
$result2 = array_values(array_filter($array2));
$result3 = array_values(array_filter($array3));
$result4 = array_values(array_filter($array4));
$result5 = array_values(array_filter($array5));

$hasil = getCombinations($result1, $result2, $result3, $result4, $result5);

// var_dump($hasil);
// die();
foreach ($hasil as $c) {
    $text = implode(" ", $c);

    $sql_simpan = "INSERT INTO combine (id_pro,nama) VALUES (
                    '" . $_GET['kode'] . "',
                    '$text'
                    )";
    // var_dump($_POST['kode']);
    // die();

    $query_simpan = mysqli_query($koneksi, $sql_simpan);
}
