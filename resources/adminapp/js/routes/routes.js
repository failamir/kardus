import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'notifications',
            name: 'notifications.index',
            component: () => import('@cruds/Notifications/Index.vue'),
            meta: { title: 'cruds.notification.title' }
          },
          {
            path: 'notifications/create',
            name: 'notifications.create',
            component: () => import('@cruds/Notifications/Create.vue'),
            meta: { title: 'cruds.notification.title' }
          },
          {
            path: 'notifications/:id',
            name: 'notifications.show',
            component: () => import('@cruds/Notifications/Show.vue'),
            meta: { title: 'cruds.notification.title' }
          },
          {
            path: 'notifications/:id/edit',
            name: 'notifications.edit',
            component: () => import('@cruds/Notifications/Edit.vue'),
            meta: { title: 'cruds.notification.title' }
          },
          {
            path: 'learn-progresses',
            name: 'learn_progresses.index',
            component: () => import('@cruds/LearnProgresses/Index.vue'),
            meta: { title: 'cruds.learnProgress.title' }
          },
          {
            path: 'learn-progresses/create',
            name: 'learn_progresses.create',
            component: () => import('@cruds/LearnProgresses/Create.vue'),
            meta: { title: 'cruds.learnProgress.title' }
          },
          {
            path: 'learn-progresses/:id',
            name: 'learn_progresses.show',
            component: () => import('@cruds/LearnProgresses/Show.vue'),
            meta: { title: 'cruds.learnProgress.title' }
          },
          {
            path: 'learn-progresses/:id/edit',
            name: 'learn_progresses.edit',
            component: () => import('@cruds/LearnProgresses/Edit.vue'),
            meta: { title: 'cruds.learnProgress.title' }
          }
        ]
      },
      {
        path: 'product-management',
        name: 'product_management',
        component: View,
        redirect: { name: 'banners.index' },
        children: [
          {
            path: 'banners',
            name: 'banners.index',
            component: () => import('@cruds/Banners/Index.vue'),
            meta: { title: 'cruds.banner.title' }
          },
          {
            path: 'banners/create',
            name: 'banners.create',
            component: () => import('@cruds/Banners/Create.vue'),
            meta: { title: 'cruds.banner.title' }
          },
          {
            path: 'banners/:id',
            name: 'banners.show',
            component: () => import('@cruds/Banners/Show.vue'),
            meta: { title: 'cruds.banner.title' }
          },
          {
            path: 'banners/:id/edit',
            name: 'banners.edit',
            component: () => import('@cruds/Banners/Edit.vue'),
            meta: { title: 'cruds.banner.title' }
          },
          {
            path: 'product-categories',
            name: 'product_categories.index',
            component: () => import('@cruds/ProductCategories/Index.vue'),
            meta: { title: 'cruds.productCategory.title' }
          },
          {
            path: 'product-categories/create',
            name: 'product_categories.create',
            component: () => import('@cruds/ProductCategories/Create.vue'),
            meta: { title: 'cruds.productCategory.title' }
          },
          {
            path: 'product-categories/:id',
            name: 'product_categories.show',
            component: () => import('@cruds/ProductCategories/Show.vue'),
            meta: { title: 'cruds.productCategory.title' }
          },
          {
            path: 'product-categories/:id/edit',
            name: 'product_categories.edit',
            component: () => import('@cruds/ProductCategories/Edit.vue'),
            meta: { title: 'cruds.productCategory.title' }
          },
          {
            path: 'product-tags',
            name: 'product_tags.index',
            component: () => import('@cruds/ProductTags/Index.vue'),
            meta: { title: 'cruds.productTag.title' }
          },
          {
            path: 'product-tags/create',
            name: 'product_tags.create',
            component: () => import('@cruds/ProductTags/Create.vue'),
            meta: { title: 'cruds.productTag.title' }
          },
          {
            path: 'product-tags/:id',
            name: 'product_tags.show',
            component: () => import('@cruds/ProductTags/Show.vue'),
            meta: { title: 'cruds.productTag.title' }
          },
          {
            path: 'product-tags/:id/edit',
            name: 'product_tags.edit',
            component: () => import('@cruds/ProductTags/Edit.vue'),
            meta: { title: 'cruds.productTag.title' }
          },
          {
            path: 'products',
            name: 'products.index',
            component: () => import('@cruds/Products/Index.vue'),
            meta: { title: 'cruds.product.title' }
          },
          {
            path: 'products/create',
            name: 'products.create',
            component: () => import('@cruds/Products/Create.vue'),
            meta: { title: 'cruds.product.title' }
          },
          {
            path: 'products/:id',
            name: 'products.show',
            component: () => import('@cruds/Products/Show.vue'),
            meta: { title: 'cruds.product.title' }
          },
          {
            path: 'products/:id/edit',
            name: 'products.edit',
            component: () => import('@cruds/Products/Edit.vue'),
            meta: { title: 'cruds.product.title' }
          },
          {
            path: 'list-payments',
            name: 'list_payments.index',
            component: () => import('@cruds/ListPayments/Index.vue'),
            meta: { title: 'cruds.listPayment.title' }
          },
          {
            path: 'list-payments/create',
            name: 'list_payments.create',
            component: () => import('@cruds/ListPayments/Create.vue'),
            meta: { title: 'cruds.listPayment.title' }
          },
          {
            path: 'list-payments/:id',
            name: 'list_payments.show',
            component: () => import('@cruds/ListPayments/Show.vue'),
            meta: { title: 'cruds.listPayment.title' }
          },
          {
            path: 'list-payments/:id/edit',
            name: 'list_payments.edit',
            component: () => import('@cruds/ListPayments/Edit.vue'),
            meta: { title: 'cruds.listPayment.title' }
          },
          {
            path: 'schedules',
            name: 'schedules.index',
            component: () => import('@cruds/Schedules/Index.vue'),
            meta: { title: 'cruds.schedule.title' }
          },
          {
            path: 'schedules/create',
            name: 'schedules.create',
            component: () => import('@cruds/Schedules/Create.vue'),
            meta: { title: 'cruds.schedule.title' }
          },
          {
            path: 'schedules/:id',
            name: 'schedules.show',
            component: () => import('@cruds/Schedules/Show.vue'),
            meta: { title: 'cruds.schedule.title' }
          },
          {
            path: 'schedules/:id/edit',
            name: 'schedules.edit',
            component: () => import('@cruds/Schedules/Edit.vue'),
            meta: { title: 'cruds.schedule.title' }
          },
          {
            path: 'transactions',
            name: 'transactions.index',
            component: () => import('@cruds/Transactions/Index.vue'),
            meta: { title: 'cruds.transaction.title' }
          },
          {
            path: 'transactions/create',
            name: 'transactions.create',
            component: () => import('@cruds/Transactions/Create.vue'),
            meta: { title: 'cruds.transaction.title' }
          },
          {
            path: 'transactions/:id',
            name: 'transactions.show',
            component: () => import('@cruds/Transactions/Show.vue'),
            meta: { title: 'cruds.transaction.title' }
          },
          {
            path: 'transactions/:id/edit',
            name: 'transactions.edit',
            component: () => import('@cruds/Transactions/Edit.vue'),
            meta: { title: 'cruds.transaction.title' }
          }
        ]
      },
      {
        path: 'management-test',
        name: 'management_test',
        component: View,
        redirect: { name: 'tests.index' },
        children: [
          {
            path: 'tests',
            name: 'tests.index',
            component: () => import('@cruds/Tests/Index.vue'),
            meta: { title: 'cruds.test.title' }
          },
          {
            path: 'tests/create',
            name: 'tests.create',
            component: () => import('@cruds/Tests/Create.vue'),
            meta: { title: 'cruds.test.title' }
          },
          {
            path: 'tests/:id',
            name: 'tests.show',
            component: () => import('@cruds/Tests/Show.vue'),
            meta: { title: 'cruds.test.title' }
          },
          {
            path: 'tests/:id/edit',
            name: 'tests.edit',
            component: () => import('@cruds/Tests/Edit.vue'),
            meta: { title: 'cruds.test.title' }
          },
          {
            path: 'questions',
            name: 'questions.index',
            component: () => import('@cruds/Questions/Index.vue'),
            meta: { title: 'cruds.question.title' }
          },
          {
            path: 'questions/create',
            name: 'questions.create',
            component: () => import('@cruds/Questions/Create.vue'),
            meta: { title: 'cruds.question.title' }
          },
          {
            path: 'questions/:id',
            name: 'questions.show',
            component: () => import('@cruds/Questions/Show.vue'),
            meta: { title: 'cruds.question.title' }
          },
          {
            path: 'questions/:id/edit',
            name: 'questions.edit',
            component: () => import('@cruds/Questions/Edit.vue'),
            meta: { title: 'cruds.question.title' }
          },
          {
            path: 'question-options',
            name: 'question_options.index',
            component: () => import('@cruds/QuestionOptions/Index.vue'),
            meta: { title: 'cruds.questionOption.title' }
          },
          {
            path: 'question-options/create',
            name: 'question_options.create',
            component: () => import('@cruds/QuestionOptions/Create.vue'),
            meta: { title: 'cruds.questionOption.title' }
          },
          {
            path: 'question-options/:id',
            name: 'question_options.show',
            component: () => import('@cruds/QuestionOptions/Show.vue'),
            meta: { title: 'cruds.questionOption.title' }
          },
          {
            path: 'question-options/:id/edit',
            name: 'question_options.edit',
            component: () => import('@cruds/QuestionOptions/Edit.vue'),
            meta: { title: 'cruds.questionOption.title' }
          },
          {
            path: 'test-results',
            name: 'test_results.index',
            component: () => import('@cruds/TestResults/Index.vue'),
            meta: { title: 'cruds.testResult.title' }
          },
          {
            path: 'test-results/create',
            name: 'test_results.create',
            component: () => import('@cruds/TestResults/Create.vue'),
            meta: { title: 'cruds.testResult.title' }
          },
          {
            path: 'test-results/:id',
            name: 'test_results.show',
            component: () => import('@cruds/TestResults/Show.vue'),
            meta: { title: 'cruds.testResult.title' }
          },
          {
            path: 'test-results/:id/edit',
            name: 'test_results.edit',
            component: () => import('@cruds/TestResults/Edit.vue'),
            meta: { title: 'cruds.testResult.title' }
          },
          {
            path: 'test-answers',
            name: 'test_answers.index',
            component: () => import('@cruds/TestAnswers/Index.vue'),
            meta: { title: 'cruds.testAnswer.title' }
          },
          {
            path: 'test-answers/create',
            name: 'test_answers.create',
            component: () => import('@cruds/TestAnswers/Create.vue'),
            meta: { title: 'cruds.testAnswer.title' }
          },
          {
            path: 'test-answers/:id',
            name: 'test_answers.show',
            component: () => import('@cruds/TestAnswers/Show.vue'),
            meta: { title: 'cruds.testAnswer.title' }
          },
          {
            path: 'test-answers/:id/edit',
            name: 'test_answers.edit',
            component: () => import('@cruds/TestAnswers/Edit.vue'),
            meta: { title: 'cruds.testAnswer.title' }
          },
          {
            path: 'reviews',
            name: 'reviews.index',
            component: () => import('@cruds/Reviews/Index.vue'),
            meta: { title: 'cruds.review.title' }
          },
          {
            path: 'reviews/create',
            name: 'reviews.create',
            component: () => import('@cruds/Reviews/Create.vue'),
            meta: { title: 'cruds.review.title' }
          },
          {
            path: 'reviews/:id',
            name: 'reviews.show',
            component: () => import('@cruds/Reviews/Show.vue'),
            meta: { title: 'cruds.review.title' }
          },
          {
            path: 'reviews/:id/edit',
            name: 'reviews.edit',
            component: () => import('@cruds/Reviews/Edit.vue'),
            meta: { title: 'cruds.review.title' }
          }
        ]
      },
      {
        path: 'management-kela',
        name: 'management_kela',
        component: View,
        redirect: { name: 'kelas.index' },
        children: [
          {
            path: 'kelas',
            name: 'kelas.index',
            component: () => import('@cruds/Kelas/Index.vue'),
            meta: { title: 'cruds.kela.title' }
          },
          {
            path: 'kelas/create',
            name: 'kelas.create',
            component: () => import('@cruds/Kelas/Create.vue'),
            meta: { title: 'cruds.kela.title' }
          },
          {
            path: 'kelas/:id',
            name: 'kelas.show',
            component: () => import('@cruds/Kelas/Show.vue'),
            meta: { title: 'cruds.kela.title' }
          },
          {
            path: 'kelas/:id/edit',
            name: 'kelas.edit',
            component: () => import('@cruds/Kelas/Edit.vue'),
            meta: { title: 'cruds.kela.title' }
          },
          {
            path: 'courses',
            name: 'courses.index',
            component: () => import('@cruds/Courses/Index.vue'),
            meta: { title: 'cruds.course.title' }
          },
          {
            path: 'courses/create',
            name: 'courses.create',
            component: () => import('@cruds/Courses/Create.vue'),
            meta: { title: 'cruds.course.title' }
          },
          {
            path: 'courses/:id',
            name: 'courses.show',
            component: () => import('@cruds/Courses/Show.vue'),
            meta: { title: 'cruds.course.title' }
          },
          {
            path: 'courses/:id/edit',
            name: 'courses.edit',
            component: () => import('@cruds/Courses/Edit.vue'),
            meta: { title: 'cruds.course.title' }
          },
          {
            path: 'chapters',
            name: 'chapters.index',
            component: () => import('@cruds/Chapters/Index.vue'),
            meta: { title: 'cruds.chapter.title' }
          },
          {
            path: 'chapters/create',
            name: 'chapters.create',
            component: () => import('@cruds/Chapters/Create.vue'),
            meta: { title: 'cruds.chapter.title' }
          },
          {
            path: 'chapters/:id',
            name: 'chapters.show',
            component: () => import('@cruds/Chapters/Show.vue'),
            meta: { title: 'cruds.chapter.title' }
          },
          {
            path: 'chapters/:id/edit',
            name: 'chapters.edit',
            component: () => import('@cruds/Chapters/Edit.vue'),
            meta: { title: 'cruds.chapter.title' }
          },
          {
            path: 'topics',
            name: 'topics.index',
            component: () => import('@cruds/Topics/Index.vue'),
            meta: { title: 'cruds.topic.title' }
          },
          {
            path: 'topics/create',
            name: 'topics.create',
            component: () => import('@cruds/Topics/Create.vue'),
            meta: { title: 'cruds.topic.title' }
          },
          {
            path: 'topics/:id',
            name: 'topics.show',
            component: () => import('@cruds/Topics/Show.vue'),
            meta: { title: 'cruds.topic.title' }
          },
          {
            path: 'topics/:id/edit',
            name: 'topics.edit',
            component: () => import('@cruds/Topics/Edit.vue'),
            meta: { title: 'cruds.topic.title' }
          },
          {
            path: 'lessons',
            name: 'lessons.index',
            component: () => import('@cruds/Lessons/Index.vue'),
            meta: { title: 'cruds.lesson.title' }
          },
          {
            path: 'lessons/create',
            name: 'lessons.create',
            component: () => import('@cruds/Lessons/Create.vue'),
            meta: { title: 'cruds.lesson.title' }
          },
          {
            path: 'lessons/:id',
            name: 'lessons.show',
            component: () => import('@cruds/Lessons/Show.vue'),
            meta: { title: 'cruds.lesson.title' }
          },
          {
            path: 'lessons/:id/edit',
            name: 'lessons.edit',
            component: () => import('@cruds/Lessons/Edit.vue'),
            meta: { title: 'cruds.lesson.title' }
          }
        ]
      },
      {
        path: 'faq-management',
        name: 'faq_management',
        component: View,
        redirect: { name: 'faq_categories.index' },
        children: [
          {
            path: 'faq-categories',
            name: 'faq_categories.index',
            component: () => import('@cruds/FaqCategories/Index.vue'),
            meta: { title: 'cruds.faqCategory.title' }
          },
          {
            path: 'faq-categories/create',
            name: 'faq_categories.create',
            component: () => import('@cruds/FaqCategories/Create.vue'),
            meta: { title: 'cruds.faqCategory.title' }
          },
          {
            path: 'faq-categories/:id',
            name: 'faq_categories.show',
            component: () => import('@cruds/FaqCategories/Show.vue'),
            meta: { title: 'cruds.faqCategory.title' }
          },
          {
            path: 'faq-categories/:id/edit',
            name: 'faq_categories.edit',
            component: () => import('@cruds/FaqCategories/Edit.vue'),
            meta: { title: 'cruds.faqCategory.title' }
          },
          {
            path: 'faq-questions',
            name: 'faq_questions.index',
            component: () => import('@cruds/FaqQuestions/Index.vue'),
            meta: { title: 'cruds.faqQuestion.title' }
          },
          {
            path: 'faq-questions/create',
            name: 'faq_questions.create',
            component: () => import('@cruds/FaqQuestions/Create.vue'),
            meta: { title: 'cruds.faqQuestion.title' }
          },
          {
            path: 'faq-questions/:id',
            name: 'faq_questions.show',
            component: () => import('@cruds/FaqQuestions/Show.vue'),
            meta: { title: 'cruds.faqQuestion.title' }
          },
          {
            path: 'faq-questions/:id/edit',
            name: 'faq_questions.edit',
            component: () => import('@cruds/FaqQuestions/Edit.vue'),
            meta: { title: 'cruds.faqQuestion.title' }
          }
        ]
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
