<?php

use Illuminate\Database\Seeder;
use App\Models\AdminMember;

class AdminMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AdminMember::class)->times(10)->create();

        //修改1号id
        $user = AdminMember::find(1);
        $user->username = 'monanxiao';
        $user->email = 'monanxiao@qq.com';
        $user->realname = '墨楠';
        $user->mobile = '18121991976';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
