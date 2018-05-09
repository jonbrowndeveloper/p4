<?php

use Illuminate\Database\Seeder;
use App\Song;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = [
            ['Symphony No 1', 'Alexander Borodin','https://www.youtube.com/watch?v=yu2ov_0Qd2w','yu2ov_0Qd2w','this is my favorite of his'],
            ['Symphony No 2', 'Alexander Borodin','https://www.youtube.com/watch?v=GV45rYAx9z8','GV45rYAx9z8','still really good'],
            ['Talk', 'Coldplay','https://www.youtube.com/watch?v=EH9meoWmAOM','EH9meoWmAOM','always gives me the chills'],
            ['Viva la Vida', 'Coldplay','https://www.youtube.com/watch?v=dvgZkm1xWPE','dvgZkm1xWPE','a classic by now'],
            ['Transatlanticism', 'Death Cab for Cutie','https://www.youtube.com/watch?v=-3b6hDCIeDk','3b6hDCIeDk','I love just how long the intro is...'],
            ['Plans - Full Album', 'Death Cab for Cutie','https://www.youtube.com/watch?v=G7f4K3aVMrk','G7f4K3aVMrk','a full album because why not'],
            ['Give Up', 'The Postal Service','https://www.youtube.com/watch?v=oPwXHSqFl9Q','oPwXHSqFl9Q','another full one'],
            ['Thank God Im a Country Boy', 'John Denver','https://www.youtube.com/watch?v=QRuCPS_-_IA','QRuCPS_-_IA',''],
            ['Rocky Mountain High', 'John Denver','https://www.youtube.com/watch?v=eOB4VdlkzO4','eOB4VdlkzO4',''],
            ['Take Me Home, Country Roads', 'John Denver','https://www.youtube.com/watch?v=1vrEljMfXYo','1vrEljMfXYo',''],
        ];

        foreach ($songs as $key => $songData)
        {
            $song = new Song();

            $random = rand(0,240);

            $song->created_at = Carbon\Carbon::now()->subDays($random)->toDateTimeString();
            $song->updated_at = Carbon\Carbon::now()->subDays($random)->toDateTimeString();
            $song->song_name = $songData[0];
            $song->artist = $songData[1];
            $song->song_url = $songData[2];
            $song->song_id = $songData[3];
            $song->song_comment = $songData[4];

            $song->save();

        }


    }
}
