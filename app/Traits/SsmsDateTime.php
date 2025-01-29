<?php

namespace App\Traits;
use Illuminate\Support\Facades\DB;

trait SsmsDateTime{

    public function getDateFormat()
    {
        // Tableau associatif pour stocker les formats de date en fonction de la version SQL
        $dateFormat = [
            'SQL2000' => 'Y-m-d H:i:s',           // SQL Server 2000
            'SQL2005' => 'Y-m-d H:i:s',           // SQL Server 2005
            'SQL2008' => 'Y-m-d H:i:s.v',         // SQL Server 2008 (supports milliseconds)
            'SQL2008 R2' => 'Y-m-d H:i:s.v',      // SQL Server 2008 R2 (supports milliseconds)
            'SQL2012' => 'Y-m-d H:i:s.v',         // SQL Server 2012 (supports milliseconds)
            'SQL2014' => 'Y-m-d H:i:s.v',         // SQL Server 2014 (supports milliseconds)
            'SQL2016' => 'Y-d-m H:i:s.v',         // SQL Server 2016 (supports milliseconds)
            'SQL2017' => 'Y-m-d H:i:s.v',         // SQL Server 2017 (supports milliseconds)
            'SQL2019' => 'Y-m-d H:i:s.v',         // SQL Server 2019 (supports milliseconds)
            'SQL2022' => 'Y-m-d H:i:s.v',         // SQL Server 2022 (supports milliseconds)
        ];

        // Exécute une requête SQL pour obtenir des informations sur la version SQL en cours d'exécution
        // $result = DB::select(DB::raw("
        //     SELECT
        //         CASE 
        //             WHEN CONVERT(VARCHAR(128), SERVERPROPERTY ('productversion')) like '8%' THEN 'SQL2000'
        //             WHEN CONVERT(VARCHAR(128), SERVERPROPERTY ('productversion')) like '9%' THEN 'SQL2005'
        //             WHEN CONVERT(VARCHAR(128), SERVERPROPERTY ('productversion')) like '10.0%' THEN 'SQL2008'
        //             WHEN CONVERT(VARCHAR(128), SERVERPROPERTY ('productversion')) like '10.5%' THEN 'SQL2008 R2'
        //             WHEN CONVERT(VARCHAR(128), SERVERPROPERTY ('productversion')) like '11%' THEN 'SQL2012'
        //             WHEN CONVERT(VARCHAR(128), SERVERPROPERTY ('productversion')) like '12%' THEN 'SQL2014'
        //             WHEN CONVERT(VARCHAR(128), SERVERPROPERTY ('productversion')) like '13%' THEN 'SQL2016'     
        //             WHEN CONVERT(VARCHAR(128), SERVERPROPERTY ('productversion')) like '14%' THEN 'SQL2017' 
        //             WHEN CONVERT(VARCHAR(128), SERVERPROPERTY ('productversion')) like '15%' THEN 'SQL2019' 
        //             WHEN CONVERT(VARCHAR(128), SERVERPROPERTY ('productversion')) like '16%' THEN 'SQL2022' 
        //             ELSE 'unknown'
        //         END AS MajorVersion,
        //         SERVERPROPERTY('ProductLevel') AS ProductLevel,
        //         SERVERPROPERTY('Edition') AS Edition,
        //         SERVERPROPERTY('ProductVersion') AS ProductVersion
        //     ")
        // );

        // Convertit le résultat en une collection pour un accès facile
        // $result = collect($result);

        // Retourne le format de date en fonction de la version SQL
        // return $dateFormat[$result[0]->MajorVersion];
        /**
         * TODO : check if is sql server
         */
        if(config('database.default') == 'sqlsrv'){
            return $dateFormat[env('SQLSRV_VERSION', 'SQL2016')];
        }else{
            return 'Y-m-d H:i:s';
        }
    }

}