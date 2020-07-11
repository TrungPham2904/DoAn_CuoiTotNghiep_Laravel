import {takeLatest, call, put, delay} from 'redux-saga/effects';
import {
  LOAD_LIST_FILM_REQUEST
} from '../../Constant/actionTypes';
import {loadFilmApi} from '../../Apis/Film/loadFilmApi'
import {
  loadListFilmSuccessAction
} from '../../Action/filmActions';

function* requestAction(action) {
  let {payload} = action;
  try {
    const response = yield call(loadFilmApi, payload);// goi api
    console.log(response.data, "Response")
    yield put(loadListFilmSuccessAction(response.data))

    
  } catch (err) {
        console.log("error")
  }
}

function* loadListSagas() {
  yield takeLatest(LOAD_LIST_FILM_REQUEST, requestAction);
}

export default loadListSagas;
