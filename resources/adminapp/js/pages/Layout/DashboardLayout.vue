<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <event-hub></event-hub>
    <side-bar :sidebarLinks="sidebarLinks">
      <mobile-menu slot="content"></mobile-menu>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>
      <div class="content">
        <dashboard-content></dashboard-content>
      </div>
    </div>
  </div>
</template>

<script>
import DashboardContent from './Content.vue'
import TopNavbar from './TopNavbar.vue'
import MobileMenu from './MobileMenu.vue'

export default {
  components: {
    DashboardContent,
    TopNavbar,
    MobileMenu
  },
  data() {
    return {
      sidebarLinks: [
        {
          title: 'global.dashboard',
          icon: 'dashboard',
          path: { name: 'dashboard' }
        },
        {
          title: 'cruds.userManagement.title',
          icon: 'person',
          path: { name: 'user_management' },
          gate: 'user_management_access',
          children: [
            {
              title: 'cruds.permission.title',
              icon: 'perm_data_setting',
              path: { name: 'permissions.index' },
              gate: 'permission_access'
            },
            {
              title: 'cruds.role.title',
              icon: 'group',
              path: { name: 'roles.index' },
              gate: 'role_access'
            },
            {
              title: 'cruds.user.title',
              icon: 'person',
              path: { name: 'users.index' },
              gate: 'user_access'
            },
            {
              title: 'cruds.notification.title',
              icon: 'table_view',
              path: { name: 'notifications.index' },
              gate: 'notification_access'
            },
            {
              title: 'cruds.learnProgress.title',
              icon: 'table_view',
              path: { name: 'learn_progresses.index' },
              gate: 'learn_progress_access'
            }
          ]
        },
        {
          title: 'cruds.productManagement.title',
          icon: 'table_view',
          path: { name: 'product_management' },
          gate: 'product_management_access',
          children: [
            {
              title: 'cruds.banner.title',
              icon: 'table_view',
              path: { name: 'banners.index' },
              gate: 'banner_access'
            },
            {
              title: 'cruds.productCategory.title',
              icon: 'table_view',
              path: { name: 'product_categories.index' },
              gate: 'product_category_access'
            },
            {
              title: 'cruds.productTag.title',
              icon: 'table_view',
              path: { name: 'product_tags.index' },
              gate: 'product_tag_access'
            },
            {
              title: 'cruds.product.title',
              icon: 'table_view',
              path: { name: 'products.index' },
              gate: 'product_access'
            },
            {
              title: 'cruds.listPayment.title',
              icon: 'table_view',
              path: { name: 'list_payments.index' },
              gate: 'list_payment_access'
            },
            {
              title: 'cruds.schedule.title',
              icon: 'table_view',
              path: { name: 'schedules.index' },
              gate: 'schedule_access'
            },
            {
              title: 'cruds.transaction.title',
              icon: 'table_view',
              path: { name: 'transactions.index' },
              gate: 'transaction_access'
            }
          ]
        },
        {
          title: 'cruds.managementTest.title',
          icon: 'table_view',
          path: { name: 'management_test' },
          gate: 'management_test_access',
          children: [
            {
              title: 'cruds.test.title',
              icon: 'table_view',
              path: { name: 'tests.index' },
              gate: 'test_access'
            },
            {
              title: 'cruds.question.title',
              icon: 'table_view',
              path: { name: 'questions.index' },
              gate: 'question_access'
            },
            {
              title: 'cruds.questionOption.title',
              icon: 'table_view',
              path: { name: 'question_options.index' },
              gate: 'question_option_access'
            },
            {
              title: 'cruds.testResult.title',
              icon: 'table_view',
              path: { name: 'test_results.index' },
              gate: 'test_result_access'
            },
            {
              title: 'cruds.testAnswer.title',
              icon: 'table_view',
              path: { name: 'test_answers.index' },
              gate: 'test_answer_access'
            },
            {
              title: 'cruds.review.title',
              icon: 'table_view',
              path: { name: 'reviews.index' },
              gate: 'review_access'
            }
          ]
        },
        {
          title: 'cruds.managementKela.title',
          icon: 'table_view',
          path: { name: 'management_kela' },
          gate: 'management_kela_access',
          children: [
            {
              title: 'cruds.kela.title',
              icon: 'table_view',
              path: { name: 'kelas.index' },
              gate: 'kela_access'
            },
            {
              title: 'cruds.course.title',
              icon: 'table_view',
              path: { name: 'courses.index' },
              gate: 'course_access'
            },
            {
              title: 'cruds.chapter.title',
              icon: 'table_view',
              path: { name: 'chapters.index' },
              gate: 'chapter_access'
            },
            {
              title: 'cruds.topic.title',
              icon: 'table_view',
              path: { name: 'topics.index' },
              gate: 'topic_access'
            },
            {
              title: 'cruds.lesson.title',
              icon: 'table_view',
              path: { name: 'lessons.index' },
              gate: 'lesson_access'
            }
          ]
        },
        {
          title: 'cruds.faqManagement.title',
          icon: 'table_view',
          path: { name: 'faq_management' },
          gate: 'faq_management_access',
          children: [
            {
              title: 'cruds.faqCategory.title',
              icon: 'table_view',
              path: { name: 'faq_categories.index' },
              gate: 'faq_category_access'
            },
            {
              title: 'cruds.faqQuestion.title',
              icon: 'table_view',
              path: { name: 'faq_questions.index' },
              gate: 'faq_question_access'
            }
          ]
        }
      ]
    }
  }
}
</script>
