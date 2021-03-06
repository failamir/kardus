function initialState() {
  return {
    entry: {
      id: null,
      teacher_id: null,
      title: '',
      description: '',
      price: '',
      thumbnail: [],
      is_published: false,
      students: [],
      kelas_id: null,
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      teacher: [],
      students: [],
      kelas: []
    },
    loading: false
  }
}

const route = 'courses'

const getters = {
  entry: state => state.entry,
  lists: state => state.lists,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  setTeacher({ commit }, value) {
    commit('setTeacher', value)
  },
  setTitle({ commit }, value) {
    commit('setTitle', value)
  },
  setDescription({ commit }, value) {
    commit('setDescription', value)
  },
  setPrice({ commit }, value) {
    commit('setPrice', value)
  },
  insertThumbnailFile({ commit }, file) {
    commit('insertThumbnailFile', file)
  },
  removeThumbnailFile({ commit }, file) {
    commit('removeThumbnailFile', file)
  },
  setIsPublished({ commit }, value) {
    commit('setIsPublished', value)
  },
  setStudents({ commit }, value) {
    commit('setStudents', value)
  },
  setKelas({ commit }, value) {
    commit('setKelas', value)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  fetchCreateData({ commit }) {
    axios.get(`${route}/create`).then(response => {
      commit('setLists', response.data.meta)
    })
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
      commit('setLists', response.data.meta)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setTeacher(state, value) {
    state.entry.teacher_id = value
  },
  setTitle(state, value) {
    state.entry.title = value
  },
  setDescription(state, value) {
    state.entry.description = value
  },
  setPrice(state, value) {
    state.entry.price = value
  },
  insertThumbnailFile(state, file) {
    state.entry.thumbnail.push(file)
  },
  removeThumbnailFile(state, file) {
    state.entry.thumbnail = state.entry.thumbnail.filter(item => {
      return item.id !== file.id
    })
  },
  setIsPublished(state, value) {
    state.entry.is_published = value
  },
  setStudents(state, value) {
    state.entry.students = value
  },
  setKelas(state, value) {
    state.entry.kelas_id = value
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setLists(state, lists) {
    state.lists = lists
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
