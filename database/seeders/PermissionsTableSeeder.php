<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'team_create',
            ],
            [
                'id'    => 24,
                'title' => 'team_edit',
            ],
            [
                'id'    => 25,
                'title' => 'team_show',
            ],
            [
                'id'    => 26,
                'title' => 'team_delete',
            ],
            [
                'id'    => 27,
                'title' => 'team_access',
            ],
            [
                'id'    => 28,
                'title' => 'election_access',
            ],
            [
                'id'    => 29,
                'title' => 'tabulation_access',
            ],
            [
                'id'    => 30,
                'title' => 'landingpage_access',
            ],
            [
                'id'    => 31,
                'title' => 'about_create',
            ],
            [
                'id'    => 32,
                'title' => 'about_edit',
            ],
            [
                'id'    => 33,
                'title' => 'about_show',
            ],
            [
                'id'    => 34,
                'title' => 'about_delete',
            ],
            [
                'id'    => 35,
                'title' => 'about_access',
            ],
            [
                'id'    => 36,
                'title' => 'faq_create',
            ],
            [
                'id'    => 37,
                'title' => 'faq_edit',
            ],
            [
                'id'    => 38,
                'title' => 'faq_show',
            ],
            [
                'id'    => 39,
                'title' => 'faq_delete',
            ],
            [
                'id'    => 40,
                'title' => 'faq_access',
            ],
            [
                'id'    => 41,
                'title' => 'service_create',
            ],
            [
                'id'    => 42,
                'title' => 'service_edit',
            ],
            [
                'id'    => 43,
                'title' => 'service_show',
            ],
            [
                'id'    => 44,
                'title' => 'service_delete',
            ],
            [
                'id'    => 45,
                'title' => 'service_access',
            ],
            [
                'id'    => 46,
                'title' => 'price_create',
            ],
            [
                'id'    => 47,
                'title' => 'price_edit',
            ],
            [
                'id'    => 48,
                'title' => 'price_show',
            ],
            [
                'id'    => 49,
                'title' => 'price_delete',
            ],
            [
                'id'    => 50,
                'title' => 'price_access',
            ],
            [
                'id'    => 51,
                'title' => 'organization_create',
            ],
            [
                'id'    => 52,
                'title' => 'organization_edit',
            ],
            [
                'id'    => 53,
                'title' => 'organization_show',
            ],
            [
                'id'    => 54,
                'title' => 'organization_delete',
            ],
            [
                'id'    => 55,
                'title' => 'organization_access',
            ],
            [
                'id'    => 56,
                'title' => 'position_create',
            ],
            [
                'id'    => 57,
                'title' => 'position_edit',
            ],
            [
                'id'    => 58,
                'title' => 'position_show',
            ],
            [
                'id'    => 59,
                'title' => 'position_delete',
            ],
            [
                'id'    => 60,
                'title' => 'position_access',
            ],
            [
                'id'    => 61,
                'title' => 'partylist_create',
            ],
            [
                'id'    => 62,
                'title' => 'partylist_edit',
            ],
            [
                'id'    => 63,
                'title' => 'partylist_show',
            ],
            [
                'id'    => 64,
                'title' => 'partylist_delete',
            ],
            [
                'id'    => 65,
                'title' => 'partylist_access',
            ],
            [
                'id'    => 66,
                'title' => 'candidate_create',
            ],
            [
                'id'    => 67,
                'title' => 'candidate_edit',
            ],
            [
                'id'    => 68,
                'title' => 'candidate_show',
            ],
            [
                'id'    => 69,
                'title' => 'candidate_delete',
            ],
            [
                'id'    => 70,
                'title' => 'candidate_access',
            ],
            [
                'id'    => 71,
                'title' => 'voter_create',
            ],
            [
                'id'    => 72,
                'title' => 'voter_edit',
            ],
            [
                'id'    => 73,
                'title' => 'voter_show',
            ],
            [
                'id'    => 74,
                'title' => 'voter_delete',
            ],
            [
                'id'    => 75,
                'title' => 'voter_access',
            ],
            [
                'id'    => 76,
                'title' => 'title_create',
            ],
            [
                'id'    => 77,
                'title' => 'title_edit',
            ],
            [
                'id'    => 78,
                'title' => 'title_show',
            ],
            [
                'id'    => 79,
                'title' => 'title_delete',
            ],
            [
                'id'    => 80,
                'title' => 'title_access',
            ],
            [
                'id'    => 81,
                'title' => 'category_create',
            ],
            [
                'id'    => 82,
                'title' => 'category_edit',
            ],
            [
                'id'    => 83,
                'title' => 'category_show',
            ],
            [
                'id'    => 84,
                'title' => 'category_delete',
            ],
            [
                'id'    => 85,
                'title' => 'category_access',
            ],
            [
                'id'    => 86,
                'title' => 'criterion_create',
            ],
            [
                'id'    => 87,
                'title' => 'criterion_edit',
            ],
            [
                'id'    => 88,
                'title' => 'criterion_show',
            ],
            [
                'id'    => 89,
                'title' => 'criterion_delete',
            ],
            [
                'id'    => 90,
                'title' => 'criterion_access',
            ],
            [
                'id'    => 91,
                'title' => 'judge_create',
            ],
            [
                'id'    => 92,
                'title' => 'judge_edit',
            ],
            [
                'id'    => 93,
                'title' => 'judge_show',
            ],
            [
                'id'    => 94,
                'title' => 'judge_delete',
            ],
            [
                'id'    => 95,
                'title' => 'judge_access',
            ],
            [
                'id'    => 96,
                'title' => 'participant_create',
            ],
            [
                'id'    => 97,
                'title' => 'participant_edit',
            ],
            [
                'id'    => 98,
                'title' => 'participant_show',
            ],
            [
                'id'    => 99,
                'title' => 'participant_delete',
            ],
            [
                'id'    => 100,
                'title' => 'participant_access',
            ],
            [
                'id'    => 101,
                'title' => 'monitor_create',
            ],
            [
                'id'    => 102,
                'title' => 'monitor_edit',
            ],
            [
                'id'    => 103,
                'title' => 'monitor_show',
            ],
            [
                'id'    => 104,
                'title' => 'monitor_delete',
            ],
            [
                'id'    => 105,
                'title' => 'monitor_access',
            ],
            [
                'id'    => 106,
                'title' => 'result_create',
            ],
            [
                'id'    => 107,
                'title' => 'result_edit',
            ],
            [
                'id'    => 108,
                'title' => 'result_show',
            ],
            [
                'id'    => 109,
                'title' => 'result_delete',
            ],
            [
                'id'    => 110,
                'title' => 'result_access',
            ],
            [
                'id'    => 111,
                'title' => 'generate_result_create',
            ],
            [
                'id'    => 112,
                'title' => 'generate_result_edit',
            ],
            [
                'id'    => 113,
                'title' => 'generate_result_show',
            ],
            [
                'id'    => 114,
                'title' => 'generate_result_delete',
            ],
            [
                'id'    => 115,
                'title' => 'generate_result_access',
            ],
            [
                'id'    => 116,
                'title' => 'homepage_create',
            ],
            [
                'id'    => 117,
                'title' => 'homepage_edit',
            ],
            [
                'id'    => 118,
                'title' => 'homepage_show',
            ],
            [
                'id'    => 119,
                'title' => 'homepage_delete',
            ],
            [
                'id'    => 120,
                'title' => 'homepage_access',
            ],
            [
                'id'    => 121,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 122,
                'title' => 'audit_voter_delete',
            ],
            [
                'id'    => 123,
                'title' => 'audit_voter_access',
            ],
            [
                'id'    => 124,
                'title' => 'audit_score_delete',
            ],
            [
                'id'    => 125,
                'title' => 'audit_score_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
