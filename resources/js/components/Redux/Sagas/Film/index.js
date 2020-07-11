import {all} from 'redux-saga/effects';
import loadListSagas from './loadListSagas';

export const FilmSagas = function* root() {
  yield all([loadListSagas()]);
};
