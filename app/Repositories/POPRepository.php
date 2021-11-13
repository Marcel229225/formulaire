<?php

namespace App\Repositories;

use App\Models\POP;
use App\Repositories\BaseRepository;
use App\Traits\ReportHelper;
use Illuminate\Support\Facades\File;
use PDF;

/**
 * Class POPRepository
 * @package App\Repositories
 * @version February 11, 2020, 8:13 am UTC
*/

class POPRepository extends BaseRepository
{
    use ReportHelper;
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_reference',
        'name',
        'details',
        'chef_pop_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return POP::class;
    }


    public function getSatisticsByPop($all_pop = [], $userRepo, $ventesRepo)
    {
        $output = [];
        $chef_pops = [];
        $statisticsByPop = [];
        $date_of_today = date('Y-m-d H:i:s');

        $path = public_path('storage/Reports_PDF');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0775, true, true);
        }

        foreach ($all_pop as $key => $value) {
            $ventes = $ventesRepo->with('pop', 'user', 'payment', 'commande')
                                ->saleFilterBetweenDates('pop_id', $value['id'], date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59'));

            if ($value['chef_pop_id'] == null) {
                $current_user = $userRepo->with('pop', 'person')->find(2);
                $pop_name = $value['name'];
            } else {
                $current_user = $userRepo->with('pop', 'person')->find($value['chef_pop_id']);
            }
            $file = 'Report_USER_SYSTEM_'.$value['id']."_".$date_of_today."_.pdf";

            $output[] =
                [
                    'all_chef_pop' => $chef_pops[] = $current_user,
                    'statisticsByPop' => $statisticsByPop[] = $this->getReportStatisticsData($value['id'], date('Y-m-d'), date('Y-m-d'), $ventesRepo),
                    'other_taxe_pop' => $ventes->sum('other_taxe'),
                    'pop' => $value['id'],
                    'filename' => $file
                ];
                $daily_statistics = $this->getReportStatisticsData($value['id'], date('Y-m-d'), date('Y-m-d'), $ventesRepo);

                $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
                            ->loadView('reports.reportFileSystem', compact('ventes', 'date_of_today', 'current_user', 'pop_name', 'daily_statistics'));
                $pdf->save($path."/".$file);

        }

        return $output;

    }
}
