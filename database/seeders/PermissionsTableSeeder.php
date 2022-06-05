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
                'title' => 'course_create',
            ],
            [
                'id'    => 18,
                'title' => 'course_edit',
            ],
            [
                'id'    => 19,
                'title' => 'course_show',
            ],
            [
                'id'    => 20,
                'title' => 'course_delete',
            ],
            [
                'id'    => 21,
                'title' => 'course_access',
            ],
            [
                'id'    => 22,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 23,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 24,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 25,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 26,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 27,
                'title' => 'test_create',
            ],
            [
                'id'    => 28,
                'title' => 'test_edit',
            ],
            [
                'id'    => 29,
                'title' => 'test_show',
            ],
            [
                'id'    => 30,
                'title' => 'test_delete',
            ],
            [
                'id'    => 31,
                'title' => 'test_access',
            ],
            [
                'id'    => 32,
                'title' => 'question_create',
            ],
            [
                'id'    => 33,
                'title' => 'question_edit',
            ],
            [
                'id'    => 34,
                'title' => 'question_show',
            ],
            [
                'id'    => 35,
                'title' => 'question_delete',
            ],
            [
                'id'    => 36,
                'title' => 'question_access',
            ],
            [
                'id'    => 37,
                'title' => 'question_option_create',
            ],
            [
                'id'    => 38,
                'title' => 'question_option_edit',
            ],
            [
                'id'    => 39,
                'title' => 'question_option_show',
            ],
            [
                'id'    => 40,
                'title' => 'question_option_delete',
            ],
            [
                'id'    => 41,
                'title' => 'question_option_access',
            ],
            [
                'id'    => 42,
                'title' => 'test_result_create',
            ],
            [
                'id'    => 43,
                'title' => 'test_result_edit',
            ],
            [
                'id'    => 44,
                'title' => 'test_result_show',
            ],
            [
                'id'    => 45,
                'title' => 'test_result_delete',
            ],
            [
                'id'    => 46,
                'title' => 'test_result_access',
            ],
            [
                'id'    => 47,
                'title' => 'test_answer_create',
            ],
            [
                'id'    => 48,
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => 49,
                'title' => 'test_answer_show',
            ],
            [
                'id'    => 50,
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => 51,
                'title' => 'test_answer_access',
            ],
            [
                'id'    => 52,
                'title' => 'review_create',
            ],
            [
                'id'    => 53,
                'title' => 'review_edit',
            ],
            [
                'id'    => 54,
                'title' => 'review_show',
            ],
            [
                'id'    => 55,
                'title' => 'review_delete',
            ],
            [
                'id'    => 56,
                'title' => 'review_access',
            ],
            [
                'id'    => 57,
                'title' => 'banner_create',
            ],
            [
                'id'    => 58,
                'title' => 'banner_edit',
            ],
            [
                'id'    => 59,
                'title' => 'banner_show',
            ],
            [
                'id'    => 60,
                'title' => 'banner_delete',
            ],
            [
                'id'    => 61,
                'title' => 'banner_access',
            ],
            [
                'id'    => 62,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 63,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 64,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 65,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 66,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 67,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 68,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 69,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 70,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 71,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 72,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 73,
                'title' => 'product_create',
            ],
            [
                'id'    => 74,
                'title' => 'product_edit',
            ],
            [
                'id'    => 75,
                'title' => 'product_show',
            ],
            [
                'id'    => 76,
                'title' => 'product_delete',
            ],
            [
                'id'    => 77,
                'title' => 'product_access',
            ],
            [
                'id'    => 78,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 79,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 80,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 81,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 82,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 83,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 84,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 85,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 86,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 87,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 88,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 89,
                'title' => 'notification_create',
            ],
            [
                'id'    => 90,
                'title' => 'notification_edit',
            ],
            [
                'id'    => 91,
                'title' => 'notification_show',
            ],
            [
                'id'    => 92,
                'title' => 'notification_delete',
            ],
            [
                'id'    => 93,
                'title' => 'notification_access',
            ],
            [
                'id'    => 94,
                'title' => 'chapter_create',
            ],
            [
                'id'    => 95,
                'title' => 'chapter_edit',
            ],
            [
                'id'    => 96,
                'title' => 'chapter_show',
            ],
            [
                'id'    => 97,
                'title' => 'chapter_delete',
            ],
            [
                'id'    => 98,
                'title' => 'chapter_access',
            ],
            [
                'id'    => 99,
                'title' => 'topic_create',
            ],
            [
                'id'    => 100,
                'title' => 'topic_edit',
            ],
            [
                'id'    => 101,
                'title' => 'topic_show',
            ],
            [
                'id'    => 102,
                'title' => 'topic_delete',
            ],
            [
                'id'    => 103,
                'title' => 'topic_access',
            ],
            [
                'id'    => 104,
                'title' => 'kela_create',
            ],
            [
                'id'    => 105,
                'title' => 'kela_edit',
            ],
            [
                'id'    => 106,
                'title' => 'kela_show',
            ],
            [
                'id'    => 107,
                'title' => 'kela_delete',
            ],
            [
                'id'    => 108,
                'title' => 'kela_access',
            ],
            [
                'id'    => 109,
                'title' => 'management_test_access',
            ],
            [
                'id'    => 110,
                'title' => 'management_kela_access',
            ],
            [
                'id'    => 111,
                'title' => 'learn_progress_create',
            ],
            [
                'id'    => 112,
                'title' => 'learn_progress_edit',
            ],
            [
                'id'    => 113,
                'title' => 'learn_progress_show',
            ],
            [
                'id'    => 114,
                'title' => 'learn_progress_delete',
            ],
            [
                'id'    => 115,
                'title' => 'learn_progress_access',
            ],
            [
                'id'    => 116,
                'title' => 'list_payment_create',
            ],
            [
                'id'    => 117,
                'title' => 'list_payment_edit',
            ],
            [
                'id'    => 118,
                'title' => 'list_payment_show',
            ],
            [
                'id'    => 119,
                'title' => 'list_payment_delete',
            ],
            [
                'id'    => 120,
                'title' => 'list_payment_access',
            ],
            [
                'id'    => 121,
                'title' => 'schedule_create',
            ],
            [
                'id'    => 122,
                'title' => 'schedule_edit',
            ],
            [
                'id'    => 123,
                'title' => 'schedule_show',
            ],
            [
                'id'    => 124,
                'title' => 'schedule_delete',
            ],
            [
                'id'    => 125,
                'title' => 'schedule_access',
            ],
            [
                'id'    => 126,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 127,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 128,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 129,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 130,
                'title' => 'transaction_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
