<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeders\Traits\TruncateTable;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        $this->call(AuthSeeder::class);
        $this->call(AnnouncementSeeder::class);

        Service::create(['libele' => 'Cabinet', 'cigle' => 'CAB']);
        Service::create(['libele' => 'Secrétariat Général', 'cigle' => 'SG']);
        Service::create(['libele' => 'Direction générale du développement communautaire et la promotion de l equité' , 'cigle' => 'DGDCPE']);
        Service::create(['libele' => 'Direction de l\'administration générale et de l\'équipement', 'cigle' => 'DAGE']);
        Model::reguard();
    }
}
