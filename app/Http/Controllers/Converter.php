<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use League\Csv\Reader;
use File;

class Converter extends Controller
{

    public function convert(Request $request)
    {

        $csv = Reader::createFromPath(storage_path('newbo.csv'), 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $row) {
            // dd($row);
            // echo "INSERT INTO users('id', 'imei', 'nama', 'npp', 'branch', 'created_at', 'updated_at', 'is_registered', 'supervisor_id', 'organization_name', 'position_title') VALUES (nextval('users_id_seq'::regclass), '-', '" . $row['NAMA'] . "', " . $row['NPP'] . ", " . $row['BRANCH_CODE'] . ", '2020-03-16 17:00:00', '2020-03-16 17:00:00', 't', " . $row['SUPERVISOR_ID'] . ", '" . $row['ORG_NAME'] . "', '" . $row['POSITION_NAME'] . "'); </br>";
            echo "INSERT INTO users_cms(role_id, nama, npp, email, password, branch, is_active) VALUES ('" .
                $row['Role_ID'] . "', '" . $row['Nama'] . "', '" . $row['NPP'] . "', '" . $row['Email'] . "', 'INIPASSWORD',
            '" . $row['Divisi'] . "', 1); </br>";
        }
    }

    public function generate(Request $request)
    {
        echo '<pre>';
        echo 'INSERT INTO "public"."epresence"("type", "is_office", "users_id", "longitude", "latitude", "date", "feeling", "created_at", "updated_at", "is_approve", "nama_outlet", "waktu") VALUES ';
        for ($i = 1; $i <= 2501; $i++) {

            $t = "14";
            $f = "'f'";
            $h = "'100'";

            $awal = "'2020-10-" . $t . " 10:45:17'";
            $akhir = "'2020-10-" . $t . " 19:45:17'";

            $create = "'2020-05-14 12:00:00'";

            $bnis = "'bnis'";
            $wib = "'WIB'";



            echo '(0, ' . $f . ', ' . $i . ', ' . $h . ', ' . $h . ', ' . $awal . ', 3, ' . $create . ', ' . $create . ', 1, ' . $bnis . ', ' . $bnis . '),<br/>';
            echo '(1, ' . $f . ', ' . $i . ', ' . $h . ', ' . $h . ', ' . $akhir . ', 3, ' . $create . ', ' . $create . ', 1, ' . $bnis . ', ' . $bnis . '),<br/>';
        }
        // echo ";";
        echo '</pre>';
    }

    public function stepA(Request $request) {
        $items = collect(["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k"]);

        $chunks = $items->chunk(3);

        $chunks->toArray();

        dd($chunks);
    }

    public function testDate(Request $request) {

        date_default_timezone_set('Asia/Jakarta');

        $date = date('Y-m-d H:i:s');
        echo $date;

        echo "</br>";

        echo date('Y-m-d H:i:s', time()+3600);

        echo "</br>";

        echo date('Y-m-d H:i:s', time()+7200);
        // date("H:i:s", time()+3600);
    }

}
