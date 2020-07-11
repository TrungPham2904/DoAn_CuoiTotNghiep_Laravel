import {takeLatest, call, put, delay} from 'redux-saga/effects';
import {
  LOAD_LIST_USER_REQUEST
} from '../../Constant/actionTypes';
import {loadUserApi} from '../../Apis/Film/loadFilmApi'
import {
  loadListUserSuccessAction
} from '../../Action/userAction';

function* requestAction(action) {
  let {payload} = action;
  try {
    const response = yield call(loadUserApi, payload);// goi api
    console.log(response.data, "Response")
    yield put(loadListUserSuccessAction(response.data))

    
  } catch (err) {
        console.log("error")
  }
}

function* loadListUserSagas() {
  yield takeLatest(LOAD_LIST_USER_REQUEST, requestAction);
}

export default loadListUserSagas;
