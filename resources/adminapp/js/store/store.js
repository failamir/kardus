import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import CoursesIndex from './cruds/Courses'
import CoursesSingle from './cruds/Courses/single'
import LessonsIndex from './cruds/Lessons'
import LessonsSingle from './cruds/Lessons/single'
import TestsIndex from './cruds/Tests'
import TestsSingle from './cruds/Tests/single'
import QuestionsIndex from './cruds/Questions'
import QuestionsSingle from './cruds/Questions/single'
import QuestionOptionsIndex from './cruds/QuestionOptions'
import QuestionOptionsSingle from './cruds/QuestionOptions/single'
import TestResultsIndex from './cruds/TestResults'
import TestResultsSingle from './cruds/TestResults/single'
import TestAnswersIndex from './cruds/TestAnswers'
import TestAnswersSingle from './cruds/TestAnswers/single'
import ReviewsIndex from './cruds/Reviews'
import ReviewsSingle from './cruds/Reviews/single'
import BannersIndex from './cruds/Banners'
import BannersSingle from './cruds/Banners/single'
import ProductCategoriesIndex from './cruds/ProductCategories'
import ProductCategoriesSingle from './cruds/ProductCategories/single'
import ProductTagsIndex from './cruds/ProductTags'
import ProductTagsSingle from './cruds/ProductTags/single'
import ProductsIndex from './cruds/Products'
import ProductsSingle from './cruds/Products/single'
import FaqCategoriesIndex from './cruds/FaqCategories'
import FaqCategoriesSingle from './cruds/FaqCategories/single'
import FaqQuestionsIndex from './cruds/FaqQuestions'
import FaqQuestionsSingle from './cruds/FaqQuestions/single'
import NotificationsIndex from './cruds/Notifications'
import NotificationsSingle from './cruds/Notifications/single'
import ChaptersIndex from './cruds/Chapters'
import ChaptersSingle from './cruds/Chapters/single'
import TopicsIndex from './cruds/Topics'
import TopicsSingle from './cruds/Topics/single'
import KelasIndex from './cruds/Kelas'
import KelasSingle from './cruds/Kelas/single'
import LearnProgressesIndex from './cruds/LearnProgresses'
import LearnProgressesSingle from './cruds/LearnProgresses/single'
import ListPaymentsIndex from './cruds/ListPayments'
import ListPaymentsSingle from './cruds/ListPayments/single'
import SchedulesIndex from './cruds/Schedules'
import SchedulesSingle from './cruds/Schedules/single'
import TransactionsIndex from './cruds/Transactions'
import TransactionsSingle from './cruds/Transactions/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    CoursesIndex,
    CoursesSingle,
    LessonsIndex,
    LessonsSingle,
    TestsIndex,
    TestsSingle,
    QuestionsIndex,
    QuestionsSingle,
    QuestionOptionsIndex,
    QuestionOptionsSingle,
    TestResultsIndex,
    TestResultsSingle,
    TestAnswersIndex,
    TestAnswersSingle,
    ReviewsIndex,
    ReviewsSingle,
    BannersIndex,
    BannersSingle,
    ProductCategoriesIndex,
    ProductCategoriesSingle,
    ProductTagsIndex,
    ProductTagsSingle,
    ProductsIndex,
    ProductsSingle,
    FaqCategoriesIndex,
    FaqCategoriesSingle,
    FaqQuestionsIndex,
    FaqQuestionsSingle,
    NotificationsIndex,
    NotificationsSingle,
    ChaptersIndex,
    ChaptersSingle,
    TopicsIndex,
    TopicsSingle,
    KelasIndex,
    KelasSingle,
    LearnProgressesIndex,
    LearnProgressesSingle,
    ListPaymentsIndex,
    ListPaymentsSingle,
    SchedulesIndex,
    SchedulesSingle,
    TransactionsIndex,
    TransactionsSingle
  },
  strict: debug
})
