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
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'purchase_create',
            ],
            [
                'id'    => 34,
                'title' => 'purchase_edit',
            ],
            [
                'id'    => 35,
                'title' => 'purchase_show',
            ],
            [
                'id'    => 36,
                'title' => 'purchase_delete',
            ],
            [
                'id'    => 37,
                'title' => 'purchase_access',
            ],
            [
                'id'    => 38,
                'title' => 'sale_create',
            ],
            [
                'id'    => 39,
                'title' => 'sale_edit',
            ],
            [
                'id'    => 40,
                'title' => 'sale_show',
            ],
            [
                'id'    => 41,
                'title' => 'sale_delete',
            ],
            [
                'id'    => 42,
                'title' => 'sale_access',
            ],
            [
                'id'    => 43,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 44,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 45,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 46,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 47,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 48,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 49,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 50,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 51,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 52,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 53,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 54,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 55,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 56,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 57,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 58,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 59,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 60,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 61,
                'title' => 'asset_create',
            ],
            [
                'id'    => 62,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 63,
                'title' => 'asset_show',
            ],
            [
                'id'    => 64,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 65,
                'title' => 'asset_access',
            ],
            [
                'id'    => 66,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 67,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 68,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 69,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 70,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 71,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 72,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 73,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 74,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 75,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 76,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 77,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 78,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 79,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 80,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 81,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 82,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 83,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 84,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 85,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 86,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 87,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 88,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 89,
                'title' => 'task_create',
            ],
            [
                'id'    => 90,
                'title' => 'task_edit',
            ],
            [
                'id'    => 91,
                'title' => 'task_show',
            ],
            [
                'id'    => 92,
                'title' => 'task_delete',
            ],
            [
                'id'    => 93,
                'title' => 'task_access',
            ],
            [
                'id'    => 94,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 95,
                'title' => 'time_management_access',
            ],
            [
                'id'    => 96,
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => 97,
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => 98,
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => 99,
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => 100,
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => 101,
                'title' => 'time_project_create',
            ],
            [
                'id'    => 102,
                'title' => 'time_project_edit',
            ],
            [
                'id'    => 103,
                'title' => 'time_project_show',
            ],
            [
                'id'    => 104,
                'title' => 'time_project_delete',
            ],
            [
                'id'    => 105,
                'title' => 'time_project_access',
            ],
            [
                'id'    => 106,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 107,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 108,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 109,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 110,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 111,
                'title' => 'time_report_create',
            ],
            [
                'id'    => 112,
                'title' => 'time_report_edit',
            ],
            [
                'id'    => 113,
                'title' => 'time_report_show',
            ],
            [
                'id'    => 114,
                'title' => 'time_report_delete',
            ],
            [
                'id'    => 115,
                'title' => 'time_report_access',
            ],
            [
                'id'    => 116,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 117,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 118,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 119,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 120,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 121,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 122,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 123,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 124,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 125,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 126,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 127,
                'title' => 'expense_create',
            ],
            [
                'id'    => 128,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 129,
                'title' => 'expense_show',
            ],
            [
                'id'    => 130,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 131,
                'title' => 'expense_access',
            ],
            [
                'id'    => 132,
                'title' => 'income_create',
            ],
            [
                'id'    => 133,
                'title' => 'income_edit',
            ],
            [
                'id'    => 134,
                'title' => 'income_show',
            ],
            [
                'id'    => 135,
                'title' => 'income_delete',
            ],
            [
                'id'    => 136,
                'title' => 'income_access',
            ],
            [
                'id'    => 137,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 138,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 139,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 140,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 141,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 142,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
